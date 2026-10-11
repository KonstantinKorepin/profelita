<?php

namespace Tests\Feature;

use App\Models\City;
use App\Models\Master;
use App\Models\Service;
use App\Models\ServiceTemplate;
use App\Models\Url;
use App\Repositories\Interfaces\ServiceTemplateRepositoryInterface;
use App\Services\MasterServicesGenerator;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Mockery;
use RuntimeException;
use Tests\TestCase;

class MasterServicesGeneratorTest extends TestCase
{
    private Master $master;

    private City $city;

    protected function setUp(): void
    {
        parent::setUp();

        config(['database.default' => 'generator_test', 'database.connections.generator_test' => [
            'driver' => 'sqlite', 'database' => ':memory:', 'prefix' => '',
            'foreign_key_constraints' => true,
        ]]);
        DB::statement('CREATE TABLE masters (id INTEGER PRIMARY KEY, city_id INTEGER, specialization_id INTEGER, actual INTEGER,
            last_name TEXT, first_name TEXT, middle_name TEXT)');
        DB::statement('CREATE TABLE cities (id INTEGER PRIMARY KEY, name TEXT, prepositional TEXT, active INTEGER)');
        DB::statement('CREATE TABLE services (
            id INTEGER PRIMARY KEY AUTOINCREMENT, master_id INTEGER, service_templates_id INTEGER,
            parent_id INTEGER REFERENCES services(id), name TEXT, h1 TEXT, title TEXT,
            description TEXT, keywords TEXT, template TEXT, main_service INTEGER,
            on_city_list INTEGER, section INTEGER, price INTEGER, sort INTEGER,
            created_at TEXT, updated_at TEXT
        )');
        DB::statement('CREATE TABLE urls (
            id INTEGER PRIMARY KEY AUTOINCREMENT, url TEXT UNIQUE, entity_class TEXT,
            entity_id INTEGER, master_id INTEGER, created_at TEXT, updated_at TEXT
        )');

        $this->city = City::create(['name' => 'Самара', 'prepositional' => 'Самаре', 'active' => false]);
        $this->master = Master::create(['city_id' => $this->city->id, 'specialization_id' => 1, 'actual' => false]);
    }

    protected function tearDown(): void
    {
        DB::purge('generator_test');
        parent::tearDown();
    }

    public function test_repeated_generation_preserves_urls_and_parent_links(): void
    {
        $parent = $this->template(1, null, true);
        $child = $this->template(2, 1);
        $generator = $this->generator([$child, $parent]);
        $this->assertSame(2, $generator->generate($this->master, $this->city));

        $service = Service::where('service_templates_id', 2)->firstOrFail();
        $oldId = $service->id;
        $this->assertSame('Услуга 2 в Самаре', $service->name);
        Url::where('entity_id', $oldId)->update(['url' => 'existing-address']);
        Url::create(['url' => 'master-address', 'entity_class' => Url::MASTER, 'entity_id' => $this->master->id, 'master_id' => $this->master->id]);

        $generator->generate($this->master, $this->city);
        $service = Service::where('service_templates_id', 2)->firstOrFail();
        $this->assertNotEquals($oldId, $service->id);
        $this->assertEquals(Service::where('service_templates_id', 1)->value('id'), $service->parent_id);
        $this->assertEquals($service->id, Url::where('url', 'existing-address')->value('entity_id'));
        $this->assertSame(2, Service::count());
        $this->assertSame(2, Url::count());
        $this->assertEquals(1, $this->master->fresh()->actual);
        $this->assertEquals(1, $this->city->fresh()->active);
    }

    public function test_empty_templates_do_not_delete_existing_services(): void
    {
        $this->assertRejectedTemplates([]);
    }

    public function test_missing_parent_does_not_delete_existing_services(): void
    {
        $this->assertRejectedTemplates([$this->template(2, 99)]);
    }

    public function test_cyclic_templates_do_not_delete_existing_services(): void
    {
        $this->assertRejectedTemplates([$this->template(1, 2), $this->template(2, 1)]);
    }

    public function test_url_collision_rolls_back_deletion_and_creation(): void
    {
        $old = Service::create(['master_id' => $this->master->id, 'service_templates_id' => 99]);
        Url::create(['url' => 'old-address', 'entity_class' => Url::SERVICE, 'entity_id' => $old->id, 'master_id' => $this->master->id]);
        Url::create(['url' => str_slug('Услуга 1 в Самаре'), 'entity_class' => Url::MASTER, 'entity_id' => 42, 'master_id' => 42]);

        try {
            $this->generator([$this->template(1)])->generate($this->master, $this->city);
            $this->fail('Expected URL uniqueness violation.');
        } catch (QueryException) {
            $this->assertSame([$old->id], Service::pluck('id')->all());
            $this->assertEquals($old->id, Url::where('url', 'old-address')->value('entity_id'));
            $this->assertSame(2, Url::count());
            $this->assertEquals(0, $this->master->fresh()->actual);
            $this->assertEquals(0, $this->city->fresh()->active);
        }
    }

    public function test_services_of_another_owner_block_regeneration(): void
    {
        $old = Service::create(['master_id' => $this->master->id, 'service_templates_id' => 1]);
        Service::create(['master_id' => 42, 'service_templates_id' => 2, 'parent_id' => $old->id]);
        try {
            $this->generator([$this->template(1)])->generate($this->master, $this->city);
            $this->fail('Expected external reference validation failure.');
        } catch (RuntimeException $exception) {
            $this->assertStringContainsString('другого владельца', $exception->getMessage());
            $this->assertSame(2, Service::count());
        }
    }

    public function test_invalid_master_id_returns_failure(): void
    {
        $this->artisan('app:fill-services-master', ['master_id' => '1abc'])->assertExitCode(1);
    }

    public function test_missing_master_returns_failure(): void
    {
        $this->artisan('app:fill-services-master', ['master_id' => 999])
            ->expectsOutput('Мастер не найден.')
            ->assertExitCode(1);
    }

    public function test_command_generates_services_and_returns_success(): void
    {
        $repository = Mockery::mock(ServiceTemplateRepositoryInterface::class);
        $repository->shouldReceive('getBySpecializationId')->with(1)->andReturn(collect([$this->template(1)]));
        $this->app->instance(ServiceTemplateRepositoryInterface::class, $repository);

        $this->artisan('app:fill-services-master', ['master_id' => $this->master->id])
            ->expectsOutput('Услуги мастера успешно пересозданы: 1.')
            ->assertExitCode(0);
        $this->assertSame(1, Service::count());
        $this->assertSame(1, Url::count());
    }

    public function test_url_command_removes_master_duplicates_and_is_repeatable(): void
    {
        $service = Service::create(['master_id' => $this->master->id, 'service_templates_id' => 1, 'section' => false, 'name' => 'Услуга']);
        Service::create(['master_id' => $this->master->id, 'service_templates_id' => 2, 'section' => true, 'name' => 'Раздел']);
        foreach (['original', 'original_1', 'original_2'] as $path) {
            Url::create(['url' => $path, 'entity_id' => $this->master->id, 'master_id' => $this->master->id, 'entity_class' => Url::MASTER]);
        }
        $originalId = Url::where('url', 'original')->value('id');
        $other = Url::create(['url' => 'another-master', 'entity_id' => 42, 'master_id' => 42, 'entity_class' => Url::MASTER]);

        $this->artisan('app:url-generating-master', ['master_id' => $this->master->id])->assertExitCode(0);
        $this->assertSame(3, Url::count());
        $this->assertEquals($originalId, Url::where('url', 'original')->value('id'));
        $this->assertTrue($other->fresh()->exists);
        $serviceUrlId = Url::where('entity_class', Url::SERVICE)->where('entity_id', $service->id)->value('id');
        $this->assertNotNull($serviceUrlId);

        $this->artisan('app:url-generating-master', ['master_id' => $this->master->id])->assertExitCode(0);
        $this->assertSame(3, Url::count());
        $this->assertEquals($serviceUrlId, Url::where('entity_class', Url::SERVICE)->value('id'));
    }

    public function test_url_command_creates_master_url_using_first_available_suffix(): void
    {
        $this->master->update(['last_name' => 'Иванов', 'first_name' => 'Иван']);
        $base = str_slug($this->master->getFullName());
        foreach ([$base, $base.'_2'] as $path) {
            Url::create(['url' => $path, 'entity_id' => 42, 'master_id' => 42, 'entity_class' => Url::MASTER]);
        }

        $this->artisan('app:url-generating-master', ['master_id' => $this->master->id])->assertExitCode(0);
        $this->assertSame($base.'_1', Url::where('entity_id', $this->master->id)->value('url'));
    }

    public function test_url_command_rolls_back_duplicate_cleanup_on_service_url_conflict(): void
    {
        foreach (['original', 'original_1'] as $path) {
            Url::create(['url' => $path, 'entity_id' => $this->master->id, 'master_id' => $this->master->id, 'entity_class' => Url::MASTER]);
        }
        Service::create(['master_id' => $this->master->id, 'service_templates_id' => 1, 'section' => false, 'name' => 'Conflict']);
        Url::create(['url' => 'conflict', 'entity_id' => 42, 'master_id' => 42, 'entity_class' => Url::MASTER]);

        $this->artisan('app:url-generating-master', ['master_id' => $this->master->id])->assertExitCode(1);
        $this->assertSame(3, Url::count());
        $this->assertTrue(Url::where('url', 'original_1')->exists());
    }

    private function assertRejectedTemplates(array $templates): void
    {
        $old = Service::create(['master_id' => $this->master->id, 'service_templates_id' => 1]);
        try {
            $this->generator($templates)->generate($this->master, $this->city);
            $this->fail('Expected template validation failure.');
        } catch (RuntimeException) {
            $this->assertSame([$old->id], Service::pluck('id')->all());
            $this->assertEquals(0, $this->master->fresh()->actual);
            $this->assertEquals(0, $this->city->fresh()->active);
        }
    }

    private function generator(array $templates): MasterServicesGenerator
    {
        $repository = Mockery::mock(ServiceTemplateRepositoryInterface::class);
        $repository->shouldReceive('getBySpecializationId')->with(1)->andReturn(collect($templates));

        return new MasterServicesGenerator($repository, $this->app->make(\App\Services\ServiceFromTemplateFactory::class));
    }

    private function template(int $id, ?int $parentId = null, bool $section = false): ServiceTemplate
    {
        return (new ServiceTemplate())->forceFill([
            'id' => $id, 'parent_id' => $parentId, 'name' => "Услуга {$id} в {:prepositional}",
            'h1' => 'Услуги в {:name}', 'title' => '', 'description' => '', 'keywords' => '',
            'default_template' => 'template', 'main_service' => false, 'on_city_list' => false,
            'section' => $section, 'default_price' => 100, 'sort' => $id,
        ]);
    }
}

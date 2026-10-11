<?php

namespace Tests\Feature;

use App\Models\Service;
use App\Models\Url;
use App\Services\TemplateServicesGenerator;
use Illuminate\Support\Facades\DB;
use RuntimeException;
use Tests\TestCase;

class TemplateServicesGeneratorTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        config(['database.default' => 'template_test', 'database.connections.template_test' => [
            'driver' => 'sqlite', 'database' => ':memory:', 'prefix' => '',
            'foreign_key_constraints' => true,
        ]]);
        DB::statement('CREATE TABLE cities (id INTEGER PRIMARY KEY, name TEXT, prepositional TEXT)');
        DB::statement('CREATE TABLE masters (id INTEGER PRIMARY KEY, city_id INTEGER, specialization_id INTEGER, actual INTEGER)');
        DB::statement('CREATE TABLE service_templates (
            id INTEGER PRIMARY KEY, specialization_id INTEGER, parent_id INTEGER,
            name TEXT, h1 TEXT, title TEXT, description TEXT, keywords TEXT,
            default_template TEXT, main_service INTEGER, on_city_list INTEGER,
            section INTEGER, default_price INTEGER, sort INTEGER
        )');
        DB::statement('CREATE TABLE services (
            id INTEGER PRIMARY KEY AUTOINCREMENT, master_id INTEGER, service_templates_id INTEGER,
            parent_id INTEGER REFERENCES services(id), name TEXT, h1 TEXT, title TEXT,
            description TEXT, keywords TEXT, template TEXT, main_service INTEGER,
            on_city_list INTEGER, section INTEGER, price INTEGER, sort INTEGER,
            created_at TEXT, updated_at TEXT
        )');
        DB::statement('CREATE TABLE urls (
            id INTEGER PRIMARY KEY, url TEXT, entity_class TEXT, entity_id INTEGER,
            master_id INTEGER, created_at TEXT, updated_at TEXT
        )');
        DB::table('cities')->insert(['id' => 1, 'name' => 'Самара', 'prepositional' => 'Самаре']);
        DB::table('masters')->insert(['id' => 1, 'city_id' => 1, 'specialization_id' => 1, 'actual' => true]);
    }

    protected function tearDown(): void
    {
        DB::purge('template_test');
        parent::tearDown();
    }

    public function test_only_matching_actual_masters_receive_services_and_repeat_preserves_edits(): void
    {
        $this->insertTemplate(1);
        DB::table('masters')->insert([
            ['id' => 2, 'city_id' => 1, 'specialization_id' => 1, 'actual' => false],
            ['id' => 3, 'city_id' => 1, 'specialization_id' => 2, 'actual' => true],
        ]);
        $this->artisan('app:fill-services-template', ['service_template_id' => 1])
            ->expectsOutput('Добавлено услуг: 1. Уже существовали: 0.')->assertExitCode(0);
        $service = Service::firstOrFail();
        $this->assertSame('Услуга в Самаре — Самара', $service->name);
        $this->assertSame('', $service->description);
        $this->assertNull($service->parent_id);
        $this->assertEquals(1, $service->master_id);
        $service->update(['price' => 999, 'title' => 'Ручной текст']);
        Url::create(['url' => 'existing', 'entity_id' => $service->id, 'entity_class' => Url::SERVICE, 'master_id' => 1]);

        $this->artisan('app:fill-services-template', ['service_template_id' => 1])
            ->expectsOutput('Добавлено услуг: 0. Уже существовали: 1.')->assertExitCode(0);
        $this->assertSame(1, Service::count());
        $this->assertEquals(999, $service->fresh()->price);
        $this->assertSame('Ручной текст', $service->fresh()->title);
        $this->assertEquals($service->id, Url::firstOrFail()->entity_id);
    }

    public function test_child_service_uses_parent_of_the_same_master(): void
    {
        $this->insertTemplate(1);
        $this->insertTemplate(2, 1);
        $otherParent = Service::create(['master_id' => 42, 'service_templates_id' => 1]);
        $parent = Service::create(['master_id' => 1, 'service_templates_id' => 1]);
        $this->assertSame(['created' => 1, 'skipped' => 0], $this->generator()->generate(2));
        $child = Service::where('service_templates_id', 2)->firstOrFail();
        $this->assertEquals($parent->id, $child->parent_id);
        $this->assertNotEquals($otherParent->id, $child->parent_id);
    }

    public function test_missing_parent_for_later_master_rolls_back_entire_run(): void
    {
        $this->insertTemplate(1);
        $this->insertTemplate(2, 1);
        DB::table('masters')->insert(['id' => 2, 'city_id' => 1, 'specialization_id' => 1, 'actual' => true]);
        $parent = Service::create(['master_id' => 1, 'service_templates_id' => 1]);
        try {
            $this->generator()->generate(2);
            $this->fail('Expected missing parent service failure.');
        } catch (RuntimeException $exception) {
            $this->assertStringContainsString('У мастера 2 отсутствует родительская услуга', $exception->getMessage());
            $this->assertSame([$parent->id], Service::pluck('id')->all());
        }
    }

    public function test_missing_city_for_later_master_rolls_back_entire_run(): void
    {
        $this->insertTemplate(1);
        DB::table('masters')->insert(['id' => 2, 'city_id' => 999, 'specialization_id' => 1, 'actual' => true]);
        try {
            $this->generator()->generate(1);
            $this->fail('Expected missing city failure.');
        } catch (RuntimeException $exception) {
            $this->assertSame('Город мастера 2 не найден.', $exception->getMessage());
            $this->assertSame(0, Service::count());
        }
    }

    public function test_invalid_parent_template_is_rejected(): void
    {
        $this->insertTemplate(1, 99);
        $this->artisan('app:fill-services-template', ['service_template_id' => 1])
            ->expectsOutput('Не удалось добавить услуги: Некорректный родительский шаблон услуги.')
            ->assertExitCode(1);
        $this->assertSame(0, Service::count());
    }

    public function test_command_rejects_invalid_and_missing_template(): void
    {
        $this->artisan('app:fill-services-template', ['service_template_id' => '1abc'])->assertExitCode(1);
        $this->artisan('app:fill-services-template', ['service_template_id' => 999])
            ->expectsOutput('Шаблон услуги не найден.')->assertExitCode(1);
        $this->assertSame(0, Service::count());
    }

    public function test_no_matching_masters_is_successful_without_writes(): void
    {
        $this->insertTemplate(1);
        DB::table('masters')->update(['actual' => false]);
        $this->assertSame(['created' => 0, 'skipped' => 0], $this->generator()->generate(1));
        $this->assertSame(0, Service::count());
    }

    private function generator(): TemplateServicesGenerator
    {
        return $this->app->make(TemplateServicesGenerator::class);
    }

    private function insertTemplate(int $id, ?int $parentId = null): void
    {
        DB::table('service_templates')->insert([
            'id' => $id, 'specialization_id' => 1, 'parent_id' => $parentId,
            'name' => 'Услуга в {:prepositional} — {:name}', 'h1' => 'Заголовок в {:name}',
            'title' => 'Услуги в {:prepositional}', 'description' => null, 'keywords' => null,
            'default_template' => 'template', 'main_service' => false, 'on_city_list' => false,
            'section' => false, 'default_price' => 100, 'sort' => $id,
        ]);
    }
}

<?php

namespace Tests\Feature;

use App\Models\City;
use App\Models\Url;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class CityUrlGeneratorTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        config(['database.default' => 'city_url_test', 'database.connections.city_url_test' => [
            'driver' => 'sqlite', 'database' => ':memory:', 'prefix' => '',
        ]]);
        DB::statement('CREATE TABLE cities (id INTEGER PRIMARY KEY, code TEXT)');
        DB::statement('CREATE TABLE urls (
            id INTEGER PRIMARY KEY AUTOINCREMENT, url TEXT UNIQUE, entity_class TEXT,
            entity_id INTEGER, master_id INTEGER, created_at TEXT, updated_at TEXT
        )');
        City::create(['code' => 'samara']);
    }

    protected function tearDown(): void
    {
        DB::purge('city_url_test');
        parent::tearDown();
    }

    public function test_command_creates_city_url_and_repeat_run_changes_nothing(): void
    {
        $this->artisan('app:url-generating-city', ['city_id' => 1])
            ->expectsOutput('URL города: samara')->assertExitCode(0);
        $url = Url::firstOrFail();
        $this->assertSame('samara', $url->url);
        $this->assertSame(Url::CITY, $url->entity_class);
        $this->assertEquals(1, $url->entity_id);
        $this->assertNull($url->master_id);
        $attributes = $url->getAttributes();

        $this->artisan('app:url-generating-city', ['city_id' => 1])->assertExitCode(0);
        $this->assertSame(1, Url::count());
        $this->assertSame($attributes, $url->fresh()->getAttributes());
    }

    public function test_existing_address_is_preserved_when_city_code_changes(): void
    {
        $url = Url::create(['url' => 'original-address', 'entity_class' => Url::CITY, 'entity_id' => 1]);
        City::findOrFail(1)->update(['code' => 'new-address']);

        $this->artisan('app:url-generating-city', ['city_id' => 1])
            ->expectsOutput('URL города: original-address')->assertExitCode(0);
        $this->assertSame(1, Url::count());
        $this->assertSame('original-address', $url->fresh()->url);
    }

    public function test_invalid_id_returns_failure_without_writing_urls(): void
    {
        foreach (['1abc', '0', '-1', '1.5'] as $id) {
            $this->artisan('app:url-generating-city', ['city_id' => $id])
                ->expectsOutput('city_id должен быть положительным целым числом.')
                ->assertExitCode(1);
        }
        $this->assertSame(0, Url::count());
    }

    public function test_missing_city_returns_failure(): void
    {
        $this->artisan('app:url-generating-city', ['city_id' => 999])
            ->expectsOutput('Город не найден.')->assertExitCode(1);
        $this->assertSame(0, Url::count());
    }

    public function test_empty_city_code_returns_failure(): void
    {
        City::findOrFail(1)->update(['code' => '   ']);
        $this->artisan('app:url-generating-city', ['city_id' => 1])
            ->expectsOutput('Не удалось сгенерировать URL города: У города не задан code для URL.')
            ->assertExitCode(1);
        $this->assertSame(0, Url::count());
    }

    public function test_url_collision_does_not_modify_another_entity(): void
    {
        $other = Url::create(['url' => 'samara', 'entity_class' => Url::MASTER, 'entity_id' => 1, 'master_id' => 1]);
        $attributes = $other->fresh()->getAttributes();

        $this->artisan('app:url-generating-city', ['city_id' => 1])
            ->expectsOutput('Не удалось сгенерировать URL города: Адрес samara уже занят другой записью в urls.')
            ->assertExitCode(1);
        $this->assertSame(1, Url::count());
        $this->assertSame($attributes, $other->fresh()->getAttributes());
    }

    public function test_other_entity_with_same_id_does_not_prevent_city_url_creation(): void
    {
        Url::create(['url' => 'master-address', 'entity_class' => Url::MASTER, 'entity_id' => 1, 'master_id' => 1]);
        $this->artisan('app:url-generating-city', ['city_id' => 1])->assertExitCode(0);
        $this->assertSame(2, Url::count());
        $this->assertSame('samara', Url::where('entity_class', Url::CITY)->value('url'));
    }
}

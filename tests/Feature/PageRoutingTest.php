<?php

namespace Tests\Feature;

use App\Models\City;
use App\Models\Master;
use App\Models\Service;
use App\Models\Url;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class PageRoutingTest extends TestCase
{
    use RefreshDatabase;

    private City $city;

    private Master $master;

    private Service $service;

    protected function setUp(): void
    {
        parent::setUp();

        config(['app.main_city_code' => 'samara', 'app.locale' => 'ru']);

        // ReviewRepository formats dates with MySQL DATE_FORMAT; emulate its format in SQLite.
        DB::connection()->getPdo()->sqliteCreateFunction('DATE_FORMAT',
            static fn (string $date, string $format): string => date(
                strtr($format, ['%d' => 'd', '%m' => 'm', '%Y' => 'Y']), strtotime($date)
            ), 2);

        $this->city = new City;
        $this->city->forceFill([
            'name' => 'Самара', 'code' => 'samara', 'prepositional' => 'Самаре',
            'genitive' => 'Самары', 'dative' => 'Самаре', 'active' => true,
        ])->save();
        DB::table('specializations')->insert([
            'id' => 1, 'name' => 'Сантехник', 'code' => 'plumber', 'active' => true,
            'catalog_name' => 'Сантехнические услуги', 'catalog_caption_list' => 'Услуги сантехника', 'sort' => 1,
        ]);
        DB::table('master_sources')->insert(['id' => 1, 'name' => 'Тестовый источник', 'code' => 'test']);
        $this->master = new Master;
        $this->master->forceFill([
            'city_id' => $this->city->id, 'specialization_id' => 1, 'master_sources_id' => 1,
            'last_name' => 'Иванов', 'first_name' => 'Иван', 'middle_name' => 'Иванович',
            'phone' => '+7 999 123-45-67', 'rating' => 5, 'start_working_hours' => '09:00',
            'end_working_hours' => '18:00', 'warranty_period' => 1, 'professional_activity_year' => 2010,
            'count_realized_orders' => 100, 'education' => 'Техническое', 'description' => 'Опытный мастер',
            'url_source' => 'https://example.test', 'on_front' => true, 'actual' => true,
        ])->save();
        DB::table('reviews')->insert([
            'master_id' => $this->master->id, 'rating' => 5, 'name' => 'Анна',
            'review' => 'Мастер быстро устранил протечку', 'date' => '2026-10-01', 'on_front' => true,
        ]);
        DB::table('service_templates')->insert([
            'id' => 1, 'specialization_id' => 1, 'name' => 'Услуги сантехника',
            'catalog_name' => 'Сантехнические услуги', 'code' => 'plumber', 'h1' => 'Услуги сантехника',
            'title' => 'Сантехник', 'description' => 'Услуги', 'default_template' => 'templates.services.plumber.price.all',
            'main_service' => true, 'sort' => 1,
        ]);
        $this->service = Service::create([
            'master_id' => $this->master->id, 'service_templates_id' => 1, 'name' => 'Сантехник в Самаре',
            'h1' => 'Вызов сантехника в Самаре', 'title' => 'Сантехник в Самаре — цены',
            'description' => 'Сантехнические работы в Самаре', 'keywords' => 'сантехник, Самара',
            'template' => 'templates.services.plumber.price.all', 'main_service' => true, 'price' => 500, 'sort' => 1,
        ]);
        foreach ([
            ['samara', Url::CITY, $this->city->id],
            ['ivanov', Url::MASTER, $this->master->id],
            ['plumber-samara', Url::SERVICE, $this->service->id],
        ] as [$path, $type, $entityId]) {
            Url::create(['url' => $path, 'entity_class' => $type, 'entity_id' => $entityId, 'master_id' => $this->master->id]);
        }
    }

    public function test_home_page_uses_configured_city(): void
    {
        $this->get('/')->assertOk()->assertViewIs('pages.city')
            ->assertViewHas('data', fn (array $data): bool => $data['city']->is($this->city))
            ->assertSee('Бытовые услуги в Самаре')->assertSessionHas('cityCode', 'samara');
    }

    public function test_city_url_renders_city_page_and_updates_session(): void
    {
        $this->get('/samara')->assertOk()->assertViewIs('pages.city')
            ->assertViewHas('data', fn (array $data): bool => $data['city']->is($this->city))
            ->assertSee('Бытовые услуги в Самаре')->assertSessionHas('cityId', $this->city->id)
            ->assertSessionHas('masterId', $this->master->id)->assertSessionHas('phoneNumber', '+79991234567');
    }

    public function test_master_url_renders_master_page(): void
    {
        $this->get('/ivanov')->assertOk()->assertViewIs('pages.master')
            ->assertViewHas('data', fn (array $data): bool => $data['master']->is($this->master))
            ->assertSee('Иванов Иван Иванович')->assertSee('Мастер быстро устранил протечку')
            ->assertSee('01.10.2026')->assertSessionHas('masterId', $this->master->id);
    }

    public function test_service_url_renders_service_page_and_seo(): void
    {
        $this->get('/plumber-samara')->assertOk()->assertViewIs('templates.services.main_template')
            ->assertViewHas('data', fn (array $data): bool => $data['service']->is($this->service))
            ->assertSee('Вызов сантехника в Самаре')->assertSee('Сантехник в Самаре — цены')
            ->assertSessionHas('cityCode', 'samara');
    }

    public function test_explicit_route_takes_precedence_over_database_url(): void
    {
        Url::create(['url' => 'about', 'entity_class' => Url::CITY, 'entity_id' => $this->city->id]);

        $this->get('/about')->assertOk()->assertViewIs('pages.about');
    }

    public function test_unknown_url_returns_404(): void
    {
        $this->get('/unknown-page')->assertNotFound()->assertSee('Страница не найдена');
    }

    public function test_unknown_page_type_returns_404(): void
    {
        Url::create(['url' => 'unsupported', 'entity_class' => 'unsupported', 'entity_id' => 1]);

        $this->get('/unsupported')->assertNotFound();
    }

    public function test_urls_with_missing_entities_return_404(): void
    {
        foreach (['samara', 'ivanov', 'plumber-samara'] as $path) {
            Url::where('url', $path)->update(['entity_id' => 999]);
            $this->get('/'.$path)->assertNotFound();
        }
    }
}

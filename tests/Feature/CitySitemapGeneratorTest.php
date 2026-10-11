<?php

namespace Tests\Feature;

use App\Models\Url;
use App\Services\CitySitemapGenerator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use RuntimeException;
use Tests\TestCase;

class CitySitemapGeneratorTest extends TestCase
{
    private string $directory;

    protected function setUp(): void
    {
        parent::setUp();
        config(['app.url' => 'https://example.test/', 'database.default' => 'city_sitemap_test',
            'database.connections.city_sitemap_test' => [
                'driver' => 'sqlite', 'database' => ':memory:', 'prefix' => '',
            ],
        ]);
        DB::statement('CREATE TABLE cities (id INTEGER PRIMARY KEY)');
        DB::statement('CREATE TABLE urls (
            id INTEGER PRIMARY KEY AUTOINCREMENT, url TEXT, entity_class TEXT,
            entity_id INTEGER, master_id INTEGER, created_at TEXT, updated_at TEXT
        )');
        DB::table('cities')->insert([['id' => 1], ['id' => 2]]);
        $this->directory = sys_get_temp_dir().'/profelita-city-sitemap-'.bin2hex(random_bytes(8));
        mkdir($this->directory);
        $this->travelTo(now()->setDate(2026, 10, 11)->startOfDay());
    }

    protected function tearDown(): void
    {
        $this->travelBack();
        File::deleteDirectory($this->directory);
        DB::purge('city_sitemap_test');
        parent::tearDown();
    }

    public function test_city_sitemap_matches_compact_format_and_escapes_xml(): void
    {
        $this->insertUrl('/samara?a=1&b=2', Url::CITY, 1);
        $this->insertUrl('master', Url::MASTER, 1);
        $this->insertUrl('other-city', Url::CITY, 2);
        $filename = $this->generator()->generate(1, $this->directory);
        $this->assertSame($this->directory.'/sitemap_city_1.xml', $filename);
        $contents = file_get_contents($filename);
        $this->assertSame([
            '<?xml version="1.0" encoding="UTF-8"?>',
            '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">',
            '<url><loc>https://example.test/samara?a=1&amp;b=2</loc><lastmod>2026-10-11</lastmod><changefreq>yearly</changefreq><priority>0.1</priority></url>',
            '</urlset>',
        ], explode("\n", trim($contents)));
        $xml = simplexml_load_string($contents);
        $this->assertNotFalse($xml);
        $this->assertCount(1, $xml->url);
        $this->assertSame('https://example.test/samara?a=1&b=2', (string) $xml->url->loc);
        $this->assertSame([], glob($this->directory.'/.sitemap-*'));
    }

    public function test_regeneration_does_not_overwrite_another_citys_file(): void
    {
        $this->insertUrl('samara', Url::CITY, 1);
        $this->insertUrl('kazan', Url::CITY, 2);
        $generator = $this->generator();
        $first = $generator->generate(1, $this->directory);
        $second = $generator->generate(2, $this->directory);
        $secondContents = file_get_contents($second);
        DB::table('urls')->where('entity_id', 1)->update(['url' => 'new-samara']);
        $generator->generate(1, $this->directory);
        $this->assertStringContainsString('/new-samara</loc>', file_get_contents($first));
        $this->assertSame($secondContents, file_get_contents($second));
    }

    public function test_missing_url_preserves_existing_file(): void
    {
        $filename = $this->directory.'/sitemap_city_1.xml';
        file_put_contents($filename, 'previous sitemap');
        $this->insertUrl('master', Url::MASTER, 1);
        try {
            $this->generator()->generate(1, $this->directory);
            $this->fail('Expected missing city URL failure.');
        } catch (RuntimeException $exception) {
            $this->assertStringContainsString('У города нет URL', $exception->getMessage());
            $this->assertSame('previous sitemap', file_get_contents($filename));
        }
    }

    public function test_empty_site_address_preserves_existing_file(): void
    {
        $this->insertUrl('samara', Url::CITY, 1);
        $filename = $this->directory.'/sitemap_city_1.xml';
        file_put_contents($filename, 'previous sitemap');
        config(['app.url' => '']);
        try {
            $this->generator()->generate(1, $this->directory);
            $this->fail('Expected missing site address failure.');
        } catch (RuntimeException $exception) {
            $this->assertStringContainsString('Не задан адрес сайта', $exception->getMessage());
            $this->assertSame('previous sitemap', file_get_contents($filename));
            $this->assertSame([], glob($this->directory.'/.sitemap-*'));
        }
    }

    public function test_command_rejects_invalid_missing_city_and_missing_url(): void
    {
        $this->artisan('app:sitemap-generating-city', ['city_id' => '1abc'])->assertExitCode(1);
        $this->artisan('app:sitemap-generating-city', ['city_id' => 999])
            ->expectsOutput('Город не найден.')->assertExitCode(1);
        $this->artisan('app:sitemap-generating-city', ['city_id' => 1])
            ->expectsOutput('Не удалось сгенерировать sitemap: У города нет URL. Сначала выполните app:url-generating-city.')
            ->assertExitCode(1);
    }

    public function test_command_reports_generated_filename(): void
    {
        $this->insertUrl('samara', Url::CITY, 1);
        $originalBasePath = $this->app->basePath();
        $this->app->setBasePath($this->directory);
        try {
            $this->artisan('app:sitemap-generating-city', ['city_id' => 1])
                ->expectsOutput('Sitemap создан: '.$this->directory.'/sitemap_city_1.xml')
                ->assertExitCode(0);
            $this->assertFileExists($this->directory.'/sitemap_city_1.xml');
        } finally {
            $this->app->setBasePath($originalBasePath);
        }
    }

    private function generator(): CitySitemapGenerator
    {
        return $this->app->make(CitySitemapGenerator::class);
    }

    private function insertUrl(string $path, string $type, int $entityId): void
    {
        DB::table('urls')->insert(['url' => $path, 'entity_class' => $type, 'entity_id' => $entityId]);
    }
}

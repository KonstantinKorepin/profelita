<?php

namespace Tests\Feature;

use App\Models\Url;
use App\Services\MasterSitemapGenerator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use RuntimeException;
use Tests\TestCase;
use Throwable;

class MasterSitemapGeneratorTest extends TestCase
{
    private string $directory;

    protected function setUp(): void
    {
        parent::setUp();

        config(['app.url' => 'https://example.test/', 'database.default' => 'sitemap_test',
            'database.connections.sitemap_test' => [
                'driver' => 'sqlite', 'database' => ':memory:', 'prefix' => '',
            ],
        ]);
        DB::statement('CREATE TABLE masters (id INTEGER PRIMARY KEY)');
        DB::statement('CREATE TABLE urls (
            id INTEGER PRIMARY KEY AUTOINCREMENT, url TEXT, entity_class TEXT,
            entity_id INTEGER, master_id INTEGER, created_at TEXT, updated_at TEXT
        )');
        DB::table('masters')->insert([['id' => 1], ['id' => 2]]);
        $this->directory = sys_get_temp_dir().'/profelita-sitemap-'.bin2hex(random_bytes(8));
        mkdir($this->directory);
    }

    protected function tearDown(): void
    {
        File::deleteDirectory($this->directory);
        DB::purge('sitemap_test');
        parent::tearDown();
    }

    public function test_sitemap_escapes_urls_handles_null_dates_and_filters_other_entities(): void
    {
        $this->insertUrl('master', Url::MASTER, 1, 1, '2026-10-11 12:00:00');
        $this->insertUrl('/service?a=1&b=2', Url::SERVICE, 10, 1);
        $this->insertUrl('other-master', Url::MASTER, 2, 2);
        $this->insertUrl('other-service', Url::SERVICE, 20, 2);
        $this->insertUrl('city', Url::CITY, 1, 1);

        $filename = $this->generator()->generate(1, $this->directory);
        $this->assertSame($this->directory.'/sitemap_master_1.xml', $filename);
        $contents = file_get_contents($filename);
        $xml = simplexml_load_string($contents);
        $this->assertNotFalse($xml);
        $this->assertCount(2, $xml->url);
        $this->assertSame('https://example.test/master', (string) $xml->url[0]->loc);
        $this->assertSame('2026-10-11', (string) $xml->url[0]->lastmod);
        $this->assertSame('https://example.test/service?a=1&b=2', (string) $xml->url[1]->loc);
        $this->assertCount(0, $xml->url[1]->lastmod);
        $this->assertStringContainsString('&amp;', $contents);
        $lines = explode("\n", trim($contents));
        $this->assertSame('<?xml version="1.0" encoding="UTF-8"?>', $lines[0]);
        $this->assertSame('<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">', $lines[1]);
        $this->assertSame('<url><loc>https://example.test/master</loc><lastmod>2026-10-11</lastmod><changefreq>yearly</changefreq><priority>0.5</priority></url>', $lines[2]);
        $this->assertSame('<url><loc>https://example.test/service?a=1&amp;b=2</loc><changefreq>yearly</changefreq><priority>0.5</priority></url>', $lines[3]);
        $this->assertSame('</urlset>', $lines[4]);
        $this->assertSame([], glob($this->directory.'/.sitemap-*'));
    }

    public function test_large_sitemap_has_no_duplicates_across_batches(): void
    {
        $this->insertUrl('master', Url::MASTER, 1, 1);
        for ($index = 1; $index <= 105; $index++) {
            $this->insertUrl('service-'.$index, Url::SERVICE, $index, 1);
        }

        $xml = simplexml_load_file($this->generator()->generate(1, $this->directory));
        $this->assertCount(106, $xml->url);
        $paths = [];
        foreach ($xml->url as $url) {
            $paths[] = (string) $url->loc;
        }
        $this->assertCount(106, array_unique($paths));
    }

    public function test_regeneration_replaces_only_the_selected_masters_file(): void
    {
        $this->insertUrl('master', Url::MASTER, 1, 1);
        $this->insertUrl('other-master', Url::MASTER, 2, 2);
        $generator = $this->generator();
        $firstFile = $generator->generate(1, $this->directory);
        $secondFile = $generator->generate(2, $this->directory);
        $secondContents = file_get_contents($secondFile);

        $this->insertUrl('new-service', Url::SERVICE, 10, 1);
        $generator->generate(1, $this->directory);
        $this->assertCount(2, simplexml_load_file($firstFile)->url);
        $this->assertSame($secondContents, file_get_contents($secondFile));
    }

    public function test_failure_during_generation_preserves_old_file_and_removes_temporary_file(): void
    {
        $filename = $this->directory.'/sitemap_master_1.xml';
        file_put_contents($filename, 'previous sitemap');
        $this->insertUrl('master', Url::MASTER, 1, 1);
        $this->insertUrl('bad-date', Url::SERVICE, 10, 1, 'not-a-date');

        $exception = null;
        try {
            $this->generator()->generate(1, $this->directory);
        } catch (Throwable $caught) {
            $exception = $caught;
        }

        $this->assertNotNull($exception);
        $this->assertSame('previous sitemap', file_get_contents($filename));
        $this->assertSame([], glob($this->directory.'/.sitemap-*'));
    }

    public function test_missing_urls_do_not_overwrite_existing_file(): void
    {
        $filename = $this->directory.'/sitemap_master_1.xml';
        file_put_contents($filename, 'previous sitemap');
        try {
            $this->generator()->generate(1, $this->directory);
            $this->fail('Expected missing URLs failure.');
        } catch (RuntimeException $exception) {
            $this->assertStringContainsString('нет URL', $exception->getMessage());
            $this->assertSame('previous sitemap', file_get_contents($filename));
        }
    }

    public function test_command_rejects_invalid_and_missing_master(): void
    {
        $this->artisan('app:sitemap-generating-master', ['master_id' => '1abc'])->assertExitCode(1);
        $this->artisan('app:sitemap-generating-master', ['master_id' => 999])
            ->expectsOutput('Мастер не найден.')->assertExitCode(1);
    }

    public function test_command_reports_generated_filename(): void
    {
        $this->insertUrl('master', Url::MASTER, 1, 1);
        $originalBasePath = $this->app->basePath();
        $this->app->setBasePath($this->directory);
        try {
            $this->artisan('app:sitemap-generating-master', ['master_id' => 1])
                ->expectsOutput('Sitemap создан: '.$this->directory.'/sitemap_master_1.xml')
                ->assertExitCode(0);
            $this->assertFileExists($this->directory.'/sitemap_master_1.xml');
        } finally {
            $this->app->setBasePath($originalBasePath);
        }
    }

    private function generator(): MasterSitemapGenerator
    {
        return $this->app->make(MasterSitemapGenerator::class);
    }

    private function insertUrl(string $path, string $type, int $entityId, int $masterId, ?string $date = null): void
    {
        DB::table('urls')->insert([
            'url' => $path, 'entity_class' => $type, 'entity_id' => $entityId,
            'master_id' => $masterId, 'updated_at' => $date,
        ]);
    }
}

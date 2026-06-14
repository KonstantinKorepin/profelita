<?php

namespace App\Console\Commands;

use App\Models\Url;
use Illuminate\Console\Command;

class SitemapGeneratingCity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sitemap-generating-city {city_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Генерация карты для города';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $cityId = $this->argument('city_id');
        $url = Url::where(['entity_class' => URL::CITY, 'entity_id' => $cityId])->get()->first();

        $filename = base_path() . DIRECTORY_SEPARATOR . 'sitemap_city_data.xml';
        $file = fopen($filename, 'w+');
        fwrite($file, '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL);
        fwrite($file, '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL);
        fwrite($file, '<url>');
        fwrite($file, '<loc>' . env('APP_URL') . '/' . $url->url . '</loc>');
        fwrite($file, '<lastmod>' . date('Y-m-d') . '</lastmod>');
        fwrite($file, '<changefreq>yearly</changefreq>');
        fwrite($file, '<priority>0.1</priority>');
        fwrite($file, '</url>' . PHP_EOL);
        fwrite($file, '</urlset>');
        fclose($file);

        $this->info('Готово!');
    }
}

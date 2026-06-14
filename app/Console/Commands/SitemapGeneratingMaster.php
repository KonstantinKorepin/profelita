<?php

namespace App\Console\Commands;

use App\Models\Url;
use Illuminate\Console\Command;

class SitemapGeneratingMaster extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sitemap-generating-master {master_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Генерация карты для мастера';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $masterId = $this->argument('master_id');
        $filename = base_path() . DIRECTORY_SEPARATOR . 'sitemap_master_data.xml';
        $file = fopen($filename, 'w+');
        fwrite($file, '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL);
        fwrite($file, '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL);

        // url самого мастера
        Url::where(['entity_class' => Url::MASTER, 'entity_id' => $masterId])->chunk(3, function ($urls) use ($file) {
            foreach ($urls as $url) {
                $date = \DateTime::createFromFormat('Y-m-d H:i:s', $url->updated_at)->format('Y-m-d');

                fwrite($file, '<url>');
                fwrite($file, '<loc>' . env('APP_URL') . '/'. $url->url . '</loc>');
                fwrite($file, '<lastmod>' . $date . '</lastmod>');
                fwrite($file, '<changefreq>yearly</changefreq>');
                fwrite($file, '<priority>0.5</priority>');
                fwrite($file, '</url>' . PHP_EOL);
            }
        });

        // url услуг
        Url::where(['entity_class' => Url::SERVICE, 'master_id' => $masterId])->chunk(3, function ($urls) use ($file) {
            foreach ($urls as $url) {
                $date = \DateTime::createFromFormat('Y-m-d H:i:s', $url->updated_at)->format('Y-m-d');

                fwrite($file, '<url>');
                fwrite($file, '<loc>' . env('APP_URL') . '/'. $url->url . '</loc>');
                fwrite($file, '<lastmod>' . $date . '</lastmod>');
                fwrite($file, '<changefreq>yearly</changefreq>');
                fwrite($file, '<priority>0.5</priority>');
                fwrite($file, '</url>' . PHP_EOL);
            }
        });

        fwrite($file, '</urlset>');
        fclose($file);

        $this->info('Готово!');
    }
}

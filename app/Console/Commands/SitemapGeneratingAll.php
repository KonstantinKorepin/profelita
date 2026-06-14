<?php

namespace App\Console\Commands;

use App\Models\Url;
use Illuminate\Console\Command;

class SitemapGeneratingAll extends Command
{
    private $urls = [
        Url::CITY => 'sitemap_cities.xml',
        Url::MASTER => 'sitemap_masters.xml',
        Url::SERVICE => 'sitemap_services.xml',
    ];

    private $constantsUrls = [
        'about',
        'geography',
        'guarantee',
        'partner',
        'reviews',
        'masters',
        'contacts'
    ];

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sitemap-generating-all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Генерация всей карты сайта';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $filename = base_path() . DIRECTORY_SEPARATOR . 'sitemap_pages.xml';
        $file = fopen($filename, 'w+');
        fwrite($file, '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL);
        fwrite($file, '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL);
        foreach ($this->constantsUrls as $url) {
            fwrite($file, '<url>');
            fwrite($file, '<loc>' . env('APP_URL') . '/'. $url . '</loc>');
            fwrite($file, '<lastmod>' . date('Y-m-d') . '</lastmod>');
            fwrite($file, '<changefreq>never</changefreq>');
            fwrite($file, '<priority>0.1</priority>');
            fwrite($file, '</url>' . PHP_EOL);
        }
        fwrite($file, '</urlset>');
        fclose($file);

        foreach ($this->urls as $entityClass => $filename) {
            $filename = base_path() . DIRECTORY_SEPARATOR . $filename;
            $file = fopen($filename, 'w+');
            fwrite($file, '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL);
            fwrite($file, '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL);

            Url::whereEntityClass($entityClass)->chunk(3, function ($urls) use ($file) {
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
        }

        $this->info('Готово!');
    }
}

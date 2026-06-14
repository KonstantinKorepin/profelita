<?php

namespace App\Console\Commands;

use App\Models\Master;
use App\Models\Service;
use App\Models\Url;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;

class UrlGeneratingMaster extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:url-generating-master {master_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Команда генерирует url для мастера';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $masterId = $this->argument('master_id');
        $this->generateMasterUrl($masterId);
        $this->generateServices($masterId);

        $this->info('Готово!');
    }

    /**
     * Генерирует url мастера
     * @param $masterId
     */
    private function generateMasterUrl($masterId): void
    {
        $master = Master::whereId($masterId)->get()->first();

        $countUrls = Url::where('url', 'LIKE', '%' . str_slug($master->getFullName()) . '%')->get()->count();
        $path = ($countUrls > 0) ? str_slug($master->getFullName()) . '_' . $countUrls : str_slug($master->getFullName());

        $url = new Url();
        $url->url = $path;
        $url->entity_id = $master->id;
        $url->master_id = $master->id;
        $url->entity_class = Url::MASTER;
        $url->save();
    }

    /**
     * Генерирует url сервисов
     * @param $masterId
     */
    private function generateServices($masterId): void
    {
        Service::where(['master_id' => $masterId, 'section' => false])->chunk(3, function (Collection $services) {
            foreach ($services as $service) {
                $url = new Url();
                $url->url = str_slug($service->name);
                $url->entity_id = $service->id;
                $url->master_id = $service->master->id;
                $url->entity_class = Url::SERVICE;
                $url->save();
            }
        });
    }

}

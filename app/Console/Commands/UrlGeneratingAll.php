<?php

namespace App\Console\Commands;

use App\Models\City;
use App\Models\Master;
use App\Models\Service;
use App\Models\Url;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;

class UrlGeneratingAll extends Command
{
    private $mastersUrls = [];

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:url-generating-all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Генерация url всех страниц';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->generateCities();
        $this->generateServices();
        $this->generateMasters();

        $this->info('Готово!');
    }

    /**
     * Генерирует url городов
     */
    private function generateCities(): void
    {
        City::whereActive(true)->chunk(3, function (Collection $cities) {
                foreach ($cities as $city) {
                    $url = new Url();
                    $url->url = $city->code;
                    $url->entity_id = $city->id;
                    $url->entity_class = Url::CITY;
                    $url->save();
                }
            });
    }

    /**
     * Генерирует url сервисов
     */
    private function generateServices(): void
    {
        Service::whereSection(false)->chunk(3, function (Collection $services) {
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

    /**
     * Генерирует url мастеров
     */
    private function generateMasters(): void
    {
        Master::whereActual(true)->chunk(3, function (Collection $masters) {
            foreach ($masters as $master) {
                // если мастер с таким ФИО уже есть, то добавляем цифру на конце с нижним подчёркиванием
                if (in_array(str_slug($master->getFullName()), $this->mastersUrls)) {
                    $countUrls = Url::where('url', 'LIKE', '%' . str_slug($master->getFullName()) . '%')->get()->count();
                    $path = str_slug($master->getFullName()) . '_' . $countUrls;
                } else {
                    $path = str_slug($master->getFullName());
                }

                $url = new Url();
                $url->url = $path;
                $url->entity_id = $master->id;
                $url->master_id = $master->id;
                $url->entity_class = Url::MASTER;
                $url->save();

                $this->mastersUrls[] = str_slug($master->getFullName());
            }
        });
    }
}

<?php

namespace App\Console\Commands;

use App\Models\City;
use App\Models\Url;
use Illuminate\Console\Command;

class UrlGeneratingCity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:url-generating-city {city_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Команда генерирует url для города';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $cityId = $this->argument('city_id');
        $this->generateCityUrl($cityId);
    }

    /**
     * Генерирует url города
     * @param $cityId
     */
    private function generateCityUrl($cityId): void
    {
        $city = City::whereId($cityId)->get()->first();

        $url = new Url();
        $url->url = $city->code;
        $url->entity_id = $cityId;
        $url->entity_class = Url::CITY;
        $url->save();

        $this->info('Готово!');
    }
}

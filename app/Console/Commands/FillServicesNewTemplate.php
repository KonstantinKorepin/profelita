<?php

namespace App\Console\Commands;

use App\Models\City;
use App\Models\Master;
use App\Models\Service;
use App\Models\ServiceTemplate;
use App\Services\StringHelper;
use Illuminate\Console\Command;

class FillServicesNewTemplate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fill-services-template {service_template_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Заполнение данных по услугам по всем мастерам по определённому шаблону';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        foreach (City::all() as $city) {
            $cities[$city->id] = $city;
        }

        $serviceTemplate = ServiceTemplate::whereId($this->argument('service_template_id'))->get()->first();
        $specializationId = $serviceTemplate->specialization_id;

        Master::whereActual(true)
            ->where(['specialization_id' => $specializationId])
            ->chunk(3, function ($masters) use ($cities, $serviceTemplate) {
                foreach ($masters as $master) {
                    $city = $cities[$master->city_id];
                    $cityPrepositional = $city->prepositional;
                    $cityName = $city->name;

                    $service = new Service();
                    $service->master_id = $master->id;
                    $service->service_templates_id = $serviceTemplate->id;

                    if (!empty($serviceTemplate->parent_id)) {
                        $parentServiceTemplatesData[$serviceTemplate->id] = $serviceTemplate->parent_id;
                    }

                    if (!empty($serviceTemplate->parent_id)) {
                        // берём id сервиса, которая привязана к данному пользователю, и у
                        // которой service_templates_id = $serviceTemplate->parent_id
                        // и привязываем уже к данной услуге как parent_id
                        $serviceParent = Service::whereMasterId($master->id)
                                            ->where(['service_templates_id' => $serviceTemplate->parent_id])
                                            ->get()->first();
                        if (!empty($serviceParent)) {
                            $service->parent_id = $serviceParent->id;
                        }
                    }

                    $service->name = str_replace('{:prepositional}', $cityPrepositional, StringHelper::getSeoTagString($serviceTemplate->name));
                    $service->h1 = str_replace('{:prepositional}', $cityPrepositional, StringHelper::getSeoTagString($serviceTemplate->h1));
                    $service->title = str_replace('{:prepositional}', $cityPrepositional, StringHelper::getSeoTagString($serviceTemplate->title));
                    $service->description = str_replace('{:prepositional}', $cityPrepositional, StringHelper::getSeoTagString($serviceTemplate->description));
                    $service->keywords = str_replace('{:name}', $cityName, StringHelper::getSeoTagString($serviceTemplate->keywords));
                    $service->template = $serviceTemplate->default_template;
                    $service->main_service = $serviceTemplate->main_service;
                    $service->on_city_list = $serviceTemplate->on_city_list;
                    $service->section = $serviceTemplate->section;
                    $service->price = $serviceTemplate->default_price;
                    $service->sort = $serviceTemplate->sort;
                    $service->save();
                }
            });

        $this->info('Готово!');
    }
}

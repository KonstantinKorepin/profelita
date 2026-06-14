<?php

namespace App\Console\Commands;

use App\Models\City;
use App\Models\Master;
use App\Models\Service;
use App\Models\ServiceTemplate;
use App\Services\StringHelper;
use Illuminate\Console\Command;

class FillServicesMaster extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fill-services-master {master_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Заполнение данных по услугам по определённому мастеру';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $master = Master::whereId($this->argument('master_id'))->get()->first();
        $master->actual = true;
        $master->save();

        $city = City::whereId($master->city_id)->get()->first();
        $city->active = true;
        $city->save();

        $specializationId = $master->specialization_id;
        $cityPrepositional = $city->prepositional;
        $cityName = $city->name;

        $parentServiceTemplatesData = [];
        $parentServicesData = [];

        ServiceTemplate::whereSpecializationId($specializationId)
            ->chunk(3, function ($serviceTemplates) use($master,
                                                              &$parentServicesData,
                                                              &$parentServiceTemplatesData,
                                                              $cityPrepositional,
                                                              $cityName)
            {

                foreach ($serviceTemplates as $serviceTemplate) {
                    $service = new Service();
                    $service->master_id = $master->id;
                    $service->service_templates_id = $serviceTemplate->id;

                    if (!empty($serviceTemplate->parent_id)) {
                        $parentServiceTemplatesData[$serviceTemplate->id] = $serviceTemplate->parent_id;
                    }

                    // вычисляем parent_id родительской услуги, если такая есть.
                    if (!empty($parentServiceTemplatesData[$serviceTemplate->id])) {
                        $serviceParentId = $parentServicesData[$parentServiceTemplatesData[$serviceTemplate->id]];
                    } else {
                        $serviceParentId = null;
                    }

                    $service->parent_id = $serviceParentId;

                    $name = str_replace('{:prepositional}', $cityPrepositional, StringHelper::getSeoTagString($serviceTemplate->name));
                    $name = str_replace('{:name}', $cityName, StringHelper::getSeoTagString($name));
                    $service->name = $name;

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

                    $parentServicesData[$service->service_templates_id] = $service->id;
                }
            });

        $this->info('Готово!');
    }
}

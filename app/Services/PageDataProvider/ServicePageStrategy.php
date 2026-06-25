<?php

namespace App\Services\PageDataProvider;

use App\Models\Service;
use App\Models\Url;
use App\Services\ServiceService;

class ServicePageStrategy implements PageDataStrategyInterface
{
    public function __construct(
        private ServiceService $serviceService
    ){}

    /**
     * Возвращает данные услуги
     * @param Url $url
     * @return PageResult
     */
    public function getData(Url $url): PageResult
    {
        $service = $this->serviceService->getOne($url->entity_id);
        $master = $service->master;
        $city = $master->city;
        $specialization = $service->serviceTemplate->specialization;
        $areas = $city->areas->pluck('description', 'name')->toArray();

        $data = [
            'service' => $service,
            'master' => $master,
            'city' => $city,
            'caption' => $specialization->catalog_caption_list,
            'service_template' => $service->template,
            'areas' => $areas,
            'breadcrumbs' => $this->getBreadcrumbs($city, $specialization, $service),
            'serviceList' => $this->serviceService->getSpecializationServices(
                $city->id ?? session('cityId'),
                $specialization->id,
                $url->url
            )
        ];

        return new PageResult(
            template: 'templates.services.main_template',
            data: $data,
        );
    }

    /**
     * Хлебные крошки
     * @param $city
     * @param $specialization
     * @param Service $service
     * @return array[]
     */
    private function getBreadcrumbs($city, $specialization, Service $service): array
    {
        return [
            ['name' => config('app.home_breadcrumb'), 'url' => $city->code],
            ['name' => $specialization->catalog_name, 'url' => $this->serviceService->getMainServiceUrl($service->master_id)],
            ['name' => $service->name, 'url' => null],
        ];
    }
}

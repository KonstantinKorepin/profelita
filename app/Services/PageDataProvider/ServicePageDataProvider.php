<?php

namespace App\Services\PageDataProvider;

use App\Models\Service;
use App\Models\ServiceTemplate;
use App\Models\Url;
use Illuminate\Support\Facades\DB;

class ServicePageDataProvider extends PageDataProvider implements PageDataProviderInterface
{
    public function getData(): array
    {
        $service = Service::whereId($this->url->entity_id)->get()->first();
        $master = $service->master;
        $city = $master->city;
        //$specialization = $service->serviceTemplate()->get()->first()->specialization()->get()->first();
        $specialization = $service->serviceTemplate->specialization;
        $areas = $city->areas->pluck('description', 'name')->toArray();

        $data['template'] = 'templates.services.main_template';

        $data['data'] = [
            'service' => $service,
            'master' => $master,
            'city' => $city,
            'caption' => $specialization->catalog_caption_list,
            'service_template' => $service->template,
            'areas' => $areas
        ];

        // хлебные крошки
        $breadcrumbs = [];
        $breadcrumbs[] = [
            'name' => 'Главная',
            'url' => $city->code
        ];

        $mainService = Service::where([
            'master_id' => $master->id,
            'main_service' => true
        ])->get()->first();
        $mainServiceUrl = Url::where([
            'entity_class' => Url::SERVICE,
            'entity_id' => $mainService->id,
        ])->get()->first()->url;
        $breadcrumbs[] = [
            'name' => $specialization->catalog_name,
            'url' => $mainServiceUrl
        ];

        $breadcrumbs[] = [
            'name' => $service->name,
            'url' => null
        ];

        $data['data']['breadcrumbs'] = $breadcrumbs;

        // список всех услуг текущего мастера для меню
        $sql = "select
                   s.id,
                   sp.id as specialization_id,
                   s.parent_id,
                   s.name,
                   st.catalog_name,
                   s.main_service,
                   s.on_city_list,
                   s.sort,
                   u.url
                from services s
                inner join masters m
                on s.master_id = m.id
                inner join specializations sp
                on m.specialization_id = sp.id
                left join urls u
                on (u.master_id = m.id and u.entity_class = 'service' and u.entity_id = s.id)
                inner join service_templates st
                on st.id = s.service_templates_id
                where m.city_id = :city_id
                    and sp.id = :specialization_id
                    and sp.active is true
                    and s.active is true
                order by s.sort;";

        $services = DB::select($sql, ['city_id' => session('cityId'), 'specialization_id' => $specialization->id]);

        $serviceList = [];
        foreach ($services as $service) {
            if (is_null($service->parent_id)) {
                $serviceList[$service->id] = (array) $service;
                $serviceList[$service->id]['active'] = ($this->url->url === $service->url);
            } else {
                $serviceList[$service->parent_id]['list'][] = (array) $service;
                $count = count($serviceList[$service->parent_id]['list']) - 1;
                $serviceList[$service->parent_id]['list'][$count]['active'] = ($this->url->url === $service->url);
                // если услуга находится в секции, то вся секция становится активной
                if (($this->url->url === $service->url)) {
                    $serviceList[$service->parent_id]['section_active'] = true;
                }
            }
        }

        $data['data']['serviceList'] = $serviceList;

        return $data;
    }
}

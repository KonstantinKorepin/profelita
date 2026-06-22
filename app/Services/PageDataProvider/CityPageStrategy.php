<?php

namespace App\Services\PageDataProvider;

use App\Models\City;
use App\Models\Master;
use App\Models\Url;
use App\Services\MasterService;
use Illuminate\Support\Facades\DB;

class CityPageStrategy implements PageDataStrategyInterface
{
    public function __construct(
        private MasterService $masterService
    ) {}

    public function getData(Url $url): array
    {
        $city = City::find($url->entity_id);
        $master = Master::find($url->master_id);

        $data['template'] = 'pages.city';
        $data['data'] = [
            'city' => $city,
            'masters' => $this->masterService->getFrontMasters(),
            'master' => $master,
            'map' => $master->map ?? null
        ];

        $sql = "select
                   s.id,
                   sp.id as specialization_id,
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
                inner join urls u
                on (u.master_id = m.id and u.entity_class = :entity_class and u.entity_id = s.id)
                inner join service_templates st
                on st.id = s.service_templates_id
                where m.city_id = :city_id
                    and s.active is true
                    and ((s.main_service is true) OR (s.on_city_list is TRUE))
                    and sp.active is true
                order by sp.sort, st.sort";

        $services = DB::select($sql, [
            ':city_id' => $city->id,
            ':entity_class' => Url::SERVICE
        ]);

        foreach ($services as $service) {
            if ($service->main_service) {
                $data['data']['services'][$service->specialization_id]['mainService'] = $service;
            } else {
                $data['data']['services'][$service->specialization_id]['servicesList'][] = $service;
            }
        }

        return $data;
    }
}

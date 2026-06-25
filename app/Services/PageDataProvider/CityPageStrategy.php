<?php

namespace App\Services\PageDataProvider;

use App\Models\Url;
use App\Services\CityService;
use App\Services\MasterService;
use App\Services\ReviewService;
use Illuminate\Support\Facades\DB;

class CityPageStrategy implements PageDataStrategyInterface
{
    public function __construct(
        private MasterService $masterService,
        private ReviewService $reviewService,
        private CityService $cityService
    ) {}

    /**
     * Возвращает данные города
     * @param Url $url
     * @return PageResult
     */
    public function getData(Url $url): PageResult
    {
        $city = $this->cityService->getOne($url->entity_id);
        $master = $url->master_id ? $this->masterService->getOne($url->master_id) : null;

        $data = [
            'city' => $city,
            'masters' => $this->masterService->getFrontMasters(),
            'master' => $master,
            'reviews' => $this->reviewService->getFrontReviews(),
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
                $data['services'][$service->specialization_id]['mainService'] = $service;
            } else {
                $data['services'][$service->specialization_id]['servicesList'][] = $service;
            }
        }

        return new PageResult(
            template: 'pages.city',
            data: $data,
        );
    }
}

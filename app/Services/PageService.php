<?php

namespace App\Services;

use App\Models\City;
use App\Models\Master;
use App\Models\Service;
use App\Models\Specialization;
use App\Models\Url;
use Illuminate\Support\Facades\DB;

class PageService
{
    public function __construct(
        private ReviewService $reviewService,
        private MasterService $masterService
    ){}

    /**
     * Возвращает данные для страниц
     * @param string $url
     * @return array|null
     */
    public function getPageData(string $url): ?array
    {
        // обновляем данные сессии
        $this->updateDynamicPageSessionData($url);

        $url = Url::whereUrl($url)->get()->first();
        if (empty($url)) {
            return null;
        }

        switch ($url->entity_class) {
            case Url::CITY:
                $data = $this->getCityData($url);
                break;
            case Url::MASTER:
                $data = $this->getMasterData($url);
                break;
            case Url::SERVICE:
                $data = $this->getServiceData($url);
                break;
        }

        return $data;
    }

    /**
     * возвращает данные по городу
     * @param Url $url
     * @return array
     */
    private function getCityData(Url $url): array
    {
        $data['template'] = 'pages.city';
        $city = City::whereId($url->entity_id)->get()->first();
        $master = Master::whereId($url->master_id)->get()->first();

        $data['data'] = [
            'city' => $city,
            'masters' => $this->masterService->getFrontMasters(),
            'master' => $master,
            'map' => isset($master->map) ? $master->map : null
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

    /**
     * возвращает данные по мастеру
     * @param Url $url
     * @return array
     */
    private function getMasterData(Url $url): array
    {
        $data['template'] = 'pages.master';
        $master = Master::whereId($url->entity_id)->get()->first();

        $data['data'] = [
            'master' => $master,
            'reviews' => $this->reviewService->getAllReviewsByMasterPaginate($master->id),
            'mainPageLink' => $this->getMainLinkPage()
        ];

        return $data;
    }

    /**
     * возвращает данные по услуге
     * @param Url $url
     * @return array
     */
    private function getServiceData(Url $url): array
    {
        $service = Service::whereId($url->entity_id)->get()->first();
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
                $serviceList[$service->id]['active'] = ($url->url === $service->url);
            } else {
                $serviceList[$service->parent_id]['list'][] = (array) $service;
                $count = count($serviceList[$service->parent_id]['list']) - 1;
                $serviceList[$service->parent_id]['list'][$count]['active'] = ($url->url === $service->url);
                // если услуга находится в секции, то вся секция становится активной
                if (($url->url === $service->url)) {
                    $serviceList[$service->parent_id]['section_active'] = true;
                }
            }
        }

        $data['data']['serviceList'] = $serviceList;

        return $data;
    }

    /**
     * обновляем данные сессии для динамических страниц
     * @param string $url
     */
    private function updateDynamicPageSessionData(string $url): void
    {
        if ($url === '/') {
            $city = City::whereName(env('APP_MAIN_CITY_NAME'))->get()->first();

            $master = Master::join('specializations', 'masters.specialization_id', '=', 'specializations.id')
                ->where('specializations.code', '=', Specialization::PLUMBER)
                ->where('masters.city_id', '=', $city->id)
                ->get()->first();
            $this->updateSessionData($city, $master);
            return;
        }

        $url = Url::whereUrl($url)->get()->first();
        if (empty($url)) {
            return;
        }
        switch ($url->entity_class) {
            case Url::CITY:
                $city = City::whereId($url->entity_id)->get()->first();
                $master = Master::join('specializations', 'masters.specialization_id', '=', 'specializations.id')
                    ->where('specializations.code', '=', Specialization::PLUMBER)
                    ->where('masters.city_id', '=', $city->id)
                    ->get()->first();
                break;
            case Url::MASTER:
                $master = Master::whereId($url->entity_id)->get()->first();
                $city = $master->city()->get()->first();
                break;
            case Url::SERVICE:
                $service = Service::whereId($url->entity_id)->get()->first();
                $master = $service->master()->get()->first();
                $city = $master->city()->get()->first();
                break;
        }
        $this->updateSessionData($city, $master);

        return;
    }

    /**
     * обновляем данные сессии для простых страниц
     */
    public function updateSimplePageSessionData(): void
    {
        if (!empty(session('cityId'))) {
            return;
        }

        $city = City::whereName(env('APP_MAIN_CITY_NAME'))->get()->first();
        $master = Master::join('specializations', 'masters.specialization_id', '=', 'specializations.id')
            ->where('specializations.code', '=', Specialization::PLUMBER)
            ->where('masters.city_id', '=', $city->id)
            ->get()->first();
        $this->updateSessionData($city, $master);

        return;
    }

    /**
     * записываем данные сессии в переменные
     * @param City $city
     * @param Master $master
     */
    private function updateSessionData(City $city, Master $master): void
    {
        session(['cityId' => $city->id]);
        session(['cityCode' => $city->code]);
        session(['cityName' => $city->name]);
        session(['phone' => $master->phone]);
        session(['address' => $master->address ?? 'ул. Шоссе Энтузиастов, д. 31, стр. 36']);
        session(['phoneNumber' => preg_replace('/[\s-]/', '', $master->phone)]);
        session(['starWorkingHours' => $master->start_working_hours]);
        session(['endWorkingHours' => $master->end_working_hours]);
        session(['cityUrl' => ($city->code != env('APP_MAIN_CITY_CODE')) ? $city->code : route('main')]);
        return;
    }

    /**
     * возвращает код текущего города
     * @return string
     */
    public function getMainLinkPage(): string
    {
        return session('cityCode') ?? '/';
    }

}

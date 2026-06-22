<?php

namespace App\Services;

use App\Models\Url;
use App\Models\City;
use App\Models\Master;
use App\Repositories\MasterRepository;
use App\Repositories\ServiceRepository;
use App\Repositories\SessionRepository;

class PageSessionDataService
{
    public function __construct(
        private SessionRepository $sessionRepository,
        private MasterRepository $masterRepository,
        private ServiceRepository $serviceRepository
    ){}

    /**
     * Обновляет данные сессии для простых страниц
     */
    public function updateSimplePageSessionData(): void
    {
        $sessionDto = $this->sessionRepository->getDataBySession();
        $this->updateSessionData($sessionDto->getCity(), $sessionDto->getMaster());
    }

    /**
     * Обновляет данные сессии для динамических страниц
     * @param string $url
     */
    public function updateDynamicPageSessionData(string $url): void
    {
        if ($url === route('main')) {
            $sessionDto = $this->sessionRepository->getDataBySession();
            $this->updateSessionData($sessionDto->getCity(), $sessionDto->getMaster());
            return;
        }

        $url = Url::whereUrl($url)->firstOrFail();
        switch ($url->entity_class) {
            case Url::CITY:
                $sessionDto = $this->sessionRepository->getDataBySession($url);
                $city = $sessionDto->getCity();
                $master = $sessionDto->getMaster();
                break;
            case Url::MASTER:
                $master = $this->masterRepository->getOne($url->entity_id);
                $city = $master->city;
                break;
            case Url::SERVICE:
                $service = $this->serviceRepository->getOne($url->entity_id);
                $master = $service->master;
                $city = $master->city;
                break;
            default:
                $sessionDto = $this->sessionRepository->getDataBySession();
                $master = $sessionDto->getMaster();
                $city = $sessionDto->getCity();
        }
        $this->updateSessionData($city, $master);
    }

    /**
     * Записывает данные сессии в переменные
     * @param City $city
     * @param Master $master
     */
    private function updateSessionData(City $city, Master $master): void
    {
        session([
            'cityId' => $city->id,
            'cityCode' => $city->code,
            'cityName' => $city->name,
            'phone' => $master->phone,
            'specializationCode' => $master->specialization->code,
            'address' => $master->address ?? config('app.default_address'),
            'phoneNumber' => preg_replace('/[\s-]/', '', $master->phone),
            'starWorkingHours' => $master->start_working_hours,
            'endWorkingHours' => $master->end_working_hours,
            'cityUrl' => ($city->code != config('app.main_city_code')) ? $city->code : route('main'),
            'masterId' => $master->id,
        ]);
    }
}

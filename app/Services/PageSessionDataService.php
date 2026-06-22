<?php

namespace App\Services;

use App\Models\Url;
use App\Models\City;
use App\Models\Master;
use App\Services\PageSessionData\CitySessionStrategy;
use App\Services\PageSessionData\MasterSessionStrategy;
use App\Services\PageSessionData\ServiceSessionStrategy;
use App\Repositories\SessionRepository;

class PageSessionDataService
{
    public function __construct(
        private SessionRepository $sessionRepository,
        private CitySessionStrategy $citySessionStrategy,
        private MasterSessionStrategy $masterSessionStrategy,
        private ServiceSessionStrategy $serviceSessionStrategy,
    ){}

    /**
     * Обновляет статичные страницы
     * @return void
     */
    public function updateSimplePageSessionData(): void
    {
        $sessionDto = $this->sessionRepository->getDataBySession();
        $this->updateSessionData($sessionDto->getCity(), $sessionDto->getMaster());
    }

    /**
     * Обновляет динамические страницы
     * @param string $url
     * @return void
     */
    public function updateDynamicPageSessionData(string $url): void
    {
        if ($url === route('main')) {
            $this->updateSimplePageSessionData();
            return;
        }

        $url = Url::whereUrl($url)->firstOrFail();
        $strategy = match ($url->entity_class) {
            Url::CITY => $this->citySessionStrategy,
            Url::MASTER => $this->masterSessionStrategy,
            Url::SERVICE => $this->serviceSessionStrategy,
            default => null,
        };

        if ($strategy) {
            $sessionDto = $strategy->getData($url);
            $this->updateSessionData($sessionDto->getCity(), $sessionDto->getMaster());
        }
    }

    /**
     * Обновляет массив сессии
     * @param City $city
     * @param Master $master
     * @return void
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
            'phoneNumber' => StringHelper::getClearPhone($master->phone),
            'starWorkingHours' => $master->start_working_hours,
            'endWorkingHours' => $master->end_working_hours,
            'cityUrl' => ($city->code != config('app.main_city_code')) ? $city->code : route('main'),
            'masterId' => $master->id,
        ]);
    }
}

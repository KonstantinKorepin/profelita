<?php

namespace App\Services;

use App\Models\Url;
use App\Models\City;
use App\Models\Master;
use App\Services\PageSessionData\CitySessionStrategy;
use App\Services\PageSessionData\MasterSessionStrategy;
use App\Services\PageSessionData\ServiceSessionStrategy;
use App\Repositories\Interfaces\SessionRepositoryInterface;
use App\Repositories\Interfaces\UrlRepositoryInterface;

class PageSessionDataService
{
    public function __construct(
        private readonly SessionRepositoryInterface $sessionRepository,
        private readonly UrlRepositoryInterface $urlRepository,
        private readonly CitySessionStrategy $citySessionStrategy,
        private readonly MasterSessionStrategy $masterSessionStrategy,
        private readonly ServiceSessionStrategy $serviceSessionStrategy,
    ){}

    /**
     * Обновляет статичные страницы
     * @return void
     */
    public function updateSimplePageSessionData(): void
    {
        $sessionDto = $this->sessionRepository->getDataBySession();
        $this->updateSessionData($sessionDto->city, $sessionDto->master);
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

        $url = $this->urlRepository->getByUrl($url);
        $strategy = match ($url->entity_class) {
            Url::CITY => $this->citySessionStrategy,
            Url::MASTER => $this->masterSessionStrategy,
            Url::SERVICE => $this->serviceSessionStrategy,
            default => null,
        };

        if ($strategy) {
            $sessionDto = $strategy->getData($url);
            $this->updateSessionData($sessionDto->city, $sessionDto->master);
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

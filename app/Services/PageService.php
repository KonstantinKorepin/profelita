<?php

namespace App\Services;

use App\Models\City;
use App\Models\Master;
use App\Models\Service;
use App\Models\Specialization;
use App\Models\Url;
use App\Services\PageDataProvider\PageDataProviderFactory;

class PageService
{
    /**
     * Возвращает данные для страниц
     * @param string $uri
     * @return array|null
     */
    public function getPageData(string $uri): ?array
    {
        $this->updateDynamicPageSessionData($uri);

        $url = Url::whereUrl($uri)->firstOrFail();
        $factory = resolve(PageDataProviderFactory::class);
        $provider = $factory->createPageDataProvider($url);
        return $provider->getData($url);
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
    }

    /**
     * Возвращает код текущего города
     * @return string
     */
    public function getMainLinkPage(): string
    {
        return session('cityCode') ?? route('main');
    }
}

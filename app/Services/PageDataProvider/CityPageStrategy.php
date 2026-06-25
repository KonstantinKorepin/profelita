<?php

namespace App\Services\PageDataProvider;

use App\Models\Url;
use App\Services\CityService;
use App\Services\MasterService;
use App\Services\ReviewService;
use App\Services\ServiceService;

class CityPageStrategy implements PageDataStrategyInterface
{
    public function __construct(
        private readonly MasterService $masterService,
        private readonly ReviewService $reviewService,
        private readonly CityService $cityService,
        private readonly ServiceService $serviceService
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
            'map' => $master->map ?? null,
            'services' => $this->serviceService->getCityServices($city->id)
        ];

        return new PageResult(
            template: 'pages.city',
            data: $data,
        );
    }
}

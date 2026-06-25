<?php

namespace App\Services\PageSessionData;

use App\Models\Url;
use App\Repositories\Interfaces\ServiceRepositoryInterface;

class ServiceSessionStrategy implements PageSessionStrategyInterface
{
    public function __construct(
        private readonly ServiceRepositoryInterface $serviceRepository
    ) {}

    public function getData(Url $url): SessionDto
    {
        $service = $this->serviceRepository->getOne($url->entity_id);
        $master = $service->master;
        return new SessionDto(
            city: $master->city,
            master: $master
        );
    }
}

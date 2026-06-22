<?php

namespace App\Services\PageSessionData;

use App\Dto\SessionDto;
use App\Models\Url;
use App\Repositories\ServiceRepository;

class ServiceSessionStrategy implements PageSessionStrategyInterface
{
    public function __construct(
        private ServiceRepository $serviceRepository
    ) {}

    public function getData(Url $url): SessionDto
    {
        $service = $this->serviceRepository->getOne($url->entity_id);
        $master = $service->master;

        $dto = new SessionDto();
        $dto->setCity($master->city);
        $dto->setMaster($master);

        return $dto;
    }
}

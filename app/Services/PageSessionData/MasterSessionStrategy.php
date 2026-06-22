<?php

namespace App\Services\PageSessionData;

use App\Dto\SessionDto;
use App\Models\Url;
use App\Repositories\MasterRepository;

class MasterSessionStrategy implements PageSessionStrategyInterface
{
    public function __construct(
        private MasterRepository $masterRepository
    ) {}

    public function getData(Url $url): SessionDto
    {
        $master = $this->masterRepository->getOne($url->entity_id);

        $dto = new SessionDto();
        $dto->setCity($master->city);
        $dto->setMaster($master);

        return $dto;
    }
}

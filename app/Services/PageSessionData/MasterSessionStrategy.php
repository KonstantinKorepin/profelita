<?php

namespace App\Services\PageSessionData;

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
        return new SessionDto(
            city: $master->city,
            master: $master
        );
    }
}

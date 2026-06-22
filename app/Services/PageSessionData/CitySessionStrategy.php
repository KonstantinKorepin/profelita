<?php

namespace App\Services\PageSessionData;

use App\Dto\SessionDto;
use App\Models\Url;
use App\Repositories\SessionRepository;

class CitySessionStrategy implements PageSessionStrategyInterface
{
    public function __construct(
        private SessionRepository $sessionRepository
    ) {}

    public function getData(Url $url): SessionDto
    {
        return $this->sessionRepository->getDataBySession($url);
    }
}

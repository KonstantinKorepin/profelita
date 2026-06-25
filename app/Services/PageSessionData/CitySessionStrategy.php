<?php

namespace App\Services\PageSessionData;

use App\Models\Url;
use App\Repositories\Interfaces\SessionRepositoryInterface;

class CitySessionStrategy implements PageSessionStrategyInterface
{
    public function __construct(
        private readonly SessionRepositoryInterface $sessionRepository
    ) {}

    public function getData(Url $url): SessionDto
    {
        return $this->sessionRepository->getDataBySession($url);
    }
}

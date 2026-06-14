<?php

namespace App\Services;

use App\Repositories\Interfaces\CityRepositoryInterface;
use Illuminate\Support\Collection;

class CityService
{
    public function __construct(private CityRepositoryInterface $repository)
    {}

    /**
     * Список всех активных актуальных городов.
     * @return Collection
     */
    public function getActiveAll(): Collection
    {
        return $this->repository->getActiveAll();
    }
}

<?php

namespace App\Services;

use App\Models\City;
use Illuminate\Support\Collection;
use App\Repositories\Interfaces\CityRepositoryInterface;

class CityService
{
    public function __construct(private readonly CityRepositoryInterface $repository)
    {}

    /**
     * Список всех активных актуальных городов.
     * @return Collection
     */
    public function getActiveAll(): Collection
    {
        return $this->repository->getActiveAll();
    }

    /**
     * Город
     * @param int $cityId
     * @return City
     */
    public function getOne(int $cityId): City
    {
        return $this->repository->getOne($cityId);
    }

    /**
     * Возвращает город по коду
     * @param string $cityCode
     * @return City
     */
    public function getByCode(string $cityCode): City
    {
        return $this->repository->getByCode($cityCode);
    }
}

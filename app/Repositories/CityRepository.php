<?php

namespace App\Repositories;

use App\Models\City;
use Illuminate\Support\Collection;
use App\Repositories\Interfaces\CityRepositoryInterface;

class CityRepository implements CityRepositoryInterface
{
    /**
     * Список всех активных городов
     * @return Collection
     */
    public function getActiveAll(): Collection
    {
        return City::whereActive(true)->get();
    }

    /**
     * Возвращает город по Id
     * @param int $cityId
     * @return City
     */
    public function getOne(int $cityId): City
    {
        return City::findOrFail($cityId);
    }

    /**
     * Возвращает город по коду
     * @param string $cityCode
     * @return City
     */
    public function getByCode(string $cityCode): City
    {
        return City::whereCode($cityCode)->firstOrFail();
    }
}

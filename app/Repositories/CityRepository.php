<?php

namespace App\Repositories;

use App\Models\City;
use App\Repositories\Interfaces\CityRepositoryInterface;
use Illuminate\Support\Collection;

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
}

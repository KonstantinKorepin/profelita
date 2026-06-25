<?php

namespace App\Repositories\Interfaces;

use App\Models\City;
use Illuminate\Support\Collection;

interface CityRepositoryInterface
{
    public function getActiveAll(): Collection;
    public function getOne(int $cityId): City;
}

<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;

interface CityRepositoryInterface
{
    public function getActiveAll(): Collection;
}

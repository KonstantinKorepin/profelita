<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;

interface ServiceRepositoryInterface
{
    public function getMainServicesAll(int $cityId): Collection;
}

<?php

namespace App\Repositories\Interfaces;

use App\Models\Service;
use Illuminate\Support\Collection;

interface ServiceRepositoryInterface
{
    public function getMainServicesAll(int $cityId): Collection;
    public function getOne(int $serviceId): Service;
}

<?php

namespace App\Repositories\Interfaces;

use App\Models\Service;
use Illuminate\Support\Collection;

interface ServiceRepositoryInterface
{
    public function getMainServicesAll(int $cityId): Collection;
    public function getOne(int $serviceId): Service;
    public function getCityServices(int $cityId): Collection;
    public function getSpecializationServices(int $cityId, int $specializationId): Collection;
    public function getMainServiceUrl(int $masterId): ?string;
}

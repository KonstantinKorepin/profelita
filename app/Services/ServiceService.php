<?php

namespace App\Services;

use App\Repositories\ServiceRepository;
use Illuminate\Support\Collection;

class ServiceService
{
    private ServiceRepository $repository;

    public function __construct()
    {
        $this->repository = new ServiceRepository();
    }

    /**
     * Список главных услуг  города.
     * @return Collection
     */
    public function getMainServicesAll(int $cityId): Collection
    {
        return $this->repository->getMainServicesAll($cityId);
    }
}

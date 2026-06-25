<?php

namespace App\Services;

use Illuminate\Support\Collection;
use App\Repositories\Interfaces\ServiceRepositoryInterface;

class ServiceService
{
    public function __construct(private ServiceRepositoryInterface $repository)
    {}

    /**
     * Список главных услуг  города.
     * @return Collection
     */
    public function getMainServicesAll(int $cityId): Collection
    {
        return $this->repository->getMainServicesAll($cityId);
    }

    /**
     * Возвращает список услуг
     * @param int $cityId
     * @return array
     */
    public function getCityServices(int $cityId): array
    {
        $services = $this->repository->getCityServices($cityId);
        $result = [];
        foreach ($services as $service) {
            if ($service->main_service) {
                $result[$service->specialization_id]['mainService'] = $service;
            } else {
                $result[$service->specialization_id]['servicesList'][] = $service;
            }
        }
        return $result;
    }
}

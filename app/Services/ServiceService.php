<?php

namespace App\Services;

use App\Models\Service;
use Illuminate\Support\Collection;
use App\Repositories\Interfaces\ServiceRepositoryInterface;

class ServiceService
{
    public function __construct(private readonly ServiceRepositoryInterface $repository)
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
     * Услуга
     * @param int $masterId
     * @return Service
     */
    public function getOne(int $serviceId): Service
    {
        return $this->repository->getOne($serviceId);
    }

    /**
     * Возвращает список услуг для страницы города
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

    /**
     * Возвращает список услуг для детальной страницы услуги у конкретного мастера
     * @param int $cityId
     * @param int $specializationId
     * @param string $currentUrl
     * @return array
     */
    public function getSpecializationServices(int $cityId, int $specializationId, string $currentUrl): array
    {
        $services = $this->repository->getSpecializationServices($cityId, $specializationId);
        $serviceList = [];

        foreach ($services as $service) {
            if (is_null($service->parent_id)) {
                $serviceList[$service->id] = $service->toArray();
                $serviceList[$service->id]['active'] = ($currentUrl === $service->url);
            } else {
                $serviceList[$service->parent_id]['list'][] = $service->toArray();
                $count = count($serviceList[$service->parent_id]['list']) - 1;
                $serviceList[$service->parent_id]['list'][$count]['active'] = ($currentUrl === $service->url);
                if ($currentUrl === $service->url) {
                    $serviceList[$service->parent_id]['section_active'] = true;
                }
            }
        }

        return $serviceList;
    }

    /**
     * Возвращает ссылку на основную услугу специализации Мастера
     * @param int $masterId
     * @return string|null
     */
    public function getMainServiceUrl(int $masterId): ?string
    {
        return $this->repository->getMainServiceUrl($masterId);
    }
}

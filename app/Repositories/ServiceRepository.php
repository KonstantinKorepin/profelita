<?php

namespace App\Repositories;

use App\Models\Url;
use App\Models\Service;
use Illuminate\Support\Collection;
use App\Repositories\Interfaces\ServiceRepositoryInterface;

class ServiceRepository implements ServiceRepositoryInterface
{
    /**
     * Список главных услуг  города.
     * @return Collection
     */
    public function getMainServicesAll(int $cityId): Collection
    {
        return Service::query()
            ->select([
                'specializations.catalog_name',
                'urls.url'
            ])
            ->join('masters', 'services.master_id', '=', 'masters.id')
            ->join('service_templates', 'service_templates.id', '=', 'services.service_templates_id')
            ->join('specializations', 'specializations.id', '=', 'service_templates.specialization_id')
            ->join('urls', function ($join) {
                $join->on('services.id', '=', 'urls.entity_id')
                    ->where('urls.entity_class', '=', Url::SERVICE);
            })
            ->where([
                'services.main_service' => true,
                'masters.city_id' => $cityId,
            ])
            ->orderBy('specializations.id')
            ->get();
    }

    /**
     * Услуга
     * @param int $serviceId
     * @return Service
     */
    public function getOne(int $serviceId): Service
    {
        return Service::findOrFail($serviceId);
    }

    /**
     * Возвращает список услуг для страницы города
     * @param int $cityId
     * @return Collection
     */
    public function getCityServices(int $cityId): Collection
    {
        return Service::query()
            ->select([
                'services.id',
                'specializations.id as specialization_id',
                'services.name',
                'service_templates.catalog_name',
                'services.main_service',
                'services.on_city_list',
                'services.sort',
                'urls.url'
            ])
            ->join('masters', 'services.master_id', '=', 'masters.id')
            ->join('specializations', 'specializations.id', '=', 'masters.specialization_id')
            ->join('urls', function ($join) {
                $join->on('urls.master_id', '=', 'masters.id')
                    ->where('urls.entity_class', '=', Url::SERVICE)
                    ->whereColumn('urls.entity_id', '=', 'services.id');
            })
            ->join('service_templates', 'service_templates.id', '=', 'services.service_templates_id')
            ->where('masters.city_id', $cityId)
            ->where('services.active', true)
            ->where(function ($query) {
                $query->where('services.main_service', true)
                    ->orWhere('services.on_city_list', true);
            })
            ->where('specializations.active', true)
            ->orderBy('specializations.sort')
            ->orderBy('service_templates.sort')
            ->get();
    }

    /**
     * Возвращает список услуг для детальной страницы услуги у конкретного мастера
     * @param int $cityId
     * @param int $specializationId
     * @return Collection
     */
    public function getSpecializationServices(int $cityId, int $specializationId): Collection
    {
        return Service::query()
            ->select([
                'services.id',
                'specializations.id as specialization_id',
                'services.parent_id',
                'services.name',
                'service_templates.catalog_name',
                'services.main_service',
                'services.on_city_list',
                'services.sort',
                'urls.url'
            ])
            ->join('masters', 'services.master_id', '=', 'masters.id')
            ->join('specializations', 'specializations.id', '=', 'masters.specialization_id')
            ->leftJoin('urls', function ($join) {
                $join->on('urls.master_id', '=', 'masters.id')
                    ->where('urls.entity_class', '=', Url::SERVICE)
                    ->whereColumn('urls.entity_id', '=', 'services.id');
            })
            ->join('service_templates', 'service_templates.id', '=', 'services.service_templates_id')
            ->where('masters.city_id', $cityId)
            ->where('specializations.id', $specializationId)
            ->where('specializations.active', true)
            ->where('services.active', true)
            ->orderBy('services.sort')
            ->get();
    }

    /**
     * Возвращает ссылку на основную услугу специализации Мастера
     * @param int $masterId
     * @return string|null
     */
    public function getMainServiceUrl(int $masterId): ?string
    {
        return Service::query()
            ->join('urls', function ($join) {
                $join->on('urls.entity_id', '=', 'services.id')
                    ->where('urls.entity_class', '=', Url::SERVICE);
            })
            ->where('services.master_id', $masterId)
            ->where('services.main_service', true)
            ->value('urls.url');
    }
}

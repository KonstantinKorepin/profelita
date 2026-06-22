<?php

namespace App\Repositories;

use App\Models\Url;
use App\Models\Master;
use App\Models\Service;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Repositories\Interfaces\ServiceRepositoryInterface;

class ServiceRepository implements ServiceRepositoryInterface
{
    /**
     * Список главных услуг  города.
     * @return Collection
     */
    public function getMainServicesAll(int $cityId): Collection
    {
        return DB::table('services')
            ->join('masters', 'services.master_id', '=', 'masters.id')
            ->join('service_templates', 'service_templates.id', '=', 'services.service_templates_id')
            ->join('specializations', 'specializations.id', '=', 'service_templates.specialization_id')
            ->join('urls', function($join) {
                $join->on('services.id', '=', 'urls.entity_id')
                    ->where('urls.entity_class', '=', Url::SERVICE);
            })
            ->select(
                'specializations.catalog_name', 'urls.url'
            )
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
}

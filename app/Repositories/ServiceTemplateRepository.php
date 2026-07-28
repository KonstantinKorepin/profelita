<?php

namespace App\Repositories;

use App\Models\ServiceTemplate;
use Illuminate\Support\Collection;
use App\Repositories\Interfaces\ServiceTemplateRepositoryInterface;

class ServiceTemplateRepository implements ServiceTemplateRepositoryInterface
{
    /**
     * Возвращает шаблоны специализации
     * @param int $specializationId
     * @return Collection
     */
    public function getBySpecializationId(int $specializationId): Collection
    {
        return ServiceTemplate::whereSpecializationId($specializationId)->get();
    }
}

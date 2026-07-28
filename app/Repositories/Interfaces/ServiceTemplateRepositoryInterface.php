<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;

interface ServiceTemplateRepositoryInterface
{
    public function getBySpecializationId(int $specializationId): Collection;
}

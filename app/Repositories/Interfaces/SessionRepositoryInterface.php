<?php

namespace App\Repositories\Interfaces;

use App\Dto\SessionDto;

interface SessionRepositoryInterface
{
    public function getDataBySession(): SessionDto;
}

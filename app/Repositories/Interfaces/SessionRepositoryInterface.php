<?php

namespace App\Repositories\Interfaces;

use App\Services\PageSessionData\SessionDto;

interface SessionRepositoryInterface
{
    public function getDataBySession(): SessionDto;
}

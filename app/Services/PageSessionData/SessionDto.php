<?php

namespace App\Services\PageSessionData;

use App\Models\City;
use App\Models\Master;

class SessionDto
{
    public function __construct(
        public readonly City $city,
        public readonly Master $master
    ) {}
}

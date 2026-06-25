<?php

namespace App\Services\PageSessionData;

use App\Models\Url;

interface PageSessionStrategyInterface
{
    public function getData(Url $url): SessionDto;
}

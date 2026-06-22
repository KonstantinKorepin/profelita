<?php

namespace App\Services\PageSessionData;

use App\Dto\SessionDto;
use App\Models\Url;

interface PageSessionStrategyInterface
{
    public function getData(Url $url): SessionDto;
}

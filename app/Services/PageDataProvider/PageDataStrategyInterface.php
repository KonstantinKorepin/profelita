<?php

namespace App\Services\PageDataProvider;

use App\Models\Url;

interface PageDataStrategyInterface
{
    public function getData(Url $url): array;
}

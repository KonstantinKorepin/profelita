<?php

namespace App\Services\PageDataProvider;

use App\Models\Url;

interface PageDataProviderInterface
{
   public function getData(): array;
}

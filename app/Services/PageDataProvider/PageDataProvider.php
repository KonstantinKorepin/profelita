<?php

namespace App\Services\PageDataProvider;

use App\Models\Url;

abstract class PageDataProvider
{
    public function __construct(protected Url $url)
    {}
}

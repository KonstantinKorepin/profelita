<?php

namespace App\Repositories\Interfaces;

use App\Models\Url;

interface UrlRepositoryInterface
{
    public function getByUrl(string $url): Url;
}


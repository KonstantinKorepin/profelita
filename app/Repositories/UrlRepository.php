<?php

namespace App\Repositories;

use App\Models\Url;
use App\Repositories\Interfaces\UrlRepositoryInterface;

class UrlRepository implements UrlRepositoryInterface
{
    public function getByUrl(string $url): Url
    {
        return Url::whereUrl($url)->firstOrFail();
    }
}

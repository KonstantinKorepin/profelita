<?php

namespace App\Services\Seo;

use App\Models\Master;

class MasterPageSeo implements SeoTagInterface
{
    private Master $master;

    public function __construct(Master $master)
    {
        $this->master = $master;
    }

    public function getTitle(): string
    {
        return implode(' ', [$this->master->getSeoTitle(), '|', env('SITE_NAME')]);
    }

    public function getDescription(): string
    {
        return $this->master->getSeoDescription();
    }

    public function getKeywords(): string
    {
        return $this->master->getSeoKeywords();
    }
}

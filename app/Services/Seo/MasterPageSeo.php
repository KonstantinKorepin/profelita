<?php

namespace App\Services\Seo;

use App\Models\Master;

class MasterPageSeo implements SeoTagInterface
{
    public function __construct(
        private Master $master
    ){}

    public function getTitle(): string
    {
        return implode(' ', [$this->master->getSeoTitle(), '|', config('app.site_name')]);
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

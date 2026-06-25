<?php

namespace App\Services\Seo;

use App\Models\City;

class MainPageSeo implements SeoTagInterface
{
    public function __construct(
        private readonly City $city
    ){}

    public function getTitle(): string
    {
        return implode(' ', [config('seo.city.title'), $this->city->prepositional, '|', config('app.site_name')]);
    }

    public function getDescription(): string
    {
        return implode(' ', [config('seo.city.description'), $this->city->prepositional]);
    }

    public function getKeywords(): string
    {
        return implode(' ', [config('seo.city.keywords'), $this->city->prepositional]);
    }
}

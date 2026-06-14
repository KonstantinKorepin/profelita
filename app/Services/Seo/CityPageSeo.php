<?php

namespace App\Services\Seo;

use App\Models\City;

class CityPageSeo extends CitySeoTagsData implements SeoTagInterface
{
    private City $city;

    public function __construct(City $city)
    {
        $this->city = $city;
    }

    public function getTitle(): string
    {
        return implode(' ', [self::CITY_TITLE, $this->city->prepositional, '|', env('SITE_NAME')]);
    }

    public function getDescription(): string
    {
        return implode(' ', [self::CITY_DESCRIPTION, $this->city->prepositional]);
    }

    public function getKeywords(): string
    {
        return implode(' ', [self::CITY_KEYWORDS, $this->city->prepositional]);
    }
}

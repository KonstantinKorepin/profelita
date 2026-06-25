<?php

namespace App\Services\Seo;

class GeographyPageSeo implements SeoTagInterface
{
    public function getTitle(): string
    {
        return implode(' ', [config('seo.geography.title'), '|', config('app.site_name')]);
    }

    public function getDescription(): string
    {
        return config('seo.geography.description');
    }

    public function getKeywords(): string
    {
        return config('seo.geography.keywords');
    }
}

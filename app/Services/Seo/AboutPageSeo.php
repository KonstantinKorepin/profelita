<?php

namespace App\Services\Seo;

class AboutPageSeo implements SeoTagInterface
{
    public function getTitle(): string
    {
        return implode(' ', [config('seo.about.title'), '|', config('app.site_name')]);
    }

    public function getDescription(): string
    {
        return config('seo.about.description');
    }

    public function getKeywords(): string
    {
        return config('seo.about.keywords');
    }
}

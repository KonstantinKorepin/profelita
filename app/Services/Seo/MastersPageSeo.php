<?php

namespace App\Services\Seo;

class MastersPageSeo implements SeoTagInterface
{
    public function getTitle(): string
    {
        return implode(' ', [config('seo.masters.title'), '|', config('app.site_name')]);
    }

    public function getDescription(): string
    {
        return config('seo.masters.description');
    }

    public function getKeywords(): string
    {
        return config('seo.masters.keywords');
    }
}

<?php

namespace App\Services\Seo;

class NotFoundPageSeo implements SeoTagInterface
{
    public function getTitle(): string
    {
        return implode(' ', [config('seo.not_found.title'), '|', config('app.site_name')]);
    }

    public function getDescription(): string
    {
        return config('seo.not_found.description');
    }

    public function getKeywords(): string
    {
        return config('seo.not_found.keywords');
    }
}

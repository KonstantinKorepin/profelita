<?php

namespace App\Services\Seo;

class GuaranteePageSeo implements SeoTagInterface
{
    public function getTitle(): string
    {
        return implode(' ', [config('seo.guarantee.title'), '|', config('app.site_name')]);
    }

    public function getDescription(): string
    {
        return config('seo.guarantee.description');
    }

    public function getKeywords(): string
    {
        return config('seo.guarantee.keywords');
    }
}

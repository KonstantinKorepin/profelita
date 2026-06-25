<?php

namespace App\Services\Seo;

class PartnerPageSeo implements SeoTagInterface
{
    public function getTitle(): string
    {
        return implode(' ', [config('seo.partner.title'), '|', config('app.site_name')]);
    }

    public function getDescription(): string
    {
        return config('seo.partner.description');
    }

    public function getKeywords(): string
    {
        return config('seo.partner.keywords');
    }
}

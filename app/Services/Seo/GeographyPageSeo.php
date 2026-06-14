<?php

namespace App\Services\Seo;

class GeographyPageSeo implements SeoTagInterface
{
    public function getTitle(): string
    {
        return implode(' ', ['География работ', '|', env('SITE_NAME')]);
    }

    public function getDescription(): string
    {
        return 'Наш сервис работает во всех крупных городах России';
    }

    public function getKeywords(): string
    {
        return 'география работ';
    }
}

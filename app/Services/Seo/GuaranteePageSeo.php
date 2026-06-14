<?php

namespace App\Services\Seo;

class GuaranteePageSeo implements SeoTagInterface
{
    public function getTitle(): string
    {
        return implode(' ', ['Гарантии на работы', '|', env('SITE_NAME')]);
    }

    public function getDescription(): string
    {
        return 'Гарантии, которые предоставляют мастера нашего сервиса';
    }

    public function getKeywords(): string
    {
        return 'гарантии на работы';
    }
}

<?php

namespace App\Services\Seo;

class MastersPageSeo implements SeoTagInterface
{
    public function getTitle(): string
    {
        return implode(' ', ['Мастера сервиса', '|', env('SITE_NAME')]);
    }

    public function getDescription(): string
    {
        return 'Список мастеров нашего сервиса';
    }

    public function getKeywords(): string
    {
        return 'мастера';
    }
}

<?php

namespace App\Services\Seo;

class AboutPageSeo implements SeoTagInterface
{
    public function getTitle(): string
    {
        return implode(' ', ['О сервисе', '|', env('SITE_NAME')]);
    }

    public function getDescription(): string
    {
        return 'Сервис c полным переченем бытовых услуг на дому от профессиональных мастеров для клиентов по всей России';
    }

    public function getKeywords(): string
    {
        return 'сервис домашних услуг';
    }
}

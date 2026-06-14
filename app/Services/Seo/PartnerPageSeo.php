<?php

namespace App\Services\Seo;

class PartnerPageSeo implements SeoTagInterface
{
    public function getTitle(): string
    {
        return implode(' ', ['Информация о сотрудничестве', '|', env('SITE_NAME')]);
    }

    public function getDescription(): string
    {
        return 'Условия сотрудничества с сервисом для профессиональных мастеров бытовых услуг';
    }

    public function getKeywords(): string
    {
        return 'условия сотрудничества';
    }
}

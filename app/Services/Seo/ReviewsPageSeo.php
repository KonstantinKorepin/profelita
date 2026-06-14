<?php

namespace App\Services\Seo;

class ReviewsPageSeo implements SeoTagInterface
{
    public function getTitle(): string
    {
        return implode(' ', ['Отзывы', '|', env('SITE_NAME')]);
    }

    public function getDescription(): string
    {
        return 'Отзывы клиентов о работе мастеров сервиса';
    }

    public function getKeywords(): string
    {
        return 'отзывы';
    }
}

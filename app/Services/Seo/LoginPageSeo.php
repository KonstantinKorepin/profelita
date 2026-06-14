<?php

namespace App\Services\Seo;

class LoginPageSeo extends CitySeoTagsData implements SeoTagInterface
{
    public function getTitle(): string
    {
        return implode(' ', ['Авторизация', '|', env('SITE_NAME')]);
    }

    public function getDescription(): string
    {
        return 'Страница авторизации на сайте';
    }

    public function getKeywords(): string
    {
        return implode(' ', ['авторизация']);
    }
}

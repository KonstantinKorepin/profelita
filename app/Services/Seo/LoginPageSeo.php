<?php

namespace App\Services\Seo;

class LoginPageSeo implements SeoTagInterface
{
    public function getTitle(): string
    {
        return implode(' ', [config('seo.login.title'), '|', config('app.site_name')]);
    }

    public function getDescription(): string
    {
        return config('seo.login.description');
    }

    public function getKeywords(): string
    {
        return config('seo.login.keywords');
    }
}

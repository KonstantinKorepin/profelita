<?php

namespace App\Services\Seo;

class NotFoundPageSeo extends CitySeoTagsData implements SeoTagInterface
{
    public function getTitle(): string
    {
        return implode(' ', ['Страница не найдена', '|', env('SITE_NAME')]);
    }

    public function getDescription(): string
    {
        return 'Страница не найдена';
    }

    public function getKeywords(): string
    {
        return 'Страница не найдена';
    }
}

<?php

namespace App\Services\Seo;

class ContactsPageSeo implements SeoTagInterface
{
    public function getTitle(): string
    {
        return implode(' ', ['Контакты', '|', env('SITE_NAME')]);
    }

    public function getDescription(): string
    {
        return 'Информация о контактах, по которым можно связаться с нами';
    }

    public function getKeywords(): string
    {
        return 'контакты';
    }
}

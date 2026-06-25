<?php

namespace App\Services\Seo;
class ContactsPageSeo implements SeoTagInterface
{
    public function getTitle(): string
    {
        return implode(' ', [config('seo.contacts.title'), '|', config('app.site_name')]);
    }

    public function getDescription(): string
    {
        return config('seo.contacts.description');
    }

    public function getKeywords(): string
    {
        return config('seo.contacts.keywords');
    }
}

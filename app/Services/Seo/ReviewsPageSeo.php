<?php

namespace App\Services\Seo;

class ReviewsPageSeo implements SeoTagInterface
{
    public function getTitle(): string
    {
        return implode(' ', [config('seo.reviews.title'), '|', config('app.site_name')]);
    }

    public function getDescription(): string
    {
        return config('seo.reviews.description');
    }

    public function getKeywords(): string
    {
        return config('seo.reviews.keywords');
    }
}

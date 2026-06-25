<?php

namespace App\Services\Seo;

use App\Models\Service;

class ServicePageSeo implements SeoTagInterface
{
    public function __construct(
        private readonly Service $service
    ){}

    public function getTitle(): string
    {
        return $this->service->title;
    }

    public function getDescription(): string
    {
        return $this->service->description;
    }

    public function getKeywords(): string
    {
        return $this->service->keywords;
    }
}

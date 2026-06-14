<?php

namespace App\Services\Seo;

use App\Models\Service;

class ServicePageSeo implements SeoTagInterface
{
    private Service $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

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

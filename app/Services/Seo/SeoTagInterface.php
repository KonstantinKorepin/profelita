<?php

namespace App\Services\Seo;

interface SeoTagInterface
{
    public function getTitle(): string;
    public function getDescription(): string;
    public function getKeywords(): string;
}

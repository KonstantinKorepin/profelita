<?php

namespace App\Services\PageDataProvider;

class PageResult
{
    public function __construct(
        public readonly string $template,
        public readonly array $data,
    ) {}
}

<?php

namespace App\Services\Seo;

class SeoService
{
    /**
     * возвращает данные метатегов для страниц
     * @param string $url
     * @return SeoTagInterface
     */
    public function getSeoPageData(string $url): SeoTagInterface
    {
        $factory = new SeoFactory();
        $seoTag = $factory->create($url);
        return $seoTag;
    }

}

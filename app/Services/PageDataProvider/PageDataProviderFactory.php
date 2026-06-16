<?php

namespace App\Services\PageDataProvider;

use App\Models\Url;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PageDataProviderFactory
{
    private static array $map = [
        Url::CITY => CityPageDataProvider::class,
        Url::MASTER => MasterPageDataProvider::class,
        Url::SERVICE => ServicePageDataProvider::class
    ];

    /**
     * Возвращает экземпляр провайдера
     * @param string $uri
     * @return mixed
     */
    public static function createPageDataProvider(string $url)
    {
        $url = Url::whereUrl($url)->get()->first();
        if (!$url) {
            throw new NotFoundHttpException();
        }
        $providerClass = self::$map[$url->entity_class];
        return new $providerClass($url);
    }
}

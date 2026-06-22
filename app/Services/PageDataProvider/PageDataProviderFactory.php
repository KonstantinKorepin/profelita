<?php

namespace App\Services\PageDataProvider;

use App\Models\Url;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PageDataProviderFactory
{
    public function createPageDataProvider(Url $url): PageDataStrategyInterface
    {
        return match ($url->entity_class) {
            Url::CITY => resolve(CityPageStrategy::class),
            Url::MASTER => resolve(MasterPageStrategy::class),
            Url::SERVICE => resolve(ServicePageStrategy::class),
            default => throw new NotFoundHttpException(),
        };
    }
}

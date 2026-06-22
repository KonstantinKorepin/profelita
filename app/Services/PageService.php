<?php

namespace App\Services;

use App\Models\Url;
use App\Services\PageDataProvider\PageDataProviderFactory;

class PageService
{
    public function __construct(
        private PageSessionDataService $pageSessionDataService
    ){}

    /**
     * Возвращает данные для страниц
     * @param string $uri
     * @return array|null
     */
    public function getPageData(string $uri): ?array
    {
        $this->pageSessionDataService->updateDynamicPageSessionData($uri);

        $url = Url::whereUrl($uri)->firstOrFail();
        $factory = resolve(PageDataProviderFactory::class);
        $provider = $factory->createPageDataProvider($url);
        return $provider->getData($url);
    }

    /**
     * Возвращает код текущего города
     * @return string
     */
    public function getMainLinkPage(): string
    {
        return session('cityCode') ?? route('main');
    }
}

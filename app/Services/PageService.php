<?php

namespace App\Services;

use App\Repositories\Interfaces\UrlRepositoryInterface;
use App\Services\PageDataProvider\PageDataProviderFactory;
use App\Services\PageDataProvider\PageResult;

class PageService
{
    public function __construct(
        private readonly PageSessionDataService $pageSessionDataService,
        private readonly UrlRepositoryInterface $urlRepository,
    ){}

    /**
     * Возвращает данные для страниц
     * @param string $uri
     * @return PageResult
     */
    public function getPageData(string $uri): PageResult
    {
        $this->pageSessionDataService->updateDynamicPageSessionData($uri);

        $url = $this->urlRepository->getByUrl($uri);
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

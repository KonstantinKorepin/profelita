<?php

namespace App\Services\PageDataProvider;

use App\Models\Url;
use App\Services\MasterService;
use App\Services\PageService;
use App\Services\ReviewService;

class MasterPageStrategy implements PageDataStrategyInterface
{
    public function __construct(
        private ReviewService $reviewService,
        private PageService $pageService,
        private MasterService $masterService
    ) {}

    /**
     * Возвращает данные по мастеру
     * @param Url $url
     * @return PageResult
     */
    public function getData(Url $url): PageResult
    {
        $master =  $this->masterService->getOne($url->entity_id);
        return new PageResult(
            template: 'pages.master',
            data: [
                'master' => $master,
                'reviews' => $this->reviewService->getAllReviewsByMasterPaginate($master->id),
                'mainPageLink' => $this->pageService->getMainLinkPage()
            ],
        );
    }
}

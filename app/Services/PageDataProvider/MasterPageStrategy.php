<?php

namespace App\Services\PageDataProvider;

use App\Models\Master;
use App\Models\Url;
use App\Services\PageService;
use App\Services\ReviewService;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class MasterPageStrategy implements PageDataStrategyInterface
{
    public function __construct(
        private ReviewService $reviewService,
        private PageService $pageService
    ) {}

    public function getData(Url $url): array
    {
        $master = Master::find($url->entity_id);
        if (!$master) {
            throw new NotFoundHttpException();
        }

        $data['template'] = 'pages.master';
        $data['data'] = [
            'master' => $master,
            'reviews' => $this->reviewService->getAllReviewsByMasterPaginate($master->id),
            'mainPageLink' => $this->pageService->getMainLinkPage()
        ];

        return $data;
    }
}

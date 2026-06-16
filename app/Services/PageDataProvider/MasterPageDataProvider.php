<?php

namespace App\Services\PageDataProvider;

use App\Models\Master;
use App\Models\Url;
use App\Services\PageService;
use App\Services\ReviewService;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class MasterPageDataProvider extends PageDataProvider implements PageDataProviderInterface
{
    private ReviewService $reviewService;
    private PageService $pageService;

    public function __construct(Url $url)
    {
        parent::__construct($url);

        $this->reviewService = resolve(ReviewService::class);
        $this->pageService = resolve(PageService::class);
    }

    public function getData(): array
    {
        $master = Master::find($this->url->entity_id);
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

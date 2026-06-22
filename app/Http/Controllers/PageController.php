<?php

namespace App\Http\Controllers;

use App\Services\CityService;
use App\Services\MasterService;
use App\Services\PageService;
use App\Services\PageSessionDataService;
use App\Services\ReviewService;

class PageController extends Controller
{
    public function __construct(
        private ReviewService $reviewService,
        private MasterService $masterService,
        private PageService $pageService,
        private CityService $cityService,
        private PageSessionDataService $pageSessionDataService
    ) {}

    public function about()
    {
        $this->pageSessionDataService->updateSimplePageSessionData();
        $mainPageLink = $this->pageService->getMainLinkPage();
        return view('pages.about', ['mainPageLink' => $mainPageLink]);
    }

    public function contacts()
    {
        $this->pageSessionDataService->updateSimplePageSessionData();
        $mainPageLink = $this->pageService->getMainLinkPage();
        return view('pages.contacts', ['mainPageLink' => $mainPageLink]);
    }

    public function geography()
    {
        $mainPageLink = $this->pageService->getMainLinkPage();
        $this->pageSessionDataService->updateSimplePageSessionData();
        return view('pages.geography', [
            'cities' => $this->cityService->getActiveAll(),
            'mainPageLink' => $mainPageLink
        ]);
    }

    public function guarantee()
    {
        $this->pageSessionDataService->updateSimplePageSessionData();
        $mainPageLink = $this->pageService->getMainLinkPage();
        return view('pages.guarantee', ['mainPageLink' => $mainPageLink]);
    }

    public function masters()
    {
        $this->pageSessionDataService->updateSimplePageSessionData();
        $mainPageLink = $this->pageService->getMainLinkPage();
        $data = [
            'masters' => $this->masterService->getFrontMasters(),
            'mainPageLink' => $mainPageLink
        ];
        return view('pages.masters', $data);
    }

    public function partner()
    {
        $this->pageSessionDataService->updateSimplePageSessionData();
        $mainPageLink = $this->pageService->getMainLinkPage();
        return view('pages.partner', ['mainPageLink' => $mainPageLink]);
    }

    public function reviews()
    {
        $this->pageSessionDataService->updateSimplePageSessionData();
        $mainPageLink = $this->pageService->getMainLinkPage();
        $data = [
            'reviews' => $this->reviewService->getAllReviewsPaginate(),
            'mainPageLink' => $mainPageLink
        ];
        return view('pages.reviews', $data);
    }
}

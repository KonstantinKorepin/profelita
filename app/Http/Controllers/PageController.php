<?php

namespace App\Http\Controllers;

use App\Mail\ConsultMail;
use App\Mail\CallOrderMail;
use App\Services\CityService;
use App\Services\MasterService;
use App\Services\PageService;
use App\Services\ReviewService;

class PageController extends Controller
{

    public function __construct(
        private ReviewService $reviewService,
        private MasterService $masterService,
        private PageService $pageService,
        private CityService $cityService
    ) {}

    public function about()
    {
        $this->pageService->updateSimplePageSessionData();
        $mainPageLink = $this->pageService->getMainLinkPage();
        return view('pages.about', ['mainPageLink' => $mainPageLink]);
    }

    // @todo убрать после разработки
    public function city()
    {
        $data = [
            'callOrder' => CallOrderMail::CODE,
            'code' => ConsultMail::CODE,
            'reviews' => $this->reviewService->getFrontReviews()
        ];
        return view('pages.city', $data);
    }

    public function contacts()
    {
        $this->pageService->updateSimplePageSessionData();
        $mainPageLink = $this->pageService->getMainLinkPage();
        return view('pages.contacts', ['mainPageLink' => $mainPageLink]);
    }

    public function geography()
    {
        $mainPageLink = $this->pageService->getMainLinkPage();
        $this->pageService->updateSimplePageSessionData();
        return view('pages.geography', [
            'cities' => $this->cityService->getActiveAll(),
            'mainPageLink' => $mainPageLink
        ]);
    }

    // @todo убрать после разработки
    public function master()
    {
        return view('pages.master');
    }

    public function guarantee()
    {
        $this->pageService->updateSimplePageSessionData();
        $mainPageLink = $this->pageService->getMainLinkPage();
        return view('pages.guarantee', ['mainPageLink' => $mainPageLink]);
    }

    public function masters()
    {
        $this->pageService->updateSimplePageSessionData();
        $mainPageLink = $this->pageService->getMainLinkPage();
        $data = [
            'masters' => $this->masterService->getFrontMasters(),
            'mainPageLink' => $mainPageLink
        ];
        return view('pages.masters', $data);
    }

    public function partner()
    {
        $this->pageService->updateSimplePageSessionData();
        $mainPageLink = $this->pageService->getMainLinkPage();
        return view('pages.partner', ['mainPageLink' => $mainPageLink]);
    }

    public function reviews()
    {
        $this->pageService->updateSimplePageSessionData();
        $mainPageLink = $this->pageService->getMainLinkPage();
        $data = [
            'reviews' => $this->reviewService->getAllReviewsPaginate(),
            'mainPageLink' => $mainPageLink
        ];
        return view('pages.reviews', $data);
    }

    // @todo убрать после разработки
    public function service()
    {
        $data = [
            'callOrder' => CallOrderMail::CODE,
        ];
        return view('pages.service', $data);
    }

}

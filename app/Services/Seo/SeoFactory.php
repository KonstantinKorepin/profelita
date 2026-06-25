<?php

namespace App\Services\Seo;

use App\Models\Url;
use App\Services\CityService;
use App\Services\MasterService;
use App\Services\ServiceService;

class SeoFactory
{
    private array $simplePages = [
        'about' => AboutPageSeo::class,
        'geography' => GeographyPageSeo::class,
        'guarantee' => GuaranteePageSeo::class,
        'partner' => PartnerPageSeo::class,
        'reviews' => ReviewsPageSeo::class,
        'masters' => MastersPageSeo::class,
        'contacts' => ContactsPageSeo::class,
        'enter' => LoginPageSeo::class
    ];

    public function __construct(
        private CityService    $cityService,
        private MasterService  $masterService,
        private ServiceService $serviceService
    ){}

    public function create(string $url): SeoTagInterface
    {
        if ($url === route('main')) {
            $city = $this->cityService->getOne(config('app.main_city_name'));
            return new MainPageSeo($city);
        }

        if (in_array($url, array_keys($this->simplePages))) {
            return new $this->simplePages[$url];
        }

        $url = Url::whereUrl($url)->first();
        if (!$url) {
            return new NotFoundPageSeo();
        }

        switch ($url->entity_class) {
            case Url::CITY:
                $city = $this->cityService->getOne($url->entity_id);
                return new CityPageSeo($city);
            case Url::MASTER:
                $master = $this->masterService->getOne($url->entity_id);
                return new MasterPageSeo($master);
            case Url::SERVICE:
                $service = $this->serviceService->getOne($url->entity_id);
                return new ServicePageSeo($service);
            default:
                return new NotFoundPageSeo();
        }
    }
}

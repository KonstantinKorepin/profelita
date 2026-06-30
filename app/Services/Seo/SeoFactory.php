<?php

namespace App\Services\Seo;

use App\Models\Url;
use App\Repositories\Interfaces\UrlRepositoryInterface;
use App\Services\CityService;
use App\Services\MasterService;
use App\Services\ServiceService;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
        private ServiceService $serviceService,
        private UrlRepositoryInterface $urlRepository,
    ){}

    public function create(string $url): SeoTagInterface
    {
        if ($url === '/' || $url === '') {
            $city = $this->cityService->getByCode(config('app.main_city_code'));
            return new MainPageSeo($city);
        }

        if (in_array($url, array_keys($this->simplePages))) {
            return new $this->simplePages[$url];
        }

        try {
            $url = $this->urlRepository->getByUrl($url);
        } catch (ModelNotFoundException) {
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

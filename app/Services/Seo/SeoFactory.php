<?php

namespace App\Services\Seo;

use App\Models\City;
use App\Models\Master;
use App\Models\Service;
use App\Models\Url;

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

    public function create(string $url): SeoTagInterface
    {
        if ($url === '/') {
            $city = City::whereName(env('APP_MAIN_CITY_NAME'))->get()->first();
            $seoTag = new MainPageSeo($city);
            return $seoTag;
        }

        if (in_array($url, array_keys($this->simplePages))) {
            $seoTag = new $this->simplePages[$url];
            return $seoTag;
        }

        $url = Url::whereUrl($url)->get()->first();
        if (empty($url)) {
            $seoTag = new NotFoundPageSeo();
            return $seoTag;
        }

        switch ($url->entity_class) {
            case Url::CITY:
                $city = City::whereId($url->entity_id)->get()->first();
                $seoTag = new CityPageSeo($city);
                break;
            case Url::MASTER:
                $master = Master::whereId($url->entity_id)->get()->first();
                $seoTag = new MasterPageSeo($master);
                break;
            case Url::SERVICE:
                $service = Service::whereId($url->entity_id)->get()->first();
                $seoTag = new ServicePageSeo($service);
                break;
        }

        return $seoTag;
    }
}

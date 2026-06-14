<?php

namespace App\Providers;

use App\Mail\CallOrderMail;
use App\Mail\ConsultMail;
use App\Mail\PartnerMail;
use App\Mail\ReviewMail;
use App\Repositories\CityRepository;
use App\Repositories\ReviewRepository;
use App\Services\ReviewService;
use App\Services\Seo\SeoService;
use App\Services\ServiceService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::defaultView('vendor.pagination.custom');
        Paginator::defaultSimpleView('vendor.pagination.custom');

        view()->composer('layouts.forms-hidden', function ($view){
            $repository = new CityRepository();
            $cities = $repository->getActiveAll();
            $view->with('cities', $cities);
        });

        view()->composer('forms.consult', function ($view){
            $view->with('code', ConsultMail::CODE);
        });

        view()->composer('forms.call_order', function ($view){
            $view->with('code', CallOrderMail::CODE);
        });

        view()->composer('forms.review', function ($view){
            $view->with('code', ReviewMail::CODE);
        });

        view()->composer('forms.partner', function ($view){
            $view->with('code', PartnerMail::CODE);
        });

        view()->composer(['pages.city', 'blocks.reviews_front'], function ($view)  {
            $reviewRepository = new ReviewRepository();
            $reviewService = new ReviewService($reviewRepository);
            $reviews = $reviewService->getFrontReviews();
            $view->with('reviews', $reviews);
        });

        view()->composer('layouts.header', function ($view)  {
            $view->with('cityName', session('cityName'));
            $view->with('phone', session('phone'));
            $view->with('phoneNumber', session('phoneNumber'));
            $view->with('starWorkingHours', session('starWorkingHours'));
            $view->with('endWorkingHours', session('endWorkingHours'));
            $view->with('cityUrl', session('cityUrl'));
        });

        view()->composer(['layouts.main-menu', 'layouts.footer'], function ($view)  {
            $view->with('cityUrl', session('cityUrl'));
            $view->with('cityName', session('cityName'));
            $view->with('address', session('address'));
            $view->with('phone', session('phone'));
            $view->with('phoneNumber', session('phoneNumber'));
            $view->with('starWorkingHours', session('starWorkingHours'));
            $view->with('endWorkingHours', session('endWorkingHours'));
        });

        view()->composer('blocks.main_services', function ($view){
            $service = new ServiceService();
            $services = $service->getMainServicesAll(session('cityId'));

            $view->with('services', $services);
        });

        view()->composer('layouts.layout', function ($view)  {
            $service = new SeoService();
            $seoTag = $service->getSeoPageData(request()->path());
            $view->with('seoTag', $seoTag);
        });
    }
}

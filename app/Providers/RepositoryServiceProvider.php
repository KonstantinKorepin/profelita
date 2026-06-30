<?php

namespace App\Providers;

use App\Repositories\CityRepository;
use App\Repositories\MasterRepository;
use App\Repositories\ReviewRepository;
use App\Repositories\ServiceRepository;
use App\Repositories\SessionRepository;
use App\Repositories\UrlRepository;
use App\Repositories\FileRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\CityRepositoryInterface;
use App\Repositories\Interfaces\MasterRepositoryInterface;
use App\Repositories\Interfaces\ReviewRepositoryInterface;
use App\Repositories\Interfaces\ServiceRepositoryInterface;
use App\Repositories\Interfaces\SessionRepositoryInterface;
use App\Repositories\Interfaces\UrlRepositoryInterface;
use App\Repositories\Interfaces\FileRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ReviewRepositoryInterface::class, ReviewRepository::class);
        $this->app->bind(MasterRepositoryInterface::class, MasterRepository::class);
        $this->app->bind(CityRepositoryInterface::class, CityRepository::class);
        $this->app->bind(ServiceRepositoryInterface::class, ServiceRepository::class);
        $this->app->bind(SessionRepositoryInterface::class, SessionRepository::class);
        $this->app->bind(UrlRepositoryInterface::class, UrlRepository::class);
        $this->app->bind(FileRepositoryInterface::class, FileRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

<?php

namespace App\Providers\frontend;

use App\Repositories\frontend\Contracts\SlideshowRepositoryInterface;
use App\Repositories\frontend\SlideshowRepository;
use App\Services\frontend\Contracts\SlideshowServiceInterface;
use App\Services\frontend\SlideshowService;
use Illuminate\Support\ServiceProvider;

class SlideshowServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(SlideshowRepositoryInterface::class,SlideshowRepository::class);
        $this->app->bind(SlideshowServiceInterface::class,SlideshowService::class);

    }
}

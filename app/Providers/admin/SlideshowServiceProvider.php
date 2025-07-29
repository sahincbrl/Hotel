<?php

namespace App\Providers\admin;

use App\Repositories\admin\Contracts\SlideshowRepositoryInterface;
use App\Repositories\admin\SlideshowRepository;
use App\Services\admin\Contracts\SlideshowServiceInterface;
use App\Services\admin\SlideshowService;
use Illuminate\Support\ServiceProvider;

class SlideshowServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(SlideshowRepositoryInterface::class,SlideshowRepository::class);
        $this->app->bind(SlideshowServiceInterface::class,SlideshowService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

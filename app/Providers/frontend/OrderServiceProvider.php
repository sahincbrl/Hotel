<?php

namespace App\Providers\frontend;

use App\Repositories\frontend\ContactUsRepository;
use App\Repositories\frontend\Contracts\ContactUsRepositoryInterface;
use App\Repositories\frontend\Contracts\OrderRepositoryInterface;
use App\Repositories\frontend\OrderRepository;
use App\Services\frontend\ContactUsService;
use App\Services\frontend\Contracts\ContactUsServiceInterface;
use App\Services\frontend\Contracts\OrderServiceInterface;
use App\Services\frontend\OrderService;
use Illuminate\Support\ServiceProvider;

class OrderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(OrderServiceInterface::class, OrderService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

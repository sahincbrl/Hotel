<?php

namespace App\Providers\admin;

use App\Repositories\admin\Contracts\OrderRepositoryInterface;
use App\Repositories\admin\OrderRepository;
use App\Services\admin\Contracts\OrderServiceInterface;
use App\Services\admin\OrderService;
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

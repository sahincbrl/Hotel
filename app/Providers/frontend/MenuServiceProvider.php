<?php

namespace App\Providers\frontend;

use App\Repositories\frontend\Contracts\MenuRepositoryInterface;
use App\Repositories\frontend\MenuRepository;
use App\Services\frontend\Contracts\MenuServiceInterface;
use App\Services\frontend\MenuService;
use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(MenuRepositoryInterface::class, MenuRepository::class);
        $this->app->bind(MenuServiceInterface::class, MenuService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

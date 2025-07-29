<?php

namespace App\Providers\admin;

use App\Repositories\admin\Contracts\MenuRepositoryInterface;
use App\Repositories\admin\MenuRepository;
use App\Services\admin\Contracts\MenuServiceInterface;
use App\Services\admin\MenuService;
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

<?php

namespace App\Providers\admin;

use App\Repositories\admin\CategoryRepository;
use App\Repositories\admin\Contracts\CategoryRepositoryInterface;
use App\Services\admin\CategoryService;
use App\Services\admin\Contracts\CategoryServiceInterface;
use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
$this->app->bind(CategoryRepositoryInterface::class,CategoryRepository::class);
$this->app->bind(CategoryServiceInterface::class,CategoryService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

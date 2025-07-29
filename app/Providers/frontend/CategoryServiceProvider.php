<?php

namespace App\Providers\frontend;

use App\Repositories\frontend\CategoryRepository;
use App\Repositories\frontend\Contracts\CategoryRepositoryInterface;
use App\Services\frontend\CategoryService;
use App\Services\frontend\Contracts\CategoryServiceInterface;
use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(CategoryServiceInterface::class, CategoryService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

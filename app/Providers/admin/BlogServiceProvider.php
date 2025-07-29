<?php

namespace App\Providers\admin;

use App\Repositories\admin\BlogRepository;
use App\Repositories\admin\Contracts\BlogRepositoryInterface;
use App\Services\admin\BlogService;
use App\Services\admin\Contracts\BlogServiceInterface;
use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(BlogRepositoryInterface::class, BlogRepository::class);
        $this->app->bind(BlogServiceInterface::class, BlogService::class);
    }

    /**
     * @return void
     */

    public function boot(): void
    {
        //
    }
}

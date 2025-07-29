<?php

namespace App\Providers\admin;

use App\Repositories\admin\AdminRepository;
use App\Repositories\admin\Contracts\AdminRepositoryInterface;
use App\Services\admin\AdminService;
use App\Services\admin\Contracts\AdminServiceInterface;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AdminRepositoryInterface::class, AdminRepository::class);
        $this->app->bind(AdminServiceInterface::class, AdminService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

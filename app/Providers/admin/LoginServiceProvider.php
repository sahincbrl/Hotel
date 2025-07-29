<?php

namespace App\Providers\admin;

use App\Repositories\admin\Contracts\LoginRepositoryInterface;
use App\Repositories\admin\LoginRepository;
use App\Services\admin\Contracts\LoginServiceInterface;
use App\Services\admin\LoginService;
use Illuminate\Support\ServiceProvider;

class LoginServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(LoginRepositoryInterface::class, LoginRepository::class);
        $this->app->bind(LoginServiceInterface::class, LoginService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

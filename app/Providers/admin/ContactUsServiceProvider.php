<?php

namespace App\Providers\admin;

use App\Repositories\admin\ContactUsRepository;
use App\Repositories\admin\Contracts\ContactUsRepositoryInterface;
use App\Services\admin\ContactUsService;
use App\Services\admin\Contracts\ContactUsServiceInterface;
use Illuminate\Support\ServiceProvider;

class ContactUsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ContactUsRepositoryInterface::class, ContactUsRepository::class);
        $this->app->bind(ContactUsServiceInterface::class, ContactUsService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

<?php

namespace App\Providers\frontend;

use App\Repositories\frontend\ContactUsRepository;
use App\Repositories\frontend\Contracts\ContactUsRepositoryInterface;
use App\Services\frontend\ContactUsService;
use App\Services\frontend\Contracts\ContactUsServiceInterface;
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

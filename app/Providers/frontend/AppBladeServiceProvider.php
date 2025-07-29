<?php

namespace App\Providers\frontend;

use App\Models\Menu;
use Illuminate\Support\ServiceProvider;

class AppBladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->composer('frontend.main.app', function ($view) {
            $view->with('menus', Menu::query()->where('status', 1)->get());
        });
    }
}

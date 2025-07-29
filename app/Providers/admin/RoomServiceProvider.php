<?php

namespace App\Providers\admin;

use App\Repositories\admin\Contracts\RoomRepositoryInterface;
use App\Repositories\admin\RoomRepository;
use App\Services\admin\Contracts\RoomServiceInterface;
use App\Services\admin\RoomService;
use Illuminate\Support\ServiceProvider;

class RoomServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(RoomRepositoryInterface::class, RoomRepository::class);
        $this->app->bind(RoomServiceInterface::class, RoomService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

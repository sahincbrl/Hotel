<?php

namespace App\Providers\frontend;

use App\Repositories\frontend\Contracts\RoomRepositoryInterface;
use App\Repositories\frontend\RoomRepository;
use App\Services\frontend\Contracts\RoomServiceInterface;
use App\Services\frontend\RoomService;
use Illuminate\Support\ServiceProvider;

class RoomSerivceProvider extends ServiceProvider
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
        $this->app->bind(RoomRepositoryInterface::class, RoomRepository::class);
        $this->app->bind(RoomServiceInterface::class, RoomService::class);
    }
}

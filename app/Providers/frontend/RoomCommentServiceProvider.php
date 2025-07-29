<?php

namespace App\Providers\frontend;

use App\Repositories\frontend\Contracts\RoomCommentRepositoryInterface;
use App\Repositories\frontend\RoomCommentRepository;
use App\Services\frontend\Contracts\RoomCommentServiceInterface;
use App\Services\frontend\RoomCommentService;
use Illuminate\Support\ServiceProvider;

class RoomCommentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(RoomCommentRepositoryInterface::class, RoomCommentRepository::class);
        $this->app->bind(RoomCommentServiceInterface::class, RoomCommentService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

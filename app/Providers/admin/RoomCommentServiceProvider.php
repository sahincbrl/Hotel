<?php

namespace App\Providers\admin;

use App\Repositories\admin\Contracts\RoomCommentRepositoryInterface;
use App\Repositories\admin\RoomCommentRepository;
use App\Services\admin\Contracts\RoomCommentServiceInterface;
use App\Services\admin\RoomCommentService;
use Illuminate\Support\ServiceProvider;

class RoomCommentServiceProvider extends ServiceProvider
{

    public function register(): void
    {

        $this->app->bind(RoomCommentRepositoryInterface::class,RoomCommentRepository::class);
        $this->app->bind(RoomCommentServiceInterface::class,RoomCommentService::class);
    }


    public function boot(): void
    {
        //
    }

}

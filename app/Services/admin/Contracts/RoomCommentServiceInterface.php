<?php

namespace App\Services\admin\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

interface RoomCommentServiceInterface
{
    /**
     * @return Collection
     */
    public function comment(): Collection;

    /**
     * @param int $id
     * @return Model
     */
    public function findById(int $id): Model;

    /**
     * @param Request $request
     * @return Response
     */
    public function activeDeactive(Request $request): Response;
}

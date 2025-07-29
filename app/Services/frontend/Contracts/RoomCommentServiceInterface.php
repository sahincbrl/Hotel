<?php

namespace App\Services\frontend\Contracts;

use App\Http\Requests\frontend\RoomCommentRequest;
use App\Models\RoomComment;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;

interface RoomCommentServiceInterface
{

    /**
     * @param RoomCommentRequest $request
     * @param RoomComment $roomComment
     * @return Response
     */
    public function create(RoomCommentRequest $request, RoomComment $roomComment): Response;
}

<?php

namespace App\Services\frontend;

use App\Http\Requests\frontend\RoomCommentRequest;
use App\Models\RoomComment;
use App\Repositories\frontend\Contracts\RoomCommentRepositoryInterface;
use App\Services\frontend\Contracts\RoomCommentServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;

class RoomCommentService implements RoomCommentServiceInterface
{
    /**
     * @param RoomCommentRepositoryInterface $roomCommentRepositoryInterface
     */
    public function __construct(private readonly RoomCommentRepositoryInterface $roomCommentRepositoryInterface)
    {

    }

    /**
     * @param RoomCommentRequest $request
     * @param RoomComment $roomComment
     * @return Response
     */
    public function create(RoomCommentRequest $request, RoomComment $roomComment): Response
    {
        return $this->roomCommentRepositoryInterface->create($request, $roomComment);
    }
}

<?php

namespace App\Services\admin;

use App\Repositories\admin\Contracts\RoomCommentRepositoryInterface;
use App\Services\admin\Contracts\RoomCommentServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoomCommentService implements RoomCommentServiceInterface
{
    /**
     * @param RoomCommentRepositoryInterface $roomCommentRepository
     */
    public function __construct(private readonly RoomCommentRepositoryInterface $roomCommentRepository)
    {

    }

    /**
     * @return Collection
     */
    public function comment(): Collection
    {
        return $this->roomCommentRepository->comment();
    }

    /**
     * @param int $id
     * @return Model
     */
    public function findById(int $id): Model
    {
        return $this->roomCommentRepository->findById($id);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function activeDeactive(Request $request): Response
    {
        return $this->roomCommentRepository->activeDeactive($request);
    }
}

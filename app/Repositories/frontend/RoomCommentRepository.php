<?php

namespace App\Repositories\frontend;

use App\Http\Requests\frontend\RoomCommentRequest;
use App\Models\RoomComment;
use App\Repositories\frontend\Contracts\RoomCommentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;

class RoomCommentRepository implements RoomCommentRepositoryInterface
{

    /**
     * @param RoomCommentRequest $request
     * @param RoomComment $roomComment
     * @return Response
     */
    public function create(RoomCommentRequest $request, RoomComment $roomComment): Response
    {
        try {
            $data = $request->all();
            $roomComment->newQuery()->create($data);
            return response([
                'title' => 'Uğurlu',
                'message' => 'Sizin rəy, admin təsdiq etdikdən sonra, saytda görünəcək',
                'status' => 'success'
            ]);
        } catch (\Exception $exception) {
            return response([
                'title' => 'Uğursuz',
                'message' => 'Xeta bas verdi! yeniden cehd edin'.$exception->getMessage(),
                'status' => 'error'
            ]);
        }
    }
}

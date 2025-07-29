<?php

namespace App\Repositories\admin;

use App\Models\Contact;
use App\Models\RoomComment;
use App\Repositories\admin\Contracts\RoomCommentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoomCommentRepository implements RoomCommentRepositoryInterface
{
    /**
     * @return Collection
     */
    public function comment(): Collection
    {
        return RoomComment::all();
    }

    /**
     * @param int $id
     * @return Model
     */
    public function findById(int $id): Model
    {
        return RoomComment::query()->find($id);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function activeDeactive(Request $request): Response
    {
        try {
            $roomComment = $this->findById($request->id);
            if ($roomComment->status == 1) {
                $roomComment->status = 0;
                $roomComment->save();
            } else {
                $roomComment->status = 1;
                $roomComment->save();
            }
            return response([
                'title' => 'Uğurlu',
                'message' => 'Məlumat yeniləndi.',
                'status' => 'success',
            ]);
        } catch (\Exception $e) {
            return response([
                'title' => 'Xəta!',
                'message' => 'Yenilənmə uğursuz!',
                'status' => 'error',
            ]);
        }
    }

}

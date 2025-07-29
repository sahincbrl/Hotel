<?php

namespace App\Services\admin\Contracts;

use App\Http\Requests\Admin\RoomRequest;
use App\Models\Room;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;

interface RoomServiceInterface
{
    /**
     * @return Collection
     */
    public function rooms(): Collection;

    /**
     * @param RoomRequest $request
     * @param Room $room
     * @return Response
     */
    public function create(RoomRequest $request, Room $room): Response;

    /**
     * @param RoomRequest $request
     * @param Room $room
     * @return Response
     */
    public function update(RoomRequest $request, Room $room): Response;

    /**
     * @param Room $room
     * @return Response
     */
    public function delete(Room $room): Response;

    /**
     * @param int $id
     * @return Response
     */
    public function deleteImage(int $id): Response;
}

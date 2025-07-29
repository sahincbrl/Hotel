<?php

namespace App\Services\admin;

use App\Http\Requests\Admin\RoomRequest;
use App\Models\Room;
use App\Repositories\admin\Contracts\RoomRepositoryInterface;
use App\Services\admin\Contracts\RoomServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;

class RoomService implements RoomServiceInterface
{
    /**
     * @param RoomRepositoryInterface $roomRepository
     */
    public function __construct(private readonly RoomRepositoryInterface $roomRepository)
    {

    }

    /**
     * @return Collection
     */
    public function rooms(): Collection
    {
        return $this->roomRepository->rooms();
    }

    /**
     * @param RoomRequest $request
     * @param Room $room
     * @return Response
     */
    public function create(RoomRequest $request, Room $room): Response
    {
        return $this->roomRepository->create($request, $room);
    }

    /**
     * @param RoomRequest $request
     * @param Room $room
     * @return Response
     */
    public function update(RoomRequest $request, Room $room): Response
    {
        return $this->roomRepository->update($request, $room);
    }

    /**
     * @param Room $room
     * @return Response
     */
    public function delete(Room $room): Response
    {
        return $this->roomRepository->delete($room);
    }

    /**
     * @param int $id
     * @return Response
     */
    public function deleteImage(int $id): Response
    {
        return $this->roomRepository->deleteImage($id);
    }
}

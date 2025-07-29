<?php

namespace App\Repositories\frontend;

use App\Models\Room;
use App\Repositories\frontend\Contracts\RoomRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class RoomRepository implements RoomRepositoryInterface
{
    /**
     * @return Collection
     */
    public function rooms(): Collection
    {
        return Room::all();
    }

    /**
     * @param int $id
     * @return Model
     */
    public function findById(int $id): Model
    {
        return Room::query()->find($id);
    }
}

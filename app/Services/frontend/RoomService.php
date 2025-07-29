<?php

namespace App\Services\frontend;

use App\Repositories\frontend\Contracts\RoomRepositoryInterface;
use App\Services\frontend\Contracts\RoomServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class RoomService implements RoomServiceInterface
{
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
     * @param int $id
     * @return Model
     */
    public function findById(int $id): Model
    {
        return $this->roomRepository->findById($id);
    }
}

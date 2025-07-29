<?php

namespace App\Repositories\frontend\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface RoomRepositoryInterface
{
    /**
     * @return Collection
     */
    public function rooms(): Collection;

    /**
     * @param int $id
     * @return Model
     */
    public function findById(int $id): Model;
}

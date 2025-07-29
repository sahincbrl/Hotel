<?php

namespace App\Repositories\frontend\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface MenuRepositoryInterface
{
    /**
     * @return Collection
     */
    public function menus(): Collection;
}

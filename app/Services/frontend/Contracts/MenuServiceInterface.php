<?php

namespace App\Services\frontend\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface MenuServiceInterface
{
    /**
     * @return Collection
     */
    public function menus(): Collection;
}

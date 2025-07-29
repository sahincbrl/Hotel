<?php

namespace App\Repositories\frontend;

use App\Models\Menu;
use App\Repositories\frontend\Contracts\MenuRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class MenuRepository implements MenuRepositoryInterface
{
    /**
     * @return Collection
     */
    public function menus(): Collection
    {
        return Menu::query()->where('status', 1)->get();
    }
}

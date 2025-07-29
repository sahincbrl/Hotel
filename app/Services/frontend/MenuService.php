<?php

namespace App\Services\frontend;

use App\Repositories\frontend\Contracts\MenuRepositoryInterface;
use App\Services\frontend\Contracts\MenuServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class MenuService implements MenuServiceInterface
{
    /**
     * @param MenuRepositoryInterface $menuRepository
     */
    public function __construct(private readonly MenuRepositoryInterface $menuRepository)
    {

    }

    /**
     * @return Collection
     */
    public function menus(): Collection
    {
        return $this->menuRepository->menus();
    }
}

<?php

namespace App\Services\admin;

use App\Http\Requests\Admin\MenuRequest;
use App\Models\Menu;
use App\Repositories\admin\Contracts\MenuRepositoryInterface;
use App\Services\admin\Contracts\MenuServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;

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

    /**
     * @param MenuRequest $request
     * @param Menu $menu
     * @return Response
     */
    public function create(MenuRequest $request, Menu $menu): Response
    {
        return $this->menuRepository->create($request, $menu);
    }

    /**
     * @param MenuRequest $request
     * @param Menu $menu
     * @return Response
     */
    public function update(MenuRequest $request, Menu $menu): Response
    {
        return $this->menuRepository->update($request, $menu);
    }

    /**
     * @param Menu $menu
     * @return Response
     */
    public function delete(Menu $menu): Response
    {
        return $this->menuRepository->delete($menu);
    }
}

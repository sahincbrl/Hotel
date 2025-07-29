<?php

namespace App\Services\admin\Contracts;

use App\Http\Requests\Admin\MenuRequest;
use App\Models\Menu;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;

interface MenuServiceInterface
{
    /**
     * @return Collection
     */
    public function menus(): Collection;

    /**
     * @param MenuRequest $request
     * @param Menu $menu
     * @return Response
     */
    public function create(MenuRequest $request, Menu $menu): Response;

    /**
     * @param MenuRequest $request
     * @param Menu $menu
     * @return Response
     */
    public function update(MenuRequest $request, Menu $menu): Response;

    /**
     * @param Menu $menu
     * @return Response
     */
    public function delete(Menu $menu): Response;
}

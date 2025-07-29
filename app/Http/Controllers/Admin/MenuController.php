<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MenuRequest;
use App\Models\Menu;
use App\Services\admin\Contracts\MenuServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class MenuController extends Controller
{
    private const path = 'admin.menu.';

    /**
     * @param MenuServiceInterface $menuService
     */
    public function __construct(private readonly MenuServiceInterface $menuService)
    {

    }

    /**
     * @return View
     */
    public function index(): View
    {
        $menus = $this->menuService->menus();
        return view(self::path . 'index',
            compact('menus'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view(self::path . 'create');
    }

    /**
     * @param MenuRequest $request
     * @param Menu $menu
     * @return Response
     */
    public function store(MenuRequest $request, Menu $menu): Response
    {
        return $this->menuService->create($request, $menu);
    }

    /**
     * @param Menu $menu
     * @return View
     */
    public function edit(Menu $menu): View
    {
        return view(self::path . 'edit', compact('menu'));
    }

    /**
     * @param MenuRequest $request
     * @param Menu $menu
     * @return Response
     */
    public function update(MenuRequest $request, Menu $menu): Response
    {
        return $this->menuService->update($request, $menu);
    }

    /**
     * @param Menu $menu
     * @return Response
     */
    public function destroy(Menu $menu): Response
    {
        return $this->menuService->delete($menu);
    }
}

<?php

namespace App\Repositories\admin;

use App\Http\Requests\Admin\MenuRequest;
use App\Models\Menu;
use App\Repositories\admin\Contracts\MenuRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class MenuRepository implements MenuRepositoryInterface
{
    /**
     * @return Collection
     */
    public function menus(): Collection
    {
        return Menu::all();
    }

    /**
     * @param MenuRequest $request
     * @param Menu $menu
     * @return Response
     */
    public function create(MenuRequest $request, Menu $menu): Response
    {
        try {
            $data = $request->all();
            $data['url'] = Str::slug($data['name_en']);
            $menu->newQuery()->create($data);
            return response([
                'title' => 'Uğurlu',
                'message' => 'Yeni məlumat əlavə edildi!',
                'status' => 'success',
            ]);
        } catch (\Exception $exception) {
            return response([
                'title' => 'Uğursuz',
                'message' => 'Xeta bas verdi! yeniden cehd edin' . $exception->getMessage(),
                'status' => 'error',
            ]);
        }
    }

    /**
     * @param MenuRequest $request
     * @param Menu $menu
     * @return Response
     */
    public function update(MenuRequest $request, Menu $menu): Response
    {
        try {
            $data = $request->all();
            $data['url'] = Str::slug($data['name_en']);
            $menu->update($data);
            return response([
                'title' => 'Uğurlu',
                'message' => 'Yeni məlumat əlavə edildi!',
                'status' => 'success',
            ]);
        } catch (\Exception $exception) {
            return response([
                'title' => 'Uğursuz',
                'message' => 'Xeta bas verdi! yeniden cehd edin' . $exception->getMessage(),
                'status' => 'error',
            ]);
        }
    }

    /**
     * @param Menu $menu
     * @return Response
     */
    public function delete(Menu $menu): Response
    {
        try {
            $menu->delete();
            return response([
                'title' => 'Uğurlu',
                'message' => 'Məlumat silindi!',
                'status' => 'success',
            ]);
        } catch (\Exception $exception) {
            return response([
                'title' => 'Uğursuz',
                'message' => 'Xeta bas verdi! yeniden cehd edin' . $exception->getMessage(),
                'status' => 'error',
            ]);
        }
    }
}

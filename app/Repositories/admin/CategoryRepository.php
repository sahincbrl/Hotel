<?php

namespace App\Repositories\admin;

use App\Http\Requests\Admin\CategoryRequest;
use App\Http\Requests\Admin\MenuRequest;
use App\Models\Category;
use App\Models\Menu;
use App\Repositories\admin\Contracts\CategoryRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * @return Collection
     */
    public function categories():Collection
    {
     return Category::all();
    }

    /**
     * @param CategoryRequest $request
     * @param Category $category
     * @return Response
     */
    public function create(CategoryRequest $request, Category $category):Response
    {
        try {
            $data = $request->all();
            $category->newQuery()->create($data);
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
     * @param CategoryRequest $request
     * @param Category $category
     * @return Response
     */
    public function update(CategoryRequest $request, Category $category): Response
    {
        try {
            $data = $request->all();
            $data['url'] = Str::slug($data['name_en']);
            $category->update($data);
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
     * @param Category $category
     * @return Response
     */
    public function delete(Category $category): Response
    {
        try {
            $category->delete();
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

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Http\Requests\Admin\MenuRequest;
use App\Models\Category;
use App\Models\Menu;
use App\Services\admin\Contracts\CategoryServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class CategoryController extends Controller
{
   private const path='admin.category.';

    /**
     * @param CategoryServiceInterface $categoryService
     */
   public function __construct(private readonly CategoryServiceInterface $categoryService)
   {

   }

    /**
     * @return View
     */

   public function index():View
   {
       $categories=$this->categoryService->categories();
     return view(self::path.'index',
     compact('categories'));
   }

    /**
     * @return View
     */
    public function create(): View
    {
        return view(self::path . 'create');
    }

    /**
     * @param CategoryRequest $request
     * @param Category $category
     * @return Response
     */
    public function store(CategoryRequest $request, Category $category): Response
    {
        return $this->categoryService->create($request, $category);
    }

    /**
     * @param Category $category
     * @return View
     */
    public function edit(Category $category): View
    {
        return view(self::path . 'edit', compact('category'));
    }

    /**
     * @param CategoryRequest $request
     * @param Category $category
     * @return Response
     */
    public function update(CategoryRequest $request, Category $category): Response
    {
        return $this->categoryService->update($request, $category);
    }

    /**
     * @param Category $category
     * @return Response
     */
    public function destroy(Category $category): Response
    {
        return $this->categoryService->delete($category);
    }
}

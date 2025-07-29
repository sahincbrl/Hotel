<?php

namespace App\Services\admin;

use App\Http\Requests\Admin\CategoryRequest;
use App\Http\Requests\Admin\MenuRequest;
use App\Models\Category;
use App\Models\Menu;
use App\Repositories\admin\Contracts\CategoryRepositoryInterface;
use App\Services\admin\Contracts\CategoryServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;

class CategoryService implements CategoryServiceInterface
{
    /**
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(private readonly CategoryRepositoryInterface $categoryRepository)
    {

    }

    /**
     * @return Collection
     */
    public function categories(): Collection
    {
        return $this->categoryRepository->categories();
    }

    /**
     * @param CategoryRequest $request
     * @param Category $category
     * @return Response
     */
    public function create(CategoryRequest $request, Category $category): Response
    {
        return $this->categoryRepository->create($request, $category);
    }

    /**
     * @param CategoryRequest $request
     * @param Category $category
     * @return Response
     */
    public function update(CategoryRequest $request, Category $category): Response
    {
        return $this->categoryRepository->update($request, $category);
    }

    /**
     * @param Category $category
     * @return Response
     */
    public function delete(Category $category): Response
    {
        return $this->categoryRepository->delete($category);
    }


}

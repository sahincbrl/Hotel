<?php

namespace App\Repositories\admin\Contracts;

use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;

interface CategoryRepositoryInterface
{
    /**
     * @return Collection
     */
public function categories():Collection;

    /**
     * @param CategoryRequest $request
     * @param Category $category
     * @return Response
     */
public function create(CategoryRequest $request,Category $category):Response;

    /**
     * @param CategoryRequest $request
     * @param Category $category
     * @return Response
     */
public function update(CategoryRequest $request,Category $category):Response;

    /**
     * @param Category $category
     * @return Response
     */
public function delete(Category $category):Response;



}

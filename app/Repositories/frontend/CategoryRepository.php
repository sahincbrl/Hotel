<?php

namespace App\Repositories\frontend;

use App\Models\Category;
use App\Repositories\frontend\Contracts\CategoryRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * @return Collection
     */
    public function categories(): Collection
    {
        return Category::query()->where('status', 1)->get();
    }
}

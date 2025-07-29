<?php

namespace App\Services\frontend;

use App\Repositories\frontend\Contracts\CategoryRepositoryInterface;
use App\Services\frontend\Contracts\CategoryServiceInterface;
use Illuminate\Database\Eloquent\Collection;

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
}

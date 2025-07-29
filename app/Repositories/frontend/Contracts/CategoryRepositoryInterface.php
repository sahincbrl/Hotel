<?php

namespace App\Repositories\frontend\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface CategoryRepositoryInterface
{
    /**
     * @return Collection
     */
    public function categories(): Collection;
}

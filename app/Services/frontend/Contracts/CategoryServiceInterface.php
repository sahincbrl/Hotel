<?php

namespace App\Services\frontend\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface CategoryServiceInterface
{
    /**
     * @return Collection
     */
    public function categories(): Collection;
}

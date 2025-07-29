<?php

namespace App\Services\admin\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface CategoryServiceInterface
{
    /**
     * @return Collection
     */
public function categories():Collection;
}

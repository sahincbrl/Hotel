<?php

namespace App\Repositories\frontend\Contracts;


use Illuminate\Database\Eloquent\Collection;

interface SlideshowRepositoryInterface
{
    /**
     * @return Collection
     */
    public function slideshows(): Collection;
}

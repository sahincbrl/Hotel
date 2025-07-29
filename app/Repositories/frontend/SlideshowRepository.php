<?php

namespace App\Repositories\frontend;

use App\Models\Slideshow;
use App\Repositories\frontend\Contracts\SlideshowRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class SlideshowRepository implements SlideshowRepositoryInterface
{

    public function slideshows():Collection
    {
        return Slideshow::query()->where('status', 1)->get();
    }
}

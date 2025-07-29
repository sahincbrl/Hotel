<?php

namespace App\Services\frontend\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface SlideshowServiceInterface
{
    public function slideshows(): Collection;
}

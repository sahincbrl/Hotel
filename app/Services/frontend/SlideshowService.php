<?php

namespace App\Services\frontend;

use App\Repositories\frontend\Contracts\SlideshowRepositoryInterface;
use App\Services\frontend\Contracts\SlideshowServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class SlideshowService implements SlideshowServiceInterface
{

    public function __construct(private readonly SlideshowRepositoryInterface $slideshowRepository)
    {

    }

    /**
     * @return Collection
     */
    public function slideshows(): Collection
    {
        return $this->slideshowRepository->slideshows();
    }
}

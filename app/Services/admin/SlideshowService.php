<?php

namespace App\Services\admin;

use App\Http\Requests\Admin\SlideshowRequest;
use App\Models\Slideshow;
use App\Repositories\admin\Contracts\SlideshowRepositoryInterface;
use App\Services\admin\Contracts\AdminServiceInterface;
use App\Services\admin\Contracts\SlideshowServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;

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

    /**
     * @param SlideshowRequest $request
     * @param Slideshow $slideshow
     * @return Response
     */
    public function create(SlideshowRequest $request, Slideshow $slideshow): Response
    {
        return $this->slideshowRepository->create($request, $slideshow);
    }

    /**
     * @param SlideshowRequest $request
     * @param Slideshow $slideshow
     * @return Response
     */
    public function update(SlideshowRequest $request, Slideshow $slideshow): Response
    {
        return $this->slideshowRepository->update($request, $slideshow);
    }

    /**
     * @param Slideshow $slideshow
     * @return Response
     */
    public function delete(Slideshow $slideshow): Response
    {
        return $this->slideshowRepository->delete($slideshow);
    }
}

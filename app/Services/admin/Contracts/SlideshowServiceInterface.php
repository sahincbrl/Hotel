<?php

namespace App\Services\admin\Contracts;

use App\Http\Requests\Admin\SlideshowRequest;
use App\Models\Slideshow;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;

interface SlideshowServiceInterface
{

    /**
     * @return Collection
     */
    public function slideshows():Collection;


    /**
     * @param SlideshowRequest $request
     * @param Slideshow $slideshow
     * @return Response
     */
    public function create(SlideshowRequest $request, Slideshow $slideshow): Response;

    /**
     * @param SlideshowRequest $request
     * @param Slideshow $slideshow
     * @return Response
     */
    public function update(SlideshowRequest $request, Slideshow $slideshow): Response;

    /**
     * @param Slideshow $slideshow
     * @return Response
     */
    public function delete(Slideshow $slideshow): Response;

}

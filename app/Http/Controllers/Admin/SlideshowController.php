<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SlideshowRequest;
use App\Models\Slideshow;
use App\Repositories\admin\Contracts\SlideshowRepositoryInterface;
use App\Services\admin\Contracts\SlideshowServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class SlideshowController extends Controller
{

    private const path = 'admin.slideshow.';


    /**
     * @param SlideshowServiceInterface $slideshowService
     */
    public function __construct(private readonly SlideshowServiceInterface $slideshowService)
    {

    }

    /**
     * @return View
     */
    public function index():View
    {
        $slideshows = $this->slideshowService->slideshows();
        return view(self::path . 'index',
            compact('slideshows'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view(self::path . 'create');
    }

    /**
     * @param SlideshowRequest $request
     * @param Slideshow $slideshow
     * @return Response
     */
    public function store(SlideshowRequest $request, Slideshow $slideshow): Response
    {
        return $this->slideshowService->create($request, $slideshow);
    }

    /**
     * @param string $id
     * @return void
     */
    public function show(string $id)
    {
        //
    }

    /**
     * @param Slideshow $slideshow
     * @return View
     */
    public function edit(Slideshow $slideshow): View
    {
        return view(self::path . 'edit', compact('slideshow'));
    }

    /**
     * @param SlideshowRequest $request
     * @param Slideshow $slideshow
     * @return Response
     */
    public function update(SlideshowRequest $request, Slideshow $slideshow): Response
    {
        return $this->slideshowService->update($request, $slideshow);
    }

    /**
     * @param Slideshow $slideshow
     * @return Response
     */
    public function destroy(Slideshow $slideshow): Response
    {
        return $this->slideshowService->delete($slideshow);
    }
}

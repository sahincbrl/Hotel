<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\frontend\Contracts\SlideshowRepositoryInterface;
use App\Services\frontend\Contracts\MenuServiceInterface;
use App\Services\frontend\Contracts\RoomServiceInterface;
use App\Services\frontend\Contracts\SlideshowServiceInterface;
use Illuminate\View\View;

class HomeController extends Controller
{
    private const path = 'frontend.home.';


    public function __construct(private readonly RoomServiceInterface      $roomService,
                                private readonly SlideshowServiceInterface $slideshowService)
    {

    }


    /**
     * @return View
     */
    public function index(): View
    {
        $slideshows = $this->slideshowService->slideshows();
        $rooms = $this->roomService->rooms();
        return view(self::path . 'index',
            compact('rooms', 'slideshows'));
    }


}

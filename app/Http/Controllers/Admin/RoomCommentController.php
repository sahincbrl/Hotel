<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\admin\Contracts\RoomCommentServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class RoomCommentController extends Controller
{
    private const path = 'admin.roomComment.';

    public function __construct(private readonly RoomCommentServiceInterface $roomCommentService)
    {

    }

    /**
     * @return View
     */
    public function index(): View
    {
        $comments = $this->roomCommentService->comment();
        return view(self::path . 'index',
            compact('comments'));
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function activeDeactive(Request $request): Response
    {
        return $this->roomCommentService->activeDeactive($request);
    }


}

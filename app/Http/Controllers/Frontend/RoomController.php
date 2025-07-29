<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\frontend\OrderRequest;
use App\Http\Requests\frontend\RoomCommentRequest;
use App\Models\Order;
use App\Models\RoomComment;
use App\Services\frontend\Contracts\CategoryServiceInterface;
use App\Services\frontend\Contracts\OrderServiceInterface;
use App\Services\frontend\Contracts\RoomCommentServiceInterface;
use App\Services\frontend\Contracts\RoomServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class RoomController extends Controller
{
    private const path = 'frontend.room.';

    /**
     * @param RoomServiceInterface $roomService
     * @param CategoryServiceInterface $categoryService
     * @param RoomCommentServiceInterface $roomCommentService
     * @param OrderServiceInterface $orderService
     */
    public function __construct(private readonly RoomServiceInterface        $roomService,
                                private readonly CategoryServiceInterface    $categoryService,
                                private readonly RoomCommentServiceInterface $roomCommentService,
                                private readonly OrderServiceInterface       $orderService)
    {

    }

    /**
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        $categories = $this->categoryService->categories();
        $room = $this->roomService->findById($id);
        return view(self::path . 'show',
            compact('room', 'categories'));
    }

    /**
     * @param RoomCommentRequest $request
     * @param RoomComment $roomComment
     * @return Response
     */
    public function postRoomComment(RoomCommentRequest $request, RoomComment $roomComment): Response
    {
        return $this->roomCommentService->create($request, $roomComment);
    }

    /**
     * @param OrderRequest $orderRequest
     * @param Order $order
     * @return Response
     */
    public function postOrder(OrderRequest $orderRequest, Order $order): Response
    {
        return $this->orderService->create($orderRequest, $order);
    }
}

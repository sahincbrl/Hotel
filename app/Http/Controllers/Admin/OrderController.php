<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\admin\Contracts\OrderServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class OrderController extends Controller
{
    private const path = 'admin.order.';

    public function __construct(private readonly OrderServiceInterface $orderService)
    {

    }

    /**
     * @return View
     */
    public function index(): View
    {
        $orders = $this->orderService->orders();
        return view(self::path . 'index',
            compact('orders'));
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function apply(Request $request): Response
    {
        return $this->orderService->apply($request);
    }

}

<?php

namespace App\Services\frontend;

use App\Http\Requests\frontend\OrderRequest;
use App\Models\Order;
use App\Repositories\frontend\Contracts\OrderRepositoryInterface;
use App\Services\frontend\Contracts\OrderServiceInterface;
use Illuminate\Http\Response;

class OrderService implements OrderServiceInterface
{
    /**
     * @param OrderRepositoryInterface $orderRepository
     */
    public function __construct(private readonly OrderRepositoryInterface $orderRepository)
    {

    }

    /**
     * @param OrderRequest $request
     * @param Order $order
     * @return Response
     */
    public function create(OrderRequest $request, Order $order): Response
    {
        return $this->orderRepository->create($request, $order);
    }


}

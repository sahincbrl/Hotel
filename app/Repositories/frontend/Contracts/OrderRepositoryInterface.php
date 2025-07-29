<?php

namespace App\Repositories\frontend\Contracts;

use App\Http\Requests\frontend\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Response;

interface OrderRepositoryInterface
{
    /**
     * @param OrderRequest $request
     * @param Order $order
     * @return Response
     */
    public function create(OrderRequest $request, Order $order): Response;
}

<?php

namespace App\Services\frontend\Contracts;

use App\Http\Requests\frontend\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Response;

interface OrderServiceInterface
{
    /**
     * @param OrderRequest $request
     * @param Order $order
     * @return Response
     */
    public function create(OrderRequest $request, Order $order): Response;
}

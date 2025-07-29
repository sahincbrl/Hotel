<?php

namespace App\Services\admin;

use App\Repositories\admin\Contracts\OrderRepositoryInterface;
use App\Services\admin\Contracts\OrderServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
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
     * @return Collection
     */
    public function orders(): Collection
    {
        return $this->orderRepository->orders();
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function apply(Request $request): Response
    {
        return $this->orderRepository->apply($request);
    }
}

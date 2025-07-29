<?php

namespace App\Repositories\frontend;

use App\Http\Requests\frontend\OrderRequest;
use App\Models\Order;
use App\Repositories\frontend\Contracts\OrderRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Response;

class OrderRepository implements OrderRepositoryInterface
{
    /**
     * @param OrderRequest $request
     * @param Order $order
     * @return Response
     */
    public function create(OrderRequest $request, Order $order): Response
    {
        try {
            $data = $request->all();
            $startDate = Carbon::createFromFormat('Y-m-d', $request->check_in);
            $endDate = Carbon::createFromFormat('Y-m-d', $request->check_out);
            $totalDays = $startDate->diffInDays($endDate) + 1;
            $data['price'] = $request->price * $totalDays;
            $order->newQuery()->create($data);
            return response([
                'title' => 'Uğurlu',
                'message' => 'Tez bir zamanda admin sizin ilə əlaqə saxlayacaq',
                'status' => 'success'
            ]);
        } catch (\Exception $exception) {
            return response([
                'title' => 'Uğursuz',
                'message' => 'Xeta bas verdi! yeniden cehd edin',
                'status' => 'error'
            ]);
        }
    }
}

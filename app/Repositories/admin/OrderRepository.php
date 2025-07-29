<?php

namespace App\Repositories\admin;

use App\Models\Category;
use App\Models\Order;
use App\Repositories\admin\Contracts\OrderRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class OrderRepository implements OrderRepositoryInterface
{
    /**
     * @return Collection
     */
    public function orders(): Collection
    {
        return Order::all();
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function apply(Request $request): Response
    {
        try {
            $order = Order::query()->find($request->id);
            if ($order->is_apply == 0) {
                $order->is_apply = 1;
                $order->save();
                $order->room->status = 2;
                $order->room->save();
                Mail::send('email.send_message',
                    ['msg' => 'Cavab: ' . 'Sizin sifarişiniz təsdiq olundu.'], function ($message) use ($order) {
                        $message->to($order->email, $order->name . ' ' . $order->surname)->subject('Təsdiq');
                        $message->from('aqileli2002@mail.ru', 'Sahin Otel');
                    });

            } else {
                $order->is_apply = 0;
                $order->save();

                $order->room->status = 1;
                $order->room->save();

                Mail::send('email.send_message',
                    ['msg' => 'Cavab: ' . 'Sizin sifarişiniz təsdiqlənmədi!.'], function ($message) use ($order) {
                        $message->to($order->email, $order->name . ' ' . $order->surname)->subject('İnkar');
                        $message->from('aqileli2002@mail.ru', 'Sahin Otel');
                    });
            }
            return response(['title' => 'Uğurlu', 'message' => 'Sifariş təsdiqləndi.', 'status' => 'success']);
        } catch (\Exception $e) {
            return response(['title' => 'Xəta!', 'message' => 'Xəta baş verdi!' . $e->getMessage(), 'status' => 'error']);
        }
    }

}

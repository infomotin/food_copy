<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class ManageOrderController extends Controller
{
    //AdminAllOrder

    public function AdminAllOrder()
    {
        $orders = Order::all();
        return view('admin.backend.order.index', compact('orders'));
    }
    //AdminViewOrder

    public function AdminViewOrder($id)
    {
        $orders = Order::with('user')->where('id', $id)->first();
        $orderItems = OrderItem::with('product')->where('order_id', $id)->orderBy('id', 'DESC')->get();
        //Calculate Total Price
        $totalPrice = 0;
        foreach ($orderItems as $item) {
            $totalPrice += $item->price * $item->quantity;
        }
        return view('admin.backend.order.view', compact('orders', 'orderItems','totalPrice'));
    }
}

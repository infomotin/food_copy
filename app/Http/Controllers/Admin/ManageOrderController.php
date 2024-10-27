<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class ManageOrderController extends Controller
{
    //AdminAllOrder

    public function AdminAllOrder()
    {
        $orders = Order::all();
        return view('admin.backend.order.index', compact('orders'));
    }
}

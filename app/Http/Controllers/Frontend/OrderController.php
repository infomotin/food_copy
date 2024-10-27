<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Carbon\Carbon;
class OrderController extends Controller
{
    //CashOrder 

    public function CashOrder(Request $request)
    {
        // dd($request->all());
        // $validate = $request->validate([
        //     'name' => 'required',
        //     'phone' => 'required',
        //     'address' => 'required',
        //     'email' => 'required',
        // ]);
        // if session empty then redirect to home
       
        $cart = session()->get('cart', []);
        $totalAmount = 0;

        foreach ($cart as $key => $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        }
        //if session have coupon
        if (Session::has('coupon')) {
            $totalAmount -= Session::get('coupon')['discount_amount'];
        }else{
            $totalAmount;
        }
        //Auto Order Number Generate using 
        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'first_name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'postcode' => $request->post_code,
            'order_note' => $request->notes,
            'amount' => $totalAmount,
            'total_amount' => $totalAmount,
            'payment_status' => 'pending',
            'payment_type' => 'Cash On Delivery',
            'payment_method' => 'Cash On Delivery',
            'currency' => 'USD',
            'transaction_id' => 0,
            'created_at' => Carbon::now(),
            'order_process_date' => Carbon::now(),
            'invoice_no' => 'INV-'.Carbon::now()->format('Y').mt_rand(10000000,99999999),
            'order_no' => 'ORD-'.Carbon::now()->format('Y').mt_rand(10000000,99999999),
            //increment order number
            // 'order_no' => IdGenerator::generate([
            //     'table' => 'orders',
            //     'field' => 'order_no',
            //     'length' => 6,

            //     'prefix' => 'ORD-'.date('Y').'-',

            // ]),
            // 'invoice_no' => IdGenerator::generate([
            //     'table' => 'orders',
            //     'field' => 'invoice_no',
            //     'length' => 6,
            //     'prefix' => 'INV-'.date('Y').'-',
            // ]),
            'order_date' => Carbon::now(),
            'order_time' => Carbon::now(),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            // 'order_day' => Carbon::now()->format('d'),
            'order_status' => 'pending',

        ]);
        // dd($order_id);
        //insert order item
        foreach ($cart as $key => $item) {
            $price = $item['price'] * $item['quantity'];
            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $item['id'],
                // 'product_name' => $item['name'],
                // 'color' => 'No Color',
                // 'size' => 'No Size',
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'total_price' => $price,
                'client_id' => $item['client_id'],
                'created_at' => Carbon::now(),
            ]);
        }
        // dd(OrderItem::all());
        //clear cart
        if(Session::has('cart')){
            Session::forget('cart');
        }
        if(Session::has('coupon')){
            Session::forget('coupon');
        }
        
        //notification
        $notification = array(
            'message' => 'Your Order Placed Successfully',
            'alert-type' => 'success'
        );
        // return view('frontend.checkout.success')->with($notification);
        // dd($notification);
        return redirect()->route('dashboard')->with($notification);
    }
    //CashOrderSubmit

    // public function CashOrderSubmit()
    // {
    //     return view('frontend.checkout.success');
    // }

    //admin order list
    // public function AdminAllOrder()
    // {
    //     $orders = Order::latest()->get();

    //     return view('admin.backend.order.index',compact('orders'));
    // }
}

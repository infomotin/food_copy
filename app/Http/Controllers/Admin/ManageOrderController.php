<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

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
    //AdminOrderConfirm

    public function AdminOrderConfirm($id)
    {
        $orders = Order::find($id);
        $orders->order_status = 'confirm';
        $orders->order_process_date = Carbon::now();
        $orders->update();
        //notification
        $notification = array(
            'message' => 'Order Confirm Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
        // return redirect()->back();
    }
    //AdminOrderProcess

    public function AdminOrderProcess($id)
    {
        $orders = Order::find($id);
        $orders->order_status = 'processing';
        $orders->order_process_date = Carbon::now();
        $orders->update();
        //notification
        $notification = array(
            'message' => 'Order Processing Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
        // return redirect()->back();
    }
    //AdminOrderDelivered

    public function AdminOrderDelivered($id)
    {
        $orders = Order::find($id);
        $orders->order_status = 'delivered';
        $orders->order_process_date = Carbon::now();
        $orders->update();
        //notification
        $notification = array(
            'message' => 'Order Delivered Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
        // return redirect()->back();
    }
    //ClientOrderAll

    public function ClientOrderAll()
    {
        $client_id = Auth::guard('client')->user()->id;
        $orderItems = OrderItem::with(['product','order'])->where('client_id', $client_id)->orderBy('id', 'DESC')->get()->groupBy('order_id');
        // dd($orderItems);
        return view('client.backend.order.index',compact('orderItems'));
    }
    //ClientOrderView

    public function ClientOrderView($id){
        $client_id = Auth::guard('client')->user()->id;
        $oderData = Order::where('id', $id)->first();
        $orderItems = OrderItem::with('product')->where('order_id', $id)->where('client_id', $client_id)->orderBy('id', 'DESC')->get();
        $totalPrice = 0;
        foreach ($orderItems as $item) {
            $totalPrice += $item->price * $item->quantity;
        }
        
        // dd($orderItems);
        return view('client.backend.order.view',compact('orderItems','oderData','totalPrice'));
    }
    //ClientOrderConfirm

    public function ClientOrderConfirm($id){    
        $orders = Order::find($id);
        $orders->order_status = 'confirm';
        $orders->order_process_date = Carbon::now();
        $orders->update();
        //notification
        $notification = array(
            'message' => 'Order Confirm Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
        // return redirect()->back();
    }
    //ClientOrderProcess

    public function ClientOrderProcess($id){
        $orders = Order::find($id);
        $orders->order_status = 'processing';
        $orders->order_process_date = Carbon::now();
        $orders->update();
        //notification
        $notification = array(
            'message' => 'Order Processing Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
        // return redirect()->back();
    }
    //ClientOrderDelivered

    public function ClientOrderDelivered($id){
        $orders = Order::find($id);
        $orders->order_status = 'delivered';
        $orders->order_process_date = Carbon::now();
        $orders->update();
        //notification
        $notification = array(
            'message' => 'Order Delivered Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
        // return redirect()->back();
    }
    //ClientOrderReject

    public function ClientOrderReject($id){
        $orders = Order::find($id);
        $orders->order_status = 'reject';
        $orders->order_process_date = Carbon::now();
        $orders->update();
        //notification
        $notification = array(
            'message' => 'Order Reject Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
        // return redirect()->back();
    }
    //UserCheckout

    public function UserCheckout(){
        // dd('hello');
        return view('client.backend.order.checkout');
    }
    //UserOrderCancel

    public function UserOrderCancel($id){
        $orders = Order::find($id);
        //change order status
        if($orders->order_status == 'pending'){
            $orders->order_status = 'cancel';
            $orders->order_process_date = Carbon::now();
            $orders->update();
        }else{
            $notification = array(
                'message' => 'Order Processing,Cancel Not Successfully',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        //notification
        $notification = array(
            'message' => 'Order Cancel Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
        // return redirect()->back();

       
    }
    //UserOrderInfo

    public function UserOrderInfo($id){
        $order = Order::with('user')->where('id', $id)->first();
        $orderItems = OrderItem::with('product')->where('order_id', $id)->orderBy('id', 'DESC')->get();
        $totalPrice = 0;
        // dd($orderItems);
        foreach ($orderItems as $item) {
            $totalPrice += $item->price * $item->quantity;
        }
        // dd($orderItems);
        $pdf = PDF::loadView('frontend.dashboard.invoice_download', compact('order', 'orderItems','totalPrice'))->setPaper('a4', 'landscape')->setOption(
            [
                'enable_php' => true, 
                'dpi' => 150, 
                'default_font' => 'sans-serif',
                'tempDir' => public_path(),
                'chroot' => public_path(),

            ],
        );
        return $pdf->download('invoice-' . $order->id . '.pdf');
        // return view('frontend.dashboard.invoice_download',compact('orderItems','totalPrice','orders'));
    }
}

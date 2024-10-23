<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client\Product;
use Illuminate\Support\Facades\Session;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Auth;
use App\Models\Coupon;
use Carbon\Carbon;

class CartController extends Controller
{
    //AddToCart

    public function AddToCart($id)
    {
        //if session has coupon remove coupon
        if (session()->has('coupon')) {
            session()->forget('coupon');
        }
        //get product
        $product = Product::find($id);
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // $cart[$id] = [
            //     "name" => $product->name,
            //     "quantity" => 1,
            //     "price" => $product->price,
            //     "image" => $product->image,
            // ];
            $priceToShow = isset($product->discount_price) ? $product->discount_price : $product->price;
            $cart[$id] = [
                'id' => $product->id,
                'name' => $product->name,
                'quantity' => 1,
                'price' => $priceToShow,
                'image' => $product->image,
                'client_id' => $product->client_id,
            ];
        }
        session()->put('cart', $cart);
        // dd(session()->get('cart'));
        // return response()->json($cart);
        // return redirect()->back()->with('success', 'Product added to cart successfully!');
        $nofication = array(
            'message' => 'Product added to cart successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($nofication);
    }
    //UpdateFromCart

    public function UpdateFromCart(Request $request)
    {
        // return response()->json($request->all());
        if (session()->has('coupon')) {
            session()->forget('coupon');
        }
        $cart = session()->get('cart', []);

        if (isset($cart[$request->id])) {
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }
        $nofication = array(
            'message' => 'Cart updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($nofication);
    }
    //RemoveFromCart
    public function RemoveFromCart(Request $request)
    {
        if (session()->has('coupon')) {
            session()->forget('coupon');
        }
        if ($request->id) {
            $cart = session()->get('cart');
            $coupon = session()->get('coupon');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            if ($coupon) {
                session()->forget('coupon');
                $nofication = array(
                    'message' => 'Cart updated successfully!',
                    'alert-type' => 'success'
                );
            }
            $nofication = array(
                'message' => 'Cart updated successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($nofication);
        }
    }
    //ApplyCoupon
    public function ApplyCoupon(Request $request)
    {
        //first get co
        
        $coupon = Coupon::where('coupon_name', $request->coupon_name)->where('coupon_status', 1)->where('coupon_validity', '>=', Carbon::now()->format('Y-m-d'))->first();
        //get cart from session
        $cart = session()->get('cart', []);
        //initialize total amount
        $totalAmount = 0;
        //get client id
        $clientIds = [];
        //loop through cart
        foreach ($cart as $key => $item) {

            $totalAmount += $item['price'] * $item['quantity'];
            $productId = Product::where('id', $item['id'])->first();
            $clientId = $productId->client_id;
            array_push($clientIds, $clientId);
            $clientIds = array_unique($clientIds);
        }
        //check if coupon is valid
        if ($coupon) {
            if (count($clientIds) === 1) {
                $vendorId = $coupon->client_id;
                if ($vendorId == $clientIds[0]) {
                    $cart = session()->get('cart', []);
                    Session::put('coupon', [
                        'coupon_name' => $coupon->coupon_name,
                        'coupon_discount' => $coupon->coupon_discount,
                        'discount_amount' => round(($totalAmount * $coupon->coupon_discount) / 100),
                        'total_amount' => round($totalAmount - ($totalAmount * $coupon->coupon_discount) / 100),
                    ]);
                    $couponData = Session::get('coupon');
                    return response()->json(array(
                        'couponData' => $couponData,
                        'status' => true,
                        'message' => 'Coupon applied successfully!',
                        'validity' => true,
                        'alert-type' => 'success'
                    ));
                } else {
                    return response()->json(array(
                        'status' => false,
                        'message' => 'Coupon not valid!',
                        'validity' => false,
                        'alert-type' => 'error'
                    ));
                }
            } else {
                return response()->json(array(
                    'status' => false,
                    'message' => 'Coupon not valid!',
                    'validity' => false,
                    'alert-type' => 'error'
                ));
            }

            if (count($clientIds) > 1) {
                $nofication = array(
                    'message' => 'tow clients are using this coupon!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($nofication);
            }
        } else {
            $nofication = array(
                'message' => 'Coupon not valid!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($nofication);
        }
        // if($request->coupon_name){
        //     $coupon = $request->coupon_name;
        //     $check = Coupon::where('coupon_name', $coupon)->where('coupon_status', 1)->where('coupon_validity', '>=', Carbon::now()->format('Y-m-d'))->first();
        //     $cart = session()->get('cart',[]);
        //         $totalAmount = 0;
        //         $clientIds = [];
        //         foreach($cart as $key => $item){
        //             $totalAmount += $item['price'] * $item['quantity'];
        //             $productId = Product::where('id', $key)->first();
        //             $clientId = $item->client_id;
        //             array_push($clientIds, $clientId);
        //             $clientIds = array_unique($clientIds);
        //         }

        //     if($check){
        //         if(count($clientIds) === 1){
        //             $vendorId = $check->client_id;
        //             if($vendorId == $clientIds[0]){
        //                 $cart = session()->get('cart', []);
        //                 Session::put('coupon', [
        //                     'coupon_name' => $check->coupon_name,
        //                     'coupon_discount' => $check->coupon_discount,
        //                     'discount_amount' => $totalAmount -(($totalAmount *$check->coupon_discount)/100),

        //                 ]);
        //                 $coupon = session()->get('coupon');
        //                 return response()->json(array(
        //                     'coupon' => $coupon,
        //                     'validity' => true,
        //                     'seccess' => 'Coupon applied successfully!'
        //                 ));
        //             }
        //             // foreach($cart as $key => $item){
        //             //     if($check->client_id == $item->client_id){
        //             //         $cart[$key]['coupon_name'] = $check->coupon_name;
        //             //         $cart[$key]['coupon_description'] = $check->coupon_description;
        //             //         $cart[$key]['coupon_discount'] = $check->coupon_discount;
        //             //         $cart[$key]['coupon_validity'] = $check->coupon_validity;
        //             //         $cart[$key]['coupon_code'] = $check->coupon_code;
        //             //         session()->put('cart', $cart);
        //             //     }
        //             //     else{
        //             //         $nofication = array(
        //             //             'message' => 'Invalid coupon!',
        //             //             'alert-type' => 'error'
        //             //         );
        //             //         return redirect()->back()->with($nofication);
        //             //     }
        //             // }
        //         }
        //         $nofication = array(
        //             'message' => 'Coupon applied successfully!',
        //             'alert-type' => 'success'
        //         );
        //         return redirect()->back()->with($nofication);
        //     }
        //     else{
        //         $nofication = array(
        //             'message' => 'Invalid coupon!',
        //             'alert-type' => 'error'
        //         );
        //         return redirect()->back()->with($nofication);
        //     }
        // }
        // return response()->json($request->all());
    }
    //RemoveCoupon
    public function RemoveCoupon(Request $request)
    {
        if ($request->coupon_name) {
            session()->forget('coupon');

            $nofication = array(
                'message' => 'Coupon removed successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($nofication);
        } else {
            $nofication = array(
                'message' => 'Coupon not valid!',
                'alert-type' => 'error'
            );
            return response()->json($nofication);
        }
    }
    //ShopCheckout
    public function ShopCheckout()
    {
        if (Auth::check()) {
            //get cart data from session
            $cart = session()->get('cart', []);

            if (count($cart) > 0) {
                $totalAmount = 0;
                $clientIds = [];
                foreach ($cart as $key => $item) {
                    $totalAmount += $item['price'];
                }
                if ($totalAmount > 0) {
                    $client = \App\Models\Client::find($item['client_id']);
                    $userData = Auth::user();
                    return view('frontend.checkout.shop-checkout', compact('cart', 'totalAmount', 'client','userData'));
                } else {
                    $nofication = array(
                        'message' => 'Cart is empty!',
                        'alert-type' => 'error'
                    );
                    return redirect()->route('home')->with($nofication);
                }
            }else{
                $nofication = array(
                    'message' => 'Cart is empty!',
                    'alert-type' => 'error'
                );
                return redirect()->route('home')->with($nofication);
            }
        } else {
            $nofication = array(
                'message' => 'Please login first!',
                'alert-type' => 'error'
            );
            return redirect()->route('login')->with($nofication);
        }
    }
}

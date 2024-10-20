<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //AddToCart

    public function AddToCart($id)
    {
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
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            $nofication = array(
                'message' => 'Cart updated successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($nofication);
        }
    }
}

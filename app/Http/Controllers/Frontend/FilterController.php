<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Carbon\Carbon;
use App\Models\Client;
use App\Models\Client\Gllery;
use App\Models\Client\Menu;
use App\Models\Wishlist;
use App\Models\Coupon;
use Illuminate\Support\Facades\Log;


class FilterController extends Controller
{
    //ListRestaurant
    public function ListRestaurant(Request $request)
    {
        // $filter = $request->input('filter');
        // $city = $request->input('city');
        // $category = $request->input('category');
        // $search = $request->input('search');
        // $product = Product::where('status', 1)->where('name', 'like', '%' . $search . '%')->get();
        $products = Product::all();
        return view('frontend.list_restaurant', compact('products'));
    }
    //FilterpProducts
    public function FilterpProducts(Request $request)
    {
        // dd($request->all());
        Log::info($request->all());
        $categoryId = $request->input('categorys');
        $cityId = $request->input('citys');
        $menuId = $request->input('menus');
        $products = Product::query();
        // dd($categoryId, $cityId, $menuId);
        if ($categoryId) {
            $products->whereIn('category_id', $categoryId);
        }
        if ($cityId) {
            $products->whereIn('city_id', $cityId);
        }
        if ($menuId) {
            $products->whereIn('menu_id', $menuId);
        }
        $products = $products->get();
        // dd($product);
        return view('frontend.product_list', compact('products'))->render();
    }
}

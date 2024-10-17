<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Client\Menu;

class HomeController extends Controller
{
    // RestaurantDetail
    public function RestaurantDetail($id){
        $restaurant = Client::find($id);
        $menus = Menu::where('client_id', $restaurant->id)->latest()->get();
        return view('frontend.restaurantdetail',compact('restaurant','menus'));
    }
}

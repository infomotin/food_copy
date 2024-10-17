<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

class HomeController extends Controller
{
    // RestaurantDetail
    public function RestaurantDetail($id){
        $restaurant = Client::find($id);
        return view('frontend.restaurantdetail',compact('restaurant'));
    }
}

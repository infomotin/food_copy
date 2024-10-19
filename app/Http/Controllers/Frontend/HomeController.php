<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Client\Gllery;
use App\Models\Client\Menu;
use App\Models\Wishlist;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    // RestaurantDetail
    public function RestaurantDetail($id){
        $restaurant = Client::find($id);
        $menus = Menu::where('client_id', $restaurant->id)->latest()->get()->filter(function($menu){
            return $menu->products->count() > 0;
        });
        $galarys = Gllery::where('client_id', $restaurant->id)->get();
        return view('frontend.restaurantdetail',compact('restaurant','menus','galarys'));
    }
    //AddToWishlist
    public function AddToWishlist(Request $request,$id){
       if(Auth::check()){
           $exist = Wishlist::where('user_id', Auth::id())->where('client_id', $id)->first();
           if($exist){
               return response()->json(['error' => 'This item already exist in your wishlist']);
           }else{
               $wishlist = new Wishlist();
               $wishlist->client_id = $id;
               $wishlist->user_id = Auth::id();
               $created_at = Carbon::now();
               $wishlist->save();
               return response()->json(['success' => 'This item added in your wishlist']);
           }
       }else{
            return response()->json(['error'=>'Please login first']);
       }
        
    }
    //UserFavouritesDelete
    public function UserFavouritesDelete($id){
        // dd($id);
        $wishlist = Wishlist::where('user_id', Auth::id())->where('client_id', $id)->first();
        $wishlist->delete();
        $notification = array(
            'message' => 'Wishlist Deleted Successfully',
            'alert-type' => 'success'
        );

        return back()->with($notification);

        // return back();
    }

    //UserFavourites
    public function UserFavourites(){
        $favourites = \App\Models\Wishlist::where('user_id', Auth::id())->get();
        return view('frontend.dashboard.favourites',compact('favourites'));
    }
}

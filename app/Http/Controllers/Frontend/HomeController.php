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
use App\Models\Review;
use App\Models\ReviesRateing;

class HomeController extends Controller
{
    // RestaurantDetail
    public function RestaurantDetail($id)
    {
        $restaurant = Client::find($id); 
        $menus = Menu::where('client_id', $restaurant->id)->latest()->get()->filter(function ($menu) {
            return $menu->products->count() > 0;
        });
        $reviews = Review::where('client_id', $restaurant->id)->get();
        $total_reviews = Review::where('client_id', $restaurant->id)->count();
        $total_reviews_sum = Review::where('client_id', $restaurant->id)->sum('rating');
        $average_rating = round(($total_reviews > 0 ? $total_reviews_sum / $total_reviews : 0), 1);
        $ratingCount =[
            'one' => Review::where('client_id', $restaurant->id)->where('rating', '1')->count(),
            'two' => Review::where('client_id', $restaurant->id)->where('rating', '2')->count(),
            'three' => Review::where('client_id', $restaurant->id)->where('rating', '3')->count(),
            'four' => Review::where('client_id', $restaurant->id)->where('rating', '4')->count(),
            'five' => Review::where('client_id', $restaurant->id)->where('rating', '5')->count(),
        ];
        $ratingPercent = [
            'one' => round(($ratingCount['one'] > 0 ? $ratingCount['one'] / $total_reviews * 100 : 0), 1),
            'two' => round(($ratingCount['two'] > 0 ? $ratingCount['two'] / $total_reviews * 100 : 0), 1),
            'three' => round(($ratingCount['three'] > 0 ? $ratingCount['three'] / $total_reviews * 100 : 0), 1),
            'four' => round(($ratingCount['four'] > 0 ? $ratingCount['four'] / $total_reviews * 100 : 0), 1),
            'five' => round(($ratingCount['five'] > 0 ? $ratingCount['five'] / $total_reviews * 100 : 0), 1),
        ];

        $revies_ratting = ReviesRateing::where('client_id', $restaurant->id)->first();
        $galarys = Gllery::where('client_id', $restaurant->id)->get();
        return view('frontend.restaurantdetail', compact('restaurant', 'menus', 'galarys', 'reviews', 'revies_ratting','average_rating','ratingCount','ratingPercent','total_reviews'));
    }
    //AddToWishlist
    public function AddToWishlist(Request $request, $id)
    {
        if (Auth::check()) {
            $exist = Wishlist::where('user_id', Auth::id())->where('client_id', $id)->first();
            if ($exist) {
                return response()->json(['error' => 'This item already exist in your wishlist']);
            } else {
                $wishlist = new Wishlist();
                $wishlist->client_id = $id;
                $wishlist->user_id = Auth::id();
                $created_at = Carbon::now();
                $wishlist->save();
                return response()->json(['success' => 'This item added in your wishlist']);
            }
        } else {
            return response()->json(['error' => 'Please login first']);
        }
    }
    //UserFavouritesDelete
    public function UserFavouritesDelete($id)
    {
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
    public function UserFavourites()
    {
        $favourites = \App\Models\Wishlist::where('user_id', Auth::id())->get();
        return view('frontend.dashboard.favourites', compact('favourites'));
    }
}

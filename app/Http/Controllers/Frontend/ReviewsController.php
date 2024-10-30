<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewsController extends Controller
{
    //CommentStore

    public function CommentStore(Request $request)
    {

        $userData = Auth::id();
        //get current url 
        $url = url()->current();
        $referer = $_SERVER['HTTP_REFERER'];
        $splite = explode('/', $referer);
        $last = end($splite);
        // fist count review 
        $count = Review::where('client_id', $last)->where('user_id', Auth::id())->count();
        // dd($count);
        if ($count == 0) {
            $Reviews = new Review();
            $Reviews->user_id = $userData;
            $Reviews->client_id = $last;
            $Reviews->rating = $request->rating;
            $Reviews->review = $request->review;
            $Reviews->save();
            $nofication = array(
                'message' => 'Thank you for your feedback.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($nofication);
        } else {
            $nofication = array(
                'message' => 'You have already given a review.',
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($nofication);
        }
    }
}

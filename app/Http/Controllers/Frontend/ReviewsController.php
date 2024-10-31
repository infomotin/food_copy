<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\ReviesRateing;
use Carbon\Carbon;


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
        $count = Review::where('client_id', $last)->where('user_id', Auth::id())->where('status', 1)->count();
        // dd($count);
        if ($count < 10) {
            // dd('You have already given a review.');
            $Reviews = new Review();
            $Reviews->user_id = $userData;
            $Reviews->client_id = $request->client_id;
            $Reviews->rating = $request->rating;
            $Reviews->review = $request->review;
            $Reviews->created_at = Carbon::now();
            $Reviews->status = 0;
            $Reviews->save();
            $notification = array(
                'message' => 'Thank you for your feedback.',
                'alert-type' => 'success'
            );
            $previousUrl = $request->header('referer');
            // dd($previousUrl);
            $redirectUrl = $previousUrl ? $previousUrl . '#pills-reviews' : route('restaurant.detail', ['id' => $request->client_id]) . '#pills-reviews';
            return redirect()->to($redirectUrl)->with($notification);
        } else {
            // dd('You have already given a review.');
            $notification = array(
                'message' => 'You have already given a review.',
                'alert-type' => 'warning'
            );
            $previousUrl = $request->header('Referer');
            $redirectUrl = $previousUrl ? $previousUrl . '#pills-reviews' : route('restaurant.detail', ['id' => $request->client_id]) . '#pills-reviews';
            return redirect()->to($redirectUrl)->with($notification);
        }
    }
    //UpdateLike
    public function UpdateLike(Request $request)
    {

        // dd($request->all());

        $reviweRateing = new ReviesRateing();
        $reviweRateing->client_id = $request->client_id;
        $reviweRateing->user_id = $request->user_id;
        $reviweRateing->review_id = $request->id;
        $reviweRateing->positive = $request->like;
        $reviweRateing->negative = $request->dislike;
        $reviweRateing->save();
        $notification = array(
            'message' => 'Thank you for your feedback.',
            'alert-type' => 'success'
        );

        return response()->json($notification);
        

    }
    //AdminPendingReview
    public function AdminPendingReview()
    {
        $reviews = Review::all();
        return view('admin.backend.review.pending', compact('reviews'));
    }
    //AdminApprovedReview
    public function AdminApprovedReview()
    {
        $reviews = Review::where('status', 1)->get();
        return view('admin.backend.review.approved', compact('reviews'));
    }
    //AdminDeleteReview
    public function AdminDeleteReview($id)
    {
        $reviews = Review::find($id);
        $reviews->delete();
        $notification = array(
            'message' => 'Review Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    //AdminchangeReviewStatus
    public function AdminchangeReviewStatus(Request $request)
    {
        // dd($request->id, $request->status);
        $reviews = Review::find($request->id);
        if($request->status == 1){
            $reviews->status = 0;
        }else{
            $reviews->status = 1;
        }
        // dd($reviews->status);
        $reviews->status = $request->status;
        $reviews->save();
        $notification = array(
            'message' => 'Review Status Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}

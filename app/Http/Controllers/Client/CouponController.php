<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;




class CouponController extends Controller
{
    //ClientCouponAll

    public function ClientCouponAll()
    {
        $coupons = Coupon::orderBy('id', 'desc')->get();
        return view('client.backend.coupon.index', compact('coupons'));
    }
    //ClientCouponAdd

    public function ClientCouponAdd()
    {
        return view('client.backend.coupon.add');
    }
    //ClientCouponStore

    public function ClientCouponStore(Request $request)
    {
        // dd($request->all());
        $c_date = Carbon::now();
        $c_date->year;
        $coupon_id = IdGenerator::generate(['table' => 'coupons', 'field' => 'coupon_code', 'length' => 5, 'prefix' => $c_date->year.'-'.'CO-']);
        // $request->validate([
        //     'coupon_name' => 'required',
        //     'discount' => 'required',
        //     'start_date' => 'required',
        //     'end_date' => 'required',
        // ]);
        Coupon::insert([
            'coupon_name' => $request->coupon_name,
            'coupon_description' => $request->coupon_description,
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'coupon_code' => $coupon_id,

            // 'start_date' => Carbon::parse($request->start_date)->format('Y-m-d'),
            // 'end_date' => Carbon::parse($request->end_date)->format('Y-m-d'),

            'coupon_status' => 1,
            'client_id' => Auth::guard('client')->id(),
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Coupon Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('client.coupon.all')->with($notification);
    }
    //ClientCouponEdit

    public function ClientCouponEdit($id)
    {
        $coupon = Coupon::find($id);
        return view('client.backend.coupon.edit', compact('coupon'));
    }
    //ClientCouponUpdate

    public function ClientCouponUpdate(Request $request, $id)
    {
        $request->validate([
            'coupon_name' => 'required',
            'discount' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        Coupon::find($id)->update([
            'coupon_name' => $request->coupon_name,
            'coupon_description' => $request->coupon_description,
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'coupon_status' => 1,
            'client_id' => Auth::guard('client')->id(),
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Coupon Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('client.coupon.all')->with($notification);
    }
    //ClientCouponDelete

    public function ClientCouponDelete($id)
    {
        Coupon::find($id)->delete();
        $notification = array(
            'message' => 'Coupon Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('client.coupon.all')->with($notification);
    }
}

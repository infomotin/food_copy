<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    // AllCity

    public function AllCity()
    {
        $userData = City::latest()->get();
        return view('admin.backend.city.index', compact('userData'));
    }
    //AddCity

    public function AddCity()
    {
        return view('admin.backend.city.add');
    }

    //AddCityStore

    public function AddCityStore(Request $request)
    {
        $request->validate([
            'city_name' => 'required',
        ]);
        City::insert([
            'city_name' => $request->city_name,
            'city_slug' => strtolower($request->city_slug),
        ]);
        $notification = array(
            'message' => 'City Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.city')->with($notification);
    }

    // EditCity
    public function EditCity($id)
    {
        // dd($id);
        $category = City::find($id);
        return view('admin.backend.city.edit', compact('category'));
    }

    // UpdateCity

    public function UpdateCity(Request $request, $id)
    {
        $request->validate([
            'city_name' => 'required',
        ]);
        City::find($id)->update([
            'city_name' => $request->city_name,
            'city_slug' => strtolower($request->city_slug),
        ]);
        $notification = array(
            'message' => 'City Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.city')->with($notification);
    }





    //DeleteCity
    public function DeleteCity($id)
    {
        // dd($id);
        City::find($id)->delete();
        return redirect()->route('all.city');
    }

}

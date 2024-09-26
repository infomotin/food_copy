<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function AdminDashboard()
    {
        // return view('admin.dashboard');
        return response()->json(['data' => 'Admin Dashboard']);
    }


    public function AdminLoginSubmit(Request $request)
    {
        dd($request->all());
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|password',
        ]);
        // gate all data into a field
        $check = $request->all();
        //transfer data into datavariable
        $data = [
            'email' => $check['email'],
            'password' => $check['password']
        ];
         if(Auth::guard('admin')->attempt($data)) {
             return redirect()->route('admin.dashboard')->with('success', 'Login Successful');
         }else{
             return redirect()->route('admin.login')->with('error', 'Login details are not valid');
         }



        // $credentials = $request->only('email', 'password');
        // if (Auth::attempt($credentials)) {
        //     return redirect()->intended('/admin/dashboard');
        // }
        return redirect("admin/login")->with('error', 'Login details are not valid');
    }
}

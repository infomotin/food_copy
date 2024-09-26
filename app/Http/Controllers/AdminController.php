<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function AdminDashboard()
    {
        return view('admin.dashboard');
    }

    public function Admin_Login_Submit(Request $request)
    {
        dd($request->all());
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|password',
        ]);



        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/admin/dashboard');
        }
        return redirect("admin/login")->with('error', 'Login details are not valid');
    }
}

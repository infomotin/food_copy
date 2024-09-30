<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\Websitemail;
class ClientController extends Controller
{
    public function index()
    {
        return view('client.index');
    }
    public function ClientRegister(){
        return view('client.register');
    }

    public function ClientLogin(){
        return view('client.login');
    }

    public function ClientLoginSubmit(Request $request){
        // dd($request->all());
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // gate all data into a field
        $check = $request->all();
        //transfer data into datavariable
        $data = [
            'email' => $check['email'],
            'password' => $check['password']
        ];
        if(Auth::guard('client')->attempt($data)) {
            // dd(Auth::guard('client')->attempt($data))
            $notification = array(
                'message' => 'Login Successful',
                'alert-type' => 'success'
            );
            // dd($notification);
            return redirect()->route('client.dashboard')->with($notification);


         }else{
             return redirect()->route('client.login')->with('error', 'Login details are not valid');
         }



        // $credentials = $request->only('email', 'password');
        // if (Auth::attempt($credentials)) {
        //     return redirect()->intended('/admin/dashboard');
        // }
        return redirect("client/login")->with('error', 'Login details are not valid');

    }
    public function ClientDashboard(){
        // dd(Auth::guard('client')->user());
        return view('client.index');
    }
}

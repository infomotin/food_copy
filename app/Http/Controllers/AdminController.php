<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\Websitemail;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function AdminDashboard()
    {
        return view('admin.dashboard');
        return response()->json(['data' => 'Admin Dashboard']);
    }


    public function AdminLoginSubmit(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
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

    public function AdminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success', 'Logout Successful');
    }
    public function ForgotPassword(){
        return view('admin.forgot-password');
    }
    public function ResetPassword(Request $request){
        // dd($request->all());
        $request->validate([
            'email' => 'required|email',
        ]);
        // gate all data into a field
        $check = $request->all();
        //transfer data into datavariable
        $data = [
            'email' => $check['email']
        ];
        $user = \App\Models\Admin::where('email', $data['email'])->first();

        // if($user){
        //     $token = $user->createToken('Password Reset Token')->plainTextToken;
        //     $user->notify(new \App\Notifications\ForgotPasswordNotification($token));

        //     return redirect()->back()->with('success', 'Password reset link has been sent to your email');

        // }else{
        //     return redirect()->back()->with('error', 'Email address does not exist');
        // }

        if(!$user){
            return redirect()->back()->with('error', 'Email address does not exist');
        }

        $token = hash('sha256', time());
        $user->token = $token;
        $user->update();
        $reset_link = url('admin/reset-password/'.$token.'/'.$request->email);
        $subject = 'Reset Password';
        $body = 'Reset Password Link: '.$reset_link;

        \Mail::to($request->email)->send(new Websitemail($subject, $body));


        // $mail = new Websitemail($subject, $body);
        // $mail->send();
        return redirect()->back()->with('success', 'Password reset link has been sent to your email');

    }
    // ResetPasswordForm
    public function ResetPasswordForm($token, $email){
        // gat User token data
        $user = \App\Models\Admin::where('token', $token)->where('email', $email)->first();
        if(!$user){
            return redirect()->route('admin.login')->with('error', 'Invalid token');
        }

        return view('admin.reset-password', compact('token', 'email'));
    }
}

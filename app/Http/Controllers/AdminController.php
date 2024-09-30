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
        return view('admin.index');
        // return response()->json(['data' => 'Admin Dashboard']);
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
        $body = 'Reset Password Link: ';
        $body .= "<a href='$reset_link'>Reset Password</a>";

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
        // dd($token, $email);
        return view('admin.reset-password', compact('token', 'email'));
    }

    public function ResetPasswordSubmit(Request $request){
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ]);
        $user = \App\Models\Admin::where('token', $request->token)->where('email', $request->email)->first();
        if(!$user){
            return redirect()->route('admin.login')->with('error', 'Invalid token');
        }
        $user->update([
            'password' => Hash::make($request->password),
            'token' => null
        ]);
        return redirect()->route('admin.login')->with('success', 'Password reset successful');
    }
    public function Profile(){
        // get admin data
        $user = Auth::guard('admin')->id();
        $userData = \App\Models\Admin::find($user);
        // dd($userData);
        return view('admin.admin_profile', compact('userData'));
    }
    // ProfileUpdate
    public function ProfileUpdate(Request $request){
        // dd($request->all());
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'address' => 'required|required',
        //     'username' => 'required',
        //     'phone' => 'required',
        //     'birth_date' => 'required|date'
        // ]);
        // dd($request->validate);
        // if($request->validate){
        //     return redirect()->back()->with('error', 'Not updated');
        // }else{
            // dd($request->all());
        $user = \App\Models\Admin::find(Auth::guard('admin')->id());
        $old_profile_photo_path = $user->profile_photo_path;
        // dd($user);
        // image file upload
        $profile_photo_path = [];
        if($request->hasFile('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('upload/admins/',$filename);
            $profile_photo_path = $filename;
            if($old_profile_photo_path && file_exists('upload/admins/'.$old_profile_photo_path) && $old_profile_photo_path !== $ext){
                $this->deleteOldImage($old_profile_photo_path);

            }
        }



        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'username' => $request->username,
            'phone' => $request->phone,
            'birth_date' => $request->birth_date,
            'profile_photo_path' => $profile_photo_path
        ]);

       $notification = array(
           'message' => 'Profile updated successfully',
           'alert-type' => 'success'
       );
       return redirect()->back()->with($notification);

    }
    public function PasswordChange(){

        $user = \App\Models\Admin::find(Auth::guard('admin')->id());
        return view('admin.admin_change_password', compact('user'));
    }

    public function PasswordChangeSubmit(Request $request){

        $admin = \App\Models\Admin::find(Auth::guard('admin')->user());

        // $request->validate([
        //     'password' => 'required',
        //     'new_password' => 'required|confirmed'
        // ]);

        // if(!Hash::check($request->password, $admin->password)){
        //     $notification = array(
        //         'message' => 'Old Password does not match',
        //         'alert-type' => 'error'
        //     );
        //     return redirect()->back()->with($notification);
        // }
        // if($request->password == $request->new_password){
        //     $notification = array(
        //         'message' => 'New Password cannot be same as old password',
        //         'alert-type' => 'error'
        //     );
        //     return redirect()->back()->with($notification);
        // }


        $user = \App\Models\Admin::find(Auth::guard('admin')->id());
        if(Hash::check($request->password, $user->password)){
            $user->password = Hash::make($request->new_password);
            $user->save();
            Auth::logout();
            $notification = array(
                'message' => 'Password Changed Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.login')->with($notification);
        }else{
            $notification = array(
                'message' => 'Old Password does not match',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }



    }

    public function deleteOldImage( string $old_profile_photo_path): void{
        $fullpath = public_path('upload/admins/'.$old_profile_photo_path);
        if($old_profile_photo_path && file_exists('upload/admins/'.$old_profile_photo_path)){
            unlink($fullpath);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\Websitemail;
use App\Models\City;
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
    public function ClientProfile(){
        // GET LOGIN USER DATA HERE
        $user = Auth::guard('client')->id();
        $userData = \App\Models\Client::find($user);
        // $cities = City::latest()->get();
        // dd($userData);
        return view('client.client_profile', compact('userData'));
    }

    public function ClientProfileUpdate(Request $request){
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
            $user = \App\Models\Client::find(Auth::guard('client')->id());
            $old_profile_photo_path = $user->profile_photo_path;
            // dd($user);
            // image file upload
            $profile_photo_path = [];
            if($request->hasFile('profile_photo_path')){
                $file = $request->file('profile_photo_path');
                $ext = $file->getClientOriginalExtension();
                $filename = time().'.'.$ext;
                $file->move('upload/clients/',$filename);
                $profile_photo_path = $filename;
                if($old_profile_photo_path && file_exists('upload/clients/'.$old_profile_photo_path) && $old_profile_photo_path !== $ext){
                    $this->deleteOldImage($old_profile_photo_path);

                }
            }

            $old_cover_photo = $user->cover_photo;
            $cover_photo =[];
            if($request->hasFile('cover_photo')){
                $file = $request->file('cover_photo');
                $ext = $file->getClientOriginalExtension();
                $filename = 'C-'.time().'.'.$ext;
                $file->move('upload/clients/',$filename);
                $cover_photo = $filename;
                if($old_cover_photo && file_exists('upload/clients/'.$old_cover_photo) && $old_cover_photo !== $ext){
                    $this->deleteOldImage($old_cover_photo);
                }
            }
            // dd($request->all());

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'username' => $request->username,
                'phone' => $request->phone,
                'birth_date' => $request->birth_date,
                'profile_photo_path' => $profile_photo_path,
                'cover_photo' => $cover_photo,
                'city_id' => $request->city_id,
                'shopinfo' => $request->shopinfo
            ]);

           $notification = array(
               'message' => 'Profile updated successfully',
               'alert-type' => 'success'
           );
           return redirect()->back()->with($notification);
    }
    public function ClientPasswordChange(){
        $user = \App\Models\Client::find(Auth::guard('client')->id());
        return view('client.client_change_password', compact('user'));

    }
    public function ClientPasswordChangeSubmit(Request $request){
        $admin = \App\Models\Client::find(Auth::guard('client')->user());

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


        $user = \App\Models\Client::find(Auth::guard('client')->id());
        if(Hash::check($request->password, $user->password)){
            $user->password = Hash::make($request->new_password);
            $user->save();
            Auth::logout();
            $notification = array(
                'message' => 'Password Changed Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('client.login')->with($notification);
        }else{
            $notification = array(
                'message' => 'Old Password does not match',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }


    }

    public function ClientForgotPassword(Request $request){

        return view('client.forgot-password');
    }

    public function ClientResetPassword(Request $request){
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
        $user = \App\Models\Client::where('email', $data['email'])->first();

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
        $reset_link = url('client/reset-password/'.$token.'/'.$request->email);
        $subject = 'Reset Password For Client';
        $body = 'Reset Password Link: ';
        $body .= "<a href='$reset_link'>Reset Password</a>";

        \Mail::to($request->email)->send(new Websitemail($subject, $body));


        // $mail = new Websitemail($subject, $body);
        // $mail->send();
        return redirect()->back()->with('success', 'Password reset link has been sent to your email');

    }

    public function ClientResetPasswordForm($token, $email){
         // gat User token data
         $user = \App\Models\Client::where('token', $token)->where('email', $email)->first();
         if(!$user){
             return redirect()->route('client.login')->with('error', 'Invalid token');
         }
         // dd($token, $email);
         return view('client.reset-password', compact('token', 'email'));
    }
    public function ClientResetPasswordSubmit(Request $request){
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ]);
        $user = \App\Models\Client::where('token', $request->token)->where('email', $request->email)->first();
        if(!$user){
            return redirect()->route('client.login')->with('error', 'Invalid token');
        }
        $user->update([
            'password' => Hash::make($request->password),
            'token' => null
        ]);
        return redirect()->route('client.login')->with('success', 'Password reset successful');
    }



    public function ClientLogout()
    {
        Auth::guard('client')->logout();
        return redirect()->route('client.login')->with('success', 'Logout Successful');
    }
    public function deleteOldImage( string $old_profile_photo_path): void{
        $fullpath = public_path('upload/clients/'.$old_profile_photo_path);
        if($old_profile_photo_path && file_exists('upload/clients/'.$old_profile_photo_path)){
            unlink($fullpath);
        }
    }
}

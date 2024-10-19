<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    //ProfileStore
    public function ProfileStore(Request $request)
    {
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
        $user = \App\Models\User::find(Auth::guard('web')->id());
        $old_profile_photo_path = $user->profile_photo_path;
        // dd($user);
        // image file upload
        $profile_photo_path = [];
        if ($request->hasFile('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('upload/users/', $filename);
            $profile_photo_path = $filename;
            if ($old_profile_photo_path && file_exists('upload/users/' . $old_profile_photo_path) && $old_profile_photo_path !== $ext) {
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

    //UserLogout
    public function UserLogout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $notification = array(
            'message' => 'Logout successfully',
            'alert-type' => 'success'
        );
        return redirect('/')->with($notification);
        // return redirect('/');
    }
    public function PasswordChange(Request $request){
        // dd($request->all());
        // $request->validate([
        //     'old_password' => 'required',
        //     'password' => 'required|confirmed'
        // ]);

        $user = \App\Models\User::find(Auth::guard('web')->id());
        // dd($user);
        if(Hash::check($request->old_password, $user->password)){
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            $notification = array(
                'message' => 'Password Changed Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('login')->with($notification);
        }else{
            $notification = array(
                'message' => 'Old Password does not match',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

    }
    //UserFavourites
    

    public function deleteOldImage(string $old_profile_photo_path): void
    {
        $fullpath = public_path('upload/clients/' . $old_profile_photo_path);
        if ($old_profile_photo_path && file_exists('upload/clients/' . $old_profile_photo_path)) {
            unlink($fullpath);
        }
    }
}

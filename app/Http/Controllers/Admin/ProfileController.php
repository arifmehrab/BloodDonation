<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Image;

class ProfileController extends Controller
{
    // Admin Profile Edit ============
    public function editProfile()
    {
        return view('Backend.Admin.profile.profile_edit');
    }
    // Admin profile update ===========
    public function updateProfile(Request $request)
    {
        // validation
        $request->validate([
            'name'         => 'required',
            'email'        => 'required',
            'phone_number' => 'required',
            'profile'      => 'required|image|mimes:jpg,png,jpeg,gif|max:3072',
        ]);
        // Update
        $adminUpdate               = User::find(Auth::id());
        $adminUpdate->name         = $request->name;
        $adminUpdate->email        = $request->email;
        $adminUpdate->phone_number = $request->phone_number;
        // profile
        if ($request->hasFile('profile')) {
            @unlink(public_path('Frontend/assets/media/avator/' . Auth::user()->profile));
            $profile_name = hexdec(uniqid()) . '.' . $request->profile->getClientOriginalExtension();
            Image::make($request->profile)->resize(280, 175)->save('Frontend/assets/media/avator/' . $profile_name);
            $adminUpdate->profile = $profile_name;
        }
        $adminUpdate->about = $request->about;
        $adminUpdate->save();
        // Notification
        $notification = array(
            'message'    => 'Information Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    // Admin Password Change ===========
    public function PasswordChange()
    {
        return view('Backend.Admin.profile.password_change');
    }
    // Admin Password Update ===========
    public function PasswordUpdate(Request $request)
    {
        // validation
        $validation = $request->validate([
            'current_password' => 'required',
            'password'         => 'required',
        ]);
        // Password check
        if (Auth::attempt(['id' => Auth::user()->id, 'password' => $request->current_password])) {
            // Validation
            $validation = $request->validate([
                'password' => 'required|confirmed',
            ]);
            // Password Update
            $changePass           = User::find(Auth::user()->id);
            $changePass->password = Hash::make($request->password);
            $changePass->save();
            // Notification
            $notification = array(
                'message'    => 'Password Updated successfuly',
                'alert-type' => 'success',
            );
            Auth::logout();
            // Redirect
            return redirect()->route('login')->with($notification);
        } else {
            // Notification
            $notification = array(
                'message'    => 'Your Current Password Not Match Please Try Again',
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }
    }
   
}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\divition;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    // User Edit Info ===========
    public function editInfo()
    {
        $divition = divition::all();
        return view('Backend.User.profile.edit_info', compact('divition'));
    }
    // user Update Info ===========
    public function updateInfo(Request $request)
    {
        $request->validate([
            'name'         => ['required', 'string', 'max:255'],
            'email'        => ['required', 'string', 'email', 'max:255'],
            'blood_group'  => 'required',
            'phone_number' => 'required',
            'divition'     => 'required',
            'district'     => 'required',
            'upazila'      => 'required',
            'local_area'   => 'required',
        ]);
        $userUpdate               = User::find(Auth::id());
        $userUpdate->name         = $request->name;
        $userUpdate->email        = $request->email;
        $userUpdate->blood_group  = $request->blood_group;
        $userUpdate->phone_number = $request->phone_number;
        $userUpdate->divition_id  = $request->divition;
        $userUpdate->district_id  = $request->district;
        $userUpdate->upazila      = $request->upazila;
        $userUpdate->local_area   = $request->local_area;
        $userUpdate->association  = $request->association;
        $userUpdate->save();
        // Notification
        $notification = array(
            'message'    => 'Information Update Successfully',
            'alert-type' => 'success',
        );
        // Redirect
        return redirect()->back()->with($notification);

    }
    // User Profile Edit =============
    public function editProfile()
    {
        return view('Backend.User.profile.edit_profile');
    }
    // User Profile Update ============
    public function updateProfile(Request $request)
    {
        // validation
        $request->validate([
            'profile' => 'required|image|mimes:jpg,png,jpeg,gif|max:3072',
        ]);
        // Update Profile
        if ($request->hasFile('profile')) {
            @unlink(public_path('Frontend/assets/media/avator/' . Auth::user()->profile));
            $profile_name = hexdec(uniqid()) . '.' . $request->profile->getClientOriginalExtension();
            Image::make($request->profile)->resize(280, 175)->save('Frontend/assets/media/avator/' . $profile_name);
            $user_profile          = User::find(Auth::id());
            $user_profile->profile = $profile_name;
            $user_profile->save();
            // Notification
            $notification = array(
                'message'    => 'Profile Update Successfully',
                'alert-type' => 'success',
            );
            // Redirect
            return redirect()->route('user.dashboard')->with($notification);
        }
    }
    // User Password Change =============
    public function PasswordChange()
    {
        return view('Backend.User.profile.password_change');
    }
    // User Password Update ============
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

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\bloodrequest;
use App\Models\bloodsummary;
use App\Models\district;
use App\Models\divition;
use App\Models\homesettingone;
use App\Models\home_title_setting;
use App\Models\homecountdown;
use App\Models\ourteam;
use App\Models\photogallery;
use App\Models\subscriber;
use App\Models\upazila;
use App\User;
use Illuminate\Http\Request;
use Session;

class FrontendController extends Controller
{
    // Front Page
    public function index()
    {
        $divitions = divition::all();
        $users     = User::orderBy('id', 'DESC')->paginate(4);
        // Home settings
        $homeSettingOne   = homesettingone::first();
        $homeTitleSetting = home_title_setting::first();
        $photo_gallery    = photogallery::select('photo_gallery')->orderBy('id', 'DESC')->get();
        $home_counts = homecountdown::all();
        return view('Frontend.index', compact('divitions', 'users', 'homeSettingOne', 'homeTitleSetting', 'photo_gallery', 'home_counts'));
    }
    // About Us ======================
    public function aboutUs()
    {
        $ourteam = ourteam::all();
        $about_content = bloodsummary::select('about_content')->first();
        return view('Frontend.pages.about_us', compact('ourteam', 'about_content'));
    }
    // Blood Summary Page ==============
    public function bloodSummary()
    {
        $blood_summary = bloodsummary::first();
        return view('Frontend.pages.blood_summary', compact('blood_summary'));
    }
    // Show Destrict By ajax in Resister Form ============
    public function showDestrict(Request $request)
    {
        $divitionId = $request->divition_id;
        $district   = district::where('divition_id', $divitionId)->get();
        return response()->json($district);
    }
    // show Upazila By Ajax In Register Form =============
    public function showUpazila(Request $request)
    {
        $district_id = $request->district_id;
        $upazila = upazila::where('district_id', $district_id)->get();
        return response()->json($upazila);
    }
    // Subscriber Store =================
    public function subscriber(Request $request)
    {
        $subscriber        = new subscriber();
        $subscriber->email = $request->email;
        $subscriber->save();
        // Notification
        $notification = array(
            'message'    => 'Subscribe Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    // Blood Request =================
    public function bloodRequestStore(Request $request)
    {
        // validate
        $request->validate([
            'name'         => 'required',
            'blood_group'  => 'required',
            'phone_number' => 'required',
            'address'      => 'required',
            'date'         => 'required',
            'time'         => 'required',
        ]);
        // Insert Date
        $request_blood               = new bloodrequest();
        $request_blood->name         = $request->name;
        $request_blood->blood_group  = $request->blood_group;
        $request_blood->phone_number = $request->phone_number;
        $request_blood->address      = $request->address;
        $request_blood->date         = $request->date;
        $request_blood->time         = $request->time;
        $request_blood->message      = $request->message;
        $request_blood->status       = '0';
        $request_blood->save();
        // Notification
        $notification = array(
            'message'    => 'Request Submit Successfully! We contact soon',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    // Bangla Language ==================
    public function banglaLanguage()
    {
        Session::get('language');
        Session::forget('language');
        Session::put('language', 'bangla');
        return redirect()->back();
    }
    // English Language ===================
    public function englishLanguage()
    {
        Session::get('language');
        Session::forget('language');
        Session::put('language', 'english');
        return redirect()->back();
    }
}

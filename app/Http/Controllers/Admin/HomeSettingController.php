<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\homecountdown;
use App\Models\homesettingone;
use App\Models\home_title_setting;
use App\Models\subscriber;
use Illuminate\Http\Request;

class HomeSettingController extends Controller
{
    // Home Setting One ================
    public function homeSettingOne()
    {
        $home_setting_one = homesettingone::first();
        return view('Backend.Admin.settings.home_setting_one', compact('home_setting_one'));
    }
    // Home Setting One Update ==========
    public function homeOneSettingUpdate(Request $request, $id)
    {
        $homeSettingOne                         = homesettingone::find($id);
        $homeSettingOne->header_top_title_en    = $request->header_top_title_en;
        $homeSettingOne->header_top_title_bn    = $request->header_top_title_bn;
        $homeSettingOne->banner_title_en        = $request->banner_title_en;
        $homeSettingOne->banner_title_bn        = $request->banner_title_bn;
        $homeSettingOne->donar_regi_title_en    = $request->donar_regi_title_en;
        $homeSettingOne->donar_regi_title_bn    = $request->donar_regi_title_bn;
        $homeSettingOne->donar_regi_subtitle_en = $request->donar_regi_subtitle_en;
        $homeSettingOne->donar_regi_subtitle_bn = $request->donar_regi_subtitle_bn;
        $homeSettingOne->donar_regi_button_en   = $request->donar_regi_button_en;
        $homeSettingOne->donar_regi_button_bn   = $request->donar_regi_button_bn;
        $homeSettingOne->save();
        // Notification
        $notification = array(
            'message'    => 'Home Setting Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    // Home Title Setting  ==============
    public function homeSettingTitle()
    {
        $title_settings = home_title_setting::first();
        return view('Backend.Admin.settings.home_section_title', compact('title_settings'));
    }
    // Home Title Setting Update ==============
    public function homeSettingTitleUpdate(Request $request, $id)
    {
        $Home_title_setting_update                        = home_title_setting::find($id);
        $Home_title_setting_update->donation_button_en    = $request->donation_button_en;
        $Home_title_setting_update->donation_button_bn    = $request->donation_button_bn;
        $Home_title_setting_update->donar_title_en        = $request->donar_title_en;
        $Home_title_setting_update->donar_title_bn        = $request->donar_title_bn;
        $Home_title_setting_update->blood_appoirment_en   = $request->blood_appoirment_en;
        $Home_title_setting_update->blood_appoirment_bn   = $request->blood_appoirment_bn;
        $Home_title_setting_update->appoirment_button_en  = $request->appoirment_button_en;
        $Home_title_setting_update->appoirment_button_bn  = $request->appoirment_button_bn;
        $Home_title_setting_update->gallery_title_en      = $request->gallery_title_en;
        $Home_title_setting_update->gallery_title_bn      = $request->gallery_title_bn;
        $Home_title_setting_update->gallery_subtitle_en   = $request->gallery_subtitle_en;
        $Home_title_setting_update->gallery_subtitle_bn   = $request->gallery_subtitle_bn;
        $Home_title_setting_update->blog_title_en         = $request->blog_title_en;
        $Home_title_setting_update->blog_title_bn         = $request->blog_title_bn;
        $Home_title_setting_update->blog_subtitle_en      = $request->blog_subtitle_en;
        $Home_title_setting_update->blog_subtitle_bn      = $request->blog_subtitle_bn;
        $Home_title_setting_update->newsletter_summery_en = $request->newsletter_summery_en;
        $Home_title_setting_update->newsletter_summery_bn = $request->newsletter_summery_bn;
        $Home_title_setting_update->about_text_en         = $request->about_text_en;
        $Home_title_setting_update->about_text_bn         = $request->about_text_bn;
        $Home_title_setting_update->save();
        // Notification
        $notification = array(
            'message'    => 'Home Title Setting Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    // Admin Subscriber ===============
    public function subscriber()
    {
        $subscribers = subscriber::select('id', 'email')->get();
        return view('Backend.Admin.subscriber.subscriber_index', compact('subscribers'));
    }
    // Admin Subscriber Delete =============
    public function newsLetterDelete($id)
    {
        $subDelete = subscriber::find($id);
        $subDelete->delete();
        // Notification
        $notification = array(
            'message'    => 'Subscriber Deleted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    // Admin Countdown setting ================
    public function countDownSetting()
    {
        $countDowns = homecountdown::all();
        return view('Backend.Admin.settings.home_countdown', compact('countDowns'));
    }
    // Admin countdown store ==================
    public function countDownStore(Request $request)
    {
        $home_countdown                  = new homecountdown();
        $home_countdown->icon            = $request->icon;
        $home_countdown->count_number_en = $request->count_number_en;
        $home_countdown->count_number_bn = $request->count_number_bn;
        $home_countdown->title_english   = $request->title_english;
        $home_countdown->title_bangla    = $request->title_bangla;
        $home_countdown->save();
        // Notification
        $notification = array(
            'message'    => 'CountDown Added Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    // Admin Countdown Delete ===============
    public function countDownDelete($id)
    {
        $countDown_delete = homecountdown::find($id);
        $countDown_delete->delete();
         // Notification
         $notification = array(
            'message'    => 'CountDown Deleted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}

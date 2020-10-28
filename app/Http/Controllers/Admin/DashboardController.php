<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Models\post;
use DB;
class DashboardController extends Controller
{
    // Admin Dashboard ==================
    public function index()
    {
        // Dashboard Daynamic =========

        // users
        $data['total_users'] = User::all()->count();
        $data['today_user']  = User::whereDate('created_at', today())->get()->count();
        $data['this_month_user'] = User::whereMonth('created_at', '=', date('m'))->get()->count();
        $data['this_year_user'] = User::whereYear('created_at', '=', date('Y'))->get()->count();

        // blood Donar Count
        $data['blood_o_p'] = User::where('blood_group', 'O+')->count();
        $data['blood_o_N'] = User::where('blood_group', 'O-')->count();
        $data['blood_A_p'] = User::where('blood_group', 'A+')->count();
        $data['blood_A_N'] = User::where('blood_group', 'A-')->count();
        $data['blood_B_p'] = User::where('blood_group', 'B+')->count();
        $data['blood_B_N'] = User::where('blood_group', 'B-')->count();
        $data['blood_AB_p'] = User::where('blood_group', 'AB+')->count();
        $data['blood_AB_N'] = User::where('blood_group', 'AB-')->count();
        
        // Devition Wais User List.. 
        $data['dhakadivition'] = DB::table('users')
                ->join('divitions', 'users.divition_id', 'divitions.id')
                ->select('users.*', 'divitions.divition_name')
                ->where('divition_name', 'Dhaka')->count();
        $data['chittagongdivition'] = DB::table('users')
                ->join('divitions', 'users.divition_id', 'divitions.id')
                ->select('users.*', 'divitions.divition_name')
                ->where('divition_name', 'Chittagong')->count();
        $data['Rajshahidivition'] = DB::table('users')
                ->join('divitions', 'users.divition_id', 'divitions.id')
                ->select('users.*', 'divitions.divition_name')
                ->where('divition_name', 'Rajshahi')->count();
        $data['Sylhetdivition'] = DB::table('users')
                ->join('divitions', 'users.divition_id', 'divitions.id')
                ->select('users.*', 'divitions.divition_name')
                ->where('divition_name', 'Sylhet')->count();
        $data['Rangpurdivition'] = DB::table('users')
                ->join('divitions', 'users.divition_id', 'divitions.id')
                ->select('users.*', 'divitions.divition_name')
                ->where('divition_name', 'Rangpur')->count();
        $data['Khulnadivition'] = DB::table('users')
                ->join('divitions', 'users.divition_id', 'divitions.id')
                ->select('users.*', 'divitions.divition_name')
                ->where('divition_name', 'Khulna')->count();
        $data['Barisaldivition'] = DB::table('users')
                ->join('divitions', 'users.divition_id', 'divitions.id')
                ->select('users.*', 'divitions.divition_name')
                ->where('divition_name', 'Barisal')->count();
        $data['MymensinghDi'] = DB::table('users')
                ->join('divitions', 'users.divition_id', 'divitions.id')
                ->select('users.*', 'divitions.divition_name')
                ->where('divition_name', 'Mymensingh')->count();
        //  post
        $data['total_post'] = post::where('status', 1)->get()->count();
        $data['today_post'] = post::whereDate('created_at', today())->get()->count();
        $data['today_total_view'] = post::where('status', 1)->get()->sum('view_count');
        return view('Backend.Admin.dashboard', $data);
    }
    // Admin Logout ======================
    public function logout()
    {
        Auth::logout();
        // Notification
        $notification = array(
            'message'    => 'Logout Successfully',
            'alert-type' => 'success',
        );
        // Redirect
        return redirect('/login')->with($notification);

    }
}

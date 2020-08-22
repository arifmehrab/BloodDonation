<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class DashboardController extends Controller
{
    // Admin Dashboard ==================
    public function index()
    {
        return view('Backend.Admin.dashboard');
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

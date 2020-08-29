<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class DashboardController extends Controller
{
    // User Dashboard =================
    public function index() {
        return view('Backend.user.dashboard');
    }
     // User Logout ======================
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

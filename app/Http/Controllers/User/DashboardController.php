<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // User Dashboard =================
    public function index() {
        return view('Backend.User.dashboard');
    }
}

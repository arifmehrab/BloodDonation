<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Admin Dashboard ==================
    public function index()
    {
        return view('Backend.Admin.dashboard');
    }
}

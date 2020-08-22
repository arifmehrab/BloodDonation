<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\district;
use App\Models\divition;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    // Front Page
    public function index()
    {
        $divitions = divition::all();
        return view('Frontend.index', compact('divitions'));
    }
    // Show Destrict By ajax in Resister Form ============
    public function showDestrict(Request $request)
    {
       $divitionId = $request->divition_id;
       $district = district::where('divition_id', $divitionId)->get();
       return response()->json($district);
    }
}

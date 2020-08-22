<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\district;
class SearchController extends Controller
{
    // Search Destrict Show By ajax ===============
    public function searchDestrictShow(Request $request)
    {
        $divitionId = $request->divition_id;
        $district = district::where('divition_id', $divitionId)->get();
        return response()->json($district);
    }
    // Search Resuit ====================
    public function searchResuit()
    {
        return view('Frontend.pages.search_resuit');
    }
}

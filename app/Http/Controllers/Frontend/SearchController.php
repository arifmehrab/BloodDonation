<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\district;
use App\Models\divition;
use App\User;
use DB;
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
    public function searchResuit(Request $request)
    {
        // divition
        $divition_id = $request->divition;
        $divition = divition::where('id', $divition_id)->first();
        $divitionName = $divition->divition_name;
        // district
        $district_id = $request->district;
        $district = district::where('id', $district_id)->first();
        $district_name = $district->district_name;
        // upazila
        $upazila = $request->upazila;
        // local area
        $local_area = $request->local_area;
        // blood
        $blood_group = $request->blood_group;
        // search===========
        $search_resuit = DB::table('users')
                         ->join('divitions', 'users.divition_id', 'divitions.id')
                         ->join('districts', 'users.district_id', 'districts.id')
                         ->select('users.*', 'divitions.divition_name', 'districts.district_name')
                         ->where('blood_group', 'LIKE', '%'.$blood_group.'%')
                         ->where('divition_name', 'LIKE', '%'.$divitionName.'%')
                         ->where('district_name', 'LIKE', '%'.$district_name.'%')
                         ->where('upazila', 'LIKE', '%'.$upazila.'%')
                         ->where('local_area', 'LIKE', '%'.$local_area.'%')
                         ->where('status', 1)
                         ->orderBy('id', 'ASC')
                         ->paginate(20);
                         //return $search_resuit;
        return view('Frontend.pages.search_resuit', compact('search_resuit'));
    }

}

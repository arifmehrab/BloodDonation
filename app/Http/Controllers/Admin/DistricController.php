<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\district;
use App\Models\divition;
use Illuminate\Http\Request;

class DistricController extends Controller
{
    // District Index ==============
    public function index()
    {
        $divitions = divition::select('id', 'divition_name')->get();
        $districts = district::all();
        return view('Backend.Admin.District.district_index', compact('divitions', 'districts'));
    }
    // District Store ==============
    public function store(Request $request)
    {
        $request->validate([
            'divition_id'   => 'required',
            'district_name' => 'required|unique:districts,district_name',
        ]);
        $districtStore                = new district();
        $districtStore->divition_id   = $request->divition_id;
        $districtStore->district_name = $request->district_name;
        $districtStore->save();
        // Notification
        $notification = array(
            'message'    => 'District Added Successfully',
            'alert-type' => 'success',
        );
        // Redirect
        return redirect()->route('admin.district')->with($notification);
    }
    // District Edit =================
    public function edit($id){
       $divitions = divition::select('id', 'divition_name')->get();
       $districtEdit = district::find($id);
       return view('Backend.Admin.District.district_edit', compact('divitions', 'districtEdit'));
    }
    // District Update ================
    public function update(Request $request, $id){
        $districtUpdate                = district::find($id);
        $districtUpdate->divition_id   = $request->divition_id;
        $districtUpdate->district_name = $request->district_name;
        $districtUpdate->save();
        // Notification
        $notification = array(
            'message'    => 'District Updated Successfully',
            'alert-type' => 'success',
        );
        // Redirect
        return redirect()->route('admin.district')->with($notification);
    }
    // District Destory ================
    public function destory($id)
    {
        $DistrictDestory = district::find($id);
        $DistrictDestory->delete();
        // Notification
        $notification = array(
            'message'    => 'District Deleted Successfully',
            'alert-type' => 'success',
        );
        // Redirect
        return redirect()->route('admin.district')->with($notification);
    }
}

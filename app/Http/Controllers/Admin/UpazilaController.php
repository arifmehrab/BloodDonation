<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\upazila;
use App\Models\divition;
use Illuminate\Http\Request;

class UpazilaController extends Controller
{ 
    // Upazila Index ===========
    public function index()
    {
        $divitions = divition::all();
        $upazilas = upazila::all();
        return view('Backend.Admin.upazila.index', compact('divitions', 'upazilas'));
    }
    // Upazila store ============
    public function store(Request $request)
    {
        // Validation
        $request->validate([
           'divition_id'  => 'required',
           'district' => 'required',
           'upazila' => 'required'
        ]);
        // Upazila store
        $upazilaStore = new upazila();
        $upazilaStore->divition_id = $request->divition_id;
        $upazilaStore->district_id = $request->district;
        $upazilaStore->upazila = $request->upazila;
        $upazilaStore->save();
         // Notification
         $notification = array(
            'message'    => 'Upazila Upload Sucessfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.upazila')->with($notification);
    }
    // Upazila Edit ==============
    public function edit($id)
    {
        $divitions = divition::all();
        $upazila_edit = upazila::find($id);
        return view('Backend.Admin.upazila.upazila_edit', compact('upazila_edit', 'divitions'));
    }
    // Upazila Update ==============
    public function update(Request $request, $id)
    {
        $upazilaUpdate = upazila::find($id);
        $upazilaUpdate->divition_id = $request->divition_id;
        $upazilaUpdate->district_id = $request->district;
        $upazilaUpdate->upazila = $request->upazila;
        $upazilaUpdate->save();
         // Notification
         $notification = array(
            'message'    => 'Upazila Updated Sucessfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.upazila')->with($notification);
    }
    // Upazila Destory ==============
    public function destory($id)
    {
        $upazila_delete = upazila::find($id);
        $upazila_delete->delete();
        // Notification
        $notification = array(
            'message'    => 'Upazila Deleted Sucessfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.upazila')->with($notification);
    }
}

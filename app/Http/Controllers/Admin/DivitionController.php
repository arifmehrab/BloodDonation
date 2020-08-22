<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\divition;
use Illuminate\Http\Request;

class DivitionController extends Controller
{
    // Divition Index ==============
    public function index()
    {
        $divitions = divition::select('id','divition_name')->get();
        return view('Backend.Admin.Divition.divition_index', compact('divitions'));
    }
    // Divition Store ==============
    public function store(Request $request)
    {
       $divition = new divition();
       $divition->divition_name = $request->divition_name;
       $divition->save();
       // Notification 
       $notification = array(
        'message'    => 'Divition Added Successfully',
        'alert-type' => 'success',
        );
        // Redirect
        return redirect()->route('admin.divition')->with($notification);
    }
    // Divition Destory ================
    public function destory($id)
    {
        $DiviDestory = divition::find($id);
        $DiviDestory->delete();
        // Notification 
       $notification = array(
        'message'    => 'Divition Deleted Successfully',
        'alert-type' => 'info',
        );
        // Redirect
        return redirect()->route('admin.divition')->with($notification);
    }
}

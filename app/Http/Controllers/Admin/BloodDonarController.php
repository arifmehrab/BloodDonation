<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\bloodrequest;
use Illuminate\Http\Request;
use App\User;
class BloodDonarController extends Controller
{
     // Total blood Donar List =================
     public function bloodDonarList() 
     {
         $bloodDonar = User::all();
         return view('Backend.Admin.bloodDonar.blood_donar_list', compact('bloodDonar'));
     }
     // Pending Blood Request =============
     public function pendingBloodRequest()
     {
         $pending_bloods = bloodrequest::where('status', 0)->get();
        return view('Backend.Admin.bloodRequest.pending_blood', compact('pending_bloods'));
     }
     // Approved Blood =================
     public function approvedBlood($id)
     {
        $approved_blood = bloodrequest::find($id);
        $approved_blood->status = '1';
        $approved_blood->save();
         // Notification
         $notification = array(
            'message'    => 'Blood Request Successfully Done',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.pending.blood.request')->with($notification);
     }   
    // Complete Blood Request ================
    public function completeBloodRequest()
    {
        $complete_bloods = bloodrequest::where('status', 1)->get();
        return view('Backend.Admin.bloodRequest.complete_blood', compact('complete_bloods'));
    }
    // Complete Blood Delete =============
    public function completeBloodDelete($id)
    {
        $delete_blood_request = bloodrequest::find($id);
        $delete_blood_request->delete();
         // Notification
         $notification = array(
            'message'    => 'Complete Blood Request Delete Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.complete.blood.request')->with($notification);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\bloodsummary;
use Illuminate\Http\Request;

class BloodSummaryController extends Controller
{
    // Blood Summary ==============
    public function index()
    {
        $blood_summary = bloodsummary::first();
        return view('Backend.Admin.bloodsummary.index', compact('blood_summary'));
    }
    // Blood Summary Update ============
    public function update(Request $request, $id)
    {
        $summaryUpdate = bloodsummary::find($id);
        $summaryUpdate->about_content = $request->about_content;
        $summaryUpdate->summery_rules = $request->summery_rules;
        $summaryUpdate->summery_section_one = $request->summery_section_one;
        $summaryUpdate->summery_section_two = $request->summery_section_two;
        $summaryUpdate->summery_section_three = $request->summery_section_three;
        $summaryUpdate->summery_section_four = $request->summery_section_four;
        $summaryUpdate->save();
         // Notification
         $notification = array(
            'message'    => 'Summary Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}

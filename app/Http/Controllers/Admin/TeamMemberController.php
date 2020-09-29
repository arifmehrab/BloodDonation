<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ourteam;
use Illuminate\Http\Request;
use Image;

class TeamMemberController extends Controller
{
    // Our Team member ==============
    public function index()
    {
        $ourTeams = ourteam::where('status', 1)->get();
        return view('Backend.Admin.teammember.index', compact('ourTeams'));
    }
    public function store(Request $request)
    {
        // validation
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif|max:3072',
            'name'  => 'required',
            'title' => 'required',
        ]);
        $teamMember = new ourteam();
        // Team image
        if ($request->hasFile('image')) {
            $team_image = hexdec(uniqid()) . '.' . $request->image->getClientOriginalExtension();
            Image::make($request->image)->resize(350, 310)->save('Backend/assets/media/ourteam/' . $team_image);
            $teamMember->image = $team_image;
        }
        $teamMember->name          = $request->name;
        $teamMember->sub_title     = $request->title;
        $teamMember->facebook_url  = $request->facebook_url;
        $teamMember->mobile_number = $request->mobile_number;
        $teamMember->save();
        // Notification
        $notification = array(
            'message'    => 'Member Added Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.team.member')->with($notification);
    }
     // Our Team Edit ============
     public function edit($id)
     {
         $teamEdit = ourteam::find($id);
        return view('Backend.Admin.teammember.team_edit', compact('teamEdit'));
     }
    // Our Team Update ============
    public function update(Request $request, $id)
    {
       $teamUpdate = ourteam::find($id);
       // Team image
       if ($request->hasFile('image')) {
        @unlink(public_path('Backend/assets/media/ourteam/'. $teamUpdate->image));  
        $team_image = hexdec(uniqid()) . '.' . $request->image->getClientOriginalExtension();
        Image::make($request->image)->resize(360, 230)->save('Backend/assets/media/ourteam/' . $team_image);
        $teamUpdate->image = $team_image;
      }
      $teamUpdate->name          = $request->name;
      $teamUpdate->sub_title     = $request->title;
      $teamUpdate->facebook_url  = $request->facebook_url;
      $teamUpdate->mobile_number = $request->mobile_number;
      $teamUpdate->save();
      // Notification
      $notification = array(
          'message'    => 'Member Updated Successfully',
          'alert-type' => 'success',
      );
      return redirect()->route('admin.team.member')->with($notification); 
    }

    // Our Team Destory ============
    public function destory($id)
    {
        $teamDelete = ourteam::find($id);
         // Team image
         if ($teamDelete->image) {
             @unlink(public_path('Backend/assets/media/ourteam/'. $teamDelete->image));  
        }
        $teamDelete->delete();
        // Notification
        $notification = array(
            'message'    => 'Member Deleted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.team.member')->with($notification);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\association;
use Illuminate\Http\Request;

class AssociationController extends Controller
{
    // District Index ==============
    public function index()
    {
        $associations = association::all();
        return view('Backend.Admin.Association.association_index', compact('associations'));
    }
    // District Store ==============
    public function store(Request $request)
    {
        $request->validate([
            'association_name' => 'required',
        ]);
        $associationStore                    = new association();
        $associationStore->associations_name = $request->association_name;
        $associationStore->save();
        // Notification
        $notification = array(
            'message'    => 'Association Added Successfully',
            'alert-type' => 'success',
        );
        // Redirect
        return redirect()->route('admin.association')->with($notification);
    }
    // District Edit =================
    public function edit($id)
    {
        $associationEdit = association::find($id);
        return view('Backend.Admin.Association.association_edit', compact('associationEdit'));
    }
    // District Update ================
    public function update(Request $request, $id)
    {
        $associationUpdate                    = association::find($id);
        $associationUpdate->associations_name = $request->association_name;
        $associationUpdate->save();
        // Notification
        $notification = array(
            'message'    => 'Association Updated Successfully',
            'alert-type' => 'success',
        );
        // Redirect
        return redirect()->route('admin.association')->with($notification);
    }
    // District Destory ================
    public function destory($id)
    {
        $associationDestory = association::find($id);
        $associationDestory->delete();
        // Notification
        $notification = array(
            'message'    => 'Association Deleted Successfully',
            'alert-type' => 'success',
        );
        // Redirect
        return redirect()->route('admin.association')->with($notification);
    }
}

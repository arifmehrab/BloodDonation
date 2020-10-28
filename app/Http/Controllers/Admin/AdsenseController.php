<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\adsense;
use Illuminate\Http\Request;

class AdsenseController extends Controller
{
    // Adsense page content ========
    public function adsensePages()
    {
        $adsenseContent = adsense::first();
        return view('Backend.Admin.settings.adsense_page', compact('adsenseContent'));
    }
    // Adsense Page Update ===========
    public function adsensePagesUpdate(Request $request, $id)
    {
       $adsense_page_update = adsense::find($id);
       $adsense_page_update->terms_of_service = $request->terms_of_service;
       $adsense_page_update->privacy_policy = $request->privacy_policy;
       $adsense_page_update->copywright_disclaimar = $request->copywright_disclaimar;
       $adsense_page_update->save();
        // Notification
        $notification = array(
        'message'    => 'Adsense Page Updated Successfully',
        'alert-type' => 'success',
        );
       return redirect()->back()->with($notification);
    }
}

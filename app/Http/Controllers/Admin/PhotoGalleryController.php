<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\photogallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
class PhotoGalleryController extends Controller
{
    // Photo Gallery ==============
    public function photoGallery()
    {
        $photo_gallery = photogallery::all();
        return view('Backend.Admin.photogallery.photo_gallery_index', compact('photo_gallery'));
    }
    public function photoGalleryStore(Request $request)
    {
        // user
        $user = Auth::id();
        // validation
        $request->validate([
            'gallery_image' => 'required|image|mimes:jpg,png,jpeg,gif|max:3072'
        ]);
        $admin_gallery_image = new photogallery();
        // gallery image
        if($request->hasFile('gallery_image')) {
            $photo_gallery = hexdec(uniqid()) . '.' . $request->gallery_image->getClientOriginalExtension();
            Image::make($request->gallery_image)->resize(550, 407)->save('Backend/assets/media/photoGallery/' . $photo_gallery);
            $admin_gallery_image->photo_gallery = $photo_gallery;
            $admin_gallery_image->user_id = $user;
            $admin_gallery_image->save();
        }
         // Notification
         $notification = array(
            'message'    => 'Gallery Image Added Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.photo.gallery')->with($notification);
    }
    // Photo Gallery Delete ============
    public function photoGalleryDelete($id)
    {
        $photo_gallery_delete = photogallery::find($id);
        @unlink(public_path('Backend/assets/media/photoGallery/'. $photo_gallery_delete->photo_gallery));
        $photo_gallery_delete->delete();
         // Notification
         $notification = array(
            'message'    => 'Gallery Image Deleted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.photo.gallery')->with($notification);
    }
}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\photogallery;
use Auth;
use Image;
class PhotoGalleryController extends Controller
{
     
    // Photo Gallery ==============
    public function photoGallery()
    {
        $user = Auth::id();
        $photo_gallery = photogallery::where('user_id', $user)->get();
        return view('Backend.User.photogallery.photo_gallery_index', compact('photo_gallery'));
    }
    // Photo Gallery Create ========
    public function photoGalleryCreate()
    {
        return view('Backend.User.photogallery.photo_gallery_create');
    }
    public function photoGalleryStore(Request $request)
    {
        // user
        $user = Auth::id();
        // validation
        $request->validate([
            'gallery_image' => 'required|image|mimes:jpg,png,jpeg,gif|max:3072'
        ]);
        $user_gallery_image = new photogallery();
        // gallery image
        if($request->hasFile('gallery_image')) {
            $photo_gallery = hexdec(uniqid()) . '.' . $request->gallery_image->getClientOriginalExtension();
            Image::make($request->gallery_image)->resize(550, 407)->save('Backend/assets/media/photoGallery/' . $photo_gallery);
            $user_gallery_image->photo_gallery = $photo_gallery;
            $user_gallery_image->user_id = $user;
            $user_gallery_image->save();
        }
         // Notification
         $notification = array(
            'message'    => 'Gallery Image Upload Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('user.photo.gallery')->with($notification);
    }
    // Photo Gallery Delete ============
    public function photoGalleryDelete($id)
    {
        $photo_gallery_delete = photogallery::find($id);
        @unlink(public_path('Backend/assets/media/photoGallery/'. $photo_gallery_delete->photo_gallery));
        $photo_gallery_delete->delete();
         // Notification
         $notification = array(
            'message'    => 'Photo Deleted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('user.photo.gallery')->with($notification);
    }
}

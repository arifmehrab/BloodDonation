<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\post;
use Auth;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // index
        $posts = post::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('Backend.Admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Post Create
        $categories = category::all();
        return view('Backend.Admin.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Slug Method
        function CleanURL($string, $delimiter = '-') {
            // Remove special characters
            $string = preg_replace("/[~`{}.'\"\!\@\#\$\%\^\&\*\(\)\_\=\+\/\?\>\<\,\[\]\:\;\|\\\]/", "", $string);
            // Replace blank space with delimeter
            $string = preg_replace("/[\/_|+ -]+/", $delimiter, $string);
            return $string;
        }
        $post_slug = CleanURL($request->title);
        // validate
        $request->validate([
            'title'      => 'required',
            'categories' => 'required',
            'tags'       => 'required',
            'image'      => 'required|image|mimes:jpg,png,jpeg,gif|max:4072',
        ]);
        //Image Check
        if($request->hasFile('image')) {
            $thumbnails_image = hexdec(uniqid()) . '.' . $request->image->getClientOriginalExtension();
            Image::make($request->image)->resize(950, 650)->save('Backend/assets/media/posts/' . $thumbnails_image);
        }
        // post Store database
        $userId        = Auth::user()->id;
        $post          = new post();
        $post->user_id = $userId;
        $post->title   = $request->title;
        $post->slug    = $post_slug;
        $post->image   = $thumbnails_image;
        $post->body    = $request->body;
        $post->tags    = $request->tags;
        $post->status  = '1';
        $post->date    = date('Y-m-d');
        $post->save();
        $post->categories()->attach($request->categories);
        // Notification
        $notification = array(
            'message'    => 'Post Added Successfully',
            'alert-type' => 'success',
        );
        // redirect
        return redirect()->route('admin.post.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $postShow = post::find($id);
        return view('Backend.Admin.post.show', compact('postShow'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $postEdit = post::find($id);
        $categories = category::all();
        return view('Backend.Admin.post.edit', compact('postEdit', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Slug Method
        function CleanURL($string, $delimiter = '-') {
            // Remove special characters
            $string = preg_replace("/[~`{}.'\"\!\@\#\$\%\^\&\*\(\)\_\=\+\/\?\>\<\,\[\]\:\;\|\\\]/", "", $string);
            // Replace blank space with delimeter
            $string = preg_replace("/[\/_|+ -]+/", $delimiter, $string);
            return $string;
        }

        // validate
        $request->validate([
            'title'      => 'required',
            'categories' => 'required',
            'tags'       => 'required',
            'image'      => 'image|mimes:jpg,png,jpeg,gif|max:4072',
        ]);
        // update post
        $postUpdate = post::find($id);
         //Image Update
         if($request->hasFile('image')) {
            @unlink(public_path('/Backend/assets/media/posts/'.$postUpdate->image));
            $thumbnails_image = hexdec(uniqid()) . '.' . $request->image->getClientOriginalExtension();
            Image::make($request->image)->resize(950, 650)->save('Backend/assets/media/posts/' . $thumbnails_image);
            $postUpdate->image = $thumbnails_image;
        }
        $userId        = Auth::user()->id;
        $postUpdate->user_id = $userId;
        $postUpdate->title   = $request->title;
        $postUpdate->slug    = CleanURL($request->title);
        $postUpdate->body    = $request->body;
        $postUpdate->tags    = $request->tags;
        $postUpdate->status  = '1';
        $postUpdate->date    = date('Y-m-d');
        $postUpdate->save();
        $postUpdate->categories()->sync($request->categories);
        // Notification
        $notification = array(
            'message'    => 'Post Updated Successfully',
            'alert-type' => 'success',
        );
        // redirect
        return redirect()->route('admin.post.index')->with($notification);
    }

     // Post Pending List ===============
     public function postPending()
     {
        $pendingpost = post::where('status', 0)->get();
        return view('Backend.Admin.post.pending', compact('pendingpost'));
     }
    // Post Approved Process =============
    public function postApprove($id) {
       $postApproved = post::find($id);
       $postApproved->status = '1';
       $postApproved->save();
        // Notification
        $notification = array(
            'message'    => 'Post Approved Successfully',
            'alert-type' => 'success',
        );
        // redirect
        return redirect()->route('admin.post.pending.list')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $postDelete = post::find($id);
        if($postDelete->image) {
            @unlink(public_path('/Backend/assets/media/posts/'.$postDelete->image));
        }
        $postDelete->categories()->detach();
        $postDelete->delete();
         // Notification
         $notification = array(
            'message'    => 'Post Deleted Successfully',
            'alert-type' => 'success',
        );
        // redirect
        return redirect()->route('admin.post.index')->with($notification);

    }
}

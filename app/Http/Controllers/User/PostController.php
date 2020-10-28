<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\post;
use Auth;
use Image;
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
        $user_id = Auth::id();
        $user_aproved_post = post::where('user_id', $user_id)->where('status', 1)->orderBy('id', 'DESC')->paginate(10);
        $user_pending_post = post::where('user_id', $user_id)->where('status', 0)->orderBy('id', 'DESC')->get();
        return view('Backend.User.post.index', compact('user_aproved_post', 'user_pending_post'));
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
        return view('Backend.User.post.create', compact('categories'));
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
        $post->status  = '0';
        $post->date    = date('Y-m-d');
        $post->save();
        $post->categories()->attach($request->categories);
        // Notification
        $notification = array(
            'message'    => 'Post Published Successfully! We Approve Soon',
            'alert-type' => 'success',
        );
        // redirect
        return redirect()->route('user.post.index')->with($notification);
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
        return view('Backend.User.post.show', compact('postShow'));
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
        return view('Backend.User.post.edit', compact('postEdit', 'categories'));
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
        $postUpdate->status  = '0';
        $postUpdate->date    = date('Y-m-d');
        $postUpdate->save();
        $postUpdate->categories()->sync($request->categories);
        // Notification
        $notification = array(
            'message'    => 'Post Updated Successfully',
            'alert-type' => 'success',
        );
        // redirect
        return redirect()->route('user.post.index')->with($notification);
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
        return redirect()->route('user.post.index')->with($notification);

    }
}

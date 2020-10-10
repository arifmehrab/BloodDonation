<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\str;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = category::latest()->get();
        return view('Backend.Admin.category.index', compact('categories'));
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
        // validation
        $request->validate([
            'category_name' => 'required',
        ]);

       // Insert category
        $category = new category();
        $category->category_name = $request->category_name;
        $category->category_slug = CleanURL($request->category_name);
        $category->save();

         // Notification
         $notification = array(
            'message'    => 'Category Added Successfully',
            'alert-type' => 'success',
        );
        // redirect
        return redirect()->route('admin.category.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category_edit = category::find($id);
        return view('Backend.Admin.category.edit', compact('category_edit'));
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
        // Update
        $categoryUpdate = category::find($id);
        $categoryUpdate->category_name = $request->category_name;
        $categoryUpdate->category_slug = CleanURL($request->category_name);
        $categoryUpdate->save();
         // Notification
         $notification = array(
            'message'    => 'Category Updated Successfully',
            'alert-type' => 'success',
        );
        // redirect
        return redirect()->route('admin.category.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = category::find($id);
        $category->delete();
         // Notification
         $notification = array(
            'message'    => 'Category Deleted Successfully',
            'alert-type' => 'success',
        );
        // redirect
        return redirect()->route('admin.category.index')->with($notification);
    }
}

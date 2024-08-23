<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class BlogCategoriesController extends Controller
{
    //
    private $db_blog_categories;

    public function __construct()
    {
        $this->db_blog_categories = "blog_categories";
    } // End Method

    // Blog Category View Function
    public function All_Blog_Category_View()
    {

        $bolg_category = DB::table($this->db_blog_categories)->get();
        return view('backend.blog_category.view', compact('bolg_category'));
    } // End Method

    // Blog Category Create Function
    public function Blog_Category_Create()
    {
        return view('backend.blog_category.create');
    } // End Method

    // Blog Category Store Function 
    public function Blog_Category_Store(Request $request)
    {

        $validate = $request->validate([

            "blog_category" => "required",
        ], [
            "blog_category.required" => "Blog Category is Required",
        ]);

        $slug = Str::of($request->blog_category)->slug('-');

        $data = array();
        $data['blog_category'] = $request->blog_category;
        $data['slug'] = $slug;
        $data['created_at'] = Carbon::now();

        DB::table($this->db_blog_categories)->insert($data);

        $notification = array('message' => 'Create Blog Category !', 'alert-type' => 'success');
        return redirect()->route('all_blog_category.view')->with($notification);
    } // End Method

    // Blog Category Edit Function
    public function Blog_Category_Edit($id)
    {
        $edit_blog_category = DB::table($this->db_blog_categories)->where('id', $id)->first();
        return view('backend.blog_category.update', compact('edit_blog_category'));
    } // End Method 

    // Blog Category Update Function
    public function Blog_Category_Update(Request $request)
    {
        $id = $request->id;

        $slug = Str::of($request->blog_category)->slug('-');

        $data = array();
        $data['blog_category'] = $request->blog_category;
        $data['slug'] = $slug;
        $data['updated_at'] = Carbon::now();

        DB::table($this->db_blog_categories)->where('id', $id)->update($data);

        $notification = array('message' => 'Update Blog Category !', 'alert-type' => 'success');
        return redirect()->route('all_blog_category.view')->with($notification);
    }

    // Blog Category Delete Function
    public function Blog_Category_Delete($id)
    {

        DB::table($this->db_blog_categories)->where('id', $id)->delete();

        $notification = array('message' => 'Delete Blog Category !', 'alert-type' => 'success');
        return redirect()->route('all_blog_category.view')->with($notification);
    } // End Method
}

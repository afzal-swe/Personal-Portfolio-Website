<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class BlogsController extends Controller
{
    //
    private $db_blogs;
    private $db_blog_categories;





    /**
     * Initialize the controller and set database table names.
     */
    public function __construct()
    {
        $this->db_blogs = "blogs";
        $this->db_blog_categories = "blog_categories";
    }







    /**
     * Retrieve and display all blogs with their associated categories.
     *
     * @return \Illuminate\View\View
     */
    public function View_All_Blog()
    {
        $blogs = DB::table($this->db_blogs)->orderBy('id', 'DESC')
            ->join('blog_categories', 'blogs.blog_category_id', 'blog_categories.id')
            ->select('blogs.*', 'blog_categories.blog_category')
            ->get();
        return view('backend.blogs.view_blog', compact('blogs'));
    }









    /**
     * Display the form to create a new blog with available blog categories.
     *
     * @return \Illuminate\View\View
     */
    public function Blog_Create()
    {
        $blogs = DB::table($this->db_blogs)->get();
        $blogs_category = DB::table($this->db_blog_categories)->get();
        return view('backend.blogs.create_blog', compact('blogs', 'blogs_category'));
    }









    /**
     * Store a newly created blog in the database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function Blog_Store(Request $request)
    {

        $validate = $request->validate([
            "blog_image" => "required",
            "blog_title" => "required",
            "blog_tags" => "required",
            "blog_category_id" => "required",
        ], [
            "blog_image.required" => "Blog Image is Required",
            "blog_title.required" => "Blog Title is Required",
            "blog_tags.required" => "Blog Tags is Required",
            "blog_category_id.required" => "Blog Category is Required",
        ]);

        $slug = Str::of($request->blog_title)->slug('-');

        $data = array();
        $data['blog_title'] = $request->blog_title;
        $data['blog_link'] = $request->blog_link;
        $data['blog_tags'] = $request->blog_tags;
        $data['blog_category_id'] = $request->blog_category_id;
        $data['blog_description'] = $request->blog_description;
        $data['status'] = $request->status;
        $data['blog_slug'] = $slug;
        $data['created_at'] = Carbon::now();

        $image = $request->blog_image;

        if ($image) {

            $img_name = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(430, 327)->save('backend/image/blog/' . $img_name);
            $data['blog_image'] = 'backend/image/blog/' . $img_name;
        }

        Db::table($this->db_blogs)->insert($data);

        $notification = array('message' => 'Create Successfully!', 'alert-type' => 'success');
        return redirect()->route('view_all_blog')->with($notification);
    }







    /**
     * Show the form for editing a specified blog.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function Blog_Edit($id)
    {
        $blog_edit = DB::table($this->db_blogs)->where('id', $id)->first();
        $blogs_category = DB::table($this->db_blog_categories)->get();
        return view('backend.blogs.update_blog', compact('blog_edit', 'blogs_category'));
    }








    /**
     * Update the specified blog in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function Blog_Update(Request $request)
    {
        $request_id = $request->id;

        $slug = Str::of($request->blog_title)->slug('-');

        $data = array();
        $data['blog_title'] = $request->blog_title;
        $data['blog_link'] = $request->blog_link;
        $data['blog_tags'] = $request->blog_tags;
        $data['blog_category_id'] = $request->blog_category_id;
        $data['blog_description'] = $request->blog_description;
        $data['status'] = $request->status;
        $data['blog_slug'] = $slug;
        $data['updated_at'] = Carbon::now();

        $image = $request->blog_image;

        if ($image) {

            $blog = DB::table($this->db_blogs)->where('id', $request_id)->first();
            $blog_img = $blog->blog_image;
            unlink($blog_img);


            $img_name = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(430, 327)->save('backend/image/blog/' . $img_name);
            $data['blog_image'] = 'backend/image/blog/' . $img_name;
        }

        Db::table($this->db_blogs)->where('id', $request_id)->update($data);

        $notification = array('message' => 'Update Successfully!', 'alert-type' => 'success');
        return redirect()->route('view_all_blog')->with($notification);
    }








    /**
     * Remove the specified blog from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function Blog_Delete($id)
    {

        $blog = DB::table($this->db_blogs)->where('id', $id)->first();

        $image = $blog->blog_image;

        if ($image) {
            unlink($image);

            DB::table($this->db_blogs)->where('id', $id)->delete();

            $notification = array('message' => 'Delete Successfully!', 'alert-type' => 'success');
            return redirect()->route('view_all_blog')->with($notification);
        } else {
            DB::table($this->db_blogs)->where('id', $id)->delete();

            $notification = array('message' => 'Delete Successfully!', 'alert-type' => 'success');
            return redirect()->route('view_all_blog')->with($notification);
        }
    }
}

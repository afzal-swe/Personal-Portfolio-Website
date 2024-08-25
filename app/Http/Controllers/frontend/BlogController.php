<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Pest\Laravel\get;

class BlogController extends Controller
{
    //
    private $db_blogs;
    private $db_blog_categories;
    private $db_user;

    public function __construct()
    {
        $this->db_blogs = "blogs";
        $this->db_blog_categories = "blog_categories";
        $this->db_user = "users";
    } // End Method

    // Blog Nav Bar 
    public function Blog()
    {
        return view('frontend.blog.blog');
    } // End Method

    // Blog Details
    public function blog_details($id)
    {
        $details = DB::table($this->db_blogs)->where('id', $id)->first();
        $new_blog = DB::table('blogs')->orderBy('id', 'DESC')->limit(5)->get();
        $categories = DB::table('blog_categories')->orderBy('id', 'DESC')->limit(8)->get();
        return view('frontend.blog.blog_details', compact('details', 'new_blog', 'categories'));
    } // End Method

    // Blog Category Show
    public function Category_Blog($id)
    {
        $blog_post = DB::table($this->db_blogs)
            ->where('blog_category_id', $id)
            ->orderBy('id', 'DESC')->get();
        $user = DB::table($this->db_user)->first();
        $categories = DB::table('blog_categories')->orderBy('id', 'DESC')->limit(8)->get();
        $new_blog = DB::table('blogs')->orderBy('id', 'DESC')->limit(5)->get();
        $category_name = DB::table($this->db_blog_categories)->where('id', $id)->first();

        return view('frontend.blog.blog_category', compact('blog_post', 'user', 'categories', 'new_blog', 'category_name'));
    } // End Method
}

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






    /**
     * Constructor to initialize database table names.
     *
     * Sets the table names for blogs, blog categories, and users.
     */
    public function __construct()
    {
        $this->db_blogs = "blogs";
        $this->db_blog_categories = "blog_categories";
        $this->db_user = "users";
    }







    /**
     * Show the blog view.
     *
     * @return \Illuminate\View\View The view for the blog page.
     */
    public function Blog()
    {
        return view('frontend.blog.blog');
    }







    /**
     * Show the details of a specific blog post.
     *
     * @param int $id The ID of the blog post.
     * 
     * @return \Illuminate\View\View The view for the blog details page, with blog details, new blogs, and categories.
     */
    public function blog_details($id)
    {
        $details = DB::table($this->db_blogs)->where('id', $id)->first();
        $new_blog = DB::table('blogs')->orderBy('id', 'DESC')->limit(5)->get();
        $categories = DB::table('blog_categories')->orderBy('id', 'DESC')->limit(8)->get();
        return view('frontend.blog.blog_details', compact('details', 'new_blog', 'categories'));
    }










    /**
     * Show blog posts for a specific category.
     *
     * @param int $id The ID of the blog category.
     * 
     * @return \Illuminate\View\View The view for the category blog page, with blog posts, user details, categories, new blogs, and category name.
     */
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
    }
}

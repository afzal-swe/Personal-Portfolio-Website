<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    //
    private $db_project_portfolio;

    public function __construct()
    {
        $this->db_project_portfolio = "project_portfolio";
    }

    // View All Project Portfolio Function
    public function All_Project_Portfolio()
    {

        $all_project_portfolio = DB::table($this->db_project_portfolio)->orderBy('id', 'DESC')->get();
        return view('backend.portfolio.view', compact('all_project_portfolio'));
    } // End Method

    // Create Project Portfolio Function
    public function Project_Portfolio_Create()
    {
        $project_portfolio = DB::table($this->db_project_portfolio)->get();

        return view('backend.portfolio.create', compact('project_portfolio'));
    } // End Method

    // Project Portfolio Store Function
    public function Project_Portfolio_Store(Request $request)
    {
        $validate = $request->validate([

            "portfolio_name" => "required",
            "portfolio_title" => "required",
            "portfolio_image" => "required",
        ], [
            'portfolio_name.required' => 'Portfolio Name is Required',
            'portfolio_title.required' => 'Portfolio Title is Required',
            'portfolio_image.required' => 'Portfolio Image is Required',
        ]);

        $slug = Str::of($request->portfolio_name)->slug('-');

        $data = array();
        $data['portfolio_name'] = $request->portfolio_name;
        $data['portfolio_title'] = $request->portfolio_title;
        $data['portfolio_description'] = $request->portfolio_description;
        $data['status'] = $request->status;
        $data['type'] = $request->type;
        $data['website_link'] = $request->website_link;
        $data['slug'] = $slug;
        $data['created_at'] = Carbon::now();

        $image = $request->portfolio_image;
        if ($image) {


            $img_name = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1020, 519)->save('backend/image/portfolio/' . $img_name);
            $data['portfolio_image'] = 'backend/image/portfolio/' . $img_name;
        }
        DB::table($this->db_project_portfolio)->insert($data);

        $notification = array('message' => 'Create Successfully!', 'alert-type' => 'success');
        return redirect()->route('all_project_portfolio')->with($notification);
    } // End Method

    // Project Portfolio Edit Function
    public function Project_Portfolio_Edit($id)
    {
        $project_edit = DB::table($this->db_project_portfolio)->where('id', $id)->first();
        return view('backend.portfolio.update', compact('project_edit'));
    } // End Method

    // Update Project Portfolio Data Function
    public function Project_Portfolio_Update(Request $request)
    {
        $request_id = $request->id;

        $slug = Str::of($request->portfolio_name)->slug('-');

        $data = array();
        $data['portfolio_name'] = $request->portfolio_name;
        $data['portfolio_title'] = $request->portfolio_title;
        $data['portfolio_description'] = $request->portfolio_description;
        $data['status'] = $request->status;
        $data['type'] = $request->type;
        $data['website_link'] = $request->website_link;
        $data['slug'] = $slug;
        $data['updated_at'] = Carbon::now();

        $image = $request->portfolio_image;
        if ($image) {

            $updated_img = DB::table($this->db_project_portfolio)->where('id', $request_id)->first();
            $old_image = $updated_img->portfolio_image;
            unlink($old_image);


            $img_name = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1020, 519)->save('backend/image/portfolio/' . $img_name);
            $data['portfolio_image'] = 'backend/image/portfolio/' . $img_name;
        }

        DB::table($this->db_project_portfolio)->where('id', $request_id)->update($data);

        $notification = array('message' => 'Update Successfully!', 'alert-type' => 'success');
        return redirect()->route('all_project_portfolio')->with($notification);
    } // End Mothod

    // Project Portfolio Delete Function
    public function Project_Portfolio_Delete(Request $request)
    {

        $request_id = $request->id;

        $image = DB::table($this->db_project_portfolio)->where('id', $request_id)->first();
        $delete_image = $image->portfolio_image;
        unlink($delete_image);

        DB::table($this->db_project_portfolio)->where('id', $request_id)->delete();
        $notification = array('message' => 'Delete Successfully!', 'alert-type' => 'success');
        return redirect()->route('all_project_portfolio')->with($notification);
    } // End Method
}

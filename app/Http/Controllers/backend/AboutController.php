<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    //
    private $db_about;

    public function __construct()
    {
        $this->db_about = "abouts";
    }

    // About Section
    public function About()
    {
        $edit_about = DB::table($this->db_about)->first();

        if ($edit_about) {
            return view('backend.about.update', compact('edit_about'));
        } else {
            return view('backend.about.create', compact('edit_about'));
        }
    } // End Method

    // About Store Function
    public function About_Store(Request $request)
    {
        $validate = $request->validate([

            "title" => "required",
            "short_title" => "required",
        ]);

        $data = array();
        $data['title'] = $request->title;
        $data['short_title'] = $request->short_title;
        $data['short_Description'] = $request->short_Description;
        $data['logn_Description'] = $request->logn_Description;
        $data['created_at'] = Carbon::now();

        $image = $request->about_image;

        if ($image) {


            $image_name = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(749, 667)->save('backend/image/about/' . $image_name);
            $data['about_image'] = 'backend/image/about/' . $image_name;
        }

        DB::table($this->db_about)->insert($data);

        $notification = array('messege' => 'Added About Information!', 'alert-type' => 'success');
        return redirect()->route('about.info')->with($notification);
    } // End Method

    // Update About Function 
    public function About_Info_Update(Request $request, $id)
    {

        $data = array();
        $data['title'] = $request->title;
        $data['short_title'] = $request->short_title;
        $data['short_Description'] = $request->short_Description;
        $data['logn_Description'] = $request->logn_Description;
        $data['updated_at'] = Carbon::now();

        $image = $request->about_image;

        if ($image) {

            $old_img = DB::table($this->db_about)->where('id', $id)->first();
            $img = $old_img->about_image;
            @unlink($img);

            $image_name = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(749, 667)->save('backend/image/about/' . $image_name);
            $data['about_image'] = 'backend/image/about/' . $image_name;
        }

        DB::table($this->db_about)->where('id', $id)->update($data);

        $notification = array('messege' => 'Update About Information!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    } // End Method


    //// ================= About Multi Images Function ====================== ////
    public function About_Multi_Images()
    {
        return view('backend.about.multi_image.view');
    } // End Method
}

<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redis;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    //
    private $db_about;
    private $db_about_multi_images;

    public function __construct()
    {
        $this->db_about = "abouts";
        $this->db_about_multi_images = "about_multi_images";
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
        $image = DB::table($this->db_about_multi_images)->get();
        return view('backend.about.multi_image.view', compact('image'));
    } // End Method

    // Multi Image Store Function
    public function About_Multi_Images_Store()
    {
        $image = DB::table($this->db_about_multi_images)->get();
        return view('backend.about.multi_image.create', compact('image'));
    } // End Method

    // About Multi Image Insert
    public function About_Multi_Images_Insert(Request $request)
    {

        $data = array();

        $image = $request->multi_image;

        if ($image) {

            foreach ($image as $multi_image) {
                $name_gen = uniqid() . '.' . $multi_image->getClientOriginalExtension();
                Image::make($multi_image)->resize(124, 124)->save('backend/image/about/multi_image/' . $name_gen);
                $data['multi_image'] = 'backend/image/about/multi_image/' . $name_gen;

                DB::table($this->db_about_multi_images)->insert($data);
            }
            $notification = array('messege' => 'Add Image Successfully!', 'alert-type' => 'success');
            return redirect()->route('about_multi.image')->with($notification);
        }
    } // End Method

    // Edit Multi Image Function
    public function About_Multi_Images_Edit(Request $request)
    {

        $request_id = $request->id;

        $edit_image = DB::table($this->db_about_multi_images)->where('id', $request_id)->first();

        return view('backend.about.multi_image.update', compact('edit_image'));
    } // End Method

    // Update Multi Image Function 
    public function About_Multi_Images_Update(Request $request)
    {

        $update_id = $request->id;

        $req_img = $request->multi_image;

        if ($req_img) {
            $update_img = DB::table($this->db_about_multi_images)->where('id', $update_id)->first();
            $image = $update_img->multi_image;
            unlink($image);

            $name_gen = uniqid() . '.' . $req_img->getClientOriginalExtension();
            Image::make($req_img)->resize(124, 124)->save('backend/image/about/multi_image/' . $name_gen);
            $data['multi_image'] = 'backend/image/about/multi_image/' . $name_gen;
        }

        DB::table($this->db_about_multi_images)->where('id', $update_id)->update($data);
        $notification = array('messege' => 'Add Image Successfully!', 'alert-type' => 'success');
        return redirect()->route('about_multi.image')->with($notification);
    }

    // Image Delete Section
    public function Image_Delete($id)
    {

        $delete_id = DB::table($this->db_about_multi_images)->where('id', $id)->first();
        $unlink_image = $delete_id->multi_image;
        unlink($unlink_image);

        DB::table($this->db_about_multi_images)->where('id', $id)->delete();

        $notification = array('messege' => 'Delete Image Successfully!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    } // End Method
}

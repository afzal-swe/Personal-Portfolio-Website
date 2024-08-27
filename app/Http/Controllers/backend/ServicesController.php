<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class ServicesController extends Controller
{
    //
    private $db_services;

    public function __construct()
    {
        $this->db_services = "services";
    } // End Method

    // Manage All Services Function
    public function All_Services_Manage()
    {
        $all_services = DB::table($this->db_services)->get();
        return view('backend.services.view', compact('all_services'));
    } // End Method

    // Services Create Function
    public function Services_Create()
    {
        $all_services = DB::table($this->db_services)->get();
        return view('backend.services.create', compact('all_services'));
    } // End Method

    // Services Store Function
    public function Services_Store(Request $request)
    {
        $validate = $request->validate([

            "title" => "required",
            "short_description" => "required",
            "logn_description" => "required",
            "image" => "required",
            "icon" => "required",
        ], [
            "title.required" => "This Title is Required",
            "short_description.required" => "This Short Description is Required",
            "logn_description.required" => "This Long Description is Required",
            "image.required" => "This Image Description is Required",
            "icon.required" => "This Icon Description is Required",
        ]);

        $data = array();
        $data['title'] = $request->title;
        $data['short_description'] = $request->short_description;
        $data['logn_description'] = $request->logn_description;
        $data['status'] = $request->status;
        $data['created_at'] = Carbon::now();

        $image = $request->image;
        $icon = $request->icon;

        if ($image && $icon) {

            $image_name = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(323, 240)->save('backend/image/services/image/' . $image_name);
            $data['image'] = 'backend/image/services/image/' . $image_name;


            $icon_name = uniqid() . '.' . $icon->getClientOriginalExtension();
            Image::make($icon)->resize(83, 90)->save('backend/image/services/icon/' . $icon_name);
            $data['icon'] = 'backend/image/services/icon/' . $icon_name;
        }

        DB::table($this->db_services)->insert($data);

        $notification = array('message' => 'Services Create Successfully!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    } /// End Method

    // Services Status Function
    public function Services_Status($id)
    {


        $data_info = DB::table($this->db_services)->where('id', $id)->first();
        $data = array();

        if ($data_info->status == "1") {
            $data['status'] = "0";

            DB::table($this->db_services)->where('id', $id)->update($data);

            $notification = array('message' => 'Deactive Successfully!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            $data['status'] = "1";

            DB::table($this->db_services)->where('id', $id)->update($data);

            $notification = array('message' => 'Deactive Successfully!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
    } // End Method

    // Delete Service Function
    public function Services_Delete($id)
    {

        $delete_id = DB::table($this->db_services)->where('id', $id)->first();
        $image = $delete_id->image;
        $icon = $delete_id->icon;

        unlink($image);
        unlink($icon);

        DB::table($this->db_services)->where('id', $id)->delete();

        $notification = array('message' => 'Services Delete Successfully!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    } // End Method
}

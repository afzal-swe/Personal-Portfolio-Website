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







    /**
     * Controller constructor.
     *
     * Initializes the database table name for services.
     */
    public function __construct()
    {
        $this->db_services = "services";
    }







    /**
     * Display all services.
     *
     * Retrieves all records from the `services` table and returns them to the `view` for display.
     *
     * @return \Illuminate\View\View
     */
    public function All_Services_Manage()
    {
        $all_services = DB::table($this->db_services)->get();
        return view('backend.services.view', compact('all_services'));
    }








    /**
     * Show the form to create a new service.
     *
     * Retrieves all records from the `services` table and returns them to the `create` view.
     *
     * @return \Illuminate\View\View
     */
    public function Services_Create()
    {
        $all_services = DB::table($this->db_services)->get();
        return view('backend.services.create', compact('all_services'));
    }










    /**
     * Store a newly created service in the database.
     *
     * Validates the request data, processes the uploaded images, and inserts the data into the `services` table.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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
    }











    /**
     * Show the form for editing the specified service.
     *
     * Retrieves the service data by ID and passes it to the view for editing.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function Services_Edit($id)
    {
        $update_id = DB::table($this->db_services)->where('id', $id)->first();
        return view('backend.services.update', compact('update_id'));
    }












    /**
     * Update the specified service in the database.
     *
     * Validates and updates service data including image and icon.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function Services_Update(Request $request)
    {

        $request_id = $request->id;

        $data = array();
        $data['title'] = $request->title;
        $data['short_description'] = $request->short_description;
        $data['logn_description'] = $request->logn_description;
        $data['status'] = $request->status;
        $data['updated_at'] = Carbon::now();

        $image = $request->image;
        $icon = $request->icon;

        if ($image) {
            $old_data = DB::table($this->db_services)->where('id', $request_id)->first();
            $old_image = $old_data->image;
            unlink($old_image);

            $image_name = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(323, 240)->save('backend/image/services/image/' . $image_name);
            $data['image'] = 'backend/image/services/image/' . $image_name;
        }

        if ($icon) {
            $old_data = DB::table($this->db_services)->where('id', $request_id)->first();
            $old_icon = $old_data->icon;
            unlink($old_icon);

            $icon_name = uniqid() . '.' . $icon->getClientOriginalExtension();
            Image::make($icon)->resize(83, 90)->save('backend/image/services/icon/' . $icon_name);
            $data['icon'] = 'backend/image/services/icon/' . $icon_name;
        }

        DB::table($this->db_services)->where('id', $request_id)->update($data);

        $notification = array('message' => 'Services Update Successfully!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }











    /**
     * Toggle the status of a specified service.
     *
     * Updates the status of the service based on its current state.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
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
    }









    /**
     * Delete a specified service.
     *
     * Removes the service from the database and deletes associated image and icon files.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function Services_Delete($id)
    {
        $delete_id = DB::table($this->db_services)->where('id', $id)->first();
        $image = $delete_id->image;
        $icon = $delete_id->icon;

        // Delete image and icon files
        if (file_exists($image)) {
            unlink($image);
        }
        if (file_exists($icon)) {
            unlink($icon);
        }

        // Delete service record from database
        DB::table($this->db_services)->where('id', $id)->delete();

        $notification = array('message' => 'Services Delete Successfully!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}

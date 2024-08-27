<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class WorkingProcessController extends Controller
{
    //
    private $db_working_process;

    public function __construct()
    {

        $this->db_working_process = "working_process";
    } // End Method


    public function Working_Porcess_View()
    {
        $working_process_view = DB::table($this->db_working_process)->orderBy('id', 'DESC')->get();
        return view('backend.working_process.view', compact('working_process_view'));
    } // End Method

    // Create Working Process Function
    public function Working_Porcess_Create()
    {
        $working_process_view = DB::table($this->db_working_process)->orderBy('id', 'DESC')->get();
        return view('backend.working_process.create', compact('working_process_view'));
    } // End Method
    /// Store Working Process Function
    public function Working_Porcess_Store(Request $request)
    {

        $validate = $request->validate([

            "title" => "required",
            "image" => "required",
        ], [
            "title.required" => "This Title is Required",
            "image.required" => "This Image is Required",
        ]);

        $slug = Str::of($request->title)->slug('-');

        $data = array();
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $data['status'] = $request->status;
        $data['slug'] = $slug;
        $data['created_at'] = Carbon::now();

        $img = $request->image;

        if ($img) {
            $img_name = uniqid() . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(114, 114)->save('backend/image/working_process/' . $img_name);
            $data['image'] = 'backend/image/working_process/' . $img_name;
        }

        DB::table($this->db_working_process)->insert($data);

        $notification = array('message' => 'Create Successfully', 'alert-type' => 'success');
        return redirect()->route('working_process.manage')->with($notification);
    } // End Method

    // Working Process Edit Function
    public function Working_Porcess_Edit($id)
    {
        $edit_data = DB::table($this->db_working_process)->where('id', $id)->first();
        return view('backend.working_process.update', compact('edit_data'));
    } // End Method

    // Update Working Process Function
    public function Working_Porcess_Update(Request $request)
    {

        $request_id = $request->id;


        $slug = Str::of($request->title)->slug('-');

        $data = array();
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $data['status'] = $request->status;
        $data['slug'] = $slug;
        $data['updated_at'] = Carbon::now();

        $img = $request->image;

        if ($img) {

            $find_data = DB::table($this->db_working_process)->where('id', $request_id)->first();
            $unlink_image = $find_data->image;
            unlink($unlink_image);

            $img_name = uniqid() . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(114, 114)->save('backend/image/working_process/' . $img_name);
            $data['image'] = 'backend/image/working_process/' . $img_name;
        }

        DB::table($this->db_working_process)->where('id', $request_id)->update($data);

        $notification = array('message' => 'Updated Successfully', 'alert-type' => 'success');
        return redirect()->route('working_process.manage')->with($notification);
    } // End Method


    // Delete Working Process Function
    public function Working_Porcess_Delete($id)
    {

        $find_data = DB::table($this->db_working_process)->where('id', $id)->first();
        $unlink_image = $find_data->image;
        unlink($unlink_image);

        DB::table($this->db_working_process)->where('id', $id)->delete();

        $notification = array('message' => 'Delete Successfully', 'alert-type' => 'success');
        return redirect()->route('working_process.manage')->with($notification);
    } // End Method


    // Working process Status Function
    public function Working_Porcess_Status(Request $request)
    {
        $id = $request->id;

        $view_data = DB::table($this->db_working_process)->where('id', $id)->first();
        // dd($view_data);

        $data = array();

        if ($view_data->status == '1') {
            $data['status'] = "0";

            DB::table($this->db_working_process)->where('id', $id)->update($data);

            $notification = array('message' => 'Deactive Successfully!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            $data['status'] = "1";

            DB::table($this->db_working_process)->where('id', $id)->update($data);

            $notification = array('message' => 'Active Active!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
    } // end Method
}

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






    /**
     * Constructor to initialize the database table name.
     *
     * Sets the table name for the working process.
     */
    public function __construct()
    {
        $this->db_working_process = "working_process";
    }








    /**
     * Show the view for working processes.
     *
     * Retrieves all working processes from the database and orders them by ID in descending order.
     * 
     * @return \Illuminate\View\View The view for the working process page with the retrieved working processes.
     */
    public function Working_Porcess_View()
    {
        $working_process_view = DB::table($this->db_working_process)->orderBy('id', 'DESC')->get();
        return view('backend.working_process.view', compact('working_process_view'));
    }









    /**
     * Show the view for creating a new working process.
     *
     * Retrieves all working processes from the database and orders them by ID in descending order.
     * 
     * @return \Illuminate\View\View The view for creating a working process with the retrieved working processes.
     */
    public function Working_Porcess_Create()
    {
        $working_process_view = DB::table($this->db_working_process)->orderBy('id', 'DESC')->get();
        return view('backend.working_process.create', compact('working_process_view'));
    }










    /**
     * Store a new working process in the database.
     *
     * @param \Illuminate\Http\Request $request The HTTP request containing the working process details.
     * 
     * @return \Illuminate\Http\RedirectResponse Redirects to the working process management page with a success notification.
     */
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
    }











    /**
     * Show the view for editing a working process.
     *
     * @param int $id The ID of the working process to be edited.
     * 
     * @return \Illuminate\View\View The view for updating the working process with the retrieved data.
     */
    public function Working_Porcess_Edit($id)
    {

        // Retrieve the working process details for the given ID.
        $edit_data = DB::table($this->db_working_process)->where('id', $id)->first();


        return view('backend.working_process.update', compact('edit_data'));
    }












    /**
     * Update a working process in the database.
     *
     * @param \Illuminate\Http\Request $request The HTTP request containing the updated working process details.
     * 
     * @return \Illuminate\Http\RedirectResponse Redirects to the working process management page with a success notification.
     */
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
    }










    /**
     * Delete a working process from the database.
     *
     * @param int $id The ID of the working process to be deleted.
     * 
     * @return \Illuminate\Http\RedirectResponse Redirects to the working process management page with a success notification.
     */
    public function Working_Porcess_Delete($id)
    {

        $find_data = DB::table($this->db_working_process)->where('id', $id)->first();
        $unlink_image = $find_data->image;
        unlink($unlink_image);

        DB::table($this->db_working_process)->where('id', $id)->delete();

        $notification = array('message' => 'Delete Successfully', 'alert-type' => 'success');
        return redirect()->route('working_process.manage')->with($notification);
    }









    /**
     * Toggle the status of a working process between active and inactive.
     *
     * @param \Illuminate\Http\Request $request The HTTP request containing the ID of the working process.
     * 
     * @return \Illuminate\Http\RedirectResponse Redirects back with a success notification indicating the new status.
     */
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
    }
}

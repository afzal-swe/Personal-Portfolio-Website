<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

use function Pest\Laravel\delete;

class FeedbackController extends Controller
{
    //
    private $db_feedback;





    /**
     * Initialize the controller with database table names.
     *
     * @return void
     */
    public function __construct()
    {
        $this->db_feedback = "feedback";
    }






    /**
     * Display a listing of feedback data.
     *
     * @return \Illuminate\View\View
     */
    public function Feedback_Manage()
    {
        $feedback_data = DB::table($this->db_feedback)->get();
        return view('backend.feedback.feedback_manage', compact('feedback_data'));
    }








    /**
     * Store new feedback data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function Feedback_Store(Request $request)
    {
        $validate = $request->validate([

            "title" => "required",
        ], [
            "title.required" => "This Title is Required",
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['title'] = $request->title;
        $data['short_title'] = $request->short_title;
        $data['created_at'] = Carbon::now();

        DB::table($this->db_feedback)->insert($data);

        $notification = array('message' => 'Feedback Store Successfully!', 'alert-type' => 'success');
        return redirect()->route('feedback_manage')->with($notification);
    }








    /**
     * Show the form for editing a specific feedback.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function Feedback_Edit($id)
    {
        $edit = DB::table($this->db_feedback)->where('id', $id)->first();
        return view('backend.feedback.feedback_update', compact('edit'));
    }








    /**
     * Update a specific feedback.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function Feedback_Update(Request $request)
    {

        $update_id = $request->id;

        $data = array();
        $data['name'] = $request->name;
        $data['title'] = $request->title;
        $data['short_title'] = $request->short_title;
        $data['updated_at'] = Carbon::now();

        DB::table($this->db_feedback)->where('id', $update_id)->update($data);

        $notification = array('message' => 'Feedback Update Successfully!', 'alert-type' => 'success');
        return redirect()->route('feedback_manage')->with($notification);
    }







    /**
     * Delete a specific feedback.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function Feedback_Delete($id)
    {

        DB::table($this->db_feedback)->where('id', $id)->delete();

        $notification = array('message' => 'Feedback Delete Successfully!', 'alert-type' => 'success');
        return redirect()->route('feedback_manage')->with($notification);
    }
}

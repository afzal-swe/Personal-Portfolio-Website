<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class ProgressController extends Controller
{
    //
    private $db_progress_bar;

    public function __construct()
    {
        $this->db_progress_bar = "progress_bar";
    } // End Method

    // Progress View Function
    public function Progress_View()
    {

        $all_progress = DB::table($this->db_progress_bar)->get();
        return view('backend.progress_bar.view_progress', compact('all_progress'));
    } // End Method

    // Progress Create Function
    public function Progress_Create(Request $request)
    {

        $validate = $request->validate([
            'name' => 'required|unique:progress_bar',
        ], [
            'name.required' => "The Name is Required"
        ]);

        $slug = Str::of($request->name)->slug('-');

        $data = array();
        $data['name'] = $request->name;
        $data['percentage'] = $request->percentage;
        $data['status'] = $request->status;
        $data['slug'] = $slug;
        $data['created_at'] = Carbon::now();

        DB::table($this->db_progress_bar)->insert($data);

        $notification = array('message' => 'Create Progress Successfully!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    } // End Method

    // Progress Edit Function
    public function Progress_Edit($id)
    {
        $edit = DB::table($this->db_progress_bar)->where('id', $id)->first();
        return view('backend.progress_bar.view_progress', compact('edit'));
    }


    // Progress Status Function
    public function Progress_Status(Request $request)
    {

        $slug = $request->slug;

        $view_data = DB::table($this->db_progress_bar)->where('slug', $slug)->first();
        // dd($view_data);

        $data = array();

        if ($view_data->status == '1') {
            $data['status'] = "0";

            DB::table($this->db_progress_bar)->where('slug', $slug)->update($data);

            $notification = array('message' => 'Progress Status Deactive!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            $data['status'] = "1";

            DB::table($this->db_progress_bar)->where('slug', $slug)->update($data);

            $notification = array('message' => 'Progress Status Active!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
    } // End Method

    // Progress Delete Function
    public function Progress_Delete(Request $request)
    {
        $slug = $request->slug;

        DB::table($this->db_progress_bar)->where('slug', $slug)->delete();

        $notification = array('message' => 'Delete Progress Successfully!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
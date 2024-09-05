<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PartnersController extends Controller
{
    //
    private $db_partners;





    /**
     * Constructor to initialize database table names.
     *
     * @return void
     */
    public function __construct()
    {
        $this->db_partners = "partners";
    }








    /**
     * Show the form for creating or updating partner information.
     *
     * @return \Illuminate\View\View
     */
    public function Partners_Create()
    {

        $data = DB::table($this->db_partners)->first();

        if ($data) {
            return view('backend.partners.update', compact('data'));
        } else {

            return view('backend.partners.create');
        }
    }







    /**
     * Store a new partner record.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function Partners_Store(Request $request)
    {

        $data = array();
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $data['created_at'] = Carbon::now();

        DB::table($this->db_partners)->insert($data);

        $notification = array('message' => 'Store Successfully!', 'alert-type' => 'success');
        return redirect()->route('partners.create')->with($notification);
    }







    /**
     * Update an existing partner record.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function Partners_Update(Request $request)
    {
        // dd($request->all());

        $update_id = $request->id;

        $data = array();
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $data['updated_at'] = Carbon::now();

        DB::table($this->db_partners)->where('id', $update_id)->update($data);

        $notification = array('message' => 'Update Successfully!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}

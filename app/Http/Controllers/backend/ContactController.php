<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    //
    private $db_contacts;






    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->db_contacts = "contacts";
    }








    /**
     * Display all messages.
     *
     * @return \Illuminate\View\View
     */
    public function View_All_Message()
    {

        $all_message = DB::table($this->db_contacts)->get();
        return view('backend.contact.contact_view', compact('all_message'));
    }







    /**
     * Delete a specific message by ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function Message_Delete($id)
    {

        DB::table($this->db_contacts)->where('id', $id)->delete();

        $notification = array('message' => 'Delete Successfully!', 'alert-type' => 'success');
        return redirect()->route('message.view')->with($notification);
    }
}

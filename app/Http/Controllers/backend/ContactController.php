<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    //
    private $db_contacts;

    public function __construct()
    {
        $this->db_contacts = "contacts";
    } // End Method

    // View All Message Function
    public function View_All_Message()
    {

        $all_message = DB::table($this->db_contacts)->get();
        return view('backend.contact.contact_view', compact('all_message'));
    } // End Method

    // Message Delete Function
    public function Message_Delete($id)
    {

        DB::table($this->db_contacts)->where('id', $id)->delete();

        $notification = array('message' => 'Delete Successfully!', 'alert-type' => 'success');
        return redirect()->route('message.view')->with($notification);
    } // End Method
}

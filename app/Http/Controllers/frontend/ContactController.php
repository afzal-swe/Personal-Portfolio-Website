<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


class ContactController extends Controller
{
    //

    private $db_contacts;





    /**
     * Initialize the controller and set the database table name for contacts.
     *
     * Sets the `$db_contacts` property to the name of the contacts table.
     */
    public function __construct()
    {
        $this->db_contacts = "contacts";
    }






    /**
     * Show the contact page view.
     *
     * @return \Illuminate\View\View
     */
    public function Contact()
    {
        return view('frontend.contact.contact');
    }









    /**
     * Validate and send a contact message, then store it in the database.
     *
     * @param \Illuminate\Http\Request $request The HTTP request containing the contact message details.
     * 
     * @return \Illuminate\Http\RedirectResponse Redirects back to the previous page with a success notification.
     */
    public function Contact_Send(Request $request)
    {
        // Validate the request data.
        $validate = $request->validate([
            "name" => "required",
            "email" => "required",
            // "subject" => "required",
        ], [
            "name.required" => "This Name is Required",
            "email.required" => "This Email is Required",
            // "subject.required" => "This Subject is Required",
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['subject'] = $request->subject;
        $data['phone'] = $request->phone;
        $data['message'] = $request->message;
        $data['created_at'] = Carbon::now();

        DB::table($this->db_contacts)->insert($data);

        $notification = array('message' => 'Message Send Successfully!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}

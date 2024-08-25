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
}

<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicesController extends Controller
{
    //

    private $db_services;





    /**
     * Create a new controller instance and initialize the database table name.
     *
     * Sets the database table name for services.
     *
     * @return void
     */
    public function __construct()
    {
        $this->db_services = "services";
    }
}

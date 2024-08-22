<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function Home_Page()
    {
        return view('frontend.layouts.main');
    }
}

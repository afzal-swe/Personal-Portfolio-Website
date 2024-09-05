<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //




    /**
     * Display the home page.
     *
     * Returns the main layout view for the home page.
     *
     * @return \Illuminate\View\View
     */
    public function Home_Page()
    {
        return view('frontend.layouts.main');
    }
}

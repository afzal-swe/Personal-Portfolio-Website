<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //



    /**
     * Display the About page.
     *
     * Returns the view for the About page.
     *
     * @return \Illuminate\View\View
     */
    public function About()
    {
        return view('frontend.about.about');
    }
}

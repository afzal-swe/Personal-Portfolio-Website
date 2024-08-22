<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //

    public function Admin_dashboard()
    {
        return view('backend.layouts.main');
    }

    // Admin Logout Function
    public function Admin_logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array('message' => 'Logout Successfully', 'alert-type' => 'success');
        return redirect('/login')->with($notification);
    } // End 
}

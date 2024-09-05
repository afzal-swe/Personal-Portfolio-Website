<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //




    /**
     * Displays the admin dashboard view.
     *
     * @return \Illuminate\View\View
     */
    public function Admin_dashboard()
    {
        return view('backend.layouts.main');
    }







    /**
     * Logs out the user and invalidates the session.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function Admin_logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array('message' => 'Logout Successfully', 'alert-type' => 'success');
        return redirect('/login')->with($notification);
    }








    /**
     * Displays the form for changing the password.
     *
     * @return \Illuminate\View\View
     */
    public function Change_Password()
    {
        return view('backend.profile.update_password');
    }








    /**
     * Updates the user's password.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function Update_Password(Request $request)
    {
        // Validate the request
        $validate = $request->validate([
            "old_password" => "required",
            "new_password" => "required|min:8", // It's a good practice to enforce a minimum length
            "confirm_password" => "required|same:new_password",
        ], [
            "old_password.required" => "Old Password is required",
            "new_password.required" => "New Password is required",
            "confirm_password.required" => "Confirm Password is required",
            "confirm_password.same" => "Confirm Password should match the New Password",
        ]);

        // Check if the old password matches the current password
        $hashed_password = Auth::user()->password;
        if (Hash::check($request->old_password, $hashed_password)) {
            // Update the user's password
            $user = Auth::user();
            $user->password = Hash::make($request->new_password);
            $user->save;

            // Redirect with success message
            $notification = array('message' => 'Password updated successfully.', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            // Return error if the old password doesn't match
            return redirect()->back()->withErrors(['old_password' => 'The provided old password does not match our records.']);
        }
    }
}

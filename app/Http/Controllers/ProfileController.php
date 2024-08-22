<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{

    public function Profile()
    {
        $id = Auth::user()->id;
        $admin_data = User::find($id);

        return view('backend.profile.view', compact('admin_data'));
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        // dd($request->all());
        $request_id = $request->id;

        $data = array();

        $data['name'] = $request->name;
        $data['user_name'] = $request->user_name;
        $data['email'] = $request->email ?? "";
        $data['updated_at'] = Carbon::now();

        $profile_image = $request->image;

        if ($profile_image) {

            $p_image = DB::table('users')->where('id', $request_id)->first();
            $profile_img = $p_image->image;
            @unlink($profile_img);

            $name_gen = uniqid() . '.' . $profile_image->getClientOriginalExtension();

            Image::make($profile_image)->resize(636, 852)->save('backend/image/profile/' . $name_gen);

            $data['image'] = 'backend/image/profile/' . $name_gen;
        }

        DB::table('users')->where('id', $request_id)->update($data);

        $notification = array('message' => 'Update Successfully!', 'alert-type' => 'success');
        return redirect()->route('admin.profile')->with($notification);
    } // End Mathod
}

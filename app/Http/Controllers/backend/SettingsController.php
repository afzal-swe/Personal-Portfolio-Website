<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;


class SettingsController extends Controller
{
    //
    private $db_socials;
    private $db_seos;
    private $db_website_settings;

    public function __construct()
    {
        $this->db_socials = "socials";
        $this->db_seos = "seos";
        $this->db_website_settings = "website_settings";
    }

    // ==================== Socials Functions Section ==============
    public function Socials()
    {
        $socials = DB::table($this->db_socials)->first();

        if ($socials) {
            return view('backend.setting.socials.update', compact('socials'));
        } else {
            return view('backend.setting.socials.insert_data');
        }
    } // End Method

    // Insert Socials Information Function
    public function Socials_Insert(Request $request)
    {
        $data = array();
        $data['linkedin'] = $request->linkedin;
        $data['facebook'] = $request->facebook;
        $data['twitter'] = $request->twitter;
        $data['instagram'] = $request->instagram;
        $data['github'] = $request->github;
        $data['youtube'] = $request->youtube;
        $data['created_at'] = Carbon::now();

        DB::table($this->db_socials)->insert($data);

        $notification = array('message' => 'Socials added Successfully!', 'alert-type' => 'success');
        return redirect()->route('socials')->with($notification);
    } // End Method

    // Social Update Function
    public function Socials_Update(Request $request)
    {
        // dd($request->all());
        $social_id = $request->id;

        $data = array();
        $data['linkedin'] = $request->linkedin;
        $data['facebook'] = $request->facebook;
        $data['twitter'] = $request->twitter;
        $data['instagram'] = $request->instagram;
        $data['github'] = $request->github;
        $data['youtube'] = $request->youtube;
        $data['updated_at'] = Carbon::now();

        DB::table($this->db_socials)->where('id', $social_id)->update($data);

        $notification = array('message' => 'Socials Information Updated!', 'alert-type' => 'success');
        return redirect()->route('socials')->with($notification);
    } // End Method
    // ==================== Socials Functions Section End ============== //


    //// ================== Seos Function Start =====================////

    public function Seos()
    {
        $seo = DB::table($this->db_seos)->first();

        if ($seo) {
            return view('backend.setting.seo.update', compact('seo'));
        } else {
            return view('backend.setting.seo.insert');
        }
    } // End Method

    // Seos Insert Function
    public function Seos_Insert(Request $request)
    {

        $data = array();
        $data['meta_author'] = $request->meta_author;
        $data['meta_title'] = $request->meta_title;
        $data['meta_keyword'] = $request->meta_keyword;
        $data['meta_description'] = $request->meta_description;
        $data['google_analytics'] = $request->google_analytics;
        $data['google_verification'] = $request->google_verification;
        $data['alexa_analytics'] = $request->alexa_analytics;
        $data['created_at'] = Carbon::now();

        DB::table($this->db_seos)->insert($data);

        $notification = array('message' => 'Seos added Successfully!', 'alert-type' => 'success');
        return redirect()->route('seos')->with($notification);
    } // End Method

    // Seos Update Function
    public function Seos_Update(Request $request)
    {

        $update_id = $request->id;

        $data = array();
        $data['meta_author'] = $request->meta_author;
        $data['meta_title'] = $request->meta_title;
        $data['meta_keyword'] = $request->meta_keyword;
        $data['meta_description'] = $request->meta_description;
        $data['google_analytics'] = $request->google_analytics;
        $data['google_verification'] = $request->google_verification;
        $data['alexa_analytics'] = $request->alexa_analytics;
        $data['created_at'] = Carbon::now();

        DB::table($this->db_seos)->where('id', $update_id)->update($data);

        $notification = array('message' => 'Seos Update Successfully!', 'alert-type' => 'success');
        return redirect()->route('seos')->with($notification);
    } // End Method
    //// ================== Seos Function End =====================////


    //// ================== Website Settings Function Start =====================////

    public function Website_Settings()
    {
        $website_setting = DB::table($this->db_website_settings)->first();
        if ($website_setting) {
            return view('backend.setting.website_setting.update', compact('website_setting'));
        } else {
            return view('backend.setting.website_setting.insert_data', compact('website_setting'));
        }
    } // End Method

    // Website Settings Data Insert Function
    public function Website_Settings_Data_Insert(Request $request)
    {
        $validate = $request->validate([

            "website_name" => "required",
        ]);

        $data = array();
        $data['website_name'] = $request->website_name;
        $data['phone_one'] = $request->phone_one;
        $data['phone_two'] = $request->phone_two;
        $data['main_email'] = $request->main_email;
        $data['support_email'] = $request->support_email;
        $data['address'] = $request->address;
        $data['description'] = $request->description;
        $data['created_at'] = Carbon::now();

        $img = $request->favicon;

        if ($img) {

            $img_name = uniqid() . '.' . $img->getClientOriginalExtension();

            Image::make($img)->resize(64, 64)->save('backend/image/website_settings/' . $img_name);
            $data['favicon'] = 'backend/image/website_settings/' . $img_name;
        }

        DB::table($this->db_website_settings)->insert($data);

        $notification = array('message' => 'Website Settings Added Successfully!', 'alert-type' => 'success');
        return redirect()->route('website_settings')->with($notification);
    } // End Method

    // Website Settings Data Update Function
    public function Website_Settings_Data_Update(Request $request)
    {
        $update_id = $request->id;

        $data = array();
        $data['website_name'] = $request->website_name;
        $data['phone_one'] = $request->phone_one;
        $data['phone_two'] = $request->phone_two;
        $data['main_email'] = $request->main_email;
        $data['support_email'] = $request->support_email;
        $data['address'] = $request->address;
        $data['description'] = $request->description;
        $data['updated_at'] = Carbon::now();

        $img = $request->favicon;

        if ($img) {

            $old_img = DB::table($this->db_website_settings)->where('id', $update_id)->first();
            $favicon = $old_img->favicon;
            unlink($favicon);

            $img_name = uniqid() . '.' . $img->getClientOriginalExtension();

            Image::make($img)->resize(64, 64)->save('backend/image/website_settings/' . $img_name);
            $data['favicon'] = 'backend/image/website_settings/' . $img_name;
        }

        DB::table($this->db_website_settings)->where('id', $update_id)->update($data);

        $notification = array('message' => 'Website Settings Update Successfully!', 'alert-type' => 'success');
        return redirect()->route('website_settings')->with($notification);
    } // End Method
}

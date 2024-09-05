<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class HomeSlideController extends Controller
{
    //
    private $db_homeSlide;





    /**
     * Constructor to initialize database table name.
     */
    public function __construct()
    {
        $this->db_homeSlide = "home_slide";
    }







    /**
     * Display the home slider view, either to update existing data or create a new one.
     *
     * @return \Illuminate\View\View
     */
    public function Home_Slider()
    {

        $home_slider = DB::table($this->db_homeSlide)->first();

        if ($home_slider) {
            return view('backend.home_slide.update', compact('home_slider'));
        } else {
            return view('backend.home_slide.create', compact('home_slider'));
        }
    }








    /**
     * Store a new home slider image and details.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function Home_Slider_Insert(Request $request)
    {

        $validate = $request->validate([
            "title" => "required",
            "short_title" => "required",
        ]);

        $data = array();
        $data['title'] = $request->title;
        $data['short_title'] = $request->short_title;
        $data['video_url'] = $request->video_url;


        $image = $request->home_slide;

        if ($image) {

            $image_one = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(500, 310)->save('backend/image/home_slider/' . $image_one);
            $data['home_slide'] = 'backend/image/home_slider/' . $image_one;   // public/files/product/plus-point.jpg

        }

        DB::table($this->db_homeSlide)->insert($data);

        $notification = array('message' => 'Add New Photo Successfully!', 'alert-type' => 'success');
        return redirect()->route('home.slider')->with($notification);
    }











    /**
     * Update the home slider details. Optionally updates the slider image if provided.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function Home_Slider_Update(Request $request)
    {
        $slide_id = $request->id;


        $data = array();

        if ($request->file('home_slide')) {
            $file = $request->file('home_slide');

            $image = DB::table($this->db_homeSlide)->where('id', $slide_id)->first();
            $slide_img = $image->home_slide;
            @unlink($slide_img);

            $name_gen = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();

            Image::make($file)->resize(636, 852)->save('backend/image/home_slider/' . $name_gen);

            $save_url = 'backend/image/home_slider/' . $name_gen;

            $data['title'] = $request->title;
            $data['short_title'] = $request->short_title;
            $data['video_url'] = $request->video_url;
            $data['home_slide'] = $save_url;

            DB::table($this->db_homeSlide)->where('id', $slide_id)->update($data);

            $notification = array('message' => 'Home Slider Update Successfully', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            $data['title'] = $request->title;
            $data['short_title'] = $request->short_title;
            $data['video_url'] = $request->video_url;

            DB::table($this->db_homeSlide)->where('id', $slide_id)->update($data);

            $notification = array('message' => 'Home Slider Update Without image Successfully', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
    }
}

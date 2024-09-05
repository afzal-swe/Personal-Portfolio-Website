<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redis;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    //
    private $db_about;
    private $db_about_multi_images;






    /**
     * Constructor for initializing properties related to the "About" section.
     *
     * Sets up the database table names for storing "About" information and 
     * associated multiple images.
     */
    public function __construct()
    {
        $this->db_about = "abouts";
        $this->db_about_multi_images = "about_multi_images";
    }







    /**
     * Displays the "About" page for editing or creating content.
     *
     * If an existing "About" section is found in the database, the method loads
     * the update view with the current content. If no content is found, it loads
     * the create view to allow for new content creation.
     *
     * @return \Illuminate\View\View
     */
    public function About()
    {
        $edit_about = DB::table($this->db_about)->first();

        if ($edit_about) {
            return view('backend.about.update', compact('edit_about'));
        } else {
            return view('backend.about.create', compact('edit_about'));
        }
    }







    /**
     * Stores new "About" information in the database.
     *
     * Validates the incoming request data, processes the uploaded image (if provided),
     * and inserts the new "About" section information into the database. Upon success,
     * redirects back with a success notification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function About_Store(Request $request)
    {
        $validate = $request->validate([

            "title" => "required",
            "short_title" => "required",
        ]);

        $data = array();
        $data['title'] = $request->title;
        $data['short_title'] = $request->short_title;
        $data['short_Description'] = $request->short_Description;
        $data['logn_Description'] = $request->logn_Description;
        $data['created_at'] = Carbon::now();

        $image = $request->about_image;

        if ($image) {


            $image_name = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(749, 667)->save('backend/image/about/' . $image_name);
            $data['about_image'] = 'backend/image/about/' . $image_name;
        }

        DB::table($this->db_about)->insert($data);

        $notification = array('message' => 'Added About Information!', 'alert-type' => 'success');
        return redirect()->route('about.info')->with($notification);
    }














    /**
     * Updates existing "About" information in the database.
     *
     * Processes the incoming request to update the "About" section with new data. Handles
     * the uploaded image if provided, replacing the old image. Updates the database with
     * the new information and redirects back with a success notification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function About_Info_Update(Request $request, $id)
    {

        $data = array();
        $data['title'] = $request->title;
        $data['short_title'] = $request->short_title;
        $data['short_Description'] = $request->short_Description;
        $data['logn_Description'] = $request->logn_Description;
        $data['updated_at'] = Carbon::now();

        $image = $request->about_image;

        if ($image) {

            $old_img = DB::table($this->db_about)->where('id', $id)->first();
            $img = $old_img->about_image;
            @unlink($img);

            $image_name = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(749, 667)->save('backend/image/about/' . $image_name);
            $data['about_image'] = 'backend/image/about/' . $image_name;
        }

        DB::table($this->db_about)->where('id', $id)->update($data);

        $notification = array('message' => 'Update About Information!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }


    //// ================= About Multi Images Function ====================== ////




    /**
     * Retrieves and displays multiple "About" images.
     *
     * Fetches all images related to the "About" section from the database and displays them
     * in a view. The retrieved images are passed to the view for rendering.
     *
     * @return \Illuminate\View\View
     */
    public function About_Multi_Images()
    {
        $image = DB::table($this->db_about_multi_images)->get();
        return view('backend.about.multi_image.view', compact('image'));
    }







    /**
     * Displays the form to store multiple "About" images.
     *
     * Retrieves all existing images related to the "About" section from the database
     * and displays them along with the form to add new images.
     *
     * @return \Illuminate\View\View
     */
    public function About_Multi_Images_Store()
    {
        $image = DB::table($this->db_about_multi_images)->get();
        return view('backend.about.multi_image.create', compact('image'));
    }










    /**
     * Inserts multiple images for the "About" section.
     *
     * Handles the request to upload and store multiple images, processing each image individually.
     * The images are resized and saved in the specified directory, and their paths are stored in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function About_Multi_Images_Insert(Request $request)
    {

        $data = array();

        $image = $request->multi_image;

        if ($image) {

            foreach ($image as $multi_image) {
                $name_gen = uniqid() . '.' . $multi_image->getClientOriginalExtension();
                Image::make($multi_image)->resize(124, 124)->save('backend/image/about/multi_image/' . $name_gen);
                $data['multi_image'] = 'backend/image/about/multi_image/' . $name_gen;

                DB::table($this->db_about_multi_images)->insert($data);
            }
            $notification = array('message' => 'Add Image Successfully!', 'alert-type' => 'success');
            return redirect()->route('about_multi.image')->with($notification);
        }
    }









    /**
     * Displays the edit form for a specific "About" multi-image.
     *
     * Retrieves the image data from the database based on the provided ID and passes it to the view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function About_Multi_Images_Edit(Request $request)
    {

        $request_id = $request->id;

        $edit_image = DB::table($this->db_about_multi_images)->where('id', $request_id)->first();

        return view('backend.about.multi_image.update', compact('edit_image'));
    }









    /**
     * Updates a specific "About" multi-image record in the database.
     *
     * Validates the request data, processes the new image file, and updates the record in the database.
     * The previous image file is deleted from the server if a new image is uploaded.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function About_Multi_Images_Update(Request $request)
    {
        $validate = $request->validate([
            "multi_image" => "required",
        ]);

        $update_id = $request->id;

        $req_img = $request->multi_image;

        if ($req_img) {
            $update_img = DB::table($this->db_about_multi_images)->where('id', $update_id)->first();
            $image = $update_img->multi_image;
            unlink($image);

            $name_gen = uniqid() . '.' . $req_img->getClientOriginalExtension();
            Image::make($req_img)->resize(124, 124)->save('backend/image/about/multi_image/' . $name_gen);
            $data['multi_image'] = 'backend/image/about/multi_image/' . $name_gen;
        }

        DB::table($this->db_about_multi_images)->where('id', $update_id)->update($data);
        $notification = array('message' => 'Update Image Successfully!', 'alert-type' => 'success');
        return redirect()->route('about_multi.image')->with($notification);
    }









    /**
     * Deletes a specific "About" multi-image record from the database and removes the associated image file from the server.
     *
     * @param  int  $id  The ID of the image record to be deleted.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function Image_Delete($id)
    {

        $delete_id = DB::table($this->db_about_multi_images)->where('id', $id)->first();
        $unlink_image = $delete_id->multi_image;
        unlink($unlink_image);

        DB::table($this->db_about_multi_images)->where('id', $id)->delete();

        $notification = array('message' => 'Delete Image Successfully!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}

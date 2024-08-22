@extends('backend.layouts.app')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        
       

            <div class="col-lg-12">
                <div class="card">
                    <header class="p-3">
                        <h2>
                            {{ __('Home Slider Input Data From') }}
                        </h2>
                
                        <p>
                            {{ __("Update your account's profile information and email address.") }}
                        </p>
                    </header><hr>
                    <div class="p-3">
                        <form method="POST" action="{{ route('home_slider.update') }}" enctype="multipart/form-data">
                            @csrf
                            
                            <input type="hidden" name="id" value="{{ $home_slider->id }}">
                            <!-- Title -->
                            <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Title<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input id="title" name="title" class="form-control" type="text" value="{{ $home_slider->title }}">
                                </div>
                            </div>

                            <!-- Short Title -->
                            <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Short Title </label>
                                <div class="col-sm-10">
                                    <input  id="short_title" name="short_title" class="form-control" type="text" value="{{ $home_slider->short_title }}">
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Video url</label>
                                <div class="col-sm-10">
                                    <input id="video_url" name="video_url" class="form-control" type="text" value="{{ $home_slider->video_url }}">
                                </div>
                            </div>

                            <!-- Home Slide Image -->
                            <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Slide Image<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input id="home_slide" name="home_slide" class="form-control" type="file">
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
                                <div class="col-sm-10">
                                    <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($home_slider->home_slide)) ? 
                                        url($home_slider->home_slide):url('image/No_Image_Available.jpg') }}" alt="Card image cap">
                                </div>
                            </div>

                            

                            <div class="form-group row mt-3 pt-1">
                                <div class="col-12">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">Update Slide</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

    </div>
</div>


@endsection
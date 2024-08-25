@extends('backend.layouts.app')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-muted font-size-18"><b>About Page</b></h4>
    
                        <div class="p-4">
                            <form method="POST" action="{{ route('update.about',$edit_about->id) }}" enctype="multipart/form-data">
                                @csrf
                                
                                <!-- Title -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input id="title" name="title" class="form-control" type="text" value="{{ $edit_about->title }}">
                                    </div>
                                </div>

                                <!-- Short Title -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Short Title</label>
                                    <div class="col-sm-10">
                                        <input id="short_title" name="short_title" class="form-control" type="text" value="{{ $edit_about->short_title }}">
                                    </div>
                                </div>

                                 <!-- Short Description -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Short Description</label>
                                    <div class="col-sm-10">
                                        <textarea id="short_Description" name="short_Description" class="form-control" rows="5">{{ $edit_about->short_Description }}</textarea>
                                    </div>
                                </div>



                                 <!-- Long Description -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Long Description</label>
                                    <div class="col-sm-10">
                                        <textarea id="elm1" name="logn_Description" class="form-control" rows="5">{{ $edit_about->logn_Description }}</textarea>
                                    </div>
                                </div>

                                <!-- About Image -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">About Image</label>
                                    <div class="col-sm-10">
                                        <input id="about_image" name="about_image" class="form-control" type="file">
                                    </div>
                                </div>

                                
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($edit_about->about_image)) ? 
                                            url($edit_about->about_image):url('image/No_Image_Available.jpg') }}" alt="Card image cap">
                                    </div>
                                </div>

    
                                <div class="form-group row mt-3 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Update About Page</button>
                                    </div>
                                </div>
    
                            </form>
                            <!-- end form -->
                        </div>
                    </div>
                    <!-- end cardbody -->
                </div>
            </div>

        </div>
    </div>


<script type="text/javascript">
    $(document).ready(function(){
        $('#about_image').change(function(e){
            var reader = new FileReader();
            reader.onload=function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection
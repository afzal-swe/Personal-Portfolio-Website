@extends('backend.layouts.app')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-muted font-size-18"><b>Create Services Page</b></h4>
    
                        <div class="p-4">
                            <form method="POST" action="{{ route('services.store') }}" enctype="multipart/form-data">
                                @csrf
                                
                                <!-- Title -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Title<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input id="title" name="title" class="form-control" type="text" value="{{ old('title') }}">
                                        @error('title')
                                            <samp class="text-danger">{{ $message }}</samp>
                                        @enderror
                                    </div>
                                </div>


                                 <!-- Short Description -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Short Description <span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <textarea name="short_description" class="form-control" rows="5" placeholder="Please Type Short Description"></textarea>
                                        @error('short_description')
                                            <samp class="text-danger">{{ $message }}</samp>
                                        @enderror
                                    </div>
                                </div>

                                 <!-- Short Description -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Long Description <span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <textarea id="elm1" name="logn_description" class="form-control" rows="5" placeholder="Please Type Long Description"></textarea>
                                        @error('logn_description')
                                            <samp class="text-danger">{{ $message }}</samp>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- About Image -->
                                        <div class="mb-4 row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Image<span class="text-danger">*</span></label>
                                            <div class="col-sm-10">
                                                <input id="image" name="image" class="form-control" type="file">
                                                @error('image')
                                                    <samp class="text-danger">{{ $message }}</samp>
                                                @enderror
                                            </div>
                                        </div>

                                        
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
                                            <div class="col-sm-10">
                                                <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($all_services->image)) ? 
                                                    url($all_services->image):url('image/No_Image_Available.jpg') }}" alt="Card image cap">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        
                                <!-- About Image -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Icon<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input id="icon" name="icon" class="form-control" type="file">
                                        @error('icon')
                                            <samp class="text-danger">{{ $message }}</samp>
                                        @enderror
                                    </div>
                                </div>

    
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-10">
                                        <img id="iconImage" class="rounded avatar-lg" src="{{ (!empty($all_services->icon)) ? 
                                            url($all_services->icon):url('image/No_Image_Available.jpg') }}" alt="Card image cap">
                                    </div>
                                </div>

                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    
                                    <div class="col-sm-10">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Status</label>
                                        <input type="checkbox" class="form-check-input" name="status" value="1" >
                                    </div>
                                </div>

                                <div class="form-group row mt-3 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Create A New Services</button>
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
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload=function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#icon').change(function(e){
            var reader = new FileReader();
            reader.onload=function(e){
                $('#iconImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection
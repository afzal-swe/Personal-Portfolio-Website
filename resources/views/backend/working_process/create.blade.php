@extends('backend.layouts.app')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        
       

            <div class="col-lg-12">
                <div class="card">
                    <header class="p-3">
                        <h2>
                            {{ __('Working Process Section') }}
                        </h2>
                
                        <p>
                            {{ __("Insert your Working Process information.") }}
                        </p>
                    </header><hr>
                    <div class="p-3">
                        <form method="POST" action="{{ route('working_process.store') }}" enctype="multipart/form-data">
                            @csrf
                            
                            <!-- Title -->
                            <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Working Process Name<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input id="name" name="title" class="form-control" type="text" placeholder="Working Process Name">
                                    @error('title')
                                        <samp class="text-danger">{{ $message }}</samp>
                                    @enderror
                                </div>
                            </div>
            
                            <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea id="elm1" name="description" class="form-control" rows="5" placeholder="Please Type This Description"></textarea>
                                </div>
                            </div>
            
                             <!-- About Image -->
                             <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">About Image</label>
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
                                    <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($working_process_view->image)) ? 
                                        url($working_process_view->image):url('image/No_Image_Available.jpg') }}" alt="Card image cap">
                                </div>
                            </div>
            
                            <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Status<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="checkbox" class="form-check-input" name="status" value="1" >
                                </div>
                            </div>
            
            
                            <div class="modal-footer">
                                
                                <button type="Submit" class="btn btn-primary">Submit</button>
                              </div>
                        </form>
                    </div>
                </div>
            </div>

    </div>
</div>



{{-- // Image View Script --}}
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


@endsection
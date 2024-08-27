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
                            {{ __("Update your Working Process information.") }}
                        </p>
                    </header><hr>
                    <div class="p-3">
                        <form method="POST" action="{{ route('working_process.update') }}" enctype="multipart/form-data">
                            @csrf
                            
                            <input type="hidden" name="id" value="{{ $edit_data->id }}">
                            <!-- Title -->
                            <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Working Process Name<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input  name="title" class="form-control" type="text" value="{{ $edit_data->title }}">
                                </div>
                            </div>
            
                            <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea id="elm1" name="description" class="form-control" rows="5">
                                        {!! $edit_data->description !!}
                                    </textarea>
                                </div>
                            </div>
            
                             <!-- About Image -->
                             <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">About Image</label>
                                <div class="col-sm-10">
                                    <input id="image" name="image" class="form-control" type="file">
                                </div>
                            </div>
            
                            
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
                                <div class="col-sm-10">
                                    <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($edit_data->image)) ? 
                                        url($edit_data->image):url('image/No_Image_Available.jpg') }}" alt="Card image cap">
                                </div>
                            </div>
            
                            <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Status<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="checkbox" class="form-check-input" name="status" value="1" @if ($edit_data->status=='1') checked @endif>
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
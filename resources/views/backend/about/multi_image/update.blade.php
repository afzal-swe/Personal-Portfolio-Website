@extends('backend.layouts.app')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-muted font-size-18"><b> Edit Image </b></h4>
    
                        <div class="p-4">
                            <form method="POST" action="{{ route('about_multi.update') }}" enctype="multipart/form-data">
                                @csrf
                                
                              <input type="hidden" name="id" value="{{ $edit_image->id }}">
                                <!-- About Image -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">About Image</label>
                                    <div class="col-sm-10">
                                        <input id="multi_image" name="multi_image" class="form-control" type="file">
                                    </div>
                                </div>

                                
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($edit_image->multi_image)) ? 
                                            url($edit_image->multi_image):url('image/No_Image_Available.jpg') }}" alt="Card image cap">
                                    </div>
                                </div>

    
                                <div class="form-group row mt-3 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Insert About Image</button>
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
        $('#multi_image').change(function(e){
            var reader = new FileReader();
            reader.onload=function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection
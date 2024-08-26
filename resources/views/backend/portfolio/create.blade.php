@extends('backend.layouts.app')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-muted font-size-18"><b> Create Project Portfolio Details </b></h4>
    
                        <div class="p-4">
                            <form method="POST" action="{{ route('project_portfolio.store') }}" enctype="multipart/form-data">
                                @csrf
                                
                              
                                <!-- About Image -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Porject Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="portfolio_name" class="form-control" placeholder="Porject Name" value="{{ old('portfolio_name') }}">

                                        @error('portfolio_name')
                                            <span class="text-danger">{{ $message }}</span>  
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Porject Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="portfolio_title" class="form-control" placeholder="Porject Title" value="{{ old('portfolio_title') }}">

                                        @error('portfolio_title')
                                            <span class="text-danger">{{ $message }}</span>  
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Website Link</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="website_link" class="form-control" value="{{ old('website_link') }}">   
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Porject Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="portfolio_description" class="form-control" rows="5"></textarea>
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Project type</label>
                                    <div class="col-sm-10">
                                        <select name="type" id="" class="form-control" >
                                            <option selected disabled>== Select Project type == </option>
                                            <option value="1">Website</option>
                                            <option value="2">Deshboard</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Project Status</label>
                                    <div class="col-sm-10">
                                        <select name="status" id="" class="form-control" >
                                            <option selected disabled>== Select Project Status == </option>
                                            <option value="1">Active</option>
                                            <option value="0">Deactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Project Image</label>
                                    <div class="col-sm-10">
                                        <input id="portfolio_image" name="portfolio_image" class="form-control" type="file">

                                        @error('portfolio_image')
                                            <span class="text-danger">{{ $message }}</span>  
                                        @enderror
                                    </div>
                                </div>

                                
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($project_portfolio->portfolio_image)) ? 
                                            url($project_portfolio->portfolio_image):url('image/No_Image_Available.jpg') }}" alt="Card image cap">
                                    </div>
                                </div>

    
                                <div class="form-group row mt-3 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Insert Project Data</button>
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
        $('#portfolio_image').change(function(e){
            var reader = new FileReader();
            reader.onload=function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection
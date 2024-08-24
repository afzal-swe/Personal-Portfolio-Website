@extends('backend.layouts.app')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.6.0/bootstrap-tagsinput.css">


<style type="text/css">
    .bootstrap-tagsinput .tag{
        margin-right: 2px;
        color:#b70000;
        font-weight: 700px;
    }
</style>



    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-muted font-size-18"><b> Create A New Blog </b></h4>
    
                        <div class="p-4">
                            <form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
                                @csrf
                                
                              
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Category Name <samp class="text-danger">*</samp></label>
                                    <div class="col-sm-10">
                                        <select name="blog_category_id" id="" class="form-control" >
                                            <option selected disabled>== Select Category Name == </option>
                                            @foreach ($blogs_category as $row)
                                                <option value="{{ $row->id }}">{{ $row->blog_category }}</option>
                                                
                                            @endforeach
                                            
                                        </select>
                                        @error('blog_category_id')
                                            <span class="text-danger">{{ $message }}</span>  
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog Title  <samp class="text-danger">*</samp></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="blog_title" class="form-control" placeholder="Blog Title" value="{{ old('blog_title') }}">

                                        @error('blog_title')
                                            <span class="text-danger">{{ $message }}</span>  
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog Tags  <samp class="text-danger">*</samp></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="blog_tags" class="form-control" placeholder="Tags" value="{{ old('blog_tags') }}" data-role="tagsinput"><br>

                                        @error('blog_tags')
                                            <span class="text-danger">{{ $message }}</span>  
                                        @enderror
                                    </div>
                                </div>

                              
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="blog_description" class="form-control" rows="5"></textarea>
                                    </div>
                                </div>

                               

                               

                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog Status</label>
                                    <div class="col-sm-10">
                                        <select name="status" id="" class="form-control" >
                                            <option selected disabled>== Select Blog Status == </option>
                                            <option value="1">Active</option>
                                            <option value="0">Deactive</option>
                                        </select>
                                    </div>
                                </div>
                            

                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog Image  <samp class="text-danger">*</samp></label>
                                    <div class="col-sm-10">
                                        <input id="blog_image" name="blog_image" class="form-control" type="file">

                                        @error('blog_image')
                                            <span class="text-danger">{{ $message }}</span>  
                                        @enderror
                                    </div>
                                </div>

                                
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($blogs->blog_image)) ? 
                                            url($blogs->blog_image):url('image/No_Image_Available.jpg') }}" alt="Card image cap">
                                    </div>
                                </div>

    
                                <div class="form-group row mt-3 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Create New Blog</button>
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

    {{-- Tags input --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.6.0/bootstrap-tagsinput.min.js" ></script>

    

<script type="text/javascript">
    $(document).ready(function(){
        $('#blog_image').change(function(e){
            var reader = new FileReader();
            reader.onload=function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection
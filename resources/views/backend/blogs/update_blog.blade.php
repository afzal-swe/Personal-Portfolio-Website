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
                        <h4 class="text-muted font-size-18"><b> Update Blog </b></h4>
    
                        <div class="p-4">
                            <form method="POST" action="{{ route('blog.update') }}" enctype="multipart/form-data">
                                @csrf
                                
                                <input type="hidden" name="id" value="{{ $blog_edit->id }}">
                              
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Category Name</label>
                                    <div class="col-sm-10">
                                        <select name="blog_category_id" id="" class="form-control" >
                                            @foreach ($blogs_category as $row)
                                                <option value="{{ $row->id }}" @if ($blog_edit->blog_category_id == $row->id) selected @endif>{{ $row->blog_category }}</option>    
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="blog_title" class="form-control" value="{{ $blog_edit->blog_title }}">
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog Tags</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="blog_tags" class="form-control" data-role="tagsinput" value="{{ $blog_edit->blog_tags }}"><br>
                                    </div>
                                </div>

                              
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="blog_description" class="form-control" rows="5">
                                            {!! $blog_edit->blog_description ?? "Null" !!}
                                        </textarea>
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog Status</label>
                                    <div class="col-sm-10">
                                        <select name="status" id="" class="form-control" >
                                            <option selected disabled>== Select Blog Status == </option>
                                            <option value="1" @if ($blog_edit->status == "1") selected @endif>Active</option>
                                            <option value="0" @if ($blog_edit->status == "0") selected @endif>Deactive</option>
                                        </select>
                                    </div>
                                </div>
                            

                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog Image</label>
                                    <div class="col-sm-10">
                                        <input id="blog_image" name="blog_image" class="form-control" type="file">
                                    </div>
                                </div>

                                
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($blog_edit->blog_image)) ? 
                                            url($blog_edit->blog_image):url('image/No_Image_Available.jpg') }}" alt="Card image cap">
                                    </div>
                                </div>

    
                                <div class="form-group row mt-3 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Update New Blog</button>
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
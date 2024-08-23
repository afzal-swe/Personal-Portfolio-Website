@extends('backend.layouts.app')
@section('content')




    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-muted font-size-18"><b>Blog Category Update</b></h4>
    
                        <div class="p-4">
                            <form method="POST" action="{{ route('blog_category.update') }}">
                                @csrf
                                
                                <input type="hidden" name="id" value="{{ $edit_blog_category->id }}">

                                <!-- Title -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category Name</label>
                                    <div class="col-sm-10">
                                        <input id="blog_category" name="blog_category" class="form-control" type="text" value="{{ $edit_blog_category->blog_category }}">

                                       
                                    </div>
                                </div>

    
                                <div class="form-group row mt-3 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Update Blog Category</button>
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


@endsection
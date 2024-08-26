@extends('backend.layouts.app')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-muted font-size-18"><b> Update Project Portfolio Details </b></h4>
    
                        <div class="p-4">
                            <form method="POST" action="{{ route('project_portfolio.update') }}" enctype="multipart/form-data">
                                @csrf
                                
                              <input type="hidden" name="id" value="{{ $project_edit->id }}">
                                <!-- About Image -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Porject Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="portfolio_name" class="form-control"  value="{{ $project_edit->portfolio_name ?? 'Null' }}">
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Porject Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="portfolio_title" class="form-control" value="{{ $project_edit->portfolio_title ?? 'Null' }}">
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Website Link</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="website_link" class="form-control" value="{{ $project_edit->website_link ?? 'Null' }}">   
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Porject Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="portfolio_description" class="form-control" rows="5">
                                            {!! $project_edit->portfolio_description ?? 'Null' !!}
                                        </textarea>
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Project Image</label>
                                    <div class="col-sm-10">
                                        <input id="portfolio_image" name="portfolio_image" class="form-control" type="file">
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Project type</label>
                                    <div class="col-sm-10">
                                        <select name="type" id="" class="form-control" >
                                            <option value="1" @if ($project_edit->type == "1") selected @endif>Website</option>
                                            <option value="2" @if ($project_edit->type == "2") selected @endif>Deshboard</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Project Status</label>
                                    <div class="col-sm-10">
                                        <select name="status" id="" class="form-control" >
                                            <option value="1" @if ($project_edit->status == "1") selected @endif>Active</option>
                                            <option value="0" @if ($project_edit->status == "0") selected @endif>Deactive</option>
                                        </select>
                                    </div>
                                </div>

                                
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($project_edit->portfolio_image)) ? 
                                            url($project_edit->portfolio_image):url('image/No_Image_Available.jpg') }}" alt="Card image cap">
                                    </div>
                                </div>

    
                                <div class="form-group row mt-3 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Update Project Data</button>
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
@extends('backend.layouts.app')
@section('content')



    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-muted font-size-18"><b>Partner Update Page</b></h4>
    
                        <div class="p-4">
                            <form method="POST" action="{{ route('partners.update') }}">
                                @csrf
                                
                                <input type="hidden" name="id" value="{{ $data->id }}">
                                <!-- Title -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input id="title" name="title" class="form-control" type="text" value="{{ $data->title }}">
                                    </div>
                                </div>

       
                                 <!-- Long Description -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea id="elm1" name="description" class="form-control" rows="5">
                                            {!! $data->description !!}
                                        </textarea>
                                    </div>
                                </div>

    
                                <div class="form-group row mt-3 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Update Partner</button>
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
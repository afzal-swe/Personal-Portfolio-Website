@extends('backend.layouts.app')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        
       

            <div class="col-lg-12">
                <div class="card">
                    <header class="p-3">
                        <h2>
                            {{ __('Feedback Update') }}
                        </h2>
                
                        <p>
                            {{ __("Update your Feedback information.") }}
                        </p>
                    </header><hr>
                    <div class="p-3">
                        <form method="POST" action="{{ route('feedback.update') }}">
                            @csrf
                            
                            <input type="hidden" name="id" value="{{ $edit->id }}">
                            <!-- Title -->
                            <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Feedback Title</label>
                                <div class="col-sm-10">
                                    <input id="title" name="title" class="form-control" type="text" value="{{ $edit->title }}">
                                </div>
                            </div>
                            
                            <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input id="name" name="name" class="form-control" type="text" value="{{ $edit->name }}">
                                </div>
                            </div>
            
                            <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Short Title</label>
                                <div class="col-sm-10">
                                    <input id="short_title" name="short_title" class="form-control" type="text" value="{{ $edit->short_title }}">
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


@endsection
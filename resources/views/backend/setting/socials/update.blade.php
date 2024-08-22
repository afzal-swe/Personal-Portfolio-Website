@extends('backend.layouts.app')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        
       

            <div class="col-lg-12">
                <div class="card">
                    <header class="p-3">
                        <h2>
                            {{ __('Socials Update Section') }}
                        </h2>
                
                        <p>
                            {{ __("Update your Socials information.") }}
                        </p>
                    </header><hr>
                    <div class="p-3">
                        <form method="POST" action="{{ route('socials.update') }}" >
                            @csrf
                            
                            <input type="hidden" name="id" value="{{ $socials->id }}">
                            <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Linkedin Link</label>
                                <div class="col-sm-10">
                                    <input name="linkedin" class="form-control" type="text" value="{{ $socials->linkedin ?? 'Null' }}">
                                </div>
                            </div>

                            
                            <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Facebook Link</label>
                                <div class="col-sm-10">
                                    <input  id="facebook" name="facebook" class="form-control" type="text" value="{{ $socials->facebook ?? 'Null'}}">
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Twitter Link</label>
                                <div class="col-sm-10">
                                    <input  id="twitter" name="twitter" class="form-control" type="text" value="{{ $socials->twitter ?? 'Null'}}">
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Instagram Link</label>
                                <div class="col-sm-10">
                                    <input  id="instagram" name="instagram" class="form-control" type="text" value="{{ $socials->instagram ?? 'Null'}}">
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Github Link</label>
                                <div class="col-sm-10">
                                    <input  id="github" name="github" class="form-control" type="text" value="{{ $socials->github ?? 'Null'}}">
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Youtube Link</label>
                                <div class="col-sm-10">
                                    <input  id="youtube" name="youtube" class="form-control" type="text" value="{{ $socials->youtube ?? 'Null'}}">
                                </div>
                            </div>
                            

                            <div class="form-group row mt-3 pt-1">
                                <div class="col-12">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">Update Socials Data</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

    </div>
</div>


@endsection
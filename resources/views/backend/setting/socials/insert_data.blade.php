@extends('backend.layouts.app')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        
       

            <div class="col-lg-12">
                <div class="card">
                    <header class="p-3">
                        <h2>
                            {{ __('Socials Section') }}
                        </h2>
                
                        <p>
                            {{ __("Insert your Socials information.") }}
                        </p>
                    </header><hr>
                    <div class="p-3">
                        <form method="POST" action="{{ route('socials.insert') }}" >
                            @csrf
                            
                            
                            <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Linkedin Link</label>
                                <div class="col-sm-10">
                                    <input name="linkedin" class="form-control" type="text" placeholder="linkedin link">
                                </div>
                            </div>

                            
                            <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Facebook Link</label>
                                <div class="col-sm-10">
                                    <input  id="facebook" name="facebook" class="form-control" type="text" placeholder="facebook link">
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Twitter Link</label>
                                <div class="col-sm-10">
                                    <input  id="twitter" name="twitter" class="form-control" type="text" placeholder="twitter link">
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Instagram Link</label>
                                <div class="col-sm-10">
                                    <input  id="instagram" name="instagram" class="form-control" type="text" placeholder="instagram link">
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Github Link</label>
                                <div class="col-sm-10">
                                    <input  id="github" name="github" class="form-control" type="text" placeholder="github link">
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Youtube Link</label>
                                <div class="col-sm-10">
                                    <input  id="youtube" name="youtube" class="form-control" type="text" placeholder="youtube link">
                                </div>
                            </div>
                            

                            <div class="form-group row mt-3 pt-1">
                                <div class="col-12">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">Insert Socials Data</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

    </div>
</div>


@endsection
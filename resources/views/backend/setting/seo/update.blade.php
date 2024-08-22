@extends('backend.layouts.app')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        
       

            <div class="col-lg-12">
                <div class="card">
                    <header class="p-3">
                        <h2>
                            {{ __('Seos Section') }}
                        </h2>
                
                        <p>
                            {{ __("Update your Seos information.") }}
                        </p>
                    </header><hr>
                    <div class="p-3">
                        <form method="POST" action="{{ route('seos.update') }}" >
                            @csrf
                            
                            <input type="hidden" name="id" value="{{ $seo->id }}">
                            <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Meta Author</label>
                                <div class="col-sm-10">
                                    <input name="meta_author" class="form-control" type="text" value="{{ $seo->meta_author ?? 'Null' }}">
                                </div>
                            </div>

                            
                            <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Meta Title</label>
                                <div class="col-sm-10">
                                    <input  id="meta_title" name="meta_title" class="form-control" type="text" value="{{ $seo->meta_title ?? 'Null' }}">
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Meta Keyword</label>
                                <div class="col-sm-10">
                                    <input  id="meta_keyword" name="meta_keyword" class="form-control" type="text" value="{{ $seo->meta_keyword ?? 'Null' }}">
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Meta Description</label>
                                <div class="col-sm-10">
                                    <input  id="meta_description" name="meta_description" class="form-control" type="text" value="{{ $seo->meta_description ?? 'Null' }}">
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Google Analytics</label>
                                <div class="col-sm-10">
                                    <input  id="google_analytics" name="google_analytics" class="form-control" type="text" value="{{ $seo->google_analytics ?? 'Null' }}">
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Google Verification</label>
                                <div class="col-sm-10">
                                    <input  id="google_verification" name="google_verification" class="form-control" type="text" value="{{ $seo->google_verification ?? 'Null' }}">
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Alexa Analytics</label>
                                <div class="col-sm-10">
                                    <input  id="alexa_analytics" name="alexa_analytics" class="form-control" type="text"  value="{{ $seo->alexa_analytics ?? 'Null' }}">
                                </div>
                            </div>
                            

                            <div class="form-group row mt-3 pt-1">
                                <div class="col-12">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">Update Seos Data</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

    </div>
</div>


@endsection
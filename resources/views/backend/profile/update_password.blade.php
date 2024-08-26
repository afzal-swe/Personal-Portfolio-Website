@extends('backend.layouts.app')
@section('content')

<div class="page-content">
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
                <header class="p-3">
                    <h2>
                        {{ __('Change Password Page') }}
                    </h2>
            
                    <p>
                        {{ __("Admin Change Password.") }}
                    </p>
                </header><hr>
                <div class="p-3">
                    <form method="POST" action="{{ route('password_update') }}" >
                        @csrf
                        
                        <div class="mb-4 row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Old Password <samp class="text-danger">*</samp></label>
                            <div class="col-sm-10">
                                <input name="old_password" class="form-control" type="password" placeholder="Old Password">
                                @error('old_password')
                                    <samp class="text-danger">{{ $message }}</samp>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">New Password <samp class="text-danger">*</samp></label>
                            <div class="col-sm-10">
                                <input name="new_password" class="form-control" type="password" placeholder="New Password">
                                @error('new_password')
                                    <samp class="text-danger">{{ $message }}</samp>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Confirm Password <samp class="text-danger">*</samp></label>
                            <div class="col-sm-10">
                                <input name="confirm_password" class="form-control" type="password" placeholder="Confirm Password">
                                @error('confirm_password')
                                    <samp class="text-danger">{{ $message }}</samp>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-3 pt-1">
                            <div class="col-12">
                                <button class="btn btn-primary waves-effect waves-light" type="submit">Update Password</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
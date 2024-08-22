@extends('backend.layouts.app')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-6">
                <div class="card"><br><br>
                    <center>
                        <img class="rounded-circle avatar-xl" src="{{ asset(Auth::user()->image ?? "backend/assets/images/small/img-5.jpg") }}" alt="Card image cap">
                    </center><hr>
                    <div class="card-body">
                        <h4 class="card-title text-info"> Name : {{ Auth::user()->name }}</h4><hr>
                        <h4 class="card-title text-info"> User Name : {{ Auth::user()->user_name ?? "Null" }}</h4><hr>
                        <h4 class="card-title text-info"> Email : {{ Auth::user()->email }}</h4><hr>
                        
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <header class="p-3">
                        <h2>
                            {{ __('Profile Information Update') }}
                        </h2>
                
                        <p>
                            {{ __("Update your account's profile information and email address.") }}
                        </p>
                    </header><hr>
                    <div class="p-3">
                        <form class="needs-validation" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                           
                            <input type="hidden" name="id" value="{{ $admin_data->id }}">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="validationCustom01" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ $admin_data->name ?? ""}}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="validationCustom01" class="form-label">User Name</label>
                                        <input type="text" class="form-control" name="user_name" value="{{ $admin_data->user_name ?? "" }}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="validationCustom01" class="form-label">E-mail</label>
                                        <input type="email" class="form-control" name="email" value="{{ $admin_data->email ?? ""}}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="validationCustom01" class="form-label">Profile Image</label>
                                        <input type="file" class="form-control" name="image" >
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($admin_data->image)) ? 
                                            url($admin_data->image):url('image/No_Image_Available.jpg') }}" alt="Card image cap">
                                    </div>
                                </div><hr>


                            <div>
                                <button class="btn btn-primary" type="submit">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        
    
        </div> 
    </div>
</div>


@endsection
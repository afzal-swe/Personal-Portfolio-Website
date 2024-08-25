
@extends('backend.layouts.app')
@section('content')


@php
    $user = DB::table('users')->get();
    $project_portfolio = DB::table('project_portfolio')->get();
    $blog_category = DB::table('blog_categories')->get();
    $blog = DB::table('blogs')->get();
@endphp

<div class="page-content">
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Dashboard</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);"></a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">Users</p>
                                <h4 class="mb-2 text-info">{{ count($user) }}</h4>
                                <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"></p>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-primary rounded-3">
                                    <i class="ri-user-3-line font-size-24"></i>  
                                </span>
                            </div>
                        </div>                                              
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">Total Project Portfolio</p>
                                <h4 class="mb-2 text-info">{{ count($project_portfolio) }}</h4>
                                <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"></p>
                            </div>
                        </div>                                            
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">Blog Category</p>
                                <h4 class="mb-2 text-info">{{ count($blog_category) }}</h4>
                                <p class="text-muted mb-0"><span class="text-danger fw-bold font-size-12 me-2"></p>
                            </div>
                        </div>                                              
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->
            
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">Blogs</p>
                                <h4 class="mb-2 text-info">{{ count($blog) }}</h4>
                                <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"></p>
                            </div>
                        </div>                                              
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div><!-- end row -->

      
    </div> 
</div>

@endsection
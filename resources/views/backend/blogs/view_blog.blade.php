@extends('backend.layouts.app')
@section('content')


<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                      <div>
                        <h4 class="card-title">View All Blogs</h4>
                       
                        
                      </div>
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Blog Category</th>
                                <th>Blog Image</th>
                                <th>Blog Title</th>
                                <th>Blog Tags</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach ($blogs as $key=>$row)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{ $row->blog_category ?? 'Null' }}</td>
                                    <td><img src="{{ asset($row->blog_image) }}" style="width: 40px; height:40px"></td>
                                    <td>{{ Str::of($row->blog_title ?? 'Null' )->limit(25)}}</td>
                                    <td>{{ Str::of($row->blog_tags ?? 'Null')->limit(25) }}</td>
                                    <td>
                                        @if ($row->status == '1')
                                            <span class="text-success">Active</span>
                                        @else
                                            <span class="text-info">Deactive</span>
                                        @endif
                                    </td>
                                    
                                    <td>
                                        <a href="{{ route('blog.edit',$row->id) }}" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('blog.delete',$row->id) }}" id="delete" class="btn btn-danger sm" title="Delete Data"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
</div>
</div>






@endsection
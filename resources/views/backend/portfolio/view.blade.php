@extends('backend.layouts.app')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                      <div>
                        <h4 class="card-title">All Project Portfolio</h4>
                       
                        <a href="{{ route('project_portfolio.create') }}" class="btn btn-info btn-sm" style="float: right"> + Add Project Portfolio</a>
                      </div>
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Title</th>
                                {{-- <th>Description</th> --}}
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach ($all_project_portfolio as $key=>$row)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td><img src="{{ asset($row->portfolio_image) }}" style="width: 150px; height:80px"></td>
                                    <td>{{ $row->portfolio_name }}</td>
                                    <td>{{ $row->portfolio_title }}</td>
                                    <td>
                                        <a href="{{ route('project_portfolio.edit',$row->id) }}" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('project_portfolio.delete',$row->id) }}" id="delete" class="btn btn-danger sm" title="Delete Data"><i class="fas fa-trash-alt"></i></a>
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
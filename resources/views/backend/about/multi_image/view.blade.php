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
                        <h4 class="card-title">All About Images</h4>
                       
                        <a href="{{ route('about_multi.store') }}" class="btn btn-info btn-sm" style="float: right"> + Add Image</a>
                      </div>
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Images</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach ($image as $key=>$row)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td><img src="{{ asset($row->multi_image) }}" style="width: 40px; height:40px"></td>
                                    <td>
                                        <a href="{{ route('about_multi.edit',$row->id) }}" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('about_multi.delete',$row->id) }}" id="delete" class="btn btn-danger sm" title="Delete Data"><i class="fas fa-trash-alt"></i></a>
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
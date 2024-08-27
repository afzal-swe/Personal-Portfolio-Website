@extends('backend.layouts.app')
@section('content')


<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                      <div>
                        <h4 class="card-title">View All Services</h4>
                       
                        
                      </div>
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Icon</th>
                                <th>Image</th>
                                <th>title</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach ($all_services as $key=>$row)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td><img src="{{ asset($row->icon) }}" style="width: 40px; height:40px"></td>
                                    <td><img src="{{ asset($row->image) }}" style="width: 40px; height:40px"></td>
                                    <td>{{ $row->title }}</td>
                                    <td>
                                        @if ($row->status == '1')
                                            <a href="{{ route('services.status',$row->id) }}" class="btn btn bg-success text-white">Active</a>
                                        @else
                                            <a href="{{ route('services.status',$row->id) }}" class="btn btn bg-primary text-white">Deactive</a>
                                        @endif
                                    </td>
                                   
                                    <td>
                                        <a href="#" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('services.delete',$row->id) }}" id="delete" class="btn btn-danger sm" title="Delete Data"><i class="fas fa-trash-alt"></i></a>
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
@extends('backend.layouts.app')
@section('content')


<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                      <div>
                        <h4 class="card-title">View All Messages</h4>
                       
                        
                      </div>
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Phone</th>
                                <th>Subject</th>
                                <th>Details</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach ($all_message as $key=>$row)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{ $row->name ?? 'Null' }}</td>
                                    <td>{{ $row->email ?? 'Null' }}</td>
                                    <td>{{ $row->phone ?? 'Null' }}</td>
                                    <td>{{ $row->subject ?? 'Null' }}</td>
                                    <td>{{ Str::of($row->message ?? 'Null')->limit(30) }}</td>
                                   
                                    <td>
                                        <a href="{{ route('message.delete',$row->id) }}" id="delete" class="btn btn-danger sm" title="Delete Data"><i class="fas fa-trash-alt"></i></a>
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
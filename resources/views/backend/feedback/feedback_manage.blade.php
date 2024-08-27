@extends('backend.layouts.app')
@section('content')

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">


<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                      <div>
                        <h4 class="card-title">View All Feedback</h4>
                        <div class="col-sm-6">
                            <ol class="breadcrumb">
                              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ProgressModal" style="float: right"> + Add New Feedback</button>
                            </ol>
                          </div><!-- /.col -->
                        
                      </div>
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Title</th>
                                <th>Short Title</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach ($feedback_data as $key=>$row)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{ $row->name ?? 'Null' }}</td>
                                    <td>{{ $row->title }}</td>
                                    <td>{{ Str::of($row->short_title)->limit(30) }}</td>
                                   
                                    <td>
                                        <a href="{{ route('feedback.edit',$row->id) }}" class="btn btn-info sm edit" title="Edit Data"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('feedback.delete',$row->id) }}" id="delete" class="btn btn-danger sm" title="Delete Data"><i class="fas fa-trash-alt"></i></a>
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



  
  <!-- Start Add Modal -->
  <div class="modal fade" id="ProgressModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Add New Feedback</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('feedback.store') }}">
                @csrf
                
                <!-- Title -->
                <div class="mb-4 row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Feedback Title<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input id="title" name="title" class="form-control" type="text" placeholder="Feedback Title">
                        @error('title')
                            <samp class="text-danger">{{ $message }}</samp>
                        @enderror
                    </div>
                </div>
                
                <div class="mb-4 row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input id="name" name="name" class="form-control" type="text" placeholder="Name">
                    </div>
                </div>

                <div class="mb-4 row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Short Title</label>
                    <div class="col-sm-10">
                        <input id="short_title" name="short_title" class="form-control" type="text" placeholder="Short Title">
                    </div>
                </div>

             
               

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="Submit" class="btn btn-primary">Submit</button>
                  </div>
            </form>
        </div>
       
      </div>
    </div>
  </div>
   <!-- End Add Modal -->


  

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


<script type="text/javascript">
	$('body').on('click','.edit', function(){
		let progress_id=$(this).data('id');
		$.get("progress/edit/"+progress_id, function(data){
			 $("#modal_body").html(data);
		});
	});

</script>


@endsection
<form method="POST" action="#">
    @csrf
    
    <!-- Title -->
    <div class="mb-4 row">
        <label for="example-text-input" class="col-sm-4 col-form-label">Skill Name<span class="text-danger">*</span></label>
        <div class="col-sm-8">
            <input id="name" name="name" class="form-control" type="text" value="{{ $edit->name }}">
            @error('name')
                <samp class="text-danger">{{ $message }}</samp>
            @enderror
        </div>
    </div>

    <div class="mb-4 row">
        <label for="example-text-input" class="col-sm-4 col-form-label">Percentage(%)<span class="text-danger">*</span></label>
        <div class="col-sm-8">
            <input id="percentage" name="percentage" class="form-control" type="text" placeholder="80 %">
        </div>
    </div>

    <div class="mb-4 row">
        <label for="example-text-input" class="col-sm-4 col-form-label">Status<span class="text-danger">*</span></label>
        <div class="col-sm-8">
            <input type="checkbox" class="form-check-input" name="status" value="1" >
        </div>
    </div>


    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="Submit" class="btn btn-primary">Update Progress</button>
      </div>
</form>
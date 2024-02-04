<form action="{{ route('designation.update') }}" method="Post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="designation_name">Designation Name</label>
      <input type="text" class="form-control" id="designation_name" name="designation_name" value="{{ $data->designation_name }}" required="">
      <small id="emailHelp" class="form-text text-muted">This is your main Designation</small>
    </div> 
    <input type="hidden" name="id" value="{{ $data->id }}">
   
    <div class="form-group">
      <label for="status">Status</label>
     <select class="form-control" name="status">
       <option value="1" @if($data->status==1) selected @endif>Yes</option>
       <option value="0" @if($data->status==0) selected @endif>No</option>
     </select>
      <small id="emailHelp" class="form-text text-muted">If yes it will be show on your home page</small>
    </div>    

<div class="modal-footer">
  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
  <button type="Submit" class="btn btn-primary">Update</button>
</div>
</form>
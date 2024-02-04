<form action="{{ route('location.update') }}" method="Post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="location_name">Location Name</label>
      <input type="text" class="form-control" id="category_name" name="location_name" value="{{ $data->location_name }}" required="">
      <small id="emailHelp" class="form-text text-muted">This is your main location</small>
    </div> 
    <input type="hidden" name="id" value="{{ $data->id }}">
   
    <div class="form-group">
      <label for="location_name">Status</label>
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
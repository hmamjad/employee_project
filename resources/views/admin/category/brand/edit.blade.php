<form action="{{ route('brand.update') }}" method="post" id="add-form" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
        {{-- Brand   --}}
        <div class="form-group">
            <label for="brand_name">Brand Name</label>
            <input type="text" class="form-control" id="brand_name" name="brand_name" required="" value="{{$data->brand_name}}">
            <small id="emailHelp" class="form-text text-muted">This is your Brand</small>
            <input type="hidden" name="id" value="{{$data->id}}">
        </div>

        <div class="form-group">
            <label for="input-file-now">Brand Logo</label>
            <input type="file" class="form-control dropify" data-height='140' id="input-file-now"
                name="brand_logo">
            <input type="hidden" name="old_logo" value="{{$data->brand_logo}}">    
            <small id="emailHelp" class="form-text text-muted">This is your Brand logo</small>
        </div>

        <div class="form-group">
            <label for="front_page">Home Page</label>
            <select name="front_page" id="front_page" class="form-control">
                <option value="1" @if($data->front_page==1) selected="" @endif>Yes</option>
                <option value="0" @if($data->front_page==0) selected="" @endif>No</option>
            </select>
            <small id="emailHelp" class="form-text text-muted">If Yes,it will be show on your Home page</small>
        </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"> <span class="d-none">loading.........</span>
            Update</button>
    </div>
</form>

<form action="{{ route('subcategory.update')}}" method="post">
    @csrf
    <div class="modal-body">
          {{-- Category --}}
          <div class="form-group">
            <label for="category_name">Category Name</label>
            <select class="form-control" name="category_id" id="">

                @foreach ($category as $row)
                    <option value="{{ $row->id }}" @if ($row->id == $data->category_id) selected=""
                        
                    @endif>{{ $row->category_name }}</option>
                @endforeach

            </select>
            <input type="hidden" id="subcategory_id" name="id" value="{{ $data->id }}">
        </div>
        {{-- Subcategory --}}
        <div class="form-group">
            <label for="subcategory_name">Category Name</label>
            <input type="text" class="form-control" id="subcategory_name" name="subcategory_name"
                required="" value="{{ $data->subcategory_name }}">

            <small id="emailHelp" class="form-text text-muted">This is your main category</small>
        </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
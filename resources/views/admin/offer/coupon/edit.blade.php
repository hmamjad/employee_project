<form action="{{route('update.coupon')}}" method="post" id="edit_form">
    @csrf
    <div class="modal-body">

        {{-- Coupon code  --}}
        <div class="form-group">
            <label for="coupon_code">Coupon code</label>
            <input type="text" class="form-control" id="coupon_code" name="coupon_code" required="" value="{{$data->coupon_code}}">
        </div>

        <input type="hidden" name="id" value="{{$data->id}}">

        <div class="form-group">
            <label for="type">Coupon Type</label>
            <select class="form-control" name="type" id="type" required="">
                <option value="1" {{ ($data->type == 1) ? "selected" : "" }}>Fixed</option>
                <option value="2" {{ ($data->type == 2) ? "selected" : "" }}>Percentage</option>
            </select>
        </div>

        <div class="form-group">
            <label for="coupon_amount">Coupon Amount</label>
            <input type="text" class="form-control" id="coupon_amount" name="coupon_amount"
                required=""  value="{{$data->coupon_amount}}">
        </div>

        <div class="form-group">
            <label for="valid_date">Valid Date</label>
            <input type="date" class="form-control" id="valid_date" name="valid_date" required="" value="{{$data->valid_date}}">
        </div>

        <div class="form-group">
            <label for="status">Coupon Status</label>
            <select class="form-control" name="status" id="status" required="">
                <option value="Active" {{ ($data->status == "Active") ? "selected" : "" }}>Active</option>
                <option value="Inactive" {{ ($data->status == "Inactive") ? "selected" : "" }}>Inactive</option>
            </select>
        </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"> <span class="loading d-none">Loging.....</span>
            Update</button>
    </div>
</form>


<script>
    //Update coupon ajax call
    $('#edit_form').submit(function(e) {
            e.preventDefault();
            $(".loading").removeClass('d-none');
            var url = $(this).attr('action');
            var request = $(this).serialize();
            $.ajax({
                url: url,
                type: 'post',
                async: false,
                data: request,
                success: function(data) {
                    $(".loading").addClass('d-none');
                    toastr.success(data);
                    $("#editModal").modal('hide');
                    $('#edit_form')[0].reset();
                    table.ajax.reload();
                }
            });
        });
</script>
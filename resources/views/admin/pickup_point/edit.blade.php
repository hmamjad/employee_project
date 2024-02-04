<form action="{{route('pickup.point.update')}}" method="post" id="edit_form">
    @csrf
    <div class="modal-body">

        {{-- Coupon code  --}}
        <div class="form-group">
            <label for="pickup_point_name">Pickup Point Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="pickup_point_name" name="pickup_point_name" required="" value="{{$data->pickup_point_name}}">
        </div>

        <input type="hidden" name="id" value="{{$data->id}}">

        <div class="form-group">
            <label for="pickup_point_adddress">Pickup Point Address <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="pickup_point_adddress" name="pickup_point_adddress"
                required=""  value="{{$data->pickup_point_adddress}}">
        </div>

        <div class="form-group">
            <label for="pickup_point_phone">Pickup Point phone <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="pickup_point_phone" name="pickup_point_phone" required="" value="{{$data->pickup_point_phone}}">
        </div>

        <div class="form-group">
            <label for="pickup_point_phone_two">Pickup Point Another Phone</label>
            <input type="text" class="form-control" id="pickup_point_phone_two" name="pickup_point_phone_two"  value="{{$data->pickup_point_phone_two}}">
        </div>

       
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"> <span class="loading d-none">Loging.....</span>
            Update</button>
    </div>
</form>



    {{-- Update coupon ajax call --}}
    <script>
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


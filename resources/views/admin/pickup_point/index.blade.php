@extends('layouts.admin')

@section('admin_content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Pickup Point</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">+ Add
                                new</button>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- Content Header End-->


        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Pickup Point list here</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-striped table-sm ytable">
                                    <thead>
                                        <tr>
                                            <th>#SL</th>
                                            <th>Pickup Point</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Another Phone</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- yajra Datatable --}}
                                    </tbody>

                                </table>

                                <form action="" id="deleted_form" method="delete">
                                    @csrf @method('DELETE')
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>


    <!-- Main content -->


    <!-- coupon insert Modal  -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new Pickup Point</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('store.pickup.point') }}" method="post" id="add_form">
                    @csrf
                    <div class="modal-body">

                        {{-- Coupon code  --}}
                        <div class="form-group">
                            <label for="pickup_point_name">Pickup Point Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="pickup_point_name" name="pickup_point_name"
                                required="">
                        </div>



                        <div class="form-group">
                            <label for="pickup_point_adddress">Pickup Point Address <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="pickup_point_adddress"
                                name="pickup_point_adddress" required="">
                        </div>

                        <div class="form-group">
                            <label for="pickup_point_phone">Pickup Point phone <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="pickup_point_phone" name="pickup_point_phone"
                                required="">
                        </div>

                        <div class="form-group">
                            <label for="pickup_point_phone_two">Pickup Point Another Phone</label>
                            <input type="text" class="form-control" id="pickup_point_phone_two"
                                name="pickup_point_phone_two">
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"> <span class="loading d-none">Loging.....</span>
                            Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Edit Modal --}}
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Pickup Point</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div id="modal_body">

                </div>

            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    {{-- yajra datatable --}}
    <script type="text/javascript">
        $(function Pickuppoint() {
            table = $('.ytable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('pickuppoint.index') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'pickup_point_name',
                        name: 'pickup_point_name'
                    },
                    {
                        data: 'pickup_point_adddress',
                        name: 'pickup_point_adddress'
                    },
                    {
                        data: 'pickup_point_phone',
                        name: 'pickup_point_phone'
                    },
                    {
                        data: 'pickup_point_phone_two',
                        name: 'pickup_point_phone_two'
                    },

                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            })
        })
    </script>



    <script>
        //store Pickup point ajax call
        $('#add_form').submit(function(e) {
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
                    $("#addModal").modal('hide');
                    $('#add_form')[0].reset();
                    table.ajax.reload();
                }
            });
        });
    </script>



    {{-- for Edit  Pickup Point --}}
    <script type="text/javascript">
        $('body').on('click', '.edit', function() {
            let id = $(this).data('id');

            $.get("pickup-point/edit/" + id, function(data) {
                // console.log(data);
                $("#modal_body").html(data);

            });

        });
    </script>



    {{-- sweet alert for delete ajax call --}}
    <script>
        $(document).ready(function() {

            $(document).on('click', '#delete_pickuppoint', function(e) {
                e.preventDefault();
                var url = $(this).attr('href'); // route('pickup.point.delete', [$row->id])

                $("#deleted_form").attr('action', url); // url = route('pickup.point.delete', [$row->id])

                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this imaginary file!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $("#deleted_form").submit();
                        } else {
                            swal("Your imaginary file is safe!");
                        }
                    });
            });

            //data passed through here
            $('#deleted_form').submit(function(e) {
                e.preventDefault();
                var url = $(this).attr('action');
                var request = $(this).serialize();
                $.ajax({
                    url: url,
                    type: 'post',
                    async: false,
                    data: request,
                    success: function(data) {
                        toastr.success(data);
                        $('#deleted_form')[0].reset();
                        table.ajax.reload();
                    }
                });
            });

        })
    </script>
@endsection
<!-- /.content-header -->

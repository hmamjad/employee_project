@extends('layouts.admin')

@section('admin_content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Product</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a href="{{ route('product.create') }}" class="btn btn-primary">+ Add
                                new</a>
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
                                <h3 class="card-title">All Product list Here</h3>
                            </div><br>

                            {{-- Filtering --}}
                            <div class="row p-2">
                                {{-- category --}}
                                <div class="form-group col-3">
                                    <label for="">Category</label>
                                    <select name="category_id" id="category_id" class="form-control submitable">
                                        <option value="">All</option>
                                        @foreach ($category as $row)
                                            <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- brand --}}
                                <div class="form-group col-3">
                                    <label for="">Brand</label>
                                    <select name="brand_id" id="brand_id" class="form-control submitable">
                                        <option value="">All</option>
                                        @foreach ($brand as $row)
                                            <option value="{{ $row->id }}">{{ $row->brand_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- Warehouse --}}
                                <div class="form-group col-3">
                                    <label for="">Warehouse</label>
                                    <select name="warehouse_id" id="warehouse_id" class="form-control submitable">
                                        <option value="">All</option>
                                        @foreach ($warehouse as $row)
                                            <option value="{{ $row->id }}">{{ $row->warehouse_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- Status static data --}}
                                <div class="form-group col-3">
                                    <label for="">Status</label>
                                    <select name="status" id="status" class="form-control submitable">
                                        <option value="2">All</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>

                            </div>



                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="" class="table table-bordered table-striped table-sm ytable">
                                    <thead>
                                        <tr>
                                            <th>#SL</th>
                                            <th>Thumbnail</th>
                                            <th>Name</th>
                                            <th>Code</th>
                                            <th>Category</th>
                                            <th>subcategory</th>
                                            <th>Brand</th>
                                            <th>Featured</th>
                                            <th>Today Deal</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        {{-- yajra table --}}

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






    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    {{-- yajra datatable --}}
    <script type="text/javascript">
        $(function product() {
            table = $('.ytable').DataTable({
                "processing": true,
                "serverSide": true,
                "searching": true,
                "ajax": {
                    "url": "{{ route('product.index') }}",
                    "data": function(e) {
                        e.category_id = $("#category_id").val();
                        e.brand_id = $("#brand_id").val();
                        e.status = $("#status").val();
                        e.warehouse_id = $("#warehouse_id").val();
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'thumbnail',
                        name: 'thumbnail'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'code',
                        name: 'code'
                    },
                    {
                        data: 'category_name',
                        name: 'category_name'
                    },
                    {
                        data: 'subcategory_name',
                        name: 'subcategory_name'
                    },
                    {
                        data: 'brand_name',
                        name: 'brand_name'
                    },
                    {
                        data: 'featured',
                        name: 'featured'
                    },
                    {
                        data: 'today_deal',
                        name: 'today_deal'
                    },
                    {
                        data: 'status',
                        name: 'status'
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

    {{-- Active  to  Deactive featured --}}
    <script type="text/javascript">
        $('body').on('click', '.deactive_featured', function() {
            let id = $(this).data('id');
            var url = "{{ url('product/not-featured') }}/" + id;
            $.ajax({
                url: url,
                type: 'get',
                success: function(data) {
                    toastr.warning(data);
                    table.ajax.reload();
                }
            });

        });
    </script>

    {{-- Deactive to Active featured --}}
    <script type="text/javascript">
        $('body').on('click', '.active_featured', function() {
            let id = $(this).data('id');
            var url = "{{ url('product/active-featured') }}/" + id;
            $.ajax({
                url: url,
                type: 'get',
                success: function(data) {
                    toastr.success(data);
                    table.ajax.reload();
                }
            });

        });
    </script>

    {{-- Active  to  Deactive 	today_deal --}}
    <script type="text/javascript">
        $('body').on('click', '.deactive_deal', function() {
            let id = $(this).data('id');
            var url = "{{ url('product/not-deal') }}/" + id;
            $.ajax({
                url: url,
                type: 'get',
                success: function(data) {
                    toastr.warning(data);
                    table.ajax.reload();
                }
            });

        });
    </script>

    {{-- Deactive to Active today_deal --}}
    <script type="text/javascript">
        $('body').on('click', '.active_deal', function() {
            let id = $(this).data('id');
            var url = "{{ url('product/active-deal') }}/" + id;
            $.ajax({
                url: url,
                type: 'get',
                success: function(data) {
                    toastr.success(data);
                    table.ajax.reload();
                }
            });

        });
    </script>


    {{-- Active  to  Deactive 	status --}}
    <script type="text/javascript">
        $('body').on('click', '.deactive_status', function() {
            let id = $(this).data('id');
            var url = "{{ url('product/not-status') }}/" + id;
            $.ajax({
                url: url,
                type: 'get',
                success: function(data) {
                    toastr.warning(data);
                    table.ajax.reload();
                }
            });

        });
    </script>

    {{-- Deactive to Active status --}}
    <script type="text/javascript">
        $('body').on('click', '.active_status', function() {
            let id = $(this).data('id');
            var url = "{{ url('product/active-status') }}/" + id;
            $.ajax({
                url: url,
                type: 'get',
                success: function(data) {
                    toastr.success(data);
                    table.ajax.reload();
                }
            });

        });
    </script>


    {{-- sweet alert for delete ajax call --}}
    <script>
        $(document).ready(function() {

            $(document).on('click', '#delete_product', function(e) {
                e.preventDefault();
                var url = $(this).attr('href'); // route('coupon.delete', [$row->id])

                $("#deleted_form").attr('action', url); // url = route('coupon.delete', [$row->id])

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

    {{-- submitable class call for every change filtering --}}
    <script>
        $(document).on('change', '.submitable', function() {
            $('.ytable').DataTable().ajax.reload();
        })
    </script>
@endsection
<!-- /.content-header -->

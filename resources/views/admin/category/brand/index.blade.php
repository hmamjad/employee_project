@extends('layouts.admin')

@section('admin_content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" />
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Brand</h1>
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
                                <h3 class="card-title">All Brand list Here</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="" class="table table-bordered table-striped table-sm ytable">
                                    <thead>
                                        <tr>
                                            <th>#SL</th>
                                            <th>Brand Name</th>
                                            <th>Brand Slug</th>
                                            <th>Brand Logo</th>
                                            <th>Home Page</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        {{-- yajra table --}}

                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>


    <!-- Main content -->


    <!-- Brand insert Modal  -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new Brand</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('brand.store') }}" method="post" id="add-form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        {{-- Brand   --}}
                        <div class="form-group">
                            <label for="brand_name">Brand Name</label>
                            <input type="text" class="form-control" id="brand_name" name="brand_name" required="">
                            <small id="emailHelp" class="form-text text-muted">This is your Brand</small>
                        </div>

                        <div class="form-group">
                            <label for="input-file-now">Brand Logo</label>
                            <input type="file" class="form-control dropify" data-height='140' id="input-file-now"
                                name="brand_logo" required="">
                            <small id="emailHelp" class="form-text text-muted">This is your Brand logo</small>
                        </div>

                        <div class="form-group">
                            <label for="front_page">Home Page</label>
                            <select name="front_page" id="front_page" class="form-control">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                            <small id="emailHelp" class="form-text text-muted">If Yes,it will be show on your Home page</small>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"> <span class="d-none">loading.........</span>
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Brand</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div id="modal_body">
                    {{--  edit part here  --}}
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    {{-- for image drag and drop dropify --}}
    <script>
        $('.dropify').dropify();
    </script>
    {{-- yajra datatable --}}
    <script type="text/javascript">
        $(function childcategory() {
            var table = $('.ytable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('brand.index') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'brand_name',
                        name: 'brand_name'
                    },
                    {
                        data: 'brand_slug',
                        name: 'brand_slug'
                    },
                    {
                        data: 'brand_logo',
                        name: 'brand_logo',
                        render: function(data, type, full, meta) {
                            return "<img src=\"" + data + "\" height = \"30\" />";
                        }
                    },
                    {
                        data: 'front_page',
                        name: 'front_page'
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

    {{-- for Edit --}}
<script type="text/javascript">
    
    $('body').on('click', '.edit', function() {
        let brand_id = $(this).data('id');
       
        $.get("brand/edit/" + brand_id, function(data) {
            // console.log(data);
            $("#modal_body").html(data);
            
        });

    });

</script>

@endsection
<!-- /.content-header -->

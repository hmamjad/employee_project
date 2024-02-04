@extends('layouts.admin')

@section('admin_content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" />
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Campaign</h1>
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
                                <h3 class="card-title">All Campaign list Here</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="" class="table table-bordered table-striped table-sm ytable">
                                    <thead>
                                        <tr>
                                            <th>Start Date</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Discount(%)</th>
                                            <th>Status</th>
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new Campaign</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('campaign.store') }}" method="post" id="add-form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        {{-- Campaign   --}}
                        <div class="form-group">
                            <label for="title">Campaign Title <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" id="title" name="title" required="">
                            <small id="emailHelp" class="form-text text-muted">This is Campaign Title/Name</small>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="start_date">Start Date<span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="start_date" name="start_date" required="">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="end_date">End Date<span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="end_date" name="end_date" required="">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="status">Status<span class="text-danger">*</span></label>
                                <select  class="form-control" id="status" name="status" required="">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="discount">Discount(%)<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="discount" name="discount" required="">
                                    <small id="emailHelp" class="form-text text-danger">Discount percentage are apply for all procuct selling price</small>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="input-file-now">Image<span class="text-danger">*</span></label>
                            <input type="file" class="form-control dropify" data-height='140' id="input-file-now"
                                name="image" required="">
                            <small id="emailHelp" class="form-text text-muted">This is your Campaign Image</small>
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Campaign</h5>
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
        $(function campaign() {
            var table = $('.ytable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('campaign.index') }}',
                columns: [
                    {
                        data: 'start_date',
                        name: 'start_date'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'image',
                        name: 'image',
                        render: function(data, type, full, meta) {
                            return "<img src=\"" + data + "\" height = \"30\" />";
                        }
                    },
                    {
                        data: 'discount',
                        name: 'discount'
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

    {{-- for Edit --}}
<script type="text/javascript">
    
    $('body').on('click', '.edit', function() {
        let id = $(this).data('id');
       
        $.get("campaign/edit/" + id, function(data) {
            // console.log(data);
            $("#modal_body").html(data);
            
        });

    });

</script>

@endsection
<!-- /.content-header -->

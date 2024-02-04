@extends('layouts.admin')

@section('admin_content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Child-Category</h1>
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
                                <h3 class="card-title">All Child-Category list here</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="" class="table table-bordered table-striped table-sm ytable">
                                    <thead>
                                        <tr>
                                            <th>#SL</th>
                                            <th>Child-Category Name</th>
                                            <th>Sub-Category Name</th>
                                            <th>Category Name</th>
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


    <!-- Subcategory insert Modal  -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new Child-Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('childcategory.store') }}" method="post" id="add-form">
                    @csrf
                    <div class="modal-body">
                        {{-- Category select --}}
                        <div class="form-group">
                            <label for="category_name">Category/Subcategory </label>
                            <select class="form-control" name="subcategory_id" id="">

                                @foreach ($category as $row)

                                    @php
                                        $subcat = DB::table('subcategories')
                                            ->where('category_id', $row->id)
                                            ->get();
                                    @endphp

                                    <option disabled style="color:blue">{{ $row->category_name }}</option>
                                
                                    @foreach ($subcat as $row)
                                        <option value="{{ $row->id }}">----{{ $row->subcategory_name }}</option>
                                    @endforeach

                                @endforeach

                            </select>
                        </div>
                        {{-- child category   --}}
                        <div class="form-group">
                            <label for="subcategory_name">Child-Category Name</label>
                            <input type="text" class="form-control" id="childcategory_name" name="childcategory_name"
                                required="">
                            <small id="emailHelp" class="form-text text-muted">This is your child-category</small>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"> <span class="d-none">loading.........</span> Submit</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit SubCategory</h5>
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
        $(function childcategory() {
            var table = $('.ytable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('childcategory.index') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'childcategory_name',
                        name: 'childcategory_name'
                    },
                    {
                        data: 'subcategory_name',
                        name: 'subcategory_name'
                    },
                    {
                        data: 'category_name',
                        name: 'category_name'
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
        let childcat_id = $(this).data('id');

        // alert(childcat_id); 
       
        $.get("childcategory/edit/" + childcat_id, function(data) {
            // console.log(data);
            $("#modal_body").html(data);
            
        });

    });


</script>

@endsection
<!-- /.content-header -->

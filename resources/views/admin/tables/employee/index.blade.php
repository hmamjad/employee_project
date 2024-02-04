@extends('layouts.admin')

@section('admin_content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Employee</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#subcategoryModal">+ Add
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
                                <h3 class="card-title">All Employdd list here</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>#SL</th>
                                            <th>Employee Name</th>
                                            <th>Employee Phone</th>
                                            <th>Employee Email</th>
                                            <th>Employee Location</th>
                                            <th>Employee Department</th>
                                            <th>Employee Designation</th>
                                            <th>Join Date</th>
                                            <th>Salary</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>



                                        @foreach ($data as $key => $row)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $row->emp_name }}</td>
                                                <td>{{ $row->emp_phone }}</td>
                                                <td>{{ $row->emp_email }}</td>
                                                <td>{{ $row->emp_location }}</td>
                                                <td>{{ $row->emp_dep }}</td>
                                                <td>{{ $row->emp_desig }}</td>

                                                <td>{{ $row->join_date }}</td>
                                                <td>{{ $row->emp_salary }}</td>
                                                <td>{{ $row->status }}</td>

                                                {{-- Eloquient Model and relationship with model  --}}
                                                {{-- <td>{{ $row->category->category_name }}</td>  --}}
                                                <td>
                                                    <a href="#" class="btn btn-info btn-sm edit"
                                                        data-id='{{ $row->id }}' data-toggle="modal"
                                                        data-target="#editModal"><i class="fas fa-edit"></i></a>

                                                    <a href="{{ route('subcategory.delete', $row->id) }}" id="delete"
                                                        class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                                </td>

                                            </tr>
                                        @endforeach
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
    <div class="modal fade" id="subcategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('employee.store') }}" method="post">
                    @csrf
                    <div class="modal-body">

                        {{-- sub category   --}}
                        <div class="form-group">
                            <label for="subcategory_name">Employee Name</label>
                            <input type="text" class="form-control" id="emp_name" name="emp_name" required="">
                        </div>

                        <div class="form-group">
                            <label for="emp_phone">Employee Phone</label>
                            <input type="text" class="form-control" id="emp_phone" name="emp_phone" required="">
                        </div>

                        <div class="form-group">
                            <label for="emp_email">Employee Email</label>
                            <input type="text" class="form-control" id="emp_email" name="emp_email" required="">
                        </div>

                      

                        {{-- Location select --}}
                        <div class="form-group">
                            <label for="emp_location">Employee Location</label>
                            <select class="form-control" name="emp_location" id="emp_location">

                                @foreach ($location as $row)
                                    <option value="{{ $row->id }}">{{ $row->location_name }}</option>
                                @endforeach

                            </select>
                        </div>

                         {{-- Department select --}}
                         <div class="form-group">
                            <label for="emp_dep">Employee Department</label>
                            <select class="form-control" name="emp_dep" id="emp_dep">

                                @foreach ($department as $row)
                                    <option value="{{ $row->id }}">{{ $row->emp_dep }}</option>
                                @endforeach

                            </select>
                        </div>


                         {{-- Designation select --}}
                         <div class="form-group">
                            <label for="emp_desig">Employee Designation</label>
                            <select class="form-control" name="emp_desig" id="emp_desig">

                                @foreach ($designation as $row)
                                    <option value="{{ $row->id }}">{{ $row->emp_desig }}</option>
                                @endforeach

                            </select>
                        </div>



                         <div class="form-group">
                            <label for="emp_date">Join Date</label>
                            <input type="date" class="form-control" id="emp_date" name="emp_date" required="">
                        </div>

                         <div class="form-group">
                            <label for="emp_salary">Salary</label>
                            <input type="text" class="form-control" id="emp_salary" name="emp_salary" required="">
                        </div>

                        

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                            <small id="emailHelp" class="form-text text-muted">If yes it will be show on your home
                                page</small>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous"></script>

    <script type="text/javascript">
        $('body').on('click', '.edit', function() {
            let subcat_id = $(this).data('id');

            // alert(subcat_id); 

            $.get("subcategory/edit/" + subcat_id, function(data) {
                // console.log(data);
                $("#modal_body").html(data);

            });

        });
    </script>
@endsection
<!-- /.content-header -->

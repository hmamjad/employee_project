@extends('layouts.admin')

@section('admin_content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Admin Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Page Create</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row">

                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Create a new page</h3>
                            </div>

                            {{-- Form start  --}}
                            <form action="{{route('page.store')}}" method="post">
                                @csrf
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Page Position</label>
                                        <select name="page_position" class="form-control">
                                            <option value="1">Line 1</option>
                                            <option value="2">Line 2</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Page Name</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1"
                                            name="page_name" placeholder="Page Name">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword2">Page Title</label>
                                        <input type="text" class="form-control" id="exampleInputPassword2"
                                            name="page_title" placeholder="Page Title">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword3">Page Description</label>
                                        <textarea name="page_description" class="form-control textarea"></textarea>
                                        <small>This Data will show on your webpage</small>
                                    </div>


                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Create Page</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.row -->
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

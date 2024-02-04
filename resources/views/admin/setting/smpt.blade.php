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
                            <li class="breadcrumb-item active">SMPT Mailer</li>
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

                    <div class="col-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">SMPT Mailer Setting</h3>
                            </div>


                            <form action="{{ route('smtp.setting.update',$smtp->id)}}" method="post">
                                @csrf
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">MAIL MAILER</label>
                                        <input type="text" class="form-control" name="mailer"
                                            placeholder="MAIL MAILER example: smtp" value="{{ $smtp->mailer }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">MAIL HOST</label>
                                        <input type="text" class="form-control" name="host"
                                            placeholder="MAIL HOST" value="{{ $smtp->host }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">MAIL PORT</label>
                                        <input type="text" class="form-control" name="port"
                                            placeholder="MAIL PORT example: 2525" value="{{ $smtp->port}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">MAIL USERNAME</label>
                                        <input type="text" class="form-control" name="user_name"
                                            placeholder="MAIL USERNAME" value="{{ $smtp->user_name}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">MAIL PASSWORD</label>
                                        <input type="text" class="form-control" name="password"
                                            placeholder="MAIL PASSWORD" value="{{ $smtp->password}}">
                                    </div>

                                  

                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
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

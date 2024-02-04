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
                            <li class="breadcrumb-item active">Website Setting</li>
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
                                <h3 class="card-title">Website Setting</h3>
                            </div>

                            {{-- form start --}}
                            <form action="{{ route('website.setting.update', $setting->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Currency</label>
                                        <select class="form-control" name="currency">
                                            <option value="৳" {{ ($setting->currency == '৳') ? "selected" : "" }}>Taka(৳)</option>
                                            <option value="$" {{ ($setting->currency == '$') ? "selected" : "" }}>USD($)</option>
                                            <option value="₹" {{ ($setting->currency == '$') ? "selected" : "" }}>Rupee(₹)</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Phone One</label>
                                        <input type="text" class="form-control" name="phone_one" placeholder="Phone One"
                                            value="{{ $setting->phone_one }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Phone Two</label>
                                        <input type="text" class="form-control" name="phone_two" placeholder="Phone Two"
                                            value="{{ $setting->phone_two }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Main Email</label>
                                        <input type="email" class="form-control" name="main_email"
                                            placeholder="Main Email" value="{{ $setting->main_email }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Support Email</label>
                                        <input type="email" class="form-control" name="support_email"
                                            placeholder="Support Email" value="{{ $setting->support_email }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Address</label>
                                        <input type="text" class="form-control" name="address" placeholder="Address"
                                            value="{{ $setting->address }}">
                                    </div>

                                    <strong class="text-info">Social Link</strong>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Facebook</label>
                                        <input type="text" class="form-control" name="facebook" placeholder="Facebook"
                                            value="{{ $setting->facebook }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Twitter</label>
                                        <input type="text" class="form-control" name="twitter" placeholder="Twitter"
                                            value="{{ $setting->twitter }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Instagram</label>
                                        <input type="text" class="form-control" name="instagram" placeholder="Instagram"
                                            value="{{ $setting->instagram }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Linkedin</label>
                                        <input type="text" class="form-control" name="linkedin" placeholder="Linkedin"
                                            value="{{ $setting->linkedin }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Youtube</label>
                                        <input type="text" class="form-control" name="youtube" placeholder="Youtube"
                                            value="{{ $setting->youtube }}">
                                    </div>


                                    <strong class="text-info">Logo & Favicon</strong><br>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Logo</label>
                                        <input type="file" class="form-control" name="logo">

                                        <input type="hidden" class="form-control" name="old_logo"
                                            value="{{ $setting->logo }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Favicon</label>
                                        <input type="file" class="form-control" name="favicon">

                                            <input type="hidden" class="form-control" name="old_favicon"
                                            value="{{ $setting->favicon }}">
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

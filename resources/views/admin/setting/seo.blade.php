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
                            <li class="breadcrumb-item active">onPage SEO</li>
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
                                <h3 class="card-title">Your SEO Setting</h3>
                            </div>


                            <form action="{{ route('seo.setting.update',$data->id)}}" method="post">
                                @csrf
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Meta Title</label>
                                        <input type="text" class="form-control" name="meta_title"
                                            placeholder="Meta title" value="{{ $data->meta_title }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Meta Authour</label>
                                        <input type="text" class="form-control" name="meta_author"
                                            placeholder="Meta Authour" value="{{ $data->meta_author }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Meta Tags</label>
                                        <input type="text" class="form-control" name="meta_tag"
                                            placeholder="Meta Tags" value="{{ $data->meta_tag}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Meta Keyword</label>
                                        <input type="text" class="form-control" name="meta_keyword"
                                            placeholder="Meta Keyword" value="{{ $data->meta_keyword}}">

                                            <small>Example:ecommerce,onlin shop,online market</small>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Meta Description</label>
                                        <textarea class="form-control" name="meta_description">{{ $data->meta_description}}</textarea>
                                    </div>

                                    <strong class="text-center text-success">--- Other Options ---</strong><br>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Google Verification</label>
                                        <input type="text" class="form-control" name="google_verification"
                                            placeholder="Google Verification" value="{{ $data->google_verification}}">
                                            <small>Put Here only veryfication code</small>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Alexa Verification</label>
                                        <input type="text" class="form-control" name="alexa_verification"
                                            placeholder="Alexa Verification" value="{{ $data->alexa_verification}}">
                                            <small>Put Here only veryfication code</small>
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Google Analytics</label>
                                        <input type="text" class="form-control" name="google_analytics"
                                            placeholder="Google Analytics" value="{{ $data->google_analytics}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Google Adsense</label>
                                        <input type="text" class="form-control" name="google_adsense"
                                            placeholder="Google Adsense" value="{{ $data->google_adsense}}">
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

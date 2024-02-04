@php
    $setting = DB::table('settings')->first();
@endphp

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        {{-- <img src="{{ url($setting->favicon) }}" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
        <img src="{{ asset('public/backend') }}/dist/img/AdminLTELogo.png" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Medical Equibment</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="https://media.licdn.com/dms/image/C5603AQES_ZFC8zUJGQ/profile-displayphoto-shrink_400_400/0/1575418421527?e=2147483647&v=beta&t=HMHGpLxn-qqUrdbt1ZH-JW-jnBzeYyi8islm6ehzEl0"
                    class="img-circle elevation-2">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.home') }}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                {{-- Category --}}
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Category
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">4</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('category.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('subcategory.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sub category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('childcategory.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Child Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('brand.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Brand</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('warehouse.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Warehouse</p>
                            </a>
                        </li>

                    </ul>
                </li> --}}

                {{-- Product --}}
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Product
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('product.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>New Product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('product.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Product</p>
                            </a>
                        </li>

                    </ul>
                </li> --}}


                {{-- Coupon --}}
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Offer
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('coupon.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Coupon</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('campaign.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>E Campaign</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                {{-- Order --}}
                
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Oders
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.order.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Order</p>
                            </a>
                        </li>
                       
                    </ul>
                </li> --}}

                {{-- Pickup point --}}
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Pickup Point
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">1</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('pickuppoint.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pickup Point</p>
                            </a>
                        </li>

                    </ul>
                </li> --}}

                {{-- Report --}}

                {{-- @if (Auth::user()->report == 1) --}}
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Reports
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('report.order.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Order report</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Customer report</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Stock report </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Product report </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ticket report </p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                {{-- @endif --}}

                {{-- Setting --}}
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Setting
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">5</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('seo.setting') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>SEO Setting</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('website.setting') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Website Setting</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('page.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Page Create</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('smpt.setting') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>SMTP Setting</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('brand.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Payment Gateway</p>
                            </a>
                        </li>

                    </ul>
                </li> --}}

                 <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Tables
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">4</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{  route('department.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Department Table</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{  route('location.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Location Table</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{  route('designation.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Designation Table</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('employee.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Employee Table</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{  route('brand.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Department & Location Audit Table</p>
                            </a>
                        </li>

                    </ul>
                </li>




                <li class="nav-header">Profile</li>
                {{-- password change --}}
                <li class="nav-item">
                    <a href="{{ route('admin.password.change') }}" class="nav-link">
                        <i class="nav-icon far fa-circle text-info"></i>
                        <p class="text">Password Change</p>
                    </a>
                </li>
                {{-- logout --}}
                <li class="nav-item">
                    <a href="{{ route('admin.logout') }}" class="nav-link">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p class="text">Logout</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

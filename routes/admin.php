<?php

use Illuminate\Support\Facades\Route;


Route::get('/admin-login', [App\Http\Controllers\Auth\LoginController::class, 'adminlogin'])->name('admin.login');


Route::group(['namespace' => 'App\Http\Controllers\Admin', 'middleware' => 'is_admin'], function () {
    Route::get('/admin/home', 'AdminController@admin')->name('admin.home');
    Route::get('/admin/logout', 'AdminController@logout')->name('admin.logout');
    Route::get('/admin/password/change', 'AdminController@PasswordChange')->name('admin.password.change');
    Route::post('/admin/password/change', 'AdminController@PasswordUpdate')->name('admin.password.update');

    // Category route
    Route::group(['prefix' => 'category'], function () {

        Route::get('/', 'CategoryController@index')->name('category.index');
        Route::post('/store', 'CategoryController@store')->name('category.store');
        Route::get('/delete/{id}', 'CategoryController@destroy')->name('category.delete');
        Route::get('/edit/{id}', 'CategoryController@edit');
        Route::post('/update', 'CategoryController@update')->name('category.update');
    });

    // global route
    Route::get('/get-child-category/{id}', 'CategoryController@GetChildCategory');


    // Subcategory route
    Route::group(['prefix' => 'subcategory'], function () {

        Route::get('/', 'SubcategoryController@index')->name('subcategory.index');
        Route::post('/store', 'SubcategoryController@store')->name('subcategory.store');
        Route::get('/delete/{id}', 'SubcategoryController@destroy')->name('subcategory.delete');
        Route::get('/edit/{id}', 'SubcategoryController@edit');
        Route::post('/update', 'SubcategoryController@update')->name('subcategory.update');
    });


  

    // Childcategory route
    Route::group(['prefix' => 'childcategory'], function () {

        Route::get('/', 'ChildcategoryController@index')->name('childcategory.index');
        Route::post('/store', 'ChildcategoryController@store')->name('childcategory.store');
        Route::get('/delete/{id}', 'ChildcategoryController@destroy')->name('childcategory.delete');
        Route::get('/edit/{id}', 'ChildcategoryController@edit');
        Route::post('/update', 'ChildcategoryController@update')->name('childcategory.update');
    });

    // Brand route
    Route::group(['prefix' => 'brand'], function () {

        Route::get('/', 'BrandController@index')->name('brand.index');
        Route::post('/store', 'BrandController@store')->name('brand.store');
        Route::get('/delete/{id}', 'BrandController@destroy')->name('brand.delete');
        Route::get('/edit/{id}', 'BrandController@edit');
        Route::post('/update', 'BrandController@update')->name('brand.update');
    });

    // department route
    Route::group(['prefix' => 'department'], function () {

        Route::get('/', 'DepartmentController@index')->name('department.index');
        Route::post('/store', 'DepartmentController@store')->name('department.store');
        Route::get('/delete/{id}', 'DepartmentController@destroy')->name('department.delete');
        Route::get('/edit/{id}', 'DepartmentController@edit');
        Route::post('/update', 'DepartmentController@update')->name('department.update');
    });

    // location route
    Route::group(['prefix' => 'location'], function () {

        Route::get('/', 'LocationController@index')->name('location.index');
        Route::post('/store', 'LocationController@store')->name('location.store');
        Route::get('/delete/{id}', 'LocationController@destroy')->name('location.delete');
        Route::get('/edit/{id}', 'LocationController@edit');
        Route::post('/update', 'LocationController@update')->name('location.update');
    });
    // Designation route
    Route::group(['prefix' => 'designation'], function () {

        Route::get('/', 'DesignationController@index')->name('designation.index');
        Route::post('/store', 'DesignationController@store')->name('designation.store');
        Route::get('/delete/{id}', 'DesignationController@destroy')->name('designation.delete');
        Route::get('/edit/{id}', 'DesignationController@edit');
        Route::post('/update', 'DesignationController@update')->name('designation.update');

    });
    // employee route
    Route::group(['prefix' => 'employee'], function () {

        Route::get('/', 'EmployeeController@index')->name('employee.index');
        Route::post('/store', 'EmployeeController@store')->name('employee.store');
        // Route::get('/delete/{id}', 'DesignationController@destroy')->name('designation.delete');
        // Route::get('/edit/{id}', 'DesignationController@edit');
        // Route::post('/update', 'DesignationController@update')->name('designation.update');

    });

    // Product route
    Route::group(['prefix' => 'product'], function () {

        Route::get('/', 'ProductController@index')->name('product.index');
        Route::get('/create', 'ProductController@create')->name('product.create');
        Route::post('/store', 'ProductController@store')->name('product.store');
        Route::delete('/delete/{id}', 'ProductController@destroy')->name('product.delete');
        Route::get('/edit/{id}', 'ProductController@edit')->name('product.edit');
        Route::post('/update', 'ProductController@update')->name('product.update');

        Route::get('/not-featured/{id}', 'ProductController@notfeatured');
        Route::get('/active-featured/{id}', 'ProductController@activefeatured');
        Route::get('/not-deal/{id}', 'ProductController@notdeal');
        Route::get('/active-deal/{id}', 'ProductController@activedeal');
        Route::get('/not-status/{id}', 'ProductController@notstatus');
        Route::get('/active-status/{id}', 'ProductController@activestatus');
      
    });

    // Coupon route
    Route::group(['prefix' => 'coupon'], function () {

        Route::get('/', 'CouponController@index')->name('coupon.index');
        Route::post('/store', 'CouponController@store')->name('store.coupon');
        Route::delete('/delete/{id}', 'CouponController@destroy')->name('coupon.delete');
        Route::get('/edit/{id}', 'CouponController@edit');
        Route::post('/update', 'CouponController@update')->name('update.coupon');
    });

    // campaign route
    Route::group(['prefix' => 'campaign'], function () {

        Route::get('/', 'CampaignController@index')->name('campaign.index');
        Route::post('/store', 'CampaignController@store')->name('campaign.store');
        Route::get('/delete/{id}', 'CampaignController@destroy')->name('campaign.delete');
        Route::get('/edit/{id}', 'CampaignController@edit');
        Route::post('/update', 'CampaignController@update')->name('campaign.update');
    });
    // Order route
    Route::group(['prefix' => 'order'], function () {

        Route::get('/', 'OrderController@index')->name('admin.order.index');
        Route::get('/admin/edit/{id}','OrderController@Editorder');
		Route::post('/update/order/status','OrderController@updateStatus')->name('update.order.status');
		Route::get('/view/admin/{id}','OrderController@ViewOrder');
		Route::get('/delete/{id}','OrderController@delete')->name('order.delete');
    });

    // Warehouse route
    Route::group(['prefix' => 'warehouse'], function () {

        Route::get('/', 'WarehouseController@index')->name('warehouse.index');
        Route::post('/store', 'WarehouseController@store')->name('warehouse.store');
        Route::get('/delete/{id}', 'WarehouseController@destroy')->name('warehouse.delete');
        Route::get('/edit/{id}', 'WarehouseController@edit');
        Route::post('/update', 'WarehouseController@update')->name('warehouse.update');
    });



    // Setting route
    Route::group(['prefix' => 'setting'], function () {
        // Seo setting route
        Route::group(['prefix' => 'seo'], function () {
            Route::get('/', 'SettingController@seo')->name('seo.setting');
            Route::post('/update/{id}', 'SettingController@seoUpdate')->name('seo.setting.update');
        });
        // website setting route
        Route::group(['prefix' => 'website'], function () {
            Route::get('/', 'SettingController@website')->name('website.setting');
            Route::post('/update/{id}', 'SettingController@websiteUpdate')->name('website.setting.update');
        });
        // smpt setting route
        Route::group(['prefix' => 'smpt'], function () {
            Route::get('/', 'SettingController@smpt')->name('smpt.setting');
            Route::post('/update/{id}', 'SettingController@smtpUpdate')->name('smtp.setting.update');
        });
        // page setting route
        Route::group(['prefix' => 'page'], function () {
            Route::get('/', 'PageController@index')->name('page.index');
            Route::get('/create', 'PageController@create')->name('create.page');
            Route::post('/store', 'PageController@store')->name('page.store');
            Route::get('/delete/{id}', 'PageController@destroy')->name('page.delete');
            Route::get('/edit/{id}', 'PageController@edit')->name('page.edit');
            Route::post('/update/{id}', 'PageController@update')->name('page.update');
        });
    });



      // Pickup Point route
      Route::group(['prefix' => 'pickup-point'], function () {
        Route::get('/', 'PickupController@index')->name('pickuppoint.index');
        Route::post('/store', 'PickupController@store')->name('store.pickup.point');
        Route::delete('/delete/{id}', 'PickupController@destroy')->name('pickup.point.delete');
        Route::get('/edit/{id}', 'PickupController@edit');
        Route::post('/update', 'PickupController@update')->name('pickup.point.update');
    });

      //__report routes__//
      Route::group(['prefix'=>'report'], function(){
        Route::get('/order','OrderController@Reportindex')->name('report.order.index');
        Route::get('/order/print','OrderController@ReportOrderPrint')->name('report.order.print');
        
    });


});

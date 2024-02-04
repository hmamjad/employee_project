<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Auth;
use Image;
use File;
use DataTables;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Brand;


class ProductController extends Controller
{
    // for Authenticated user
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Product index/show method
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $imgurl = 'public/files/product';

            $product = "";

            $query = DB::table('products')
                ->leftJoin('categories', 'products.category_id', 'categories.id')
                ->leftJoin('subcategories', 'products.subcategory_id', 'subcategories.id')
                ->leftJoin('brands', 'products.brand_id', 'brands.id')
                ->leftJoin('warehouses', 'products.warehouse', 'warehouses.id');


            if ($request->category_id) {
                $query->where('products.category_id', $request->category_id);
            }

            if ($request->brand_id) {
                $query->where('products.brand_id', $request->brand_id);
            }

            if ($request->warehouse_id) {
                $query->where('products.warehouse', $request->warehouse_id);
            }

            if ($request->status == 1) {
                $query->where('products.status', 1);
            }
            if ($request->status == 0) {
                $query->where('products.status', 0);
            }

            $product = $query->select('products.*', 'categories.category_name', 'subcategories.subcategory_name', 'brands.brand_name')
                ->get();


            return DataTables::of($product)
                ->addIndexColumn()
                ->editColumn('thumbnail', function ($row) use ($imgurl) {
                    return '<img src="' . $imgurl . '/' . $row->thumbnail . '" height="30" width="30">';
                })
                ->editColumn('featured', function ($row) {
                    if ($row->featured == 1) {
                        return '<a href="#" data-id="' . $row->id . '" class="deactive_featured"><i class="fas fa-thumbs-down text-danger"></i> <span class="badge badge-success">active</span> </a>';
                    } else {
                        return '<a href="#" data-id="' . $row->id . '" class="active_featured"><i class="fas fa-thumbs-up text-success"></i> <span class="badge badge-danger">Deactive</span> </a>';
                    }
                })
                ->editColumn('today_deal', function ($row) {
                    if ($row->today_deal == 1) {
                        return '<a href="#" data-id="' . $row->id . '" class="deactive_deal"><i class="fas fa-thumbs-down text-danger"></i> <span class="badge badge-success">active</span> </a>';
                    } else {
                        return '<a href="#" data-id="' . $row->id . '" class="active_deal"><i class="fas fa-thumbs-up text-success"></i> <span class="badge badge-danger">Deactive</span> </a>';
                    }
                })
                ->editColumn('status', function ($row) {
                    if ($row->status == 1) {
                        return '<a href="#" data-id="' . $row->id . '" class="deactive_status"><i class="fas fa-thumbs-down text-danger"></i> <span class="badge badge-success">active</span> </a>';
                    } else {
                        return '<a href="#" data-id="' . $row->id . '" class="active_status"><i class="fas fa-thumbs-up text-success"></i> <span class="badge badge-danger">Deactive</span> </a>';
                    }
                })
                ->addColumn('action', function ($row) {
                    $actionbtn = '<a href="#" class="btn btn-primary btn-sm edit"><i class="fas fa-eye"></i></a>
                    
                                  <a href="' . route('product.edit', [$row->id]) . '" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                  
                                   <a href="' . route('product.delete', [$row->id]) . '" id="delete_product" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>';
                    return  $actionbtn;
                })
                ->rawColumns(['action', 'category_name', 'subcategory_name', 'brand_name', 'thumbnail', 'featured', 'today_deal', 'status'])
                ->make(true);
        }

        $category = DB::table('categories')->get();
        $brand = DB::table('brands')->get();
        $warehouse = DB::table('warehouses')->get();

        return view('admin.product.index', compact('category', 'brand', 'warehouse'));
    }

    //  product Create Page
    public function create()
    {
        $category = DB::table('categories')->get();
        $brand = DB::table('brands')->get();
        $pickup_point = DB::table('pickup_point')->get();
        $warehouse = DB::table('warehouses')->get();

        return view('admin.product.create', compact('category', 'brand', 'pickup_point', 'warehouse'));
    }

    // product store method
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
            'code' => 'required|unique:products|max:55',
            'subcategory_id' => 'required',
            'brand_id' => 'required',
            'unit' => 'required',
            'selling_price' => 'required',
            'color' => 'required',
            'description' => 'required',
        ]);

        // subcategory call for get category id
        $subcategory = DB::table('subcategories')->where('id', $request->subcategory_id)->first();

        $data = array();

        $data['category_id'] = $subcategory->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['childcategory_id'] = $request->childcategory_id;
        $data['brand_id'] = $request->brand_id;
        $data['pickup_point_id'] = $request->pickup_point_id;
        $data['name'] = $request->name;
        $data['slug'] = Str::slug($request->name, '-');
        $data['code'] = $request->code;
        $data['unit'] = $request->unit;
        $data['tags'] = $request->tags;
        $data['color'] = $request->color;
        $data['size'] = $request->size;
        $data['video'] = $request->video;
        $data['purchase_price'] = $request->purchase_price;
        $data['selling_price'] = $request->selling_price;
        $data['discount_price'] = $request->discount_price;
        $data['stock_quantity'] = $request->stock_quantity;
        $data['discount_price'] = $request->discount_price;
        $data['warehouse'] = $request->warehouse;
        $data['description'] = $request->description;
        $data['featured'] = $request->featured;
        $data['today_deal'] = $request->today_deal;
        $data['status'] = $request->status;
        $data['product_slider'] = $request->product_slider;
        $data['trendy'] = $request->trendy;
        $data['flash_deal_id'] = $request->flash_deal_id;
        $data['cash_on_delivery'] = $request->cash_on_delivery;
        $data['admin_id'] = Auth::id();
        $data['date'] = date('d-m-Y');
        $data['month'] = date('F');
        $data['year'] = date('Y');

        // working with single image Thumbnail
        if ($request->thumbnail) {
            $slug = Str::slug($request->name, '-');
            $thumbnail = $request->thumbnail;
            $photoname = $slug . '.' . $thumbnail->getClientOriginalExtension();
            // $thumbnail->move('public/files/product/',$photoname); //without image intervention
            Image::make($thumbnail)->resize(600, 600)->save('public/files/product/' . $photoname); // image intervention

            $data['thumbnail'] = $photoname; //'public/files/product/' . $photoname
        }

        // working with multiple imags
        $images = array();
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $image) {

                $imageName = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                // $images->move('public/files/product/',$imageName); //without image intervention
                Image::make($image)->resize(600, 600)->save('public/files/product/' . $imageName); // image intervention

                array_push($images, $imageName);
            }

            $data['images'] = json_encode($images);
        }

        DB::table('products')->insert($data);

        $notifications = array('messege' => 'Product Inserted', 'alert-type' => 'success');
        // return redirect()->back()->with($notifications);
        return redirect()->route('product.index')->with($notifications);
    }

    // Edit product

    public function edit($id)
    {
        $product = DB::table('products')->where('id', $id)->first(); // $product = Product::findorfail($id);
        $category = Category::all();
        $subcategory = Subcategory::all();
        $brand = Brand::all();
        $pickup_point = DB::table('pickup_point')->get();
        $warehouse = DB::table('warehouses')->get();
        $childcategory = DB::table('childcategories')->where('category_id', $product->category_id)->get(); // subcategory dore kaj korle valo hoto

        return view('admin.product.edit', compact('product', 'category', 'subcategory', 'brand', 'pickup_point', 'warehouse', 'childcategory'));
    }


    //__update product__//
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'code' => 'required|max:55',
            'subcategory_id' => 'required',
            'brand_id' => 'required',
            'unit' => 'required',
            'selling_price' => 'required',
            'color' => 'required',
            'description' => 'required',
        ]);

        //subcategory call for category id
        $subcategory = DB::table('subcategories')->where('id', $request->subcategory_id)->first();
        $slug = Str::slug($request->name, '-');


        $data = array();
        $data['name'] = $request->name;
        $data['slug'] = Str::slug($request->name, '-');
        $data['code'] = $request->code;
        $data['category_id'] = $subcategory->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['childcategory_id'] = $request->childcategory_id;
        $data['brand_id'] = $request->brand_id;
        $data['pickup_point_id'] = $request->pickup_point_id;
        $data['unit'] = $request->unit;
        $data['tags'] = $request->tags;
        $data['purchase_price'] = $request->purchase_price;
        $data['selling_price'] = $request->selling_price;
        $data['discount_price'] = $request->discount_price;
        $data['warehouse'] = $request->warehouse;
        $data['stock_quantity'] = $request->stock_quantity;
        $data['color'] = $request->color;
        $data['size'] = $request->size;
        $data['description'] = $request->description;
        $data['video'] = $request->video;
        $data['featured'] = $request->featured;
        $data['today_deal'] = $request->today_deal;
        $data['product_slider'] = $request->product_slider;
        $data['status'] = $request->status;
        $data['trendy'] = $request->trendy;

      

        //__old thumbnail ase kina__ jodi thake new thumbnail insert korte hobe
        $thumbnail = $request->file('thumbnail');
        if ($thumbnail) {
            // // delete old thumbnail
            // $old_thumbnail ='public/files/product/'.$request->old_thumbnail;
            // if(File::exists($old_thumbnail)){
            //     File::delete($old_thumbnail);
            // }

            // insert new thumbnail
            $thumbnail = $request->thumbnail;
            $photoname = $slug . '.' . $thumbnail->getClientOriginalExtension();
            Image::make($thumbnail)->resize(600, 600)->save('public/files/product/' . $photoname);
            $data['thumbnail'] = $photoname;   // public/files/product/plus-point.jpg   
        }

        //__multiple image update__//

        $old_images = $request->has('old_images');
        if ($old_images) {
            $images = $request->old_images;
            $data['images'] = json_encode($images);
        } else {
            $images = array();
            $data['images'] = json_encode($images);
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $image) {
                $imageName = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(600, 600)->save('public/files/product/' . $imageName);
                array_push($images, $imageName);
            }
            $data['images'] = json_encode($images);
        }



        DB::table('products')->where('id', $request->id)->update($data);
        $notification = array('messege' => 'Product Updated!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }





    // Active to Deactive featured
    public function notfeatured($id)
    {
        DB::table('products')->where('id', $id)->update(['featured' => 0]);
        return response()->json("Featured Deactived");
    }
    //  Deactive to Active featured
    public function activefeatured($id)
    {
        DB::table('products')->where('id', $id)->update(['featured' => 1]);
        return response()->json("Featured Actived");
    }

    // Active to Deactive today_deal
    public function notdeal($id)
    {
        DB::table('products')->where('id', $id)->update(['today_deal' => 0]);
        return response()->json("Deal Deactived");
    }

    // Deactive to Active  today_deal
    public function activedeal($id)
    {
        DB::table('products')->where('id', $id)->update(['today_deal' => 1]);
        return response()->json("Deal Actived");
    }
    // Active to Deactive Status
    public function notstatus($id)
    {
        DB::table('products')->where('id', $id)->update(['status' => 0]);
        return response()->json("Status Deactived");
    }

    // Deactive to Active  Status
    public function activestatus($id)
    {
        DB::table('products')->where('id', $id)->update(['status' => 1]);
        return response()->json("Status Deactived");
    }

    // Product Delete
    public function destroy($id)
    {
        $product = DB::table('products')->where('id', $id)->first();

        if(File::exists('public/files/product/'.$product->thumbnail)){
            File::delete('public/files/product/'.$product->thumbnail);
        }


        DB::table('products')->where('id', $id)->delete();
        return response()->json("successfully Deleted!");
    }
}

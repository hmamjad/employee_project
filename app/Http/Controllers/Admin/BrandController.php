<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Support\Str;
use Image;
use File;

class BrandController extends Controller
{
    // for Authenticated user
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('brands')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('front_page', function ($row) {
                    if ($row->front_page == 1) {
                        return '<span class="badge badge-success">Home Page</span>';
                    }
                })
                ->addColumn('action', function ($row) {
                    $actionbtn = '<a href="#" class="btn btn-info btn-sm edit" data-id=" ' . $row->id . ' " 
                 data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></a>
     
                 <a href="' . route('brand.delete', [$row->id]) . '" id="delete" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>';
                    return  $actionbtn;
                })
                ->rawColumns(['action','front_page'])
                ->make(true);
        }

        return view('admin.category.brand.index');
    }

    // store method

    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand_name' => 'required|unique:brands|max:55',
        ]);
        // quirybuilder
        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_slug'] = Str::slug($request->brand_name, '-');
        $data['front_page'] = $request->front_page;
        // working with image
        $slug = Str::slug($request->brand_name, '-');
        $photo = $request->brand_logo;
        $photoname = $slug . '.' . $photo->getClientOriginalExtension();
        // $photo->move('public/files/brand/',$photoname); //without image intervention
        Image::make($photo)->resize(240, 120)->save('public/files/brand/' . $photoname); // image intervention

        $data['brand_logo'] = 'public/files/brand/' . $photoname;


        DB::table('brands')->insert($data);

        $notifications = array('messege' => 'Brand Inserted', 'alert-type' => 'success');
        return redirect()->back()->with($notifications);
    }



    // delete Brand

    public function destroy($id)
    {
        // Delete Image 
        $data = DB::table('brands')->where('id', $id)->first();
        $image = $data->brand_logo;

        if (File::exists($image)) {
            unlink($image);
        }

        // Delter row from table
        DB::table('brands')->where('id', $id)->delete();   // Quiry builder

        $notifications = array('messege' => 'Brand Deleted', 'alert-type' => 'success');
        return redirect()->back()->with($notifications);
    }



    // Edit brand

    public function edit($id)
    {

        $data = DB::table('brands')->where('id', $id)->first();

        return view('admin.category.brand.edit', compact('data'));
    }


    // Update method

    public function update(Request $request)
    {
        // quirybuilder
        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_slug'] = Str::slug($request->brand_name, '-');
        $data['front_page'] = $request->front_page;
        // working wit image
        $slug = Str::slug($request->brand_name, '-'); // this is for name or ui_id
        
        if ($request->brand_logo) {
            // delete old image
            if (File::exists($request->old_logo)) {

                unlink($request->old_logo);
            }
            // new Image
            $photo = $request->brand_logo;
            $photoname = $slug . '.' . $photo->getClientOriginalExtension();
            // $photo->move('public/files/brand/',$photoname); //without image intervention
            Image::make($photo)->resize(240, 120)->save('public/files/brand/'.$photoname); // image intervention

            $data['brand_logo'] = 'public/files/brand/'.$photoname;
            DB::table('brands')->where('id', $request->id)->update($data);

            $notifications = array('messege' => 'Brand Updated', 'alert-type' => 'success');
            return redirect()->back()->with($notifications);

        } else {
            $data['brand_logo'] = $request->old_logo;
            DB::table('brands')->where('id', $request->id)->update($data);

            $notifications = array('messege' => 'Brand Updated', 'alert-type' => 'success');
            return redirect()->back()->with($notifications);
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Support\Str;

class ChildcategoryController extends Controller
{
    // for Authenticated user
    public function __construct()
    {
        $this->middleware('auth');
    }

    // show with yajra datatable
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('childcategories')->leftjoin('categories', 'childcategories.category_id', 'categories.id')->leftjoin('subcategories', 'childcategories.subcategory_id', 'subcategories.id')->select('categories.category_name', 'subcategories.subcategory_name', 'childcategories.*')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionbtn = '<a href="#" class="btn btn-info btn-sm edit" data-id=" '.$row->id.' " 
                data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></a>
    
                <a href="' .route('childcategory.delete',[$row->id]) .'" id="delete" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>';
                    return  $actionbtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $category = DB::table('categories')->get();

        return view('admin.category.childcategory.index', compact('category'));
    }


    // store method

    public function store(Request $request)
    {
        $cat = DB::table('subcategories')->where('id',$request->subcategory_id)->first();  // for get category ID



        // quirybuilder
        $data = array();
        $data['category_id'] = $cat->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['childcategory_name'] = $request->childcategory_name;
        $data['childcategory_slug'] = Str::slug($request->childcategory_name, '-');

        DB::table('childcategories')->insert($data);

        $notifications = array('messege' => 'Subcategory Inserted', 'alert-type' => 'success');
        return redirect()->back()->with($notifications);

    }

    // Edit childcategory method

    public function edit($id)
    {
        $category = DB::table('categories')->get();
        $data = DB::table('childcategories')->where('id', $id)->first();
        
        return view('admin.category.childcategory.edit', compact('data', 'category'));
        
    }


    
    // Update method
    public function update(Request $request)
    {
        $cat = DB::table('subcategories')->where('id',$request->subcategory_id)->first();  // for get category ID


        // quirybuilder
        $data = array();
        $data['category_id'] = $cat->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['childcategory_name'] = $request->childcategory_name;
        $data['childcategory_slug'] = Str::slug($request->childcategory_name, '-');

        DB::table('childcategories')->where('id',$request->id)->update($data);

        $notifications = array('messege' => 'Subcategory Inserted', 'alert-type' => 'success');
        return redirect()->back()->with($notifications);
    }



    
    // delete Child category

    public function destroy($id)
    {
        DB::table('childcategories')->where('id', $id)->delete();   // Quiry builder

        $notifications = array('messege' => 'childCategory Deleted', 'alert-type' => 'success');
        return redirect()->back()->with($notifications);
    }






}

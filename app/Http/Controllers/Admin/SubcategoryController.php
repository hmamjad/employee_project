<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    // for Authenticated user
    public function __construct()
    {
        $this->middleware('auth');
    }


    // All subcategory showing Method
    public function index()
    {

        // $data = DB::table('subcategories')->leftJoin('categories', 'subcategories.category_id', 'categories.id')->select('subcategories.*', 'categories.category_name')->get();  // quiry builder
        $data = Subcategory::all(); //Eloquint ORM

        $category = Category::all();   // for category select// Eloquint ORM
        //  $category = DB::table()->get();   // for category select// quiry builder

        return view('admin.category.subcategory.index', compact('data', 'category'));
        //    return response()->json($data);

    }



    // store method

    public function store(Request $request)
    {
        $validated = $request->validate([
            'subcategory_name' => 'required|max:55',
        ]);

        // // quirybuilder
        // $data = array();
        // $data['category_id'] = $request->category_id;
        // $data['subcategory_name'] = $request->subcategory_name;
        // $data['subcategory_slug'] = Str::slug($request->subcategory_name, '-');
        // DB::table('subcategories')->insert($data);

        // Eloquint ORM
        Subcategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => Str::slug($request->subcategory_name, '-'),
        ]);


        $notifications = array('messege' => 'Subcategory Inserted', 'alert-type' => 'success');
        return redirect()->back()->with($notifications);

        // return response()->json($data);

    }



    // Edit subcategory method

    public function edit($id)
    {
        // //  Eloquint ORM
        // $data = Subcategory::find($id);
        // $category = Category::all();

        // Quiry builder
        $data = DB::table('subcategories')->where('id', $id)->first();
        $category = DB::table('categories')->get();

        return view('admin.category.subcategory.edit', compact('data', 'category'));
    }


    // Update method
    public function update(Request $request)
    {

        //  // Quiry builder

        // $data = array();
        // $data['category_id'] = $request->category_id;
        // $data['subcategory_name']=$request->subcategory_name;
        // $data['subcategory_slug']=Str::slug($request->subcategory_name, '-');
        // DB::table('subcategories')->where('id',$request->id)->update($data);



        // // Eloquint ORM
        $subcategory = Subcategory::where('id', $request->id)->first();

        $subcategory->update([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => Str::slug($request->subcategory_name, '-'),
        ]);

        $notifications = array('messege' => 'Subcategory Updated', 'alert-type' => 'success');
        return redirect()->back()->with($notifications);
    }



    // delete Subcategory

    public function destroy($id)
    {
        // DB::table('subcategories')->where('id', $id)->delete();   // Quiry builder

        Subcategory::find($id)->delete();    // Eloquint ORM

        $notifications = array('messege' => 'SubCategory Deleted', 'alert-type' => 'success');
        return redirect()->back()->with($notifications);
    }
}

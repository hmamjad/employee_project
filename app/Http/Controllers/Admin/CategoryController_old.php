<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    // for Authenticated user
    public function __construct()
    {
        $this->middleware('auth');
    }

    // All category showing Method
    public function index()
    {
        // $data = DB::table('categories')->get();  // quiry builder

        $data = Category::all();   // Eloquint ORM

        return view('admin.category.category.index', compact('data'));
        //    return response()->json($data);
    }

    // store method

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:55',
        ]);

        // // quirybuilder
        // $data = array();
        // $data['category_name'] = $request->category_name;
        // $data['category_slug'] = Str::slug($request->category_name, '-');
        // DB::table('categories')->insert($data);

        // Eloquint ORM
        $data = Category::insert([
            'category_name' => $request->category_name,
            'category_slug' => Str::slug($request->category_name, '-'),
        ]);


        $notifications = array('messege' => 'Category Inserted', 'alert-type' => 'success');
        return redirect()->back()->with($notifications);

        // return response()->json($data);

    }

    // Edit category method

    public function edit($id)
    {
        // // quirybuilder
        //  $data = DB::table('categories')->where('id',$id)->first();

        // Eloquint ORM
        $data = Category::findorfail($id);
        return response()->json($data);
    }


    // Update method
    public function update(Request $request)
    {

        // Quiry builder
        // $data = array();
        // $data['category_name']=$request->category_name;
        // $data['category_slug']=Str::slug($request->category_name, '-');
        // DB::table('categories')->where('id',$request->id)->update($data);

        // Eloquint ORM
        $category = Category::where('id', $request->id)->first();

        $category->update([
            'category_name' => $request->category_name,
            'category_slug' => Str::slug($request->category_name, '-'),
        ]);

        $notifications = array('messege' => 'Category Updated', 'alert-type' => 'success');
        return redirect()->back()->with($notifications);
    }


    // delete category

    public function destroy($id)
    {
        //  // Quiry builder
        // DB::table('categories')->where('id',$id)->delete();

        // Eloquint ORM
        Category::find($id)->delete();

        $notifications = array('messege' => 'Category Deleted', 'alert-type' => 'success');
        return redirect()->back()->with($notifications);
    }


    // get child Category by subcategory_id
    public function GetChildCategory($id)
    {     // this is subcategory_id
        $data =  DB::table('childcategories')->where('subcategory_id', $id)->get();
        return response()->json($data);
    }
}

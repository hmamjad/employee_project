<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Designation;
use Illuminate\Support\Str;
use Image;
use File;

class DesignationController extends Controller
{
     // for Authenticated user
    public function __construct()
    {
        $this->middleware('auth');
    }

    //all category showing method
    public function index()
    {
        // $data=DB::table('locations')->get();  //query builder
        $data = Designation::all();    //eloquent ORM
        return view('admin.tables.designation.index', compact('data'));
    }

     //store method
     public function store(Request $request)
     {
         $validated = $request->validate([
             'designation_name' => 'required|unique:designations|max:55',
         ]);
 
         //query builder
         // $data=array();
         // $data['category_name']=$request->category_name;
         // $data['category_slug']=Str::slug($request->category_name, '-');
         // DB::table('categories')->insert($data);
         $slug = Str::slug($request->designation_name, '-');
 
 
         //Eloquent ORM
         Designation::insert([
             'designation_name' => $request->designation_name,
             'designation_slug' => $slug,
             'status' => $request->status,
         ]);
 
         $notification = array('messege' => 'designation Inserted!', 'alert-type' => 'success');
         return redirect()->back()->with($notification);
     }


     
    //delete category method
    public function destroy($id)
    {
        //query builder
        //DB::table('designations')->where('id',$id)->delete();
        //eleqoent ORM
        $designation = Designation::find($id);
        $designation->delete();

        $notification = array('messege' => 'designation Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

     //edit method
     public function edit($id)
     {
         // $data=DB::table('locations')->where('id',$id)->first();
         $data=Designation::findorfail($id);
         return view('admin.tables.designation.edit',compact('data'));
         //return response()->json($data);
     }


      //update method
    public function update(Request $request)
    {
      //Query Builder update
    	// $data=array();
    	// $data['category_name']=$request->category_name;
    	// $data['category_slug']=Str::slug($request->category_name, '-');
    	// DB::table('categories')->where('id',$request->id)->update($data);

     

        $slug=Str::slug($request->designation_name, '-');
        $data=array();
        $data['designation_name']=$request->designation_name;
        $data['designation_slug']=$slug;
        $data['status']=$request->status;


        DB::table('designations')->where('id',$request->id)->update($data); 
        
        $notification=array('messege' => 'designation Update!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);

       
    }

 

}

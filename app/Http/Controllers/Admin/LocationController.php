<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Location;
use Illuminate\Support\Str;
use Image;
use File;

class LocationController extends Controller
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
        $data = Location::all();    //eloquent ORM
        return view('admin.tables.location.index', compact('data'));
    }


    //store method
    public function store(Request $request)
    {
        $validated = $request->validate([
            'location_name' => 'required|unique:locations|max:55',
        ]);

        //query builder
        // $data=array();
        // $data['category_name']=$request->category_name;
        // $data['category_slug']=Str::slug($request->category_name, '-');
        // DB::table('categories')->insert($data);
        $slug = Str::slug($request->location_name, '-');


        //Eloquent ORM
        location::insert([
            'location_name' => $request->location_name,
            'location_slug' => $slug,
            'status' => $request->status,
        ]);

        $notification = array('messege' => 'location Inserted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }



    //delete category method
    public function destroy($id)
    {
        //query builder
        //DB::table('locations')->where('id',$id)->delete();
        //eleqoent ORM
        $location = Location::find($id);
        $location->delete();

        $notification = array('messege' => 'Location Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }


    //edit method
    public function edit($id)
    {
    	// $data=DB::table('locations')->where('id',$id)->first();
    	$data=Location::findorfail($id);
        return view('admin.tables.location.edit',compact('data'));
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

     

        $slug=Str::slug($request->location_name, '-');
        $data=array();
        $data['location_name']=$request->location_name;
        $data['location_slug']=$slug;
        $data['status']=$request->status;


        DB::table('locations')->where('id',$request->id)->update($data); 

        $notification=array('messege' => 'location Update!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);

       
    }


   
}

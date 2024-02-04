<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Location;
use App\Models\Designation;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Support\Str;
use Image;
use File;

class EmployeeController extends Controller
{
     // for Authenticated user
     public function __construct()
     {
         $this->middleware('auth');
     }



     
    // All Employee showing Method
    public function index()
    {

        // $data = DB::table('subcategories')->leftJoin('categories', 'subcategories.category_id', 'categories.id')->select('subcategories.*', 'categories.category_name')->get();  // quiry builder
        $data = Employee::all(); //Eloquint ORM
        

        // $category = Category::all();   // for category select// Eloquint ORM
        //  $category = DB::table()->get();   // for category select// quiry builder

        $department = Department::all();
        $location = Location::all();
        $designation = Designation::all();


        return view('admin.tables.employee.index', compact('data', 'department','location','designation'));
        //    return response()->json($data);

    }




     // store method

     public function store(Request $request)
     {

        // dd($request);


         $validated = $request->validate([
             'emp_name' => 'required|max:55',
             'emp_phone' => 'required',
             'emp_email' => 'required',
             'emp_location' => 'required',
             'emp_dep' => 'required',
             'emp_desig' => 'required',
             'emp_date' => 'required',
             'emp_salary' => 'required',
             'status' => 'required',
         ]);

         
         
         






 
         // // quirybuilder
         // $data = array();
         // $data['category_id'] = $request->category_id;
         // $data['subcategory_name'] = $request->subcategory_name;
         // $data['subcategory_slug'] = Str::slug($request->subcategory_name, '-');
         // DB::table('subcategories')->insert($data);
 
         // Eloquint ORM
         Employee::insert([
            'emp_name' => $request->emp_name,
            'emp_phone' => $request->emp_phone,
            'emp_email' => $request->emp_email,
            'emp_location' => $request->emp_location,
            'emp_dep' => $request->emp_dep,
            'emp_desig' => $request->emp_desig,
            'join_date' => $request->emp_date,
            'emp_salary' => $request->emp_salary,
            'status' => $request->status,


            //  'category_id' => $request->category_id,
            //  'subcategory_name' => $request->subcategory_name,
            //  'subcategory_slug' => Str::slug($request->subcategory_name, '-'),
         ]);
 
 
         $notifications = array('messege' => 'Employee Inserted', 'alert-type' => 'success');
         return redirect()->back()->with($notifications);
 
         // return response()->json($data);
 
     }





}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Support\Str;
use Image;
use File;

class DepartmentController extends Controller
{
      // for Authenticated user
      public function __construct()
      {
          $this->middleware('auth');
      }


      public function index(Request $request)
      {
          if ($request->ajax()) {
              $data = DB::table('departments')->get();
  
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
       
                   <a href="' . route('department.delete', [$row->id]) . '" id="delete" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>';
                      return  $actionbtn;
                  })
                  ->rawColumns(['action','front_page'])
                  ->make(true);
          }
  
          return view('admin.tables.department.index');
      }




       // store method

    public function store(Request $request)
    {
        $validated = $request->validate([
            'dep_name' => 'required|unique:departments|max:55',
        ]);
        // quirybuilder
        $data = array();
        $data['dep_name'] = $request->dep_name;
        $data['dep_slug'] = Str::slug($request->dep_name, '-');
        $data['front_page'] = $request->front_page;
        // working with image
        $slug = Str::slug($request->dep_name, '-');
        $photo = $request->dep_logo;
        $photoname = $slug . '.' . $photo->getClientOriginalExtension();
        // $photo->move('public/files/department/',$photoname); //without image intervention
        Image::make($photo)->resize(240, 120)->save('public/files/department/' . $photoname); // image intervention

        $data['dep_logo'] = 'public/files/department/' . $photoname;


        DB::table('departments')->insert($data);

        $notifications = array('messege' => 'Department Inserted', 'alert-type' => 'success');
        return redirect()->back()->with($notifications);
    }

     // delete Department

     public function destroy($id)
     {
         // Delete Image 
         $data = DB::table('departments')->where('id', $id)->first();
         $image = $data->dep_logo;
 
         if (File::exists($image)) {
             unlink($image);
         }
 
         // Delter row from table
         DB::table('departments')->where('id', $id)->delete();   // Quiry builder
 
         $notifications = array('messege' => 'Departments Deleted', 'alert-type' => 'success');
         return redirect()->back()->with($notifications);
     }

     
    // Edit brand

    public function edit($id)
    {

        $data = DB::table('departments')->where('id', $id)->first();

        return view('admin.tables.department.edit', compact('data'));
    }


    // Update method

    public function update(Request $request)
    {
        // quirybuilder
        $data = array();
        $data['dep_name'] = $request->dep_name;
        $data['dep_slug'] = Str::slug($request->dep_name, '-');
        $data['front_page'] = $request->front_page;
        // working wit image
        $slug = Str::slug($request->dep_name, '-'); // this is for name or ui_id
        
        if ($request->dep_logo) {
            // delete old image
            if (File::exists($request->old_logo)) {

                unlink($request->old_logo);
            }
            // new Image
            $photo = $request->dep_logo;
            $photoname = $slug . '.' . $photo->getClientOriginalExtension();
            // $photo->move('public/files/dep/',$photoname); //without image intervention
            Image::make($photo)->resize(240, 120)->save('public/files/department/'.$photoname); // image intervention

            $data['dep_logo'] = 'public/files/department/'.$photoname;
            DB::table('departments')->where('id', $request->id)->update($data);

            $notifications = array('messege' => 'dep Updated', 'alert-type' => 'success');
            return redirect()->back()->with($notifications);

        } else {
            $data['dep_logo'] = $request->old_logo;
            DB::table('departments')->where('id', $request->id)->update($data);

            $notifications = array('messege' => 'Department Updated', 'alert-type' => 'success');
            return redirect()->back()->with($notifications);
        }
    }




}

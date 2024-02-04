<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Support\Str;
use Image;
use File;

class CampaignController extends Controller
{
    // for Authenticated user
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('campaigns')->orderBy('id','DESC')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('status', function ($row) {
                    if ($row->status == 1) {
                        return '<a href="#"  class="deactive_status"></i> <span class="badge badge-success">active</span> </a>';
                    } else {
                        return '<a href="#"  class="active_status"><span class="badge badge-danger">Deactive</span> </a>';
                    }
                })
                ->addColumn('action', function ($row) {
                    $actionbtn = '<a href="#" class="btn btn-info btn-sm edit" data-id=" ' . $row->id . ' " 
                 data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></a>
     
                 <a href="' . route('campaign.delete', [$row->id]) . '" id="delete" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>';
                    return  $actionbtn;
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }

        return view('admin.offer.campaign.index');
    }


     // store method

     public function store(Request $request)
     {

        
         $validated = $request->validate([
             'title' => 'required|unique:campaigns|max:55',
             'start_date' => 'required',
             'image' => 'required',
             'discount' => 'required',
         ]);

         // quirybuilder
         $data = array();
         $data['title'] = $request->title;
         $data['start_date'] = $request->start_date;
         $data['end_date'] = $request->end_date;
         $data['status'] = $request->status;
         $data['discount'] = $request->discount;
         $data['month'] = date('F');
         $data['year'] = date('Y');
      
         // working with image
         $slug = Str::slug($request->title, '-');  //only for image name
         $photo = $request->image;
         $photoname = $slug . '.' . $photo->getClientOriginalExtension();
         // $photo->move('public/files/campaign/',$photoname); //without image intervention
         Image::make($photo)->resize(468, 90)->save('public/files/campaign/' . $photoname); // image intervention
 
         $data['image'] = 'public/files/campaign/' . $photoname;
 
        
         DB::table('campaigns')->insert($data);
 
         $notifications = array('messege' => 'Campaign Inserted', 'alert-type' => 'success');
         return redirect()->back()->with($notifications);
     }



     // delete Campaign

    public function destroy($id)
    {
        // Delete Image 
        $data = DB::table('campaigns')->where('id', $id)->first();
        $image = $data->image;

        if (File::exists($image)) {
            unlink($image);
        }

        // Delter row from table
        DB::table('campaigns')->where('id', $id)->delete();   // Quiry builder

        $notifications = array('messege' => 'Campaign Deleted', 'alert-type' => 'success');
        return redirect()->back()->with($notifications);
    }

    
    // Edit Campaign

    public function edit($id)
    {

        $data = DB::table('campaigns')->where('id', $id)->first();

        return view('admin.offer.campaign.edit', compact('data'));
    }


     // Update method

     public function update(Request $request)
     {
         // quirybuilder
         $data = array();
         $data['title'] = $request->title;
         $data['start_date'] = $request->start_date;
         $data['end_date'] = $request->end_date;
         $data['status'] = $request->status;
         $data['discount'] = $request->discount;
         // working wit image
         $slug = Str::slug($request->title, '-'); // this is for name or ui_id
         
         if ($request->image) {
             // delete old image
             if (File::exists($request->old_image)) {
 
                 unlink($request->old_image);
             }
             // new Image
             $photo = $request->image;
             $photoname = $slug . '.' . $photo->getClientOriginalExtension();
             // $photo->move('public/files/campaign/',$photoname); //without image intervention
             Image::make($photo)->resize(468, 90)->save('public/files/campaign/'.$photoname); // image intervention
 
             $data['image'] = 'public/files/campaign/'.$photoname;
             DB::table('campaigns')->where('id', $request->id)->update($data);
 
             $notifications = array('messege' => 'Campaign Updated', 'alert-type' => 'success');
             return redirect()->back()->with($notifications);
 
         } else {
             $data['image'] = $request->old_image;
             DB::table('campaigns')->where('id', $request->id)->update($data);
 
             $notifications = array('messege' => 'Campaign Updated', 'alert-type' => 'success');
             return redirect()->back()->with($notifications);
         }
     }


}

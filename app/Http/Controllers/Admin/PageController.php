<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PageController extends Controller
{
      // for Authenticated user
      public function __construct()
      {
          $this->middleware('auth');
      }

    //   All page show method
    public function index(){
        $page = DB::table('pages')->latest()->get();
        return view('admin.setting.page.index',compact('page'));
    }

    // page create method
    public function create(){
        return view('admin.setting.page.create');
    }

    // page insert
    public function store(Request $request){
        $data = array();

        $data['page_position'] = $request->page_position;
        $data['page_name'] = $request->page_name;
        $data['page_slug'] = Str::slug($request->page_name, '-');
        $data['page_title'] = $request->page_title;
        $data['page_description'] = $request->page_description;

        DB::table('pages')->insert($data);

        $notifications = array('messege' => 'Page Created Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notifications);
    }
    
    // page delete
    public function destroy($id){
        DB::table('pages')->where('id',$id)->delete();

        $notifications = array('messege' => 'Page Deleted Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notifications);
    }

    // page Edit
    public function edit($id){
        $page = DB::table('pages')->where('id',$id)->first();
        return view('admin.setting.page.edit',compact('page'));
    }

    // page Update

    public function update(Request $request,$id){

        $data = array();

        $data['page_position'] = $request->page_position;
        $data['page_name'] = $request->page_name;
        $data['page_name'] = Str::slug($request->page_name, '-');
        $data['page_title'] = $request->page_title;
        $data['page_description'] = $request->page_description;

        DB::table('pages')->where('id',$id)->update($data);
        $notifications = array('messege' => 'Page Updated Successfully', 'alert-type' => 'success');
        return redirect()->route('page.index')->with($notifications);
    }


}

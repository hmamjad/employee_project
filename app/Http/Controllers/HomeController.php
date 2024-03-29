<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders =DB::table('orders')->where('user_id',Auth::id())->orderBy('id','DESC')->take(10)->get();
        $total_order =DB::table('orders')->where('user_id',Auth::id())->count();
        $complete_order =DB::table('orders')->where('user_id',Auth::id())->where('status',3)->count();
        $cancel_order =DB::table('orders')->where('user_id',Auth::id())->where('status',5)->count();
        $return_order =DB::table('orders')->where('user_id',Auth::id())->where('status',4)->count();

        return view('home',compact('orders','total_order','complete_order','cancel_order','return_order'));
    }

    // user logout 

    public function logout()
    {
        Auth::logout();
        // return Redirect()->back();
        return Redirect()->route('front.index');
    }
    
}

<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Order;

class ProfileController extends Controller
{
     // for Authenticated user
     public function __construct()
     {
         $this->middleware('auth');
     }

    //  show user password change page and shipping 
     public function setting(){
        return view('user.setting');
     }

    //  PasswordChange
    public function PasswordChange(Request $request){

        $validated = $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $current_password = Auth::user()->password;  //login user password form user table
        $old_password = $request->old_password;      // old password from input
        $new_password = $request->password;          // new password from input

        if(Hash::check($old_password,$current_password)){

            $user = User::findorfail(Auth::id());

            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            $notifications = array('messege' => 'Password Updated', 'alert-type' => 'success');
            return redirect()->to('/')->with($notifications);
        }else{
            $notifications = array('messege' => 'Old Password Not Match', 'alert-type' => 'error');
            return redirect()->back()->with($notifications);
        }

    }

    // MyOrder

    public function MyOrder(){
        $orders=DB::table('orders')->where('user_id',Auth::id())->orderBy('id','DESC')->get();
       return view('user.my_order',compact('orders'));
    }

    // View customer order detail
    public function ViewOrder($id){

        $order = DB::table('orders')->where('id',$id)->first();  // $order = Order::findorfail($id);
        $order_details = DB::table('order_details')->where('order_id',$id)->get(); 

        return view('user.order_details',compact('order','order_details'));
    }




}

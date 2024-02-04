<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
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


    // admin after login
    public function admin(){
        return view('admin.home');
    }

    // Admin custom logout
    public function logout(){
        Auth::logout();

         $notifications = array('messege'=>'You are logout', 'alert-type'=>'success');

        return redirect()->route('admin.login')->with($notifications);
    }


    // password change
    public function PasswordChange(){
        return view('admin.profile.change_password');
    }

    // password Update
    public function PasswordUpdate(Request $request){

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
            return redirect()->route('admin.login')->with($notifications);
        }else{
            $notifications = array('messege' => 'Old Password Not Match', 'alert-type' => 'error');
            return redirect()->back()->with($notifications);
        }


    }

}

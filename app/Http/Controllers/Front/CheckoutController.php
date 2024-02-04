<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Cart;
use Illuminate\Support\Facades\DB;
use Session;
use Mail;
use App\Mail\InvoiceMail;

class CheckoutController extends Controller
{
    // Checkout page
    public function Checkout()
    {

        if (!Auth::check()) {

            $notification = array('messege' => 'Login Your Account!', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }

        $content = Cart::content();
        return view('frontend.cart.checkout', compact('content'));
    }


    // Coupon Apply
    public function  ApplyCoupon(Request $request)
    {

        $check = DB::table('coupons')->where('coupon_code', $request->coupon)->first();

        if ($check) {
            //coupon Exist
            if (date('Y-m-d', strtotime(date('Y-m-d'))) <= date('Y-m-d', strtotime($check->valid_date))) {

                session::put('coupon', [
                    'name' => $check->coupon_code,
                    'discount' => $check->coupon_amount,
                    'after_discount' => Cart::subtotal() - $check->coupon_amount
                ]);

                $notification = array('messege' => 'Coupon Applied!', 'alert-type' => 'success');
                return redirect()->back()->with($notification);
            } else {

                $notification = array('messege' => 'Expired Coupon Code!', 'alert-type' => 'error');
                return redirect()->back()->with($notification);
            }
        } else {

            $notification = array('messege' => 'Invalid Coupon Code! Try Again', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        };
    }


    // Remove Coupon
    public function RemoveCoupon()
    {
        Session::forget('coupon');

        $notification = array('messege' => 'Coupon Removed!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    // order place 
    public function OrderPlace(Request $request){ 
        //pore nijer moto validation kore nite hobe

        $order = array();

        $order['user_id'] = Auth::id();
        $order['c_name'] = $request->c_name;
        $order['c_phone'] = $request->c_phone;
        $order['c_country'] = $request->c_country;
        $order['c_address'] = $request->c_address;
        $order['c_email'] = $request->c_email;
        $order['c_zipcode'] = $request->c_zipcode;
        $order['c_extra_phone'] = $request->c_extra_phone;
        $order['c_city'] = $request->c_city;

        if(Session::has('coupon')){
            $order['subtotal'] = Cart::subtotal();  //etao condition er bahire raKha jay
            $order['coupon_code'] = Session::get('coupon')['name'];
            $order['coupon_discount'] = Session::get('coupon')['discount'];
            $order['after_discount'] =  Session::get('coupon')['after_discount'];
        }else{
            $order['subtotal'] = Cart::subtotal(); //etao condition er bahire raKha jay
        }

        $order['total'] = Cart::total();
        $order['payment_type'] = $request->payment_type;
        $order['tax'] = 0;
        $order['shipping_charge'] = 0;
        $order['order_id'] = rand(1000,90000);
        $order['status'] = 0;
        $order['date'] = date('d-m-Y');
        $order['month'] = date('F');
        $order['year'] = date('Y');

        $order_id = DB::table('orders')->insertGetId($order); // get id for order_details table

        // Mail::to($request->c_email)->send(new InvoiceMail($order)); //for mail send,You can send to auth maio also


        // order_details table
        $content = Cart::content();

        $details = array();

        foreach($content as $row){
            $details['order_id'] = $order_id;
            $details['product_id'] = $row->id;
            $details['product_name'] = $row->name;
            $details['color'] = $row->options->color;
            $details['size'] = $row->options->size;
            $details['quantity'] = $row->qty;
            $details['single_price'] = $row->price;
            $details['subtotal_price'] = $row->price*$row->qty;
            
            DB::table('order_details')->insert($details);
        }

        Cart::destroy();

        if(Session::has('coupon')){
            Session::forget('coupon');
        }


        $notification = array('messege' => 'Successfully Order Placed!', 'alert-type' => 'success');
        return redirect()->to('/')->with($notification);
   
    }





}

<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    // for Authenticated user
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Review store

    public function store(Request $request)
    {


        $validated = $request->validate([
            'review' => 'required',
            'rating' => 'required',
        ]);

        $check = DB::table('reviews')->where('user_id', Auth::id())->where('product_id', $request->product_id)->first();

        if ($check) {
            $notification = array('messege' => 'Already you have a review with this product !', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }

        // quirybuilder
        $data = array();
        $data['user_id'] = Auth::id();
        $data['product_id'] = $request->product_id;
        $data['review'] = $request->review;
        $data['rating'] = $request->rating;
        $data['review_date'] = date('d-m-Y');
        $data['review_month'] = date('F');
        $data['review_year'] = date('Y');
        DB::table('reviews')->insert($data);


        $notifications = array('messege' => 'Thanks for review', 'alert-type' => 'success');
        return redirect()->back()->with($notifications);

        // return response()->json($data);
    }


    // Review for website
    public function write()
    {
        return view('user.review_write');
    }

    // Store Review for website
    public function StoreWebsiteReview(Request $request)
    {
        $check = DB::table('wbreviews')->where('user_id', Auth::id())->first();

        if ($check) {
            $notifications = array('messege' => 'Review already Exist', 'alert-type' => 'error');
            return redirect()->back()->with($notifications);
        }

        // quirybuilder
        $data = array();
        $data['user_id'] = Auth::id();
        $data['name'] = $request->name;
        $data['review'] = $request->review;
        $data['rating'] = $request->rating;
        $data['review_date'] = date('d, F Y');
        $data['status'] = 0;

        DB::table('wbreviews')->insert($data);

        $notifications = array('messege' => 'Thanks for review', 'alert-type' => 'success');
        return redirect()->back()->with($notifications);
    }
}

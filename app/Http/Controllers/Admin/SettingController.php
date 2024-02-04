<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
use File;

class SettingController extends Controller
{
    // for Authenticated user
    public function __construct()
    {
        $this->middleware('auth');
    }

    //  SEO setting 

    // show form
    public function seo()
    {
        $data = DB::table('seos')->first();
        return view('admin.setting.seo', compact('data'));
    }

    // update
    public function seoUpdate(Request $request, $id)
    {
        $data = array();

        $data['meta_title'] = $request->meta_title;
        $data['meta_author'] = $request->meta_author;
        $data['meta_tag'] = $request->meta_tag;
        $data['meta_keyword'] = $request->meta_keyword;
        $data['meta_description'] = $request->meta_description;
        $data['google_verification'] = $request->google_verification;
        $data['alexa_verification'] = $request->alexa_verification;
        $data['google_analytics'] = $request->google_analytics;
        $data['google_adsense'] = $request->google_adsense;

        DB::table('seos')->where('id', $id)->update($data);

        $notifications = array('messege' => 'SEO Setting Updated', 'alert-type' => 'success');
        return redirect()->back()->with($notifications);
    }


    //  SMTP setting 

    // show form
    public function smpt()
    {
        $smtp = DB::table('smtp')->first();
        return view('admin.setting.smpt', compact('smtp'));
    }

    // update
    public function smtpUpdate(Request $request, $id)
    {
        $data = array();

        $data['mailer'] = $request->mailer;
        $data['host'] = $request->host;
        $data['port'] = $request->port;
        $data['user_name'] = $request->user_name;
        $data['password'] = $request->password;

        DB::table('smtp')->where('id', $id)->update($data);

        $notifications = array('messege' => 'SMTP Setting Updated', 'alert-type' => 'success');
        return redirect()->back()->with($notifications);
    }


    // website setting 

    // show form
    public function website()
    {
        $setting = DB::table('settings')->first();
        return view('admin.setting.website_setting', compact('setting'));
    }

    //   Update
    public function websiteUpdate(Request $request, $id)
    {

        $data = array();

        $data['currency'] = $request->currency;
        $data['phone_one'] = $request->phone_one;
        $data['phone_two'] = $request->phone_two;
        $data['main_email'] = $request->main_email;
        $data['support_email'] = $request->support_email;
        $data['address'] = $request->address;
        $data['facebook'] = $request->facebook;
        $data['twitter'] = $request->twitter;
        $data['instagram'] = $request->instagram;
        $data['linkedin'] = $request->linkedin;
        $data['youtube'] = $request->youtube;

        // working with image
        if ($request->logo) {

               // delete old logo
               if (File::exists($request->old_logo)) {

                unlink($request->old_logo);
            }

            //new logo
            $logo = $request->logo;
            $logo_name = uniqid() . '.' . $logo->getClientOriginalExtension();
            // $photo->move('public/files/brand/',$photoname); //without image intervention
            Image::make($logo)->resize(320, 120)->save('public/files/setting/' . $logo_name); // image intervention
            $data['logo'] = 'public/files/setting/' . $logo_name;
        } else {
            $data['logo'] = $request->old_logo;
        }

        if ($request->favicon) {
            // delete old Favicon
            if (File::exists($request->old_favicon)) {

                unlink($request->old_favicon);
            }
            // new Favicon
            $favicon = $request->favicon;
            $favicon_name = uniqid() . '.' . $favicon->getClientOriginalExtension();
            // $photo->move('public/files/brand/',$photoname); //without image intervention
            Image::make($favicon)->resize(32, 32)->save('public/files/setting/' . $favicon_name); // image intervention
            $data['favicon'] = 'public/files/setting/' . $favicon_name;
        } else {
            $data['favicon'] = $request->old_favicon;
        }

        DB::table('settings')->update($data);

        $notifications = array('messege' => 'Website Updated Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notifications);
    }




}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;
use Hash;
use Auth;
use DB;
use \App\program;
use \App\verificationacc;
use \App\verificationlib;
use \App\accdebtor;
use App\user;
use App\propertylib;
use \App\libdebtor;
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
        if(Gate::allows('isSuper')){
            return view('SuperDashboard');
        }

        if(Gate::allows('isAdmin')){
            
            $wordCount1 = accdebtor::count();
            $wordCount2 = libdebtor::count();
            return view('Dashboard',compact('wordCount1','wordCount2'));

        }

        if(Gate::allows('isStudent')){
            
            $reg_no= Auth::user()->reg_no;
            //check if student is in debtor list
           // $debt = DB::table('accdebtors')->where('reg_no', $reg_no)->get();
            $debts = DB::table('libdebtors')->where('reg_no', $reg_no)->get();
            $pending = DB::table('verificationaccs')->where('reg_no', $reg_no)->get();

            //verification status
            $account = DB::table('accdebtors')->where('reg_no', $reg_no)->get();
            $pending2 = DB::table('verificationlibs')->where('reg_no', $reg_no)->get();
            //$lib = DB::table('libdebtors')->where('reg_no', $reg_no)->get();
            $property = DB::table('propertylibs')->where('reg_no', $reg_no)->get();
            $clear = DB::table('users')->where('isVerified', 1)->where('reg_no',$reg_no)->get();
            return view('StudentDashboard',compact('debts','pending','account','property','clear','pending2'));

        }

        if(Gate::allows('isLibrarian')){
            $wordCount2 = propertylib::count();
            $wordCount = libdebtor::count();
            return view('LibrarianDashboard',compact('wordCount','wordCount2'));
        }

        if(Gate::allows('isAccountant')){
        $wordCount = accdebtor::count();
        $wordCount1 = verificationacc::count();
        $wordCount3 = libdebtor::count();
        $wordCounta = verificationlib::count();
        $wordCount2 = user::count('user_type','student');
        return view('AccountantDashboard',compact('wordCount','wordCount1','wordCount2','wordCount3','wordCounta'));
        }
    }

    public function showChangePasswordForm(){
        return view('auth.security');
    }

    public function changePassword(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");

    }
}

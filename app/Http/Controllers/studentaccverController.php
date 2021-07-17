<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use DB;
use Auth;
use Carbon\Carbon;
class studentaccverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //code to display value that exist on debtors record
        $student = DB::table('users')
        ->select('users.id','users.name','users.reg_no','users.program','users.academic_year','users.hostel')
        ->where('users.user_type','student')->where('users.isVerified','0')->orderBy('users.academic_year','asc')
        ->leftjoin('accdebtors','accdebtors.reg_no','=','users.reg_no')
        ->whereNull('accdebtors.reg_no')
        ->leftjoin('libdebtors','libdebtors.reg_no','=','users.reg_no')
        ->whereNull('libdebtors.reg_no')
        ->leftjoin('propertylibs','propertylibs.reg_no','=','users.reg_no')
        ->whereNull('propertylibs.reg_no')
        ->paginate(8);
        
        // $student = user::where('user_type','student')->where('isVerified','0')->orderBy('academic_year','asc')->paginate(8);
        return view('vstudents',compact('student'));
    }
    public function verified()
    {
        $student = user::where('user_type','student')->where('isVerified','1')->orderBy('academic_year','asc')
        ->paginate(8);
        return view('verified',compact('student'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //$todayDate = Carbon::createFromFormat('m/d/Y g:i A', $todayDate);
        //$todayDate = Carbon::now();
        $name = Auth::user()->name;
        $student = user::find($id);
        $student= DB::table('users')
            ->where('id', $id)
            ->update(['isVerified' => 1, 'verifiedBy' => $name]);
        //$student->save();
        return redirect('/Verify_Students')->with('success','Student Verification Success!');
    }
    public function update2()
    {

        $reset= DB::table('users')
        ->where('user_type','student')
        ->where('isVerified','1')
        ->update(['isVerified' => 0, 'verifiedBy' =>NULL]);

        return redirect('/verified_student')->with('success','Reset Student Verification Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

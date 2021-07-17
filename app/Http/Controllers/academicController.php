<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\academicyear;
use DB;

class academicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ayear = academicyear::orderBy('academic_year','asc')->get();
        return view('Academic',compact('ayear'));
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
        $exist = DB::table('academicyears')->where('academic_year', 'LIKE', $request->input('ayear'))->first();        
      if($exist)  
        {
            return redirect('/Academic')->with('error','Academic Year Exist'); 
        }
        else{

            $ayear = new academicyear;
            $ayear->academic_year = $request->input('ayear');
            $ayear->save();
    
            return redirect('/Academic')->with('success','Academic Year Registered');
        }



        
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $ayear = academicyear::findorFail($request->id);
        $ayear->academic_year = $request->input('ayear');
        $ayear->save();
        return redirect('/Academic')->with('success','Academic Year Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $debt =DB::table('users')
        ->select('users.reg_no','users.name','users.program','verificationaccs.receipt','accdebtors.id')
        ->join('verificationaccs','verificationaccs.reg_no','=','users.reg_no')
        ->join('accdebtors','accdebtors.reg_no','=','users.reg_no')
        ->get();
        if($debt){
            return redirect('/Academic')->with('error','There still students on this Academic year who supposed to clear there debts');
        }else
        {
        $ayear = academicyear::find($id);
        $ayear->delete();
        return redirect('/Academic')->with('success','Academic Year Removed!');
        }
        
    }
}

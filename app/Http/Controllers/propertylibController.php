<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\program;
use App\propertylib;
use DB;

class propertylibController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $program =program::all();
        return view('propertydebtor',compact('program'));
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
        $check = DB::table('users')->where('reg_no',$request->input('regno'))->first();
        if($check)
        {
            $new = DB::table('users')->where(['isVerified' => 1])->first();
        if ($new)
        {
            return redirect('/property_debtor')->with('error','Student with this details has been arleady Verified');
        }

        else{
            $exist =DB::table('propertylibs')->where('reg_no',$request->input('regno'))->first();
            if($exist)  
             {
            return redirect('/property_debtor')->with('error','Student Must return the last property'); 
             }
             else{
            $debtor = new propertylib;
            $debtor->reg_no = $request->input('regno');
            $debtor->property_type = $request->input('ptype');
            $debtor->property = $request->input('property');
            $debtor->program = $request->input('pname');
            $debtor->code = $request->input('serial');
            $debtor->issue = $request->input('idate');
            $debtor->expiry = $request->input('xdate');
            $debtor->save();
    
            return redirect('/property_debtor')->with('success','Student Registered in Debtors List');
             }
           
        }
        
        }
        else{
            return redirect('/property_debtor')->with('error','Student with this details does not exist');
        }


//OLD
      //  $check = DB::table('users')->where('reg_no',$request->input('regno'))->first();
      //  if($check){
       //     $debtor = new propertylib;
       //     $debtor->reg_no = $request->input('regno');
       //     $debtor->property_type = $request->input('ptype');
       //     $debtor->property = $request->input('property');
       //     $debtor->program = $request->input('pname');
       //     $debtor->code = $request->input('serial');
         //   $debtor->issue = $request->input('idate');
        //    $debtor->expiry = $request->input('xdate');
       //     $debtor->save();
    
        //    return redirect('/property_debtor')->with('success','Student Registered in Debtors List');
       // }
       // else{
      //      return redirect('/property_debtor')->with('error','Student with that details does not exist');
      //  }
      
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prop = propertylib::find($id);
        $prop->delete();
        return redirect('/libproperty')->with('success','Student Return the Book !');
    }
}

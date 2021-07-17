<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\accdebtor;
use App\program;
use App\verificationacc;
use DB;

class debtorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $program =program::all();

        return view('adddebtor',compact('program'));
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
            return redirect('/adddebtor')->with('error','Student with this details has been arleady Verified');
        }

        else{
            $exist =DB::table('accdebtors')->where('reg_no',$request->input('regno'))->first();
            if($exist)  
             {
            return redirect('/adddebtor')->with('error','Student Must Verify his/her last debts '); 
             }
             else{
                $debtor = new accdebtor;
                $debtor->reg_no = $request->input('regno');
                $debtor->feename = $request->input('feename');
                $debtor->program = $request->input('pname');
                $debtor->amount = $request->input('amount');
                $debtor->signature = $request->input('signature');
                $debtor->save();
        
                return redirect('/adddebtor')->with('success','Student Registered in Debtors List'); 
             }
           
        }
        
        }
        else{
            return redirect('/adddebtor')->with('error','Student with this details does not exist');
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
    public function destroy($reg_no)
    {
        $debtor = accdebtor::find($reg_no);
        //$debtor = verificationacc::find($reg_no);
        $debtor->delete();
        //$verify->delete();
        return redirect('/accountStudentverify')->with('success','Student Verified!');
    }
}

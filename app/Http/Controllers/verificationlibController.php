<?php

namespace App\Http\Controllers;
use App\Http\Requests\PdfUploadRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\paymentmethod;
use App\verificationlib;
use App\libdebtor;
use DB;
use Auth;

class verificationlibController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment = paymentmethod::all();
         
        $reg_no= Auth::user()->reg_no;
        //check if student is in debtor list
        $hidden = DB::table('libdebtors')->where('reg_no', $reg_no)->get();
        return view('verifyLib',compact('payment','hidden'));
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
        $reg_no= Auth::user()->reg_no;
        $verify = new verificationlib;
        $verify->reg_no = $reg_no;
        $verify->id=$request->input('id');
       // $verify->receipt = $request->input('receipt');
       
        //$verify->save();

       // return redirect('/Dashboard')->with('success','Thank you your request will be verified soon');

      //  $reg_no= Auth::user()->reg_no;
       // $verify = verificationacc::create($request->all());
        $uniqueFileName = uniqid()  . '.' . $request->file('receipt')->getClientOriginalExtension();
        Storage::disk('local')->put('receipt',$request->file('receipt'));

        verificationlib::create([
            'id'=> $request->input('id'),
            'reg_no' =>$reg_no,
            'receipt' => $uniqueFileName
        ]);

        return redirect('/Dashboard')->with('success','Thank you your request will be verified soon');
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
        //
    }
}

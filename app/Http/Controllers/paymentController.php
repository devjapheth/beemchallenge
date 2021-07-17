<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\paymentmethod;

class paymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pay = paymentmethod::orderBy('id','desc')->paginate(4);
        return view('Payment',compact('pay'));
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
        $payment = new paymentmethod;
        $payment->paymentmethod = $request->input('pname');
        $payment->acc_no = $request->input('accno');
        $payment->save();

        return redirect('/Payment')->with('success','New Payment Method added');
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
    public function update(Request $request)
    {
        $pay = paymentmethod::findorFail($request->id);
        $pay->paymentmethod = $request->input('pname');
        $pay->acc_no = $request->input('accno');
        $pay->save();
        return redirect('/Payment')->with('success','Payment Details Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pay = paymentmethod::find($id);
        $pay->delete();
        return redirect('/Payment')->with('success','Payment Method Removed!');
    }
}

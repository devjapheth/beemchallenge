<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hostel;

class hostelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hostel = hostel::orderBy('id','desc')->paginate(4);
        return view('Hostel',compact('hostel'));
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
        $hostel = new hostel;
        $hostel->hostel = $request->input('hostelname');
        $hostel->save();

        return redirect('/Hostel')->with('success','New Hostel is added');
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
        $hostel = hostel::findorFail($request->id);
        $hostel->hostel = $request->input('hostelname');
        $hostel->save();
        return redirect('/Hostel')->with('success','Hostel Details Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $programz = hostel::find($id);
        $programz->delete();
        return redirect('/Hostel')->with('success','Hostel Removed!');
    }
}

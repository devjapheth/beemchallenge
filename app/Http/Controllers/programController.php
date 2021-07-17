<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\program;

class programController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programz = program::orderBy('program_name','asc')->paginate(4);
        return view('Program',compact('programz'));
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
        $programz = new program;
        $programz->program = $request->input('pname');
        $programz->program_name = $request->input('fname');
        $programz->save();

        return redirect('/Program')->with('success','New program is added');
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
        $programz = program::findorFail($request->id);
        $programz->program = $request->input('pname');
        $programz->program_name = $request->input('fname');
        $programz->save();
        return redirect('/Program')->with('success','Program Details Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $programz = program::find($id);
        $programz->delete();
        return redirect('/Program')->with('success','Program Removed!');
    }
}

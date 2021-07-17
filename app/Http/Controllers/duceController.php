<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class duceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $duce = User::where('user_type','admin')->orderBy('id','desc')->get();
        return view('dofficers',compact('duce'));
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
        $duce = new user;
        $duce->email = $request->input('email');
        $duce->user_type = $request->input('user_type');
        $duce->name = $request->input('fname');
        $duce->save();

        return redirect('/Add Operator')->with('success','New DUCE officer registered');
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
        $duce = User::find($id);
        $duce->delete();
        return redirect('/Duce')->with('success','Duce Officer  Removed!');
    }
}

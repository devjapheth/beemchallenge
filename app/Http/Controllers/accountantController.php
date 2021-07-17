<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class accountantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accountant = User::where('user_type','accountant')->orderBy('id','desc')->get();
        return view('aofficers',compact('accountant'));
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
        $accountant = new User;
        $accountant->email = $request->input('email');
        $accountant->user_type = $request->input('user_type');
        $accountant->name = $request->input('fname');
        $accountant->save();

        return redirect('/Accountant')->with('success','New Account officer registered');
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $accountant = User::find($id);
        $accountant->delete();
        return redirect('/Officer')->with('success','Officer  Removed!');
    }
}

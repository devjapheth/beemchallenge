<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\user;
use App\academicyear;
use App\program;
use App\hostel;
use Auth;
use DB;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = user::where('user_type','student')->orderBy('academic_year','asc')->paginate(8);
        $ayear = academicyear::all();
        $program =program::all();
        $hostel = hostel::all();

        return view('students',compact('student','ayear','program','hostel'));
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
    public function search(Request $request){
        
        $search = $request->get('$search');
        $student = user::where('user_type','student')->where('name','like','%'.$search.'%')->paginate(8);

        $ayear = academicyear::all();
        $program =program::all();
        $hostel = hostel::all();

        return view('students',compact('student','ayear','program','hostel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $exist = DB::table('users')->where('email', 'LIKE', $request->input('email'))->first();
        $exist2 = DB::table('users')->where('reg_no', 'LIKE', $request->input('regno'))->first();
        if($exist)  
          {
              return redirect('/Students')->with('error1','The email is taken already'); 
          }
          elseif ($exist2) {
            return redirect('/Students')->with('error2','Reg No ..already Exist'); 
          }
          else{
            $student = new user;
            $student->reg_no = $request->input('regno');
            $student->name = $request->input('fname');
            $student->program = $request->input('pname');
            $student->email = $request->input('email');
            $student->user_type = $request->input('user_type');
            $student->academic_year = $request->input('ayear');
            $student->accomodation = $request->input('atype');
            $student->hostel = $request->input('hname');
            $student->save();
    
            return redirect('/Students')->with('success','New Student registered');
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
    public function update(Request $request)
    {
      
        $reg_no= Auth::user()->reg_no;
        $student= DB::table('users')
            ->where('reg_no', $reg_no)
            ->update(['email' => $request->input('email'), 'contact' => $request->input('contact'),'accomodation' => $request->input('accomodation')
            ,'hostel' => $request->input('hostel'),'avatar'=>$request->file('avatar') ]);
            

       // $student-save();
        return redirect('/Dashboard')->with('success','Student Information is updated');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = user::find($id);
        $student->delete();
        return redirect('/Students')->with('success','Student Deleted!');
    }
}

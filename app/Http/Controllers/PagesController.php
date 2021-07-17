<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\program;
use App\hostel;
use App\academicyear;
use DB;
use App\accdebtor;
use Storage;
class PagesController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function report(){
        return view('report');
    }

    public function aoperator(){
        return view('operator');
    }

    public function search(){
        return view('search');
    }

    public function asearch(Request $Request){
        $ayear = academicyear::all();
        $program =program::all();
        $search = $Request->get('accountSearch');
        $result = DB::table('users')
        ->select('users.reg_no','users.name','users.program','users.academic_year')->where('reg_no','like','%'.$search.'%')->get();
        return view('accountSearch',compact('ayear','program','result'));

    }



    public function students(){
        return view('students');
    }

    public function aofficer(){
        return view('aofficers');
    }

    public function library(){
        return view('librarian');
    }

    public function account(){
        return view('account');
    }

    public function security(){
        return view('security');
    }

    public function studentedit(){
        $hostel = hostel::all();
        return view('editstudentinfo',compact('hostel'));
        //return view('editstudentinfo');
    }


    public function accountstudent(){
        $debt =DB::table('users')
        ->select('users.reg_no','users.name','users.program','users.contact','accdebtors.feename','accdebtors.amount')
        ->join('accdebtors','accdebtors.reg_no','=','users.reg_no')
        ->get();
        return view('accountStudent',compact('debt'));
    }

    public function accstudentverify(){
        //return response()->file($path_to_file);
        $debt =DB::table('users')
        ->select('users.reg_no','users.name','users.program','verificationaccs.receipt','accdebtors.id')
        ->join('verificationaccs','verificationaccs.reg_no','=','users.reg_no')
        ->join('accdebtors','accdebtors.reg_no','=','users.reg_no')
        ->get();
        return view('accverifystudent',compact('debt'));
    }
    public function libstudentverify(){
        $debt =DB::table('users')
        ->select('users.reg_no','users.name','users.program','verificationlibs.receipt','libdebtors.id')
        ->join('verificationlibs','verificationlibs.reg_no','=','users.reg_no')
        ->join('libdebtors','libdebtors.reg_no','=','users.reg_no')
        ->get();
        return view('libverifystudent',compact('debt'));
    }



    public function libstudent(){
        $debt =DB::table('users')
        ->select('users.reg_no','users.name','users.program','users.academic_year','libdebtors.feename','libdebtors.amount')
        ->join('libdebtors','libdebtors.reg_no','=','users.reg_no')
        ->get();
        return view('libStudent',compact('debt'));
    }

    public function acclist(){
        $debt =DB::table('users')
        ->select('users.reg_no','users.name','users.program','users.academic_year','accdebtors.feename','accdebtors.amount')
        ->join('accdebtors','accdebtors.reg_no','=','users.reg_no')
        ->get();
        return view('accountadmin',compact('debt'));
    }

    public function liblist(){
        $debt =DB::table('users')
        ->select('users.reg_no','users.name','users.program','users.academic_year','libdebtors.feename','libdebtors.amount')
        ->join('libdebtors','libdebtors.reg_no','=','users.reg_no')
        ->get();
        return view('libadmin',compact('debt'));
    }
    public function property(){
        $debt =DB::table('users')
        ->select('users.reg_no','users.name','users.program','users.academic_year','propertylibs.id','propertylibs.property_type','propertylibs.code','propertylibs.property','propertylibs.issue','propertylibs.expiry')
        ->join('propertylibs','propertylibs.reg_no','=','users.reg_no')
        ->get();
        return view('libproperty',compact('debt'));
    }

   





}

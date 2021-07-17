<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF; //don’t forget this
use DB;

class pdfController extends Controller
{
    public function view(){
        //return view('libpdf');
        
        $debt =DB::table('users')
        ->select('users.reg_no','users.name','users.program','users.academic_year','libdebtors.feename','libdebtors.amount')
        ->join('libdebtors','libdebtors.reg_no','=','users.reg_no')
        ->get();
        $pdf = PDF::loadView('libpdf',compact('debt'));
        return $pdf->download('libpdf.pdf');
    }

    public function view2(){
        //return view('libpdf');
        $debt =DB::table('users')
        ->select('users.reg_no','users.name','users.program','users.academic_year','accdebtors.feename','accdebtors.amount')
        ->join('accdebtors','accdebtors.reg_no','=','users.reg_no')
        ->get();
        $pdf = PDF::loadView('accpdf',compact('debt'));
        return $pdf->download('accpdf.pdf');
    }
    public function view3(){
       // return view('clearence');
       // $debt =DB::table('users')
       // ->select('users.reg_no','users.name','users.program','users.academic_year','accdebtors.feename','accdebtors.amount')
       // ->join('accdebtors','accdebtors.reg_no','=','users.reg_no')
      //  ->get();
      $pdf = PDF::loadView('clearence');
       return $pdf->download('clearence.pdf');
    }
}

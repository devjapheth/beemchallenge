<?php

namespace App\Http\Controllers;
use App\Http\Requests\PdfUploadRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\paymentmethod;
use App\verificationacc;
use App\accdebtor;
use DB;
use Auth;
use Response;
class verificationaccController extends Controller
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
        $hidden = DB::table('accdebtors')->where('reg_no', $reg_no)->get();
        return view('verifyClearance',compact('payment','hidden'));
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
        $verify = new verificationacc;
        $verify->reg_no = $reg_no;
        $verify->id=$request->input('id');
        $uniqueFileName = uniqid()  . '.' . $request->file('receipt')->getClientOriginalExtension();
        Storage::disk('local')->put('receipt',$request->file('receipt'));

        verificationacc::create([
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

    public function viewfile($id){
        $document = Document::findOrFail($id);

        $filePath = $document->file_path;

        // file not found
        if( ! Storage::exists($filePath) ) {
        abort(404);
        }

        $pdfContent = Storage::get($filePath);

        // for pdf, it will be 'application/pdf'
        $type       = Storage::mimeType($filePath);
        $fileName   = Storage::name($filePath);

        return Response::make($pdfContent, 200, [
        'Content-Type'        => $type,
        'Content-Disposition' => 'inline; filename="'.$fileName.'"'
        ]);
    }
}

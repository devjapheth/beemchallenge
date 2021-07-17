@extends('layouts.app2')

@section('bred')
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/Dashboard">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Verification</li>
        </ol>
      </nav>
@endsection
@section('content')
<div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-6">
                <h1 class="h3 mb-0 text-gray-800" style="font-weight:400;color:gray;font-size:23px;letter-spacing:5px;">Verify Payments</h1>
                <div class="btn-group mr-2" role="group" aria-label="First group">

            <a href="/Dashboard" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  style="color:rgb(242, 156, 43);font-weight:bold;"><i class="fas fa-arrow-left"></i> &nbsp; Back</a>
                </div>
              </div>

              <div class="row">

                    <div class="col-md-9">
                        <div class="card">
                                <div class="card-body">
                                        <form method="POST" action="/Verify" enctype="multipart/form-data">
                                          @csrf
                                          @foreach ($hidden as $row)
                                        <input hidden type="text" name="id" value="{{$row->id}}">
                                          @endforeach

                                            <div class="form-group">
                                                <input type="text" class="form-control" name="reg_no" id="exampleFormControlInput1"  value="{{ Auth::user()->reg_no }}" disabled >
                                              </div>
                                              <div class="jumbotron jumbotron-fluid">
                                                  <div class="container">
                                                  <p class="lead">Hellow <strong style="color:brown;">{{Auth::user()->name}}</strong> please upload a clean copy of your verified receipt which shows all transaction details</p>
                                                  <hr>
                                                  <div class="form-group">
                                                      <input type="file" name="receipt" style="border:1px solid gray;padding:6px;border-radius:4px;" class="form-control-file" id="exampleFormControlFile1">
                                                    </div>
                                                  </div>
                                                </div>

                                                

                                             <button type="submit" class="btn btn-sm btn-primary dark"><i class="fa fa-credit-card"></i>&nbsp; Submit</button>
                                        </form>

                                </div>
                              </div>
                    </div>

                    <div class="col-md-3 content-center">


                                        <img src="images/rcpt.jpg" height="400px" width="280px;">


                    </div>
                </div>





</div>



@endsection

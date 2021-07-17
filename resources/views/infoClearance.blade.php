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
                <h1 class="h3 mb-0 text-gray-800" style="font-weight:400;color:gray;font-size:23px;letter-spacing:5px;">Verify Account Debts</h1>
                <div class="btn-group mr-2" role="group" aria-label="First group">

            <a href="/Dashboard" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  style="color:rgb(242, 156, 43);font-weight:bold;"><i class="fas fa-arrow-left"></i> &nbsp; Back</a>
                </div>
              </div>

              <div class="row">

                    <div class="col-md-9">
                                    <div class="jumbotron">
                                        <h1 class="display-4">Hellow  {{ Auth::user()->name }}</h1>
                                        @if(count($debit) > 0)
                                        @foreach ($debit as $row )
                                        <p  class="lead" style="color:brown;"><strong>Your are Required To Pay, {{ $row->amount }} for {{ $row->feename }}</strong></p>
                                        <hr class="my-4">
                                        <p>If You arleady pay please upload document for verification</p>
                                        <a class="btn btn-primary dark" href="/Verify" role="button">Upload document to verify Now!</a>
                                        @endforeach
                                    @else
                                        <strong>Your have clear your debts</strong>
                                    @endif
                                      </div>


                    </div>

                    <div class="col-md-3 content-center">


                                        <img src="images/account.jpg" height="335px" width="280px;">


                    </div>
                </div>





</div>



@endsection

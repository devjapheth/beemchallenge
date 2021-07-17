@extends('layouts.app2')

@section('bred')
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/Dashboard">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Add Property Debtors</li>
        </ol>
      </nav>
@endsection
@section('content')
<div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-6">
                <h1 class="h3 mb-0 text-gray-800" style="font-weight:400;color:gray;font-size:23px;letter-spacing:5px;">ADD PROPERTY DEBTOR</h1>
                <div class="btn-group mr-2" role="group" aria-label="First group">

            <a href="/Dashboard" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  style="color:rgb(242, 156, 43);font-weight:bold;"><i class="fas fa-arrow-left"></i> &nbsp; Back</a>
                </div>
              </div>
              @csrf
              @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                           {{ session('success') }}
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                           </button>
                         </div>
                   @endif
                   @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                           {{ session('error') }}
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                           </button>
                         </div>
                   @endif
              <div class="row">

                    <div class="col-md-9">
                        <div class="card">
                                <div class="card-body">
                                        <form method="POST" action="/property_debtor">
                                            @csrf
                                            <div class="form-group">
                                              <label for="exampleFormControlInput1">Reg No</label>
                                              <input type="text" name="regno" class="form-control" id="exampleFormControlInput1" placeholder="Enter Reg No..." required>
                                            </div>

                                                  <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Program</label>
                                                        <select id="inputState" class="form-control" name="pname">
                                                                <option selected>Choose...</option>
                                                                @if(count($program) > 0)
                                                                @foreach ($program as $row )
                                                                <option>{{ $row->program }}</option>
                                                                @endforeach
                                                                @else
                                                                    <strong>No Program registered</strong>
                                                                @endif

                                                        </select>
                                                      </div>
                                                      <div class="row">
                                                          <div class="col-md-4">
                                                              <div class="form-group">
                                                                      <label for="exampleFormControlInput1">Property Type</label>
                                                                      <select id="inputState" class="form-control" name="ptype">
                                                                          <option selected>Choose...</option>
                                  
                                                                          <option>Book</option>
                                                                          <option>Journals</option>
                                                                          <option>Magazine</option>
                                                                          <option>Other</option>
                                                                  </select>
                                                                    </div>
                                                                          </div>
                                                        <div class="col-md-4">
                                            <div class="form-group">
                                                    <label for="exampleFormControlInput1">S/N</label>
                                                    <input type="text" name="serial" class="form-control" id="exampleFormControlInput1" placeholder="Eg. SB127" required>
                                                  </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Property Name</label>
                                                                <input type="text" name="property" class="form-control" id="exampleFormControlInput1" placeholder="Eg. Book Name(details)" required>
                                                              </div>
                                                        </div>
                                            
                                                      </div>
                                                      <div class="form-group">
                                                            <label for="exampleFormControlInput1">Issue Date</label>
                                                            <input type="date" name="idate" class="form-control" id="exampleFormControlInput1" placeholder="Ammount Needed.." required>
                                                          </div>

                                                          <div class="form-group">
                                                            <label for="exampleFormControlInput1">Return Date</label>
                                                            <input type="date" name="xdate" class="form-control" id="exampleFormControlInput1" placeholder="Ammount Needed.." required>
                                                          </div>

                                                      <button type="submit" class="btn btn-primary dark"><i class="fa fa-credit-card"></i>&nbsp;Add Debit</button>
                                        </form>

                                </div>
                              </div>
                    </div>

                    <div class="col-md-3 content-center">
                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                              <p class="lead">List of property like Books, Novels,Papers, Journels e.t.c has to be returned on time , if student did not return any property on time will be added in student debtors list where he or she will have to pay for the delayed time. </p>
                              <a class="btn btn-primary btn-sm" href="#" role="button">Currency allowed</a>
                              <img src="images/tanzania.png" height="25px" width="25px;">
                              <img src="images/usa.png" height="25px" width="25px;">
                            </div>
                          </div>

                     


                    </div>
                </div>





</div>
<br>



@endsection

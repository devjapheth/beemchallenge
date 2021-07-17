@extends('layouts.app2')

@section('bred')
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Student Dashboard</li>
        </ol>
      </nav>
@endsection
@section('content')
<div class="container-fluid">

              @csrf
              @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                           {{ session('success') }}
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                           </button>
                         </div>
                   @endif
                  
              <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header dark">
                            <h5 class="card-title" style="font-weight:bold;">STUDENT INFORMATION</h5>
                    </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="images/user1.png" style="height:150px;width:150px;border-radius:10px;">
                                   
                                    <a href="/StudentEdit" class="btn btn-primary dark btn-sm" style="width:150px;margin-top:10px;">
                                      <i class="fas fa-info-circle"></i> &nbsp;   EDIT 
                                    </a>
                                </div>
                                <div class="col-md-9">
                                        <table class="table">

                                                <tbody>
                                                  <tr>
                                                    <td class="ctd" style="font-weight:bold;border:none;color:black;text-transform:Uppercase;">Name</td>
                                                    <td  style="border:none;text-transform:Uppercase; font-weight:400;">{{ Auth::user()->name }} </td>
                                                    <td style="border:none;font-weight:400;text-transform:Uppercase;">{{ Auth::user()->academic_year }} </td>
                                                  </tr>
                                                  <tr>
                                                        <td style="font-weight:bold;border:none;color:black;text-transform:Uppercase;">Program</td>
                                                        <td style="border:none;font-weight:400;text-transform:Uppercase;">{{ Auth::user()->program }} </td>
                                                        <td style="border:none;font-weight:400;text-transform:Uppercase;">{{ Auth::user()->reg_no }} </td>
                                                      </tr>
                                                      <tr>
                                                            <td style="font-weight:bold;border:none;color:black;text-transform:Uppercase;">Contact</td>
                                                            <td style="border:none;font-weight:400;text-transform:Uppercase;">{{ Auth::user()->contact }} </td>
                                                            <td style="border:none;font-weight:400;text-transform:Uppercase;">{{ Auth::user()->email }} </td>
                                                          </tr>
                                                          <tr>
                                                                <td style="font-weight:bold;border:none;color:black;text-transform:Uppercase;">Plan</td>
                                                                <td style="border:none;font-weight:400;text-transform:Uppercase;">{{ Auth::user()->accomodation }} </td>
                                                                <td style="border:none;font-weight:400;text-transform:Uppercase;">{{ Auth::user()->hostel }} </td>
                                                              </tr>
                                                </tbody>
                                              </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header dark">
                                <h5 class="card-title" style="font-weight:bold;">DEBT CLEARENCE</h5>
                        </div>
                        <div class="card-body">
                                <table class="table" id="dataTable" width="100%" cellspacing="0">
                                        
                                        <tbody>
                                          <tr>
                                            <td style="border:none;color:black;font-weight:bold;">Account</td>
                                            <td style="border:none;text-align:center;">
                                                @if(count($pending) > 0)
                                                @foreach ($pending as $row )
                                                <button  class="btn btn-secondary btn-sm disabled">
                                                        <i class="fas fa-check-double" ></i> &nbsp; Pending
                                                      </button>
                                                @endforeach
                                              @elseif(count($account) > 0)
                                              @foreach ($account as $row )
                                              <a href="/infoVerify" class="btn btn-danger btn-sm">
                                                <i class="fas fa-eye" ></i> &nbsp; Verify
                                                  </a>
                                              @endforeach
                                              @else
                                                  <button  class="btn btn-success btn-sm disabled">
                                                    <i class="fas fa-check-double" ></i> &nbsp; Cleared
                                                  </button>
                                              @endif


                                            </td>
                                          </tr>

                                              <tr>
                                                    <td style="border:none;color:black;font-weight:bold;">Library</td>
                                                    <td style="border:none;text-align:center;">

                                                        @if(count($pending2) > 0)
                                                        @foreach ($pending2 as $row )
                                                        <button  class="btn btn-secondary btn-sm disabled">
                                                                <i class="fas fa-check-double" ></i> &nbsp; Pending
                                                              </button>
                                                        @endforeach
                                                      @elseif(count($debts) > 0)
                                                      @foreach ($debts as $row )
                                                      <a href="/libVerify" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-eye" ></i> &nbsp; Verify
                                                          </a>
                                                      @endforeach
                                                      @else
                                                          <button  class="btn btn-success btn-sm disabled">
                                                            <i class="fas fa-check-double" ></i> &nbsp; Cleared
                                                          </button>
                                                      @endif
                                                      <!--old-->
                                                      
                                                    </td>
                                                  </tr>

                                                  <tr>
                                                      <td style="border:none;color:black;font-weight:bold;">Property</td>
                                                      <td style="border:none;text-align:center;">
  
                                                        @if(count($property) > 0)
                                                        @foreach ($property as $row )
                                                        <a href="/property_Verify" class="btn btn-danger btn-sm">
                                                          <i class="fas fa-eye" ></i> &nbsp; Verify
                                                        </a>
                                                        @endforeach
                                                        @else
                                                            <button  class="btn btn-success btn-sm disabled">
                                                              <i class="fas fa-check-double" ></i> &nbsp; Cleared
                                                            </button>
                                                        @endif
                                                      </td>
                                                    </tr>



                                        </tbody>
                                      </table>
                        </div>
                        @foreach ($clear as $row )
                        <div class="dark2" style="background:gray;">
                            <h6 class="card-title" style="text-align:center;padding-top:4px;margin-top:15px;"><a href="/clearence" style="color:white;background:black;border-radius:10px;padding:9px;text-decoration:none;font-weight:400;"><img src="images/pdf2.png" style="height:30px;width:30px;border:1px solid #0c2a36;border-radius:100px;">&nbsp; Print Clearance</a></h6>
                    </div>
                    @endforeach
                    </div>

                </div>


              </div>

            
</div>
<br>
<div class="alert alert-danger" role="alert">
   <strong> A student will not be able to start a new academic year if clearance is not completed on time.</strong>
  </div>
  <br>



@endsection

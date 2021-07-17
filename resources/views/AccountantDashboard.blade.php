@extends('layouts.app2')

@section('bred')
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/Dashboard">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Accountant Dashboard</li>
        </ol>
      </nav>
@endsection
@section('content')
<div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-6">
                <h1 class="h3 mb-0 text-gray-800" style="font-weight:400;color:gray;font-size:23px;letter-spacing:5px;">SYSTEM OVERVIEW</h1>
                <div class="btn-group mr-2" role="group" aria-label="First group">
                       <!-- <a href="/AccountSearch" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="color:rgb(242, 156, 43);font-weight:bold;"><i class="fas fa-search"></i>&nbsp; Advance Search</a>-->
                        &nbsp;&nbsp;

            <a href="/adddebtor" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  style="color:rgb(242, 156, 43);font-weight:bold;"><i class="fas fa-credit-card"></i> &nbsp; Add Debtors</a>
                </div>
      </div>

<div class="row">



            <!-- Earnings (Monthly) Card Example -->
            <div class="col-md-4 mb-4" style="cursor:pointer;">
                <div class="card border-left-danger dark shadow h-100 py-2" style="border-radius:7px;">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-secondary text-uppercase mb-1" style="letter-spacing:4px;">LIBRARY DEBTORS </div>
                          <small class="text-danger">Total No of Library Debtors</small><div class="h5 mb-0 font-weight-bold text-gray-800">
                  {{$wordCount3}}
                          </div><hr>
                        <div class="text-xs font-weight-bold text-gray-800">

                          <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="/lib_list" class="btn btn-primary btn-sm" style="font-weight:bold;text-decoration:none;color:rgb(242, 156, 43);background:black;">SHOW</a>
                             &nbsp; &nbsp;
                              <a href="/libStudentverify" class="btn btn-primary">
                                  New Request <span class="badge badge-light">{{$wordCounta}}</span>
                              </a>
                            </div>
                      </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-book fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            <div class="col-md-4 mb-4" style="cursor:pointer;">
              <div class="card border-left-danger dark shadow h-100 py-2" style="border-radius:7px;">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h5 mb-0 font-weight-bold text-info text-uppercase mb-1" style="letter-spacing:4px;">ACC DEBTORS</div>
                        <small class="text-danger">Total No of Account Debtors</small><div class="h5 mb-0 font-weight-bold text-gray-800">
                {{$wordCount}}
                        </div><hr>
                      <div class="text-xs font-weight-bold text-gray-800">
                          <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="/accountStudent" class="btn btn-primary btn-sm" style="font-weight:bold;text-decoration:none;color:rgb(242, 156, 43);background:black;">SHOW</a>
                             &nbsp; &nbsp;
                              <a href="/accountStudentverify" class="btn btn-success">
                                 New Request <span class="badge badge-light">{{$wordCount1}}</span>
                              </a>
                            </div>
                        
                    </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-money-check-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

           
      

               <!-- Earnings (Monthly) Card Example -->
             <div class="col-md-4 mb-4" style="cursor:pointer;">
                <div class="card border-left-primary dark shadow h-100 py-2" style="border-radius:7px;">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-primary text-uppercase mb-1" style="letter-spacing:4px;">STUDENTS</div>
                          <small class="text-danger">Total registered Students</small><div class="h5 mb-0 font-weight-bold text-gray-800">
                              <?php
                              $con=mysqli_connect("localhost","root","","clearence");
                              // Check connection
                              if (mysqli_connect_errno())
                                {
                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                }
      
                              $sql="SELECT * FROM users WHERE user_type= 'student'";
      
                              if ($result=mysqli_query($con,$sql))
                                {
                                // Return the number of rows in result set
                                $rowcount=mysqli_num_rows($result);
                                echo $rowcount;
                                // Free result set
                                mysqli_free_result($result);
                                }
      
                              mysqli_close($con);
                              ?>
      
                          </div><hr>
                        <div class="text-xs font-weight-bold text-gray-800"><a href="/Verify_Students" class="btn btn-primary btn-sm " style="text-decoration:none;color:rgb(242, 156, 43);font-weight:bold;background:black;">VERIFY</a>
                      </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


</div>
<hr>
<div class="d-sm-flex align-items-center justify-content-between mb-6">
  <h1 class="h3 mb-0 text-gray-800" style="font-weight:400;color:gray;font-size:23px;letter-spacing:5px;">REPORT </h1>
  <div class="btn-group mr-2" role="group" aria-label="First group">
         <!-- <a href="/AccountSearch" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="color:rgb(242, 156, 43);font-weight:bold;"><i class="fas fa-search"></i>&nbsp; Advance Search</a>-->
          &nbsp;&nbsp;

<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  style="color:rgb(242, 156, 43);font-weight:bold;"><i class="fas fa-credit-card"></i> &nbsp; Generate Report</a>
  </div>
</div>

<div class="container">
    <div class="col-md-5">
        
      </div>
</div>

</div>



@endsection

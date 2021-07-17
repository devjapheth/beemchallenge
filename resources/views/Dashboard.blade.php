@extends('layouts.app2')

@section('bred')
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
      </nav>
@endsection
@section('content')
<div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-6">
                <h1 class="h3 mb-0 text-gray-800" style="font-weight:400;color:gray;font-size:23px;letter-spacing:5px;">SYSTEM OVERVIEW</h1>
                <div class="btn-group mr-2" role="group" aria-label="First group">

<!--generate button-->

            
                </div>
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

 
 <!-- Content Row -->
 <div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-4 col-md-4 mb-4" style="cursor:pointer;">
  <div class="card border-left-danger dark shadow h-100 py-2" style="border-radius:6px;" >
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="h5 mb-0 font-weight-bold text-primary text-uppercase mb-1">LIBRARY DEBTORS</div>
          <small class="text-danger">List of Library Student Debtors </small>
          <div class="h5 mb-0 font-weight-bold text-gray-800">{{$wordCount2}}</div>
          <hr>
          <div class="text-xs font-weight-bold text-gray-800"><a href="/lib_list" class="btn btn-primary btn-sm" style="text-decoration:none;color:rgb(242, 156, 43);background:black;">SHOW</a>
        </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-book fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-4 col-md-4 mb-4" style="cursor:pointer;">
  <div class="card border-left-danger dark shadow h-100 py-2" style="border-radius:6px;">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="h5 mb-0 font-weight-bold text-info text-uppercase mb-1">ACCOUNT DEBTORS</div>
          <small class="text-danger">List of Account Student Debtors </small>
          <div class="h5 mb-0 font-weight-bold text-gray-800">{{$wordCount1}}</div>
          <hr>
          <div class="text-xs font-weight-bold text-gray-800"><a href="/account_list" class="btn btn-primary btn-sm" style="text-decoration:none;color:rgb(242, 156, 43);background:black;">SHOW</a></div>
        </div>
        <div class="col-auto">
          <i class="fas fa-credit-card fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-xl-4 col-md-4 mb-4" style="cursor:pointer;">
        <div class="card border-left-success  dark shadow h-100 py-2"style="border-radius:6px;" >
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="h5 mb-0 font-weight-bold text-success text-uppercase mb-1">STUDENT REGISTRATION</div>
                <small class="text-info">Total Available Students</small>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
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

                </div>
                <hr>
                <div class="text-xs font-weight-bold text-gray-800"><a href="/Students" class="btn btn-primary btn-sm" style="text-decoration:none;color:rgb(242, 156, 43);background:black;">SHOW</a></div>
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
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-6">
            <h1 class="h3 mb-0 text-gray-800" style="font-weight:400;color:gray;font-size:23px;letter-spacing:5px;">REPORT </h1>
           
          </div>
          <div class="jumbotron">
              <p class="lead">To Generate the report of list of Student Debtors please Kindly press the Button to Download Your Report.</p>
              <hr class="my-4">
              <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#hostel" style="color:rgb(242, 156, 43);font-weight:bold;"><i class="fas fa-download"></i> &nbsp; Generate report</a>
            </div>
</div>

@endsection

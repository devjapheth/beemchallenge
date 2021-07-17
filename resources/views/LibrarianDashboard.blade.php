@extends('layouts.app2')

@section('bred')
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/Dashboard">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Librarian Dashboard</li>
        </ol>
      </nav>
@endsection
@section('content')
<div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-6">
                <h1 class="h3 mb-0 text-gray-800" style="font-weight:400;color:gray;font-size:23px;letter-spacing:5px;">DASHBOARD</h1>
                <div class="btn-group mr-2" role="group" aria-label="First group">
                       <!-- <a href="/AccountSearch" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="color:rgb(242, 156, 43);font-weight:bold;"><i class="fas fa-search"></i>&nbsp; Advance Search</a>-->
                        &nbsp;&nbsp;

           <!-- <a href="/libdebtor" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  style="color:rgb(242, 156, 43);font-weight:bold;"><i class="fas fa-credit-card"></i> &nbsp; Add Debtors</a>-->
                </div>
      </div>

<div class="row">



            <!-- Earnings (Monthly) Card Example -->
            <div class="col-md-6" style="cursor:pointer;">
              <div class="card border-left-danger shadow h-100 py-2 dark" style="border-radius:7px;">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h5 mb-0 font-weight-bold text-info text-uppercase mb-1" style="letter-spacing:4px;">CASH DEBTORS LIST</div>
                        <small class="text-danger">Total No of Debtors</small><div class="h5 mb-0 font-weight-bold text-gray-800">
                {{$wordCount}}
                        </div><hr>
                      <div class="text-xs font-weight-bold text-gray-800"><a href="/libdebtor" class="btn btn-primary btn-sm " style="text-decoration:none;color:rgb(242, 156, 43);background:black;">ADD DEBTOR</a> &nbsp;| &nbsp;<a href="/lib_list" class="btn btn-info btn-sm " style="text-decoration:none;color:black;">SHOW</a>
                    </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-money-check-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!--library return property-->
             <!-- Earnings (Monthly) Card Example -->
             <div class="col-md-6" style="cursor:pointer;">
              <div class="card border-left-success shadow h-100 py-2 dark" style="border-radius:7px;">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h5 mb-0 font-weight-bold text-success text-uppercase mb-1" style="letter-spacing:4px;">PROPERTY DEBTORS LIST</div>
                        <small class="text-danger">Total No of Debtors</small><div class="h5 mb-0 font-weight-bold text-gray-800">
                {{$wordCount2}}
                        </div><hr>
                      <div class="text-xs font-weight-bold text-gray-800"><a href="/property_debtor" class="btn btn-primary btn-sm dark" style="text-decoration:none;color:rgb(242, 156, 43);background:black;">ADD DEBTOR</a> &nbsp;| &nbsp;<a href="/libproperty" class="btn btn-success btn-sm " style="text-decoration:none;color:black;">SHOW</a>
                    </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-book fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


</div>



</div>
<hr>


@endsection

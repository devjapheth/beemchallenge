@extends('layouts.app2')
@section('bred')
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/Dashboard">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Add Operator</li>
        </ol>
      </nav>
@endsection
@section('content')

    <!--begin contents-->
    <div class="container-fluid">
         <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-6">
            <h1 class="h3 mb-0 text-gray-800" style="font-weight:400;color:gray;font-size:23px;letter-spacing:5px;">ADD DUS STAFF</h1>
                <a href="/Duce" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="color:rgb(242, 156, 43);font-weight:bold;"><i class="fas fa-user"></i>&nbsp; View Users</a>
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
        <!--row-->
        <div class="row">

            <div class="col-md-9">
                <div class="card">
                        <div class="card-header dark">
                                <h6 class="m-0 font-weight-bold">Create New User</h6>
                        </div>
                        <div class="card-body">
                                <form method="POST" action="/Add Operator">
                                    @csrf
                                         <!-- <div class="form-group">-->
                                                <!--<label for="exampleFormControlSelect1">User Type</label>-->
                                                <input type="hidden" class="form-control" id="exampleFormControlSelect1" value="admin" name="user_type" readonly>
                                              <!--</div>-->
                                    <div class="form-group">
                                      <label for="exampleFormControlInput1">Full Name</label>
                                      <input type="text" class="form-control"  name="fname" id="exampleFormControlInput1" placeholder="Enter Full Name..." required>
                                    </div>
                                    <div class="form-group">
                                            <label for="exampleFormControlInput1">E-mail</label>
                                            <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter E-mail address..." required>
                                          </div>

                                              <button type="submit" class="btn btn-primary dark"><i class="fa fa-user"></i>&nbsp;Add</button>
                                </form>

                        </div>
                      </div>
            </div>

            <div class="col-md-3 content-center">

                                <img src="images/duce.jpg" height="300px" width="280px;">



            </div>
        </div>
    </div><!--end container-->

@endsection

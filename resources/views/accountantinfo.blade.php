@extends('layouts.app2')

@section('bred')
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/Dashboard">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit My Details</li>
        </ol>
      </nav>
@endsection
@section('content')
<div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-6">
                <h1 class="h3 mb-0 text-gray-800" style="font-weight:400;color:gray;font-size:23px;letter-spacing:5px;">EDIT MY INFORMATION</h1>
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
                  <div class="col-md-4 content-center">


                      <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                          <p class="lead" style="text-align:center;">
                              <img class="img-profile rounded-circle" src="images/user.png" width="100px" height="100px">
                              <br>
                              <p  class="lead" style="text-align:justify;">
                                <i class="fas fa-user" ></i> &nbsp;  {{ Auth::user()->name }}
                              <br>
                              <i class="fas fa-id-card" ></i> &nbsp; {{ Auth::user()->user_type }}
                              <br>
                              <i class="fas fa-phone-volume" ></i> &nbsp;{{ Auth::user()->contact }}
                              <br>
                              <i class="fas fa-at" ></i> &nbsp;{{ Auth::user()->email }}
                              </p>
                          </p>
                        </div>
                      </div>


                    </div>

                    <div class="col-md-8">
                        <div class="card">
                                <div class="card-body">
                                        <form method="POST" action="/accountantinfo">
                                            @csrf
                                            {{ method_field('PUT') }}
                                                      <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Full Name <Address></Address></label>
                                                        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="{{ Auth::user()->name }}" required>
                                                      </div>
                                                  <div class="form-group">
                                                        <label for="exampleFormControlSelect1">E-mail <Address></Address></label>
                                                        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="{{ Auth::user()->email }}" required>
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Telephone <Address></Address></label>
                                                        <input type="text" name="contact" class="form-control" id="exampleFormControlInput1" placeholder="{{ Auth::user()->contact }}" required>
                                                      </div>
                                                    <button type="submit" class="btn btn-primary dark btn-sm">SUBMITT</button>
                                            </form>


                                </div>
                              </div>
                    </div>

                   
                </div>





</div>



@endsection

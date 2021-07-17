@extends('layouts.app2')

@section('bred')
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/Dashboard">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit Student Information</li>
        </ol>
      </nav>
@endsection
@section('content')
<div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-6">
                <h1 class="h3 mb-0 text-gray-800" style="font-weight:400;"><a href="/Dashboard" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  style="color:rgb(242, 156, 43);font-weight:bold;"><i class="fas fa-arrow-left"></i> &nbsp; Back</a></h1>
                <div class="btn-group mr-2" role="group" aria-label="First group">


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
              <div class="row">
                <div class="col-md-3 content-center">
                            
                        <img src="images/user1.png" height="200px" width="100%">
                        <p  class="lead" style="text-align:justify;">
                                <i class="fas fa-user" ></i> &nbsp;  {{ Auth::user()->name }}
                              <br>
                              <i class="fas fa-phone-volume" ></i> &nbsp;{{ Auth::user()->contact }}
                              <br>
                              <i class="fas fa-at" ></i> &nbsp;{{ Auth::user()->email }}
                              <br>
                              <i class="fas fa-book" ></i> &nbsp;{{ Auth::user()->program }}
                              <br>
                              <i class="fas fa-id-card" ></i> &nbsp;{{ Auth::user()->reg_no }}
                              </p>
                              <img src="images/arrow.png" height="40px" width="50px" style="float:right;">
                    </div>
                    <div class="col-md-9">
                        <div class="card">
                                <div class="card-header dark">
                                        <h5 class="card-title" style="font-weight:bold;">EDIT MY INFORMATION</h5>
                                </div>
                                <div class="card-body">
                                        <form  enctype="multipart/form-data" method="POST" action="/StudentEdit">
                                                <input type="hidden" value="1000000" name="MAX_FILE_SIZE"/>
                                                @csrf
                                                {{ method_field('PUT') }}

                                                <div class="row">
                                                        <div class="col-md-4">
                                                        <div class="form-group">
                                                         <input type="text"  class="form-control" id="exampleFormControlInput1" placeholder="{{ Auth::user()->name }}" disabled>
                                                         </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                                        <div class="form-group">
                                                                         <input type="text"  class="form-control" id="exampleFormControlInput1" placeholder="{{ Auth::user()->reg_no }}" disabled>
                                                                         </div>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                         <input type="text"  class="form-control" id="exampleFormControlInput1" placeholder="{{ Auth::user()->program }}" disabled>
                                                                                         </div>
                                                                                        </div>

                                                </div>
                                                
                                                  <div class="form-group">
                                                        <label for="exampleFormControlSelect1">E-mail <Address></Address></label>
                                                        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter Valid Email..">
                                                      </div>

                                                      <div class="form-group">
                                                            <label for="exampleFormControlSelect1">Telephone <Address></Address></label>
                                                            <input type="text" name="contact" class="form-control" id="exampleFormControlInput1" placeholder="Enter Valid Telephone No..">
                                                          </div>
                                                  <div class="row">
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                                <label for="exampleFormControlInput1">Accomodation Type</label>
                                                                <select id="inputState" class="form-control" name="accomodation">
                                                                        <option selected>Choose...</option>
                                                                        <option>In-Campus</option>
                                                                        <option>Off-Campus</option>
                                                                </select>
                                                        </div>
                                                    </div>
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                                <label for="exampleFormControlInput1">Hostel Name</label>
                                                                <select id="inputState" class="form-control" name="hostel">
                                                                        <option selected>Choose...</option>
                                                                        @if(count($hostel) > 0)
                                                                        @foreach ($hostel as $row )
                                                                        <option>{{ $row->hostel }}</option>
                                                                        @endforeach
                                                                        @else
                                                                            <strong>Nothing Here</strong>
                                                                        @endif
                                                                        <option>~~~</option>
                                                                </select>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <button type="submit"  class="btn btn-primary btn-sm dark">Update Student Information</button>
                                            </form>


                                </div>
                              </div>

                    </div>

                   
                        </form>
                            </div>
                    </div>
                </div>
<br>




</div>
<br>


@endsection

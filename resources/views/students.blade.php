@extends('layouts.app2')
@section('bred')
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/Dashboard">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Students</li>
        </ol>
      </nav>
@endsection
@section('content')

  <!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-6">
        <h1 style="font-weight:400;color:gray;font-size:23px;letter-spacing:5px;"> STUDENTS</h1>
        <div class="btn-group mr-2" role="group" aria-label="First group">

            <a href="/Dashboard" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  style="color:rgb(242, 156, 43);font-weight:bold;"><i class="fas fa-arrow-left"></i> &nbsp; Back</a>
            &nbsp;
          @can('isAdmin')  
          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#fac" style="color:rgb(242, 156, 43);font-weight:bold;"><i class="fas fa-user-graduate"></i> Add Students</a>
          @endcan
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
            
            @if(session('error1'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                         {{ session('error1') }}
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                         </button>
                       </div>
                 @endif
                 @if(session('error2'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                         {{ session('error2') }}
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                         </button>
                       </div>
                 @endif
 <!--modal add faculty-->
 <div class="modal fade" id="fac" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header dark">
          <h5 class="modal-title" id="exampleModalLabel" style="font-weight:400;"><i class="fas fa-user-graduate"></i>&nbsp; Add New Student</h5>
          <button type="button" class="close" data-dismiss="modal" style="color:red;" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                <form method="POST" action="/Students">
                    @csrf
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                            <label for="exampleFormControlInput1">Reg_No</label>
                            <input type="text" name="regno" class="form-control" id="exampleFormControlInput1" placeholder="Enter Registration No..." required>
                    </div>
                </div>
                    <div class="col-md-6">
                    <div class="form-group">
                            <label for="exampleFormControlInput1">Admission Year </label>
                            <select id="inputState" class="form-control" name="ayear" required>
                            <option selected>Choose...</option>
                            @if(count($ayear) > 0)
                            @foreach ($ayear as $row )
                            <option>{{ $row->academic_year }}</option>
                            @endforeach
                            @else
                                <strong>Nothing Here</strong>
                            @endif

                    </select>
                    </div>
                </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Full Name </label>
                    <input type="text" name="fname" class="form-control" id="exampleFormControlInput1" placeholder="Enter Full Name..." required>
            </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Program</label>
                    <select id="inputState" class="form-control" name="pname" required>
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
                  <div class="form-group">
                        <!--<label for="exampleFormControlSelect1">User Type</label>-->
                        <?php echo '<input type="hidden" class="form-control" id="exampleFormControlSelect1" value="student" name="user_type" readonly>'?>
                      </div>
                  <div class="form-group">
                        <label for="exampleFormControlSelect1">E-mail <Address></Address></label>
                        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter Valid Email.." required>
                      </div>
                  <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                                <label for="exampleFormControlInput1">Accomodation Type</label>
                                <select id="inputState" class="form-control" name="atype" required>
                                        <option selected>Choose...</option>
                                        <option>In-Campus</option>
                                        <option>Off-Campus</option>
                                </select>
                        </div>
                    </div>
                        <div class="col-md-6">
                        <div class="form-group">
                                <label for="exampleFormControlInput1">Hostel Name</label>
                                <select id="inputState" class="form-control" name="hname" required>
                                        <option selected>Choose...</option>
                                        @if(count($hostel) > 0)
                                        @foreach ($hostel as $row )
                                        <option>{{ $row->hostel }}</option>
                                        @endforeach
                                        @else
                                            <strong>Nothing Here</strong>
                                        @endif
                                        <option>NONE</option>
                                </select>
                        </div>
                    </div>

                    </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary dark">Add</button>
        </div>
    </form>
      </div>
    </div>
  </div>

 <!--end modal-->

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3 dark">
    <h6 class="m-0 font-weight-bold">List of Students</h6>
   
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
        <thead>
                @if(count($student) > 0)
          <tr>
            <th>Reg No</th>
            <th>Student Name</th>
            <th>Program</th>
            <th>Year</th>
            <th>Accomodation</th>
            <th>Hostel</th>
            @can('isSuper')
            <th style="text-align:center;">Action</th>
            @endcan
          </tr>
        </thead>
        <tbody>
            @foreach ( $student as $row)


          <tr>
            <td>{{ $row->reg_no }}</td>
            <td>{{ $row->name }}</td>
            <td>{{ $row->program }}</td>
            <td>{{ $row->academic_year }}</td>
            <td>{{ $row->accomodation }}</td>
            <td>{{ $row->hostel }}</td>

            @can('isSuper')
             <td style="text-align:center;">
              <div class="btn-group">
              <button type="submit"  data-id="{{$row->id}}" data-name="{{$row->name}}" data-reg_no="{{$row->reg_no}}" data-program="{{$row->program}}" data-academic_year="{{ $row->academic_year }}" data-accomodation="{{ $row->accomodation }}"
                data-hostel="{{ $row->hostel }}" data-contact="{{ $row->contact }}" data-email="{{ $row->email }}"
                        data-target="#dt" data-toggle="modal" id="bt" name="update" class="btn btn-sm btn-info" >View &nbsp; <i class="fa fa-eye"> </i> </button>
                        &nbsp;|&nbsp;

                  <form action="{{ url('Students' , $row->id ) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                  <button type="submit" class="btn btn-sm btn-danger ">
                       Delete <i class="fas fa-trash-alt"></i>
                </button>
                </form>
            </div>

            </td>
            @endcan
          </tr>
          @endforeach
          @else
          <div class="alert alert-info">
              <span class="fa fa-info-circle  f-right"></span> &nbsp; &nbsp; There Is Nothing Here!
           </div>

          @endif
        </tbody>
      </table>
      {{ $student->links() }}
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<div class="modal fade" id="dt" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
        <div class="modal-header dark">
           <h5 class="modal-title" id="exampleModalLabel">Student Information</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
           </button>
        </div>
        @foreach($program as $row)
        <form  action="{{ url('Students',$row->id) }}" method="GET">
         {{csrf_field()}}
         @endforeach
        <div class="modal-body">
               <input type="hidden" name="id" id="id" value="">
               <div class="img" style="width:150px;margin:auto;">
                    <img src="images/logo2.jpg" style="height:150px;width:150px;border:1px solid #0c2a36;border-radius:100%;">
               </div>
                <div class="t">
                  <div class="card ">
                        <table class="table table-borderless">

                                <tbody>
                                  <tr>
                                    <td class="ctd" style="font-weight:bold;border:none;color:black;">Name</td>
                                   <td style="border:none;"> <input readonly  style="border:none;text-transform:lower case;font-weight:400;"id="name"></td>
                                   
                                  </tr>
                                  <tr>
                                      <td class="ctd" style="font-weight:bold;border:none;color:black;">Admission Year</td>
                                      <td style="border:none;"> <input readonly style="border:none;font-weight:400;" id="academic_year"></td>
                                  </tr>
                                  <tr>
                                        <td style="font-weight:bold;border:none;color:black;">Program</td>
                                       <td style="border:none;"> <input readonly style="border:none;font-weight:400;" id="program"> </td>
                                  </tr>
                                  <tr>
                                      <td style="font-weight:bold;border:none;color:black;">Registration</td>
                                       <td style="border:none;"> <input readonly style="border:none;font-weight:400;" id="reg_no"> </td>
                                      </tr>
                                      <tr>
                                            <td style="font-weight:bold;border:none;color:black;">Contact</td>
                                           <td style="border:none;"> <input readonly style="border:none;font-weight:400;" id="contact"></td>
                                      </tr>
                                      <tr>
                                          <td style="font-weight:bold;border:none;color:black;">Email Address</td>
                                            <td style="border:none;"> <input readonly style="border:none;font-weight:400;" id="email"></td>
                                          </tr>
                                          <tr>
                                                <td style="font-weight:bold;border:none;color:black;">Plan</td>
                                               <td style="border:none;"> <input readonly style="border:none;font-weight:400;" id="accomodation"></td>
                                          </tr>
                                          <tr>
                                              <td style="font-weight:bold;border:none;color:black;">Hostel </td>
                                               <td style="border:none;"> <input readonly style="border:none;font-weight:400;" id="hostel"> </td>
                                              </tr>
                                </tbody>
                              </table>
                  </div>
                </div>
            
              
        </div>
       </form>

     </div>
</div>


@endsection

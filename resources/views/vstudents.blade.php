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
        <h1 style="font-weight:400;color:gray;font-size:23px;letter-spacing:5px;"> VERIFY STUDENTS</h1>
        <div class="btn-group mr-2" role="group" aria-label="First group">
            <a href="/Dashboard" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="color:rgb(242, 156, 43);font-weight:bold;"><i class="fas fa-arrow-left"></i>Back</a>
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
            <th>Hostel</th>
            <th style="text-align:center;">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ( $student as $row)


          <tr>
            <td>{{ $row->reg_no }}</td>
            <td>{{ $row->name }}</td>
            <td>{{ $row->program }}</td>
            <td>{{ $row->academic_year }}</td>
            <td>{{ $row->hostel }}</td>
            <td style="text-align:center;">
                <form method="POST" action="{{ url('Verify_Students' , $row->id ) }}">
                  @csrf
                  {{ method_field('PUT') }}
          <button type="submit" class="btn btn-info  btn-sm">
              <i class="fas fa-check"></i> &nbsp; Verify
            </button>
            </form>
            </td>
          </tr>
          @endforeach
          @else
          <div class="alert alert-danger">
              <span class="fa fa-info-circle  f-right"></span> &nbsp; &nbsp; There might be students with multiple debts!
           </div>

          @endif
        </tbody>
      </table>
      {{ $student->links() }}
    </div>
  </div>
</div>

</div>
<br>
<a href="/verified_student" class="btn btn-info dark  btn-sm">
  <i class="fas fa-info"></i> &nbsp; List of Verified Student
</a>


<!-- /.container-fluid -->
<br>
<br>
<hr>
<div class="alert alert-info">
  <span class="fa fa-info-circle  f-right"></span> &nbsp; &nbsp; This shows only student that have been arleady verified by account officers
</div>



@endsection

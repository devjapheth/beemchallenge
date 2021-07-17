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
        <h1 style="font-weight:400;color:gray;font-size:23px;letter-spacing:5px;"> VERIFIED STUDENTS</h1>
        <div class="btn-group mr-2" role="group" aria-label="First group">
            <a href="/Verify_Students" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="color:rgb(242, 156, 43);font-weight:bold;"><i class="fas fa-arrow-left"></i>Back</a>
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
            <th style="text-align:center;">Verified By</th>
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
                {{ $row->verifiedBy }}
            </td>
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
<br>
<form method="POST" action="/Reset">
  @csrf
  {{ method_field('PUT') }}
<button type="submit" class="btn btn-secondary  btn-sm">
<i class="fas fa-check"></i> &nbsp; Reset Student Verification!
</button>


</form>
<!-- /.container-fluid -->
<br>




@endsection

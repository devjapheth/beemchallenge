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
        <h1 style="font-weight:400;color:gray;font-size:23px;letter-spacing:5px;"> List of Library Debtors</h1>
        <div class="btn-group mr-2" role="group" aria-label="First group">

            <a href="/Dashboard" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="color:rgb(242, 156, 43);font-weight:bold;"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
            &nbsp;
            <!--button to print-->
        <a href="{{url('/libpdf')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="color:rgb(242, 156, 43);font-weight:bold;background:black;"><i class="fas fa-print"></i>&nbsp;Print</a>
          
            
        </div>
     </div>


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3 dark">
    <h6 class="m-0 font-weight-bold">List of Students</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
        
        
      <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Reg No</th>
            <th>Student Name</th>
            <th>Program</th>
            <th>Admission</th>
            <th>Debt</th>
            <th>Amount</th>
          </tr>
        </thead>
        <tbody>
            @foreach ( $debt as $row )
            <tr>
            <td>{{ $row->reg_no }}</td>
            <td>{{$row->name }}</td>
            <td>{{ $row->program }}</td>
            <td>{{ $row->academic_year }}</td>
            <td>{{ $row->feename }}</td>
            <td>{{ $row->amount }}</td>
          </tr>
         
          @endforeach
         
        </tbody>
      </table>
     
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->




@endsection

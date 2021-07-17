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
        <h1 style="font-weight:400;color:gray;font-size:23px;letter-spacing:5px;"> PROPERTY DEBTORS</h1>
        <div class="btn-group mr-2" role="group" aria-label="First group">

            <a href="/Dashboard" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="color:rgb(242, 156, 43);font-weight:bold;"><i class="fas fa-arrow-left"></i>Back</a>
            &nbsp;
            <!--button to print-->
        <a href="{{url('/libpdf')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="color:rgb(242, 156, 43);font-weight:bold;background:black;"><i class="fas fa-print"></i>&nbsp;Print</a>
          
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
       
        
        <table id="dtBasicExample" class="table table-striped" cellspacing="0" width="100%">
        <thead>
            
          <tr>
            <th>Reg No</th>
            <th>Student Name</th>
            <th>Program</th>
            <th>Admission</th>
            <th>Property Type</th>
            <th>Serial Code</th>
            <th>Property Name</th>
            <th>Issue Date</th>
            <th>Return Date</th>
            <th>Action</th>

          </tr>
        </thead>
        <tbody>
            @foreach ( $debt as $row )
            <tr>
            <td>{{ $row->reg_no }}</td>
            <td>{{$row->name }}</td>
            <td>{{ $row->program }}</td>
            <td>{{ $row->academic_year }}</td>
            <td>{{ $row->property_type }}</td>
            <td>{{ $row->code}}</td>
            <td>{{ $row->property }}</td>
            <td>{{ $row->issue }}</td>
            <td>{{ $row->expiry }}</td>
            <td style="text-align:center;">
                    <div class="btn-group">
                              <form action="{{ url('property_debtor' , $row->id ) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                              <button type="submit" class="btn btn-sm btn-success ">
                                   Clear <i class="fas fa-trash-alt"></i>
                            </button>
                            </form>
                        </div>

  </td>
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

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
        <h1 style="font-weight:400;color:gray;font-size:23px;letter-spacing:5px;">Account Verification Request</h1>
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
    <div class="tbl">
      @if(count($debt)>0)
      @foreach ( $debt as $row )
      <table class=" table table-striped" >
        <thead>
          <tr>
            <th>Reg No</th>
            <th>Name</th>
            <th>Program</th>
            <th>Receipt</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

            <tr>
            <td>{{ $row->reg_no }}</td>
            <td>{{$row->name }}</td>
            <td>{{ $row->program }}</td>
            <td>{{ $row->receipt }}</td>
            
            <td>
                <div class="btn-group">
                    <form action="{{ url('Verifylib' , $row->id ) }}">
                        {{ csrf_field() }}
                <button  type="submit" class="btn btn-sm btn-primary ">
                    <i class="fas fa-eye"></i> &nbsp; view
              </button>
                    </form>
              &nbsp; | &nbsp;
                    <form action="{{ url('libdebtor' , $row->id ) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                      <button type="submit" class="btn btn-sm btn-success ">
                          <i class="fas fa-check"></i> &nbsp; Clear
                    </button>
                    </form>
                </div>
            </td>
          </tr>


        </tbody>
      </table>
      @endforeach
      @else
      <div class="alert alert-primary" role="alert">
          There is no any new request please come back letter!
      </div>
         @endif

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->




@endsection

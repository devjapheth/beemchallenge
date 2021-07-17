@extends('layouts.app2')
@section('bred')
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/Dashboard">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Account</li>
        </ol>
      </nav>
@endsection
@section('content')

  <!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-6">
      <h1 class="h3 mb-0 text-gray-800" style="font-weight:400;color:gray;font-size:23px;letter-spacing:5px;"> ACCOUNT OFFICERS</h1>
        <a href="/Accountant" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="color:rgb(242, 156, 43);font-weight:bold;"><i class="fas fa-arrow-left"></i>&nbsp; Back</a>
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
    <h6 class="m-0 font-weight-bold">List of Account Officer</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
        <thead>
                @if(count($accountant) > 0)
          <tr>
            <th style="text-align:center;">Officer Name</th>
            <th style="text-align:center;">email</th>
            <th style="text-align:center;">Contact</th>
            <th style="text-align:center;">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ( $accountant as $row)


          <tr>
            <td style="text-align:center;">{{ $row->name }}</td>
            <td style="text-align:center;">{{ $row->email }}</td>
            <td style="text-align:center;">{{ $row->contact }}</td>
                    <td style="text-align:center;">
                        <div class="btn-group">
                            <button type="submit"  data-id="{{$row->id}}" data-name="{{$row->name}}"
                              data-target="#edit" data-toggle="modal" id="bt" name="update" class="btn btn-sm btn-info " >View &nbsp; <i class="fa fa-info"> </i> </button>
                              &nbsp;

                              <form action="{{ url('Officer' , $row->id ) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                              <button type="submit" class="btn btn-sm btn-danger ">
                                   Delete <i class="fas fa-trash"></i>
                            </button>
                            </form>
                        </div>
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
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->




@endsection

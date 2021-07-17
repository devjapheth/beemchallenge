@extends('layouts.app2')
@section('bred')
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/Dashboard">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Accomodation management </li>
        </ol>
      </nav>
@endsection
@section('content')

    <!--begin contents-->
    <div class="container-fluid">
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
                <div class="card">
                        <div class="card-header dark">
                                <h6 class="m-0 font-weight-bold">Register Hostel </h6>
                        </div>
                        <div class="card-body">
                                <form method="POST" action="/Hostel">
                                    @csrf
                                    <div class="form-group">
                                      <label for="exampleFormControlInput1">Hostel Name</label>
                                      <input type="text" name="hostelname" class="form-control" id="exampleFormControlInput1" placeholder="Eg. JITEGEMEE" required>
                                    </div>
                                              <button type="submit" class="btn btn-primary dark"><i class="fa fa-user"></i>&nbsp;Add</button>
                                </form>

                        </div>
                      </div>
                      <hr>
                      <div class="row">
                          @if(count($hostel) > 0)
                          
                          @foreach ( $hostel as $row)
                
                          <div class="col-md-3" style="cursor:pointer;">
                              <div class="card border-left-secondary  shadow h-100 py-2">
                                <div class="card-body">
                                  <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                      <div class="h5 mb-0 font-weight-bold text-secondary text-uppercase mb-1" style="color:black;">{{ $row->hostel }}</div>
                                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                                      <hr>
                                          <div class="btn-group">
                                              <button type="submit"  data-id ="{{$row->id}}" data-hostel ="{{$row->hostel}}"
                                                      data-target="#hostel" data-toggle="modal" id="bt" name="update" class="btn btn-sm btn-info" >Edit &nbsp; <i class="fa fa-edit"> </i> </button>

                                                      &nbsp;|&nbsp;

                                                <form action="{{ url('Hostel' , $row->id ) }}" method="POST">
                                                      {{ csrf_field() }}
                                                      {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-sm btn-danger ">
                                                     Delete <i class="fas fa-trash-alt"></i>
                                              </button>
                                              </form>
                                          </div>

                                      </div>
                                    </div>
                                    <div class="col-auto">
                                      <i class="fas fa-building fa-2x text-gray-300"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                      
                          
                            @endforeach
                            @else
                            <div class="alert alert-info">
                                <span class="fa fa-info-circle  f-right"></span> &nbsp; &nbsp; There Is Nothing Here!
                             </div>

                            @endif
                          
                          {{ $hostel->links() }}

                          <div class="modal fade" id="hostel" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                               <div class="modal-content">
                                  <div class="modal-header dark">
                                     <h5 class="modal-title" id="exampleModalLabel">Update Hostel Information</h5>
                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                     </button>
                                  </div>
                                  @foreach($hostel as $row)
                                  <form  action="{{ url('Hostel',$row->id) }}" method="POST">
                                   {{method_field('PATCH')}}
                                   {{csrf_field()}}
                                   @endforeach
                                  <div class="modal-body">
                                         <input type="hidden" name="id" id ="id" value="" />
                                            <div class="form-group">
                                              <label for="exampleFormControlInput1">Hostel Name</label>
                                              <input type="text" name="hostelname"  id="hostel" class="form-control" />
                                            </div>
                                  </div>
                                  <div class="modal-footer">
                                     <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                     <button type="submit"  class="btn btn-success btn-sm">Save changes</button>
                                  </div>
                                 </form>

                               </div>
                            </div>

    </div><!--end container-->

@endsection

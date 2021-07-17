@extends('layouts.app2')
@section('bred')
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/Dashboard">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Add Academic details</li>
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

                 @if(session('error'))
                       <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              {{ session('error') }}
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                      @endif
        <!--row-->
        <div class="row">
        <div class="col-md-4">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                  <p class="lead">Academic Year when deleted or edited it will change or remove student from the system</p>
                </div>
              </div>

        </div>
        <div class="col-md-8">
                <div class="card">
                        <div class="card-header dark">
                                <h6 class="m-0 font-weight-bold">Register Academic Year</h6>
                        </div>
                        <div class="card-body">
                                <form method="POST" action="/Academic">
                                    @csrf
                                    <div class="form-group">
                                      <label for="exampleFormControlInput1">Academi Year</label>
                                      <input type="text" name="ayear" class="form-control" id="exampleFormControlInput1" placeholder="Eg. 2016/2017" required>
                                    </div>
                                              <button type="submit" class="btn btn-primary dark"><i class="fa fa-calendar-alt"></i>&nbsp;Add</button>
                                </form>

                        </div>
                </div>
                      </div>
                      <hr>
                      <div class="table-responsive">
                            <table class="table table-striped" id="dataTable" width="100%" cellspacing="0" style="background:white;">
                              <thead>
                                      @if(count($ayear) > 0)
                                <tr>
                                  <th>Academi Year</th>
                                  <th style="text-align:center;">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                  @foreach ( $ayear as $row)
                                <tr>
                                  <td>{{ $row->academic_year }}</td>
                                  <td style="text-align:center;">
                                        <div class="btn-group">
                                                <button type="submit"  data-id="{{$row->id}}" data-academic_year="{{$row->academic_year}}"
                                                        data-target="#edit" data-toggle="modal" id="bt" name="update" class="btn btn-sm btn-info" >Edit &nbsp; <i class="fa fa-edit"> </i> </button>
                                                        &nbsp;|&nbsp;

                                                  <form action="{{ url('Academic' , $row->id ) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                  <button type="submit" class="btn btn-sm btn-danger ">
                                                       Delete <i class="fas fa-trash-alt"></i>
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
                          <!-- Modal -->

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
           <div class="modal-content">
              <div class="modal-header dark">
                 <h5 class="modal-title" id="exampleModalLabel">Update Academic Information</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
                 </button>
              </div>
              @foreach($ayear as $row)
              <form  action="{{ url('Academic',$row->id) }}" method="POST">
               {{ method_field('patch') }}
               {{csrf_field()}}
               @endforeach
              <div class="modal-body">

                     <input type="hidden" name="id" id="id" value="">
                        <div class="form-group">
                          <label for="exampleFormControlInput1">Academi Year</label>
                          <input type="text" name="ayear" class="form-control" id="academic_year" >
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

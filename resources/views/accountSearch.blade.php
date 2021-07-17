@extends('layouts.app2')
@section('bred')
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/Dashboard">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Quick Search</li>
        </ol>
      </nav>
@endsection

@section('content')

    <!--begin contents-->
    <div class="container-fluid">
         <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-6">
                <h1 class="h3 mb-0 text-gray-800">Advanced Search</h1>
                <a href="/Dashboard" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="color:rgb(242, 156, 43);font-weight:bold;"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
        </div>

        <div class="row">
            <div class="card col-md-12">
                <div class="card-body">
                        <form class="form-inline" method="POST" action="/AccountSearch">
                            @csrf
                                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Reg No :</label>
                                <input type="text" name="reg_no" class="form-control" id="exampleInputEmail1" placeholder="Enter Reg No">
                                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Program Name :</label>
                                <select id="inputState" class="form-control" name="pname">
                                        <option selected>Choose...</option>
                                        @if(count($program) > 0)
                                        @foreach ($program as $row )
                                        <option>{{ $row->program }}</option>
                                        @endforeach
                                        @else
                                            <strong>No Program registered</strong>
                                        @endif

                                </select>
                                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Addmission Year :</label>
                                <select id="inputState" class="form-control" name="ayear">
                                        <option selected>Choose...</option>
                                        @if(count($ayear) > 0)
                                        @foreach ($ayear as $row )
                                        <option>{{ $row->academic_year }}</option>
                                        @endforeach
                                        @else
                                            <strong>Nothing Here</strong>
                                        @endif

                                </select>
                                <button type="submit" class="btn btn-primary dark"><i class="fas fa-search"></i>&nbsp;Perform Quick Search</button>
                              </form>
                </div>
            </div>
        </div>
        <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Reg No</th>
                      <th>Student Name</th>
                      <th>Program</th>
                      <th>Admission Year</th>
                      <th>Debt</th>
                      <th>Amount</th>
                      <th style="text-align:center;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ( $result as $row )
                      <tr>
                      <td>{{ $row->reg_no }}</td>
                      <td>{{$row->name }}</td>
                      <td>{{ $row->program }}</td>
                      <td>{{ $row->academic_year }}</td>
                      <td></td>
                      <td></td>
                      <td style="text-align:center;">
                      <a href="#" class="btn btn-info btn-sm">
                              Verify &nbsp;<i class="fas fa-eye"></i>
                            </a>
                          <a href="#" class="btn btn-danger btn-sm">
                             Clear &nbsp; <i class="fas fa-trash"></i>
                            </a>
                      </td>
                    </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>

    </div><!--end container-->

@endsection

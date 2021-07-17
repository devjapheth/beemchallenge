@extends('layouts.app2')
@section('bred')
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/Dashboard">Home</a></li>
          <li class="breadcrumb-item"><a href="/Students">Students</a></li>
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
                <a href="/Dashboard" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="color:rgb(242, 156, 43);font-weight:bold;"><i class="fas fa-plus"></i>&nbsp;Back</a>
        </div>

        <div class="row">
            <div class="card col-md-12">
                <div class="card-body">
                        <form class="form-inline">

                                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Program Name :</label>
                                <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                  <option selected>Choose...</option>
                                </select>
                                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Addmission Year :</label>
                                <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                  <option selected>Choose...</option>
                                  <option value="1">2016/2017</option>
                                  <option value="2">2017/2018</option>
                                  <option value="3">2018/2019</option>
                                </select>

                                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Clearance Status :</label>
                                <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                  <option selected>Choose...</option>
                                  <option value="1">Cleared</option>
                                  <option value="2">Not Cleared</option>
                                </select>
                                <button type="submit" class="btn btn-primary dark"><i class="fas fa-search"></i>&nbsp;Perform Quick Search</button>
                              </form>
                </div>
            </div>
        </div>

    </div><!--end container-->

@endsection

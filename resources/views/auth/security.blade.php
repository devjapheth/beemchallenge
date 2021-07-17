@extends('layouts.app2')
@section('bred')
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/Dashboard">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Security</li>
        </ol>
      </nav>
@endsection
@section('content')

    <!--begin contents-->
    <div class="container-fluid">
         <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-6">
                <h1 class="h3 mb-0 text-gray-800" style="font-weight:400;color:gray;font-size:23px;letter-spacing:5px;">CHANGE PASSWORD</h1>

        </div>
        @csrf
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        <!--row-->
        <div class="row">

            <div class="col-md-9">
                <div class="card">
                        <div class="card-body">
                                <form class="form-horizontal" method="POST" action="{{ route('changePassword') }}">
                                        {{ csrf_field() }}

                                        <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                            <label for="new-password" class="col-md-4 control-label">Current Password</label>

                                            <div class="col-md-12">
                                                <input id="current-password" type="password" class="form-control" name="current-password" required>

                                                @if ($errors->has('current-password'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('current-password') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                            <label for="new-password" class="col-md-4 control-label">New Password</label>

                                            <div class="col-md-12">
                                                <input id="new-password" type="password" class="form-control" name="new-password" required>

                                                @if ($errors->has('new-password'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('new-password') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="new-password-confirm" class="col-md-4 control-label">Confirm New Password</label>

                                            <div class="col-md-12">
                                                <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary dark">
                                                    Change Password
                                                </button>
                                            </div>
                                        </div>
                                    </form>


                        </div>
                      </div>
            </div>

            <div class="col-md-3 content-center">


                                <img src="images/security.jpg" height="335px" width="280px;">


            </div>
        </div>
    </div><!--end container-->

@endsection

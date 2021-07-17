@extends('layouts.app')

@section('content')

<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-10 col-lg-12 col-md-9">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
          <div class="col-lg-6">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
              </div>
              <form  method="POST" action="{{ route('login') }}">
              @csrf

                <div class="form-group">
                  <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Enter Email Address..." value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                </div>
                <div class="form-group">
                  <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="current-password">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                </div>
                <div class="form-group">
                  <div class="custom-control custom-checkbox small">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    {{ __('Login') }}
                                </button>
              
              <hr>
              <div class="text-center">
                <a class="small" href="/password/reset">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="#">Contact Administrator</a>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

</div>
@endsection



@extends('layouts.applogin')

@section('content')
<body>

    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img src="{{asset('adminLTE/')}}/login/images/mail.svg" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-6 contents">
            <div class="row justify-content-center">
              <div class="col-md-8">
                <div class="mb-4">
                <h3>Sign In </h3>
                <p class="mb-4 text-dark">Aplikasi Manajemen Persuratan Disdukcapil Kota Tegal</p>
              </div>
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group first">
                  <label for="email">Email</label>
                  <input id="email" value="{{ old('email') }}"  type="email" class="form-control  @error('email') is-invalid @enderror" name="email"  required autocomplete="email" autofocus>
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>Email yang anda masukan tidak terdaftar</strong>
                  </span>
                 @enderror
                </div><br>
                <div class="form-group last mb-4">
                  <label for="password">Password</label>
                  <input id="password"  type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                </div>

                 {{-- <div class="d-flex mb-5 align-items-center">
                  <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                    <input type="checkbox" checked="checked"/>
                    <div class="control__indicator"></div>
                  </label>
                  <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>
                </div> --}}

                <input type="submit" value="LOGIN" class="btn btn-block btn-dark">

                <!-- <span class="d-block text-left my-4 text-muted">&mdash; or login with &mdash;</span>

                <div class="social-login">
                  <a href="#" class="facebook">
                    <span class="icon-facebook mr-3"></span>
                  </a>
                  <a href="#" class="twitter">
                    <span class="icon-twitter mr-3"></span>
                  </a>
                  <a href="#" class="google">
                    <span class="icon-google mr-3"></span>
                  </a>
                </div> -->
              </form>
              </div>
            </div>

          </div>

        </div>
      </div>
    </div>

    </body>
@endsection

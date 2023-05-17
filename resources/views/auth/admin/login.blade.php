@extends('layouts.app')
@section('title','Admin Login')
@section('content')
  @include('flash-message')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="logo  col-12 col-lg-6 vh-100 d-lg-flex justify-content-center align-items-center"
           style="background-color:#0E122D;">

        <div class="container-sm logo-div">
          <div>
            <a href="{{route('index_page')}}">
              <img src="{{asset('assets/images/home/logo.png')}}" alt="" class="mx-auto d-block"
                   data-aos="zoom-in-up" style="width: 8.5rem;
                                                    height: auto;">
            </a>

          </div>
          <div class="">
            <h5 class="text-center text-light" style="margin-bottom:0 ;">Gentlemen</h5>
            <h5 class="text-center text-light">Admin Dashboard Login</h5>
          </div>
        </div>
      </div>
      <div
        class="col-12 col-lg-6 mt-lg-0 d-flex justify-content-center align-items-center p-0 mt-5">
        <div class="form-div col-12 col-lg-6 p-lg-0 p-3">
          <div class="login-header">
            <h6 class="text-center">Admin Panel</h6>
            <h3 class="head-3 text-center font-weight-bolder mobile_super_admin_login_font_size">
              Login To Your Account</h3>
          </div>
          <div class="login-form">
            <form method="POST" action="{{ route('backside.admin.login') }}">
              @csrf

              <div class="input_text form-group row">
                <label for="email" class="font-weight-bolder">{{ __('E-Mail Address') }}</label>


                <input id="email" type="email"
                       class="form-control @error('email') is-invalid @enderror"
                       placeholder="Enter email address" name="email" value="{{ old('email') }}"
                       required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror

              </div>

              <div class="input_text form-group row">
                <label for="password" class="font-weight-bolder">{{ __('Password') }}</label>


                <input id="password" type="password"
                       class="form-control @error('password') is-invalid @enderror"
                       placeholder="Enter Password" name="password" required
                       autocomplete="current-password">
                <i id="toggle_pwd" class="fa fa-fw fa-eye field_icon"></i>

                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror

              </div>

              <div class="form-group row">
                <div class="col-md-6">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember"
                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                      {{ __('Remember Me') }}
                    </label>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div>
                  <button type="submit" class="admin_login_btn rounded-3" style="width: 100%;
                                    height: auto;
                                    padding: 4px;
                                    background-color: rgb(14, 18, 45);
                                    border: 0;
                                    color: #fff;
                                    font-size: 17px;">
                    {{ __('LOGIN') }}
                  </button>

                  @if (Route::has('password.request'))
                    <p align="center">
                      <a class="forgot-btn btn" href="{{ route('forget-password') }}">
                        {{ __('Forgot Your Password?') }}
                      </a>
                    </p>

                  @endif
                </div>
              </div>
            </form>
          </div>

        </div>

      </div>
    </div>
    @endsection
    @push('login-scripts')
      <script type="text/javascript">
        $(document).ready(function () {

          // for eye icon
          $(function () {

            $("#toggle_pwd").click(function () {
              $(this).toggleClass("fa-eye fa-eye-slash");
              var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
              $("#password").attr("type", type);
            });
          });

        });
      </script>
    @endpush
    <style>
      .fa-eye,
      .fa-eye-slash {
        z-index: 9999;
        position: absolute;
        left: 89%;
        margin-top: 12.5%;
      }

    </style>

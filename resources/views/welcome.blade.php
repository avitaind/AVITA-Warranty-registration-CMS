@extends('layouts.app')

@section('title')
    @lang('title.welcome')
@stop

@section('css')
    <style>
        .btn-primary {
            color: #fff;
            background-color: #662d91;
            border-color: #662d91;
        }

        .btn-primary:hover {
            color: #662d91;
            background-color: #fff;
            border-color: #662d91;
        }

        .login-panel {
            color: #fff;
            background: url('/assets/img/bg_welcome_background.jpg') 100% / cover no-repeat;
            min-height: 600px;
            /* padding-top: 50px; */
        }

        .mt-2,
        .my-2 {
            margin-top: 40px !important;
        }
    </style>
@endsection

@section('content')
    <!-- CONTENT WRAPPER -->
    <!-- CONTENT WRAPPER -->
    <div class="container">

        <div class="row ">
            <div class="col-lg-6 col-xl-6 login-panel my-lg-9 pt-100">
                {{-- <img src="/assets/img/bg_welcome_background.jpg"> --}}
                <h2 class="my-2 text-capitalize text-center">Sign Up Now</h2>
                <div class=" text-lg-center  m-5 font-size-16 ">We’re here to support you. Please register your grievance by
                    creating your account and updating product details using the link below.</div>
                <div class="align-content-center justify-content-sm-center text-center pt-50">
                    @if (Route::has('login'))
                        <div class="">
                            @auth
                                {{-- @if (Auth::user()->is_admin == 1)
                                    <a href="{{ route('admin.home') }}" class="btn btn-primary">Admin Dashboard</a>
                                @else
                                    <a href="{{ route('profile') }}" class="btn btn-primary">Customer
                                        Dashboard</a>
                                @endif --}}
                            @else
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-primary m-4">Sign Up Now</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>

            </div>

            <div class="col-lg-6 col-xl-6 my-lg-9">
                @auth
                    {{-- // user logged in --}}
                    <h2 class=" my-2 text-center text-capitalize" style="padding-top: 107px; color:#662d91">all ready Member
                        Login </h2>
                    <div class=" text-center m-1 font-size-16" style="padding-top: 25px;">Back to redirect AVITA Member
                        Dashboard.</div>
                    <div class="align-content-center justify-content-sm-center text-center p-lg-9">

                        {{-- @if (Auth::user()->is_admin == 1)
                            <a href="{{ route('admin.home') }}" class="btn btn-primary">Admin Dashboard</a>
                        @else
                            <a href="{{ route('profile') }}" class="btn btn-primary">Customer
                                Dashboard</a>
                        @endif --}}

                        @if (Auth::user()->role == 1)
                            <a href="{{ route('admin.home') }}" class="btn btn-primary">Admin Dashboard</a>
                        @elseif (Auth::user()->role == 2)
                            <a href="{{ route('seller.home') }}" class="btn btn-primary">Seller Dashboard</a>
                        @else
                            <a href="{{ route('profile') }}" class="btn btn-primary">Customer
                                Dashboard</a>
                        @endif

                    </div>
                @else
                    {{-- // not logged in --}}
                    <h2 class=" my-2 text-center" style="padding-top: 107px; color:#662d91">Account Log In</h2>
                    {{-- <div class=" text-center m-1 font-size-16" style="padding-top: 25px;">Enter your AVITA Member account
                        and
                        password to log in.</div> --}}
                    <div class="align-content-center justify-content-sm-center text-center p-lg-9">

                        @include('component.alert')

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-12 mb-4">
                                    <input type="email" class="form-select1 @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email') }}" autocomplete="email" autofocus
                                        placeholder="Email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-12 ">
                                    <input type="password" class="form-select1 @error('password') is-invalid @enderror"
                                        id="exampleInputPassword1" name="password" autocomplete="current-password"
                                        placeholder="Password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="col-md-12">
                                    <div class="d-flex my-2 justify-content-between">
                                        <div class="d-inline-block mr-3">
                                            {{-- <div class="control control-checkbox">Remember me --}}
                                            {{-- <input type="checkbox" /> --}}
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>
                                            {{-- <div class="control-indicator"></div> --}}Remember me
                                            {{-- </div> --}}
                                        </div>

                                        <div class="form-check">
                                            <label class="form-check-label text-muted">
                                                <input type="checkbox" class="form-check-input" onclick="myFunction()">
                                                Show Password
                                            </label>
                                        </div>


                                    </div>

                                    <button type="submit" class="btn btn-primary btn-block mb-2 mt-4">Log In</button>
                                    <p class=" text-center p-2">
                                        @if (Route::has('password.request'))
                                            <a class="text-blue text-center" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </p>

                                    {{-- <p class="sign-upp">Don't have an account yet ?
                                    <a class="text-blue" href="{{ route('register') }}">Register</a>
                                </p> --}}

                                </div>
                            </div>
                        </form>
                    </div>
                @endauth

            </div>
        </div>
    </div>
    <!-- End Content Wrapper -->
    <!-- End CONTENT WRAPPER -->
@endsection

@section('js')
    <script>
        function myFunction() {
            var x = document.getElementById("exampleInputPassword1");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
@endsection

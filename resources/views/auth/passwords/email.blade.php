@extends('layouts.app')

@section('title')
    @lang('title.reset_password')
@stop

@section('content')
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <span class="ec-reset-wrap ec-reset-btn">
                            <button class="btn btn-primary" type="submit">Send Password Reset Link</button>
                        </span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

    <!-- CONTENT WRAPPER -->
    <div class="container d-flex align-items-center justify-content-center form-height-login pt-24px pb-24px">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 col-12">
                {{-- <div class="card"> --}}
                <div class="">
                    <div class="">
                        <div class="ec-brand">
                            <a href="/" title="AVITA India">
                                <img class="ec-brand-icon" src="{{ asset('assets/img/logo/AVITA-logo.png ') }}" alt="" />
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-5">
                        {{-- @include('component.alert') --}}

                        @if (session('status'))
                            <div class="alert alert-success">
                                <i class="ti-info-alt"></i> {{ session('status') }}
                            </div>
                        @endif

                        <h4 class="text-dark mb-5">Forgot Password</h4>
                        <div class="text-dark mb-5">Please enter your AVITA account email to reset password</div>
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-12 ">
                                    <input type="email" class="form-select1 @error('email') is-invalid @enderror" id="email"
                                        name="email" value="{{ old('email') }}" autocomplete="email" autofocus
                                        placeholder="Email Address">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-block mb-4">Send Password Reset
                                        Link</button>
                                </div>
                            </div>
                        </form>
                        {{-- <form class="" method="POST" action="{{ route('changePassword') }}">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Type Your Current Password</label>
                                    <div class="input-group" id="show_hide_password">
                                        <input class="form-select1" type="password" name="current_password"
                                            id="current_password" required>
                                        <div class="input-group-addon">
                                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input" onclick="myFunction()">
                                            Show Current Password
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Type Your New Password</label>
                                    <div class="input-group" id="show_hide_password">
                                        <input class="form-select1" type="password" name="new_password" id="password"
                                            required>
                                        <div class="input-group-addon">
                                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input" onclick="myFunction1()">
                                            Show Current Password
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Type Your Confirm New Password</label>
                                    <div class="input-group" id="show_hide_password">
                                        <input class="form-select1" type="password" name="confirm_password"
                                            id="password_confirmation" required>
                                        <div class="input-group-addon">
                                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input" onclick="myFunction2()">
                                            Show Current Password
                                        </label>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary mb-4">Reset Password</button>
                                </div>
                                <p class="sign-upp">Already have an account?
                                    <a class="text-blue" href="{{ route('login') }}">Log In</a>
                                </p>
                            <div>
                        </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End CONTENT WRAPPER -->

@endsection

@section('js')
    <script>
        function myFunction() {
            var x = document.getElementById("current_password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function myFunction1() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function myFunction2() {
            var x = document.getElementById("password_confirmation");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
@endsection

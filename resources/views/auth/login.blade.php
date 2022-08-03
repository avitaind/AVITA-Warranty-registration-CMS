@extends('layouts.app')

@section('title')
    @lang('title.login')
@stop

@section('css')
    <style>



    </style>
@endsection

@section('content')

    <!-- CONTENT WRAPPER -->
    <div class="container d-flex align-items-center justify-content-center form-height-login pt-24px pb-24px">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-10">
                {{-- <div class="card"> --}}
                <div class="">
                    <div class="">
                        <div class="ec-brand">
                            <a href="/" title="AVITA India">
                                <img class="ec-brand-icon" src="{{ asset('assets/img/logo/AVITA-logo.png ') }}" alt="AVITA India" />
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-5">
                        <h4 class="text-dark mb-5">Log In</h4>
                        @include('component.alert')

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-12 mb-4">
                                    <input type="email" class="form-select1 @error('email') is-invalid @enderror" id="email"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                        placeholder="Email">
                                </div>

                                <div class="form-group col-md-12 ">
                                    <input type="password" class="form-select1 @error('password') is-invalid @enderror"
                                        id="exampleInputPassword1" name="password" required autocomplete="current-password"
                                        placeholder="Password">

                                    @error('error')
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

                                    <button type="submit" class="btn btn-primary btn-block mb-2 mt-4">Sign In</button>
                                    <p class=" text-center p-2">
                                        @if (Route::has('password.request'))
                                            <a class="text-blue text-center" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </p>

                                    <p class="sign-upp">Don't have an account yet ?
                                        <a class="text-blue" href="{{ route('register') }}">Register</a>
                                    </p>

                                </div>
                            </div>
                        </form>
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
            var x = document.getElementById("exampleInputPassword1");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
@endsection

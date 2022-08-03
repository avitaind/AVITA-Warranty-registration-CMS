@extends('seller.layouts.app')

@section('title')
    @lang('title.seller_password_change')
@stop

@section('content')

    <!-- CONTENT WRAPPER -->
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-12 border-right">
                <div class="d-flex flex-column  p-3 py-5">
                    @include('component.alert')
                    <h4 class="text-dark mb-5">Change Password</h4>

                    <form class="" method="POST" action="{{ route('seller.changePasswordSave') }}">
                        {{ csrf_field() }}
                        <div class="form-group col-md-12">
                            <label>Type Your Current Password</label>
                            <div class="input-group" id="show_hide_password">
                                <input class="form-select1 @error('current_password') is-invalid @enderror" type="password"
                                    name="current_password" id="current_password">
                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
                                <input class="form-select1 @error('new_password') is-invalid @enderror" type="password"
                                    name="new_password" id="password">
                                @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="input-group-addon">
                                    <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label text-muted">
                                    <input type="checkbox" class="form-check-input" onclick="myFunction1()">
                                    Show New Password
                                </label>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Type Confirm Password</label>
                            <div class="input-group" id="show_hide_password">
                                <input class="form-select1 @error('confirm_password') is-invalid @enderror" type="password"
                                    name="confirm_password" id="password_confirmation">
                                @error('confirm_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="input-group-addon">
                                    <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label text-muted">
                                    <input type="checkbox" class="form-check-input" onclick="myFunction2()">
                                    Show Confirm Password
                                </label>
                            </div>
                        </div>
                        <div class=" text-center">
                            <button type="submit" class="btn btn-primary mb-4">Password Change</button>
                        </div>
                    </form>
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

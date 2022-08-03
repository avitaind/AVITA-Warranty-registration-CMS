@extends('admin.layouts.app')

@section('title')
    @lang('title.admin_profile')
@stop

@section('content')

    <!-- CONTENT WRAPPER -->
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div>
                    <h1>Admin Profile</h1>
                    <p class="breadcrumbs"><span><a href="{{ route('admin.home') }}">Home</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Profile
                    </p>
                </div>
            </div>
            <div class="card bg-white profile-content">
                <div class="row">
                    <div class="col-lg-4 col-xl-3">
                        <div class="profile-content-left profile-left-spacing">
                            <div class="text-center widget-profile px-0 border-0">
                                <form method="POST" action="{{ route('admin.profilesave') }}"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="ec-vendor-main-img">
                                        <div class="avatar-upload">
                                            <div class="avatar-preview ec-preview">
                                                <div class="imagePreview ec-div-preview">
                                                    @if ($users != '')
                                                        <img class="ec-image-preview" src="{{ '/' . $users->pic }}"
                                                            alt="{{ $users->pic }}"
                                                            style="width: 50%; padding-bottom: 20px;">
                                                        <br />
                                                    @else
                                                        <img class="ec-image-preview"
                                                            src="{{ asset('assets/img/user/user.png') }}" alt=""
                                                            style="width: 50%; padding-bottom: 20px;">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="avatar-edit">
                                                <input type='file' hidden id="imageUpload"
                                                    class="ec-image-upload @error('pic') is-invalid @enderror"
                                                    name="pic[]" />
                                                @error('pic')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <label for="imageUpload">
                                                    {{-- {{ dd(Auth::user()->pic)}} --}}
                                                    <img src="/assets/img/icons/edit.svg" class="svg_img header_svg"
                                                        alt="{{ $users->pic }}">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="py-2 text-dark">{{ Auth::user()->name }}</h4>
                                        <p>{{ Auth::user()->email }}</p>
                                    </div>
                            </div>

                            <hr class="w-100">

                            <div class="contact-info pt-4">
                                <h5 class="text-dark">Contact Information</h5>
                                <p class="text-dark font-weight-medium pt-24px mb-2">Email address</p>
                                <p>{{ Auth::user()->email }}</p>
                                <p class="text-dark font-weight-medium pt-24px mb-2">Phone Number</p>
                                <p>{{ Auth::user()->phone }}</p>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-8 col-xl-9">
                        <div class="profile-content-right profile-right-spacing py-5">
                            <ul class="nav nav-tabs px-3 px-xl-5 nav-style-border" id="myProfileTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                                        aria-selected="true">Profile</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="settings-tab" data-bs-toggle="tab"
                                        data-bs-target="#settings" type="button" role="tab" aria-controls="settings"
                                        aria-selected="false">Password Settings</button>
                                </li>
                            </ul>
                            <div class="tab-content px-3 px-xl-5" id="myTabContent">

                                <div class="tab-pane fade show active" id="profile" role="tabpanel"
                                    aria-labelledby="profile-tab">
                                    <div class="p-3 py-5">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h4 class="text-right">Profile Settings</h4>
                                        </div>
                                        @include('component.alert')

                                        <div class="row mt-2">
                                            <input type="hidden" class="form-select1" value="{{ Auth::user()->id }}"
                                                name="user_id">
                                            <div class="col-md-6">
                                                <label class="labels">First Name</label>
                                                <input type="text" class="form-select1" disabled placeholder="First name"
                                                    value="{{ Auth::user()->name }}" name="name">
                                            </div>

                                            <div class="col-md-6"><label class="labels">Last
                                                    Name</label><input type="text"
                                                    class="form-select1 @error('last_name') is-invalid @enderror"
                                                    value="{{ $users->last_name }}" placeholder="Last Name"
                                                    name="last_name">
                                                @error('last_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <label class="labels">Mobile Number</label>
                                                <input type="text" class="form-select1 @error('phone') is-invalid @enderror"
                                                    placeholder="Enter phone number" value="{{ $users->phone }}"
                                                    name="phone">
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <label class="labels">Email ID</label>
                                                <input type="text" disabled class="form-select1" placeholder="Enter email"
                                                    value="{{ Auth::user()->email }}" name="email">
                                            </div>

                                            <div class="col-md-12">
                                                <label class="labels">Address</label>
                                                <input type="text"
                                                    class="form-select1 @error('address') is-invalid @enderror"
                                                    placeholder="Enter address" value="{{ $users->address }}"
                                                    name="address">
                                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <label class="labels">Gender</label>
                                                <select name="gender" id="gender" class="form-select">
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="labels">Postcode</label>
                                                <input type="text"
                                                    class="form-select1 @error('postcode') is-invalid @enderror"
                                                    placeholder="Postcode" value="{{ $users->postcode }}"
                                                    name="postcode">
                                                @error('postcode')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <label class="labels">Country</label>
                                                <input type="text"
                                                    class="form-select1 @error('country') is-invalid @enderror"
                                                    placeholder="Country" value="{{ $users->country }}" name="country">
                                                @error('country')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label class="labels">State/Region</label>
                                                <input type="text" class="form-select1 @error('state') is-invalid @enderror"
                                                    value="{{ $users->state }}" placeholder="State" name="state">
                                                @error('state')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mt-5 text-center">
                                            <button class="btn btn-primary profile-button" type="submit">Save
                                                Profile</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                                    <div class="tab-pane-content mt-5">
                                        @include('component.alert')
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h4 class="text-right">Password Settings</h4>
                                        </div>
                                        <form class="" method="POST"
                                            action="{{ route('changePassword') }}">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="form-group col-md-8">
                                                    <label>Type Your Current Password</label>
                                                    <div class="input-group" id="show_hide_password">
                                                        <input
                                                            class="form-select1 @error('current_password') is-invalid @enderror"
                                                            type="password" name="current_password" id="current_password">
                                                        @error('current_password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        <div class="input-group-addon">
                                                            <a href=""><i class="fa fa-eye-slash"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label text-muted">
                                                            <input type="checkbox" class="form-check-input"
                                                                onclick="myFunction()">
                                                            Show Current Password
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <label>Type Your New Password</label>
                                                    <div class="input-group" id="show_hide_password">
                                                        <input
                                                            class="form-select1 @error('new_password') is-invalid @enderror"
                                                            type="password" name="new_password" id="password">
                                                        @error('new_password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        <div class="input-group-addon">
                                                            <a href=""><i class="fa fa-eye-slash"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label text-muted">
                                                            <input type="checkbox" class="form-check-input"
                                                                onclick="myFunction1()">
                                                            Show New Password
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <label>Type Your Confirm New Password</label>
                                                    <div class="input-group" id="show_hide_password">
                                                        <input class="form-select1" type="password"
                                                            name="confirm_password" id="password_confirmation">
                                                        <div class="input-group-addon">
                                                            <a href=""><i class="fa fa-eye-slash"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label text-muted">
                                                            <input type="checkbox" class="form-check-input"
                                                                onclick="myFunction2()">
                                                            Show Confirm Password
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class=" text-center">
                                                    <button type="submit" class="btn btn-primary mb-4">Password
                                                        Change</button>
                                                </div>
                                                <div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div> <!-- End Content -->
    </div>
    <!-- End Content Wrapper -->

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

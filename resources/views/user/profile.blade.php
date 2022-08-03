@extends('user.layouts.app')

@section('title')
    @lang('title.profile')
@stop

@section('content')
    <!-- CONTENT WRAPPER -->
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <form method="POST" action="{{ route('profilesave') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="ec-vendor-main-img">
                            <div class="avatar-upload">
                                <div class="avatar-preview ec-preview">
                                    <div class="imagePreview ec-div-preview">
                                        @if (Auth::user()->pic != '')
                                            <img class="ec-image-preview" src="{{ '/' . Auth::user()->pic }}"
                                                alt="{{ Auth::user()->pic }}" style="width: 50%; padding-bottom: 20px;">
                                            <br />
                                        @else
                                            <img class="ec-image-preview" src="{{ asset('assets/img/user/user.png') }}"
                                                alt="{{ Auth::user()->pic }}" style="width: 50%; padding-bottom: 20px;">
                                        @endif
                                    </div>
                                </div>
                                <div class="avatar-edit">
                                    <input type='file' hidden id="imageUpload"
                                        class="ec-image-upload @error('pic') is-invalid @enderror" name="pic[]">
                                    @error('pic')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label for="imageUpload">
                                        <img src="/assets/img/icons/edit.svg" class="svg_img header_svg"
                                            alt="{{ Auth::user()->pic }}">
                                    </label>
                                </div>
                            </div>
                        </div>

                        <span class="font-weight-bold"><strong>
                                <h5>{{ Auth::user()->name }} {{ Auth::user()->last_name }}</h5>
                            </strong></span><span class="text-black-50"><strong>
                                <h4>{{ Auth::user()->email }}</h4>
                            </strong></span><span>
                        </span>
                </div>
            </div>
            <div class="col-md-8 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    @include('component.alert')
                    <div class="row mt-2">
                        <input type="hidden" class="form-select1" value="{{ Auth::user()->id }}" name="user_id">
                        <div class="col-md-6"><label class="labels">First Name</label>
                            <input type="text" class="form-select1 " disabled placeholder="First name"
                                value="{{ Auth::user()->name }}" name="name">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Last Name</label>
                            <input type="text" class="form-select1 @error('last_name') is-invalid @enderror"
                                value="{{ Auth::user()->last_name }}" placeholder="Last Name" name="last_name">
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Mobile Number</label>
                            <input type="text" class="form-select1 @error('phone') is-invalid @enderror"
                                placeholder="Enter phone number" value="{{ Auth::user()->phone }}" name="phone">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label class="labels">Email ID</label>
                            <input type="text" disabled class="form-select1" placeholder="Enter email"
                                value="{{ Auth::user()->email }}" name="email">
                        </div>

                        <div class="col-md-12">
                            <label class="labels">Address</label>
                            <input type="text" class="form-select1 @error('address') is-invalid @enderror"
                                placeholder="Enter address" value="{{ Auth::user()->address }}" name="address">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="labels">Gender</label>
                            <select name="gender" id="gender" class="form-select">
                                @if (!Auth::user()->gender)
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                @else
                                    <option value="{{ Auth::user()->gender }}">{{ Auth::user()->gender }}</option>
                                @endif
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="labels">Postcode</label>
                            <input type="text" class="form-select1 @error('postcode') is-invalid @enderror"
                                placeholder="Postcode" value="{{ Auth::user()->postcode }}" name="postcode">
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
                            <input type="text" class="form-select1 @error('country') is-invalid @enderror"
                                placeholder="Country" value="{{ Auth::user()->country }}" name="country">
                            @error('country')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="labels">State/Region</label>
                            <input type="text" class="form-select1 @error('state') is-invalid @enderror"
                                value="{{ Auth::user()->state }}" placeholder="State" name="state">
                            @error('state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save
                            Profile</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content Wrapper -->
@endsection


@section('js')
    <script>
        /*======== Image Change on Upload ========*/
        $("body").on("change", ".ec-image-upload", function(e) {

            var lkthislk = $(this);

            if (this.files && this.files[0]) {

                var reader = new FileReader();
                reader.onload = function(e) {

                    var ec_image_preview = lkthislk.parent().parent().children('.ec-preview').find(
                        '.ec-image-preview').attr('src', e.target.result);

                    ec_image_preview.hide();
                    ec_image_preview.fadeIn(650);
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
    </script>
@endsection

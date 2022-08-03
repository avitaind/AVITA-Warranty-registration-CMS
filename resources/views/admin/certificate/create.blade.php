@extends('admin.layouts.app')

@section('title')
    @lang('title.certificate_create')
@stop

@section('content')
    <!-- CONTENT WRAPPER -->
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                <div>
                    <h2>Certificate Warranty</h2>
                    <p class="breadcrumbs"><span><a href="{{ route('admin.home') }}">Home</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Certificate Warranty
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="ec-cat-list card card-default mb-24px">
                        <div class="card-body">
                            <h4>Certificate Warranty</h4>
                            <hr>
                            <small>Items marked with an asterisk (*) must be filled out.</small><br><br>

                            <div class="col-lg-12">
                                @include('component.alert')
                                <div class="ec-vendor-upload-detail">
                                    <form class="row g-3" method="POST" action="{{ route('certificate.store') }}">
                                        {!! csrf_field() !!}
                                        {{-- Customer Name --}}
                                        <div class="col-xl-6 col-lg-12">
                                            <label for="name" class="form-label">Customer Name: <span
                                                    class="required">*</span></label>
                                            <input type="text" class="form-select1 @error('name') is-invalid @enderror"
                                                id="name" name="name" value="">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        {{-- Customer Email --}}
                                        <div class="col-xl-6 col-lg-12">
                                            <label for="email" class="form-label">Customer Email: <span
                                                    class="required">*</span></label>
                                            <input type="email" class="form-select1 @error('email') is-invalid @enderror"
                                                id="email" name="email" value="">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        {{-- Customer Phone No --}}
                                        <div class="col-xl-6 col-lg-12">
                                            <label for="phone" class="form-label">Customer Phone No: <span
                                                    class="required">*</span></label>
                                            <input type="text" class="form-select1 @error('phone') is-invalid @enderror"
                                                id="phone" name="phone" value="">
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        {{-- Customer Product Number --}}
                                        <div class="col-xl-6 col-lg-12">
                                            <label for="product_number" class="form-label">Customer Product Number:
                                                <span class="required">*</span></label>
                                            <input type="text"
                                                class="form-select1 @error('product_number') is-invalid @enderror"
                                                id="product_number" name="product_number" value="">
                                            @error('product_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        {{-- Customer Product Configuration --}}
                                        <div class="col-xl-6 col-lg-12">
                                            <label for="product_configuration" class="form-label">Customer Product
                                                Configuration: <span class="required">*</span></label>
                                            <input type="text"
                                                class="form-select1 @error('product_configuration') is-invalid @enderror"
                                                id="product_configuration" name="product_configuration" value="">
                                            @error('product_configuration')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        {{-- Customer Product Serial Number --}}
                                        <div class="col-xl-6 col-lg-12">
                                            <label for="serial_number" class="form-label">Customer Product Serial
                                                Number: <span class="required">*</span></label>
                                            <input type="text"
                                                class="form-select1 @error('serial_number') is-invalid @enderror"
                                                id="serial_number" name="serial_number" value="">
                                            @error('serial_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        {{-- Customer Reseller Name --}}
                                        <div class="col-xl-6 col-lg-12">
                                            <label for="reseller_name" class="form-label">Customer Reseller Name:
                                                <span class="required">*</span></label>
                                            <input type="text"
                                                class="form-select1 @error('reseller_name') is-invalid @enderror"
                                                id="reseller_name" name="reseller_name" value="">
                                            @error('reseller_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        {{-- Order ID --}}
                                        <div class="col-xl-6 col-lg-12">
                                            <label for="extend_date" class="form-label">Order ID: <span
                                                    class="required">*</span></label>
                                            <input type="text"
                                                class="form-select1 @error('order_id') is-invalid @enderror"
                                                id="order_id" name="order_id" value="">
                                            @error('order_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        {{-- Customer Product Purchase Date --}}
                                        <div class="col-xl-6 col-lg-12">
                                            <label for="purchase_date" class="form-label">Customer Product Purchase
                                                Date: <span class="required">*</span></label>
                                            <input type="date"
                                                class="form-select1 @error('purchase_date') is-invalid @enderror"
                                                id="purchase_date" name="purchase_date" value="">
                                            @error('purchase_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        {{-- Customer Product Extend Date --}}
                                        <div class="col-xl-6 col-lg-12">
                                            <label for="extend_date" class="form-label">Customer Product Extend
                                                Date: <span class="required">*</span></label>
                                            <input type="date"
                                                class="form-select1 @error('extend_date') is-invalid @enderror"
                                                id="extend_date" name="extend_date" value="">
                                            @error('extend_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 text-center mt-4">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Content -->
    </div>
    <!-- End Content Wrapper -->
    <!-- End Content Wrapper -->
@endsection

@section('js')

@endsection

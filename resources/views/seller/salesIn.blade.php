@extends('seller.layouts.app')

@section('title')
    @lang('title.sales_in')
@stop

@section('content')
    <!-- CONTENT WRAPPER -->
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="row">
                <div>
                    <a href="{{ route('seller.sales') }}" class="btn btn-primary mb-4" style="float: right;">Back</a>
                </div>
                <div class="col-xl-1 ">
                </div>
                <div class="col-xl-10 col-lg-12">
                    <div class="ec-cat-list card card-default mb-24px">

                        <div class="card-body">
                            <h4>In Stock Product</h4>
                            <hr>
                            <small>Items marked with an asterisk (*) must be filled out.</small><br><br>

                            <div class="col-lg-12">
                                @include('component.alert')
                                <div class="ec-vendor-upload-detail">
                                    <form class="row g-3" method="POST" action="{{ route('seller.inSalesSave') }}"
                                        enctype="multipart/form-data">
                                        <!-- <form class="row g-3" > -->
                                        {!! csrf_field() !!}
                                        <div class="col-md-12">

                                            <div class="row">
                                                <input type="hidden"  class="form-select1" readonly name="user_id"
                                                    value="{{ $user_id }}">
                                                <div class="div col-md-6">
                                                    <label for="productNumber" class="form-label">Product
                                                        Number: <span>*</span></label>
                                                </div>
                                                <div class="div col-md-6 p-1">
                                                    <input type="test"
                                                        class="form-select1 @error('productNumber') is-invalid @enderror"
                                                        id="productNumber" name="productNumber">
                                                    @error('productNumber')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Serial Number: --}}
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="div col-md-6">
                                                    <label class="form-label">Serial Number: <span>*</span></label>
                                                </div>
                                                <div class="div col-md-6 p-1">
                                                    <input id="serialNumber" name="serialNumber"
                                                        class="form-select1  @error('serialNumber') is-invalid @enderror"
                                                        type="text">
                                                    @error('serialNumber')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <div class="py-3">
                                                        <img class="img-fluid"
                                                            src="{{ asset('assets/img/sn_location.png ') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Product Configuration: --}}
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="div col-md-6">
                                                    <label for="productConfiguration" class="form-label">Product
                                                        Configuration: <span>*</span>
                                                    </label>
                                                </div>
                                                <div class="div col-md-6 p-1 p-2">
                                                    <textarea class="form-select1 @error('productConfiguration') is-invalid @enderror" id="productConfiguration"
                                                        name="productConfiguration" rows="2"></textarea>
                                                    @error('productConfiguration')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    {{-- <p  class="form-select1" id="product_configuration" name="product_configuration"
                                                        class="">AVITA LIBER 14" 1920x1080 Full HD IPS,
                                                        Pentium® N4200, 4GB DDR3 RAM, 256GB
                                                        SSD, WIFI+BT, Non Backlit Keyboard, Win 10 Home, Office 365
                                                        one-month Trial Bundled, Space Grey</p> --}}
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Color Name: --}}
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="div col-md-6">
                                                    <label class="form-label">Product Color: <span>*</span></label>
                                                </div>
                                                <div class="div col-md-6 p-1">
                                                    <input type="test"
                                                        class="form-select1 @error('color') is-invalid @enderror"
                                                        id="color" name="color">
                                                    @error('color')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Screen Size Name: --}}
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="div col-md-6">
                                                    <label class="form-label">Product Screen Size: <span>*</span></label>
                                                </div>
                                                <div class="div col-md-6 p-1">
                                                    <input type="test"
                                                        class="form-select1 @error('screenSize') is-invalid @enderror"
                                                        id="screenSize" name="screenSize">
                                                    @error('screenSize')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Sale Date: --}}
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="div col-md-6">
                                                    <label class="form-label">Sale Date: <span>*</span></label>
                                                </div>
                                                <div class="div col-md-6 p-1">
                                                    <input type="date"
                                                        class="form-select1 @error('saleDate') is-invalid @enderror"
                                                        name="saleDate" id="dateID">
                                                    @error('saleDate')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Sale invoce: --}}
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="div col-md-6">
                                                    <label class="form-label">Sale Invoice: <span></span></label>
                                                </div>
                                                <div class="div col-md-6 p-1">
                                                    <input type="file"
                                                        class="form-select1 @error('purchaseInvoice') is-invalid @enderror"
                                                        name="purchaseInvoice[]" id="purchaseInvoice" multiple>
                                                    @error('purchaseInvoice')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                            </div>
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
                <div class="col-xl-1 ">
                </div>
            </div>
        </div> <!-- End Content -->
    </div>
    <!-- End Content Wrapper -->
@endsection

@section('js')


    <script>
        //Display Only Date till today //
        var dtToday = new Date();
        var month = dtToday.getMonth() + 1; // getMonth() is zero-based
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if (month < 10)
            month = '0' + month.toString();
        if (day < 10)
            day = '0' + day.toString();

        var maxDate = year + '-' + month + '-' + day;
        $('#dateID').attr('max', maxDate);
    </script>
@endsection

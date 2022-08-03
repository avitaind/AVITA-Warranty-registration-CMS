@extends('user.layouts.app')

@section('title')
    @lang('title.my_product')
@stop

@section('css')
    <style>
        .text {
            color: #662D91;
        }

    </style>
@endsection

@section('content')
    <!-- CONTENT WRAPPER -->
    <div class="ec-content-wrapper ec-vendor-wrapper">
        <div class="content">
            {{-- <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                <div>
                    <h2 class="card-title">My Product</h2>
                    <p class="breadcrumbs"><span><a href="{{ route('home') }}">Home</a></span><span><i
                                class="mdi mdi-chevron-right"></i></span>My Product</p>
                </div>
            </div> --}}
            <div class="card card-default p-4 ec-card-space">
                <div class="ec-vendor-card mt-m-24px row">
                <?php $getdata = \App\Models\Warranty_registration::where('user_email', $request->user()->email)->get()->first(); ?>
                    @if ($getdata == '')
                        <div class="col-lg-12 col-xl-4 col-xxl-12">
                            <p class="product-desc text-start mt-4">No Product Found.</p>
                        </div>
                    @else
                    @foreach ($prowarnty as $data)
                            <div class="col-lg-6 col-xl-6 col-xxl-6">
                                <div class="card card-default mt-24px">
                                    <div class="vendor-info card-body text-center p-4">
                                        <div class="row justify-content-center ec-vendor-detail">
                                            <h2 class="card-title text-start">Registered Product</h2>
                                            <p class="product-desc text-start">{{ $data->product_configuration }}</p>
                                            <div class="col-6 pt-4">
                                                <h6 class="text-uppercase text" style="color: #662D91">Serial Number</h6>
                                                <h6 class="text-uppercase text" style="color: #662D91">Purchase From</h6>
                                                <h6 class="text-uppercase text" style="color: #662D91">Purchase Date</h6>
                                                <h6 class="text-uppercase text" style="color: #662D91">Warranty Expiry</h6>
                                            </div>
                                            <div class="col-6 pt-4">
                                                <h6 class="text-uppercase">{{ $data->serial_number }}</h6>
                                                <h6 class="text-uppercase">{{ $data->reseller_name }}</h6>
                                                <h6 class="text-uppercase">{{ $data->purchase_date }}</h6>
                                                <h6 class="text-uppercase">{{  date("Y-m-d", strtotime(date("Y-m-d", strtotime($data->purchase_date)) . " + 364 day"));}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div> <!-- End Content -->
    </div>
    <!-- End Content Wrapper -->
@endsection

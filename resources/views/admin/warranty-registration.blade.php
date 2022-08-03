@extends('admin.layouts.app')

@section('title')
    @lang('title.admin_product_warranty_registration')
@stop

@section('css')
    <!-- No Extra plugin used -->
    <link href="{{ asset('assets/plugins/data-tables/datatables.bootstrap5.min.css') }}" rel='stylesheet'>
    <link href="{{ asset('assets/plugins/data-tables/responsive.datatables.min.css') }}" rel='stylesheet'>
@endsection

@section('content')
    <!-- CONTENT WRAPPER -->
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                <div>
                    <h2>Warranty Registration</h2>
                    <p class="breadcrumbs"><span><a href="{{ route('admin.home') }}">Home</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Warranty Registration
                    </p>
                </div>
                <div>
                    {{-- <a href="{{ route('export-warranty-registration') }}" class="btn btn-primary"> Export Warranty
                        Registration</a> --}}
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-default">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="responsive-data-table" class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Customer Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Product Type</th>
                                            <th>Product Series</th>
                                            <th>Product Model</th>
                                            <th>Product Number</th>
                                            <th>Product Configuration</th>
                                            <th>Serial Number</th>
                                            <th>Reseller Name</th>
                                            <th>Product Purchase Date</th>
                                            <th>Purchase Invoice</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($warranty_registration as $wr)
                                            <tr>
                                                <td>{{ $wr->user_name }}</td>
                                                <td>{{ $wr->user_email }}</td>
                                                <td>{{ $wr->user_phone }}</td>
                                                <td>
                                                    <?php $producttype = \App\Models\product_type::where('id', $wr->product_type)->first(); ?>
                                                    {{ $producttype->name }}
                                                </td>
                                                <td>
                                                    <?php $productseries = \App\Models\Product::where('id', $wr->product_Series)->first(); ?>
                                                    {{ $productseries->name }}
                                                </td>
                                                <td>
                                                    <?php $product_model = \App\Models\product_model::where('id', $wr->product_model)->first(); ?>
                                                    {{ $product_model->model_number }}
                                                </td>
                                                <td><?php $product_number = \App\Models\product_number::where('id', $wr->product_number)->first(); ?>
                                                    {{ $product_number->product_number }}
                                                </td>
                                                <td>{{ $wr->product_configuration }}</td>
                                                <td class="">{{ $wr->serial_number }}</td>
                                                <td class="">{{ $wr->reseller_name }}</td>
                                                <td class="">{{ $wr->purchase_date }}</td>
                                                <td class="">
                                                    @if ($wr->purchase_invoice != null)
                                                        @foreach (explode(',', $wr->purchase_invoice) as $ref)
                                                            <a href="{{ '/' . $ref }}" target="_blank"
                                                                download="{!! $ref !!}"><i
                                                                    class="mdi mdi-arrow-down-bold-circle-outline mdi-36px"></i></a><br />
                                                        @endforeach
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Content -->
    </div>
    <!-- End Content Wrapper -->
@endsection

@section('js')
    <!-- Datatables -->
    <script src="{{ asset('assets/plugins/data-tables/jquery.datatables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/data-tables/datatables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/data-tables/datatables.responsive.min.js') }}"></script>
@endsection

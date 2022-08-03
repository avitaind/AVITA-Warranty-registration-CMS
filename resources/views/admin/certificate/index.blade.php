@extends('admin.layouts.app')

@section('title')
    @lang('title.certificate')
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
                    <h2>Certificate Warranty</h2>
                    <p class="breadcrumbs"><span><a href="{{ route('admin.home') }}">Home</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Certificate Warranty
                    </p>
                </div>
                <div>
                    <a href="{{ route('certificate.create') }}" class="btn btn-primary"> Add Plan</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-default">
                        <div class="card-body">
                            @include('component.alert')
                            <div class="table-responsive">
                                <table id="responsive-data-table" class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Customer Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Order No.</th>
                                            <th>Product Configuration</th>
                                            <th>Product Number</th>
                                            <th>Serial Number</th>
                                            <th>Reseller Name</th>
                                            <th>Purchase Date</th>
                                            <th>Extend Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($certificates as $adp)
                                            <tr>
                                                <td>{{ $adp->name }}</td>
                                                <td>{{ $adp->email }}</td>
                                                <td>{{ $adp->phone }}</td>
                                                <td><strong>{{ $adp->order_id }}</strong></td>
                                                <td>{{ $adp->product_configuration }}</td>
                                                <td>{{ $adp->product_number }}</td>
                                                {{-- <td><a href="">{{ $adp->serial_number }} <i class=" mdi mdi-eye mdi-16px"></i></a></td> --}}
                                                <td>{{ $adp->serial_number }}</td>
                                                <td>{{ $adp->reseller_name }}</td>
                                                <td>{{ $adp->purchase_date }}</td>
                                                <td>{{ $adp->extend_date }}</td>
                                                <td class="">
                                                    <a href="{{ route('downloadPDF', [$adp->id]) }}" target="_blank"><i
                                                            class="mdi mdi-arrow-down-bold-circle-outline mdi-36px"></i></a>
                                                    {{-- <a href="{{ route('certificateMail', [$adp->id]) }}"><i
                                                            class="mdi mdi-gmail mdi-24px"></i></a> --}}
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

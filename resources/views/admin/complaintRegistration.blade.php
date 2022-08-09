@extends('admin.layouts.app')

@section('title')
    @lang('title.complaintRegistration')
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
                    <h2>Complaint Registration</h2>
                    <p class="breadcrumbs"><span><a href="{{ route('admin.home') }}">Home</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Complaint Registration
                    </p>
                </div>
                <div>
                    <a href="{{ route('exportAllComplaintRegistration') }}" class="btn btn-primary"> Export Complaint
                        Registration</a>
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
                                            <th>Date</th>
                                            <th>Priority Code</th>
                                            <th>Complaint ID</th>
                                            <th>Previous Complaint ID</th>
                                            <th>Status</th>
                                            <th>Customer Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Product Number</th>
                                            <th>Serial Number</th>
                                            <th>Product Purchase Date</th>
                                            <th>Warranty Check</th>
                                            <th>Channel Purchase</th>
                                            <th>City</th>
                                            <th>State</th>
                                            <th>PinCode</th>
                                            <th>Issue</th>
                                            <th>Purchase Invoice</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($complaintRegistration as $cr)
                                            <tr>
                                                {{-- <td>{{ $cr->created_at->format('Y-m-d H:i:s') }}</td> --}}
                                                <td>{{ $cr->created_at }}</td>
                                                <td>
                                                    @if ($cr->priority == NULL)
                                                        N/A
                                                    @else
                                                        {{ $cr->priority }}
                                                    @endif
                                                </td>
                                                <td>{{ $cr->ticketID }}</td>
                                                <td>
                                                    @if ($cr->ticketOld == NULL)
                                                        N/A
                                                    @else
                                                        {{ $cr->ticketOld }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($cr->status == 'In Processing')
                                                        <span class="badge badge-success">In Processing</span>
                                                    @elseif($cr->status == 'Completed')
                                                        <span class="badge badge-info">Completed</span>
                                                    @elseif ($cr->status == null)
                                                        <span class="badge bg-primary">N/A</span>
                                                    @endif
                                                </td>
                                                <td>{{ $cr->name }}</td>
                                                <td>{{ $cr->email }}</td>
                                                <td>{{ $cr->phone }}</td>
                                                <td>{{ $cr->productPartNo }}</td>
                                                <td>{{ $cr->productSerialNo }}</td>
                                                <td>{{ $cr->purchaseDate }}</td>
                                                <td>{{ $cr->warrantyCheck }}</td>
                                                <td>{{ $cr->chanalPurchase }}</td>
                                                <td>{{ $cr->city }}</td>
                                                <td>{{ $cr->state }}</td>
                                                <td>{{ $cr->pinCode }}</td>
                                                <td>{{ $cr->issue }}</td>
                                                <td class="">
                                                    @if ($cr->purchaseInvoice != null)
                                                        {{-- @foreach (explode(',', $cr->purchaseinvoice) as $ref) --}}
                                                        <a href="{{ '/' . $cr->purchaseInvoice }}" target="_blank"
                                                            download="{!! $cr->purchaseInvoice !!}"><i
                                                                class="mdi mdi-arrow-down-bold-circle-outline mdi-36px"></i></a><br />
                                                        {{-- @endforeach --}}
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

@extends('seller.layouts.app')

@section('title')
    @lang('title.seller')
@stop

@section('css')

    <!-- No Extra plugin used -->
    <link href="{{ asset('assets/plugins/data-tables/datatables.bootstrap5.min.css') }}" rel='stylesheet'>
    <link href="{{ asset('assets/plugins/data-tables/responsive.datatables.min.css') }}" rel='stylesheet'>

    <style>
        /* .dash-card .card-body span {
                                position: absolute;
                                right: 20px;
                                bottom: 25px;
                                font-size: 30px;
                                border-radius: 15px;
                                width: 50px;
                                height: 50px;
                                text-align: center;
                                background: #662d91;
                                color: #ffffff;
                            } */
    </style>

@endsection

@section('content')

    <!-- CONTENT WRAPPER -->
    <div class="ec-content-wrapper">
        <div class="content">
            <!-- Top Statistics -->
            <div class="row">
                <div class="col-xl-4 col-sm-4 p-b-15 lbl-card">
                    <div class="card card-mini dash-card card-1">
                        <div class="card-body">
                            {{-- <h2 class="mb-1">{{ $totalcount }}</h2> --}}
                            @if (isset($totalcount))
                                <h2 class="mb-1">{{ $totalcount }}</h2>
                            @else
                                <h2 class="mb-1">0</h2>
                            @endif
                            <p>Total Stock</p>
                            <a href="{{ route('seller.sales') }}"><span class="mdi mdi-cart"></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-4 p-b-15 lbl-card">
                    <div class="card card-mini dash-card card-2">
                        <div class="card-body">
                            @if (isset($incount))
                                <h2 class="mb-1">{{ $incount }}</h2>
                            @else
                                <h2 class="mb-1">0</h2>
                            @endif
                            {{-- <h2 class="mb-1">{{ $incount }}</h2> --}}
                            <p>In Stock</p>
                            <a href="{{ route('listInsales') }}"><span class="mdi mdi-arrow-left-bold-box"></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-4 p-b-15 lbl-card">
                    <div class="card card-mini dash-card card-3">
                        <div class="card-body">
                            @if (isset($outcount))
                                <h2 class="mb-1">{{ $outcount }}</h2>
                            @else
                                <h2 class="mb-1">0</h2>
                            @endif
                            {{-- <h2 class="mb-1">{{ $outcount }}</h2> --}}
                            <p>Out Stock</p>
                            <a href="{{ route('listOutsales') }}"><span class="mdi mdi-arrow-right-bold-box"></span></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-xl-4 col-md-4 p-b-15">
                    <!-- Sales Graph -->
                    <div id="user-acquisition" class="card card-default">
                        <div class="card-header">
                            <h2>Total Stock</h2>
                        </div>
                        <div class="card-body">
                            {{-- <div id="container"></div> --}}
                            <canvas id="myAreaChart1" width="100%" height="30"></canvas>
                        </div>
                        <div class="card-footer small text-muted">Updated yesterday at @php  echo date('F j, Y', time() ) @endphp</div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-4 p-b-15">
                    <!-- Sales Graph -->
                    <div id="user-acquisition" class="card card-default">
                        <div class="card-header">
                            <h2>In Stock</h2>
                        </div>
                        <div class="card-body">
                            {{-- <div id="container"></div> --}}
                            <canvas id="myAreaChart2" width="100%" height="30"></canvas>
                        </div>
                        <div class="card-footer small text-muted">Updated yesterday at @php  echo date('F j, Y', time() ) @endphp</div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-4 p-b-15">
                    <!-- Sales Graph -->
                    <div id="user-acquisition" class="card card-default">
                        <div class="card-header">
                            <h2>Out Stock</h2>
                        </div>
                        <div class="card-body">
                            {{-- <div id="container"></div> --}}
                            <canvas id="myAreaChart3" width="100%" height="30"></canvas>
                        </div>
                        <div class="card-footer small text-muted">Updated yesterday at @php  echo date('F j, Y', time() ) @endphp</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Content -->

        <div class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card card-default">
                        <div class="card-body">
                            @include('component.alert')
                            <div class="table-responsive">
                                <table id="responsive-data-table" class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Product Number</th>
                                            <th>Serial Number</th>
                                            <th>Product Configuration</th>
                                            <th>Product Color</th>
                                            <th>Screen Size</th>
                                            <th class="">Stock Date</th>
                                            <th>Stock</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sale as $sales)
                                            <tr>
                                                <td>{{ $sales->productNumber }}</td>
                                                <td>{{ $sales->serialNumber }} </td>
                                                <td class=""><a class="text-dark"
                                                        href="">{{ $sales->productConfiguration }}</a></td>
                                                <td class="">{{ $sales->color }}</td>
                                                <td class="">{{ $sales->screenSize }}</td>
                                                <td class="">{{ $sales->saleDate }}</td>
                                                <td>
                                                    @if ($sales->type == 'IN')
                                                        <span class="badge badge-success">In Stock</span>
                                                    @elseif($sales->type == 'OUT')
                                                        <span class="badge badge-info">Out Stock</span>
                                                    @else
                                                        <span class="badge bg-primary">NA</span>
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
    </div>
    <!-- End Content Wrapper -->
@endsection


@section('js')
    {{-- <script src="{{ asset('assets/js/chart-dashboard.js ') }}"></script> --}}

    <!-- Datatables -->
    <script src="{{ asset('assets/plugins/data-tables/jquery.datatables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/data-tables/datatables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/data-tables/datatables.responsive.min.js') }}"></script>

    {{-- Warranty Registration && Warranty Extend JS --}}

    <script src="{{ asset('assets/js/slaesReport.js ') }}"></script>
@endsection

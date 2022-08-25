@extends('admin.layouts.app')

@section('title')
    @lang('title.admin')
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
            <!-- Top Statistics -->
            <div class="row">

                <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                    <div class="card card-mini dash-card card-1">
                        <div class="card-body">
                            <h2 class="mb-1">{{ $totalseller }}</h2>
                            <p>Total Seller</p>
                            <span class="mdi mdi-account-group"></span>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                    <div class="card card-mini dash-card card-2">
                        <div class="card-body">
                            <h2 class="mb-1">{{ $totalSales }}</h2>
                            <p>Total Sales</p>
                            <span class=" mdi mdi-cart"></span>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                    <div class="card card-mini dash-card card-3">
                        <div class="card-body">
                            <h2 class="mb-1">{{ $totalIn }}</h2>
                            <p>Total In Stock</p>
                            <span class="mdi mdi-arrow-left-bold-box"></span>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                    <div class="card card-mini dash-card card-4">
                        <div class="card-body">
                            <h2 class="mb-1">{{ $totalOut }}</h2>
                            <p>Total Out Stock</p>
                            <span class="mdi mdi-arrow-right-bold-box"></span>
                        </div>
                    </div>
                </div>

            </div>


            <div class="row">
                @php $userrecords = \App\Models\User::where('role',2)->get(); @endphp
                @foreach($userrecords as $record)
                {{-- @php $sales_details = \App\Models\Sales::where('user_id',$record->id)->get(); @endphp --}}
                {{-- @foreach($sales_details as $saledetail) --}}
                {{-- @php $user_details = \App\Models\User::where('id',$record->id)->where('role',2)->first(); @endphp --}}
                @php $totalsales = \App\Models\Sales::where('user_id',$record->id)->get()->count(); @endphp
                @php $totalsalesin = \App\Models\Sales::where('user_id',$record->id)->where('type','IN')->count(); @endphp
                @php $totalsalesout = \App\Models\Sales::where('user_id',$record->id)->where('type','OUT')->count(); @endphp

                <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                    <div class="card card-mini dash-card card-1">
                        <div class="card-body">
                            <h2 class="mb-1">{{ $record->name }}{{$record->last_name}}</h2>
                            <p>Seller Name</p>
                            <span class="mdi mdi-account-group"></span>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                    <div class="card card-mini dash-card card-2">
                        <div class="card-body">
                            <h2 class="mb-1">{{ $totalsales }}</h2>
                            <p>Total Sales</p>
                            <span class=" mdi mdi-cart"></span>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                    <div class="card card-mini dash-card card-3">
                        <div class="card-body">
                            <h2 class="mb-1">{{ $totalsalesin }}</h2>
                            <p>Total In Stock</p>
                            <span class="mdi mdi-arrow-left-bold-box"></span>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                    <div class="card card-mini dash-card card-4">
                        <div class="card-body">
                            <h2 class="mb-1">{{ $totalsalesout }}</h2>
                            <p>Total Out Stock</p>
                            <span class="mdi mdi-arrow-right-bold-box"></span>
                        </div>
                    </div>
                </div>
                @endforeach
                {{-- @endforeach --}}

            </div>


            {{-- <div class="row"> --}}


            {{-- <div class="col-xl-8 col-md-12 p-b-15"> --}}
            <!-- Sales Graph -->
            {{-- <div id="user-acquisition" class="card card-default">
                        <div class="card-header">
                            <h2>Warranty Registration</h2>
                        </div>
                        <div class="card-body"> --}}
            {{-- <div id="container"></div> --}}
            {{-- <canvas id="myAreaChart1" width="100%" height="30"></canvas>
                        </div>
                        <div class="card-footer small text-muted">Updated yesterday at @php  echo date('F j, Y', time() ) @endphp</div>
                    </div>
                </div> --}}

            {{-- <div class="col-xl-4 col-md-12 p-b-15"> --}}
            <!-- Doughnut Chart -->
            {{-- <div class="card card-default">
                        <div class="card-header justify-content-center">
                            <h2>Customers Overview</h2>
                        </div>
                        <div class="card-body">
                            <div id="piechart" style="height:350px;"></div>
                        </div>
                        <div class="card-footer small text-muted">Updated yesterday at @php  echo date('F j, Y', time() ) @endphp</div>
                    </div>
                </div> --}}

            {{-- </div> --}}

            {{-- <div class="row">
                <div class="col-xl-8 col-md-12 p-b-15">
                    <!-- User activity statistics -->
                    <div class="card card-default" id="user-activity">
                        <div class="no-gutters">
                            <div>
                                <div class="card-header justify-content-between">
                                    <h2>Warranty Extend</h2>
                                    <div class=" ">
                                        <span></span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <canvas id="myAreaChart" width="100%" height="35"></canvas>
                                </div>
                                <div class="card-footer small text-muted">Updated yesterday at @php  echo date('F j, Y', time() ) @endphp</div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-12 p-b-15">
                    <div class="card card-default">
                        <div class="card-header flex-column align-items-start">
                            <h2>Current Users</h2>
                        </div>
                        <div class="card-body">
                            <canvas id="currentUser" class="chartjs"></canvas>
                        </div>
                        <div class="card-footer small text-muted">Updated yesterday at @php  echo date('F j, Y', time() ) @endphp</div>
                    </div>
                </div>
            </div> --}}
        </div>
        <!-- End Content -->

        <div class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card card-default">
                        <div class="card-body">
                            @include('component.alert')
                            <div class="table-responsive">
                                <table id="responsive-data-table" class="table nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>User Name</th>
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
                                        @php $users = \App\Models\User::where('role',2)->get(); @endphp
                                        @foreach($users as $user)
                                        @php $userName = \App\Models\User::where('id',$user->id)->first(); @endphp
                                        @php $sales = \App\Models\Sales::where('user_id',$user->id)->get(); @endphp
                                        @foreach ($sales as $sale)
                                            <tr>
                                                <td>{{$userName->name}} {{$userName->last_name}}</td>
                                                <td>{{ $sale->productNumber }}</td>
                                                <td>{{ $sale->serialNumber }} </td>
                                                <td class=""><a class="text-dark"
                                                        href="">{{ $sale->productConfiguration }}</a></td>
                                                <td class="">{{ $sale->color }}</td>
                                                <td class="">{{ $sale->screenSize }}</td>
                                                <td class="">{{ $sale->saleDate }}</td>
                                                <td>
                                                    @if ($sale->type == 'IN')
                                                        <span class="badge badge-success">In Stock</span>
                                                    @elseif($sale->type == 'OUT')
                                                        <span class="badge badge-info">Out Stock</span>
                                                    @else
                                                        <span class="badge bg-primary">NA</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- <div class="content">
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
                                        @foreach ($adminsale as $sales)
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
        </div> --}}

    </div>
    <!-- End Content Wrapper -->

@endsection

@section('js')

    <script src="{{ asset('assets/js/chart-dashboard.js ') }}"></script>

    {{-- Warranty Registration && Warranty Extend JS --}}

    <script src="{{ asset('assets/js/create-charts.js ') }}"></script>

    <!-- Datatables -->
    <script src="{{ asset('assets/plugins/data-tables/jquery.datatables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/data-tables/datatables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/data-tables/datatables.responsive.min.js') }}"></script>

    {{-- Customers Overview JS --}}

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Month Name', 'Registered User Count'],

                @php
                    $user = \App\Models\User::select(DB::raw('COUNT(*) as count'), DB::raw('MONTHNAME(created_at) as month_name'))
                        ->whereYear('created_at', date('Y'))
                        ->groupBy('month_name')
                        ->orderBy('count')
                        ->get();

                    foreach ($user as $d) {
                        echo "['" . $d->month_name . "', " . $d->count . '],';
                    }
                @endphp
            ]);

            var options = {
                // title: 'Users Detail',
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>

@endsection

@extends('admin.layouts.app')

@section('title')
    @lang('title.admin')
@stop

@section('content')

    <!-- CONTENT WRAPPER -->
    <div class="ec-content-wrapper">
        <div class="content">
            <!-- Top Statistics -->
            <div class="row">
                <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                    <div class="card card-mini dash-card card-1">
                        <div class="card-body">
                            <h2 class="mb-1">{{ $users }}</h2>
                            <p>All Customers</p>
                            <span class="mdi mdi-account-group"></span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                    <div class="card card-mini dash-card card-2">
                        <div class="card-body">
                            <h2 class="mb-1">{{ 79, 503 }}</h2>
                            <p>Daily Customers</p>
                            <span class=" mdi mdi-account-multiple"></span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                    <div class="card card-mini dash-card card-3">
                        <div class="card-body">
                            <h2 class="mb-1">{{ $warranty_registration }}</h2>
                            <p>Daily Order Warranty Registration</p>
                            <span class="mdi mdi-security"></span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                    <div class="card card-mini dash-card card-4">
                        <div class="card-body">
                            <h2 class="mb-1">{{ $warranty_extend }}</h2>
                            <p>Daily Order Warranty Extend</p>
                            <span class="mdi mdi-security"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

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
                                    <div id="container"></div>

                                    {{-- <div class="tab-content" id="userActivityContent">
                                        <div class="tab-pane fade show active" id="user" role="tabpanel">
                                            <canvas id="activity" class="chartjs"></canvas>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-12 p-b-15">
                    <!-- Doughnut Chart -->
                    <div class="card card-default">
                        <div class="card-header justify-content-center">
                            <h2>Orders Overview</h2>
                        </div>
                        <div class="card-body">
                            {{-- <canvas id="doChart"></canvas> --}}
                            <div id="piechart" style="height:350px;"></div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-xl-8 col-md-12 p-b-15">
                    <!-- Sales Graph -->
                    <div id="user-acquisition" class="card card-default">
                        <div class="card-header">
                            <h2>Warranty Registration</h2>
                        </div>
                        <div class="card-body">
                            <div id="container1"></div>
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
                        <div class="card-footer d-flex flex-wrap bg-white border-top">
                            <a href="#" class="text-uppercase py-3">In-Detail Overview</a>
                        </div>
                    </div>
                </div>


            </div>



            {{-- <div class="row">
                <div class="col-12 p-b-15">
                    <!-- Recent Order Table -->
                    <div class="card card-table-border-none card-default recent-orders" id="recent-orders">
                        <div class="card-header justify-content-between">
                            <h2>Recent Orders</h2>
                            <div class="date-range-report">
                                <span></span>
                            </div>
                        </div>
                        <div class="card-body pt-0 pb-5">
                            <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Product Name</th>
                                        <th class="d-none d-lg-table-cell">Units</th>
                                        <th class="d-none d-lg-table-cell">Order Date</th>
                                        <th class="d-none d-lg-table-cell">Order Cost</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>24541</td>
                                        <td>
                                            <a class="text-dark" href=""> Coach Swagger</a>
                                        </td>
                                        <td class="d-none d-lg-table-cell">1 Unit</td>
                                        <td class="d-none d-lg-table-cell">Oct 20, 2018</td>
                                        <td class="d-none d-lg-table-cell">$230</td>
                                        <td>
                                            <span class="badge badge-success">Completed</span>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown show d-inline-block widget-dropdown">
                                                <a class="dropdown-toggle icon-burger-mini" href="" role="button"
                                                    id="dropdown-recent-order1" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li class="dropdown-item">
                                                        <a href="#">View</a>
                                                    </li>
                                                    <li class="dropdown-item">
                                                        <a href="#">Remove</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>24541</td>
                                        <td>
                                            <a class="text-dark" href=""> Toddler Shoes, Gucci Watch</a>
                                        </td>
                                        <td class="d-none d-lg-table-cell">2 Units</td>
                                        <td class="d-none d-lg-table-cell">Nov 15, 2018</td>
                                        <td class="d-none d-lg-table-cell">$550</td>
                                        <td>
                                            <span class="badge badge-primary">Delayed</span>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown show d-inline-block widget-dropdown">
                                                <a class="dropdown-toggle icon-burger-mini" href="#" role="button"
                                                    id="dropdown-recent-order2" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li class="dropdown-item">
                                                        <a href="#">View</a>
                                                    </li>
                                                    <li class="dropdown-item">
                                                        <a href="#">Remove</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>24541</td>
                                        <td>
                                            <a class="text-dark" href=""> Hat Black Suits</a>
                                        </td>
                                        <td class="d-none d-lg-table-cell">1 Unit</td>
                                        <td class="d-none d-lg-table-cell">Nov 18, 2018</td>
                                        <td class="d-none d-lg-table-cell">$325</td>
                                        <td>
                                            <span class="badge badge-warning">On Hold</span>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown show d-inline-block widget-dropdown">
                                                <a class="dropdown-toggle icon-burger-mini" href="#" role="button"
                                                    id="dropdown-recent-order3" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li class="dropdown-item">
                                                        <a href="#">View</a>
                                                    </li>
                                                    <li class="dropdown-item">
                                                        <a href="#">Remove</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>24541</td>
                                        <td>
                                            <a class="text-dark" href=""> Backpack Gents, Swimming Cap Slin</a>
                                        </td>
                                        <td class="d-none d-lg-table-cell">5 Units</td>
                                        <td class="d-none d-lg-table-cell">Dec 13, 2018</td>
                                        <td class="d-none d-lg-table-cell">$200</td>
                                        <td>
                                            <span class="badge badge-success">Completed</span>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown show d-inline-block widget-dropdown">
                                                <a class="dropdown-toggle icon-burger-mini" href="#" role="button"
                                                    id="dropdown-recent-order4" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li class="dropdown-item">
                                                        <a href="#">View</a>
                                                    </li>
                                                    <li class="dropdown-item">
                                                        <a href="#">Remove</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>24541</td>
                                        <td>
                                            <a class="text-dark" href=""> Speed 500 Ignite</a>
                                        </td>
                                        <td class="d-none d-lg-table-cell">1 Unit</td>
                                        <td class="d-none d-lg-table-cell">Dec 23, 2018</td>
                                        <td class="d-none d-lg-table-cell">$150</td>
                                        <td>
                                            <span class="badge badge-danger">Cancelled</span>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown show d-inline-block widget-dropdown">
                                                <a class="dropdown-toggle icon-burger-mini" href="#" role="button"
                                                    id="dropdown-recent-order5" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li class="dropdown-item">
                                                        <a href="#">View</a>
                                                    </li>
                                                    <li class="dropdown-item">
                                                        <a href="#">Remove</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> --}}

        </div> <!-- End Content -->
    </div>
    <!-- End Content Wrapper -->

@endsection

@section('js')
    <script src="{{ asset('assets/js/chart-dashboard.js ') }}"></script>
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
                foreach ($pieChart as $d) {
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
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script type="text/javascript">
        var warranty_Registration = <?php echo json_encode($warranty_Registration); ?>;
        var warranty_Extend = <?php echo json_encode($warranty_Extend); ?>;

        Highcharts.chart('container', {
            title: {
                text: 'Warranty '
            },
            subtitle: {
                text: ' '
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Number of Customers'

                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'

            },
            plotOptions: {
                series: {
                    allowPointSelect: true,
                }
            },
            // series: [{
            //     name: 'Warranty Registration',
            //     data: warranty_Registration,
            // }],
            series: [{
                name: 'Warranty Extend',
                data: warranty_Extend,
            }],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        });
        Highcharts.chart('container1', {
            title: {
                text: 'Warranty '
            },
            subtitle: {
                text: ' '
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Number of Customers'

                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'

            },
            plotOptions: {
                series: {
                    allowPointSelect: true,
                }
            },
            series: [{
                name: 'Warranty Registration',
                data: warranty_Registration,
            }],
            // series: [{
            //     name: 'Warranty Extend',
            //     data: warranty_Extend,
            // }],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        });
    </script>
@endsection

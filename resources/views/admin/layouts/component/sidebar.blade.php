<!-- LEFT MAIN SIDEBAR -->
<div class="ec-left-sidebar ec-bg-sidebar">
    <div id="sidebar" class="sidebar ec-sidebar-footer">

        {{-- <div class="m-3">
            <a href="" title="AVITA India">
                <img class="" src="{{ asset('assets/img/logo/AVITA-logo.png ') }}" alt="" />
            </a>
        </div> --}}

        <div class="ec-brand">
            <a href="/" title="AVITA India">
                {{-- <img class="ec-brand-icon" src="{{ asset('assets/img/logo/AVITA-logo.png ') }}" alt="" /> --}}
                <img class="ec-brand-name text-truncate" src="{{ asset('assets/img/logo/AVITA-logo.png ') }}"
                    alt="" />
            </a>
        </div>

        {{-- <div class="ec-brand">
            <a href="/" title="Ekka">
                <img class="ec-brand-icon" src="{{ asset('assets/img/logo/AVITA-logo.png ') }}" alt="" />
                <span class="ec-brand-name text-truncate">AVITA</span>
            </a>
        </div> --}}

        <!-- begin sidebar scrollbar -->
        <div class="ec-navigation" data-simplebar>
            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">
                <!-- Dashboard -->
                {{-- <li class="active">
                    <a class="sidenav-item-link" href="{{ route('admin.home') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                    <hr>
                </li> --}}

                <!-- Seller Sales Report -->
                {{-- <li>
                    <a class="sidenav-item-link" href="{{ route('admin.sellerSalesReport') }}">
                        <i class="mdi mdi-cart"></i>
                        <span class="nav-text">Seller Sales Report</span>
                    </a>
                </li> --}}

                <!-- Customers Complaint Registration -->
                <li>
                    <a class="sidenav-item-link" href="{{ route('admin.complaintRegistration') }}">
                        <i class="mdi mdi-account-card-details"></i>
                        <span class="nav-text">Complaint</span>
                    </a>
                </li>

                <!-- Customers Complaint Registration -->
                <li>
                    <a class="sidenav-item-link" href="{{ route('complaintRegistration.lissted') }}">
                        <i class="mdi mdi-check-decagram"></i>
                        <span class="nav-text">White Lissted</span>
                    </a>
                </li>

                <!-- Users -->
                {{-- <li>
                    <a class="sidenav-item-link" href="{{ route('user') }}">
                        <i class="mdi mdi-account-group"></i>
                        <span class="nav-text">Customers</span>
                    </a>
                </li> --}}

                <!-- Products -->
                {{-- <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)">
                        <i class="mdi mdi-palette-advanced"></i>
                        <span class="nav-text">Products</span> <b class="caret"></b>
                    </a>
                    <div class="collapse">
                        <ul class="sub-menu" id="products" data-parent="#sidebar-menu">
                            <li class="">
                                <a class="sidenav-item-link" href="{{ route('products.create') }}">
                                    <span class="nav-text">Add Product</span>
                                </a>
                            </li>
                            <li class="">
                                <a class="sidenav-item-link" href="{{ route('products.index') }}">
                                    <span class="nav-text">List Product</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}

                <!-- Warranty Registration -->
                {{-- <li>
                    <a class="sidenav-item-link" href="{{ route('warranty-registration') }}">
                        <i class="mdi mdi-security"></i>
                        <span class="nav-text">Warranty Registration</span>
                    </a>
                </li> --}}

                <!-- Warranty Extend -->
                {{-- <li>
                    <a class="sidenav-item-link" href="{{ route('warranty-extend') }}">
                        <i class="mdi mdi-security"></i>
                        <span class="nav-text">Warranty Extend</span>
                    </a>
                </li> --}}

                <!-- Oneassist ADP Plan -->
                {{-- <li>
                    <a class="sidenav-item-link" href="{{ route('certificate') }}">
                        <i class="mdi mdi-security"></i>
                        <span class="nav-text"> Certificate Plan</span>
                    </a>
                </li> --}}
            </ul>
        </div>
    </div>
</div>

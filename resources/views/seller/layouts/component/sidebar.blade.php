<!-- LEFT MAIN SIDEBAR -->
<div class="ec-left-sidebar ec-bg-sidebar">
    <div id="sidebar" class="sidebar ec-sidebar-footer">

        {{-- <div class="m-3">
            <a href="/" title="AVITA India">
                <img class="" src="{{ asset('assets/img/logo/AVITA-logo.png ') }}" alt="" />
            </a>
        </div>

        <div class="ec-brand">
            <a href="/" title="AVITA India">
                <img class="ec-brand-icon" src="{{ asset('assets/img/logo/AVITA-logo.png ') }}" alt="" />
                <span class="ec-brand-name text-truncate">AVITA</span>
            </a>
        </div> --}}

        <div class="ec-brand">
            <a href="/" title="AVITA India">
                {{-- <img class="ec-brand-icon hidden-md-up" src="{{ asset('assets/img/logo/AVITA-logo.png ') }}" alt="" /> --}}
                <img class="ec-brand-name text-truncate" src="{{ asset('assets/img/logo/AVITA-logo.png ') }}"
                    alt="" />

            </a>
        </div>

        <!-- begin sidebar scrollbar -->
        <div class="ec-navigation" data-simplebar>
            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">
                <!-- Dashboard -->
                <li class="">
                    <a class="sidenav-item-link" href="{{ route('seller.home')}}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                    <hr>
                </li>

                {{-- Seller Profile --}}
                <li class="">
                    <a class="sidenav-item-link" href="{{ route('sellerProfile') }}">
                        <i class="mdi mdi-account"></i>
                        <span class="nav-text">Seller Profile</span>
                    </a>
                </li>

                <!-- Seller Password Change -->
                <li>
                    <a class="sidenav-item-link" href="{{ route('seller.changePassword') }}">
                        <i class="mdi mdi-account-group"></i>
                        <span class="nav-text">change Password</span>
                    </a>
                </li>

                <!-- Sale Details  -->
                <li>
                    <a class="sidenav-item-link" href="{{ route('seller.sales') }}">
                        <i class="mdi mdi-cart"></i>
                        <span class="nav-text">Sale Details</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>


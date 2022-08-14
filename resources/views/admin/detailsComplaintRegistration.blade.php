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
                    <h2>{{ $cr->ticketID }}</h2>
                    <p class="breadcrumbs"><span><a href="{{ route('admin.home') }}">Home</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Details Complaint Registration
                    </p>
                </div>
                {{-- <div>
                    <a href="{{ route('exportAllComplaintRegistration') }}" class="btn btn-primary"> Export File</a>
                </div> --}}
            </div>
            <div class=" container-fluid">
                <div class="row no-gutters">
                    <div class="col-md-6">
                        <div class="contact-info px-4">
                            <h4 class="text-dark mb-1">{{ $cr->ticketID }}</h4>
                            <p class="text-dark font-weight-medium pt-3 mb-2">Email</p>
                            <p>{{ $cr->email }}</p>
                            <p class="text-dark font-weight-medium pt-3 mb-2">Phone Number</p>
                            <p>{{ $cr->phone }}</p>
                            <p class="text-dark font-weight-medium pt-3 mb-2">Product Purchase Date</p>
                            <p>{{ $cr->purchaseDate }}</p>
                            <p class="text-dark font-weight-medium pt-3 mb-2">Product Number</p>
                            <p class="mb-2">{{ $cr->productPartNo }}</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="contact-info px-4"><br />
                            <p class="text-dark font-weight-medium pt-3 mb-2">Serial Number</p>
                            <p>{{ $cr->productSerialNo }}</p>
                            <form class="row g-3" method="POST" action="">
                                {!! csrf_field() !!}
                                <div class="row">

                                    {{-- Status --}}
                                    <div class="col-md-12 col-lg-12">
                                        <input type="hidden" name="ticketID" value="{{ $cr->ticketID }}">
                                        <div class="mb-3">
                                            <label for="status" class="form-label">
                                                <p class="text-dark font-weight-medium pt-3 mb-2">Status</p>
                                            </label>
                                            <select class="form-select1 @error('status') is-invalid @enderror"
                                                id="status" aria-describedby="statusHelp" name="status">
                                                <option value="">------</option>
                                                <option value="Approved">Approved</option>
                                                <option value="In Process">In Process</option>
                                                <option value="Denied">Denied</option>
                                                <option value="Solved">Solved</option>
                                            </select>
                                            @error('status')
                                                <span class="invalid-feedback form-text" id="statusHelp" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Comment --}}
                                    {{-- <div class="col-md-6 col-lg-6">
                                    <div class="mb-3">
                                        <label for="comment" class="form-label">
                                            <p class="text-dark font-weight-medium pt-3 mb-2">Comment</p>
                                        </label>
                                        <select class="form-select1 @error('comment') is-invalid @enderror"
                                            id="comment" aria-describedby="commentHelp"
                                            name="comment">
                                            <option value="">------</option>
                                            <option value="Online">Online</option>
                                            <option value="Offline">Offline</option>
                                        </select>
                                        @error('comment')
                                            <span class="invalid-feedback form-text" id="commentHelp"
                                                role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div> --}}

                                    <div class="col-md-12 text-center mt-4">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>

                                </div>
                            </form>
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

@extends('guest.layouts.app')

@section('title')
    @lang('title.complaintRegistration')
@stop

@section('content')
    <!-- CONTENT WRAPPER -->
    {{-- <div class="ec-content-wrapper"> --}}

    <div class="content">
        <div class="row">
            <div class="col-xl-1 ">
            </div>
            <div class="col-xl-10 col-lg-12">
                <div class="ec-cat-list card card-default mb-24px">
                    <div class="card-body">
                        <h4 class=" text-lg-center text-md-center text-sm-center">Complaint Registration</h4>
                        <hr>
                        <small class="text-lg-center">Items marked with an asterisk (*) must be filled out.</small><br><br>

                        <div class="col-lg-12">
                            @include('component.alert')
                            <div class="ec-vendor-upload-detail">
                                <form class="row g-3" method="POST" action="{{ route('guest.complaintRegistration') }}"
                                    enctype="multipart/form-data">
                                    {!! csrf_field() !!}

                                    <div class=" container">
                                        <div class="col-12 col-md-12 col-lg-12">
                                            <div class="row">

                                                {{-- Ticket ID --}}
                                                <div class="col-md-12 col-lg-12">
                                                    <div class="mb-3">
                                                        <label for="ticketID" class="form-label">Ticket ID <span
                                                                class="required">*</span></label>
                                                        <input type="text" class="form-select1" id="ticketID"
                                                            aria-describedby="ticketIDHelp" name="ticketID"
                                                            value="{{ $ticketID }}" readonly>
                                                    </div>
                                                </div>

                                                {{-- Status --}}
                                                <div class="col-md-12 col-lg-12">
                                                    <div class="mb-3">
                                                        <label for="status" class="form-label">Status <span
                                                                class="required">*</span></label>
                                                        <input type="text" class="form-select1" id="status"
                                                            aria-describedby="statusHelp" name="status"
                                                            value="In Processing" readonly>
                                                    </div>
                                                </div>

                                                {{-- Name --}}
                                                <div class="col-md-6 col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Coustomer Name
                                                            <span class="required">*</span></label>
                                                        <input type="text" class="form-select1" id="name"
                                                            aria-describedby="nameHelp" name="name">
                                                    </div>
                                                </div>

                                                {{-- Coustomer Email --}}
                                                <div class="col-md-6 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">Coustomer Email
                                                            <span class="required">*</span></label>
                                                        <input type="email" class="form-select1" id="email"
                                                            aria-describedby="emailHelp" name="email">
                                                    </div>
                                                </div>

                                                {{-- Coustomer Phone --}}
                                                <div class="col-md-6 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="phone" class="form-label">Coustomer Phone
                                                            <span class="required">*</span></label>
                                                        <input type="tel"
                                                            class="form-select1 @error('phone') is-invalid @enderror"
                                                            id="phone" aria-describedby="phoneHelp" name="phone">
                                                        @error('phone')
                                                            <span class="invalid-feedback form-text" id="phoneHelp"
                                                                role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                {{-- Product Number --}}
                                                <div class="col-md-6 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="productPartNo" class="form-label">Part Number
                                                            <span class="required">*</span></label>
                                                        <input type="text"
                                                            class="form-select1 @error('productPartNo') is-invalid @enderror"
                                                            id="productPartNo" aria-describedby="productPartNoHelp"
                                                            name="productPartNo">
                                                        @error('productPartNo')
                                                            <span class="invalid-feedback form-text" id="productPartNoHelp"
                                                                role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                {{-- Product Serial Number --}}
                                                <div class="col-md-6 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="productSerialNo" class="form-label">Serial
                                                            Number <span class="required">*</span></label>
                                                        <input type="text"
                                                            class="form-select1 @error('productSerialNo') is-invalid @enderror"
                                                            id="productSerialNo" aria-describedby="productSerialNoHelp"
                                                            name="productSerialNo">
                                                        @error('productSerialNo')
                                                            <span class="invalid-feedback form-text" id="productSerialNoHelp"
                                                                role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                {{-- Product DOP --}}
                                                <div class="col-md-6 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="purchaseDate" class="form-label">Purchase Date
                                                            <span class="required">*</span></label>
                                                        <input type="date"
                                                            class="form-select1 @error('purchaseDate') is-invalid @enderror"
                                                            id="dateID" aria-describedby="purchaseDateHelp"
                                                            name="purchaseDate">
                                                        @error('purchaseDate')
                                                            <span class="invalid-feedback form-text" id="purchaseDateHelp"
                                                                role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                {{-- Product Warranty Check --}}
                                                <div class="col-md-6 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="warrantyCheck" class="form-label">Warranty
                                                            Check
                                                            <span class="required">*</span></label>
                                                        <select
                                                            class="form-select1 @error('warrantyCheck') is-invalid @enderror"
                                                            id="warrantyCheck" aria-describedby="warrantyCheckHelp"
                                                            name="warrantyCheck">
                                                            <option value="">------</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                            @error('warrantyCheck')
                                                                <span class="invalid-feedback form-text"
                                                                    id="warrantyCheckHelp" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </select>
                                                    </div>
                                                </div>

                                                {{-- Product Chanal Of Purchase --}}
                                                <div class="col-md-6 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="chanalPurchase" class="form-label">Chanal Of
                                                            Purchase <span class="required">*</span></label>
                                                        <select
                                                            class="form-select1 @error('chanalPurchase') is-invalid @enderror"
                                                            id="chanalPurchase" aria-describedby="chanalPurchaseHelp"
                                                            name="chanalPurchase">
                                                            <option value="">------</option>
                                                            <option value="Online">Online</option>
                                                            <option value="Offline">Offline</option>
                                                            @error('chanalPurchase')
                                                                <span class="invalid-feedback form-text"
                                                                    id="chanalPurchaseHelp" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </select>
                                                    </div>
                                                </div>

                                                {{-- City --}}
                                                <div class="col-md-6 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="city" class="form-label">City <span
                                                                class="required">*</span></label>
                                                        <input type="text"
                                                            class="form-select1 @error('city') is-invalid @enderror"
                                                            id="city" aria-describedby="cityHelp" name="city">
                                                        @error('city')
                                                            <span class="invalid-feedback form-text" id="cityHelp"
                                                                role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                {{-- state --}}
                                                <div class="col-md-6 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="state" class="form-label">State <span
                                                                class="required">*</span></label>
                                                        <input type="text"
                                                            class="form-select1 @error('state') is-invalid @enderror"
                                                            id="state" aria-describedby="stateHelp" name="state">
                                                        @error('state')
                                                            <span class="invalid-feedback form-text" id="stateHelp"
                                                                role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                {{-- Pincode --}}
                                                <div class="col-md-6 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="pinCode" class="form-label">Pincode <span
                                                                class="required">*</span></label>
                                                        <input type="text"
                                                            class="form-select1 @error('pinCode') is-invalid @enderror"
                                                            id="pinCode" aria-describedby="pinCodeHelp" name="pinCode">
                                                        @error('pinCode')
                                                            <span class="invalid-feedback form-text" id="pinCodeHelp"
                                                                role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                {{-- Purchase Invoice --}}
                                                <div class="col-md-6 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="purchaseInvoice" class="form-label">Purchase
                                                            Invoice <span class="required">*</span></label>
                                                        <input type="file"
                                                            class="form-select1 @error('purchaseInvoice') is-invalid @enderror"
                                                            id="purchaseInvoice" aria-describedby="purchaseInvoiceHelp"
                                                            name="purchaseInvoice[]">
                                                        @error('purchaseInvoice')
                                                            <span class="invalid-feedback form-text" id="purchaseInvoiceHelp"
                                                                role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                {{-- Describe your Issue --}}
                                                <div class="col-md-12 col-md-12">
                                                    <div class="mb-3">
                                                        <label for="issue" class="form-label">Describe your
                                                            Issue
                                                            <span class="required">*</span></label>
                                                        <textarea type="text" class="form-select1 @error('issue') is-invalid @enderror" id="issue"
                                                            aria-describedby="issueHelp" name="issue"></textarea>
                                                        @error('issue')
                                                            <span class="invalid-feedback form-text" id="issueHelp"
                                                                role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 text-center mt-4">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>

                                </form>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-1 ">
            </div>
        </div>
    </div>
    <!-- End Content -->
    {{-- </div> --}}
    <!-- End Content Wrapper -->
@endsection

@section('js')

    <script>
        //Display Only Date till today //
        var dtToday = new Date();
        var month = dtToday.getMonth() + 1; // getMonth() is zero-based
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if (month < 10)
            month = '0' + month.toString();
        if (day < 10)
            day = '0' + day.toString();

        var maxDate = year + '-' + month + '-' + day;
        $('#dateID').attr('max', maxDate);
    </script>
@endsection

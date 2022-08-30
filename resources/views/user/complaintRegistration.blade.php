@extends('user.layouts.app')

@section('title')
    @lang('title.complaintRegistration')
@stop

@section('content')
    <!-- CONTENT WRAPPER -->
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-xl-1 ">
                </div>
                <div class="col-xl-10 col-lg-12">
                    <div class="ec-cat-list card card-default mb-24px">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-xl-6 col-sm-6 p-b-15 lbl-card">
                                    <div class="card card-mini dash-card card-1">
                                        <div class="card-body">
                                            <h2 class="mb-1">{{ $data }}</h2>
                                            <p>Total Complaint</p>
                                            <span class="mdi mdi-account-card-details"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-sm-6 p-b-15 lbl-card">
                                    <div class="card card-mini dash-card card-3">
                                        <div class="card-body">

                                            <h2 class="mb-1">{{ $solved }}</h2>
                                            <p>Resolved Complaint</p>
                                            <span class="mdi mdi-account-card-details"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- @foreach ($data as $cr)
                                @if ($cr->ticketID != 'Solved')
                                    <div class="alert alert-success"> <strong>Your complaint id :
                                            {{ $cr->ticketID }} is registered with us. We will update you
                                            shortly.</strong></div>
                                    <br />
                                @else
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            <i class="mdi mdi-check-circle-outline"></i> {{ session('success') }}
                                        </div>
                                    @endif
                                @endif
                            @endforeach --}}

                            <h4>Complaint Registration</h4>
                            <hr>
                            <small>Items marked with an asterisk (*) must be filled out.</small><br><br>

                            <div class="col-lg-12">
                                @include('component.alert')
                                <div class="ec-vendor-upload-detail">
                                    <form class="row g-3" method="POST" action="{{ route('complaintRegistration.store') }}"
                                        enctype="multipart/form-data">
                                        {!! csrf_field() !!}

                                        <div class=" container">
                                            <div class="col-12 col-md-12 col-lg-12">
                                                <div class="row">

                                                    {{-- Ticket ID --}}
                                                    <div class="col-md-12 col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="ticketID" hidden class="form-label">Ticket ID
                                                                <span class="required">*</span></label>
                                                            <input type="hidden" class="form-select1" id="ticketID"
                                                                aria-describedby="ticketIDHelp" name="ticketID"
                                                                value="{{ $ticketID }}" readonly>
                                                        </div>
                                                    </div>

                                                    {{-- Status --}}
                                                    <div class="col-md-12 col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="status" hidden class="form-label">Status <span
                                                                    class="required">*</span></label>
                                                            <input type="hidden" class="form-select1" id="status"
                                                                aria-describedby="statusHelp" name="status"
                                                                value="Pending For Review" readonly>
                                                        </div>
                                                    </div>

                                                    {{-- Name --}}
                                                    <div class="col-md-4 col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Customer Name<span
                                                                    class="required">*</span></label>
                                                            <input type="text" class="form-select1" id="name"
                                                                aria-describedby="nameHelp" name="name"
                                                                value="{{ Auth::user()->name }} {{ Auth::user()->last_name }}"
                                                                readonly>
                                                        </div>
                                                    </div>

                                                    {{-- Customer Email --}}
                                                    <div class="col-md-4 col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="email" class="form-label">Customer Email<span
                                                                    class="required">*</span></label>
                                                            <input type="email" class="form-select1" id="email"
                                                                aria-describedby="emailHelp" name="email"
                                                                value="{{ Auth::user()->email }}" readonly>
                                                        </div>
                                                    </div>

                                                    {{-- Customer Phone --}}
                                                    <div class="col-md-4 col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="phone" class="form-label">Customer Phone<span
                                                                    class="required">*</span></label>
                                                            <input type="tel"
                                                                class="form-select1 @error('phone') is-invalid @enderror"
                                                                id="phone" aria-describedby="phoneHelp" name="phone"
                                                                value="{{ Auth::user()->phone }}" readonly>
                                                            @error('phone')
                                                                <span class="invalid-feedback form-text" id="phoneHelp"
                                                                    role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    {{-- Ticket ID OLD --}}
                                                    <div class="col-md-6 col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="ticketOld" class="form-label">Previous Complaint
                                                                ID<span class="required">(Optional)</span></label>
                                                            <input type="text"
                                                                class="form-select1 @error('ticketOld') is-invalid @enderror"
                                                                id="ticketOld" aria-describedby="ticketOldHelp"
                                                                name="ticketOld">
                                                            @error('ticketOld')
                                                                <span class="invalid-feedback form-text" id="ticketOldHelp"
                                                                    role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    {{-- Priority Code --}}
                                                    <div class="col-md-6 col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="priority" class="form-label">Priority Code<span
                                                                    class="required">(Optional)</span></label>
                                                            <input type="text"
                                                                class="form-select1 @error('priority') is-invalid @enderror"
                                                                id="priority" aria-describedby="priorityHelp"
                                                                name="priority">
                                                            @error('priority')
                                                                <span class="invalid-feedback form-text" id="priorityHelp"
                                                                    role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    {{-- Product Number --}}
                                                    <div class="col-md-6 col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="productPartNo" class="form-label">Notebook
                                                                Model No.<span class="required">*</span> <small>(
                                                                    Please check the backside of the notebook Example:
                                                                    NS14A8INF561-MP),</small></label>
                                                            <input type="text"
                                                                class="form-select1 @error('productPartNo') is-invalid @enderror"
                                                                id="productPartNo" aria-describedby="productPartNoHelp"
                                                                name="productPartNo">
                                                            @error('productPartNo')
                                                                <span class="invalid-feedback form-text"
                                                                    id="productPartNoHelp" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>



                                                    {{-- Product Serial Number --}}
                                                    <div class="col-md-6 col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="productSerialNo" class="form-label">Serial
                                                                Number<span class="required">*</span></label>
                                                            <input type="text"
                                                                class="form-select1 @error('productSerialNo') is-invalid @enderror"
                                                                id="productSerialNo"
                                                                aria-describedby="productSerialNoHelp"
                                                                name="productSerialNo">
                                                            @error('productSerialNo')
                                                                <span class="invalid-feedback form-text"
                                                                    id="productSerialNoHelp" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                    {{-- Serial no image --}}
                                                    <div class="col-md-12 col-md-12">
                                                        <div class="mb-4">
                                                            <img src="/assets/img/serial_no.jpeg" style="width:100%">

                                                        </div>
                                                    </div>

                                                    {{-- Product DOP --}}
                                                    <div class="col-md-4 col-md-4">
                                                        <div class="mb-3">
                                                            <label for="purchaseDate" class="form-label">Purchase
                                                                Date<span class="required">*</span></label>
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
                                                    <div class="col-md-4 col-md-4">
                                                        <div class="mb-3">
                                                            <label for="warrantyCheck" class="form-label">Warranty
                                                                Check<span class="required">*</span></label>
                                                            <select
                                                                class="form-select1 @error('warrantyCheck') is-invalid @enderror"
                                                                id="warrantyCheck" aria-describedby="warrantyCheckHelp"
                                                                name="warrantyCheck">
                                                                <option value="">------</option>
                                                                <option value="Yes">Yes</option>
                                                                <option value="No">No</option>
                                                            </select>
                                                            @error('warrantyCheck')
                                                                <span class="invalid-feedback form-text"
                                                                    id="warrantyCheckHelp" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    {{-- Product Channel  Of Purchase --}}
                                                    <div class="col-md- col-md-4">
                                                        <div class="mb-3">
                                                            <label for="chanalPurchase" class="form-label">Channel Of
                                                                Purchase<span class="required">*</span></label>
                                                            <select
                                                                class="form-select1 @error('chanalPurchase') is-invalid @enderror"
                                                                id="chanalPurchase" aria-describedby="chanalPurchaseHelp"
                                                                name="chanalPurchase">
                                                                <option value="">------</option>
                                                                <option value="Online">Online</option>
                                                                <option value="Offline">Offline</option>
                                                            </select>
                                                            @error('chanalPurchase')
                                                                <span class="invalid-feedback form-text"
                                                                    id="chanalPurchaseHelp" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    {{-- City --}}
                                                    <div class="col-md-6 col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="city" class="form-label">City<span
                                                                    class="required">*</span></label>
                                                            <input type="text"
                                                                class="form-select1 @error('city') is-invalid @enderror"
                                                                id="city" aria-describedby="cityHelp"
                                                                name="city">
                                                            @error('city')
                                                                <span class="invalid-feedback form-text" id="cityHelp"
                                                                    role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    {{-- state --}}
                                                    <div class="col-md-6 col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="state" class="form-label">State<span
                                                                    class="required">*</span></label>
                                                            {{-- <input type="text"
                                                                class="form-select1 @error('state') is-invalid @enderror"
                                                                id="state" aria-describedby="stateHelp"
                                                                name="state"> --}}
                                                            <select
                                                                class="form-select1 @error('state') is-invalid @enderror"
                                                                id="state" aria-describedby="stateHelp"
                                                                name="state" placeholder="dkfffff">
                                                                <option value="">------</option>
                                                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                                <option value="Andaman and Nicobar Islands">Andaman and
                                                                    Nicobar Islands</option>
                                                                <option value="Arunachal Pradesh">Arunachal Pradesh
                                                                </option>
                                                                <option value="Assam">Assam</option>
                                                                <option value="Bihar">Bihar</option>
                                                                <option value="Chandigarh">Chandigarh</option>
                                                                <option value="Chhattisgarh">Chhattisgarh</option>
                                                                <option value="Dadar and Nagar Haveli">Dadar and Nagar
                                                                    Haveli</option>
                                                                <option value="Daman and Diu">Daman and Diu</option>
                                                                <option value="Delhi">Delhi</option>
                                                                <option value="Lakshadweep">Lakshadweep</option>
                                                                <option value="Puducherry">Puducherry</option>
                                                                <option value="Goa">Goa</option>
                                                                <option value="Gujarat">Gujarat</option>
                                                                <option value="Haryana">Haryana</option>
                                                                <option value="Himachal Pradesh">Himachal Pradesh
                                                                </option>
                                                                <option value="Jammu and Kashmir">Jammu and Kashmir
                                                                </option>
                                                                <option value="Jharkhand">Jharkhand</option>
                                                                <option value="Karnataka">Karnataka</option>
                                                                <option value="Kerala">Kerala</option>
                                                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                                <option value="Maharashtra">Maharashtra</option>
                                                                <option value="Manipur">Manipur</option>
                                                                <option value="Meghalaya">Meghalaya</option>
                                                                <option value="Mizoram">Mizoram</option>
                                                                <option value="Nagaland">Nagaland</option>
                                                                <option value="Odisha">Odisha</option>
                                                                <option value="Punjab">Punjab</option>
                                                                <option value="Rajasthan">Rajasthan</option>
                                                                <option value="Sikkim">Sikkim</option>
                                                                <option value="Tamil Nadu">Tamil Nadu</option>
                                                                <option value="Telangana">Telangana</option>
                                                                <option value="Tripura">Tripura</option>
                                                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                                <option value="Uttarakhand">Uttarakhand</option>
                                                                <option value="West Bengal">West Bengal</option>
                                                            </select>
                                                            @error('state')
                                                                <span class="invalid-feedback form-text" id="stateHelp"
                                                                    role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                    {{-- address --}}
                                                    <div class="col-md-12 col-md-12">
                                                        <div class="mb-3">
                                                            <label for="address" class="form-label">Address<span
                                                                    class="required">*</span></label>
                                                            <textarea class="form-select1 @error('address') is-invalid @enderror" id="address" aria-describedby="addressHelp"
                                                                name="address" rows="3"></textarea>

                                                            @error('address')
                                                                <span class="invalid-feedback form-text" id="addressHelp"
                                                                    role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    {{-- Pincode --}}
                                                    <div class="col-md-6 col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="pinCode" class="form-label">Pincode<span
                                                                    class="required">*</span></label>
                                                            <input type="text"
                                                                class="form-select1 @error('pinCode') is-invalid @enderror"
                                                                id="pinCode" aria-describedby="pinCodeHelp"
                                                                name="pinCode">
                                                            @error('pinCode')
                                                                <span class="invalid-feedback form-text" id="pinCodeHelp"
                                                                    role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    {{-- Purchase Invoice --}}
                                                    <div class="col-md-6 col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="purchaseInvoice" class="form-label">Purchase
                                                                Invoice<span class="required">*</span></label>
                                                            <input type="file"
                                                                class="form-select1 @error('purchaseInvoice') is-invalid @enderror"
                                                                id="purchaseInvoice"
                                                                aria-describedby="purchaseInvoiceHelp"
                                                                name="purchaseInvoice[]">
                                                            @error('purchaseInvoice')
                                                                <span class="invalid-feedback form-text"
                                                                    id="purchaseInvoiceHelp" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    {{-- Describe your Issue --}}
                                                    <div class="col-md-12 col-md-12">
                                                        <div class="mb-3">
                                                            <label for="issue" class="form-label">Describe your
                                                                Issue<span class="required">*</span></label>
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
        </div> <!-- End Content -->
    </div>
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

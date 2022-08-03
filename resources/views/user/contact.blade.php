@extends('user.layouts.app')

@section('title')
    @lang('title.contact')
@stop

@section('css')
    <style>
        .text {
            color: #662D91;
        }

    </style>
@endsection

@section('content')
    <!-- CONTENT WRAPPER -->
    <div class="ec-content-wrapper ec-vendor-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                <div>
                    <h2 class="card-title">Contact Us</h2>
                    <p class="breadcrumbs"><span><a href="/">Home</a></span><span><i
                                class="mdi mdi-chevron-right"></i></span>Contact Us</p>
                </div>
            </div>
            <div class="card card-default p-4 ec-card-space">

                <h2 class="card-title text-start">Registered Product</h2>
                <p class="product-desc text-start">AVITA Customer Support. We are always available in
                    case you need help. For queries on the product, warranty related inquiries or any
                    form of customer support, please contact us on our toll-free customer support number
                    or write to on our support email for general sales enquiry.</p>
                <hr>
                <div class="row">
                    <div class="col-6">
                        <div class="">
                            <h2 class="contact_us_title">General Sales Enquiry :</h2>
                            <div class="mb-3">+91-7827845054</div>
                            <div class="mb-3">
                                <b>Email :</b>Insales@nexstgo.com
                            </div>
                            <div class="mb-3">
                                <b>Operating hours :</b>Monday to Friday : 9:30 am - 6:30 pm
                            </div>
                            <div class="mb-3">
                                <b>Address :</b>405, 4<sup>th</sup> Floor, Copia Business Suites,
                                <br>Jasola Vihar, New Delhi – 110025
                            </div>
                            <h2 class="contact_us_title">Service :</h2>
                            <div class="mb-3"><h5>Toll Free : 1800-103-9635</div>

                        </div>
                    </div>
                    <div class="col-6">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3504.2536055828955!2d77.28351261508101!3d28.562146382445686!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce7ea6bcee9bf%3A0x4fee98c6c6f1c5b1!2sAVITA%20India!5e0!3m2!1sen!2sin!4v1614163274176!5m2!1sen!2sin"
                            width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

                    </div>
                </div>
            </div>
        </div> <!-- End Content -->
    </div>
@endsection

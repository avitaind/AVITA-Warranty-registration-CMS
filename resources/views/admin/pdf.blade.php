<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Warranty Certificate</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /** Define the margins of your page **/
        @page {
            margin: 50px 0px 0px 0px;
        }

        * {
            font-family: verdana, geneva, sans-serif;
        }

        header {
            position: fixed;
            top: -50px;
            left: 0px;
            right: 0px;
        }

        footer {
            position: fixed;
            bottom: 0px;
        }

        .para {
            padding: 50px 25px;
            text-align: justify;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            padding-right: 25px;
            padding-left: 25px;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

    </style>
</head>

<body>
    <!-- Define header and footer blocks before your content -->
    <header>
        <img src="./assets/img/pdf/nexstgo_header.png" style="width: 100%">
    </header>

    <footer>
        <img src="./assets/img/pdf/nexstgo_footer.png" style="width: 100%">

        {{-- Copyright © <?php echo date('Y'); ?> --}}
    </footer>

    <!-- Wrap the content of your PDF inside a main tag -->

    <section class="">
        <h2 class="mt-5 text-center pb-4">Extended Warranty Certificate</h2>

        <div class="container">
            {{-- <span class="m-3"></span> --}}
            <h6 class=""><strong>Certificate No:-</strong> <span>AVEW-{{ $certificate->order_id }}</span></h6>
            {{-- <span class=" float-left"><strong>Certificate No:-</strong> AVEW-DJHSLDKFSDKFNSDK</span> --}}
        </div>
        <br />

        <div>
            {{-- <table class="">
                <tr>
                    <th>Product</th>
                    <th>Part Number</th>
                    <th>Serial Number</th>
                    <th>Expiry Date</th>
                </tr>
                <tr>
                    <td>{{ $certificate->product_configuration }}</td>
                    <td>{{ $certificate->product_number }}</td>
                    <td>{{ $certificate->serial_number }}</td>
                    <td>{{ $certificate->extend_date }}</td>
                </tr>
            </table> --}}

            <table >
                <tr>
                    <th>Product:</th>
                    <td class="" style="width: 80%">{{ $certificate->product_configuration }}</td>
                </tr>
                <tr>
                    <th>Part Number:</th>
                    <td>{{ $certificate->product_number }}</td>
                </tr>
                <tr>
                    <th>Serial Number:</th>
                    <td>{{ $certificate->serial_number }}</td>
                </tr>
                <tr>
                    <th>Expiry Date:</th>
                    <td>{{ $certificate->extend_date }}</td>
                </tr>
                <tr>
                    <th>Purchase Date:</th>
                    <td>{{ $certificate->purchase_date }}</td>
                </tr>
                <tr>
                    <th>Warranty Period:</th>
                    <td>{{ $WarrantyPeriod }} Days</td>
                </tr>

            </table>

        </div>



    </section>

    <section class="mt-4 ml-4 mr-4 text-justify">
        <p>
            <strong>
                <span>Disclaimer:</span>
            </strong>
            <span> NEXSTGO is not obligated to re-install preloaded software. A handling fee will be charged for
                the
                request for re-installation service.</span>
        </p>
        <p>
            <span>Customer is responsible for delivering and collecting the computer at their own cost when
                carry-in
                repaired service is requested.</span>
        </p>
        <p>
            <span>The extended warranty service is offered to the computer for defect(s) caused under normal
                usage,
                in the judgement of NEXSTGO's technician. The warranty is null and void under the following
                circumstances if:</span>
        </p>
        <ul>
            <li>
                <span>The computer has been damaged or has failed due to accident, cabinets/cosmetic damage,
                    abuse,
                    liquid spill or submersion, neglect, misuse, unauthorized modification, extreme environment,
                    extreme physical or electrical stress or interference, fluctuation or surges of electrical
                    power, lightning, static electricity, fire, acts of God or other external causes.</span>
            </li>
            <li>
                <span>The computer including hardware and preloaded software has been modified, altered and/or<br>
                    repaired by persons other than NEXSTGO and/or NEXSTGO's authorized service centres.</span>
            </li>
            <li>
                <span>The serial number has been altered, effaced or removed.</span>
            </li>
        </ul>
        <p>
        <p class="" style="page-break-after: always;"></p>
        </div>
    </section>

    <section>
        <div class=" ml-4 mr-4 text-justify" style="margin-top: 65px">

            <h6>
                <strong>Nexstgo Company Limited (“NEXSTGO”) Limited Warranty for AVITA Notebook Computer Devices (Only
                    applicable to “AVITA ADMIROR”, “AVITA LIBER”, “AVITA PURA”, “AVITA ESSENTIAL” and "AVITA SATUS
                    ULTIMUS", "AVITA MAGUS" series)</strong>
            </h6>

            <ol class=" pt-3">
                <li>NEXSTGO provides limited warranty period, eighteen (18) months for LIBER, PURA, ESSENTIAL and
                    ADMIROR series or twelve (12) months for AVITA SATUS ULTIMUS and MAGUS series, for customer who has
                    free carry-in repair service, including parts and labour for the notebook computer.</li>
                <li>The limited warranty covers the battery pack within eighteen (18) months for LIBER, PURA, ESSENTIAL
                    and ADMIROR series or twelve (12) months for AVITA SATUS ULTIMUS MAGUS series of the original
                    purchase date as shown on the original proof of purchase.</li>
                <li>The limited warranty covers the power adaptor within eighteen (18) months for LIBER, PURA, ESSENTIAL
                    and ADMIROR series or twelve (12) months for AVITA SATUS ULTIMUS and MAGUS series of the original
                    purchase date as shown on the original proof of purchase.</li>
                <li>NEXSTGO accepts goods exchange (except for displayed products) after verified by Repair Service
                    Centre with more than five (5) defective pixels within seven (7) calendar days from original date of
                    purchase. Goods returned to dealer must be in original packing, with accessories and proof of
                    purchase.</li>
                <li>NEXSTGO accepts goods exchange (except for displayed products) after verified by Repair Service
                    Centre with hardware failure within seven (7) calendar days from original date of purchase. Goods
                    returned to dealer must be in original packing, with accessories and proof of purchase.</li>
                <li>Customer must present the original proof of purchase to NEXSTGO Repair Service Centre for
                    verification when warranty service is rendered. Service fee will be charged if any one of the
                    documents cannot be produced. NEXSTGO reserves the right to refuse services to anyone if original
                    proof of purchase cannot be produced.</li>
                <li>Customer is responsible for delivering and collecting the Computer at his/her own cost when carry-in
                    repaired service is requested.</li>
                <li>This limited warranty covers hardware only. Software, accessories such as connection cables, power
                    cables and CD/DVD are excluded in the warranty.</li>
                <li>NEXSTGO is not obligated to re-install preloaded software. Handling fee will be charged for the
                    request of re-installation service.</li>


                <p class="" style="page-break-after: always;"></p>


                <li class="" style="margin-top: 65px">The limited warranty service is offered to the computer for defect(s) caused
                    under normal usage, in
                    the judgement of NEXSTGO's technician. The warranty is null and void under the following
                    circumstances if:</li>

                <ol type="i">
                    <li>the computer has been damaged or has failed due to accident, cabinets/cosmetic damage, abuse,
                        liquid spill or submersion, neglect, misuse, unauthorised modification, extreme environment,
                        extreme physical or electrical stress or interference, fluctuation or surges of electrical
                        power, lightning, static electricity, fire, acts of God or other external causes;</li>
                    <li>the computer, included hardware and preloaded software, has been modified, altered <br/>and/or
                        repaired by persons other than NEXSTGO and/or NEXSTGO's authorised service centres;</li>
                    <li>the serial number has been altered, effaced or removed;</li>
                </ol>

                <li>NEXSTGO may use parts or products that are new or refurbished and equivalent to new in performance
                    and reliability in servicing your product.</li>
                <li>Any defective part which has been replaced, shall be NEXSTGO's property.</li>
                <li>Customer should backup his/her own hard disk contents of his/her own accord before repair. NEXSTGO
                    shall not provide hard disk backup service.</li>
                <li>In case of repair, hard disk content may be destroyed and customer will not be informed in advance.
                    NEXSTGO shall not be liable for any data, records or program lost due to repair.</li>
                <li>Please refer to the Repair Terms and Conditions for the details on the Repair Services.</li>

            </ol>

            <p class="" style="page-break-after: never; ">


            </p>
        </div>
    </section>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" ></script> --}}

</body>

</html>

<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Warranty Certificate</title>
    <style>
        /** Define the margins of your page **/
        @page {
            margin: 50px 0px 0px 0px;
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
    <main>
        <div class="para">
            <h2 >Extended Warranty Certificate</h2>

            <table>
                <tr>
                    <th>Company</th>
                    <th>Contact</th>
                    <th>Country</th>
                </tr>
                <tr>
                    <td>Alfreds Futterkiste</td>
                    <td>Maria Anders</td>
                    <td>Germany</td>
                </tr>
                <tr>
                    <td>Centro comercial Moctezuma</td>
                    <td>Francisco Chang</td>
                    <td>Mexico</td>
                </tr>
                <tr>
                    <td>Ernst Handel</td>
                    <td>Roland Mendel</td>
                    <td>Austria</td>
                </tr>
                <tr>
                    <td>Island Trading</td>
                    <td>Helen Bennett</td>
                    <td>UK</td>
                </tr>
                <tr>
                    <td>Laughing Bacchus Winecellars</td>
                    <td>Yoshi Tannamuri</td>
                    <td>Canada</td>
                </tr>
                <tr>
                    <td>Magazzini Alimentari Riuniti</td>
                    <td>Giovanni Rovelli</td>
                    <td>Italy</td>
                </tr>
            </table>
            <p>
                <strong>
                    <span>Disclaimer:</span>
                </strong>
                <span> NEXSTGO is not obligated to re-install preloaded software. A handling fee will be charged for the
                    request for re-installation service.</span>
            </p>
            <p>
                <span>Customer is responsible for delivering and collecting the computer at their own cost when carry-in
                    repaired service is requested.</span>
            </p>
            <p>
                <span>The extended warranty service is offered to the computer for defect(s) caused under normal usage,
                    in the judgement of NEXSTGO's technician. The warranty is null and void under the following
                    circumstances if:</span>
            </p>
            <ul>
                <li>
                    <span>The computer has been damaged or has failed due to accident, cabinets/cosmetic damage, abuse,
                        liquid spill or submersion, neglect, misuse, unauthorized modification, extreme environment,
                        extreme physical or electrical stress or interference, fluctuation or surges of electrical
                        power, lightning, static electricity, fire, acts of God or other external causes.</span>
                </li>
                <li>
                    <span>The computer including hardware and preloaded software has been modified, altered and/or
                        repaired by persons other than NEXSTGO and/or NEXSTGO's authorized service centres.</span>
                </li>
                <li>
                    <span>The serial number has been altered, effaced or removed.</span>
                </li>
            </ul>
            <p>
                <strong>
                    <span>Please refer to the <a href="https://avita-india.com/product/liber/support#support-terms"
                            target="_blank">warranty details</a> for limited standard warranty clauses.
                    </span>
                </strong>
            </p>
            <p class="para" style="page-break-after: always;"></p>
        </div>
        <div class="para">
            <p class="" style="page-break-after: never; ">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
        </div>
    </main>
</body>

</html>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Warranty Certificate</title>
</head>

<body>
    <table class="table table-bordered">
        <thead>
            <tr>
                <td><b>Name</b></td>
                <td><b>Serial Number</b></td>
                <td><b>Product Number</b></td>
                <td><b>Product Configuration</b></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    {{ $certificate->name }}
                </td>
                <td>
                    {{ $certificate->serial_number }}
                </td>
                <td>
                    {{ $certificate->product_number }}
                </td>
                <td>
                    {{ $certificate->product_configuration }}
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>

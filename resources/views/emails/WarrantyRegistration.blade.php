<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Product Warranty Registration</title>
</head>

<body>

    <p>
        Hi, Product Warranty Registration: Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam officia
        voluptate
        quibusdam exercitationem eligendi recusandae, nemo ipsam earum! Distinctio voluptatem expedita veniam excepturi
        doloribus architecto aut dolor totam ratione quibusdam.
    </p>

    <p><strong>Product Configuration :</strong> {{ $WarrantyRegistration->product_configuration }}</p>
    <p><strong>Serial Number :</strong> {{ $WarrantyRegistration->serial_number }}</p>
    <p><strong>Product Number :</strong><?php $product_number = \App\Models\product_number::where('id', $WarrantyRegistration->product_number)->first(); ?>
        {{ $product_number->product_number }}</p>
    <p><strong>Purchase Date :</strong> {{ $WarrantyRegistration->purchase_date }}</p>
    <p><strong>Warranty Expiry :</strong>
        {{ date('Y-m-d', strtotime(date('Y-m-d', strtotime($WarrantyRegistration->purchase_date)) . ' + 364 day')) }}
    </p>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Warranty Extend</title>
</head>

<body>

    <p>
        Hi, Warranty Extend: Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam officia voluptate
        quibusdam exercitationem eligendi recusandae, nemo ipsam earum! Distinctio voluptatem expedita veniam excepturi
        doloribus architecto aut dolor totam ratione quibusdam.
    </p>

    <p><strong>Purchase Code:</strong> {{ $warrantyExtend->purchase_code }}</p>
    <p><strong>S.No:</strong> {{ $warrantyExtend->serial_number }}</p>
    <p><strong>P.No:</strong> <?php $partNo = \App\Models\product_number::where('id', $warrantyExtend->product_number)->first(); ?>
        {{ $partNo->product_number }}</p>
    <p><strong>Product Title:</strong> <?php $partConf = \App\Models\product_number::where('id', $warrantyExtend->product_number)->first(); ?>
        {{ $partNo->titleName }}</p>
</body>

</html>

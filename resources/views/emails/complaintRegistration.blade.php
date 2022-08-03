<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Complaint Registration</title>
</head>

<body>

    <p>
        Hi,

        Complaint Registration: Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam officia
        voluptate quibusdam exercitationem eligendi recusandae, nemo ipsam earum! Distinctio voluptatem expedita veniam
        excepturi doloribus architecto aut dolor totam ratione quibusdam.
    </p>

    <p><strong>Complaint ID :</strong> {{ $complaintRegistration->ticketID }}</p>
    <p><strong>Serial Number :</strong> {{ $complaintRegistration->productSerialNo }}</p>
    <p><strong>Product Number :</strong>{{ $complaintRegistration->productPartNo }}</p>
    <p><strong>Purchase Date :</strong> {{ $complaintRegistration->purchaseDate }}</p>
    {{-- <p><strong>Warranty Expiry :</strong>
        {{ date('Y-m-d', strtotime(date('Y-m-d', strtotime($complaintRegistration->purchaseDate)) . ' + 364 day')) }}
    </p> --}}
</body>

</html>

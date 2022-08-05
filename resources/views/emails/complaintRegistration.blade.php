<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>AVITA Complaint Registration</title>
</head>

<body>

    <p>
        Hi ,
        <br/>
        We are sorry to hear a complaint about one of our devices from you. We work hard to prevent situations like these, but sometimes things get out of hand. However, you don’t have to worry. Your complaint is processed as you read this mail. Furthermore, you can always go to our official website and get an update on your order.
        <br/>
        Thank you for trusting and purchasing from us.
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

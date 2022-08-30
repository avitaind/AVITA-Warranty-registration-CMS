<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>AVITA Complaint Registration</title>
</head>

<body>

    {{-- <p>Dear Valued Customer,</p>

    <p>We have received your query and our endeavour is to quickly provide you with the solution.</p>

    <p><strong>Complaint ID :</strong> {{ $complaintRegistration->ticketID }}</p>

    <p><strong>Serial Number :</strong> {{ $complaintRegistration->productSerialNo }}</p>

    <p><strong>Product Number :</strong> {{ $complaintRegistration->productPartNo }}</p>

    <p><strong>Purchase Date :</strong> {{ $complaintRegistration->purchaseDate }}</p> --}}

    {{-- <p>To track your query status please visit our official site <a href="https://avita-india.com/"
            target="_blank">www.avita-india.com</a> and connect on our chatbot.</p> --}}

    {{-- <p>Thank you for your patronage!</p>

    <p> Best Regards</p>
    <p>Team Avita</p>

    <p>Please do not reply to this email. For any support email us at In.support@nexstgo.com</p> --}}

    <p>Dear Valued Customer,</p>

    <p>We have received your query. It's always important for us to adhere to the needs of our customers. We endeavor to
        quickly provide you with the solution. Thank you for bringing this up.</p>

    <p><strong>Complaint ID :</strong> {{ $complaintRegistration->ticketID }}</p>

    <p><strong>Serial Number :</strong> {{ $complaintRegistration->productSerialNo }}</p>

    <p><strong>Product Number :</strong>{{ $complaintRegistration->productPartNo }}</p>

    <p><strong>Purchase Date :</strong> {{ $complaintRegistration->purchaseDate }}</p>
    {{-- <p><strong>Warranty Expiry :</strong>
        {{ date('Y-m-d', strtotime(date('Y-m-d', strtotime($complaintRegistration->purchaseDate)) . ' + 364 day')) }}
    </p> --}}

    {{-- <p>To track your query status please visit our official site <a href="https://novita-india.com/"
            target="_blank">www.novita-india.com</a> and connect on our chatbot.</p> --}}

    <p>Thank you for your patronage!</p>

    <p>Best Regards</p>

    <p>Team AVITA</p>

    <p>Please do not reply to this email. For any support email us at In.support@nexstgo.com</p>
</body>

</html>

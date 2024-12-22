<!DOCTYPE html>
<html>

<head>
    <title>Booking Information</title>
</head>

<body>
    <h1>Your Booking Details</h1>
    <p>Booking ID: {{ $bookingId }}</p>
    <p>Show the QR Code below to our Staff in venue:</p>
    <img src="data:image/png;base64,{{ $qrCodeBase64 }}" alt="QR Code">
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Event Ticket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.6;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            color: #4CAF50;
        }

        .details {
            margin-top: 20px;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }

        .qr-code {
            text-align: center;
            margin-top: 30px;
        }

        .qr-code img {
            width: 200px;
            height: auto;
        }

        .footer {
            margin-top: 30px;
            font-size: 14px;
            color: #555;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Your Event Ticket</h1>
        <p>Please bring this ticket and show the QR code at the entrance.</p>
    </div>

    <div class="details">
        <p><strong>Booking ID:</strong> {{ $bookingId }}</p>
    </div>

    <div class="qr-code">
        <img src="{{ $qrCodeBase64 }}" alt="QR Code">
    </div>

    <div class="footer">
        <p>If you have any questions, contact us at <a href="mailto:support@example.com">support@gmail.com</a>.</p>
        <p>We look forward to seeing you at the event!</p>
    </div>
</body>

</html>

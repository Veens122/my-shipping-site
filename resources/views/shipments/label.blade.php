<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Shipment Label</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        font-size: 14px;
    }

    .label-box {
        border: 2px dashed #000;
        padding: 20px;
        width: 400px;
    }

    h2 {
        margin-bottom: 10px;
        text-align: center;
    }

    .section {
        margin-bottom: 10px;
    }

    .barcode {
        text-align: center;
        margin-top: 15px;
    }
    </style>
</head>

<body>
    <div class="label-box">
        <h2>Shipment Label</h2>

        <div class="section"><strong>Tracking No:</strong> {{ $shipment->tracking_number }}</div>

        <div class="section"><strong>Sender:</strong> {{ $shipment->sender_name }}<br>
            {{ $shipment->sender_address }}<br>
            {{ $shipment->sender_city }}<br>
            Phone: {{ $shipment->sender_phone }}
        </div>

        <div class="section"><strong>Recipient:</strong> {{ $shipment->recipient_name }}<br>
            {{ $shipment->recipient_address }}<br>
            {{ $shipment->recipient_city }}<br>
            Phone: {{ $shipment->recipient_phone }}
        </div>

        <div class="section"><strong>Package Type:</strong> {{ $shipment->package_type }}</div>
        <div class="section"><strong>Status:</strong> {{ $shipment->status ?? 'Pending' }}</div>

        <!-- <div class="barcode">
            {!! QrCode::size(120)->generate(url('/track?tracking_number=' . $shipment->tracking_number)) !!}
            <p style="font-size: 12px;">Scan to Track</p>
        </div> -->
    </div>
</body>

</html>
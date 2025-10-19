<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Shipment Receipt - PaxRuta Logistics</title>
    <style>
    /* Simple, PDF-compatible styles */
    body {
        font-family: 'DejaVu Sans', Arial, sans-serif;
        font-size: 12px;
        line-height: 1.4;
        margin: 0;
        padding: 20px;
        color: #333;
        background-color: #fff;
    }

    .receipt-container {
        max-width: 800px;
        margin: 0 auto;
        border: 2px solid #007bff;
        border-radius: 8px;
        padding: 20px;
        position: relative;
        background: #fff;
        overflow: hidden;
    }

    /* Simple CSS-based watermark that works with PDF */
    .watermark {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
        pointer-events: none;
        opacity: 0.1;
    }

    .watermark-text {
        position: absolute;
        font-size: 50px;
        font-weight: bold;
        color: #007bff;
        transform: rotate(-45deg);
        white-space: nowrap;
    }

    .watermark-1 {
        top: 30%;
        left: -100px;
    }

    .watermark-2 {
        top: 60%;
        left: -50px;
    }

    .watermark-3 {
        top: 80%;
        left: -150px;
    }

    .watermark-4 {
        top: 10%;
        left: 200px;
    }

    .content {
        position: relative;
        z-index: 2;
    }

    .header {
        text-align: center;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 2px solid #007bff;
    }

    .company-name {
        font-size: 28px;
        font-weight: bold;
        color: #007bff;
        margin-bottom: 5px;
    }

    .receipt-title {
        font-size: 18px;
        color: #666;
        font-weight: bold;
    }

    .section {
        margin-bottom: 20px;
        padding: 15px;
        border-left: 4px solid #007bff;
        border-radius: 4px;
    }

    .section-title {
        font-size: 16px;
        font-weight: bold;
        color: #007bff;
        margin-bottom: 10px;
    }

    .tracking-number {
        font-size: 16px;
        font-weight: bold;
        color: #007bff;
        background: #e7f3ff;
        padding: 8px 12px;
        border-radius: 4px;
        display: inline-block;
        margin-top: 5px;
    }

    .address-block {
        line-height: 1.6;
    }

    .package-type {
        background: #007bff;
        color: white;
        padding: 4px 8px;
        border-radius: 3px;
        font-weight: bold;
        font-size: 11px;
    }

    .divider {
        height: 1px;
        background: #ddd;
        margin: 20px 0;
    }

    .footer {
        text-align: center;
        margin-top: 25px;
        color: #666;
        font-size: 10px;
        border-top: 1px solid #ddd;
        padding-top: 10px;
    }

    .info-grid {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .info-item {
        flex: 1;
        padding: 0 10px;
    }

    /* Print styles */
    @media print {
        body {
            padding: 0;
            margin: 0;
        }

        .receipt-container {
            border: none;
            box-shadow: none;
            padding: 10px;
        }
    }
    </style>
</head>

<body>
    <div class="receipt-container">
        <!-- Safe CSS-based watermark -->
        <div class="watermark">
            <div class="watermark-text watermark-1">PaxRuta Logistics</div>
            <div class="watermark-text watermark-2">PaxRuta Logistics</div>
            <div class="watermark-text watermark-3">PaxRuta Logistics</div>
            <div class="watermark-text watermark-4">PaxRuta Logistics</div>
        </div>

        <div class="content">
            <div class="header">
                <div class="company-name">PaxRuta Logistics</div>
                <div class="receipt-title">SHIPMENT RECEIPT</div>
            </div>

            <div class="info-grid">
                <div class="info-item">
                    <div><strong>Tracking Number:</strong></div>
                    <div class="tracking-number">{{ $shipment->tracking_number }}</div>
                </div>
                <div class="info-item">
                    <div><strong>Date:</strong> {{ now()->format('d M Y, h:i A') }}</div>
                </div>
            </div>

            <div class="section">
                <div class="section-title">📦 Sender Information</div>
                <div class="address-block">
                    <strong>Name: {{ $shipment->sender_name }}</strong><br>
                    <strong>Address:</strong> {{ $shipment->sender_address }}<br>
                    <strong>City:</strong> {{ $shipment->sender_city }}<br>
                    <strong>Phone:</strong> {{ $shipment->sender_phone }}
                </div>
            </div>

            <div class="section">
                <div class="section-title">📍 Recipient Information</div>
                <div class="address-block">
                    <strong>{{ $shipment->recipient_name }}</strong><br>
                    <strong>Address:</strong> {{ $shipment->recipient_address }}<br>
                    <strong>City:</strong> {{ $shipment->recipient_city }}<br>
                    <strong>Phone:</strong> {{ $shipment->recipient_phone }}
                </div>
            </div>

            <div class="section">
                <div class="section-title">📋 Package Details</div>
                <div><strong>Package Type:</strong> <span class="package-type">{{ $shipment->package_type }}</span>
                </div>
            </div>

            <div class="divider"></div>

            <div class="footer">
                <div><strong>PaxRuta Logistics</strong></div>
                <div>Thank you for choosing our services</div>
                <div>www.paxrutalogistics.com | support@paxrutalogistics.com</div>
            </div>
        </div>
    </div>
</body>

</html>
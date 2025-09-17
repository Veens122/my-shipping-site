@component('mail::message')
# Shipment Receipt

Your shipment has been registered successfully.

**Tracking Number:** {{ $shipment->tracking_number }}

**Carrier:** {{ $shipment->carrier }}

**Sender:** {{ $shipment->sender_name }} ({{ $shipment->sender_address }})

**Receiver:** {{ $shipment->receiver_name }} ({{ $shipment->receiver_address }}) ({{ $shipment->phone_number }})

**Shipment type** {{$shipment->shipment_type}}

**Status:** {{ $shipment->status }}

**Payment:** ${{ number_format($shipment->payment_option, 2) }}

**Date:** {{ $shipment->time_stamp }}

@component('mail::button', ['url' => url('track/' . $shipment->tracking_number)])
Track Shipment
@endcomponent

Thanks,
{{ config('app.name') }}
@endcomponent
@extends('layouts.app')
@section('content')

<div class="container">
    <h3>Tracking Details</h3>

    <p><strong>Tracking Number:</strong>{{ $shipment->tracking_number}}</p>
    <p><strong>Sender:</strong>{{ $shipment->sender_name}}</p>
    <p><strong>Receiver:</strong>{{ $shipment->receiver_name}}</p>
    <p><strong>Receiver Email:</strong>{{ $shipment->receiver_email}}</p>
    <p><strong>Status:</strong>{{ $shipment->status}}</p>
    <p><strong>Location:</strong>{{ $shipment->current_location}}</p>
</div>

@endsection
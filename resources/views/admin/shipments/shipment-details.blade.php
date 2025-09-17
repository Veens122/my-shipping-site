@extends('admin_layouts.app')
@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Shipment Details</h2>
        <a href="{{ route('shipments.edit-shipment', $shipment->id) }}" class="btn btn-primary">Update Shipment </a>
    </div>

    <div class="mb-3">
        <label class="form-label fw-bold">Tracking Number</label>
        <p class="form-control-plaintext">{{ $shipment->tracking_number }}</p>
    </div>

    <div class="mb-3">
        <label class="form-label fw-bold">Receiver Name</label>
        <p class="form-control-plaintext">{{ $shipment->receiver_name }}</p>
    </div>

    <div class="mb-3">
        <label class="form-label fw-bold">Current Location</label>
        <p class="form-control-plaintext">{{ $shipment->current_location }}</p>
    </div>

    <div class="mb-3">
        <label class="form-label fw-bold">Status</label>
        <p class="form-control-plaintext">{{ $shipment->status ?? 'Pending' }}</p>
    </div>

    <a href="{{ route('shipments.shipment-list') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>



@endsection
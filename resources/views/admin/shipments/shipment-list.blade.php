@extends('admin_layouts.app')
@section('content')


<div class="container">
    <h2 class="mb-4">All Shipments</h2>

    @if($shipments->isEmpty())
    <p>No shipments found.</p>
    @else
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tracking Number</th>
                <th>Receiver</th>
                <th>Current Location</th>
                <th>Status</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($shipments as $shipment)
            <tr onclick="window.location='{{ route('shipments.shipment-details', $shipment->id) }}'"
                style="cursor: pointer;">
                <td>{{ $shipment->tracking_number }}</td>
                <td>{{ $shipment->receiver_name }}</td>
                <td>{{ $shipment->current_location }}</td>
                <td>{{ $shipment->status ?? 'Pending' }}</td>
                <td>{{ $shipment->created_at->format('d M Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>

    </table>
    @endif
</div>
@endsection
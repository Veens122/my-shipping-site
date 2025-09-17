@extends('admin_layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h2>Update Shipment - {{ $shipment->tracking_number }}</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('shipments.update.store', $shipment->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control" required>
                    <option value="Order Received">Order Received</option>
                    <option value="Package Handed to Carrier">Package Handed to Carrier</option>
                    <option value="In Transit">In Transit</option>
                    <option value="Out for Delivery">Out for Delivery</option>
                    <option value="Delivered">Delivered</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Location</label>
                <input type="text" name="location" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save Update</button>
        </form>
    </div>
</div>

<hr>

<h3>Update History</h3>
@foreach($shipment->updates as $update)
<div class="alert alert-info mb-2">
    <strong>{{ $update->status }}</strong> - {{ $update->description }} <br>
    <small>{{ $update->location }} | {{ $update->created_at->format('M d, Y - h:i A') }}</small>
</div>
@endforeach

@endsection
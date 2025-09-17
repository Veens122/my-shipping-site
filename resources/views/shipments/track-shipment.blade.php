@extends('layouts.app')
@section('content')

<header class="page-header" data-background="{{ asset('assets/images/slide01') }}.jpg">
    <div class="container">
        <h1>TRACK YOUR ORDER</h1>
        <p>Your order is currently heading for delivery<br> Hold on for a while </p>
    </div>
    <!-- end container -->
</header>



<div class="card shadow-sm rounded-lg mb-4">
    <!-- Header -->
    <div class="card-header d-flex justify-content-between align-items-center bg-light">
        <h4 class="mb-0">Shipment Status</h4>
        <span class="badge badge-pill 
            @if($shipment->status == 'Delivered') bg-success 
            @elseif($shipment->status == 'In Transit') bg-info 
            @elseif($shipment->status == 'Out for Delivery') bg-warning 
            @else bg-secondary @endif">
            {{ $shipment->status }}
        </span>
    </div>

    <!-- Timeline -->
    <div class="p-4">
        <div class="timeline">
            @foreach($shipment->updates as $update)
            <div class="timeline-item d-flex mb-4">
                <!-- Icon -->
                <div class="timeline-icon text-primary">
                    @if($update->status == 'Delivered')
                    <i class="fas fa-home fa-lg"></i>
                    @elseif($update->status == 'Out for Delivery')
                    <i class="fas fa-truck-loading fa-lg"></i>
                    @elseif($update->status == 'In Transit')
                    <i class="fas fa-shipping-fast fa-lg"></i>
                    @else
                    <i class="fas fa-check-circle fa-lg"></i>
                    @endif
                </div>

                <!-- Content -->
                <div class="timeline-content ms-3">
                    <h6 class="fw-bold mb-1">{{ $update->status }}</h6>
                    <p class="mb-1 text-muted">{{ $update->description }}</p>
                    <small class="text-secondary">
                        {{ $update->date ? \Carbon\Carbon::parse($update->date)->format('M d, Y - h:i A') : $update->created_at->format('M d, Y - h:i A') }}
                    </small>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Details -->
    <div class="card-body border-top">
        <h5 class="mb-3">Shipment Details</h5>
        <div class="row g-3">
            <div class="col-md-4">
                <span class="text-muted">Tracking Number</span>
                <p class="fw-semibold">{{ $shipment->tracking_number }}</p>
            </div>
            <div class="col-md-4">
                <span class="text-muted">Origin</span>
                <p class="fw-semibold">{{ $shipment->sender_city }}</p>
            </div>
            <div class="col-md-4">
                <span class="text-muted">Destination</span>
                <p class="fw-semibold">{{ $shipment->recipient_city }}</p>
            </div>
            <div class="col-md-4">
                <span class="text-muted">Current Location</span>
                <p class="fw-semibold">{{ $shipment->current_location }}</p>
            </div>
            <div class="col-md-4">
                <span class="text-muted">Weight</span>
                <p class="fw-semibold">{{ $shipment->weight ?? 'N/A' }} kg</p>
            </div>
            <div class="col-md-4">
                <span class="text-muted">Service Type</span>
                <p class="fw-semibold">{{ $shipment->package_type }}</p>
            </div>
        </div>
    </div>

    <!-- Map -->
    <div class="map-container">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d51220214.994566105!2d-107.09189728987968!3d38.41296086655821!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sng!4v1758122511056!5m2!1sen!2sng"
            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>


</div>

@endsection
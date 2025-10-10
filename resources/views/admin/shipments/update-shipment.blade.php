@extends('admin_layouts.app')
@section('content')
<div class="update-container">
    <!-- Update Form Card -->
    <div class="update-card">
        <div class="card-header">
            <h1 class="card-title">
                <i class="fas fa-map-marker-alt"></i> Update Shipment Location
            </h1>
        </div>
        <div class="card-body">
            <form action="{{ route('shipments.update.store', $shipment->id) }}" method="POST" id="updateForm">
                @csrf

                <!-- Status Selection -->
                <div class="mb-3">
                    <label class="form-label">
                        <i class="fas fa-tachometer-alt"></i> Status
                    </label>
                    <div class="row g-2">
                        @php
                        $statuses = [
                        'Order Received' => 'fas fa-box text-primary',
                        'Package Handed to Carrier' => 'fas fa-hands text-info',
                        'In Transit' => 'fas fa-shipping-fast text-warning',
                        'Out for Delivery' => 'fas fa-truck text-secondary',
                        'Delivered' => 'fas fa-check-circle text-success'
                        ];
                        @endphp

                        @foreach($statuses as $status => $icon)
                        <div class="col-md-{{ $status === 'Out for Delivery' || $status === 'Delivered' ? '6' : '4' }}">
                            <div class="form-check border rounded p-2">
                                <input class="form-check-input" type="radio" name="status"
                                    id="status{{ str_replace(' ', '', $status) }}" value="{{ $status }}"
                                    {{ $shipment->updates->last()?->status === $status ? 'checked' : '' }} required>
                                <label class="form-check-label w-100" for="status{{ str_replace(' ', '', $status) }}">
                                    <i class="{{ $icon }} me-2"></i> <span>{{ $status }}</span>
                                </label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Location Input -->
                <div class="form-group">
                    <label class="form-label" for="location">
                        <i class="fas fa-map-pin"></i> Location
                    </label>
                    <input type="text" name="location" class="form-control" id="location"
                        placeholder="Enter current location" value="{{ old('location') }}" required>
                </div>

                <!-- Hidden Latitude & Longitude -->
                <input type="hidden" name="latitude" id="latitude">
                <input type="hidden" name="longitude" id="longitude">

                <!-- Description Textarea -->
                <div class="form-group">
                    <label class="form-label" for="description">
                        <i class="fas fa-file-alt"></i> Description
                    </label>
                    <textarea name="description" class="form-control" id="description"
                        placeholder="Enter update details or notes" rows="4">{{ old('description') }}</textarea>
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <button type="submit" class="btn-primary-custom">
                        <i class="fas fa-save"></i> Save Update
                    </button>

                    <button type="button" class="btn-secondary-custom" onclick="window.history.back();">
                        <i class="fas fa-times"></i> Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Update History Section -->
    <div class="history-section">
        <div class="section-header">
            <div class="section-icon">
                <i class="fas fa-history"></i>
            </div>
            <h2 class="section-title">Update History</h2>
        </div>

        @if($shipment->updates->isEmpty())
        <div class="empty-history">
            <div class="empty-icon">
                <i class="fas fa-clock"></i>
            </div>
            <p class="empty-text">No updates yet. Add the first update to track this shipment's progress.</p>
        </div>
        @else
        <div class="timeline">
            @foreach($shipment->updates as $update)
            @php
            $timelineClass = match($update->status) {
            'Package Handed to Carrier' => 'timeline-handed',
            'In Transit' => 'timeline-transit',
            'Out for Delivery' => 'timeline-delivery',
            'Delivered' => 'timeline-delivered',
            default => 'timeline-received',
            };
            @endphp
            <div class="timeline-item {{ $timelineClass }}" style="animation-delay: {{ $loop->index * 0.1 }}s">
                <div class="timeline-header">
                    <div class="timeline-status">
                        <span class="status-indicator"></span>
                        {{ $update->status }}
                    </div>
                    <div class="timeline-location">
                        <i class="fas fa-map-marker-alt"></i> {{ $update->location }}
                    </div>
                </div>
                @if($update->description)
                <div class="timeline-description">
                    {{ $update->description }}
                </div>
                @endif
                <div class="timeline-time">
                    <i class="fas fa-clock"></i> {{ $update->created_at->format('M d, Y - h:i A') }}
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>

<script>
// Auto fetch latitude/longitude when user types location
document.getElementById('location').addEventListener('blur', function() {
    const address = this.value;
    if (address.length > 3) {
        fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(address)}`)
            .then(res => res.json())
            .then(data => {
                if (data.length > 0) {
                    document.getElementById('latitude').value = data[0].lat;
                    document.getElementById('longitude').value = data[0].lon;
                }
            })
            .catch(err => console.error(err));
    }
});
</script>

@endsection
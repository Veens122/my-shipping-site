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

                <!-- Status Selection (radio buttons for clarity) -->
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
                        <div class="col-md-{{ in_array($status, ['Out for Delivery','Delivered']) ? '6' : '4' }}">
                            <div class="form-check border rounded p-2">
                                <input class="form-check-input status-radio" type="radio" name="status"
                                    id="status{{ str_replace(' ', '', $status) }}" value="{{ $status }}"
                                    {{ $shipment->updates->last()?->status === $status ? 'checked' : '' }} required>
                                <label class="form-check-label w-100" for="status{{ str_replace(' ', '', $status) }}">
                                    <i class="{{ $icon }} me-2"></i> {{ $status }}
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

                <!-- Date Fields for each status -->
                <div class="form-group status-date" id="order_received_date_field" style="display:none;">
                    <label>Order Received Date</label>
                    <input type="datetime-local" name="order_received_date" class="form-control">
                </div>

                <div class="form-group status-date" id="handed_to_carrier_date_field" style="display:none;">
                    <label>Package Handed to Carrier Date</label>
                    <input type="datetime-local" name="handed_to_carrier_date" class="form-control">
                </div>

                <div class="form-group status-date" id="in_transit_date_field" style="display:none;">
                    <label>In Transit Date</label>
                    <input type="datetime-local" name="in_transit_date" class="form-control">
                </div>

                <div class="form-group status-date" id="out_for_delivery_date_field" style="display:none;">
                    <label>Out for Delivery Date</label>
                    <input type="datetime-local" name="out_for_delivery_date" class="form-control">
                </div>

                <div class="form-group status-date" id="delivered_date_field" style="display:none;">
                    <label>Delivered Date</label>
                    <input type="datetime-local" name="delivered_date" class="form-control">
                </div>

                <!-- Form Actions -->
                <div class="form-actions mt-3">
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


    // For status date manual settings

    const statusRadios = document.querySelectorAll('.status-radio');
    const dateFields = {
        'Order Received': 'order_received_date_field',
        'Package Handed to Carrier': 'handed_to_carrier_date_field',
        'In Transit': 'in_transit_date_field',
        'Out for Delivery': 'out_for_delivery_date_field',
        'Delivered': 'delivered_date_field',
    };

    function toggleDateFields() {
        Object.values(dateFields).forEach(id => document.getElementById(id).style.display = 'none');
        const selected = document.querySelector('.status-radio:checked')?.value;
        if (selected && dateFields[selected]) {
            document.getElementById(dateFields[selected]).style.display = 'block';
        }
    }

    statusRadios.forEach(radio => {
        radio.addEventListener('change', toggleDateFields);
    });

    // Initialize on page load
    toggleDateFields();
</script>

@endsection
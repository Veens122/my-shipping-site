@extends('admin_layouts.app')
@section('content')
<!-- Page Header -->
<div class="page-header">
    <h1 class="page-title">
        <i class="fas fa-shipping-fast"></i> Shipment Details
    </h1>
    <div class="header-actions">
        <a href="{{ route('shipments.edit-shipment', $shipment->id) }}" class="btn-primary-custom">
            <i class="fas fa-edit"></i> Edit Shipment
        </a>
        <a href="{{ route('shipments.update.form', $shipment->id) }}" class="btn-outline-custom">
            <i class="fas fa-map-marker-alt"></i> Update Location
        </a>
    </div>
</div>

<!-- Main Content -->
<div class="content-grid">
    <!-- Left Column: Shipment Information -->
    <div>
        <!-- Shipment Info Card -->
        <div class="info-card">
            <div class="card-header">
                <h2 class="card-title">
                    <i class="fas fa-info-circle"></i> Shipment Information
                </h2>
            </div>
            <div class="card-body">
                <div class="info-grid">
                    <!-- Sender Information -->
                    <div class="info-section">
                        <h3 class="section-title">
                            <i class="fas fa-user"></i> Sender Details
                        </h3>
                        <div class="info-item">
                            <span class="info-label">Name:</span>
                            <span class="info-value">{{ $shipment->sender_name }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Phone:</span>
                            <span class="info-value">{{ $shipment->sender_phone }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Address:</span>
                            <span class="info-value">{{ $shipment->sender_address }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">City:</span>
                            <span class="info-value">{{ $shipment->sender_city }}</span>
                        </div>
                    </div>

                    <!-- Receiver Information -->
                    <div class="info-section">
                        <h3 class="section-title">
                            <i class="fas fa-user-check"></i> Receiver Details
                        </h3>
                        <div class="info-item">
                            <span class="info-label">Name:</span>
                            <span class="info-value">{{ $shipment->recipient_name }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Phone:</span>
                            <span class="info-value">{{ $shipment->recipient_phone }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Address:</span>
                            <span class="info-value">{{ $shipment->recipient_address }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">City:</span>
                            <span class="info-value">{{ $shipment->recipient_city }}</span>
                        </div>
                    </div>

                    <!-- Package Information -->
                    <div class="info-section">
                        <h3 class="section-title">
                            <i class="fas fa-box"></i> Package Details
                        </h3>
                        <div class="info-item">
                            <span class="info-label">Tracking Number:</span>
                            <span class="info-value"><strong>{{ $shipment->tracking_number }}</strong></span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Weight:</span>
                            <span class="info-value">{{ $shipment->package_weight }} kg</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Type:</span>
                            <span class="info-value">{{ $shipment->package_type }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Current Location:</span>
                            <span class="info-value">{{ $shipment->current_location }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Column: Status and Actions -->
    <div>
        <!-- Status Card -->
        <div class="status-card">
            <div class="status-header">
                <h3 class="section-title">
                    <i class="fas fa-tachometer-alt"></i> Status
                </h3>
                @php
                $statusClass = 'status-pending';
                if ($shipment->status === 'In Transit') {
                $statusClass = 'status-in-transit';
                } elseif ($shipment->status === 'Delivered') {
                $statusClass = 'status-delivered';
                } elseif ($shipment->status === 'Cancelled') {
                $statusClass = 'status-cancelled';
                }
                @endphp
                <span class="status-badge {{ $statusClass }}">
                    @if($shipment->status === 'In Transit')
                    <i class="fas fa-shipping-fast"></i>
                    @elseif($shipment->status === 'Delivered')
                    <i class="fas fa-check-circle"></i>
                    @elseif($shipment->status === 'Cancelled')
                    <i class="fas fa-times-circle"></i>
                    @else
                    <i class="fas fa-clock"></i>
                    @endif
                    {{ $shipment->status ?? 'Pending' }}
                </span>
            </div>

            <!-- Tracking Timeline -->
            <div class="timeline">
                <div class="timeline-item active">
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <div class="timeline-title">Shipment Created</div>
                        <div class="timeline-time">{{ $shipment->created_at->format('M d, Y H:i') }}</div>
                    </div>
                </div>
                <div class="timeline-item {{ $shipment->status !== 'Pending' ? 'active' : '' }}">
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <div class="timeline-title">In Transit</div>
                        <div class="timeline-time">
                            @if($shipment->status !== 'Pending')
                            {{ $shipment->updated_at->format('M d, Y H:i') }}
                            @else
                            Pending
                            @endif
                        </div>
                    </div>
                </div>
                <div class="timeline-item {{ $shipment->status === 'Delivered' ? 'active' : '' }}">
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <div class="timeline-title">Delivered</div>
                        <div class="timeline-time">
                            @if($shipment->status === 'Delivered')
                            {{ $shipment->updated_at->format('M d, Y H:i') }}
                            @else
                            Estimated: Soon
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="action-buttons">
            <a href="{{ route('shipments.label.download', $shipment->id) }}" class="btn-success-custom">
                <i class="fas fa-download"></i> Download Label
            </a>
            <a href="{{ route('shipments.download-receipt', $shipment->id) }}" class="btn-info-custom">
                <i class="fas fa-receipt"></i> Download Receipt
            </a>
            <a href="{{ route('shipments.shipment-list') }}" class="btn-secondary-custom">
                <i class="fas fa-arrow-left"></i> Back to List
            </a>
            <button type="button" class="btn-danger-custom" data-bs-toggle="modal" data-bs-target="#deleteModal">
                <i class="fas fa-trash-alt"></i> Delete Shipment
            </button>
        </div>
    </div>
</div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-exclamation-triangle"></i> Confirm Deletion
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this shipment? This action cannot be undone.</p>
                <p class="text-muted">All tracking information and details will be permanently removed.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-secondary-custom" data-bs-dismiss="modal">
                    <i class="fas fa-times"></i> Cancel
                </button>
                <form id="deleteForm" action="{{ route('admin.shipments.destroy', $shipment->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-danger-custom">
                        <i class="fas fa-trash-alt"></i> Delete Shipment
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
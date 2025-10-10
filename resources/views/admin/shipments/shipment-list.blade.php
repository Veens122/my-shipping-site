@extends('admin_layouts.app')
@section('content')


<!-- Page Header -->
<div class="page-header">
    <h1 class="page-title">All Shipments</h1>
    <div class="page-actions">
        <a href="{{ route('admin.shipment.create-shipment') }}" class="btn btn-primary-custom">
            <i class="fas fa-plus-circle"></i> New Shipment
        </a>
    </div>
</div>

<!-- Search and Filter -->
<div class="search-filter-container">
    <div class="search-box">
        <i class="fas fa-search search-icon"></i>
        <input type="text" class="search-input" placeholder="Search by tracking number, recipient, or location...">
    </div>
    <div class="filter-dropdown">
        <button class="filter-btn">
            <i class="fas fa-filter"></i> Filter by Status
            <i class="fas fa-chevron-down ms-2"></i>
        </button>
    </div>
</div>

<!-- Stats Cards -->
<div class="stats-cards">
    <div class="stat-card">
        <div class="stat-header">
            <div class="stat-icon total">
                <i class="fas fa-truck"></i>
            </div>
            <div class="stat-trend trend-up">
                <i class="fas fa-arrow-up"></i>
                <span>{{ $totalShipments}}</span>
            </div>
        </div>
        <div class="stat-value">{{ $totalShipments}}</div>
        <div class="stat-label">Total Shipments</div>
    </div>

    <div class="stat-card">
        <div class="stat-header">
            <div class="stat-icon delivered">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-trend trend-up">
                <i class="fas fa-arrow-up"></i>
                <span>{{ $deliveredPercentage}}</span>
            </div>
        </div>
        <div class="stat-value">{{ $delivered}}</div>
        <div class="stat-label">Delivered</div>
    </div>

    <div class="stat-card">
        <div class="stat-header">
            <div class="stat-icon transit">
                <i class="fas fa-shipping-fast"></i>
            </div>
            <div class="stat-trend trend-down">
                <i class="fas fa-arrow-down"></i>
                <span>{{ $inTransitPercentage}}</span>
            </div>
        </div>
        <div class="stat-value">{{ $inTransit}}</div>
        <div class="stat-label">In Transit</div>
    </div>

    <div class="stat-card">
        <div class="stat-header">
            <div class="stat-icon pending">
                <i class="fas fa-clock"></i>
            </div>
            <div class="stat-trend trend-up">
                <i class="fas fa-arrow-up"></i>
                <span>{{ $pendingPercentage}}</span>
            </div>
        </div>
        <div class="stat-value">{{ $pending}}</div>
        <div class="stat-label">Pending</div>
    </div>
</div>

<!-- Shipments Table -->
<div class="shipments-card">
    <div class="card-header">
        <h3 class="card-title">Recent Shipments</h3>
    </div>

    <div class="table-container">
        @if($shipments->isEmpty())
        <div class="empty-state">
            <div class="empty-icon">
                <i class="fas fa-box-open"></i>
            </div>
            <h3 class="empty-title">No shipments found</h3>
            <p>There are no shipments in the system yet.</p>
            <a href="{{ route('admin.shipment.create-shipment') }}" class="btn btn-primary-custom mt-3">
                <i class="fas fa-plus-circle"></i> Create Your First Shipment
            </a>
        </div>
        @else
        <table class="shipments-table">
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
                <tr onclick="window.location='{{ route('shipments.shipment-details', $shipment->id) }}'">
                    <td>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-barcode me-2 text-muted"></i>
                            <strong>{{ $shipment->tracking_number }}</strong>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-user me-2 text-muted"></i>
                            {{ $shipment->recipient_name }}
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-map-marker-alt me-2 text-muted"></i>
                            {{ $shipment->current_location }}
                        </div>
                    </td>
                    <td>
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
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-calendar me-2 text-muted"></i>
                            {{ $shipment->created_at->format('d M Y H:i') }}
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>

    <!-- Pagination -->
    @if(!$shipments->isEmpty())
    <div class="pagination-container">
        <div class="pagination-info">
            Showing {{ $shipments->firstItem() }} to {{ $shipments->lastItem() }} of {{ $shipments->total() }}
            entries
        </div>
        <nav>
            <ul class="pagination">
                <li class="page-item {{ $shipments->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $shipments->previousPageUrl() }}">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                </li>

                @for ($i = 1; $i <= $shipments->lastPage(); $i++)
                    <li class="page-item {{ $shipments->currentPage() == $i ? 'active' : '' }}">
                        <a class="page-link" href="{{ $shipments->url($i) }}">{{ $i }}</a>
                    </li>
                    @endfor

                    <li class="page-item {{ $shipments->hasMorePages() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $shipments->nextPageUrl() }}">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </li>
            </ul>
        </nav>
    </div>
    @endif
</div>
</div>

@endsection
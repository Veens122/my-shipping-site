@extends('admin_layouts.app')
@section('content')

<div class="dashboard-container">
    <!-- Sidebar -->


    <!-- Main Content -->


    <!-- Content Area -->
    <div class="content-area">
        <h1 class="page-title">Dashboard Overview</h1>
        <p class="page-subtitle">Welcome back, <span class="fw-bold text-success">{{ $user->name }}!</span> Here's
            what's happening
            with
            your
            shipments
            today.</p>

        <!-- Stats Grid -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon primary">
                        <i class="fas fa-truck"></i>
                    </div>
                    <div class="stat-trend trend-up">
                        <i class="fas fa-arrow-up"></i>
                        <span>{{ $totalShipments > 0 ? $deliveredPercentage : 0 }}%</span>
                    </div>
                </div>
                <div class="stat-value">{{ $totalShipments}}</div>
                <div class="stat-label">Total Shipments</div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon success">
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
                    <div class="stat-icon warning">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stat-trend trend-down">
                        <i class="fas fa-arrow-down"></i>
                        <span>{{ $pendingPercentage}}%</span>
                    </div>
                </div>
                <div class="stat-value">{{ $pending}}</div>
                <div class="stat-label">Pending</div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon purple">
                        <i class="fas fa-shipping-fast"></i>
                    </div>
                    <div class="stat-trend trend-up">
                        <i class="fas fa-shipping-fast"></i>
                        <span>{{ $inTransitPercentage}}%</span>
                    </div>
                </div>
                <div class="stat-value">{{ $inTransit}}</div>
                <div class="stat-label">In Transit</div>
            </div>
        </div>

        <!-- Demo Content -->
        <div class="mt-4">
            <h4>Recent Activities</h4>
            <ul class="list-group">
                @forelse($recentShipments as $shipment)
                <li class="list-group-item">
                    <strong>{{ $shipment->tracking_number }}</strong>
                    - {{ $shipment->status }}
                    <span class="text-muted">
                        ({{ $shipment->created_at->diffForHumans() }})
                    </span>
                </li>
                @empty
                <li class="list-group-item text-muted">No recent activities yet.</li>
                @endforelse
            </ul>
        </div>
    </div>
    </main>
</div>




@endsection
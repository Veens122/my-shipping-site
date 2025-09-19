@extends('super_admin_layouts.app')

@section('content')

<!-- Dashboard Content -->
<main class="container-fluid py-4">
    <!-- Dashboard Header -->
    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4 gap-3">
        <div>
            <h1 class="h2 mb-1">Super Admin Dashboard</h1>
            <p class="text-muted mb-0">Welcome back, Super Admin! You’re in charge of the entire platform.</p>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4 g-3">
        <div class="col-md-6 col-lg-3">
            <div class="stat-card card h-100">
                <div class="card-body">
                    <div class="stat-card-header">
                        <h3 class="stat-card-title text-muted">Total Users</h3>
                        <div class="stat-card-icon bg-primary bg-opacity-10 text-primary">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-end">
                        <div class="stat-card-value">{{ $totalUsers ?? 0 }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="stat-card card h-100">
                <div class="card-body">
                    <div class="stat-card-header">
                        <h3 class="stat-card-title text-muted">Pending Approvals</h3>
                        <div class="stat-card-icon bg-warning bg-opacity-10 text-warning">
                            <i class="fas fa-user-clock"></i>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-end">
                        <div class="stat-card-value">{{ $pendingApprovals ?? 0 }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="stat-card card h-100">
                <div class="card-body">
                    <div class="stat-card-header">
                        <h3 class="stat-card-title text-muted">Total Shipments</h3>
                        <div class="stat-card-icon bg-info bg-opacity-10 text-info">
                            <i class="fas fa-truck"></i>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-end">
                        <div class="stat-card-value">{{ $totalShipments ?? 0 }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Recent Activity -->
    <div class="card mt-4">
        <div class="card-header bg-white border-bottom-0">
            <h3 class="h5 mb-0 d-flex align-items-center">
                <i class="fas fa-history text-primary me-2"></i> Recent User Registrations
            </h3>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                @forelse($recentUsers ?? [] as $user)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{ $user->name }} ({{ $user->email }})</span>
                    <small class="text-muted">{{ $user->created_at->diffForHumans() }}</small>
                </li>
                @empty
                <li class="list-group-item text-muted">No new users</li>
                @endforelse
            </ul>
        </div>
    </div>
</main>

@endsection
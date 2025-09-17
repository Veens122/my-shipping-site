@extends('admin_layouts.app')
@section('content')


<!-- Dashboard Content -->
<main class="container-fluid py-4">
    <!-- Dashboard Header -->
    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4 gap-3">
        <div>
            <h1 class="h2 mb-1">Dashboard Overview</h1>
            <p class="text-muted mb-0">Welcome back! Here's what's happening with your logistics operations.
            </p>
        </div>
        <div class="d-flex gap-2 items-center">

            <a href="{{ route('admin.shipment.create-shipment') }}" class="text-decoration-none"> <button
                    class="btn btn-primary d-flex align-items-center ">
                    <i class="fas fa-plus me-2"></i> New Shipment
                </button></a>



        </div>
    </div>



    <!-- Stats Cards -->
    <div class="row mb-4 g-3">
        <!-- Active Shipments Card -->
        <div class="col-md-6 col-lg-3">
            <div class="stat-card card h-100">
                <div class="card-body">
                    <div class="stat-card-header">
                        <h3 class="stat-card-title text-muted">Active Shipments</h3>
                        <div class="stat-card-icon bg-success bg-opacity-10 text-success">
                            <i class="fas fa-truck"></i>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-end">
                        <div class="stat-card-value">42</div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Delivered Today Card -->
        <div class="col-md-6 col-lg-3">
            <div class="stat-card card h-100">
                <div class="card-body">
                    <div class="stat-card-header">
                        <h3 class="stat-card-title text-muted">Delivered Orders</h3>
                        <div class="stat-card-icon bg-success bg-opacity-10 text-success">
                            <i class="fas fa-box"></i>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-end">
                        <div class="stat-card-value">28</div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Orders Card -->
        <div class="col-md-6 col-lg-3">
            <div class="stat-card card h-100">
                <div class="card-body">
                    <div class="stat-card-header">
                        <h3 class="stat-card-title text-muted">Pending Orders</h3>
                        <div class="stat-card-icon bg-danger bg-opacity-10 text-danger">
                            <i class="fas fa-clock"></i>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-end">
                        <div class="stat-card-value">156</div>

                    </div>
                </div>
            </div>
        </div>


    </div>


    <!-- Recent Activity and Quick Actions -->
    <div class="row g-4 mt-4">
        <!-- Recent Activity -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-white border-bottom-0">
                    <h3 class="h5 mb-0 d-flex align-items-center">
                        <i class="fas fa-history text-primary me-2"></i> Recent Activity
                    </h3>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item border-0 py-3">
                            <div class="d-flex align-items-start">
                                <div class="bg-primary bg-opacity-10 p-2 rounded-circle me-3">
                                    <i class="fas fa-truck text-primary"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-1">New shipment created</h6>
                                        <small class="text-muted">2 minutes ago</small>
                                    </div>
                                    <p class="mb-1 text-muted">Shipment #SH-2024-001 from New York to Los
                                        Angeles</p>
                                    <div class="d-flex align-items-center mt-2">
                                        <img src="https://randomuser.me/api/portraits/men/1.jpg"
                                            class="rounded-circle me-2" width="24" height="24">
                                        <small class="text-muted">John Doe</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="list-group-item border-0 py-3">
                            <div class="d-flex align-items-start">
                                <div class="bg-success bg-opacity-10 p-2 rounded-circle me-3">
                                    <i class="fas fa-check-circle text-success"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-1">Delivery completed</h6>
                                        <small class="text-muted">15 minutes ago</small>
                                    </div>
                                    <p class="mb-1 text-muted">Package #PKG-789 delivered successfully</p>
                                    <div class="d-flex align-items-center mt-2">
                                        <img src="https://randomuser.me/api/portraits/women/2.jpg"
                                            class="rounded-circle me-2" width="24" height="24">
                                        <small class="text-muted">Sarah Wilson</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header bg-white border-bottom-0">
                    <h3 class="h5 mb-0">Quick Actions</h3>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-6">
                            <a href="{{ route('admin.shipment.create-shipment') }}"
                                class="card card-hover h-100 text-decoration-none text-center p-3">
                                <div class="bg-primary bg-opacity-10 p-3 rounded-circle d-inline-flex mb-3">
                                    <i class="fas fa-plus-square text-primary fs-4"></i>
                                </div>
                                <h6 class="mb-1">Create Shipment</h6>
                                <small class="text-muted d-none d-md-block">Add new shipment</small>
                            </a>
                        </div>

                        <div class="col-6">
                            <a href="#" class="card card-hover h-100 text-decoration-none text-center p-3">
                                <div class="bg-success bg-opacity-10 p-3 rounded-circle d-inline-flex mb-3">
                                    <i class="fas fa-search-location text-success fs-4"></i>
                                </div>
                                <h6 class="mb-1">Track Package</h6>
                                <small class="text-muted d-none d-md-block">Find shipments</small>
                            </a>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</div>
</div>

@endsection
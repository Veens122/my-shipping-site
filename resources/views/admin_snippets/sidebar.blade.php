<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <i class="fas fa-truck text-primary me-2"></i>
            <span class="fs-5 fw-semibold">CargoMax</span>
            <button class="btn btn-sm ms-auto d-lg-none" id="sidebarClose">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="sidebar-menu">
            <div class="sidebar-section">
                <h2 class="sidebar-section-title">Dashboard</h2>
                <a href="../index.html" class="sidebar-item">
                    <i class="fas fa-th-large"></i>
                    <span>Overview</span>
                </a>
                <a href="../dashboard/map.html" class="sidebar-item">
                    <i class="fas fa-map"></i>
                    <span>Live Shipment Map</span>
                </a>
                <a href="../dashboard/fleet-status.html" class="sidebar-item">
                    <i class="fas fa-chart-line"></i>
                    <span>Fleet Status</span>
                </a>
            </div>

            <div class="sidebar-section">
                <h2 class="sidebar-section-title">Shipments</h2>
                <a href="{{ route('shipments.shipment-list')}}" class="sidebar-item">
                    <i class="fas fa-truck"></i>
                    <span>All Shipments</span>
                </a>
                <a href="track.html" class="sidebar-item">
                    <i class="fas fa-location-arrow"></i>
                    <span>Track Shipment</span>
                </a>
                <a href="{{ route('admin.shipment.create-shipment') }}" class="sidebar-item active">
                    <i class="fas fa-plus-square"></i>
                    <span>Create Shipment</span>
                </a>
                <a href="delayed.html" class="sidebar-item">
                    <i class="fas fa-clock"></i>
                    <span>Delayed Shipments</span>
                </a>
            </div>

            <div class="sidebar-section">
                <h2 class="sidebar-section-title">Orders</h2>
                <a href="../orders.html" class="sidebar-item">
                    <i class="fas fa-clipboard-list"></i>
                    <span>All Orders</span>
                </a>
                <a href="../orders/scheduled.html" class="sidebar-item">
                    <i class="fas fa-calendar"></i>
                    <span>Scheduled Deliveries</span>
                </a>
                <a href="../orders/returns.html" class="sidebar-item">
                    <i class="fas fa-undo"></i>
                    <span>Returns</span>
                </a>
                <a href="../orders/cancellations.html" class="sidebar-item">
                    <i class="fas fa-times-square"></i>
                    <span>Cancellations</span>
                </a>
            </div>

            <div class="sidebar-section">
                <h2 class="sidebar-section-title">System Tools</h2>
                <a href="../settings.html" class="sidebar-item">
                    <i class="fas fa-cog"></i>
                    <span>Settings</span>
                </a>
                <a href="../settings/roles.html" class="sidebar-item">
                    <i class="fas fa-shield-alt"></i>
                    <span>Roles & Permissions</span>
                </a>
                <a href="../settings/notifications.html" class="sidebar-item">
                    <i class="fas fa-bell"></i>
                    <span>Notifications Setup</span>
                </a>
            </div>

            <div class="sidebar-section">
                <h2 class="sidebar-section-title">Help & Logs</h2>
                <a href="../help.html" class="sidebar-item">
                    <i class="fas fa-life-ring"></i>
                    <span>Help Center</span>
                </a>
                <a href="../contact.html" class="sidebar-item">
                    <i class="fas fa-envelope"></i>
                    <span>Contact</span>
                </a>
                <a href="../email.html" class="sidebar-item">
                    <i class="fas fa-mail-bulk"></i>
                    <span>Email</span>
                </a>
                <a href="../chat.html" class="sidebar-item">
                    <i class="fas fa-comment-dots"></i>
                    <span>Chat</span>
                </a>
                <a href="../help/tickets.html" class="sidebar-item">
                    <i class="fas fa-ticket-alt"></i>
                    <span>Support Tickets</span>
                </a>
                <a href="../help/logs.html" class="sidebar-item">
                    <i class="fas fa-scroll"></i>
                    <span>Audit Logs</span>
                </a>
                <a href="../widgets.html" class="sidebar-item">
                    <i class="fas fa-th"></i>
                    <span>Widgets</span>
                </a>
            </div>
        </div>
    </div>
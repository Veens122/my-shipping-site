<!-- <div class="d-flex">
    <div class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <i class="fas fa-truck text-primary me-2"></i>
            <span class="fs-5 fw-semibold">ShipFlow</span>
            <button class="btn btn-sm ms-auto d-lg-none" id="sidebarClose">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="sidebar-menu">
            <div class="sidebar-section">
                <h2 class="sidebar-section-title">Dashboard</h2>
                <a href="#" class="sidebar-item">
                    <i class="fas fa-th-large"></i>
                    <span>Overview</span>
                </a>
                <a href="../dashboard/map.html" class="sidebar-item">
                    <i class="fas fa-map"></i>
                    <span>Live Shipment Map</span>
                </a>

            </div>

            <div class="sidebar-section">
                <h2 class="sidebar-section-title">Users</h2>
                <a href="{{ route('superadmin.users.index')}}" class="sidebar-item">
                    <i class="fas fa-truck"></i>
                    <span>All Users</span>
                </a>
                <a href="{{ route('superadmin.banned-users')}}" class="sidebar-item">
                    <i class="fas fa-location-arrow"></i>
                    <span>Banned Users</span>
                </a>
                <a href="{{ route('superadmin.pending-users')}}" class="sidebar-item active">
                    <i class="fas fa-plus-square"></i>
                    <span>Pending Users</span>


                </a>
            </div>


            <div class="sidebar-section">
                <h2 class="sidebar-section-title">Shipments</h2>
                <a href="" class="sidebar-item">
                    <i class="fas fa-truck"></i>
                    <span>All Shipments</span>
                </a>
                <a href="" class="sidebar-item">
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
    </div> -->




<aside class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <div class="brand-content">
            <div class="brand-logo">
                <div class="logo-icon">
                    <i class="fas fa-truck"></i>
                </div>
                <span class="brand-text">PaxRuta</span>
            </div>
            <button class="toggle-btn" id="toggle-sidebar">
                <i class="fas fa-chevron-left"></i>
            </button>
        </div>
    </div>

    <div class="sidebar-menu">
        <div class="sidebar-section">
            <h2 class="sidebar-section-title">Dashboard</h2>
            <a href="#" class="sidebar-item active">
                <i class="fas fa-th-large"></i>
                <span>Overview</span>
            </a>
        </div>

        <div class="sidebar-section">
            <h2 class="sidebar-section-title">Shipments</h2>
            <a href="{{ route('shipments.shipment-list')}}" class="sidebar-item">
                <i class="fas fa-shipping-fast"></i>
                <span>All Shipments</span>
            </a>
            <a href="track.html" class="sidebar-item">
                <i class="fas fa-location-arrow"></i>
                <span>Track Shipment</span>
            </a>
            <a href="{{ route('admin.shipment.create-shipment') }}" class="sidebar-item">
                <i class="fas fa-plus-circle"></i>
                <span>Create Shipment</span>
            </a>
        </div>

        <div class="sidebar-section">
            <h2 class="sidebar-section-title">System Tools</h2>
            <a href="{{ route('admin.profile.my-profile') }}" class="sidebar-item">
                <i class="fas fa-user"></i>
                <span>Profile</span>
            </a>
            <a href="{{ route('admin.profile.profile-edit') }}" class="sidebar-item">
                <i class="fas fa-cog"></i>
                <span>Profile Settings</span>
            </a>
        </div>

        <div class="sidebar-section">
            <h2 class="sidebar-section-title">Users</h2>
            <a href="{{ route('superadmin.users.index')}}" class="sidebar-item">
                <i class="fas fa-user"></i>
                <span>All users</span>

                <a href="{{ route('superadmin.banned-users')}}" class="sidebar-item">
                    <i class="fas fa-user"></i>
                    <span>Banned users</span>
                </a>
                <a href="{{ route('superadmin.pending-users')}}" class="sidebar-item">
                    <i class="fas fa-cog"></i>
                    <span>Pending Users</span>
                </a>
        </div>



        <div class="sidebar-section">
            <h2 class="sidebar-section-title">Help & Logs</h2>
            <a href="../help.html" class="sidebar-item">
                <i class="fas fa-question-circle"></i>
                <span>Help Center</span>
            </a>
            <a href="{{ route('contact')}}" class="sidebar-item">
                <i class="fas fa-envelope"></i>
                <span>Contact</span>
            </a>
            <a href="../email.html" class="sidebar-item">
                <i class="fas fa-inbox"></i>
                <span>Email</span>
            </a>
        </div>
    </div>

    <div class="sidebar-footer">
        <div class="user-info">
            <div class="user-avatar">A</div>
            <div class="user-details">
                <h4>Admin User</h4>
                <p>Administrator</p>
            </div>
        </div>
    </div>
</aside>
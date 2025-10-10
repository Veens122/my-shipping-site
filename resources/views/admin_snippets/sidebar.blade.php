<aside class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <div class="brand-content">
            <div class="brand-logo">
                <div class="logo-icon">
                    <i class="fas fa-truck"></i>
                </div>
                <a class="text-decoration-none" href="{{ route('home')}}"><span class="brand-text">PaxRuta</span></a>

            </div>
            <button class="toggle-btn" id="toggle-sidebar">
                <i class="fas fa-chevron-left"></i>
            </button>
        </div>
    </div>

    <div class="sidebar-menu">
        <div class="sidebar-section">
            <h2 class="sidebar-section-title">Dashboard</h2>
            <a href="{{ route('admin.dashboard') }}" class="sidebar-item active">
                <i class="fas fa-th-large"></i>
                <span>Overview</span>
            </a>
        </div>

        <div class="sidebar-section">
            <h2 class="sidebar-section-title">Shipments</h2>
            <a href="{{ route('shipments.shipment-list')}}" class="sidebar-item">
                <i class="fas fa-shipping-fast"></i>
                <span> Shipments List</span>
            </a>
            <a href="{{ url('/#track-order') }}" class="sidebar-item">
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
            <h2 class="sidebar-section-title">Help & Logs</h2>
            <a href="{{ route('contact')}}" class="sidebar-item">
                <i class="fas fa-question-circle"></i>
                <span>Help Center</span>
            </a>
            <a href="{{ route('contact')}}" class="sidebar-item">
                <i class="fas fa-envelope"></i>
                <span>Contact</span>
            </a>
            <a href="mailto:paxrutainfo@gmail.com" class="sidebar-item">
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
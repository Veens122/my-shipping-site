<!-- Sidebar -->
<div class="dashboard-container">


    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navigation -->


        <!-- Dashboard Content -->
        <main class="p-4 md:p-6">
            <!-- Dashboard Header -->
            <div class="flex flex-wrap items-center justify-between mb-6 gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Dashboard Overview</h1>
                    <p class="text-gray-500">Welcome back! Here's what's happening with your logistics operations.
                    </p>
                </div>
                <div class="flex space-x-2">
                    <button
                        class="flex items-center px-3 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                        <i class="fas fa-plus mr-2"></i> Add Vehicle
                    </button>
                    <button
                        class="flex items-center px-3 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                        <i class="fas fa-plus mr-2"></i> New Shipment
                    </button>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4 mb-6">
                <!-- Active Shipments Card -->
                <div class="stat-card">
                    <div class="stat-card-header">
                        <h3 class="stat-card-title">Active Shipments</h3>
                        <div class="stat-card-icon bg-green-50 text-green-600">
                            <i class="fas fa-truck"></i>
                        </div>
                    </div>
                    <div class="flex justify-between items-end">
                        <div class="stat-card-value">42</div>
                        <div class="flex items-center">
                            <span class="stat-card-change bg-green-100 text-green-800">+12%</span>
                            <i class="fas fa-arrow-up text-green-500 ml-1 text-xs"></i>
                        </div>
                    </div>
                </div>

                <!-- Delivered Today Card -->
                <div class="stat-card">
                    <div class="stat-card-header">
                        <h3 class="stat-card-title">Delivered Today</h3>
                        <div class="stat-card-icon bg-green-50 text-green-600">
                            <i class="fas fa-box"></i>
                        </div>
                    </div>
                    <div class="flex justify-between items-end">
                        <div class="stat-card-value">28</div>
                        <div class="flex items-center">
                            <span class="stat-card-change bg-green-100 text-green-800">+8%</span>
                            <i class="fas fa-arrow-up text-green-500 ml-1 text-xs"></i>
                        </div>
                    </div>
                </div>

                <!-- Pending Orders Card -->
                <div class="stat-card">
                    <div class="stat-card-header">
                        <h3 class="stat-card-title">Pending Orders</h3>
                        <div class="stat-card-icon bg-red-50 text-red-600">
                            <i class="fas fa-clock"></i>
                        </div>
                    </div>
                    <div class="flex justify-between items-end">
                        <div class="stat-card-value">156</div>
                        <div class="flex items-center">
                            <span class="stat-card-change bg-red-100 text-red-800">-5%</span>
                            <i class="fas fa-arrow-down text-red-500 ml-1 text-xs"></i>
                        </div>
                    </div>
                </div>

                <!-- Revenue Card -->
                <div class="stat-card">
                    <div class="stat-card-header">
                        <h3 class="stat-card-title">Revenue (MTD)</h3>
                        <div class="stat-card-icon bg-green-50 text-green-600">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                    </div>
                    <div class="flex justify-between items-end">
                        <div class="stat-card-value">$284,590</div>
                        <div class="flex items-center">
                            <span class="stat-card-change bg-green-100 text-green-800">+15%</span>
                            <i class="fas fa-arrow-up text-green-500 ml-1 text-xs"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts and Fleet Status -->
            <div class="grid gap-6 md:grid-cols-2">
                <!-- Shipment Trends -->
                <div class="bg-white p-4 rounded-lg border border-gray-200">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Shipment Trends</h3>
                        <select
                            class="text-sm border border-gray-300 rounded px-2 py-1 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option>Last 7 days</option>
                            <option>Last 30 days</option>
                            <option>Last 90 days</option>
                        </select>
                    </div>
                    <div class="h-64 bg-gray-50 rounded flex items-center justify-center">
                        <p class="text-gray-400">Shipment chart visualization</p>
                    </div>
                </div>

                <!-- Fleet Status -->
                <div class="bg-white p-4 rounded-lg border border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center mb-4">
                        <i class="fas fa-truck mr-2 text-blue-500"></i> Fleet Status Overview
                    </h3>
                    <div class="mt-4 space-y-6">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="text-center p-2 bg-gray-50 rounded">
                                <div class="text-2xl font-bold">45</div>
                                <div class="text-sm text-gray-500">Total Vehicles</div>
                            </div>
                            <div class="text-center p-2 bg-gray-50 rounded">
                                <div class="text-2xl font-bold text-green-600">87%</div>
                                <div class="text-sm text-gray-500">Efficiency</div>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <!-- Active Vehicles -->
                            <div>
                                <div class="flex items-center justify-between mb-1">
                                    <div class="flex items-center gap-2">
                                        <i class="fas fa-check-circle text-green-500"></i>
                                        <span class="text-sm">Active</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="text-sm font-medium">32</span>
                                        <span
                                            class="text-xs bg-green-100 text-green-800 px-2 py-0.5 rounded-full">71%</span>
                                    </div>
                                </div>
                                <div class="progress-container">
                                    <div class="progress-bar bg-green-500" style="width: 71%"></div>
                                </div>
                            </div>

                            <!-- Maintenance Needed -->
                            <div>
                                <div class="flex items-center justify-between mb-1">
                                    <div class="flex items-center gap-2">
                                        <i class="fas fa-wrench text-yellow-500"></i>
                                        <span class="text-sm">Maintenance</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="text-sm font-medium">8</span>
                                        <span
                                            class="text-xs bg-yellow-100 text-yellow-800 px-2 py-0.5 rounded-full">18%</span>
                                    </div>
                                </div>
                                <div class="progress-container">
                                    <div class="progress-bar bg-yellow-500" style="width: 18%"></div>
                                </div>
                            </div>

                            <!-- Available Vehicles -->
                            <div>
                                <div class="flex items-center justify-between mb-1">
                                    <div class="flex items-center gap-2">
                                        <i class="fas fa-info-circle text-blue-500"></i>
                                        <span class="text-sm">Available</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="text-sm font-medium">5</span>
                                        <span
                                            class="text-xs bg-blue-100 text-blue-800 px-2 py-0.5 rounded-full">11%</span>
                                    </div>
                                </div>
                                <div class="progress-container">
                                    <div class="progress-bar bg-blue-500" style="width: 11%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity and Quick Actions -->
            <div class="grid gap-6 mt-6 md:grid-cols-3">
                <!-- Recent Activity -->
                <div class="bg-white p-4 rounded-lg border border-gray-200 md:col-span-2">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center mb-4">
                        <i class="fas fa-history mr-2 text-blue-500"></i> Recent Activity
                    </h3>
                    <div class="space-y-4">
                        <!-- Activity Item 1 -->
                        <div class="flex items-start space-x-3 p-3 rounded-lg hover:bg-gray-50 transition-colors">
                            <div class="p-2 rounded-full bg-blue-100 text-blue-600">
                                <i class="fas fa-truck"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex flex-wrap justify-between">
                                    <p class="text-sm font-medium">New shipment created</p>
                                    <span class="text-xs text-gray-500">2 minutes ago</span>
                                </div>
                                <p class="text-sm text-gray-500 mt-1 truncate">Shipment #SH-2024-001 from New York
                                    to Los Angeles</p>
                                <div class="flex items-center mt-2 space-x-2">
                                    <img class="w-6 h-6 rounded-full"
                                        src="https://randomuser.me/api/portraits/men/1.jpg" alt="User">
                                    <span class="text-xs text-gray-500">John Doe</span>
                                </div>
                            </div>
                        </div>

                        <!-- Activity Item 2 -->
                        <div class="flex items-start space-x-3 p-3 rounded-lg hover:bg-gray-50 transition-colors">
                            <div class="p-2 rounded-full bg-green-100 text-green-600">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex flex-wrap justify-between">
                                    <p class="text-sm font-medium">Delivery completed</p>
                                    <span class="text-xs text-gray-500">15 minutes ago</span>
                                </div>
                                <p class="text-sm text-gray-500 mt-1 truncate">Package #PKG-789 delivered
                                    successfully</p>
                                <div class="flex items-center mt-2 space-x-2">
                                    <img class="w-6 h-6 rounded-full"
                                        src="https://randomuser.me/api/portraits/women/2.jpg" alt="User">
                                    <span class="text-xs text-gray-500">Sarah Wilson</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white p-4 rounded-lg border border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Quick Actions</h3>
                    <div class="grid grid-cols-2 gap-3">
                        <a href="#"
                            class="h-auto p-4 flex flex-col items-center gap-2 hover:shadow-md transition-all border border-gray-200 rounded-md bg-white hover:bg-blue-50">
                            <div class="p-3 rounded-full text-white bg-blue-500 hover:bg-blue-600">
                                <i class="fas fa-plus-square"></i>
                            </div>
                            <div class="text-center">
                                <div class="text-xs font-medium">Create Shipment</div>
                                <div class="text-xs text-gray-500">Add new shipment</div>
                            </div>
                        </a>

                        <a href="#"
                            class="h-auto p-4 flex flex-col items-center gap-2 hover:shadow-md transition-all border border-gray-200 rounded-md bg-white hover:bg-blue-50">
                            <div class="p-3 rounded-full text-white bg-green-500 hover:bg-green-600">
                                <i class="fas fa-search-location"></i>
                            </div>
                            <div class="text-center">
                                <div class="text-xs font-medium">Track Package</div>
                                <div class="text-xs text-gray-500">Find shipments</div>
                            </div>
                        </a>

                        <a href="#"
                            class="h-auto p-4 flex flex-col items-center gap-2 hover:shadow-md transition-all border border-gray-200 rounded-md bg-white hover:bg-blue-50">
                            <div class="p-3 rounded-full text-white bg-purple-500 hover:bg-purple-600">
                                <i class="fas fa-truck-moving"></i>
                            </div>
                            <div class="text-center">
                                <div class="text-xs font-medium">Add Vehicle</div>
                                <div class="text-xs text-gray-500">Register new vehicle</div>
                            </div>
                        </a>

                        <a href="#"
                            class="h-auto p-4 flex flex-col items-center gap-2 hover:shadow-md transition-all border border-gray-200 rounded-md bg-white hover:bg-blue-50">
                            <div class="p-3 rounded-full text-white bg-indigo-500 hover:bg-indigo-600">
                                <i class="fas fa-chart-bar"></i>
                            </div>
                            <div class="text-center">
                                <div class="text-xs font-medium">Generate Report</div>
                                <div class="text-xs text-gray-500">Create performance report</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<script>
    // Toggle sidebar collapse/expand
    document.getElementById('toggle-sidebar').addEventListener('click', function() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('collapsed');

        const icon = this.querySelector('i');
        if (sidebar.classList.contains('collapsed')) {
            icon.classList.replace('fa-chevron-left', 'fa-chevron-right');
        } else {
            icon.classList.replace('fa-chevron-right', 'fa-chevron-left');
        }
    });

    // Toggle mobile menu
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        document.getElementById('sidebar').classList.toggle('open');
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', function(event) {
        const sidebar = document.getElementById('sidebar');
        const mobileMenuButton = document.getElementById('mobile-menu-button');

        if (window.innerWidth < 768 &&
            !sidebar.contains(event.target) &&
            event.target !== mobileMenuButton &&
            !mobileMenuButton.contains(event.target)) {
            sidebar.classList.remove('open');
        }
    });

    // Sample data for the dashboard
    const dashboardData = {
        activeShipments: 42,
        deliveredToday: 28,
        pendingOrders: 156,
        revenue: 284590,
        fleet: {
            total: 45,
            active: 32,
            maintenance: 8,
            available: 5
        }
    };

    // Update dashboard stats
    function updateDashboardStats() {
        document.querySelectorAll('[data-stat="active-shipments"]').forEach(el => {
            el.textContent = dashboardData.activeShipments;
        });

        document.querySelectorAll('[data-stat="delivered-today"]').forEach(el => {
            el.textContent = dashboardData.deliveredToday;
        });

        document.querySelectorAll('[data-stat="pending-orders"]').forEach(el => {
            el.textContent = dashboardData.pendingOrders;
        });

        document.querySelectorAll('[data-stat="revenue"]').forEach(el => {
            el.textContent = '$' + dashboardData.revenue.toLocaleString();
        });

        // Fleet stats
        document.querySelectorAll('[data-stat="fleet-total"]').forEach(el => {
            el.textContent = dashboardData.fleet.total;
        });

        document.querySelectorAll('[data-stat="fleet-active"]').forEach(el => {
            el.textContent = dashboardData.fleet.active;
        });

        document.querySelectorAll('[data-stat="fleet-maintenance"]').forEach(el => {
            el.textContent = dashboardData.fleet.maintenance;
        });

        document.querySelectorAll('[data-stat="fleet-available"]').forEach(el => {
            el.textContent = dashboardData.fleet.available;
        });
    }

    // Initialize dashboard
    document.addEventListener('DOMContentLoaded', function() {
        updateDashboardStats();

        // Simulate real-time updates
        setInterval(() => {
            const randomChange = Math.floor(Math.random() * 3) - 1; // -1, 0, or 1
            const newDelivered = Math.max(0, dashboardData.deliveredToday + randomChange);

            if (newDelivered !== dashboardData.deliveredToday) {
                dashboardData.deliveredToday = newDelivered;
                updateDashboardStats();

                // Show notification
                showNotification(`New delivery completed! Total today: ${newDelivered}`, 'success');
            }
        }, 10000); // Update every 10 seconds
    });

    // Notification system
    function showNotification(message, type = 'info') {
        const colors = {
            success: 'bg-green-500',
            warning: 'bg-yellow-500',
            danger: 'bg-red-500',
            info: 'bg-blue-500'
        };

        const notification = document.createElement('div');
        notification.className =
            `fixed bottom-4 right-4 text-white px-4 py-2 rounded-md shadow-lg notification ${colors[type]}`;
        notification.textContent = message;
        document.body.appendChild(notification);

        // Remove after 3 seconds
        setTimeout(() => {
            notification.style.opacity = '0';
            notification.style.transition = 'opacity 0.3s ease';
            setTimeout(() => {
                notification.remove();
            }, 300);
        }, 3000);
    }

    // Sample notification button for demo
    document.addEventListener('DOMContentLoaded', function() {
        // Add this button somewhere in your HTML for testing:
        // <button id="test-notification" class="hidden">Test Notification</button>
        const testBtn = document.getElementById('test-notification');
        if (testBtn) {
            testBtn.addEventListener('click', () => {
                showNotification('This is a test notification!', 'success');
            });
        }
    });
</script>
</body>

</html>
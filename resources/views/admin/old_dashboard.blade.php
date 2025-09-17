<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipping Tracker Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-50">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64 border-r bg-white">
                <div class="flex items-center justify-between h-16 px-4 border-b">
                    <div class="flex items-center">
                        <i class="fas fa-truck mr-2 text-blue-500"></i>
                        <span class="text-xl font-semibold">CargoMax</span>
                    </div>
                </div>
                <div class="flex flex-col flex-grow overflow-y-auto">
                    <nav class="flex-1 px-2 py-4 space-y-1">
                        <div class="space-y-2">
                            <p class="px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Dashboard</p>
                            <a href="#"
                                class="flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-50 rounded-md text-blue-600">
                                <i class="fas fa-tachometer-alt mr-3"></i>
                                Overview
                            </a>
                            <a href="#"
                                class="flex items-center px-4 py-2 text-sm font-medium text-gray-600 rounded-md hover:bg-gray-100">
                                <i class="fas fa-map mr-3"></i>
                                Live Shipment Map
                            </a>
                        </div>

                        <div class="space-y-2 mt-6">
                            <p class="px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Shipments</p>
                            <a href="#"
                                class="flex items-center px-4 py-2 text-sm font-medium text-gray-600 rounded-md hover:bg-gray-100">
                                <i class="fas fa-truck mr-3"></i>
                                All Shipments
                            </a>
                            <a href="#"
                                class="flex items-center px-4 py-2 text-sm font-medium text-gray-600 rounded-md hover:bg-gray-100">
                                <i class="fas fa-search-location mr-3"></i>
                                Track Shipment
                            </a>
                            <a href="#"
                                class="flex items-center px-4 py-2 text-sm font-medium text-gray-600 rounded-md hover:bg-gray-100">
                                <i class="fas fa-plus-square mr-3"></i>
                                Create Shipment
                            </a>
                        </div>

                        <!-- More menu items would go here -->
                    </nav>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="flex-1 overflow-auto">
            <!-- Top navigation -->
            <header class="sticky top-0 z-10 bg-white border-b">
                <div class="flex items-center justify-between h-16 px-4">
                    <div class="flex items-center">
                        <button class="md:hidden p-2 rounded-md text-gray-500 hover:bg-gray-100">
                            <i class="fas fa-bars"></i>
                        </button>
                        <div class="relative ml-4 hidden sm:block">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                            <input type="text" class="block w-full py-2 pl-10 pr-3 border rounded-md bg-gray-50"
                                placeholder="Search...">
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button class="p-2 text-gray-500 rounded-full hover:bg-gray-100">
                            <i class="fas fa-bell"></i>
                            <span class="absolute top-1 right-1 h-2 w-2 rounded-full bg-red-500"></span>
                        </button>
                        <div class="relative">
                            <button class="flex items-center space-x-2">
                                <img class="w-8 h-8 rounded-full" src="https://randomuser.me/api/portraits/men/1.jpg"
                                    alt="User">
                                <span class="hidden md:block">Admin</span>
                            </button>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Dashboard content -->
            <main class="p-4 md:p-6">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h1 class="text-2xl font-bold">Dashboard Overview</h1>
                        <p class="text-gray-500">Welcome back! Here's what's happening with your logistics operations.
                        </p>
                    </div>
                    <div class="flex space-x-2">
                        <button class="flex items-center px-3 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            <i class="fas fa-plus mr-2"></i> Add Vehicle
                        </button>
                        <button class="flex items-center px-3 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            <i class="fas fa-plus mr-2"></i> New Shipment
                        </button>
                    </div>
                </div>

                <!-- Stats cards -->
                <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4 mb-6">
                    <div class="bg-white p-4 rounded-lg border shadow-sm">
                        <div class="flex justify-between">
                            <h3 class="text-sm font-medium text-gray-500">Active Shipments</h3>
                            <div class="p-2 rounded-full bg-green-50 text-green-600">
                                <i class="fas fa-truck"></i>
                            </div>
                        </div>
                        <div class="mt-4 flex justify-between items-end">
                            <div class="text-2xl font-bold">42</div>
                            <div class="flex items-center">
                                <span class="text-xs bg-green-100 text-green-800 px-2 py-0.5 rounded-full">+12%</span>
                                <i class="fas fa-arrow-up text-green-500 ml-1"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-4 rounded-lg border shadow-sm">
                        <div class="flex justify-between">
                            <h3 class="text-sm font-medium text-gray-500">Delivered Today</h3>
                            <div class="p-2 rounded-full bg-green-50 text-green-600">
                                <i class="fas fa-box"></i>
                            </div>
                        </div>
                        <div class="mt-4 flex justify-between items-end">
                            <div class="text-2xl font-bold">28</div>
                            <div class="flex items-center">
                                <span class="text-xs bg-green-100 text-green-800 px-2 py-0.5 rounded-full">+8%</span>
                                <i class="fas fa-arrow-up text-green-500 ml-1"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-4 rounded-lg border shadow-sm">
                        <div class="flex justify-between">
                            <h3 class="text-sm font-medium text-gray-500">Pending Orders</h3>
                            <div class="p-2 rounded-full bg-red-50 text-red-600">
                                <i class="fas fa-clock"></i>
                            </div>
                        </div>
                        <div class="mt-4 flex justify-between items-end">
                            <div class="text-2xl font-bold">156</div>
                            <div class="flex items-center">
                                <span class="text-xs bg-red-100 text-red-800 px-2 py-0.5 rounded-full">-5%</span>
                                <i class="fas fa-arrow-down text-red-500 ml-1"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-4 rounded-lg border shadow-sm">
                        <div class="flex justify-between">
                            <h3 class="text-sm font-medium text-gray-500">Revenue (MTD)</h3>
                            <div class="p-2 rounded-full bg-green-50 text-green-600">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                        </div>
                        <div class="mt-4 flex justify-between items-end">
                            <div class="text-2xl font-bold">$284,590</div>
                            <div class="flex items-center">
                                <span class="text-xs bg-green-100 text-green-800 px-2 py-0.5 rounded-full">+15%</span>
                                <i class="fas fa-arrow-up text-green-500 ml-1"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts and tables -->
                <div class="grid gap-6 md:grid-cols-2">
                    <div class="bg-white p-4 rounded-lg border shadow-sm">
                        <h3 class="text-lg font-semibold mb-4">Shipment Trends</h3>
                        <div class="h-64 bg-gray-100 rounded flex items-center justify-center">
                            <p class="text-gray-500">Chart would go here</p>
                        </div>
                    </div>

                    <div class="bg-white p-4 rounded-lg border shadow-sm">
                        <h3 class="text-lg font-semibold flex items-center">
                            <i class="fas fa-truck mr-2"></i> Fleet Status Overview
                        </h3>
                        <div class="mt-4 space-y-6">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="text-center">
                                    <div class="text-2xl font-bold">45</div>
                                    <div class="text-sm text-gray-500">Total Vehicles</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-green-600">87%</div>
                                    <div class="text-sm text-gray-500">Efficiency</div>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
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
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-green-500 h-2 rounded-full" style="width: 71%"></div>
                                </div>

                                <div class="flex items-center justify-between">
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
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-yellow-500 h-2 rounded-full" style="width: 18%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent activity -->
                <div class="mt-6 bg-white p-4 rounded-lg border shadow-sm">
                    <h3 class="text-lg font-semibold flex items-center">
                        <i class="fas fa-history mr-2"></i> Recent Activity
                    </h3>
                    <div class="mt-4 space-y-4">
                        <div class="flex items-start space-x-3 p-3 rounded-lg hover:bg-gray-50">
                            <div class="p-2 rounded-full bg-blue-100 text-blue-600">
                                <i class="fas fa-truck"></i>
                            </div>
                            <div class="flex-1">
                                <div class="flex flex-wrap justify-between">
                                    <p class="text-sm font-medium">New shipment created</p>
                                    <span class="text-xs text-gray-500">2 minutes ago</span>
                                </div>
                                <p class="text-sm text-gray-500 mt-1">Shipment #SH-2024-001 from New York to Los Angeles
                                </p>
                                <div class="flex items-center mt-2 space-x-2">
                                    <img class="w-6 h-6 rounded-full"
                                        src="https://randomuser.me/api/portraits/men/1.jpg" alt="User">
                                    <span class="text-xs text-gray-500">John Doe</span>
                                </div>
                            </div>
                        </div>
                        <!-- More activity items would go here -->
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        // Mobile menu toggle
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.querySelector('.md\\:hidden');
            const sidebar = document.querySelector('.hidden.md\\:flex');

            mobileMenuButton.addEventListener('click', function() {
                sidebar.classList.toggle('hidden');
            });

            // Sample data for charts (you would replace with real chart library)
            console.log('Dashboard loaded');
        });
    </script>
</body>

</html>
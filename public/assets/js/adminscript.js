// Toggle sidebar collapse/expand
document
    .getElementById("toggle-sidebar")
    .addEventListener("click", function () {
        const sidebar = document.getElementById("sidebar");
        sidebar.classList.toggle("collapsed");

        const icon = this.querySelector("i");
        if (sidebar.classList.contains("collapsed")) {
            icon.classList.replace("fa-chevron-left", "fa-chevron-right");
        } else {
            icon.classList.replace("fa-chevron-right", "fa-chevron-left");
        }
    });

// Toggle mobile menu
document
    .getElementById("mobile-menu-button")
    .addEventListener("click", function () {
        document.getElementById("sidebar").classList.toggle("open");
    });

// Close mobile menu when clicking outside
document.addEventListener("click", function (event) {
    const sidebar = document.getElementById("sidebar");
    const mobileMenuButton = document.getElementById("mobile-menu-button");

    if (
        window.innerWidth < 768 &&
        !sidebar.contains(event.target) &&
        event.target !== mobileMenuButton &&
        !mobileMenuButton.contains(event.target)
    ) {
        sidebar.classList.remove("open");
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
        available: 5,
    },
};

// Update dashboard stats
function updateDashboardStats() {
    document
        .querySelectorAll('[data-stat="active-shipments"]')
        .forEach((el) => {
            el.textContent = dashboardData.activeShipments;
        });

    document.querySelectorAll('[data-stat="delivered-today"]').forEach((el) => {
        el.textContent = dashboardData.deliveredToday;
    });

    document.querySelectorAll('[data-stat="pending-orders"]').forEach((el) => {
        el.textContent = dashboardData.pendingOrders;
    });

    document.querySelectorAll('[data-stat="revenue"]').forEach((el) => {
        el.textContent = "$" + dashboardData.revenue.toLocaleString();
    });

    // Fleet stats
    document.querySelectorAll('[data-stat="fleet-total"]').forEach((el) => {
        el.textContent = dashboardData.fleet.total;
    });

    document.querySelectorAll('[data-stat="fleet-active"]').forEach((el) => {
        el.textContent = dashboardData.fleet.active;
    });

    document
        .querySelectorAll('[data-stat="fleet-maintenance"]')
        .forEach((el) => {
            el.textContent = dashboardData.fleet.maintenance;
        });

    document.querySelectorAll('[data-stat="fleet-available"]').forEach((el) => {
        el.textContent = dashboardData.fleet.available;
    });
}

// Initialize dashboard
document.addEventListener("DOMContentLoaded", function () {
    updateDashboardStats();

    // Simulate real-time updates
    setInterval(() => {
        const randomChange = Math.floor(Math.random() * 3) - 1; // -1, 0, or 1
        const newDelivered = Math.max(
            0,
            dashboardData.deliveredToday + randomChange
        );

        if (newDelivered !== dashboardData.deliveredToday) {
            dashboardData.deliveredToday = newDelivered;
            updateDashboardStats();

            // Show notification
            showNotification(
                `New delivery completed! Total today: ${newDelivered}`,
                "success"
            );
        }
    }, 10000); // Update every 10 seconds
});

// Notification system
function showNotification(message, type = "info") {
    const colors = {
        success: "bg-success",
        warning: "bg-warning",
        danger: "bg-danger",
        info: "bg-info",
    };

    const notification = document.createElement("div");
    notification.className = `fixed bottom-4 end-4 text-white px-4 py-2 rounded shadow-lg notification ${colors[type]}`;
    notification.textContent = message;
    document.body.appendChild(notification);

    // Remove after 3 seconds
    setTimeout(() => {
        notification.style.opacity = "0";
        notification.style.transition = "opacity 0.3s ease";
        setTimeout(() => {
            notification.remove();
        }, 300);
    }, 3000);
}

// Sample notification button for demo
document.addEventListener("DOMContentLoaded", function () {
    // Add this button somewhere in your HTML for testing:
    // <button id="test-notification" class="d-none">Test Notification</button>
    const testBtn = document.getElementById("test-notification");
    if (testBtn) {
        testBtn.addEventListener("click", () => {
            showNotification("This is a test notification!", "success");
        });
    }
});

//
// Toggle sidebar on mobile
document.getElementById("sidebarToggle").addEventListener("click", function () {
    document.getElementById("sidebar").classList.add("show");
});

document.getElementById("sidebarClose").addEventListener("click", function () {
    document.getElementById("sidebar").classList.remove("show");
});

// Aiport selection
document.getElementById("statusSelect").addEventListener("change", function () {
    const airportFields = document.querySelectorAll(".airport-fields");
    if (this.value === "airport") {
        airportFields.forEach((field) => field.classList.remove("d-none"));
        airportFields.forEach((field) =>
            field.querySelector("input").setAttribute("required", "true")
        );
    } else {
        airportFields.forEach((field) => field.classList.add("d-none"));
        airportFields.forEach((field) =>
            field.querySelector("input").removeAttribute("required")
        );
    }
});

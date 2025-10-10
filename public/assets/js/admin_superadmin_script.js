// Toggle sidebar collapse/expand
document
    .getElementById("toggle-sidebar")
    .addEventListener("click", function () {
        const sidebar = document.getElementById("sidebar");
        const mainContent = document.getElementById("main-content");
        sidebar.classList.toggle("collapsed");
        mainContent.classList.toggle("expanded");

        const icon = this.querySelector("i");
        if (sidebar.classList.contains("collapsed")) {
            icon.classList.remove("fa-chevron-left");
            icon.classList.add("fa-chevron-right");
        } else {
            icon.classList.remove("fa-chevron-right");
            icon.classList.add("fa-chevron-left");
        }
    });

// Mobile menu functionality
document
    .getElementById("mobile-menu-button")
    .addEventListener("click", function () {
        const sidebar = document.getElementById("sidebar");
        sidebar.classList.toggle("mobile-open");
    });

// Close mobile menu when clicking on a menu item
document.querySelectorAll(".sidebar-item").forEach((item) => {
    item.addEventListener("click", function () {
        if (window.innerWidth < 992) {
            const sidebar = document.getElementById("sidebar");
            sidebar.classList.remove("mobile-open");
        }
    });
});

// Handle notification badge update
const notificationDropdown = document.getElementById("notificationDropdown");
const notificationBadge = notificationDropdown.querySelector(
    ".notification-badge"
);

notificationDropdown.addEventListener("show.bs.dropdown", function () {
    // Simulate marking notifications as read
    setTimeout(() => {
        notificationBadge.textContent = "0";
        notificationBadge.style.background = "#6b7280";
    }, 500);
});

// Close sidebar when clicking outside on mobile
document.addEventListener("click", function (event) {
    const sidebar = document.getElementById("sidebar");
    const mobileMenuBtn = document.getElementById("mobile-menu-button");

    if (
        window.innerWidth < 992 &&
        !sidebar.contains(event.target) &&
        !mobileMenuBtn.contains(event.target) &&
        sidebar.classList.contains("mobile-open")
    ) {
        sidebar.classList.remove("mobile-open");
    }
});

// PROFILE

// Show success message if present (simulating Laravel session flash)
document.addEventListener("DOMContentLoaded", function () {
    // Simulate a success message for demonstration
    const successAlert = document.getElementById("successAlert");
    const successMessage = "Profile updated successfully!";

    if (successMessage) {
        document.getElementById("successMessage").textContent = successMessage;
        successAlert.style.display = "flex";

        // Hide after 5 seconds
        setTimeout(() => {
            successAlert.style.display = "none";
        }, 5000);
    }

    // Edit Profile Button
    document
        .getElementById("editProfileBtn")
        .addEventListener("click", function () {
            const editModal = new bootstrap.Modal(
                document.getElementById("editProfileModal")
            );
            editModal.show();
        });

    // Edit Profile Form Submission
    document
        .getElementById("editProfileForm")
        .addEventListener("submit", function (e) {
            e.preventDefault();

            // Get form values
            const name = document.getElementById("editName").value;
            const email = document.getElementById("editEmail").value;
            const avatar = document.getElementById("editAvatar").value;

            // Update profile information
            document.getElementById("profileName").textContent = name;
            document.getElementById("infoName").textContent = name;
            document.getElementById("infoEmail").textContent = email;
            document.getElementById("profileAvatar").textContent = avatar;

            // Show success message
            document.getElementById("successMessage").textContent =
                "Profile updated successfully!";
            successAlert.style.display = "flex";

            // Hide modal
            const editModal = bootstrap.Modal.getInstance(
                document.getElementById("editProfileModal")
            );
            editModal.hide();

            // Hide success message after 5 seconds
            setTimeout(() => {
                successAlert.style.display = "none";
            }, 5000);
        });

    // Delete Account Form Submission
    document
        .getElementById("deleteAccountForm")
        .addEventListener("submit", function (e) {
            e.preventDefault();

            const password = document.getElementById("password").value;
            const passwordError = document.getElementById("passwordError");

            // Simple validation (in a real app, this would be server-side)
            if (password.length < 6) {
                passwordError.textContent =
                    "Password must be at least 6 characters";
                document.getElementById("password").classList.add("is-invalid");
                return;
            }

            // Simulate account deletion (in a real app, this would be an API call)
            alert(
                "Account deletion request sent. In a real application, this would delete the account."
            );

            // Hide modal
            const deleteModal = bootstrap.Modal.getInstance(
                document.getElementById("deleteModal")
            );
            deleteModal.hide();

            // Reset form
            document.getElementById("deleteAccountForm").reset();
            document.getElementById("password").classList.remove("is-invalid");
        });

    // Clear validation on input
    document.getElementById("password").addEventListener("input", function () {
        this.classList.remove("is-invalid");
    });
});

// SHIPMENT LIST
// Search functionality
document.querySelector(".search-input").addEventListener("input", function () {
    const searchTerm = this.value.toLowerCase();
    const rows = document.querySelectorAll(".shipments-table tbody tr");

    rows.forEach((row) => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(searchTerm) ? "" : "none";
    });
});

// Add animation to table rows
document.addEventListener("DOMContentLoaded", function () {
    const rows = document.querySelectorAll(".shipments-table tbody tr");
    rows.forEach((row, index) => {
        row.style.opacity = "0";
        row.style.transform = "translateX(-20px)";

        setTimeout(() => {
            row.style.transition = "all 0.5s ease";
            row.style.opacity = "1";
            row.style.transform = "translateX(0)";
        }, index * 100);
    });
});

// Status filter functionality (simplified for demo)
document.querySelector(".filter-btn").addEventListener("click", function () {
    alert(
        "Filter functionality would be implemented here. In a real application, this would filter the shipments by status."
    );
});

// SHIPMENT DETAILS
// Animation for timeline items
document.addEventListener("DOMContentLoaded", function () {
    const timelineItems = document.querySelectorAll(".timeline-item");

    timelineItems.forEach((item, index) => {
        item.style.opacity = "0";
        item.style.transform = "translateX(-20px)";

        setTimeout(() => {
            item.style.transition = "all 0.5s ease";
            item.style.opacity = "1";
            item.style.transform = "translateX(0)";
        }, index * 200);
    });

    // Add animation to info items
    const infoItems = document.querySelectorAll(".info-item");

    infoItems.forEach((item, index) => {
        item.style.opacity = "0";
        item.style.transform = "translateY(10px)";

        setTimeout(() => {
            item.style.transition = "all 0.4s ease";
            item.style.opacity = "1";
            item.style.transform = "translateY(0)";
        }, index * 100);
    });
});

// EDIT SHIPMENT
// Animation for form elements
document.addEventListener("DOMContentLoaded", function () {
    const formGroups = document.querySelectorAll(".form-group");

    formGroups.forEach((group, index) => {
        group.style.animationDelay = `${index * 0.05}s`;
    });

    // Add real-time validation
    const inputs = document.querySelectorAll("input, select, textarea");

    inputs.forEach((input) => {
        input.addEventListener("blur", function () {
            if (this.value.trim() === "" && this.hasAttribute("required")) {
                this.classList.add("is-invalid");
            } else {
                this.classList.remove("is-invalid");
            }
        });
    });

    // Form submission animation
    const form = document.getElementById("packageForm");
    form.addEventListener("submit", function (e) {
        const submitBtn = this.querySelector('button[type="submit"]');
        submitBtn.innerHTML =
            '<i class="fas fa-spinner fa-spin"></i> Updating...';
        submitBtn.disabled = true;
    });
});

// Input formatting for dimensions
document
    .getElementById("packageDimensions")
    .addEventListener("input", function (e) {
        this.value = this.value.replace(/[^0-9×]/g, "");
    });

// UPDATE-SHIPMENT
// Status option selection
document.querySelectorAll(".status-option").forEach((option) => {
    option.addEventListener("click", function () {
        // Remove selected class from all options
        document.querySelectorAll(".status-option").forEach((opt) => {
            opt.classList.remove("selected");
        });

        // Add selected class to clicked option
        this.classList.add("selected");

        // Check the radio input
        this.querySelector("input").checked = true;
    });
});

// Form submission handling
document.getElementById("updateForm").addEventListener("submit", function (e) {
    const submitBtn = this.querySelector('button[type="submit"]');
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Saving...';
    submitBtn.disabled = true;
});

// Auto-select status based on current shipment status if needed
document.addEventListener("DOMContentLoaded", function () {
    // You can add logic here to pre-select the current status
    // For example, if you have the current status in a variable:
    // const currentStatus = "{{ $shipment->status }}";
    // document.querySelector(`input[value="${currentStatus}"]`).parentElement.classList.add('selected');
});

// Animation for timeline items
const timelineItems = document.querySelectorAll(".timeline-item");
timelineItems.forEach((item, index) => {
    item.style.animationDelay = `${index * 0.1}s`;
});

// Create package

// Package type selection
document.querySelectorAll(".package-type-option").forEach((option) => {
    option.addEventListener("click", function () {
        // Remove selected class from all options
        document.querySelectorAll(".package-type-option").forEach((opt) => {
            opt.classList.remove("selected");
        });

        // Add selected class to clicked option
        this.classList.add("selected");

        // Check the radio input
        this.querySelector("input").checked = true;
    });
});

// Service type selection
document.querySelectorAll(".service-option").forEach((option) => {
    option.addEventListener("click", function () {
        // Remove selected class from all options
        document.querySelectorAll(".service-option").forEach((opt) => {
            opt.classList.remove("selected");
        });

        // Add selected class to clicked option
        this.classList.add("selected");

        // Check the radio input
        this.querySelector("input").checked = true;
    });
});

// Initialize selected options
document.addEventListener("DOMContentLoaded", function () {
    // Package type
    document
        .querySelectorAll(".package-type-option input:checked")
        .forEach((input) => {
            input.parentElement.classList.add("selected");
        });

    // Service type
    document
        .querySelectorAll(".service-option input:checked")
        .forEach((input) => {
            input.parentElement.classList.add("selected");
        });

    // Generate tracking number
    function generateTrackingNumber() {
        const timestamp = new Date().getTime();
        const random = Math.floor(Math.random() * 1000)
            .toString()
            .padStart(3, "0");
        return `PR-${timestamp}${random}`;
    }

    // Set tracking number in header
    const trackingElement = document.querySelector(".tracking-number");
    if (trackingElement) {
        trackingElement.textContent = generateTrackingNumber();
    }
});

// Form submission handling
document.getElementById("packageForm").addEventListener("submit", function (e) {
    const submitBtn = this.querySelector('button[type="submit"]');
    submitBtn.innerHTML =
        '<i class="fas fa-spinner fa-spin"></i> Registering...';
    submitBtn.disabled = true;
});

// Animation for form elements
document.addEventListener("DOMContentLoaded", function () {
    const formGroups = document.querySelectorAll(".form-group");

    formGroups.forEach((group, index) => {
        group.style.animationDelay = `${index * 0.05}s`;
    });
});

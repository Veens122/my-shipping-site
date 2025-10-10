// Password visibility toggle
const togglePassword = document.getElementById("togglePassword");
const passwordInput = document.getElementById("password");

togglePassword.addEventListener("click", function () {
    const type =
        passwordInput.getAttribute("type") === "password" ? "text" : "password";
    passwordInput.setAttribute("type", type);
    this.innerHTML =
        type === "password"
            ? '<i class="fas fa-eye"></i>'
            : '<i class="fas fa-eye-slash"></i>';
});

// Form submission handling
document.getElementById("loginForm").addEventListener("submit", function (e) {
    const loginBtn = document.getElementById("loginBtn");
    loginBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Signing In...';
    loginBtn.disabled = true;

    // Simulate loading delay for demo
    setTimeout(() => {
        loginBtn.innerHTML =
            '<i class="fas fa-sign-in-alt"></i> Sign In to Dashboard';
        loginBtn.disabled = false;
    }, 2000);
});

// Animation for form elements
document.addEventListener("DOMContentLoaded", function () {
    const formGroups = document.querySelectorAll(".form-group");

    formGroups.forEach((group, index) => {
        group.style.animationDelay = `${index * 0.15}s`;
    });

    // Add focus effects
    const inputs = document.querySelectorAll(".form-control");
    inputs.forEach((input) => {
        input.addEventListener("focus", function () {
            this.parentElement.classList.add("focused");
        });

        input.addEventListener("blur", function () {
            this.parentElement.classList.remove("focused");
        });
    });

    // Auto-focus email field
    document.getElementById("email").focus();
});

// Add ripple effect to login button
document.getElementById("loginBtn").addEventListener("click", function (e) {
    const btn = this;
    const ripple = document.createElement("span");
    const rect = btn.getBoundingClientRect();
    const size = Math.max(rect.width, rect.height);
    const x = e.clientX - rect.left - size / 2;
    const y = e.clientY - rect.top - size / 2;

    ripple.style.width = ripple.style.height = size + "px";
    ripple.style.left = x + "px";
    ripple.style.top = y + "px";
    ripple.classList.add("ripple-effect");

    btn.appendChild(ripple);

    setTimeout(() => {
        ripple.remove();
    }, 600);
});

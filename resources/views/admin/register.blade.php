@extends('layouts.app')
@section('content')


<style>
    :root {
        --primary: #5b6bf0;
        --primary-dark: #4a57d8;
        --primary-light: #eef0ff;
        --secondary: #8b5cf6;
        --accent: #10b981;
        --text-dark: #1e293b;
        --text-light: #64748b;
        --bg-light: #f8fafc;
        --bg-white: #ffffff;
        --border-light: #e2e8f0;
        --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        --radius: 12px;
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .general {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .registration-container {
        width: 100%;
        max-width: 450px;
    }

    /* Card Styles */
    .registration-card {
        background: var(--bg-white);
        border-radius: var(--radius);
        box-shadow: var(--shadow-lg);
        overflow: hidden;
        transition: var(--transition);
        position: relative;
    }

    .registration-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    .card-pattern {
        height: 120px;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        position: relative;
        overflow: hidden;
    }

    .card-pattern::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Ccircle cx='30' cy='30' r='2'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }

    .card-header {
        position: absolute;
        top: 30px;
        left: 0;
        right: 0;
        text-align: center;
        z-index: 2;
    }

    .reg-logo {
        width: 70px;
        height: 70px;
        background: white;
        border-radius: 50%;
        margin: 0 auto 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: var(--shadow);
    }

    .reg-logo i {
        font-size: 1.8rem;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .card-title {
        color: white;
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .card-subtitle {
        color: rgba(255, 255, 255, 0.8);
        font-size: 0.95rem;
    }

    .card-body {
        padding: 80px 40px 40px;
    }

    /* Form Styles */
    .form-group {
        margin-bottom: 25px;
        position: relative;
    }

    .form-label {
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .form-label i {
        color: var(--primary);
        width: 16px;
    }

    .form-control {
        padding: 14px 16px;
        border: 2px solid var(--border-light);
        border-radius: 10px;
        font-size: 0.95rem;
        transition: var(--transition);
        background: var(--bg-white);
        width: 100%;
    }

    .form-control:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(91, 107, 240, 0.1);
        outline: none;
    }

    .input-icon {
        position: absolute;
        right: 16px;
        top: 42px;
        color: var(--text-light);
        transition: var(--transition);
    }

    .form-control:focus+.input-icon {
        color: var(--primary);
    }

    .password-toggle {
        position: absolute;
        right: 16px;
        top: 42px;
        color: var(--text-light);
        cursor: pointer;
        transition: var(--transition);
    }

    .password-toggle:hover {
        color: var(--primary);
    }

    /* Alert Styles */
    .alert {
        border: none;
        border-radius: 10px;
        padding: 15px 20px;
        margin-bottom: 25px;
    }

    .alert-danger {
        background: rgba(239, 68, 68, 0.1);
        color: #dc2626;
        border-left: 4px solid #ef4444;
    }

    .alert-danger ul {
        margin-bottom: 0;
    }

    .alert-danger li {
        margin: 5px 0;
    }

    /* Button Styles */
    .btn-primary-custom {
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        border: none;
        color: white;
        padding: 14px 20px;
        border-radius: 10px;
        font-weight: 600;
        transition: var(--transition);
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        margin: 10px 0;
    }

    .btn-primary-custom:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
        color: white;
    }

    .btn-secondary-custom {
        background: var(--bg-white);
        border: 2px solid var(--border-light);
        color: var(--text-dark);
        padding: 14px 20px;
        border-radius: 10px;
        font-weight: 600;
        transition: var(--transition);
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        text-decoration: none;
    }

    .btn-secondary-custom:hover {
        background: var(--bg-light);
        border-color: var(--primary-light);
        color: var(--text-dark);
    }

    .divider {
        display: flex;
        align-items: center;
        margin: 25px 0;
        color: var(--text-light);
    }

    .divider::before,
    .divider::after {
        content: '';
        flex: 1;
        height: 1px;
        background: var(--border-light);
    }

    .divider-text {
        padding: 0 15px;
        font-size: 0.9rem;
    }

    /* Animation */
    .registration-card {
        animation: cardEntrance 0.6s ease-out;
    }

    @keyframes cardEntrance {
        from {
            opacity: 0;
            transform: translateY(30px) scale(0.95);
        }

        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    .form-group {
        opacity: 0;
        animation: fadeInUp 0.5s ease forwards;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Password Strength Indicator */
    .password-strength {
        height: 4px;
        background: var(--border-light);
        border-radius: 2px;
        margin-top: 5px;
        overflow: hidden;
        position: relative;
    }

    .strength-bar {
        height: 100%;
        width: 0%;
        border-radius: 2px;
        transition: all 0.3s ease;
    }

    .strength-weak {
        background: #ef4444;
        width: 33%;
    }

    .strength-medium {
        background: #f59e0b;
        width: 66%;
    }

    .strength-strong {
        background: #10b981;
        width: 100%;
    }

    .strength-text {
        font-size: 0.8rem;
        margin-top: 5px;
        text-align: right;
        color: var(--text-light);
    }

    /* Responsive Design */
    @media (max-width: 576px) {
        .body {
            padding: 15px;
        }

        .registration-container {
            max-width: 100%;
        }

        .card-body {
            padding: 70px 25px 30px;
        }

        .card-title {
            font-size: 1.5rem;
        }
    }

    /* Additional Visual Elements */
    .floating-shapes {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: -1;
    }

    .shape {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
    }

    .shape-1 {
        width: 200px;
        height: 200px;
        top: -100px;
        right: -100px;
    }

    .shape-2 {
        width: 150px;
        height: 150px;
        bottom: -75px;
        left: -75px;
    }
</style>


<div class="general">
    <div class="floating-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
    </div>

    <div class="registration-container">
        <div class="registration-card">
            <div class="card-pattern">
                <div class="card-header">
                    <div class="reg-logo">
                        <i class="fas fa-truck"></i>
                    </div>
                    <h2 class="card-title">PaxRuta</h2>
                    <p class="card-subtitle">Admin Registration</p>
                </div>
            </div>

            <div class="card-body">
                {{-- Show errors --}}
                @if(session('error'))
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                </div>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <strong>Please fix the following errors:</strong>
                    <ul class="mt-2 mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('admin.register.store') }}" method="POST" id="registrationForm">
                    @csrf

                    <div class="form-group">
                        <label for="name" class="form-label">
                            <i class="fas fa-user"></i> Full Name
                        </label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control"
                            placeholder="Enter your full name" required autofocus>
                        <i class="fas fa-user input-icon"></i>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">
                            <i class="fas fa-envelope"></i> Email Address
                        </label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control"
                            placeholder="Enter your email" required>
                        <i class="fas fa-envelope input-icon"></i>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">
                            <i class="fas fa-lock"></i> Password
                        </label>
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Create a password" required>
                        <i class="fas fa-lock input-icon"></i>
                        <span class="password-toggle" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </span>
                        <div class="password-strength">
                            <div class="strength-bar" id="strengthBar"></div>
                        </div>
                        <div class="strength-text" id="strengthText">Password strength</div>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">
                            <i class="fas fa-lock"></i> Confirm Password
                        </label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control" placeholder="Confirm your password" required>
                        <i class="fas fa-lock input-icon"></i>
                        <span class="password-toggle" id="toggleConfirmPassword">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>

                    <button type="submit" class="btn-primary-custom" id="submitBtn">
                        <i class="fas fa-user-plus"></i> Create Admin Account
                    </button>

                    <div class="divider">
                        <span class="divider-text">Already have an account?</span>
                    </div>

                    <a href="{{ route('admin.login') }}" class="btn-secondary-custom">
                        <i class="fas fa-sign-in-alt"></i> Sign In to Existing Account
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Password visibility toggle
    const togglePassword = document.getElementById('togglePassword');
    const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('password_confirmation');

    togglePassword.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' :
            '<i class="fas fa-eye-slash"></i>';
    });

    toggleConfirmPassword.addEventListener('click', function() {
        const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        confirmPasswordInput.setAttribute('type', type);
        this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' :
            '<i class="fas fa-eye-slash"></i>';
    });

    // Password strength indicator
    passwordInput.addEventListener('input', function() {
        const password = this.value;
        const strengthBar = document.getElementById('strengthBar');
        const strengthText = document.getElementById('strengthText');

        let strength = 0;
        let text = 'Password strength';

        if (password.length >= 8) strength += 1;
        if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength += 1;
        if (password.match(/\d/)) strength += 1;
        if (password.match(/[^a-zA-Z\d]/)) strength += 1;

        strengthBar.className = 'strength-bar';

        if (password.length > 0) {
            if (strength <= 1) {
                strengthBar.classList.add('strength-weak');
                text = 'Weak password';
            } else if (strength <= 3) {
                strengthBar.classList.add('strength-medium');
                text = 'Medium strength';
            } else {
                strengthBar.classList.add('strength-strong');
                text = 'Strong password';
            }
        }

        strengthText.textContent = text;
    });

    // Form submission handling
    document.getElementById('registrationForm').addEventListener('submit', function(e) {
        const submitBtn = document.getElementById('submitBtn');
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Creating Account...';
        submitBtn.disabled = true;
    });

    // Animation for form elements
    document.addEventListener('DOMContentLoaded', function() {
        const formGroups = document.querySelectorAll('.form-group');

        formGroups.forEach((group, index) => {
            group.style.animationDelay = `${index * 0.1}s`;
        });

        // Add focus effects
        const inputs = document.querySelectorAll('.form-control');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });

            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('focused');
            });
        });
    });
</script>



@endsection
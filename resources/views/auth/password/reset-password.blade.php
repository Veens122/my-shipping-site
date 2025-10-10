@extends('layouts.app')
@section('content')

<div class="container d-flex justify-content-center  align-items-center">
    <div class="card p-4 shadow" style="width:400px; margin-top:120px;">
        <h4 class="text-center">Reset Password</h4>
        <p>An OTP has been sent to your email, please input it to reset your password.</p>

        @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Countdown message --}}
        <div id="countdown" class="text-danger fw-bold mb-3 text-center"></div>

        {{-- Reset Password Form --}}
        <form method="POST" action="{{ route('auth.password.update-password') }}">
            @csrf
            <input type="hidden" name="email" value="{{ $email }}">

            <div class="mb-3">
                <label>OTP</label>
                <input type="text" name="otp" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>New Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>

            <button class="btn btn-success w-100">Reset Password</button>
        </form>

        {{-- Resend OTP Button --}}
        <form method="POST" action="{{ route('password.resend-otp') }}" class="mt-3 text-center">
            @csrf
            <button type="submit" id="resendBtn" class="btn btn-info btn-link">Resend OTP</button>
        </form>
    </div>
</div>

<script>
    // expiryTimestamp is an integer (seconds) stored in session by the controller
    const expiryTimestamp = @json(session('otp_expires_at') ?? null); // seconds or null
    const countdownEl = document.getElementById('countdown');
    const resendBtn = document.getElementById('resendBtn');

    // helper to format mm:ss
    function pad(n) {
        return n < 10 ? '0' + n : n;
    }

    if (expiryTimestamp) {
        let expiryTime = expiryTimestamp * 1000;

        updateCountdown();
        const timer = setInterval(updateCountdown, 1000);

        function updateCountdown() {
            const now = Date.now();
            const distance = expiryTime - now;

            if (distance > 0) {
                const minutes = Math.floor(distance / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);
                countdownEl.textContent = "OTP expires in: " + minutes + "m " + pad(seconds) + "s";
                resendBtn.disabled = true;
            } else {
                clearInterval(timer);
                countdownEl.textContent = "OTP has expired. You can request a new one.";
                resendBtn.disabled = false;
            }
        }
    } else {
        countdownEl.textContent = "";
        resendBtn.disabled = false;
    }
</script>

@endsection
@extends('layouts.app')
@section('content')

<div class="container d-flex justify-content-center vh-100 align-items-center">
    <div class="card p-4 shadow" style="width:400px;">
        <h4 class="text-center">Forgot Password</h4>

        @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('password.sendOtp') }}">
            @csrf
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <button class="btn btn-primary w-100">Send OTP</button>
        </form>
    </div>
</div>

@endsection
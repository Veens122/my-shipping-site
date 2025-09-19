@extends('layouts.app')

@section('content')
<div class="container py-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h3 class="mb-0">Welcome to ShipFlow Admin Page</h3>
                </div>

                <div class="card-body text-center">
                    <p class="mb-4">
                        Here you can manage your application settings and configurations.
                    </p>

                    <div class="d-grid gap-3">
                        <a href="{{ route('admin.register') }}" class="btn btn-success btn-lg">
                            Create an Account
                        </a>

                        <a href="{{ route('admin.login') }}" class="btn btn-warning btn-lg">
                            Login to Your Account
                        </a>

                        <a href="" class="btn btn-secondary btn-lg">
                            Go to Homepage
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
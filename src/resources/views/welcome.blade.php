@extends('layout')

@section('content')
<div class="p-5 mb-4 bg-light rounded-3 shadow-sm mt-5">
    <div class="container-fluid py-5 text-center">
        <h1 class="display-5 fw-bold">Car Manufacturer Management System</h1>
        <p class="col-md-12 fs-4 text-muted">Welcome to the 2025 Inventory Portal. Use the navigation to manage your fleet and manufacturing partners.</p>
        
        @auth
            <a href="{{ route('manufacturers.index') }}" class="btn btn-primary btn-lg px-4">Go to Manufacturers</a>
        @else
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-4 gap-3">Login to System</a>
                <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-lg px-4">Register New User</a>
            </div>
        @endauth
    </div>
</div>
@endsection
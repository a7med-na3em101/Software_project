@extends('layouts.app')

@section('title', 'Basic Support Package')
@section('header', 'Basic Support Package')
@section('style')
<style>
    body {
        background-color: #f8f9fa;
        font-family: 'Arial', sans-serif;
    }

    .btn-outline-primary {
        border: 2px solid #007bff;
        color: #007bff;
        font-weight: bold;
        transition: all 0.3s ease;
    }

    .btn-outline-primary:hover {
        background-color: #007bff;
        color: #fff;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }
</style>
@endsection

@section('content')
<div class="container my-4">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h4 class="text-center mb-4 text-primary">Basic Support Package</h4>
            <p class="text-muted">This package provides 24/7 support with basic troubleshooting and customer service. It's perfect for smaller pharmacies or those just starting to use the pharmacy management system.</p>
            <ul class="list-unstyled">
                <li><strong>Features:</strong></li>
                <li>24/7 Customer Support</li>
                <li>Basic Troubleshooting</li>
                <li>Email and Phone Support</li>
                <li>Response Time: 12-24 Hours</li>
            </ul>

            <div class="text-center mt-4">
                <a href="{{ route('pharmacyStaff.support.advanced') }}" class="btn btn-outline-primary">Learn About Advanced Package</a>
            </div>

            <div class="text-center mt-4">
                <form action="{{ route('auth.client.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

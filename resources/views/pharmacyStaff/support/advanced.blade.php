@extends('layouts.app')

@section('title', 'Advanced Support Package')
@section('header', 'Advanced Support Package')
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
            <h4 class="text-center mb-4 text-primary">Advanced Support Package</h4>
            <p class="text-muted">Our Advanced Support Package includes all the features of the Basic package, plus dedicated support staff and advanced troubleshooting. It's ideal for larger pharmacies with more complex needs.</p>
            <ul class="list-unstyled">
                <li><strong>Features:</strong></li>
                <li>All Features of Basic Support</li>
                <li>Dedicated Support Staff</li>
                <li>Advanced Troubleshooting</li>
                <li>Priority Response Time</li>
                <li>Monthly System Health Check</li>
            </ul>

            <div class="text-center mt-4">
                <a href="{{ route('pharmacyStaff.support.basic') }}" class="btn btn-outline-primary">Learn About Basic Package</a>
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
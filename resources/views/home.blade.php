@extends('layouts.app')

@section('title', 'Pharmacy Home')
@section('header', 'Welcome to Pharmacy Management System')
@section('style')
<style>
    body {
        background-color: #f8f9fa;
        font-family: 'Arial', sans-serif;
    }

    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
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
            <h4 class="text-center mb-4 text-primary">Pharmacy Staff Actions</h4>
            <div class="row">
                @foreach ($staffActionss as $action)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm border-primary">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center text-primary">{{ $action['name'] }}</h5>
                            <p class="card-text text-muted">{{ $action['description'] }}</p>
                            <a href="{{ $action['route'] }}" class="btn btn-outline-primary mt-auto w-100">Go to {{ $action['name'] }}</a>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Support and Training Packages Section -->
            <h4 class="text-center mb-4 text-primary">Support and Training Packages</h4>
            <div class="row">
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm border-primary">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center text-primary">Basic Support Package</h5>
                            <p class="card-text text-muted">Get 24/7 support with basic troubleshooting and customer service.</p>
                            <a href="{{ route('pharmacyStaff.support.basic') }}" class="btn btn-outline-primary mt-auto w-100">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm border-primary">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center text-primary">Advanced Support Package</h5>
                            <p class="card-text text-muted">Includes all features of the Basic package, plus dedicated support staff and advanced troubleshooting.</p>
                            <a href="{{ route('pharmacyStaff.support.advanced') }}" class="btn btn-outline-primary mt-auto w-100">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm border-primary">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center text-primary">Training Package</h5>
                            <p class="card-text text-muted">Access to comprehensive training materials and workshops on pharmacy management and software.</p>
                            <a href="{{ route('pharmacyStaff.trainings.index') }}" class="btn btn-outline-primary mt-auto w-100">View Training</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Logout Button -->
            <div class="text-center mt-4">
                <form action="{{ route('staff.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100">Logout</button>
                </form>
            </div>


        </div>
    </div>
</div>
@endsection

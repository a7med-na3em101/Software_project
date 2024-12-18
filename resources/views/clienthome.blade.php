@extends('layouts.clop')

@section('title', 'Client Home')
@section('header', 'Welcome to Your Pharmacy')

@section('content')
<div class="container my-5">
    <div class="row">
        <!-- Sidebar Section -->
        <div class="col-md-3">
            <div class="list-group">
                <a href="{{ route('profile') }}" class="list-group-item list-group-item-action">Profile</a>
                <a href="{{ route('clientPrescription') }}" class="list-group-item list-group-item-action">Prescriptions</a>
                <a href="{{ route('editContact') }}" class="list-group-item list-group-item-action">Edit Contact Details</a>
            </div>
        </div>

        <!-- Main Content Section -->
        <div class="col-md-9">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="mb-4">Welcome, {{ Auth::user()->Fname }} {{ Auth::user()->Lname }}</h4>
                    <p>Here is your dashboard. You can view and manage your information below.</p>

                    <!-- Profile Section -->
                    <h5>Your Profile</h5>
                    <ul>
                        <li><strong>Name:</strong> {{ Auth::user()->Fname }} {{ Auth::user()->Lname }}</li>
                        <li><strong>Email:</strong> {{ Auth::user()->email }}</li>
                    </ul>

                    <!-- Prescription Section -->
                    <h5>Your Prescriptions</h5>
                    <ul>
                        @foreach ($prescriptions as $prescription)
                        <li>{{ $prescription->details }} (Issued on: {{ $prescription->created_at->format('d M Y') }})</li>
                        @endforeach
                    </ul>

                    <!-- Contact Details Section -->
                    <h5>Contact Details</h5>
                    <ul>
                        <li><strong>Phone:</strong> {{ Auth::user()->phone }}</li>
                        <li><strong>Address:</strong> {{ Auth::user()->address }}</li>
                    </ul>

                    <!-- Logout Button -->
                    <form action="{{ route('auth.client.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger mt-4">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
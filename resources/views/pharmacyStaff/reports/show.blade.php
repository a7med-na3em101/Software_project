@extends('layouts.app')

@section('title', 'Report Details')

@section('content')
    <div class="container">
        <h1>Report Details</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Report Information</h5>

                <!-- Start Date -->
                <p><strong>Start Date:</strong> {{ $report->start_date }}</p>

                <!-- End Date -->
                <p><strong>End Date:</strong> {{ $report->end_date }}</p>

                <!-- Report Type -->
                <p><strong>Report Type:</strong> {{ $report->report_type }}</p>

                <!-- Drug Names -->
                <p><strong>Drug Names:</strong> {{ $report->drug_names ?? 'N/A' }}</p>

                <!-- Other Fields -->
                <p><strong>Other Fields:</strong></p>
                <pre>{{ json_encode($report->other_fields, JSON_PRETTY_PRINT) ?? 'N/A' }}</pre>
            </div>
        </div>

        <!-- Buttons -->
        <div class="mt-3">
            <a href="{{ route('pharmacyStaff.reports.index') }}" class="btn btn-secondary">Back to List</a>
            <a href="{{ route('pharmacyStaff.reports.edit', $report->id) }}" class="btn btn-primary">Edit</a>
        </div>
    </div>
@endsection

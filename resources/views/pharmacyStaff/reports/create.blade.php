@extends('layouts.app')

@section('title', 'Create Report')

@section('content')
    <div class="container">
        <h1>Create New Report</h1>

        <form action="{{ route('pharmacyStaff.reports.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" class="form-control" id="start_date" name="start_date" required>
            </div>
            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" class="form-control" id="end_date" name="end_date" required>
            </div>
            <div class="form-group">
                <label for="report_type">Report Type</label>
                <input type="text" class="form-control" id="report_type" name="report_type" required>
            </div>
            <div class="form-group">
                <label for="drug_names">Drug Names</label>
                <input type="text" class="form-control" id="drug_names" name="drug_names">
            </div>
            <div class="form-group">
                <label for="other_fields">Other Fields (JSON)</label>
                <textarea class="form-control" id="other_fields" name="other_fields"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Save</button>
        </form>

    </div>
@endsection

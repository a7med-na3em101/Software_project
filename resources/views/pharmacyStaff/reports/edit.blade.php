@extends('layouts.app')

@section('title', 'Edit Report')

@section('content')
    <div class="container">
        <h1>Edit Report</h1>

        <!-- Form for Editing Report -->
        <form action="{{ route('pharmacyStaff.reports.update', $report->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Start Date -->
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" class="form-control" id="start_date" name="start_date"
                       value="{{ old('start_date', $report->start_date) }}" required>
            </div>

            <!-- End Date -->
            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" class="form-control" id="end_date" name="end_date"
                       value="{{ old('end_date', $report->end_date) }}" required>
            </div>

            <!-- Report Type -->
            <div class="form-group">
                <label for="report_type">Report Type</label>
                <input type="text" class="form-control" id="report_type" name="report_type"
                       value="{{ old('report_type', $report->report_type) }}" required>
            </div>

            <!-- Drug Names -->
            <div class="form-group">
                <label for="drug_names">Drug Names</label>
                <input type="text" class="form-control" id="drug_names" name="drug_names"
                       value="{{ old('drug_names', $report->drug_names) }}">
            </div>

            <!-- Other Fields -->
            <div class="form-group">
                <label for="other_fields">Other Fields (JSON)</label>
                <textarea class="form-control" id="other_fields" name="other_fields" rows="3">{{ old('other_fields', json_encode($report->other_fields)) }}</textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary mt-3">Update Report</button>
            <a href="{{ route('pharmacyStaff.reports.index') }}" class="btn btn-secondary mt-3">Cancel</a>
        </form>
    </div>
@endsection

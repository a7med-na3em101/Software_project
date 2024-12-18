@extends('layouts.app')

@section('title', 'Reports')

@section('content')
    <div class="container">
        <h1>Reports</h1>
        <a href="{{ route('pharmacyStaff.reports.create') }}" class="btn btn-primary mb-3">Create New Report</a>

        @if($reports->count())
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Report Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reports as $report)
                        <tr>
                            <td>{{ $report->id }}</td>
                            <td>{{ $report->start_date }}</td>
                            <td>{{ $report->end_date }}</td>
                            <td>{{ $report->report_type }}</td>
                            <td>
                                <a href="{{ route('pharmacyStaff.reports.show', $report->id) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('pharmacyStaff.reports.edit', $report->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('pharmacyStaff.reports.destroy', $report->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $reports->links() }}
        @else
            <p>No reports found.</p>
        @endif
    </div>
@endsection

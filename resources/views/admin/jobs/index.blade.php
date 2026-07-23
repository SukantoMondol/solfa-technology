@extends('layouts.admin')

@section('title', 'Job Openings')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>All Job Openings</h2>
            <a href="{{ route('admin.jobs.create') }}" class="btn btn-primary btn-sm">Add Job</a>
        </div>

        @if ($jobs->isEmpty())
            <p class="empty-state">No job openings yet.</p>
        @else
            <div class="table-wrap">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Location</th>
                            <th>Type</th>
                            <th>Deadline</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jobs as $job)
                            <tr>
                                <td>{{ $job->title }}</td>
                                <td>{{ $job->location ?? '—' }}</td>
                                <td>{{ $job->type }}</td>
                                <td>{{ optional($job->deadline)->format('M j, Y') ?? '—' }}</td>
                                <td>
                                    @if ($job->is_active)
                                        <span class="badge badge-on">Open</span>
                                    @else
                                        <span class="badge badge-off">Closed</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="table-actions">
                                        <a href="{{ route('admin.jobs.edit', $job) }}" class="btn btn-outline btn-sm">Edit</a>
                                        <form method="POST" action="{{ route('admin.jobs.destroy', $job) }}" onsubmit="return confirm('Delete this job opening?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination-wrap">{{ $jobs->links() }}</div>
        @endif
    </div>
@endsection

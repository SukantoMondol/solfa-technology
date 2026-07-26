@extends('layouts.admin')

@section('title', 'Careers')

@section('content')
    {{-- Careers navigation tabs --}}
    <div class="admin-tabs" style="margin-bottom: 24px; display: flex; gap: 20px; border-bottom: 2px solid var(--border); padding-bottom: 2px;">
        <a href="{{ route('admin.jobs.index') }}" class="tab-link active" style="font-weight: 700; font-size: 15px; color: var(--primary); text-decoration: none; border-bottom: 3px solid var(--primary); padding: 8px 12px; margin-bottom: -2px;">Job Openings</a>
        <a href="{{ route('admin.job-applications.index') }}" class="tab-link" style="font-weight: 500; font-size: 15px; color: var(--muted); text-decoration: none; padding: 8px 12px; transition: all 0.2s ease;" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='var(--muted)'">All Applications (CVs)</a>
    </div>

    <div class="card">
        <div class="card-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; flex-wrap: wrap; gap: 16px;">
            <h2 style="font-size: 18px; font-weight: 600; color: var(--text); margin: 0;">All Active & Closed Job Openings</h2>
            <a href="{{ route('admin.jobs.create') }}" class="btn btn-primary btn-sm">Post New Job</a>
        </div>

        @if ($jobs->isEmpty())
            <p class="empty-state" style="padding: 40px; text-align: center; color: var(--muted);">No job openings yet. Click the button above to post one.</p>
        @else
            <div class="table-wrap">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th style="text-align: left;">Title</th>
                            <th style="text-align: left;">Location</th>
                            <th style="text-align: left;">Type</th>
                            <th style="text-align: left;">Applications Received</th>
                            <th style="text-align: left;">Status</th>
                            <th style="text-align: left;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jobs as $job)
                            <tr>
                                <td style="font-weight: 700; color: var(--text); text-align: left;">{{ $job->title }}</td>
                                <td style="color: var(--text); text-align: left;">{{ $job->location ?? '—' }}</td>
                                <td style="text-align: left;">
                                    <span class="badge badge-new" style="font-weight: 600; padding: 4px 10px; font-size: 13px;">
                                        {{ $job->type }}
                                    </span>
                                </td>
                                <td style="text-align: left;">
                                    <a href="{{ route('admin.job-applications.index', ['job_title' => $job->title]) }}" style="text-decoration: none; display: inline-block;">
                                        @if ($job->applications_count > 0)
                                            <span class="badge" style="background: rgba(123, 63, 152, 0.1); color: var(--primary); border: 1px solid rgba(123, 63, 152, 0.2); padding: 6px 14px; border-radius: 20px; font-weight: 700; font-size: 13px; transition: all 0.2s ease;" onmouseover="this.style.background='var(--primary)'; this.style.color='#ffffff';" onmouseout="this.style.background='rgba(123, 63, 152, 0.1)'; this.style.color='var(--primary)';">
                                                {{ $job->applications_count }} candidate{{ $job->applications_count == 1 ? '' : 's' }}
                                            </span>
                                        @else
                                            <span class="badge" style="background: #f4f2f7; color: var(--muted); border: 1px solid var(--border); padding: 6px 14px; border-radius: 20px; font-weight: 600; font-size: 13px; transition: all 0.2s ease;" onmouseover="this.style.background='var(--primary)'; this.style.color='#ffffff';" onmouseout="this.style.background='#f4f2f7'; this.style.color='var(--muted)';">
                                                0 candidates
                                            </span>
                                        @endif
                                    </a>
                                </td>
                                <td style="text-align: left;">
                                    @if ($job->is_active)
                                        <span class="badge badge-on">Active</span>
                                    @else
                                        <span class="badge badge-off">Closed</span>
                                    @endif
                                </td>
                                <td style="text-align: left;">
                                    <div class="table-actions" style="display: flex; gap: 8px; justify-content: flex-start; align-items: center;">
                                        <a href="{{ route('admin.job-applications.index', ['job_title' => $job->title]) }}" class="btn btn-outline btn-sm" style="color: var(--primary); border-color: var(--border); font-size: 13px; font-weight: 600; padding: 6px 12px;">View Candidates</a>
                                        <a href="{{ route('admin.jobs.edit', $job) }}" class="btn btn-outline btn-sm" style="font-size: 13px; padding: 6px 12px;">Edit</a>
                                        <form method="POST" action="{{ route('admin.jobs.destroy', $job) }}" onsubmit="return confirm('Delete this job opening and all associated data?')" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline btn-sm" style="color: #ef4444; border-color: rgba(239, 68, 68, 0.15); font-size: 13px; padding: 6px 12px;">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination-wrap" style="margin-top: 20px;">{{ $jobs->links() }}</div>
        @endif
    </div>
@endsection

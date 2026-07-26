@extends('layouts.admin')

@section('title', 'Job Openings')

@section('content')
    {{-- Navigation tabs --}}
    <div class="admin-tabs" style="margin-bottom: 24px; display: flex; gap: 20px; border-bottom: 2px solid var(--border); padding-bottom: 2px;">
        <a href="{{ route('admin.jobs.index') }}" class="tab-link active" style="font-weight: 700; font-size: 15px; color: #7c3aed; text-decoration: none; border-bottom: 3px solid #7c3aed; padding: 8px 12px; margin-bottom: -2px;">Job Openings</a>
        <a href="{{ route('admin.job-applications.index') }}" class="tab-link" style="font-weight: 500; font-size: 15px; color: var(--muted); text-decoration: none; padding: 8px 12px; transition: all 0.2s ease;">Applications Received</a>
    </div>

    <div class="card" style="background: #ffffff; border-radius: 10px; border: 1px solid #e5e7eb; padding: 24px; box-shadow: 0 2px 10px rgba(0,0,0,0.03);">
        <div class="card-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; flex-wrap: wrap; gap: 16px;">
            <h2 style="font-size: 18px; font-weight: 700; color: #1e293b; margin: 0;">Job Openings</h2>
            <a href="{{ route('admin.jobs.create') }}" class="btn btn-primary btn-sm" style="background: #7c3aed; border-color: #7c3aed; font-weight: 600; padding: 8px 16px; border-radius: 6px; color: #ffffff;">+ Post New Job</a>
        </div>

        @if ($jobs->isEmpty())
            <p class="empty-state" style="padding: 40px; text-align: center; color: var(--muted);">No job openings available.</p>
        @else
            <div class="table-wrap" style="overflow-x: auto;">
                <table class="admin-table" style="width: 100%; border-collapse: collapse; font-size: 14px;">
                    <thead>
                        <tr style="border-bottom: 2px solid #f1f5f9; background: #fafafa;">
                            <th style="padding: 12px 14px; text-align: left; color: #475569; font-weight: 600; width: 40px;">#</th>
                            <th style="padding: 12px 14px; text-align: left; color: #475569; font-weight: 600;">Title / Location</th>
                            <th style="padding: 12px 14px; text-align: left; color: #475569; font-weight: 600; width: 130px;">Type</th>
                            <th style="padding: 12px 14px; text-align: left; color: #475569; font-weight: 600; width: 140px;">Deadline</th>
                            <th style="padding: 12px 14px; text-align: center; color: #475569; font-weight: 600; width: 130px;">Applications</th>
                            <th style="padding: 12px 14px; text-align: center; color: #475569; font-weight: 600; width: 110px;">Status</th>
                            <th style="padding: 12px 14px; text-align: center; color: #475569; font-weight: 600; width: 100px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jobs as $job)
                            <tr style="border-bottom: 1px solid #f1f5f9; transition: background 0.15s ease;" onmouseover="this.style.background='#faf5ff'" onmouseout="this.style.background='transparent'">
                                <td style="padding: 14px; color: #64748b; font-weight: 600;">{{ $loop->iteration }}</td>
                                <td style="padding: 14px;">
                                    <div style="font-weight: 700; color: #334155; font-size: 14px; margin-bottom: 2px;">{{ $job->title }}</div>
                                    <div style="color: #64748b; font-size: 12px; display: flex; align-items: center; gap: 4px;">
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2.5"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                        <span>{{ $job->location ?? 'Satarkul, Badda, Dhaka' }}</span>
                                    </div>
                                </td>
                                <td style="padding: 14px; color: #475569;">{{ $job->type }}</td>
                                <td style="padding: 14px; color: #e11d48; font-weight: 600; font-size: 13px;">
                                    {{ $job->deadline ? \Carbon\Carbon::parse($job->deadline)->format('d M Y') : '—' }}
                                </td>
                                <td style="padding: 14px; text-align: center;">
                                    <a href="{{ route('admin.job-applications.index', ['job_title' => $job->title]) }}" style="display: inline-flex; align-items: center; justify-content: center; background: #7c3aed; color: #ffffff; padding: 6px 16px; border-radius: 6px; font-weight: 700; font-size: 12px; text-decoration: none; position: relative; letter-spacing: 0.5px; transition: all 0.2s ease; box-shadow: 0 2px 5px rgba(124, 58, 237, 0.25);" onmouseover="this.style.background='#6d28d9'" onmouseout="this.style.background='#7c3aed'">
                                        VIEW
                                        @if ($job->applications_count > 0)
                                            <span style="position: absolute; top: -6px; right: -6px; background: #ef4444; color: #ffffff; border-radius: 50%; width: 18px; height: 18px; display: flex; align-items: center; justify-content: center; font-size: 10px; font-weight: 800; border: 2px solid #ffffff;">
                                                {{ $job->applications_count }}
                                            </span>
                                        @endif
                                    </a>
                                </td>
                                <td style="padding: 14px; text-align: center;">
                                    @if ($job->is_active)
                                        <span style="background: #10b981; color: #ffffff; padding: 3px 10px; border-radius: 4px; font-size: 12px; font-weight: 700; display: inline-flex; align-items: center; gap: 4px;">
                                            ✓ Active
                                        </span>
                                    @else
                                        <span style="background: #94a3b8; color: #ffffff; padding: 3px 10px; border-radius: 4px; font-size: 12px; font-weight: 700;">
                                            Closed
                                        </span>
                                    @endif
                                </td>
                                <td style="padding: 14px; text-align: center;">
                                    <div style="display: flex; gap: 6px; justify-content: center; align-items: center;">
                                        <a href="{{ route('admin.jobs.edit', $job) }}" title="Edit Job" style="background: #f59e0b; color: #ffffff; width: 32px; height: 32px; border-radius: 6px; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: transform 0.15s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"></path><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"></path></svg>
                                        </a>
                                        <form method="POST" action="{{ route('admin.jobs.destroy', $job) }}" onsubmit="return confirm('Delete this job opening and all associated data?')" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Delete Job" style="background: #ef4444; color: #ffffff; width: 32px; height: 32px; border: none; border-radius: 6px; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: transform 0.15s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                            </button>
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

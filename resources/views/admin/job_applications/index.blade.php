@extends('layouts.admin')

@section('title', 'Careers')

@section('content')
    {{-- Careers navigation tabs --}}
    <div class="admin-tabs" style="margin-bottom: 24px; display: flex; gap: 20px; border-bottom: 2px solid var(--border); padding-bottom: 2px;">
        <a href="{{ route('admin.jobs.index') }}" class="tab-link" style="font-weight: 500; font-size: 15px; color: var(--muted); text-decoration: none; padding: 8px 12px; transition: all 0.2s ease;" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='var(--muted)'">Job Openings</a>
        <a href="{{ route('admin.job-applications.index') }}" class="tab-link {{ empty($selectedJobTitle) ? 'active' : '' }}" style="font-weight: {{ empty($selectedJobTitle) ? '700' : '500' }}; font-size: 15px; color: {{ empty($selectedJobTitle) ? 'var(--primary)' : 'var(--muted)' }}; text-decoration: none; border-bottom: {{ empty($selectedJobTitle) ? '3px solid var(--primary)' : 'none' }}; padding: 8px 12px; margin-bottom: -2px; transition: all 0.2s ease;" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='{{ empty($selectedJobTitle) ? 'var(--primary)' : 'var(--muted)' }}'">All Applications (CVs)</a>
        @if(!empty($selectedJobTitle))
            <a href="#" class="tab-link active" style="font-weight: 700; font-size: 15px; color: var(--primary); text-decoration: none; border-bottom: 3px solid var(--primary); padding: 8px 12px; margin-bottom: -2px;">Filtered: {{ $selectedJobTitle }}</a>
        @endif
    </div>

    <div class="card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; flex-wrap: wrap; gap: 16px;">
            <div>
                @if (!empty($selectedJobTitle))
                    <h2 style="margin: 0; font-size: 18px; font-weight: 600; color: var(--text);">Applications for: <span style="color: var(--primary);">{{ $selectedJobTitle }}</span></h2>
                @else
                    <h2 style="margin: 0; font-size: 18px; font-weight: 600; color: var(--text);">All Received Job Applications & CVs</h2>
                @endif
            </div>
            
            <div style="display: flex; align-items: center; gap: 16px;">
                @if (!empty($selectedJobTitle))
                    <a href="{{ route('admin.jobs.index') }}" class="btn btn-outline btn-sm" style="display: inline-flex; align-items: center; gap: 6px; font-size: 13px; padding: 6px 12px;">
                        &larr; Back to Openings
                    </a>
                @endif
                <span class="badge" style="background: rgba(123, 63, 152, 0.1); color: var(--primary); border: 1px solid rgba(123, 63, 152, 0.2); padding: 8px 16px; border-radius: 999px; font-weight: 700;">
                    Total: {{ $applications->total() }} application{{ $applications->total() == 1 ? '' : 's' }}
                </span>
            </div>
        </div>

        @if ($applications->isEmpty())
            <p class="empty-state" style="padding: 40px; text-align: center; color: var(--muted);">No job applications received @if(!empty($selectedJobTitle)) for this position @endif yet.</p>
        @else
            <div class="table-wrap">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th style="width: 170px; text-align: left;">Date</th>
                            <th style="width: 180px; text-align: left;">Candidate Name</th>
                            <th style="width: 180px; text-align: left;">Applied Position</th>
                            <th style="text-align: left;">Contact Info & Cover Letter</th>
                            <th style="width: 200px; text-align: left;">CV File / Portfolio</th>
                            <th style="width: 100px; text-align: right;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($applications as $app)
                            <tr>
                                <td style="text-align: left;">
                                    <strong style="color: var(--text);">📅 {{ $app->created_at->format('d M Y') }}</strong>
                                    <div style="color: var(--muted); font-size: 13px; margin-top: 3px;">
                                        🕒 {{ $app->created_at->format('h:i A') }}
                                    </div>
                                </td>
                                <td style="text-align: left;">
                                    <strong style="color: var(--text); font-size: 15px;">{{ $app->name }}</strong>
                                </td>
                                <td style="text-align: left;">
                                    <span class="badge badge-new" style="font-weight: 600; padding: 5px 12px; font-size: 13px;">
                                        {{ $app->job_title }}
                                    </span>
                                </td>
                                <td style="text-align: left;">
                                    <div style="font-weight: 600; color: var(--text);">✉️ {{ $app->email }}</div>
                                    @if($app->phone)
                                        <div style="color: var(--muted); font-size: 13px; margin-top: 3px;">📞 {{ $app->phone }}</div>
                                    @endif
                                    
                                    @if ($app->cover_letter)
                                        <details style="margin-top: 8px; cursor: pointer;">
                                            <summary style="font-size: 13px; color: var(--primary); font-weight: 700; outline: none; user-select: none;">View Cover Letter</summary>
                                            <p style="margin-top: 6px; padding: 10px; border-radius: 8px; background: #fcfaff; border: 1px solid var(--border); font-size: 13px; color: var(--muted); line-height: 1.5; white-space: pre-wrap;">{{ $app->cover_letter }}</p>
                                        </details>
                                    @endif
                                </td>
                                <td style="text-align: left;">
                                    @if ($app->cv_path)
                                        <a href="{{ route('admin.job-applications.download', $app) }}" class="btn btn-primary btn-sm" style="display: inline-flex; align-items: center; gap: 6px; font-size: 13px; padding: 6px 12px;">
                                            📥 Download CV
                                        </a>
                                    @else
                                        <span style="color: var(--muted); font-size: 13px;">No CV uploaded</span>
                                    @endif

                                    @if ($app->portfolio_link)
                                        <div style="margin-top: 8px;">
                                            <a href="{{ $app->portfolio_link }}" target="_blank" style="color: var(--primary); font-size: 13px; font-weight: 700; text-decoration: underline;">
                                                🔗 Portfolio Link
                                            </a>
                                        </div>
                                    @endif
                                </td>
                                <td style="text-align: right;">
                                    <form method="POST" action="{{ route('admin.job-applications.destroy', $app) }}" style="display: inline-block;" onsubmit="return confirm('Delete this application permanently?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline btn-sm" style="color: #ef4444; border-color: rgba(239, 68, 68, 0.2); font-weight: 600; font-size: 13px; padding: 6px 12px;">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="pagination-wrap" style="margin-top: 20px;">
                {{ $applications->appends(request()->query())->links() }}
            </div>
        @endif
    </div>
@endsection

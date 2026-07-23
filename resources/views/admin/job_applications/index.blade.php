@extends('layouts.admin')

@section('title', 'Job Applications / CVs')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
        <h2>Received Job Applications & CVs</h2>
        <span class="badge" style="background: var(--primary); color: #fff; padding: 6px 14px; border-radius: 999px; font-weight: 700;">
            Total: {{ $applications->total() }}
        </span>
    </div>

    @if ($applications->isEmpty())
        <p class="empty-state">No job applications received yet.</p>
    @else
        <div class="table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th style="width: 170px;">Date</th>
                        <th style="width: 180px;">Candidate Name</th>
                        <th style="width: 180px;">Applied Position</th>
                        <th>Contact Info</th>
                        <th style="width: 200px;">CV File / Portfolio</th>
                        <th style="width: 100px; text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($applications as $app)
                        <tr>
                            <td>
                                <strong style="color: var(--text);">📅 {{ $app->created_at->format('d M Y') }}</strong>
                                <div style="color: var(--muted); font-size: 13px; margin-top: 3px;">
                                    🕒 {{ $app->created_at->format('h:i A') }}
                                </div>
                            </td>
                            <td>
                                <strong style="color: var(--text); font-size: 15px;">{{ $app->name }}</strong>
                            </td>
                            <td>
                                <span class="badge badge-new" style="font-weight: 700; padding: 5px 12px; font-size: 13px;">
                                    {{ $app->job_title }}
                                </span>
                            </td>
                            <td>
                                <div style="font-weight: 600; color: var(--text);">✉️ {{ $app->email }}</div>
                                @if($app->phone)
                                    <div style="color: var(--muted); font-size: 13px; margin-top: 3px;">📞 {{ $app->phone }}</div>
                                @endif
                            </td>
                            <td>
                                @if ($app->cv_path)
                                    <a href="{{ route('admin.job-applications.download', $app) }}" class="btn btn-primary btn-sm">
                                        📥 Download CV
                                    </a>
                                @else
                                    <span style="color: var(--muted); font-size: 13px;">No CV uploaded</span>
                                @endif

                                @if ($app->portfolio_link)
                                    <div style="margin-top: 6px;">
                                        <a href="{{ $app->portfolio_link }}" target="_blank" style="color: var(--primary); font-size: 13px; font-weight: 600; text-decoration: underline;">
                                            🔗 Portfolio Link
                                        </a>
                                    </div>
                                @endif
                            </td>
                            <td style="text-align: right;">
                                <form method="POST" action="{{ route('admin.job-applications.destroy', $app) }}" style="display: inline-block;" onsubmit="return confirm('Delete this application permanently?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline btn-sm" style="color: #e11d48; border-color: #fecdd3; font-weight: 600;">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="pagination-wrap">
            {{ $applications->links() }}
        </div>
    @endif
</div>
@endsection

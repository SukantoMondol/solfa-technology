@extends('layouts.admin')

@section('title', 'Booked Meetings')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
        <h2>Scheduled Meetings & Discovery Calls</h2>
        <span class="badge" style="background: var(--primary); color: #fff; padding: 6px 14px; border-radius: 999px; font-weight: 700;">
            Total: {{ $meetings->total() }}
        </span>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($meetings->isEmpty())
        <p class="empty-state">No meetings scheduled yet.</p>
    @else
        <div class="table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th style="width: 170px;">Date & Time</th>
                        <th style="width: 180px;">Client Name</th>
                        <th style="width: 250px;">Contact Information</th>
                        <th>Notes / Purpose</th>
                        <th style="width: 140px;">Status</th>
                        <th style="width: 100px; text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($meetings as $meeting)
                        <tr>
                            <td>
                                <strong style="color: var(--text);">📅 {{ $meeting->meeting_date->format('d M Y') }}</strong>
                                <div style="color: var(--primary); font-weight: 700; font-size: 13px; margin-top: 3px;">
                                    🕒 {{ $meeting->meeting_time }}
                                </div>
                            </td>
                            <td>
                                <strong style="color: var(--text); font-size: 15px;">{{ $meeting->name }}</strong>
                            </td>
                            <td>
                                <div style="font-weight: 600; color: var(--text);">✉️ {{ $meeting->email }}</div>
                                @if ($meeting->phone)
                                    <div style="color: var(--muted); font-size: 13px; margin-top: 3px;">📞 {{ $meeting->phone }}</div>
                                @endif
                            </td>
                            <td style="color: var(--muted); font-size: 14px;">
                                {{ $meeting->notes ?? 'Discovery Call' }}
                            </td>
                            <td>
                                <form method="POST" action="{{ route('admin.meetings.update-status', $meeting) }}">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" onchange="this.form.submit()" style="padding: 6px 10px; border-radius: 8px; border: 1px solid var(--border); font-weight: 700; font-size: 13px; background: {{ $meeting->status === 'confirmed' ? '#e0f2fe' : ($meeting->status === 'completed' ? '#dcfce7' : '#ffe4e6') }}; color: {{ $meeting->status === 'confirmed' ? '#0369a1' : ($meeting->status === 'completed' ? '#15803d' : '#be123c') }}; cursor: pointer; outline: none;">
                                        <option value="confirmed" {{ $meeting->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                        <option value="completed" {{ $meeting->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="cancelled" {{ $meeting->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                </form>
                            </td>
                            <td style="text-align: right;">
                                <form method="POST" action="{{ route('admin.meetings.destroy', $meeting) }}" style="display: inline-block;" onsubmit="return confirm('Delete this meeting record?')">
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
            {{ $meetings->links() }}
        </div>
    @endif
</div>
@endsection

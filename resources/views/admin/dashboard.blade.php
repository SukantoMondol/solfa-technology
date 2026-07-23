@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="stat-grid">
        @foreach ($counts as $label => $count)
            <div class="stat-card">
                <div class="stat-value">{{ $count }}</div>
                <div class="stat-label">{{ $label }}</div>
            </div>
        @endforeach
    </div>

    <div class="card">
        <div class="card-header">
            <h2>Latest Messages @if($unreadMessages > 0) <span class="badge badge-new">{{ $unreadMessages }} unread</span> @endif</h2>
            <a href="{{ route('admin.messages.index') }}" class="btn btn-outline btn-sm">View all</a>
        </div>

        @if ($latestMessages->isEmpty())
            <p class="empty-state">No messages yet.</p>
        @else
            <div class="table-wrap">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Received</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($latestMessages as $message)
                            <tr>
                                <td>{{ $message->name }}</td>
                                <td>{{ $message->email }}</td>
                                <td>{{ $message->subject ?? '—' }}</td>
                                <td>{{ $message->created_at->diffForHumans() }}</td>
                                <td>
                                    @if ($message->is_read)
                                        <span class="badge badge-off">Read</span>
                                    @else
                                        <span class="badge badge-new">New</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection

@extends('layouts.admin')

@section('title', 'Newsletter Subscribers')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>All Subscribers</h2>
        </div>

        @if ($subscribers->isEmpty())
            <p class="empty-state">No subscribers yet.</p>
        @else
            <div class="table-wrap">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Subscribed</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subscribers as $subscriber)
                            <tr>
                                <td>{{ $subscriber->email }}</td>
                                <td>{{ $subscriber->created_at->format('M j, Y') }}</td>
                                <td>
                                    <form method="POST" action="{{ route('admin.subscribers.destroy', $subscriber) }}" onsubmit="return confirm('Remove this subscriber?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination-wrap">{{ $subscribers->links() }}</div>
        @endif
    </div>
@endsection

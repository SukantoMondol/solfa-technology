@extends('layouts.admin')

@section('title', 'Contact Messages')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Inbox</h2>
        </div>

        @if ($messages->isEmpty())
            <p class="empty-state">No messages yet.</p>
        @else
            @foreach ($messages as $message)
                <div class="card" style="margin-bottom: 14px;">
                    <div class="card-header">
                        <h2>
                            {{ $message->subject ?? 'No subject' }}
                            @unless ($message->is_read)
                                <span class="badge badge-new">New</span>
                            @endunless
                        </h2>
                        <form method="POST" action="{{ route('admin.messages.destroy', $message) }}" onsubmit="return confirm('Delete this message?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                    <p class="message-meta">
                        From <strong>{{ $message->name }}</strong>
                        &lt;{{ $message->email }}&gt;
                        @if ($message->phone) &middot; {{ $message->phone }} @endif
                        &middot; {{ $message->created_at->format('M j, Y g:i A') }}
                    </p>
                    <p class="message-body">{{ $message->message }}</p>
                </div>
            @endforeach

            <div class="pagination-wrap">{{ $messages->links() }}</div>
        @endif
    </div>
@endsection

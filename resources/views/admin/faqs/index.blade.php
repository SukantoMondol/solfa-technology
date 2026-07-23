@extends('layouts.admin')

@section('title', 'FAQs')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>All FAQs</h2>
            <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary btn-sm">Add FAQ</a>
        </div>

        @if ($faqs->isEmpty())
            <p class="empty-state">No FAQs yet.</p>
        @else
            <div class="table-wrap">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Question</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($faqs as $faq)
                            <tr>
                                <td>{{ $faq->question }}</td>
                                <td>{{ $faq->sort_order }}</td>
                                <td>
                                    @if ($faq->is_active)
                                        <span class="badge badge-on">Active</span>
                                    @else
                                        <span class="badge badge-off">Hidden</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="table-actions">
                                        <a href="{{ route('admin.faqs.edit', $faq) }}" class="btn btn-outline btn-sm">Edit</a>
                                        <form method="POST" action="{{ route('admin.faqs.destroy', $faq) }}" onsubmit="return confirm('Delete this FAQ?')">
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
            <div class="pagination-wrap">{{ $faqs->links() }}</div>
        @endif
    </div>
@endsection

@extends('layouts.admin')

@section('title', 'Testimonials')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>All Testimonials</h2>
            <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary btn-sm">Add Testimonial</a>
        </div>

        @if ($testimonials->isEmpty())
            <p class="empty-state">No testimonials yet.</p>
        @else
            <div class="table-wrap">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Picture</th>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Rating</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($testimonials as $testimonial)
                            <tr>
                                <td>
                                    @if ($testimonial->avatar)
                                        <img src="{{ asset($testimonial->avatar) }}" alt="{{ $testimonial->name }}" style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
                                    @else
                                        <div style="width: 40px; height: 40px; border-radius: 50%; background: var(--primary); color: #fff; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 0.9rem;">
                                            {{ strtoupper(substr($testimonial->name, 0, 1)) }}
                                        </div>
                                    @endif
                                </td>
                                <td>{{ $testimonial->name }}</td>
                                <td>{{ $testimonial->company ?? '—' }}</td>
                                <td>{{ $testimonial->rating }}/5</td>
                                <td>
                                    @if ($testimonial->is_active)
                                        <span class="badge badge-on">Active</span>
                                    @else
                                        <span class="badge badge-off">Hidden</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="table-actions">
                                        <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn btn-outline btn-sm">Edit</a>
                                        <form method="POST" action="{{ route('admin.testimonials.destroy', $testimonial) }}" onsubmit="return confirm('Delete this testimonial?')">
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
            <div class="pagination-wrap">{{ $testimonials->links() }}</div>
        @endif
    </div>
@endsection

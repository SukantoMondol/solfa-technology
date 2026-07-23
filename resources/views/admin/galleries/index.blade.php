@extends('layouts.admin')

@section('title', 'Gallery')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>All Gallery Items</h2>
            <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary btn-sm">Add Gallery Item</a>
        </div>

        @if ($galleries->isEmpty())
            <p class="empty-state">No gallery items yet.</p>
        @else
            <div class="table-wrap">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Preview</th>
                            <th>Title</th>
                            <th>Order</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($galleries as $gallery)
                            <tr>
                                <td>
                                    <img src="{{ asset($gallery->image) }}" alt="Preview" style="width: 80px; height: 50px; object-fit: cover; border-radius: 8px; border: 1px solid var(--border);">
                                </td>
                                <td>{{ $gallery->title ?? 'Untitled' }}</td>
                                <td>{{ $gallery->sort_order }}</td>
                                <td>
                                    <div class="table-actions">
                                        <a href="{{ route('admin.galleries.edit', $gallery) }}" class="btn btn-outline btn-sm">Edit</a>
                                        <form method="POST" action="{{ route('admin.galleries.destroy', $gallery) }}" onsubmit="return confirm('Delete this gallery item?')">
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
            <div class="pagination-wrap">{{ $galleries->links() }}</div>
        @endif
    </div>
@endsection

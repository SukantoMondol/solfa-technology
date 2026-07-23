@extends('layouts.admin')

@section('title', 'Services')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>All Services</h2>
            <a href="{{ route('admin.services.create') }}" class="btn btn-primary btn-sm">Add Service</a>
        </div>

        @if ($services->isEmpty())
            <p class="empty-state">No services yet. Add your first one.</p>
        @else
            <div class="table-wrap">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $service)
                            <tr>
                                <td>{{ $service->title }}</td>
                                <td>{{ $service->slug }}</td>
                                <td>{{ $service->sort_order }}</td>
                                <td>
                                    @if ($service->is_active)
                                        <span class="badge badge-on">Active</span>
                                    @else
                                        <span class="badge badge-off">Hidden</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="table-actions">
                                        <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-outline btn-sm">Edit</a>
                                        <form method="POST" action="{{ route('admin.services.destroy', $service) }}" onsubmit="return confirm('Delete this service?')">
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
            <div class="pagination-wrap">{{ $services->links() }}</div>
        @endif
    </div>
@endsection

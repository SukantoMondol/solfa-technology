@extends('layouts.admin')

@section('title', 'Projects')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>All Projects</h2>
            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary btn-sm">Add Project</a>
        </div>

        @if ($projects->isEmpty())
            <p class="empty-state">No projects yet. Add your first one.</p>
        @else
            <div class="table-wrap">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Client</th>
                            <th>Featured</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td>
                                    <div style="display: flex; align-items: center; gap: 10px;">
                                        @if($project->image)
                                            <img src="{{ asset($project->image) }}" alt="Thumb" style="width: 44px; height: 33px; object-fit: cover; border-radius: 6px; border: 1px solid var(--border);">
                                        @else
                                            <div style="width: 44px; height: 33px; background: var(--surface-alt); border-radius: 6px; display: flex; align-items: center; justify-content: center; font-weight: bold; color: var(--primary);">{{ strtoupper(substr($project->title, 0, 1)) }}</div>
                                        @endif
                                        <span>{{ $project->title }}</span>
                                    </div>
                                </td>
                                <td>{{ $project->category ?? '—' }}</td>
                                <td>
                                    {{ $project->client ?? '—' }}
                                    @if($project->website_url)
                                        <br>
                                        <a href="{{ $project->website_url }}" target="_blank" style="font-size: 0.8rem; color: var(--primary);">Visit website &nearr;</a>
                                    @endif
                                </td>
                                <td>
                                    @if ($project->is_featured)
                                        <span class="badge badge-new">Featured</span>
                                    @else
                                        —
                                    @endif
                                </td>
                                <td>
                                    @if ($project->is_active)
                                        <span class="badge badge-on">Active</span>
                                    @else
                                        <span class="badge badge-off">Hidden</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="table-actions">
                                        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-outline btn-sm">Edit</a>
                                        <form method="POST" action="{{ route('admin.projects.destroy', $project) }}" onsubmit="return confirm('Delete this project?')">
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
            <div class="pagination-wrap">{{ $projects->links() }}</div>
        @endif
    </div>
@endsection

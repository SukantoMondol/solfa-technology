@extends('layouts.admin')

@section('title', 'Team Members')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>All Team Members</h2>
            <a href="{{ route('admin.team-members.create') }}" class="btn btn-primary btn-sm">Add Team Member</a>
        </div>

        @if ($teamMembers->isEmpty())
            <p class="empty-state">No team members yet.</p>
        @else
            <div class="table-wrap">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Order</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teamMembers as $member)
                            <tr>
                                <td>
                                    <img src="{{ asset($member->image) }}" alt="Preview" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%; border: 1px solid var(--border);">
                                </td>
                                <td><strong>{{ $member->name }}</strong></td>
                                <td>{{ $member->designation }}</td>
                                <td>{{ $member->sort_order }}</td>
                                <td>
                                    <div class="table-actions">
                                        <a href="{{ route('admin.team-members.edit', $member) }}" class="btn btn-outline btn-sm">Edit</a>
                                        <form method="POST" action="{{ route('admin.team-members.destroy', $member) }}" onsubmit="return confirm('Delete this team member?')">
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
            <div class="pagination-wrap">{{ $teamMembers->links() }}</div>
        @endif
    </div>
@endsection

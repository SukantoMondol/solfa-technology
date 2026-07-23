@extends('layouts.admin')

@section('title', 'Blog Posts')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>All Posts</h2>
            <a href="{{ route('admin.posts.create') }}" class="btn btn-primary btn-sm">Add Post</a>
        </div>

        @if ($posts->isEmpty())
            <p class="empty-state">No blog posts yet. Write your first one.</p>
        @else
            <div class="table-wrap">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Published</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->author ?? '—' }}</td>
                                <td>
                                    @if ($post->published_at)
                                        {{ $post->published_at->format('M j, Y') }}
                                    @else
                                        <span class="badge badge-off">Draft</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="table-actions">
                                        <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-outline btn-sm">Edit</a>
                                        <form method="POST" action="{{ route('admin.posts.destroy', $post) }}" onsubmit="return confirm('Delete this post?')">
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
            <div class="pagination-wrap">{{ $posts->links() }}</div>
        @endif
    </div>
@endsection

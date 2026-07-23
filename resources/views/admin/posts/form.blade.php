@extends('layouts.admin')

@section('title', $post->exists ? 'Edit Post' : 'Add Post')

@section('content')
    <div class="card">
        <form method="POST" action="{{ $post->exists ? route('admin.posts.update', $post) : route('admin.posts.store') }}">
            @csrf
            @if ($post->exists)
                @method('PUT')
            @endif

            <div class="form-grid">
                <div class="field full">
                    <label for="title">Title *</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" required>
                </div>

                <div class="field">
                    <label for="slug">Slug (leave blank to auto-generate)</label>
                    <input type="text" id="slug" name="slug" value="{{ old('slug', $post->slug) }}">
                </div>

                <div class="field">
                    <label for="author">Author</label>
                    <input type="text" id="author" name="author" value="{{ old('author', $post->author) }}">
                </div>

                <div class="field">
                    <label for="published_at">Publish date (leave blank to keep as draft)</label>
                    <input type="date" id="published_at" name="published_at" value="{{ old('published_at', optional($post->published_at)->format('Y-m-d')) }}">
                </div>

                <div class="field full">
                    <label for="excerpt">Excerpt (shown on blog listing)</label>
                    <textarea id="excerpt" name="excerpt">{{ old('excerpt', $post->excerpt) }}</textarea>
                </div>

                <div class="field full">
                    <label for="body">Body</label>
                    <textarea id="body" name="body" class="tall">{{ old('body', $post->body) }}</textarea>
                </div>
            </div>

            <div class="form-footer">
                <button type="submit" class="btn btn-primary">{{ $post->exists ? 'Save changes' : 'Create post' }}</button>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
@endsection

@extends('layouts.admin')

@section('title', $post->exists ? 'Edit Post' : 'Add Post')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    <div class="card">
        <form method="POST" action="{{ $post->exists ? route('admin.posts.update', $post) : route('admin.posts.store') }}" enctype="multipart/form-data">
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

                <div class="field">
                    <label for="image_file">Upload Featured Cover Image</label>
                    <input type="file" id="image_file" name="image_file" accept="image/*">
                    <small style="color: #6c757d; font-size: 0.78rem; display: block; margin-top: 4px;">Max size: 2MB (JPG, PNG, WEBP)</small>
                </div>

                <div class="field">
                    <label for="image">Or Cover Image Path/URL</label>
                    <input type="text" id="image" name="image" placeholder="images/blog1.jpg" value="{{ old('image', $post->image) }}">
                </div>

                @if($post->image)
                    <div class="field full">
                        <label>Current Cover Image</label>
                        <div style="margin-top: 8px;">
                            <img src="{{ asset($post->image) }}" alt="Cover Preview" style="max-height: 120px; border-radius: 8px; border: 1px solid var(--border);">
                        </div>
                    </div>
                @endif

                <div class="field full">
                    <label for="excerpt">Excerpt (short summary for blog card)</label>
                    <textarea id="excerpt" name="excerpt" style="height: 80px;">{{ old('excerpt', $post->excerpt) }}</textarea>
                </div>

                <div class="field full">
                    <label for="body">Article Content (Add Headings, Images, Videos, Links & Text) *</label>
                    <textarea id="body" name="body" class="tall" style="min-height: 380px;">{{ old('body', $post->body) }}</textarea>
                </div>
            </div>

            <div class="form-footer" style="margin-top: 24px;">
                <button type="submit" class="btn btn-primary">{{ $post->exists ? 'Save changes' : 'Create post' }}</button>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#body').summernote({
                placeholder: 'Write your full article here... You can click the Image or Video button to embed media anywhere in your article!',
                tabsize: 2,
                height: 420,
                toolbar: [
                    ['style', ['style', 'bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>
@endsection

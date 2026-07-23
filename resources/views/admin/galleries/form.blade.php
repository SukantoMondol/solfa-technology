@extends('layouts.admin')

@section('title', $gallery->exists ? 'Edit Gallery Item' : 'Add Gallery Item')

@section('content')
    <div class="card">
        <form method="POST" action="{{ $gallery->exists ? route('admin.galleries.update', $gallery) : route('admin.galleries.store') }}" enctype="multipart/form-data">
            @csrf
            @if ($gallery->exists)
                @method('PUT')
            @endif

            <div class="form-grid">
                <div class="field full">
                    <label for="title">Title / Caption (Optional)</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $gallery->title) }}" placeholder="e.g. Collaborating on creative design models">
                </div>

                <div class="field">
                    <label for="sort_order">Sort order</label>
                    <input type="number" id="sort_order" name="sort_order" min="0" value="{{ old('sort_order', $gallery->sort_order ?? 0) }}">
                </div>

                <div class="field">
                    <label for="image_file">Upload Gallery Image *</label>
                    <input type="file" id="image_file" name="image_file" accept="image/*">
                </div>

                <div class="field">
                    <label for="image">Or Image Path / Asset URL</label>
                    <input type="text" id="image" name="image" placeholder="images/workspace.png" value="{{ old('image', $gallery->image) }}">
                </div>

                @if($gallery->image)
                    <div class="field full">
                        <label>Current Image Preview</label>
                        <div style="margin-top: 8px;">
                            <img src="{{ asset($gallery->image) }}" alt="Preview" style="max-height: 120px; border-radius: 8px; border: 1px solid var(--border);">
                        </div>
                    </div>
                @endif
            </div>

            <div class="form-footer">
                <button type="submit" class="btn btn-primary">{{ $gallery->exists ? 'Save changes' : 'Add to Gallery' }}</button>
                <a href="{{ route('admin.galleries.index') }}" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
@endsection

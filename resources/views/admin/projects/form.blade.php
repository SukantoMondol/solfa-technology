@extends('layouts.admin')

@section('title', $project->exists ? 'Edit Project' : 'Add Project')

@section('content')
    <div class="card">
        <form method="POST" action="{{ $project->exists ? route('admin.projects.update', $project) : route('admin.projects.store') }}" enctype="multipart/form-data">
            @csrf
            @if ($project->exists)
                @method('PUT')
            @endif

            <div class="form-grid">
                <div class="field">
                    <label for="title">Title *</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $project->title) }}" required>
                </div>

                <div class="field">
                    <label for="slug">Slug (leave blank to auto-generate)</label>
                    <input type="text" id="slug" name="slug" value="{{ old('slug', $project->slug) }}">
                </div>

                <div class="field">
                    <label for="category">Category (used for filter tabs, e.g. Web Development, SEO, Digital Marketing)</label>
                    <input type="text" id="category" name="category" value="{{ old('category', $project->category) }}">
                </div>

                <div class="field">
                    <label for="client">Client name</label>
                    <input type="text" id="client" name="client" value="{{ old('client', $project->client) }}">
                </div>

                <div class="field">
                    <label for="website_url">Website URL (Live Project Link)</label>
                    <input type="url" id="website_url" name="website_url" placeholder="https://example.com" value="{{ old('website_url', $project->website_url) }}">
                </div>

                <div class="field">
                    <label for="completed_at">Completed date</label>
                    <input type="date" id="completed_at" name="completed_at" value="{{ old('completed_at', optional($project->completed_at)->format('Y-m-d')) }}">
                </div>

                <div class="field">
                    <label for="sort_order">Sort order</label>
                    <input type="number" id="sort_order" name="sort_order" min="0" value="{{ old('sort_order', $project->sort_order ?? 0) }}">
                </div>

                <div class="field">
                    <label for="image_file">Upload Project Image</label>
                    <input type="file" id="image_file" name="image_file" accept="image/*">
                </div>

                <div class="field">
                    <label for="image">Or Image Path/URL</label>
                    <input type="text" id="image" name="image" placeholder="images/project1.png" value="{{ old('image', $project->image) }}">
                </div>

                @if($project->image)
                    <div class="field full">
                        <label>Current Image Preview</label>
                        <div style="margin-top: 8px;">
                            <img src="{{ asset($project->image) }}" alt="Preview" style="max-height: 120px; border-radius: 8px; border: 1px solid var(--border);">
                        </div>
                    </div>
                @endif

                <div class="field full">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" class="tall">{{ old('description', $project->description) }}</textarea>
                </div>

                <div class="checkbox-row">
                    <input type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured', $project->is_featured) ? 'checked' : '' }}>
                    <label for="is_featured">Featured on homepage</label>
                </div>

                <div class="checkbox-row">
                    <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $project->is_active ?? true) ? 'checked' : '' }}>
                    <label for="is_active">Active (visible on website)</label>
                </div>
            </div>

            <div class="form-footer">
                <button type="submit" class="btn btn-primary">{{ $project->exists ? 'Save changes' : 'Create project' }}</button>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
@endsection

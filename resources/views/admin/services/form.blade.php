@extends('layouts.admin')

@section('title', $service->exists ? 'Edit Service' : 'Add Service')

@section('content')
    <div class="card">
        <form method="POST" action="{{ $service->exists ? route('admin.services.update', $service) : route('admin.services.store') }}">
            @csrf
            @if ($service->exists)
                @method('PUT')
            @endif

            <div class="form-grid">
                <div class="field">
                    <label for="title">Title *</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $service->title) }}" required>
                </div>

                <div class="field">
                    <label for="slug">Slug (leave blank to auto-generate)</label>
                    <input type="text" id="slug" name="slug" value="{{ old('slug', $service->slug) }}">
                </div>

                <div class="field">
                    <label for="icon">Icon name (e.g. code, palette, megaphone, chart, mobile, cart)</label>
                    <input type="text" id="icon" name="icon" value="{{ old('icon', $service->icon) }}">
                </div>

                <div class="field">
                    <label for="sort_order">Sort order</label>
                    <input type="number" id="sort_order" name="sort_order" min="0" value="{{ old('sort_order', $service->sort_order ?? 0) }}">
                </div>

                <div class="field full">
                    <label for="excerpt">Short description (shown on cards)</label>
                    <textarea id="excerpt" name="excerpt">{{ old('excerpt', $service->excerpt) }}</textarea>
                </div>

                <div class="field full">
                    <label for="body">Full description (detail page)</label>
                    <textarea id="body" name="body" class="tall">{{ old('body', $service->body) }}</textarea>
                </div>

                <div class="checkbox-row full">
                    <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $service->is_active ?? true) ? 'checked' : '' }}>
                    <label for="is_active">Active (visible on website)</label>
                </div>
            </div>

            <div class="form-footer">
                <button type="submit" class="btn btn-primary">{{ $service->exists ? 'Save changes' : 'Create service' }}</button>
                <a href="{{ route('admin.services.index') }}" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
@endsection

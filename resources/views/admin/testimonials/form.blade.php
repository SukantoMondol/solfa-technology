@extends('layouts.admin')

@section('title', $testimonial->exists ? 'Edit Testimonial' : 'Add Testimonial')

@section('content')
    <div class="card">
        <form method="POST" action="{{ $testimonial->exists ? route('admin.testimonials.update', $testimonial) : route('admin.testimonials.store') }}" enctype="multipart/form-data">
            @csrf
            @if ($testimonial->exists)
                @method('PUT')
            @endif

            <div class="form-grid">
                <div class="field">
                    <label for="name">Client name *</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $testimonial->name) }}" required>
                </div>

                <div class="field">
                    <label for="position">Position</label>
                    <input type="text" id="position" name="position" value="{{ old('position', $testimonial->position) }}">
                </div>

                <div class="field">
                    <label for="company">Company</label>
                    <input type="text" id="company" name="company" value="{{ old('company', $testimonial->company) }}">
                </div>

                <div class="field">
                    <label for="rating">Rating (1–5)</label>
                    <input type="number" id="rating" name="rating" min="1" max="5" value="{{ old('rating', $testimonial->rating ?? 5) }}">
                </div>

                <div class="field">
                    <label for="sort_order">Sort order</label>
                    <input type="number" id="sort_order" name="sort_order" min="0" value="{{ old('sort_order', $testimonial->sort_order ?? 0) }}">
                </div>

                <div class="field">
                    <label for="avatar_file">Upload Client Picture</label>
                    <input type="file" id="avatar_file" name="avatar_file" accept="image/*">
                    <small style="color: #6c757d; font-size: 0.78rem; margin-top: 4px; display: block;">Max size: 2MB (JPG, PNG, WEBP, GIF)</small>
                </div>

                <div class="field">
                    <label for="avatar">Or Image Path/URL</label>
                    <input type="text" id="avatar" name="avatar" placeholder="images/client1.jpg" value="{{ old('avatar', $testimonial->avatar) }}">
                    <small style="color: #6c757d; font-size: 0.78rem; margin-top: 4px; display: block;">Or enter an image path manually</small>
                </div>

                @if($testimonial->avatar)
                    <div class="field full">
                        <label>Current Client Picture</label>
                        <div style="margin-top: 8px; display: flex; align-items: center; gap: 12px;">
                            <img src="{{ asset($testimonial->avatar) }}" alt="Preview" style="width: 54px; height: 54px; border-radius: 50%; object-fit: cover; border: 2px solid var(--primary);">
                            <span style="font-size: 0.85rem; color: var(--body);">{{ $testimonial->avatar }}</span>
                        </div>
                    </div>
                @endif

                <div class="field full">
                    <label for="quote">Quote *</label>
                    <textarea id="quote" name="quote" required>{{ old('quote', $testimonial->quote) }}</textarea>
                </div>

                <div class="checkbox-row full">
                    <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $testimonial->is_active ?? true) ? 'checked' : '' }}>
                    <label for="is_active">Active (visible on website)</label>
                </div>
            </div>

            <div class="form-footer">
                <button type="submit" class="btn btn-primary">{{ $testimonial->exists ? 'Save changes' : 'Create testimonial' }}</button>
                <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
@endsection

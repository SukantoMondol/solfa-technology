@extends('layouts.admin')

@section('title', $testimonial->exists ? 'Edit Testimonial' : 'Add Testimonial')

@section('content')
    <div class="card">
        <form method="POST" action="{{ $testimonial->exists ? route('admin.testimonials.update', $testimonial) : route('admin.testimonials.store') }}">
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

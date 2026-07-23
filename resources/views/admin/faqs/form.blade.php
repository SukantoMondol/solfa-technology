@extends('layouts.admin')

@section('title', $faq->exists ? 'Edit FAQ' : 'Add FAQ')

@section('content')
    <div class="card">
        <form method="POST" action="{{ $faq->exists ? route('admin.faqs.update', $faq) : route('admin.faqs.store') }}">
            @csrf
            @if ($faq->exists)
                @method('PUT')
            @endif

            <div class="form-grid">
                <div class="field full">
                    <label for="question">Question *</label>
                    <input type="text" id="question" name="question" value="{{ old('question', $faq->question) }}" required>
                </div>

                <div class="field full">
                    <label for="answer">Answer *</label>
                    <textarea id="answer" name="answer" required>{{ old('answer', $faq->answer) }}</textarea>
                </div>

                <div class="field">
                    <label for="sort_order">Sort order</label>
                    <input type="number" id="sort_order" name="sort_order" min="0" value="{{ old('sort_order', $faq->sort_order ?? 0) }}">
                </div>

                <div class="checkbox-row full">
                    <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $faq->is_active ?? true) ? 'checked' : '' }}>
                    <label for="is_active">Active (visible on website)</label>
                </div>
            </div>

            <div class="form-footer">
                <button type="submit" class="btn btn-primary">{{ $faq->exists ? 'Save changes' : 'Create FAQ' }}</button>
                <a href="{{ route('admin.faqs.index') }}" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
@endsection

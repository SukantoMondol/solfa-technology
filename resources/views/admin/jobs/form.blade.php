@extends('layouts.admin')

@section('title', $job->exists ? 'Edit Job' : 'Add Job')

@section('content')
    <div class="card">
        <form method="POST" action="{{ $job->exists ? route('admin.jobs.update', $job) : route('admin.jobs.store') }}">
            @csrf
            @if ($job->exists)
                @method('PUT')
            @endif

            <div class="form-grid">
                <div class="field">
                    <label for="title">Job title *</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $job->title) }}" required>
                </div>

                <div class="field">
                    <label for="slug">Slug (leave blank to auto-generate)</label>
                    <input type="text" id="slug" name="slug" value="{{ old('slug', $job->slug) }}">
                </div>

                <div class="field">
                    <label for="location">Location</label>
                    <input type="text" id="location" name="location" value="{{ old('location', $job->location) }}">
                </div>

                <div class="field">
                    <label for="type">Type</label>
                    <select id="type" name="type">
                        @foreach (['Full Time', 'Part Time', 'Contract', 'Internship'] as $type)
                            <option value="{{ $type }}" {{ old('type', $job->type ?? 'Full Time') === $type ? 'selected' : '' }}>{{ $type }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="field">
                    <label for="workplace_type">Workplace Type</label>
                    <select id="workplace_type" name="workplace_type">
                        @foreach (['In office', 'Remote', 'Hybrid'] as $workplace)
                            <option value="{{ $workplace }}" {{ old('workplace_type', $job->workplace_type ?? 'In office') === $workplace ? 'selected' : '' }}>{{ $workplace }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="field">
                    <label for="vacancies">No. of Vacancies</label>
                    <input type="number" id="vacancies" name="vacancies" min="1" value="{{ old('vacancies', $job->vacancies ?? 1) }}">
                </div>

                <div class="field">
                    <label for="salary">Salary range (optional)</label>
                    <input type="text" id="salary" name="salary" value="{{ old('salary', $job->salary) }}">
                </div>

                <div class="field">
                    <label for="deadline">Application deadline</label>
                    <input type="date" id="deadline" name="deadline" value="{{ old('deadline', optional($job->deadline)->format('Y-m-d')) }}">
                </div>

                <div class="field full">
                    <label for="summary">Short summary (shown on listing)</label>
                    <textarea id="summary" name="summary">{{ old('summary', $job->summary) }}</textarea>
                </div>

                <div class="field full">
                    <label for="description">Full description (requirements, responsibilities, benefits)</label>
                    <textarea id="description" name="description" class="tall">{{ old('description', $job->description) }}</textarea>
                </div>

                <div class="checkbox-row full">
                    <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $job->is_active ?? true) ? 'checked' : '' }}>
                    <label for="is_active">Open (visible on careers page)</label>
                </div>
            </div>

            <div class="form-footer">
                <button type="submit" class="btn btn-primary">{{ $job->exists ? 'Save changes' : 'Create job' }}</button>
                <a href="{{ route('admin.jobs.index') }}" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
@endsection

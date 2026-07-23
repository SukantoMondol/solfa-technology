@extends('layouts.admin')

@section('title', $member->exists ? 'Edit Team Member' : 'Add Team Member')

@section('content')
    <div class="card">
        <form method="POST" action="{{ $member->exists ? route('admin.team-members.update', $member) : route('admin.team-members.store') }}" enctype="multipart/form-data">
            @csrf
            @if ($member->exists)
                @method('PUT')
            @endif

            <div class="form-grid">
                <div class="field">
                    <label for="name">Name *</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $member->name) }}" placeholder="e.g. MANNISA" required>
                </div>

                <div class="field">
                    <label for="designation">Designation *</label>
                    <input type="text" id="designation" name="designation" value="{{ old('designation', $member->designation) }}" placeholder="e.g. SR. SOCIAL MEDIA MANAGER" required>
                </div>

                <div class="field">
                    <label for="sort_order">Sort order</label>
                    <input type="number" id="sort_order" name="sort_order" min="0" value="{{ old('sort_order', $member->sort_order ?? 0) }}">
                </div>

                <div class="field">
                    <label for="image_file">Upload Photo</label>
                    <input type="file" id="image_file" name="image_file" accept="image/*">
                </div>

                <div class="field">
                    <label for="image">Or Image Path / Asset URL</label>
                    <input type="text" id="image" name="image" placeholder="images/team1.png" value="{{ old('image', $member->image) }}">
                </div>

                @if($member->image)
                    <div class="field full">
                        <label>Current Photo Preview</label>
                        <div style="margin-top: 8px;">
                            <img src="{{ asset($member->image) }}" alt="Preview" style="max-height: 120px; border-radius: 8px; border: 1px solid var(--border);">
                        </div>
                    </div>
                @endif
            </div>

            <div class="form-footer">
                <button type="submit" class="btn btn-primary">{{ $member->exists ? 'Save changes' : 'Add Team Member' }}</button>
                <a href="{{ route('admin.team-members.index') }}" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
@endsection

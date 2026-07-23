@extends('layouts.admin')

@section('title', 'Site Settings')

@section('content')
    <div class="card">
        <form method="POST" action="{{ route('admin.settings.update') }}">
            @csrf
            @method('PUT')

            <div class="form-grid">
                @foreach ($fields as $key => $label)
                    <div class="field {{ in_array($key, ['hero_text', 'about_text', 'vision', 'mission', 'address']) ? 'full' : '' }}">
                        <label for="{{ $key }}">{{ $label }}</label>
                        @if (in_array($key, ['hero_text', 'about_text', 'vision', 'mission']))
                            <textarea id="{{ $key }}" name="{{ $key }}">{{ old($key, $values[$key] ?? '') }}</textarea>
                        @else
                            <input type="text" id="{{ $key }}" name="{{ $key }}" value="{{ old($key, $values[$key] ?? '') }}">
                        @endif
                    </div>
                @endforeach
            </div>

            <div class="form-footer">
                <button type="submit" class="btn btn-primary">Save settings</button>
            </div>
        </form>
    </div>
@endsection

@extends('layouts.app')

@section('title', $job->title.' | Careers | '.($site['site_name'] ?? 'Solfa Technologies'))
@section('meta_description', $job->summary)

@section('content')
<section class="page-hero">
    <div class="container">
        <h1 class="text-balance">{{ $job->title }}</h1>
        <p>{{ $job->type }} @if($job->location) &middot; {{ $job->location }} @endif @if($job->salary) &middot; {{ $job->salary }} @endif</p>
    </div>
</section>

<section>
    <div class="container prose">
        {!! nl2br(e($job->description)) !!}

        @if ($job->deadline)
            <p><strong>Application deadline:</strong> {{ $job->deadline->format('d M Y') }}</p>
        @endif

        <p style="margin-top: 28px;">
            <a href="mailto:{{ $site['email'] ?? 'careers@solfatechnologies.com' }}?subject=Application: {{ $job->title }}" class="btn btn-primary">Apply via Email</a>
        </p>
    </div>
</section>
@endsection

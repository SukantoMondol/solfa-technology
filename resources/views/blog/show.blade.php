@extends('layouts.app')

@section('title', $post->title.' | '.($site['site_name'] ?? 'Solfa Technologies'))
@section('meta_description', $post->excerpt)

@section('content')
    {{-- Section 1: Blog Post Hero Section --}}
    <section class="blog-details-hero">
        <div class="blog-details-hero-overlay"></div>
        <div class="container blog-details-hero-container">
            <div class="blog-details-breadcrumbs">
                <a href="{{ route('home') }}">Home</a>
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <a href="{{ route('blog.index') }}">Blog</a>
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <span>Article</span>
            </div>
            
            <h1>{{ $post->title }}</h1>
            
            <div class="blog-details-meta">
                <div class="meta-badge-node">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                    <span>{{ $post->published_at?->format('d M Y') }}</span>
                </div>
                <div class="meta-badge-node">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    <span>By {{ $post->author }}</span>
                </div>
                <div class="meta-badge-node tag-badge">
                    <span>Insight</span>
                </div>
            </div>
        </div>
    </section>

    {{-- Section 2: Blog Article Content --}}
    <section class="blog-details-body-section">
        <div class="container">
            <div class="blog-details-body-wrapper">
                @if ($post->image)
                    <div class="blog-details-media-box">
                        <img src="{{ asset($post->image) }}" alt="{{ $post->title }}">
                    </div>
                @else
                    <div class="blog-details-media-box">
                        <img src="{{ asset('images/about_workspace_main.png') }}" alt="{{ $post->title }}">
                    </div>
                @endif
                
                <div class="blog-details-prose">
                    {!! nl2br(e($post->body)) !!}
                </div>
                
                <div class="blog-details-footer-cta">
                    <div class="share-box">
                        <span>Share Article:</span>
                        <a href="https://facebook.com/share.php?u={{ urlencode(request()->url()) }}" target="_blank" class="share-btn">Facebook</a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($post->title) }}" target="_blank" class="share-btn">Twitter</a>
                    </div>
                    <a href="{{ route('blog.index') }}" class="btn btn-outline back-to-blog-btn">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                        <span>Back to Insights</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Section 3: Recent Posts Section --}}
    @if ($recent->isNotEmpty())
        <section class="blog-recent-section">
            <div class="container">
                <div class="blog-recent-header">
                    <span class="accent-title">RECOMMENDED</span>
                    <h2>Recent Posts</h2>
                </div>
                
                <div class="blog-page-grid">
                    @foreach ($recent as $item)
                        <article class="blog-page-card">
                            <div class="blog-card-media">
                                @if ($item->image)
                                    <img src="{{ asset($item->image) }}" alt="{{ $item->title }}">
                                @else
                                    <img src="{{ asset('images/about_workspace_main.png') }}" alt="{{ $item->title }}">
                                @endif
                                <div class="blog-card-tag-pill">Insight</div>
                            </div>
                            <div class="blog-card-content">
                                <div class="blog-card-meta">
                                    <div class="meta-item">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                        <span>{{ $item->published_at?->format('d M Y') }}</span>
                                    </div>
                                    <div class="meta-item">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span>By {{ $item->author ?? 'Solfa Team' }}</span>
                                    </div>
                                </div>
                                <h3>{{ $item->title }}</h3>
                                <p class="blog-card-excerpt">{{ $item->excerpt }}</p>
                                <div class="blog-card-footer">
                                    <a href="{{ route('blog.show', $item) }}" class="blog-read-more-btn">
                                        <span>Read Article</span>
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection

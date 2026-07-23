@extends('layouts.app')

@section('title', 'Blog | '.($site['site_name'] ?? 'Solfa Technologies'))

@section('content')
    {{-- Section 1: Hero Banner --}}
    <section class="blog-hero-banner">
        <div class="blog-hero-overlay"></div>
        <div class="container blog-hero-container">
            <h1>Insights & Trends</h1>
            <p>Practical advice on web engineering, search optimization, and digital brand growth from the Solfa team.</p>
            <div class="blog-breadcrumbs">
                <a href="{{ route('home') }}">Home</a>
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <span>Blog</span>
            </div>
        </div>
    </section>

    {{-- Section 2: Blog Grid Section --}}
    <section class="blog-page-grid-section">
        <div class="container">
            <div class="blog-page-grid">
                @forelse ($posts as $post)
                    <article class="blog-page-card">
                        <div class="blog-card-media">
                            @if ($post->image)
                                <img src="{{ asset($post->image) }}" alt="{{ $post->title }}">
                            @else
                                <img src="{{ asset('images/about_workspace_main.png') }}" alt="{{ $post->title }}">
                            @endif
                            <div class="blog-card-tag-pill">Insight</div>
                        </div>
                        <div class="blog-card-content">
                            <div class="blog-card-meta">
                                <div class="meta-item">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                    <span>{{ $post->published_at?->format('d M Y') }}</span>
                                </div>
                                <div class="meta-item">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <span>By {{ $post->author }}</span>
                                </div>
                            </div>
                            <h3>{{ $post->title }}</h3>
                            <p class="blog-card-excerpt">{{ $post->excerpt }}</p>
                            <div class="blog-card-footer">
                                <a href="{{ route('blog.show', $post) }}" class="blog-read-more-btn">
                                    <span>Read Article</span>
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                </a>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="blog-empty-box">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line></svg>
                        <p>No posts published yet. Check back soon.</p>
                    </div>
                @endforelse
            </div>

            @if($posts->hasPages())
                <div class="blog-pagination-wrapper">
                    {{ $posts->links() }}
                </div>
            @endif
        </div>
    </section>

    {{-- Section 3: Newsletter --}}
    <section class="blog-newsletter-section">
        <div class="blog-newsletter-overlay"></div>
        <div class="container blog-newsletter-container">
            <div class="newsletter-card-premium">
                <span class="accent-title">NEWSLETTER</span>
                <h2>Subscribe to Our Digital Growth Newsletter</h2>
                <p>Get weekly tips, expert analyses, and marketing trends sent directly to your inbox. No spam, unsubscribe anytime.</p>
                <form action="#" class="newsletter-form-premium" onsubmit="event.preventDefault(); alert('Subscribed successfully!');">
                    <input type="email" placeholder="Enter your email address" required>
                    <button type="submit" class="btn btn-primary">Subscribe Now</button>
                </form>
            </div>
        </div>
    </section>
@endsection

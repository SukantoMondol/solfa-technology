@extends('layouts.app')

@section('title', 'Contact Us | '.($site['site_name'] ?? 'Solfa Technologies'))

@section('content')
    {{-- Section 1: Hero Banner Section --}}
    <section class="contact-hero-banner">
        <div class="contact-hero-overlay"></div>
        <div class="container contact-hero-container">
            <h1>Let's Build Something Great</h1>
            <p>Have a project in mind, want to partner, or just want to say hello? Get in touch with our experts today.</p>
            <div class="contact-breadcrumbs">
                <a href="{{ route('home') }}">Home</a>
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <span>Contact Us</span>
            </div>
        </div>
    </section>

    {{-- Section 2: Contact Grid Section --}}
    <section class="contact-page-grid-section">
        <div class="container contact-grid-premium">
            {{-- Left column: Info Cards --}}
            <div class="contact-info-premium" data-aos="fade-right">
                <div class="info-card-premium" data-aos="fade-up" data-aos-delay="100">
                    <div class="info-card-icon-box">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                    </div>
                    <div class="info-card-text">
                        <h3>Call Us</h3>
                        <p><a href="tel:{{ preg_replace('/\s+/', '', $site['phone'] ?? '') }}">{{ $site['phone'] ?? '' }}</a></p>
                        <span>Monday - Friday, 9am - 6pm</span>
                    </div>
                </div>
                
                <div class="info-card-premium" data-aos="fade-up" data-aos-delay="200">
                    <div class="info-card-icon-box">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                    </div>
                    <div class="info-card-text">
                        <h3>Email Us</h3>
                        <p><a href="mailto:{{ $site['email'] ?? '' }}">{{ $site['email'] ?? '' }}</a></p>
                        <span>Drop us a line anytime!</span>
                    </div>
                </div>
                
                <div class="info-card-premium" data-aos="fade-up" data-aos-delay="300">
                    <div class="info-card-icon-box">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                    </div>
                    <div class="info-card-text">
                        <h3>Visit Us</h3>
                        <p class="address-text">{{ $site['address'] ?? '' }}</p>
                        <span>Come over for a cup of coffee</span>
                    </div>
                </div>

                <div class="info-socials-premium" data-aos="fade-up" data-aos-delay="350">
                    <h3>Connect With Us</h3>
                    <div class="social-links-grid-premium">
                        @if($site['facebook'] ?? null)
                            <a href="{{ $site['facebook'] }}" target="_blank" class="social-btn-premium">Facebook</a>
                        @endif
                        @if($site['linkedin'] ?? null)
                            <a href="{{ $site['linkedin'] }}" target="_blank" class="social-btn-premium">LinkedIn</a>
                        @endif
                        @if($site['twitter'] ?? null)
                            <a href="{{ $site['twitter'] }}" target="_blank" class="social-btn-premium">Twitter</a>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Right column: Form Card --}}
            <div class="contact-form-card-premium" data-aos="fade-left" data-aos-delay="150">
                <div class="form-header-premium">
                    <h2>Send Us a Message</h2>
                    <p>Have questions? Fill out the form and our team will get in touch shortly.</p>
                </div>

                <form action="{{ route('contact.store') }}" method="POST" class="contact-form-premium">
                    @csrf

                    @if (session('success'))
                        <div class="alert alert-success-premium">
                            <span class="alert-icon">✓</span>
                            <span>{{ session('success') }}</span>
                        </div>
                    @endif

                    <div class="form-grid-2col">
                        <div class="form-field-premium">
                            <input type="text" name="name" placeholder="Your name *" value="{{ old('name') }}" required aria-label="Your name">
                            @error('name')<p class="field-error-premium">{{ $message }}</p>@enderror
                        </div>
                        <div class="form-field-premium">
                            <input type="email" name="email" placeholder="Your email *" value="{{ old('email') }}" required aria-label="Your email">
                            @error('email')<p class="field-error-premium">{{ $message }}</p>@enderror
                        </div>
                    </div>
                    
                    <div class="form-grid-2col">
                        <div class="form-field-premium">
                            <input type="tel" name="phone" placeholder="Phone number" value="{{ old('phone') }}" aria-label="Phone number">
                            @error('phone')<p class="field-error-premium">{{ $message }}</p>@enderror
                        </div>
                        <div class="form-field-premium">
                            <input type="text" name="subject" placeholder="Subject" value="{{ old('subject') }}" aria-label="Subject">
                            @error('subject')<p class="field-error-premium">{{ $message }}</p>@enderror
                        </div>
                    </div>
                    
                    <div class="form-field-premium">
                        <textarea name="message" rows="6" placeholder="Tell us about your project *" required aria-label="Your message">{{ old('message') }}</textarea>
                        @error('message')<p class="field-error-premium">{{ $message }}</p>@enderror
                    </div>

                    <div class="form-submit-row">
                        <button type="submit" class="btn btn-primary submit-btn-premium">
                            <span>Send Message</span>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

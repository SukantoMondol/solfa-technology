@extends('layouts.app')

@section('title', 'About Us | '.($site['site_name'] ?? 'Solfa Technologies'))

@section('content')
    {{-- About Page Banner / Breadcrumb --}}
    <section class="about-hero-banner">
        <div class="about-hero-overlay"></div>
        <div class="container about-hero-container">
            <h1>About Us</h1>
            <div class="about-breadcrumbs">
                <a href="{{ route('home') }}">Home</a>
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <span>About</span>
            </div>
        </div>
    </section>

    {{-- Company History Section --}}
    <section class="about-history-section">
        <div class="container">
            <div class="about-history-grid">
                <div class="about-history-image">
                    <img src="{{ asset('images/about_workspace_main.png') }}" alt="Our Workspace" class="about-history-img">
                </div>
                <div class="about-history-content">
                    <span class="about-history-eyebrow">HISTORY</span>
                    <h2 class="about-history-title">Our Company History</h2>
                    <p class="about-history-desc">{{ $site['about_text'] ?? 'Founded with a passion for creativity and technology, our company started as a small digital studio and has grown into a full-service agency. Over time, we have helped businesses transform their ideas into powerful, successful brands.' }}</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Mission Section --}}
    <section class="about-mission-section">
        <div class="container">
            <div class="about-mission-grid">
                <div class="about-mission-content">
                    <span class="about-mission-eyebrow">MISSION</span>
                    <h2 class="about-mission-title">Our Mission</h2>
                    <p class="about-mission-desc">{{ $site['mission'] ?? 'Our mission is to empower businesses with smart, creative, and result-driven digital solutions. We aim to deliver high-quality services in web development, design, and marketing that help brands grow, connect with their audience, and achieve measurable success.' }}</p>
                    <button type="button" onclick="openMeetingSchedulerModal()" class="btn btn-primary about-action-btn">Contact Us</button>
                </div>
                <div class="about-mission-image">
                    <img src="{{ asset('images/about_team_overlay.png') }}" alt="Our Mission" class="about-mission-img">
                </div>
            </div>
        </div>
    </section>

    {{-- Vision Section --}}
    <section class="about-vision-section">
        <div class="container">
            <div class="about-vision-grid">
                <div class="about-vision-image">
                    <img src="{{ asset('images/why_choose_us_laptop.png') }}" alt="Our Vision" class="about-vision-img">
                </div>
                <div class="about-vision-content">
                    <span class="about-vision-eyebrow">VISION</span>
                    <h2 class="about-vision-title">Our Vision</h2>
                    <p class="about-vision-desc">{{ $site['vision'] ?? 'Our vision is to become a leading global digital agency known for innovation, trust, and impactful solutions. We strive to shape the future of digital experiences by helping businesses transform their ideas into powerful, successful brands.' }}</p>
                    <button type="button" onclick="openMeetingSchedulerModal()" class="btn btn-primary about-action-btn">Contact Us</button>
                </div>
            </div>
        </div>
    </section>

    {{-- Delivered Projects Banner --}}
    <section class="about-delivered-banner">
        <div class="about-delivered-overlay"></div>
        <div class="container about-delivered-container">
            <span class="about-delivered-eyebrow">PROJECTS</span>
            <h2>Since 2018, Solfa Technologies Has Delivered 5000+ Successful Projects</h2>
            <p>Since our journey began, Solfa Technologies has successfully delivered thousands of projects with a strong focus on quality, innovation, and client satisfaction.</p>
            <button type="button" onclick="openMeetingSchedulerModal()" class="btn btn-primary about-action-btn">Get Started Now</button>
        </div>
    </section>

    {{-- Meet Our Experts Section --}}
    @if($teamMembers->isNotEmpty())
        <section class="about-team-section">
            <div class="container">
                <div class="section-head text-center">
                    <span class="about-team-eyebrow">OUR TEAM</span>
                    <h2 class="about-team-title">Meet Our Experts</h2>
                    <p class="about-team-subtitle">Tuba IT's dedicated team of developers, designers, and digital marketing experts works collaboratively to deliver innovative, reliable, and result-driven IT solutions.</p>
                </div>
                
                <div class="about-team-grid">
                    @foreach($teamMembers as $member)
                        <div class="team-card-premium">
                            <div class="team-card-image-box">
                                <img src="{{ asset($member->image) }}" alt="{{ $member->name }}" class="team-img">
                                <div class="team-card-glow"></div>
                            </div>
                            <div class="team-card-info">
                                <h3>{{ $member->name }}</h3>
                                <p>{{ $member->designation }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Our Gallery Section --}}
    @if($galleries->isNotEmpty())
        <section class="about-gallery-section">
            <div class="container">
                <div class="section-head text-center">
                    <span class="about-gallery-eyebrow">OUR GALLERY</span>
                    <h2 class="about-gallery-title">Our Gallery</h2>
                    <p class="about-gallery-subtitle">Take a virtual tour of our creative workstation, collaborations, and client brainstorm sessions.</p>
                </div>

                <div class="about-gallery-grid">
                    @foreach($galleries as $gallery)
                        <div class="about-gallery-item">
                            <img src="{{ asset($gallery->image) }}" alt="{{ $gallery->title ?? 'Solfa Gallery' }}" class="about-gallery-img">
                            @if($gallery->title)
                                <div class="about-gallery-caption">
                                    <h4>{{ $gallery->title }}</h4>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

@endsection

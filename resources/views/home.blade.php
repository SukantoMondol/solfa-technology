@extends('layouts.app')

@section('title', ($site['site_name'] ?? 'Solfa Technologies') . ' | ' . ($site['tagline'] ?? 'Smart IT Solutions for Digital Growth'))

@section('content')

    {{-- ============================= HERO (Immersive 3D) ============================= --}}
    <section class="hero-immersive" id="heroSection">
        {{-- Three.js Particle Canvas --}}
        <canvas id="heroCanvas" class="hero-canvas" aria-hidden="true"></canvas>

        {{-- Gradient overlays --}}
        <div class="hero-gradient-overlay"></div>
        <div class="hero-glow hero-glow--left"></div>
        <div class="hero-glow hero-glow--right"></div>

        {{-- Floating Service Orbit Badges --}}
        <div class="hero-orbit-container" aria-hidden="true">
            @forelse ($services->take(6) as $index => $service)
                <div class="orbit-badge" style="--orbit-i: {{ $index }}; --orbit-total: 6">
                    <span class="orbit-badge-dot"></span>
                    <span>{{ $service->title }}</span>
                </div>
            @empty
                <div class="orbit-badge" style="--orbit-i: 0; --orbit-total: 6"><span class="orbit-badge-dot"></span><span>Web Development</span></div>
                <div class="orbit-badge" style="--orbit-i: 1; --orbit-total: 6"><span class="orbit-badge-dot"></span><span>SEO Optimization</span></div>
                <div class="orbit-badge" style="--orbit-i: 2; --orbit-total: 6"><span class="orbit-badge-dot"></span><span>Graphics Design</span></div>
                <div class="orbit-badge" style="--orbit-i: 3; --orbit-total: 6"><span class="orbit-badge-dot"></span><span>Digital Marketing</span></div>
                <div class="orbit-badge" style="--orbit-i: 4; --orbit-total: 6"><span class="orbit-badge-dot"></span><span>Mobile App Development</span></div>
                <div class="orbit-badge" style="--orbit-i: 5; --orbit-total: 6"><span class="orbit-badge-dot"></span><span>Social Media Strategy</span></div>
            @endforelse
        </div>

        {{-- Center Content --}}
        <div class="hero-center-content">
            {{-- Animated Badge --}}
            <div class="hero-badge">
                <span class="hero-badge-dot"></span>
                <span>{{ strtoupper($site['site_name'] ?? 'SOLFA TECHNOLOGIES') }}</span>
                <span class="hero-badge-shimmer"></span>
            </div>

            {{-- Animated Headline --}}
            <h1 class="hero-headline">
                @php
                    $titleWords = explode(' ', $site['hero_title'] ?? 'Reliable IT & Digital Solutions for Growing Businesses');
                @endphp
                @foreach ($titleWords as $index => $word)
                    <span class="hero-word" style="--word-index: {{ $index }}">{{ $word }}</span>
                @endforeach
            </h1>

            {{-- Subtitle --}}
            <p class="hero-subtitle">
                {{ $site['hero_text'] ?? 'We provide industry-specific technology and marketing strategies for businesses of all sizes.' }}
            </p>

            {{-- CTA Buttons --}}
            <div class="hero-actions">
                <a href="{{ route('contact') }}" class="hero-btn-primary">
                    <span>Get a Free Consultation</span>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </a>
                <a href="tel:{{ preg_replace('/\s+/', '', $site['phone'] ?? '') }}" class="hero-btn-ghost">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                    <span>{{ $site['phone'] ?? '+880 1700 000000' }}</span>
                </a>
            </div>

            {{-- Bottom bar: Trust + Stats --}}
            <div class="hero-bottom-bar">
                <div class="hero-trust">
                    <div class="hero-trust-avatars">
                        <span class="trust-avatar" style="--i:0">S</span>
                        <span class="trust-avatar" style="--i:1">T</span>
                        <span class="trust-avatar" style="--i:2">A</span>
                        <span class="trust-avatar" style="--i:3">R</span>
                    </div>
                    <p><strong>{{ $site['stat_clients'] ?? '120' }}+</strong> Happy Clients</p>
                </div>
                <div class="hero-mini-stats">
                    <div class="hero-mini-stat">
                        <span class="mini-stat-value">{{ $site['stat_projects'] ?? '250' }}+</span>
                        <span class="mini-stat-label">Projects</span>
                    </div>
                    <div class="hero-mini-stat">
                        <span class="mini-stat-value">{{ $site['stat_years'] ?? '8' }}+</span>
                        <span class="mini-stat-label">Years Exp.</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Scroll Indicator --}}
        <div class="hero-scroll-indicator">
            <div class="scroll-mouse">
                <div class="scroll-wheel"></div>
            </div>
            <span>Scroll</span>
        </div>
    </section>

    {{-- ============================= AUTO-SCROLLING SERVICES MARQUEE ============================= --}}
    <div class="services-marquee-bar" aria-label="Our Services">
        <div class="marquee-track">
            <div class="marquee-content">
                @forelse ($services as $service)
                    <span class="marquee-item"><span>✦</span> {{ strtoupper($service->title) }}</span>
                @empty
                    <span class="marquee-item"><span>✦</span> WEB DEVELOPMENT</span>
                    <span class="marquee-item"><span>✦</span> GRAPHICS DESIGN</span>
                    <span class="marquee-item"><span>✦</span> DIGITAL MARKETING</span>
                    <span class="marquee-item"><span>✦</span> SEO OPTIMIZATION</span>
                    <span class="marquee-item"><span>✦</span> SOCIAL MEDIA STRATEGY</span>
                    <span class="marquee-item"><span>✦</span> UI/UX DESIGN</span>
                    <span class="marquee-item"><span>✦</span> SOFTWARE SOLUTIONS</span>
                @endforelse
            </div>
            <div class="marquee-content" aria-hidden="true">
                @forelse ($services as $service)
                    <span class="marquee-item"><span>✦</span> {{ strtoupper($service->title) }}</span>
                @empty
                    <span class="marquee-item"><span>✦</span> WEB DEVELOPMENT</span>
                    <span class="marquee-item"><span>✦</span> GRAPHICS DESIGN</span>
                    <span class="marquee-item"><span>✦</span> DIGITAL MARKETING</span>
                    <span class="marquee-item"><span>✦</span> SEO OPTIMIZATION</span>
                    <span class="marquee-item"><span>✦</span> SOCIAL MEDIA STRATEGY</span>
                    <span class="marquee-item"><span>✦</span> UI/UX DESIGN</span>
                    <span class="marquee-item"><span>✦</span> SOFTWARE SOLUTIONS</span>
                @endforelse
            </div>
        </div>
    </div>

    {{-- ============================= STATS ============================= --}}
    <section class="stats-band" aria-label="Company statistics">
        <div class="container stats-grid">
            <div class="stat">
                <p class="value"><span data-count="{{ $site['stat_projects'] ?? 250 }}">0</span>+</p>
                <p class="label">Successful IT Projects</p>
            </div>
            <div class="stat">
                <p class="value"><span data-count="{{ $site['stat_clients'] ?? 120 }}">0</span>+</p>
                <p class="label">Satisfied Business Clients</p>
            </div>
            <div class="stat">
                <p class="value"><span data-count="{{ $site['stat_years'] ?? 8 }}">0</span>+</p>
                <p class="label">Years of IT Experience</p>
            </div>
            <div class="stat">
                <p class="value"><span data-count="{{ $site['stat_team'] ?? 35 }}">0</span>+</p>
                <p class="label">Dedicated IT Professionals</p>
            </div>
        </div>
    </section>

    {{-- ============================= ABOUT US ============================= --}}
    <section class="about-section" id="about">
        <div class="container about-container-grid">
            {{-- Left: Dual Image Showcase (Main Workspace + Floating Overlay Team) --}}
            <div class="about-media-wrapper" data-aos="fade-right" data-aos-duration="900">
                <div class="about-main-image-box">
                    <img src="{{ asset('images/about_workspace_main.png') }}" alt="Solfa Technologies Workspace" class="about-main-img">
                </div>
                <div class="about-overlay-image-box" data-aos="zoom-in" data-aos-delay="300">
                    <img src="{{ asset('images/about_team_overlay.png') }}" alt="Solfa Technologies Team Collaboration" class="about-overlay-img">
                </div>
            </div>

            {{-- Right: Content & Icon Features --}}
            <div class="about-content-wrapper" data-aos="fade-left" data-aos-duration="900" data-aos-delay="150">
                <span class="about-badge">ABOUT US</span>
                <h2 class="about-title">{{ $site['site_name'] ?? 'Solfa Technologies' }} {{ $site['about_title'] ?? 'Smart Solutions for Digital Growth' }}</h2>
                <p class="about-description">
                    {{ $site['about_text'] ?? 'Solfa Technologies delivers reliable technology services, innovative software solutions, and expert support to help businesses scale, secure systems, and succeed in an evolving digital landscape.' }}
                </p>

                {{-- Feature Rows with Custom Icon Badges --}}
                <div class="about-feature-rows">
                    <div class="about-feature-item" data-aos="fade-up" data-aos-delay="200">
                        <div class="feature-icon-badge feature-icon-badge--rocket">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.71.79-1.81.2-2.55L4.5 16.5z"></path><path d="M12 15l-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-3.05 11a22.35 22.35 0 0 1-3.95 2z"></path><path d="M9 18l3 3"></path><path d="M14 9a2 2 0 1 1-4 0 2 2 0 0 1 4 0z"></path></svg>
                        </div>
                        <div class="feature-info">
                            <h4>Growth-Focused Strategy</h4>
                            <p>Every project starts with your business goals, not just deliverables.</p>
                        </div>
                    </div>

                    <div class="about-feature-item" data-aos="fade-up" data-aos-delay="300">
                        <div class="feature-icon-badge feature-icon-badge--code">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
                        </div>
                        <div class="feature-info">
                            <h4>Technical Expertise</h4>
                            <p>Experienced engineers, designers, and marketers on one team.</p>
                        </div>
                    </div>

                    <div class="about-feature-item" data-aos="fade-up" data-aos-delay="400">
                        <div class="feature-icon-badge feature-icon-badge--trust">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path><polyline points="9 12 11 14 15 10"></polyline></svg>
                        </div>
                        <div class="feature-info">
                            <h4>Trusted Partnership</h4>
                            <p>Transparent reporting and long-term support you can rely on.</p>
                        </div>
                    </div>
                </div>

                {{-- Action Button --}}
                <div class="about-action" data-aos="fade-up" data-aos-delay="450">
                    <a href="{{ route('about') }}" class="btn-discover-more">
                        <span>Discover More</span>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================= POPULAR SERVICES ============================= --}}
    <section class="services-section-modern" id="services">
        <div class="container">
            <div class="section-head text-center" data-aos="fade-up">
                <span class="services-eyebrow-modern">POPULAR SERVICES</span>
                <h2 class="services-title-modern">Smart Digital Services That Drive Growth</h2>
                <p class="services-subtitle-modern">Comprehensive digital and IT services designed to increase visibility, enhance user experience, and support long-term business growth.</p>
            </div>

            <div class="services-grid-modern">
                @foreach ($services as $service)
                    @php
                        $t = strtolower($service->title);
                        $iconType = 'default';
                        if (str_contains($t, 'web')) $iconType = 'web';
                        elseif (str_contains($t, 'seo')) $iconType = 'seo';
                        elseif (str_contains($t, 'graphic') || str_contains($t, 'design')) $iconType = 'design';
                        elseif (str_contains($t, 'marketing')) $iconType = 'marketing';
                        elseif (str_contains($t, 'social')) $iconType = 'social';
                        elseif (str_contains($t, 'software') || str_contains($t, 'app')) $iconType = 'software';
                    @endphp

                    <article class="service-card-modern" data-aos="fade-up" data-aos-delay="{{ 100 * ($loop->index % 3 + 1) }}">
                        <div class="service-card-header">
                            <span class="service-num-modern">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                            <div class="service-icon-badge service-icon-badge--{{ $iconType }}">
                                @if($iconType === 'web')
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                                @elseif($iconType === 'seo')
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><polyline points="11 8 11 11 14 11"></polyline></svg>
                                @elseif($iconType === 'design')
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 19l7-7 3 3-7 7-3-3z"></path><path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"></path><path d="M2 2l7.586 7.586"></path><circle cx="11" cy="11" r="2"></circle></svg>
                                @elseif($iconType === 'marketing')
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
                                @elseif($iconType === 'social')
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg>
                                @else
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
                                @endif
                            </div>
                        </div>

                        <h3 class="service-card-title-modern">{{ $service->title }}</h3>
                        <p class="service-card-desc-modern">{{ $service->excerpt }}</p>

                        <a href="{{ route('services.show', $service) }}" class="service-card-link-modern">
                            <span>Learn More</span>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                        </a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ============================= PROJECTS ============================= --}}
    <section id="projects">
        <div class="container">
            <div class="section-head">
                <p class="section-eyebrow">Our Projects</p>
                <h2 class="text-balance">Recent Projects</h2>
                <p class="text-pretty">A selection of recent work delivered for clients across industries.</p>
            </div>

            @if ($categories->isNotEmpty())
                <div class="filter-tabs" role="tablist" aria-label="Filter projects by category">
                    <button type="button" class="active" data-filter="all">All</button>
                    @foreach ($categories as $category)
                        <button type="button" data-filter="{{ $category }}">{{ $category }}</button>
                    @endforeach
                </div>
            @endif

            <div class="projects-grid">
                @foreach ($projects as $project)
                    <article class="project-card" data-category="{{ $project->category }}" style="cursor: pointer;" onclick="window.location.href='{{ route('projects.show', $project->slug) }}'">
                        <div class="project-thumb-box">
                            @if ($project->image)
                                <img src="{{ asset($project->image) }}" alt="{{ $project->title }}" class="project-img">
                            @else
                                <div class="project-img-placeholder">
                                    <span>{{ strtoupper(substr($project->title, 0, 1)) }}</span>
                                </div>
                            @endif

                            <div class="project-overlay-glow">
                                <a href="{{ route('projects.show', $project->slug) }}" class="project-visit-btn">
                                    <span>View Case Study &rarr;</span>
                                </a>
                            </div>
                        </div>
                        <div class="project-body">
                            <span class="project-cat-badge">{{ $project->category }}</span>
                            <h3 class="project-card-title">
                                <a href="{{ route('projects.show', $project->slug) }}" style="color: inherit; text-decoration: none;">
                                    {{ $project->title }}
                                </a>
                            </h3>
                            <div class="project-card-footer">
                                <span class="project-client">@if ($project->client) Client: {{ $project->client }} @endif</span>
                                <a href="{{ route('projects.show', $project->slug) }}" class="project-card-link" style="color: var(--primary); font-weight: 700;">
                                    <span>View Details &rarr;</span>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ============================= WORK STEPS (Premium Connected Design) ============================= --}}
    <section class="steps-section-new">
        <div class="container">
            <div class="section-head text-center">
                <span class="steps-eyebrow-new">OUR WORKING PROCESS</span>
                <h2 class="steps-title-new">How We Work, in 4 Simple Steps</h2>
                <p class="steps-subtitle-new">Our structured approach ensures transparent communication, rapid delivery, and outstanding results.</p>
            </div>

            <div class="steps-grid-new">
                {{-- Step 1 --}}
                <div class="step-card-new">
                    <span class="step-giant-number">01</span>
                    <div class="step-icon-box">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    </div>
                    <h3 class="step-title-new">Discovery</h3>
                    <p class="step-desc-new">We learn your business, target audience, and project goals to define what success looks like.</p>
                </div>

                {{-- Step 2 --}}
                <div class="step-card-new">
                    <span class="step-giant-number">02</span>
                    <div class="step-icon-box">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="3 11 22 2 13 21 11 13 3 11"></polygon></svg>
                    </div>
                    <h3 class="step-title-new">Strategy</h3>
                    <p class="step-desc-new">We map out a clear roadmap with milestones, technical specs, and measurable success metrics.</p>
                </div>

                {{-- Step 3 --}}
                <div class="step-card-new">
                    <span class="step-giant-number">03</span>
                    <div class="step-icon-box">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                    </div>
                    <h3 class="step-title-new">Build & Refine</h3>
                    <p class="step-desc-new">Our engineers and designers build the solution iteratively, ensuring quality and transparency.</p>
                </div>

                {{-- Step 4 --}}
                <div class="step-card-new">
                    <span class="step-giant-number">04</span>
                    <div class="step-icon-box">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 2L11 13"></path><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                    </div>
                    <h3 class="step-title-new">Launch & Grow</h3>
                    <p class="step-desc-new">We deploy, monitor metrics, and provide ongoing optimization retainer support to scale growth.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================= TECH STACK SECTION (Marquee Scrolling style) ============================= --}}
    <section class="tech-stack-section">
        <div class="tech-stack-container-inner text-center">
            <h2 class="tech-title">Yes! We cover your tech stack.</h2>
            <p class="tech-subtitle">Our team has expertise in almost every modern programming language, framework, and digital stack.</p>
        </div>

        <div class="tech-marquee-wrapper">
            {{-- Row 1: Left to Right --}}
            <div class="tech-marquee-row ltr">
                <div class="tech-marquee-track">
                    <span class="tech-tag tag-python">Python</span>
                    <span class="tech-tag tag-csharp">C#</span>
                    <span class="tech-tag tag-laravel">Laravel</span>
                    <span class="tech-tag tag-flutter">Flutter</span>
                    <span class="tech-tag tag-android">Android</span>
                    <span class="tech-tag tag-vue">Vue.js</span>
                    <span class="tech-tag tag-golang">Golang</span>
                    <span class="tech-tag tag-moodle">Moodle</span>
                    {{-- Duplicate for seamless loop --}}
                    <span class="tech-tag tag-python">Python</span>
                    <span class="tech-tag tag-csharp">C#</span>
                    <span class="tech-tag tag-laravel">Laravel</span>
                    <span class="tech-tag tag-flutter">Flutter</span>
                    <span class="tech-tag tag-android">Android</span>
                    <span class="tech-tag tag-vue">Vue.js</span>
                    <span class="tech-tag tag-golang">Golang</span>
                    <span class="tech-tag tag-moodle">Moodle</span>
                </div>
            </div>

            {{-- Row 2: Right to Left --}}
            <div class="tech-marquee-row rtl">
                <div class="tech-marquee-track">
                    <span class="tech-tag tag-php">PHP</span>
                    <span class="tech-tag tag-react">React</span>
                    <span class="tech-tag tag-node">Node.js</span>
                    <span class="tech-tag tag-javascript">JavaScript</span>
                    <span class="tech-tag tag-wordpress">WordPress</span>
                    <span class="tech-tag tag-aws">AWS</span>
                    <span class="tech-tag tag-swift">Swift</span>
                    <span class="tech-tag tag-docker">Docker</span>
                    {{-- Duplicate for seamless loop --}}
                    <span class="tech-tag tag-php">PHP</span>
                    <span class="tech-tag tag-react">React</span>
                    <span class="tech-tag tag-node">Node.js</span>
                    <span class="tech-tag tag-javascript">JavaScript</span>
                    <span class="tech-tag tag-wordpress">WordPress</span>
                    <span class="tech-tag tag-aws">AWS</span>
                    <span class="tech-tag tag-swift">Swift</span>
                    <span class="tech-tag tag-docker">Docker</span>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================= WHY CHOOSE US (Redesigned with Showcase Image) ============================= --}}
    {{-- ============================= WHY CHOOSE US (Tubait Inspired Split Design) ============================= --}}
    {{-- ============================= WHY CHOOSE US (Tubait Inspired Split Design) ============================= --}}
    <section id="why-us" class="why-us-tubait-section">
        <div class="container">
            <div class="why-us-tubait-wrapper">
                
                {{-- Left Content Column --}}
                <div class="why-us-tubait-content">
                    <span class="why-us-tubait-eyebrow">WHY CHOOSE US</span>
                    <h2 class="why-us-tubait-headline">We are your one-stop solutions for building big brands</h2>
                    <p class="why-us-tubait-desc">From first design concepts to ongoing performance marketing, Solfa Technologies handles the complete digital journey so you can focus on running your business.</p>

                    <div class="why-us-tubait-grid">
                        {{-- Card 1 --}}
                        <div class="why-us-tubait-card">
                            <div class="why-us-tubait-card-header">
                                <div class="why-us-tubait-card-icon">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                                </div>
                                <h3>Exceptional Support</h3>
                            </div>
                            <p>We provide reliable, responsive, and dedicated support at every stage, ensuring your business always has the guidance it needs to grow with confidence.</p>
                        </div>

                        {{-- Card 2 --}}
                        <div class="why-us-tubait-card">
                            <div class="why-us-tubait-card-header">
                                <div class="why-us-tubait-card-icon">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="4.22" x2="19.78" y2="5.64"></line></svg>
                                </div>
                                <h3>Innovative And Ahead</h3>
                            </div>
                            <p>By combining creativity with the latest digital trends, we deliver forward-thinking solutions that keep your brand competitive and future-ready.</p>
                        </div>

                        {{-- Card 3 --}}
                        <div class="why-us-tubait-card">
                            <div class="why-us-tubait-card-header">
                                <div class="why-us-tubait-card-icon">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>
                                </div>
                                <h3>Expertise That Delivers</h3>
                            </div>
                            <p>Our team consists of specialists across development, design, and marketing, allowing us to deliver high-quality, high-performing products consistently.</p>
                        </div>

                        {{-- Card 4 --}}
                        <div class="why-us-tubait-card">
                            <div class="why-us-tubait-card-header">
                                <div class="why-us-tubait-card-icon">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg>
                                </div>
                                <h3>Results-Oriented</h3>
                            </div>
                            <p>We focus on metrics that matter. Every website design, marketing strategy, or piece of code is geared toward driving growth and maximizing ROI.</p>
                        </div>
                    </div>
                </div>

                {{-- Right Image Column --}}
                <div class="why-us-tubait-image-col">
                    <img src="{{ asset('images/why_choose_us_laptop.png') }}" alt="Why Choose Solfa Technologies" class="why-us-tubait-img">
                </div>

            </div>
        </div>
    </section>

    {{-- ============================= TESTIMONIALS (Seamless Auto Scrolling Marquee) ============================= --}}
    @if ($testimonials->isNotEmpty())
        <section class="testimonials-section-marquee" id="testimonials">
            <div class="container text-center">
                <div class="section-head text-center">
                    <span class="testimonials-eyebrow-marquee">TESTIMONIALS</span>
                    <h2 class="testimonials-title-marquee">Client Feedback & Reviews</h2>
                    <p class="testimonials-subtitle-marquee">Hear what our clients have to say about collaborating with Solfa Technologies.</p>
                </div>
            </div>

            <div class="testimonials-marquee-container">
                <div class="testimonials-marquee-track">
                    {{-- First Loop --}}
                    @foreach ($testimonials as $testimonial)
                        <blockquote class="testimonial-card-premium">
                            <p class="testimonial-stars" aria-label="{{ $testimonial->rating }} out of 5 stars">
                                {{ str_repeat('★', $testimonial->rating) }}
                            </p>
                            <p class="testimonial-quote-text">"{{ $testimonial->quote }}"</p>
                            <footer class="testimonial-who">
                                <div class="testimonial-details">
                                    <h3>{{ $testimonial->name }}</h3>
                                    <p>{{ $testimonial->position }}@if($testimonial->company), {{ $testimonial->company }}@endif</p>
                                </div>
                                @if ($testimonial->avatar)
                                    <img src="{{ asset($testimonial->avatar) }}" alt="{{ $testimonial->name }}" class="testimonial-avatar-img">
                                @else
                                    <span class="testimonial-avatar" aria-hidden="true">{{ strtoupper(substr($testimonial->name, 0, 1)) }}</span>
                                @endif
                            </footer>
                        </blockquote>
                    @endforeach
                    
                    {{-- Duplicate Loop for seamless scrolling --}}
                    @foreach ($testimonials as $testimonial)
                        <blockquote class="testimonial-card-premium">
                            <p class="testimonial-stars" aria-label="{{ $testimonial->rating }} out of 5 stars">
                                {{ str_repeat('★', $testimonial->rating) }}
                            </p>
                            <p class="testimonial-quote-text">"{{ $testimonial->quote }}"</p>
                            <footer class="testimonial-who">
                                <div class="testimonial-details">
                                    <h3>{{ $testimonial->name }}</h3>
                                    <p>{{ $testimonial->position }}@if($testimonial->company), {{ $testimonial->company }}@endif</p>
                                </div>
                                @if ($testimonial->avatar)
                                    <img src="{{ asset($testimonial->avatar) }}" alt="{{ $testimonial->name }}" class="testimonial-avatar-img">
                                @else
                                    <span class="testimonial-avatar" aria-hidden="true">{{ strtoupper(substr($testimonial->name, 0, 1)) }}</span>
                                @endif
                            </footer>
                        </blockquote>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- ============================= FEATURED PROJECTS ============================= --}}
    @if ($featuredProjects->isNotEmpty())
        <section id="featured">
            <div class="container">
                <div class="section-head text-center">
                    <span class="section-eyebrow">Featured Projects</span>
                    <h2 class="text-balance">Where your successes become ours</h2>
                </div>
                <div class="projects-grid">
                    @foreach ($featuredProjects as $project)
                        <article class="project-card" data-category="{{ $project->category }}" style="cursor: pointer;" onclick="window.location.href='{{ route('projects.show', $project->slug) }}'">
                            <div class="project-thumb-box">
                                @if ($project->image)
                                    <img src="{{ asset($project->image) }}" alt="{{ $project->title }}" class="project-img">
                                @else
                                    <div class="project-img-placeholder">
                                        <span>{{ strtoupper(substr($project->title, 0, 1)) }}</span>
                                    </div>
                                @endif

                                <div class="project-overlay-glow">
                                    <a href="{{ route('projects.show', $project->slug) }}" class="project-visit-btn">
                                        <span>View Case Study &rarr;</span>
                                    </a>
                                </div>
                            </div>
                            <div class="project-body">
                                <span class="project-cat-badge">{{ $project->category }}</span>
                                <h3 class="project-card-title">
                                    <a href="{{ route('projects.show', $project->slug) }}" style="color: inherit; text-decoration: none;">
                                        {{ $project->title }}
                                    </a>
                                </h3>
                                <p class="project-card-desc-modern" style="font-size: 0.92rem; line-height: 1.55; color: var(--body); margin-bottom: 20px;">{{ Str::limit($project->description, 120) }}</p>
                                <div class="project-card-footer">
                                    <span class="project-client">@if ($project->client) Client: {{ $project->client }} @endif</span>
                                    <a href="{{ route('projects.show', $project->slug) }}" class="project-card-link" style="color: var(--primary); font-weight: 700;">
                                        <span>Read More &rarr;</span>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- ============================= FAQ (Tubait Inspired 2-Column Accordion) ============================= --}}
    @if ($faqs->isNotEmpty())
        <section class="faq-tubait-section" id="faq">
            <div class="container">
                <div class="section-head text-center">
                    <span class="faq-tubait-eyebrow">Frequently Asked Questions</span>
                    <h2 class="faq-tubait-title text-balance">Most Popular Questions</h2>
                    <p class="faq-tubait-subtitle text-pretty">Find quick answers to the most common questions about our services, process, pricing, and support.</p>
                </div>

                @php
                    $slicedFaqs = $faqs->take(8);
                    $half = ceil($slicedFaqs->count() / 2);
                    $col1 = $slicedFaqs->take($half);
                    $col2 = $slicedFaqs->slice($half);
                @endphp

                <div class="faq-tubait-grid">
                    {{-- Column 1 --}}
                    <div class="faq-tubait-column">
                        @foreach ($col1 as $faq)
                            <details class="faq-tubait-item">
                                <summary>
                                    <span>{{ $faq->question }}</span>
                                    <svg class="faq-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                </summary>
                                <div class="faq-tubait-answer">
                                    <p>{{ $faq->answer }}</p>
                                </div>
                            </details>
                        @endforeach
                    </div>

                    {{-- Column 2 --}}
                    <div class="faq-tubait-column">
                        @foreach ($col2 as $faq)
                            <details class="faq-tubait-item">
                                <summary>
                                    <span>{{ $faq->question }}</span>
                                    <svg class="faq-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                </summary>
                                <div class="faq-tubait-answer">
                                    <p>{{ $faq->answer }}</p>
                                </div>
                            </details>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

@endsection
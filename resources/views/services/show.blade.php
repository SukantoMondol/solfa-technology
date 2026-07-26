@extends('layouts.app')

@php
    $slug = \Illuminate\Support\Str::slug($service->title);

    // Default Fallbacks
    $heroTitle = 'We Build Technology Solutions That Drive Growth';
    $heroTag = strtoupper($service->title) . ' SERVICES';
    $heroImage = 'images/about_workspace_main.png';
    $featureImage = 'images/why_choose_us_showcase.png';

    $featureHeading = "Expert {$service->title} Solutions Engineered for Growth";
    $checkItem1 = "Tailored Professional Strategy";
    $checkItem2 = "Responsive & Modern Infrastructure";
    $checkItem3 = "Built-In Optimization & Analytics";

    $process1Title = "Discovery & Planning";
    $process1Desc = "We analyze your target market and build a strategic blueprint.";
    $process2Title = "Design & Prototype";
    $process2Desc = "Crafting visual layouts and interactive flow prototypes.";
    $process3Title = "Engineering & Build";
    $process3Desc = "Developing fast, scalable, and secure code architecture.";
    $process4Title = "Launch & Growth";
    $process4Desc = "Rigorous QA testing, seamless launch, and long-term support.";

    if ($slug == 'graphics-design') {
        $heroTitle = 'We Craft Iconic Brand Identities & Digital Experiences';
        $heroTag = 'GRAPHICS DESIGN';
        $heroImage = 'images/about_workspace_main.png';
        $featureImage = 'images/about_team_overlay.png';

        $featureHeading = "Visual Identity & Design Assets That Command Attention";
        $checkItem1 = "Custom Brand Guidelines & Logo Systems";
        $checkItem2 = "High-Fidelity UI / UX Product Layouts";
        $checkItem3 = "Production-Ready Print & Digital Media";

        $process1Title = "Brand Discovery";
        $process1Desc = "We research your audience, values, and competitor positioning.";
        $process2Title = "Concepting & Sketches";
        $process2Desc = "Creating initial moodboards, logo directions, and color palettes.";
        $process3Title = "Design Polish";
        $process3Desc = "Refining selected vector graphics, typography, and UI screens.";
        $process4Title = "Asset Handoff";
        $process4Desc = "Delivering high-resolution source vector files (AI, PSD, Figma).";

    } elseif ($slug == 'web-development') {
        $heroTitle = 'We Build Scalable, High-Performance Web Applications';
        $heroTag = 'WEB DEVELOPMENT';
        $heroImage = 'images/why_choose_us_laptop.png';
        $featureImage = 'images/why_choose_us_showcase.png';

        $featureHeading = "Custom Web Engineering Built for Speed, Scale & Security";
        $checkItem1 = "Custom Laravel & Modern JS Frameworks";
        $checkItem2 = "Lightning Load Speeds & Mobile Responsiveness";
        $checkItem3 = "API Integrations & Secure Cloud Infrastructure";

        $process1Title = "Architecture Specs";
        $process1Desc = "Defining database schemas, user journeys, and technical specs.";
        $process2Title = "UI/UX Prototype";
        $process2Desc = "Wireframing user-centric interfaces before full-scale coding.";
        $process3Title = "Full-Stack Build";
        $process3Desc = "Clean backend engineering coupled with modern responsive frontend.";
        $process4Title = "QA & Cloud Launch";
        $process4Desc = "Automated testing, SSL encryption setup, and cloud server deployment.";

    } elseif ($slug == 'seo-optimization') {
        $heroTitle = 'We Drive Targeted Organic Traffic That Increases Revenue';
        $heroTag = 'SEO OPTIMIZATION';
        $heroImage = 'images/why_choose_us_showcase.png';
        $featureImage = 'images/about_workspace_main.png';

        $featureHeading = "Data-Driven Search Engine Strategy That Dominates Rankings";
        $checkItem1 = "Comprehensive Technical & On-Page Audits";
        $checkItem2 = "High-Intent Buyer Keyword Research";
        $checkItem3 = "White-Hat Link Building & Domain Authority";

        $process1Title = "Technical Audit";
        $process1Desc = "Fixing indexation errors, site speed bottlenecks, and metadata.";
        $process2Title = "Keyword Mapping";
        $process2Desc = "Identifying lucrative buyer keywords with high search volume.";
        $process3Title = "Content & On-Page";
        $process3Desc = "Optimizing headings, schema markup, and pillar content strategy.";
        $process4Title = "Authority & Links";
        $process4Desc = "Earning high-grade contextual backlinks and tracking rank growth.";

    } elseif ($slug == 'digital-marketing') {
        $heroTitle = 'We Scale High-ROAS Paid Campaigns That Drive Revenue';
        $heroTag = 'DIGITAL MARKETING';
        $heroImage = 'images/about_team_overlay.png';
        $featureImage = 'images/gallery_workspace_1.png';

        $featureHeading = "Performance Marketing Engine Engineered for Maximum ROI";
        $checkItem1 = "Multi-Channel Paid Ads (Google, Meta, LinkedIn)";
        $checkItem2 = "High-Converting Sales Funnel Copywriting";
        $checkItem3 = "Real-Time Conversion Tracking & Pixel Setup";

        $process1Title = "Customer Avatars";
        $process1Desc = "Mapping buyer demographics, pain points, and offer positioning.";
        $process2Title = "Ad Copy & Creatives";
        $process2Desc = "Producing high-converting video ads, copy, and landing pages.";
        $process3Title = "Funnel & Pixel Build";
        $process3Desc = "Setting up custom conversion events, GA4, and retargeting.";
        $process4Title = "ROAS Scaling";
        $process4Desc = "A/B testing ad variations daily to scale return on ad spend.";

    } elseif ($slug == 'social-media-strategy') {
        $heroTitle = 'We Build Engaged Social Communities That Love Your Brand';
        $heroTag = 'SOCIAL MEDIA';
        $heroImage = 'images/gallery_workspace_1.png';
        $featureImage = 'images/gallery_workspace_2.png';

        $featureHeading = "End-to-End Social Content Strategy & Community Management";
        $checkItem1 = "High-Converting Monthly Content Calendars";
        $checkItem2 = "Active Inbox & Community Moderation";
        $checkItem3 = "Targeted Paid Social Ad Campaigns";

        $process1Title = "Social Audit";
        $process1Desc = "Analyzing current brand tone, engagement metrics, and competitors.";
        $process2Title = "Content Pillars";
        $process2Desc = "Designing graphics, short reels, and informative carousel posts.";
        $process3Title = "Scheduling & Post";
        $process3Desc = "Automating post calendar delivery during peak audience hours.";
        $process4Title = "Community Growth";
        $process4Desc = "Engaging comments, managing DMs, and tracking organic reach.";

    } elseif ($slug == 'mobile-app-development') {
        $heroTitle = 'We Craft Native & Cross-Platform Mobile Apps Users Love';
        $heroTag = 'MOBILE APPS';
        $heroImage = 'images/gallery_workspace_2.png';
        $featureImage = 'images/why_choose_us_laptop.png';

        $featureHeading = "Full-Lifecycle Mobile Engineering from Wireframe to Store";
        $checkItem1 = "iOS & Android Cross-Platform (Flutter & React Native)";
        $checkItem2 = "Offline-First Sync & Push Notifications";
        $checkItem3 = "Seamless App Store & Google Play Publishing";

        $process1Title = "User Flow Mapping";
        $process1Desc = "Drafting screen transitions, feature requirements, and DB models.";
        $process2Title = "Mobile UI Prototype";
        $process2Desc = "Creating interactive Figma mobile app screens and UX flows.";
        $process3Title = "Cross-Platform Build";
        $process3Desc = "Developing responsive mobile code integrated with secure APIs.";
        $process4Title = "App Store Launch";
        $process4Desc = "Handling Apple Store and Google Play submissions and updates.";
    }
@endphp

@section('title', $service->title.' | '.($site['site_name'] ?? 'Solfa Technologies'))
@section('meta_description', $service->excerpt)

@section('content')
    {{-- Section 1: Hero Section --}}
    <section class="service-details-hero">
        <div class="service-details-hero-overlay"></div>
        <div class="container service-details-hero-container">
            <div class="service-details-hero-grid">
                <div class="service-details-hero-text" data-aos="fade-right">
                    <span class="service-badge-tag">{{ $heroTag }}</span>
                    <h1 data-aos="fade-up" data-aos-delay="100">{{ $heroTitle }}</h1>
                    <p data-aos="fade-up" data-aos-delay="200">{{ $service->excerpt }}</p>
                    <div class="service-details-hero-btns" data-aos="fade-up" data-aos-delay="300">
                        <button type="button" onclick="openMeetingSchedulerModal()" class="btn btn-primary">Get Started Now &rarr;</button>
                        <a href="tel:{{ str_replace(' ', '', $site['phone'] ?? '+8801700000000') }}" class="btn btn-outline service-phone-btn">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                            <span>Schedule Consultation</span>
                        </a>
                    </div>
                </div>
                <div class="service-details-hero-media" data-aos="fade-left" data-aos-delay="200">
                    <img src="{{ asset($heroImage) }}" alt="{{ $service->title }} Showcase" class="service-hero-img-box">
                </div>
            </div>
        </div>
    </section>

    {{-- Section 2: Feature Showcase Section --}}
    <section class="service-feature-section">
        <div class="container">
            <div class="service-feature-grid">
                <div class="service-feature-media" data-aos="fade-right">
                    <img src="{{ asset($featureImage) }}" alt="Expert {{ $service->title }}" class="service-feature-img-box">
                </div>
                <div class="service-feature-text" data-aos="fade-left" data-aos-delay="150">
                    <h2>{{ $featureHeading }}</h2>
                    <p class="service-full-body">{!! nl2br(e($service->body)) !!}</p>
                    
                    <div class="service-checklist-badges">
                        <div class="checklist-item-badge" data-aos="zoom-in" data-aos-delay="200">
                            <div class="checklist-badge-icon">✓</div>
                            <span>{{ $checkItem1 }}</span>
                        </div>
                        <div class="checklist-item-badge" data-aos="zoom-in" data-aos-delay="300">
                            <div class="checklist-badge-icon">✓</div>
                            <span>{{ $checkItem2 }}</span>
                        </div>
                        <div class="checklist-item-badge" data-aos="zoom-in" data-aos-delay="400">
                            <div class="checklist-badge-icon">✓</div>
                            <span>{{ $checkItem3 }}</span>
                        </div>
                    </div>
                    
                    <button type="button" onclick="openMeetingSchedulerModal()" class="btn btn-primary service-get-started-btn" data-aos="fade-up" data-aos-delay="450">Get Started &rarr;</button>
                </div>
            </div>
        </div>
    </section>

    {{-- Section 3: Specialized Solutions We Offer --}}
    <section class="service-offers-section">
        <div class="container">
            <div class="service-offers-header" data-aos="fade-up">
                <h2>Tailored {{ $service->title }} Solutions We Offer</h2>
            </div>
            
            <div class="service-offers-grid">
                @if($slug == 'graphics-design')
                    <div class="offer-card-premium" data-aos="fade-up" data-aos-delay="100">
                        <div class="offer-icon-box"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"></path><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"></path></svg></div>
                        <h3>Logo & Brand Design</h3>
                        <p>We create beautiful, memorable logo and brand identities that define your company, values, and position in the marketplace.</p>
                        <a href="{{ route('contact') }}" class="offer-link">Learn More &rarr;</a>
                    </div>
                    <div class="offer-card-premium" data-aos="fade-up" data-aos-delay="200">
                        <div class="offer-icon-box"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="2" y1="10" x2="22" y2="10"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg></div>
                        <h3>UI / UX Product Design</h3>
                        <p>High-fidelity website mockup layouts and mobile designs built on comprehensive customer flow research and modern styles.</p>
                        <a href="{{ route('contact') }}" class="offer-link">Learn More &rarr;</a>
                    </div>
                    <div class="offer-card-premium" data-aos="fade-up" data-aos-delay="300">
                        <div class="offer-icon-box"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg></div>
                        <h3>Print & Marketing Media</h3>
                        <p>Corporate flyers, packaging design, banners, business cards, and video edits crafted to engage clients offline and online.</p>
                        <a href="{{ route('contact') }}" class="offer-link">Learn More &rarr;</a>
                    </div>
                @elseif($slug == 'web-development')
                    <div class="offer-card-premium" data-aos="fade-up" data-aos-delay="100">
                        <div class="offer-icon-box"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg></div>
                        <h3>E-commerce Web Solutions</h3>
                        <p>Dynamic online storefronts integrated with secure local and global payment gateways, order management, and stock automation.</p>
                        <a href="{{ route('contact') }}" class="offer-link">Learn More &rarr;</a>
                    </div>
                    <div class="offer-card-premium" data-aos="fade-up" data-aos-delay="200">
                        <div class="offer-icon-box"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path><path d="M2 12h20"></path></svg></div>
                        <h3>CMS Setup (WordPress & Shopify)</h3>
                        <p>Clean drag-and-drop customization using WordPress, Shopify, Wix, or Webflow. Optimized for easy future blogging and edits.</p>
                        <a href="{{ route('contact') }}" class="offer-link">Learn More &rarr;</a>
                    </div>
                    <div class="offer-card-premium" data-aos="fade-up" data-aos-delay="300">
                        <div class="offer-icon-box"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg></div>
                        <h3>Custom Laravel Web Apps</h3>
                        <p>Full-stack engineered SaaS platforms and custom web portals matching specific workflows. Fast, scale-ready, and highly secure.</p>
                        <a href="{{ route('contact') }}" class="offer-link">Learn More &rarr;</a>
                    </div>
                @elseif($slug == 'seo-optimization')
                    <div class="offer-card-premium" data-aos="fade-up" data-aos-delay="100">
                        <div class="offer-icon-box"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></div>
                        <h3>Technical SEO Audit</h3>
                        <p>We audit crawlabillity, site velocity, indexing errors, mobile optimization, and canonical structures to maximize Google index rates.</p>
                        <a href="{{ route('contact') }}" class="offer-link">Learn More &rarr;</a>
                    </div>
                    <div class="offer-card-premium" data-aos="fade-up" data-aos-delay="200">
                        <div class="offer-icon-box"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line></svg></div>
                        <h3>Keyword Research & Content</h3>
                        <p>In-depth competitor keyword analysis to uncover high-converting search queries that drive organic customers directly to your funnel.</p>
                        <a href="{{ route('contact') }}" class="offer-link">Learn More &rarr;</a>
                    </div>
                    <div class="offer-card-premium" data-aos="fade-up" data-aos-delay="300">
                        <div class="offer-icon-box"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg></div>
                        <h3>Link Building & Local SEO</h3>
                        <p>High-authority editorial backlink placement and Google Business Profile optimization to capture lucrative local market searches.</p>
                        <a href="{{ route('contact') }}" class="offer-link">Learn More &rarr;</a>
                    </div>
                @else
                    <div class="offer-card-premium" data-aos="fade-up" data-aos-delay="100">
                        <div class="offer-icon-box"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line></svg></div>
                        <h3>Campaign Strategy Planning</h3>
                        <p>Comprehensive market research and customer avatar definitions to build highly focused advertising and lead calendars.</p>
                        <a href="{{ route('contact') }}" class="offer-link">Learn More &rarr;</a>
                    </div>
                    <div class="offer-card-premium" data-aos="fade-up" data-aos-delay="200">
                        <div class="offer-icon-box"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg></div>
                        <h3>Paid Social & Search Advertising</h3>
                        <p>Optimized conversions setup on Google Ads, Facebook, Instagram, and LinkedIn. Maximizing budget return (ROAS) daily.</p>
                        <a href="{{ route('contact') }}" class="offer-link">Learn More &rarr;</a>
                    </div>
                    <div class="offer-card-premium" data-aos="fade-up" data-aos-delay="300">
                        <div class="offer-icon-box"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg></div>
                        <h3>Community Growth & Analytics</h3>
                        <p>Consistent content delivery, daily moderation, message management, and analytics reporting to optimize performance.</p>
                        <a href="{{ route('contact') }}" class="offer-link">Learn More &rarr;</a>
                    </div>
                @endif
            </div>
        </div>
    </section>

    {{-- Section 3.5: Tech Stack / Tools We Use --}}
    <section class="service-tech-stack">
        <div class="container">
            <div class="service-tech-header" data-aos="fade-up">
                <h2>Tools & Technologies Driving {{ $service->title }}</h2>
            </div>
            <div class="tech-logos-grid">
                @if($slug == 'graphics-design')
                    <div class="tech-item-card" data-aos="zoom-in" data-aos-delay="100"><span>Figma</span></div>
                    <div class="tech-item-card" data-aos="zoom-in" data-aos-delay="150"><span>Adobe Photoshop</span></div>
                    <div class="tech-item-card" data-aos="zoom-in" data-aos-delay="200"><span>Adobe Illustrator</span></div>
                    <div class="tech-item-card" data-aos="zoom-in" data-aos-delay="250"><span>Adobe Premiere Pro</span></div>
                    <div class="tech-item-card" data-aos="zoom-in" data-aos-delay="300"><span>After Effects</span></div>
                    <div class="tech-item-card" data-aos="zoom-in" data-aos-delay="350"><span>InDesign</span></div>
                @elseif($slug == 'web-development')
                    <div class="tech-item-card" data-aos="zoom-in" data-aos-delay="100"><span>Laravel PHP</span></div>
                    <div class="tech-item-card" data-aos="zoom-in" data-aos-delay="150"><span>React.js</span></div>
                    <div class="tech-item-card" data-aos="zoom-in" data-aos-delay="200"><span>Next.js</span></div>
                    <div class="tech-item-card" data-aos="zoom-in" data-aos-delay="250"><span>Shopify</span></div>
                    <div class="tech-item-card" data-aos="zoom-in" data-aos-delay="300"><span>WordPress</span></div>
                    <div class="tech-item-card" data-aos="zoom-in" data-aos-delay="350"><span>Tailwind CSS</span></div>
                @elseif($slug == 'seo-optimization')
                    <div class="tech-item-card" data-aos="zoom-in" data-aos-delay="100"><span>Search Console</span></div>
                    <div class="tech-item-card" data-aos="zoom-in" data-aos-delay="150"><span>Ahrefs Pro</span></div>
                    <div class="tech-item-card" data-aos="zoom-in" data-aos-delay="200"><span>SEMrush</span></div>
                    <div class="tech-item-card" data-aos="zoom-in" data-aos-delay="250"><span>Screaming Frog</span></div>
                    <div class="tech-item-card" data-aos="zoom-in" data-aos-delay="300"><span>Google Analytics 4</span></div>
                    <div class="tech-item-card" data-aos="zoom-in" data-aos-delay="350"><span>Moz Pro</span></div>
                @elseif($slug == 'digital-marketing')
                    <div class="tech-item-card" data-aos="zoom-in" data-aos-delay="100"><span>Google Ads</span></div>
                    <div class="tech-item-card" data-aos="zoom-in" data-aos-delay="150"><span>Meta Ads</span></div>
                    <div class="tech-item-card" data-aos="zoom-in" data-aos-delay="200"><span>LinkedIn Ads</span></div>
                    <div class="tech-item-card" data-aos="zoom-in" data-aos-delay="250"><span>Google Analytics</span></div>
                    <div class="tech-item-card" data-aos="zoom-in" data-aos-delay="300"><span>Mailchimp API</span></div>
                    <div class="tech-item-card" data-aos="zoom-in" data-aos-delay="350"><span>HubSpot CRM</span></div>
                @elseif($slug == 'social-media-strategy')
                    <div class="tech-item-card" data-aos="zoom-in" data-aos-delay="100"><span>Business Suite</span></div>
                    <div class="tech-item-card" data-aos="zoom-in" data-aos-delay="150"><span>Canva Pro</span></div>
                    <div class="tech-item-card" data-aos="zoom-in" data-aos-delay="200"><span>Hootsuite</span></div>
                    <div class="tech-item-card" data-aos="zoom-in" data-aos-delay="250"><span>CapCut Pro</span></div>
                    <div class="tech-item-card" data-aos="zoom-in" data-aos-delay="300"><span>Buffer App</span></div>
                    <div class="tech-item-card" data-aos="zoom-in" data-aos-delay="350"><span>Sprout Social</span></div>
                @else
                    <div class="tech-item-card" data-aos="zoom-in" data-aos-delay="100"><span>Flutter SDK</span></div>
                    <div class="tech-item-card" data-aos="zoom-in" data-aos-delay="150"><span>React Native</span></div>
                    <div class="tech-item-card" data-aos="zoom-in" data-aos-delay="200"><span>Swift Cocoa</span></div>
                    <div class="tech-item-card" data-aos="zoom-in" data-aos-delay="250"><span>Kotlin Android</span></div>
                    <div class="tech-item-card" data-aos="zoom-in" data-aos-delay="300"><span>Firebase DB</span></div>
                    <div class="tech-item-card" data-aos="zoom-in" data-aos-delay="350"><span>App Store API</span></div>
                @endif
            </div>
        </div>
    </section>

    {{-- Section 3.8: Glowing Stats Counter Section --}}
    <section class="service-stats-glowing-section">
        <div class="container">
            <div class="stats-glowing-wrapper">
                <div class="stat-glowing-node" data-aos="fade-up" data-aos-delay="100">
                    <h3>99%</h3>
                    <p>Client Satisfaction</p>
                </div>
                <div class="stat-glowing-node" data-aos="fade-up" data-aos-delay="200">
                    <h3>250+</h3>
                    <p>Successful Launches</p>
                </div>
                <div class="stat-glowing-node" data-aos="fade-up" data-aos-delay="300">
                    <h3>10x</h3>
                    <p>Average Business ROI</p>
                </div>
                <div class="stat-glowing-node" data-aos="fade-up" data-aos-delay="400">
                    <h3>24/7</h3>
                    <p>Dedicated Support</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Section 4: Tailored Working Process Section --}}
    <section class="service-process-section">
        <div class="container">
            <div class="service-process-header" data-aos="fade-up">
                <h2>Our Proven 4-Step Process for {{ $service->title }}</h2>
            </div>
            
            <div class="process-steps-grid">
                <div class="process-step-node" data-aos="fade-up" data-aos-delay="100">
                    <div class="step-badge">1</div>
                    <div class="step-icon-box">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                    </div>
                    <h3>{{ $process1Title }}</h3>
                    <p>{{ $process1Desc }}</p>
                </div>
                <div class="process-step-node" data-aos="fade-up" data-aos-delay="200">
                    <div class="step-badge">2</div>
                    <div class="step-icon-box">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"></path><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"></path></svg>
                    </div>
                    <h3>{{ $process2Title }}</h3>
                    <p>{{ $process2Desc }}</p>
                </div>
                <div class="process-step-node" data-aos="fade-up" data-aos-delay="300">
                    <div class="step-badge">3</div>
                    <div class="step-icon-box">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                    </div>
                    <h3>{{ $process3Title }}</h3>
                    <p>{{ $process3Desc }}</p>
                </div>
                <div class="process-step-node" data-aos="fade-up" data-aos-delay="400">
                    <div class="step-badge">4</div>
                    <div class="step-icon-box">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                    </div>
                    <h3>{{ $process4Title }}</h3>
                    <p>{{ $process4Desc }}</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Section 5: Recent Projects Section --}}
    @if ($projects->isNotEmpty())
        <section class="service-projects-section">
            <div class="container">
                <div class="service-projects-header" data-aos="fade-up">
                    <h2>Featured {{ $service->title }} Projects & Case Studies</h2>
                    <p>Explore some of our recent engagements where Solfa Technologies delivered measurable results with {{ $service->title }}.</p>
                </div>
                
                <div class="service-projects-grid">
                    @foreach ($projects as $project)
                        <div class="service-project-card" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                            <div class="project-card-image-box">
                                <img src="{{ asset($project->image) }}" alt="{{ $project->title }}">
                                <div class="project-card-hover-overlay">
                                    <a href="{{ $project->website_url ?? route('services.index') }}" target="_blank" class="project-card-btn">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>
                                    </a>
                                </div>
                            </div>
                            <div class="project-card-info">
                                <span class="project-tag">{{ $project->category }}</span>
                                <h3>{{ $project->title }}</h3>
                                <p class="client-label">Client: {{ $project->client }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Section 6: FAQs Section --}}
    <section class="service-faqs-section">
        <div class="container">
            <div class="service-faqs-header" data-aos="fade-up">
                <h2>Frequently Asked Questions About {{ $service->title }}</h2>
            </div>
            
            <div class="service-faqs-accordion">
                @if($slug == 'graphics-design')
                    <div class="faq-item-premium" data-aos="fade-up" data-aos-delay="100">
                        <div class="faq-question-box">
                            <h3>What files will I receive upon project completion?</h3>
                            <div class="faq-chevron-badge">+</div>
                        </div>
                        <div class="faq-answer-box">
                            <p>You will receive all high-resolution source vector files (AI, PSD, EPS, Figma) along with production-ready file formats like PNG, JPEG, and PDF.</p>
                        </div>
                    </div>
                    <div class="faq-item-premium" data-aos="fade-up" data-aos-delay="150">
                        <div class="faq-question-box">
                            <h3>How many revision rounds do I get for designs?</h3>
                            <div class="faq-chevron-badge">+</div>
                        </div>
                        <div class="faq-answer-box">
                            <p>We provide multiple revision rounds depending on the selected package to ensure the final assets match your exact brand guidelines and expectation.</p>
                        </div>
                    </div>
                    <div class="faq-item-premium" data-aos="fade-up" data-aos-delay="200">
                        <div class="faq-question-box">
                            <h3>Do you design assets for offline printing?</h3>
                            <div class="faq-chevron-badge">+</div>
                        </div>
                        <div class="faq-answer-box">
                            <p>Yes. We format all offline designs (flyers, brochures, packaging) in the correct printing color profiles (CMYK) and include exact bleeds and crop marks.</p>
                        </div>
                    </div>
                @elseif($slug == 'web-development')
                    <div class="faq-item-premium" data-aos="fade-up" data-aos-delay="100">
                        <div class="faq-question-box">
                            <h3>What platforms do you use for web development?</h3>
                            <div class="faq-chevron-badge">+</div>
                        </div>
                        <div class="faq-answer-box">
                            <p>We build customized websites using Laravel, Next.js, and React for custom tools, and leverage WordPress, Shopify, or Webflow for content management sites.</p>
                        </div>
                    </div>
                    <div class="faq-item-premium" data-aos="fade-up" data-aos-delay="150">
                        <div class="faq-question-box">
                            <h3>Will my website be responsive and mobile-friendly?</h3>
                            <div class="faq-chevron-badge">+</div>
                        </div>
                        <div class="faq-answer-box">
                            <p>Yes. Every single web application we ship is fully responsive, mobile-optimized, and thoroughly tested across modern iOS, Android, and desktop browsers.</p>
                        </div>
                    </div>
                    <div class="faq-item-premium" data-aos="fade-up" data-aos-delay="200">
                        <div class="faq-question-box">
                            <h3>Do you provide domain registration and web hosting setup?</h3>
                            <div class="faq-chevron-badge">+</div>
                        </div>
                        <div class="faq-answer-box">
                            <p>We set up secure cloud server environments (AWS, DigitalOcean, cPanel) and assist in registering domains and configuring SSL encryption certs.</p>
                        </div>
                    </div>
                @elseif($slug == 'seo-optimization')
                    <div class="faq-item-premium" data-aos="fade-up" data-aos-delay="100">
                        <div class="faq-question-box">
                            <h3>How long does it take to see organic search engine ranking results?</h3>
                            <div class="faq-chevron-badge">+</div>
                        </div>
                        <div class="faq-answer-box">
                            <p>Search engine optimization is an incremental process. Typically, noticeable growth in rankings, indexation, and search traffic occurs within 3 to 6 months.</p>
                        </div>
                    </div>
                    <div class="faq-item-premium" data-aos="fade-up" data-aos-delay="150">
                        <div class="faq-question-box">
                            <h3>Do you guarantee number 1 rankings on Google?</h3>
                            <div class="faq-chevron-badge">+</div>
                        </div>
                        <div class="faq-answer-box">
                            <p>No reputable SEO agency guarantees exact #1 ranking spots as search algorithms shift constantly. However, we guarantee to follow white-hat techniques that consistently grow authority.</p>
                        </div>
                    </div>
                    <div class="faq-item-premium" data-aos="fade-up" data-aos-delay="200">
                        <div class="faq-question-box">
                            <h3>What enterprise keyword research tools do you use?</h3>
                            <div class="faq-chevron-badge">+</div>
                        </div>
                        <div class="faq-answer-box">
                            <p>We use Semrush, Ahrefs, Moz, Google Search Console, and Google Analytics to research search volumes, keywords difficulty, and monitor competitors.</p>
                        </div>
                    </div>
                @else
                    <div class="faq-item-premium" data-aos="fade-up" data-aos-delay="100">
                        <div class="faq-question-box">
                            <h3>How do you measure marketing campaign success?</h3>
                            <div class="faq-chevron-badge">+</div>
                        </div>
                        <div class="faq-answer-box">
                            <p>We track concrete KPIs like Cost Per Acquisition (CPA), Return on Ad Spend (ROAS), click-through rates (CTR), and direct customer lead volume.</p>
                        </div>
                    </div>
                    <div class="faq-item-premium" data-aos="fade-up" data-aos-delay="150">
                        <div class="faq-question-box">
                            <h3>Which platforms do you manage advertisements on?</h3>
                            <div class="faq-chevron-badge">+</div>
                        </div>
                        <div class="faq-answer-box">
                            <p>We build target campaigns on Google Search/Display, Facebook, Instagram, LinkedIn, and YouTube depending on where your target demographic operates.</p>
                        </div>
                    </div>
                    <div class="faq-item-premium" data-aos="fade-up" data-aos-delay="200">
                        <div class="faq-question-box">
                            <h3>Do you handle community building and comment moderation?</h3>
                            <div class="faq-chevron-badge">+</div>
                        </div>
                        <div class="faq-answer-box">
                            <p>Yes. Our managers deliver post scheduling, comment response monitoring, inbox management, and brand reputation auditing.</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    {{-- Contact / CTA section --}}
    <section class="services-cta-section">
        <div class="services-cta-overlay"></div>
        <div class="container services-cta-container" data-aos="zoom-in">
            <h2>Ready to Accelerate Your Digital Growth with {{ $service->title }}?</h2>
            <p>Get in touch with our experts today to schedule a free strategy consultation and see how we can tailor our {{ $service->title }} solutions for your business.</p>
            <button type="button" onclick="openMeetingSchedulerModal()" class="btn btn-primary cta-btn">Schedule a Consultation</button>
        </div>
    </section>

    {{-- FAQ Interaction script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const faqItems = document.querySelectorAll('.faq-item-premium');
            faqItems.forEach(item => {
                const questionBox = item.querySelector('.faq-question-box');
                questionBox.addEventListener('click', function() {
                    const isActive = item.classList.contains('active');
                    
                    // Close all FAQs first
                    faqItems.forEach(other => {
                        other.classList.remove('active');
                        other.querySelector('.faq-chevron-badge').textContent = '+';
                    });
                    
                    if (!isActive) {
                        item.classList.add('active');
                        item.querySelector('.faq-chevron-badge').textContent = '−';
                    }
                });
            });
        });
    </script>
@endsection

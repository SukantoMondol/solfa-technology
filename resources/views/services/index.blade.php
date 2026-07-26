@extends('layouts.app')

@section('title', 'Services | '.($site['site_name'] ?? 'Solfa Technologies'))

@section('content')
    {{-- Services Page Hero Banner --}}
    <section class="services-hero-banner">
        <div class="services-hero-overlay"></div>
        <div class="container services-hero-container">
            <h1>Our Services</h1>
            <div class="services-breadcrumbs">
                <a href="{{ route('home') }}">Home</a>
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <span>Services</span>
            </div>
        </div>
    </section>

    {{-- Services Grid Section --}}
    <section class="services-page-grid-section">
        <div class="container">
            <div class="services-page-grid">
                @foreach ($services as $service)
                    <div class="service-page-card" data-aos="fade-up" data-aos-delay="{{ 100 * ($loop->index % 3 + 1) }}">
                        <span class="service-card-number">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                        
                        <div class="service-card-top">
                            <div class="service-icon-box-premium">
                                @if($service->icon == 'code')
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                                @elseif($service->icon == 'search')
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                @elseif($service->icon == 'pen')
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"></path><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"></path></svg>
                                @elseif($service->icon == 'chart')
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                                @elseif($service->icon == 'share')
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg>
                                @elseif($service->icon == 'mobile')
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect><line x1="12" y1="18" x2="12.01" y2="18"></line></svg>
                                @else
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                @endif
                            </div>
                            <h3>{{ $service->title }}</h3>
                        </div>

                        <p class="service-card-excerpt">{{ $service->excerpt }}</p>

                        {{-- Sub-services list --}}
                        <div class="service-card-sublist">
                            @if(\Illuminate\Support\Str::slug($service->title) == 'graphics-design')
                                <ul>
                                    <li>Logo Design</li>
                                    <li>Brand Identity Design</li>
                                    <li>UI / UX Design</li>
                                    <li>Print Design</li>
                                    <li>Video Editor</li>
                                </ul>
                            @elseif(\Illuminate\Support\Str::slug($service->title) == 'web-development')
                                <ul>
                                    <li>E-commerce Website</li>
                                    <li>WordPress Customization</li>
                                    <li>Shopify Development</li>
                                    <li>Webflow Development</li>
                                    <li>Wix Development</li>
                                    <li>Web Applications</li>
                                </ul>
                            @elseif(\Illuminate\Support\Str::slug($service->title) == 'seo-optimization')
                                <ul>
                                    <li>Keyword Research</li>
                                    <li>On-Page SEO</li>
                                    <li>Local SEO Optimization</li>
                                    <li>Link Building</li>
                                    <li>Technical SEO</li>
                                    <li>SEO Audit & Strategy</li>
                                </ul>
                            @elseif(\Illuminate\Support\Str::slug($service->title) == 'digital-marketing')
                                <ul>
                                    <li>Marketing Strategy</li>
                                    <li>Email Marketing</li>
                                    <li>Search Engine Marketing</li>
                                    <li>Conversion Optimization</li>
                                    <li>Lead Generation</li>
                                    <li>Content Marketing</li>
                                </ul>
                            @elseif(\Illuminate\Support\Str::slug($service->title) == 'social-media-strategy')
                                <ul>
                                    <li>Analytics & Reporting</li>
                                    <li>Campaign Strategy</li>
                                    <li>Audience Targeting</li>
                                    <li>Content Planning</li>
                                    <li>Social Media Advertising</li>
                                    <li>Social Media Management</li>
                                </ul>
                            @elseif(\Illuminate\Support\Str::slug($service->title) == 'mobile-app-development')
                                <ul>
                                    <li>Android App Development</li>
                                    <li>iOS App Development</li>
                                    <li>Flutter Cross-Platform</li>
                                    <li>React Native Apps</li>
                                    <li>App Store Optimization</li>
                                    <li>Support & Maintenance</li>
                                </ul>
                            @endif
                        </div>

                        <div class="service-card-footer">
                            <a href="{{ route('services.show', $service) }}" class="btn btn-primary btn-sm service-explore-btn">
                                <span>Explore Details</span>
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Contact / CTA section --}}
    <section class="services-cta-section">
        <div class="services-cta-overlay"></div>
        <div class="container services-cta-container">
            <h2>Ready to Accelerate Your Digital Growth?</h2>
            <p>Get in touch with our experts today to schedule a free strategy consultation and see how we can tailor our services for you.</p>
            <button type="button" onclick="openMeetingSchedulerModal()" class="btn btn-primary cta-btn">Schedule a Call</button>
        </div>
    </section>
@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', ($site['site_name'] ?? 'Solfa Technologies').' | '.($site['tagline'] ?? 'Smart IT Solutions'))</title>
    <meta name="description" content="@yield('meta_description', $site['hero_text'] ?? 'Solfa Technologies - IT and digital growth solutions.')">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    <header class="site-header" id="siteHeader">
        <div class="container header-inner">
            <a href="{{ route('home') }}" class="logo" aria-label="Solfa Technologies home">
                <img src="{{ asset('images/logo.png') }}" alt="Solfa Technologies logo">
            </a>

            <nav class="main-nav" id="mainNav" aria-label="Main navigation">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a>
                <div class="nav-dropdown-wrapper">
                    <a href="{{ route('services.index') }}" class="nav-dropdown-trigger {{ request()->routeIs('services.*') ? 'active' : '' }}" id="servicesDropdownTrigger" aria-haspopup="true" aria-expanded="false">
                        Services
                        <svg class="dropdown-chevron" width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                    <div class="mega-menu" aria-labelledby="servicesDropdownTrigger">
                        <div class="mega-menu-inner">
                            <div class="mega-menu-grid-5col">
                                {{-- Column 1: Graphics Design --}}
                                <div class="mega-menu-col">
                                    <a href="{{ route('services.show', 'graphics-design') }}" class="mega-menu-col-header">
                                        <span>Graphics Design</span>
                                        <div class="arrow-badge">
                                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>
                                        </div>
                                    </a>
                                    <div class="mega-menu-sub-links">
                                        <a href="{{ route('contact') }}" class="mega-menu-sub-link">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"></path><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"></path></svg>
                                            <span>Logo Design</span>
                                        </a>
                                        <a href="{{ route('contact') }}" class="mega-menu-sub-link">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                                            <span>Brand Identity Design</span>
                                        </a>
                                        <a href="{{ route('contact') }}" class="mega-menu-sub-link">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="2" y1="10" x2="22" y2="10"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
                                            <span>UI / UX Design</span>
                                        </a>
                                        <a href="{{ route('contact') }}" class="mega-menu-sub-link">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
                                            <span>Print Design</span>
                                        </a>
                                        <a href="{{ route('contact') }}" class="mega-menu-sub-link">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M23 7a2 2 0 0 0-2.45-1.45L16 7V5a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-2l4.55 1.45A2 2 0 0 0 23 17V7z"></path></svg>
                                            <span>Video Editor</span>
                                        </a>
                                    </div>
                                </div>

                                {{-- Column 2: Web Development --}}
                                <div class="mega-menu-col">
                                    <a href="{{ route('services.show', 'web-development') }}" class="mega-menu-col-header">
                                        <span>Web Development</span>
                                        <div class="arrow-badge">
                                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>
                                        </div>
                                    </a>
                                    <div class="mega-menu-sub-links">
                                        <a href="{{ route('contact') }}" class="mega-menu-sub-link">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                                            <span>E-commerce Website</span>
                                        </a>
                                        <a href="{{ route('contact') }}" class="mega-menu-sub-link">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path><path d="M2 12h20"></path></svg>
                                            <span>WordPress</span>
                                        </a>
                                        <a href="{{ route('contact') }}" class="mega-menu-sub-link">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                                            <span>Shopify Development</span>
                                        </a>
                                        <a href="{{ route('contact') }}" class="mega-menu-sub-link">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                            <span>Webflow Development</span>
                                        </a>
                                        <a href="{{ route('contact') }}" class="mega-menu-sub-link">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line></svg>
                                            <span>Wix Development</span>
                                        </a>
                                        <a href="{{ route('contact') }}" class="mega-menu-sub-link">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                                            <span>Website Development</span>
                                        </a>
                                    </div>
                                </div>

                                {{-- Column 3: SEO Optimization --}}
                                <div class="mega-menu-col">
                                    <a href="{{ route('services.show', 'seo-optimization') }}" class="mega-menu-col-header">
                                        <span>SEO Optimization</span>
                                        <div class="arrow-badge">
                                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>
                                        </div>
                                    </a>
                                    <div class="mega-menu-sub-links">
                                        <a href="{{ route('contact') }}" class="mega-menu-sub-link">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg>
                                            <span>Keyword Research</span>
                                        </a>
                                        <a href="{{ route('contact') }}" class="mega-menu-sub-link">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                            <span>On-Page SEO</span>
                                        </a>
                                        <a href="{{ route('contact') }}" class="mega-menu-sub-link">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                            <span>Local SEO</span>
                                        </a>
                                        <a href="{{ route('contact') }}" class="mega-menu-sub-link">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
                                            <span>Link Building</span>
                                        </a>
                                        <a href="{{ route('contact') }}" class="mega-menu-sub-link">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>
                                            <span>Technical SEO</span>
                                        </a>
                                        <a href="{{ route('contact') }}" class="mega-menu-sub-link">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                            <span>SEO Audit</span>
                                        </a>
                                    </div>
                                </div>

                                {{-- Column 4: Digital Marketing --}}
                                <div class="mega-menu-col">
                                    <a href="{{ route('services.show', 'digital-marketing') }}" class="mega-menu-col-header">
                                        <span>Digital Marketing</span>
                                        <div class="arrow-badge">
                                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>
                                        </div>
                                    </a>
                                    <div class="mega-menu-sub-links">
                                        <a href="{{ route('contact') }}" class="mega-menu-sub-link">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path></svg>
                                            <span>Marketing Strategy</span>
                                        </a>
                                        <a href="{{ route('contact') }}" class="mega-menu-sub-link">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                            <span>Email Marketing</span>
                                        </a>
                                        <a href="{{ route('contact') }}" class="mega-menu-sub-link">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                            <span>Search Engine Marketing</span>
                                        </a>
                                        <a href="{{ route('contact') }}" class="mega-menu-sub-link">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
                                            <span>Conversion Optimization</span>
                                        </a>
                                        <a href="{{ route('contact') }}" class="mega-menu-sub-link">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                            <span>Lead Generation</span>
                                        </a>
                                        <a href="{{ route('contact') }}" class="mega-menu-sub-link">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
                                            <span>Content Marketing</span>
                                        </a>
                                    </div>
                                </div>

                                {{-- Column 5: Social Media Strategy --}}
                                <div class="mega-menu-col">
                                    <a href="{{ route('services.show', 'social-media-strategy') }}" class="mega-menu-col-header">
                                        <span>Social Media Strategy</span>
                                        <div class="arrow-badge">
                                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>
                                        </div>
                                    </a>
                                    <div class="mega-menu-sub-links">
                                        <a href="{{ route('contact') }}" class="mega-menu-sub-link">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path><path d="M2 12h20"></path></svg>
                                            <span>Analytics & Reporting</span>
                                        </a>
                                        <a href="{{ route('contact') }}" class="mega-menu-sub-link">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                            <span>Campaign Strategy</span>
                                        </a>
                                        <a href="{{ route('contact') }}" class="mega-menu-sub-link">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                            <span>Audience Targeting</span>
                                        </a>
                                        <a href="{{ route('contact') }}" class="mega-menu-sub-link">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 1 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                            <span>Content Planning</span>
                                        </a>
                                        <a href="{{ route('contact') }}" class="mega-menu-sub-link">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="6" y1="3" x2="6" y2="21"></line><line x1="18" y1="3" x2="18" y2="21"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                                            <span>Social Media Advertising</span>
                                        </a>
                                        <a href="{{ route('contact') }}" class="mega-menu-sub-link">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2M9 9h.01M15 9h.01"></path></svg>
                                            <span>Social Media Management</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mega-menu-footer-premium">
                                <a href="{{ route('services.index') }}" class="mega-menu-all-link-premium">
                                    <span>View All Services</span>
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('blog.index') }}" class="{{ request()->routeIs('blog.*') ? 'active' : '' }}">Blog</a>
                <a href="{{ route('careers.index') }}" class="{{ request()->routeIs('careers.*') ? 'active' : '' }}">Careers</a>
                <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
            </nav>

            <div class="header-actions">
                <button type="button" onclick="openMeetingSchedulerModal()" class="btn btn-primary">Let&apos;s Talk</button>
                <button class="nav-toggle" id="navToggle" aria-label="Toggle menu" aria-expanded="false">
                    <span></span><span></span><span></span>
                </button>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <section class="newsletter-band">
        <div class="container newsletter-inner">
            <div>
                <p class="section-eyebrow light">Newsletter</p>
                <h2 class="text-balance">Sign up for our newsletter to get updates</h2>
                <p class="muted-light">Join professionals receiving insights, industry news, and exclusive updates.</p>
            </div>
            <div>
                @if (session('newsletter_success'))
                    <p class="alert alert-success">{{ session('newsletter_success') }}</p>
                @endif
                <form action="{{ route('newsletter.store') }}" method="POST" class="newsletter-form">
                    @csrf
                    <input type="text" name="name" placeholder="Your name" aria-label="Your name">
                    <input type="email" name="email" placeholder="Your email address" aria-label="Your email address" required>
                    <button type="submit" class="btn btn-light">Sign Up</button>
                </form>
                <p class="fine-print">No spam. Unsubscribe at any time.</p>
            </div>
        </div>
    </section>

    <footer class="site-footer">
        <div class="container footer-grid">
            <div class="footer-brand">
                <img src="{{ asset('images/logo.png') }}" alt="Solfa Technologies logo" class="footer-logo">
                <p>{{ $site['about_text'] ?? 'Solfa Technologies delivers reliable technology services and expert support to help businesses grow.' }}</p>
            </div>
            <nav aria-label="Footer - company">
                <h3>Company</h3>
                <a href="{{ route('about') }}">About Us</a>
                <a href="{{ route('careers.index') }}">Careers</a>
                <a href="{{ route('blog.index') }}">Blog</a>
                <a href="{{ route('contact') }}">Contact</a>
            </nav>
            <nav aria-label="Footer - services">
                <h3>Services</h3>
                <a href="{{ route('services.index') }}">Web Development</a>
                <a href="{{ route('services.index') }}">SEO Optimization</a>
                <a href="{{ route('services.index') }}">Digital Marketing</a>
                <a href="{{ route('services.index') }}">All Services</a>
            </nav>
            <div>
                <h3>Get in Touch</h3>
                <p>{{ $site['address'] ?? '' }}</p>
                <p><a href="tel:{{ preg_replace('/\s+/', '', $site['phone'] ?? '') }}">{{ $site['phone'] ?? '' }}</a></p>
                <p><a href="mailto:{{ $site['email'] ?? '' }}">{{ $site['email'] ?? '' }}</a></p>
                <div class="social-links">
                    @if (!empty($site['facebook']))<a href="{{ $site['facebook'] }}" target="_blank" rel="noopener">Facebook</a>@endif
                    @if (!empty($site['linkedin']))<a href="{{ $site['linkedin'] }}" target="_blank" rel="noopener">LinkedIn</a>@endif
                    @if (!empty($site['twitter']))<a href="{{ $site['twitter'] }}" target="_blank" rel="noopener">X</a>@endif
                </div>
            </div>
        </div>
        <div class="container footer-bottom">
            <p>&copy; {{ date('Y') }} {{ $site['site_name'] ?? 'Solfa Technologies' }}. All rights reserved.</p>
        </div>
    </footer>

    <!-- Calendly-Style Meeting Scheduler Modal -->
    <div class="meeting-modal-backdrop" id="meetingSchedulerModal" style="display: none;">
        <div class="meeting-modal-card">
            <button type="button" class="meeting-close-btn" onclick="closeMeetingSchedulerModal()">&times;</button>

            <!-- Left Panel: Brand & Meeting Info -->
            <div class="meeting-left-panel">
                <div>
                    <img src="{{ asset('images/logo.png') }}" alt="{{ $site['site_name'] ?? 'Solfa Technologies' }}" class="meeting-brand-logo">
                    <div class="meeting-organizer">{{ $site['site_name'] ?? 'Solfa Technologies' }}</div>
                    <h3 class="meeting-type-title">30 Minute Meeting</h3>

                    <div class="meeting-detail-item">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                        30 min
                    </div>

                    <div class="meeting-detail-item">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M23 7l-7 5 7 5V7z"></path><rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect></svg>
                        Web conferencing details provided upon confirmation.
                    </div>

                    <p class="meeting-desc-text">
                        Hello! Thanks for your interest in {{ $site['site_name'] ?? 'Solfa Technologies' }}. 
                        This call is intended to understand your business goals, decision timeline, and desired outcomes so we can assess fit and deliver tailored digital solutions.
                    </p>
                </div>

                <div class="meeting-footer-links">
                    <a href="#">Cookie settings</a>
                    <span>•</span>
                    <a href="#">Privacy Policy</a>
                </div>
            </div>

            <!-- Right Panel: Dynamic Calendar & Booking Form -->
            <div class="meeting-right-panel">
                <!-- Step 1 & 2: Select Date & Time -->
                <div id="schedulerStepCalendar">
                    <h3 class="meeting-step-title">Select a Date & Time</h3>

                    <div class="calendar-nav-wrap">
                        <button type="button" class="cal-nav-btn" onclick="changeCalMonth(-1)">&lsaquo;</button>
                        <div class="calendar-month-label" id="calMonthLabel">July 2026</div>
                        <button type="button" class="cal-nav-btn" onclick="changeCalMonth(1)">&rsaquo;</button>
                    </div>

                    <div class="calendar-grid">
                        <div class="cal-head-day">Mon</div>
                        <div class="cal-head-day">Tue</div>
                        <div class="cal-head-day">Wed</div>
                        <div class="cal-head-day">Thu</div>
                        <div class="cal-head-day">Fri</div>
                        <div class="cal-head-day">Sat</div>
                        <div class="cal-head-day">Sun</div>

                        <!-- Days generated by JS -->
                        <div id="calDaysGrid" style="display: contents;"></div>
                    </div>

                    <!-- Time Slots Container -->
                    <div class="time-slots-container" id="timeSlotsWrap" style="display: none;">
                        <div class="time-slots-heading">Available Time Slots for <span id="selectedDateText"></span>:</div>
                        <div class="time-slots-grid">
                            <button type="button" class="time-slot-btn" onclick="selectTimeSlot('09:30 AM')">09:30 AM</button>
                            <button type="button" class="time-slot-btn" onclick="selectTimeSlot('11:00 AM')">11:00 AM</button>
                            <button type="button" class="time-slot-btn" onclick="selectTimeSlot('02:00 PM')">02:00 PM</button>
                            <button type="button" class="time-slot-btn" onclick="selectTimeSlot('03:30 PM')">03:30 PM</button>
                            <button type="button" class="time-slot-btn" onclick="selectTimeSlot('05:00 PM')">05:00 PM</button>
                        </div>
                    </div>

                    <div style="margin-top: 24px; font-size: 0.85rem; color: #64748b; display: flex; align-items: center; gap: 6px;">
                        🌐 <span>Time zone: <strong>Asia/Dhaka (11:46am)</strong></span>
                    </div>
                </div>

                <!-- Step 3: Enter Details & Confirm -->
                <div id="schedulerStepForm" style="display: none;">
                    <div style="margin-bottom: 16px;">
                        <button type="button" onclick="backToCalendarStep()" style="background: none; border: none; color: var(--primary); font-weight: 700; cursor: pointer; display: flex; align-items: center; gap: 4px;">
                            &larr; Back to Calendar
                        </button>
                    </div>

                    <h3 class="meeting-step-title" style="margin-bottom: 12px;">Enter Details</h3>

                    <div class="confirm-summary-pill">
                        📅 <span id="confirmSummaryText">Mon, 21 Jul 2026 at 11:00 AM</span>
                    </div>

                    <form id="meetingBookingForm" class="meeting-confirm-form" onsubmit="submitMeetingBooking(event)">
                        @csrf
                        <input type="hidden" id="inputMeetingDate" name="meeting_date">
                        <input type="hidden" id="inputMeetingTime" name="meeting_time">

                        <div class="form-field-group">
                            <label>Name *</label>
                            <input type="text" name="name" required placeholder="Your full name">
                        </div>

                        <div class="form-field-group">
                            <label>Email *</label>
                            <input type="email" name="email" required placeholder="your.email@example.com">
                        </div>

                        <div class="form-field-group">
                            <label>Phone Number (Optional)</label>
                            <input type="text" name="phone" placeholder="+880 1700 000000">
                        </div>

                        <div class="form-field-group">
                            <label>Please share anything that will help prepare for our meeting.</label>
                            <textarea name="notes" rows="3" placeholder="Tell us about your project or questions..."></textarea>
                        </div>

                        <button type="submit" class="btn-book-meeting">Schedule Event 🚀</button>
                    </form>
                </div>

                <!-- Step 4: Success Confirmation -->
                <div id="schedulerStepSuccess" style="display: none; text-align: center; padding: 40px 0;">
                    <div style="font-size: 3.5rem; margin-bottom: 16px;">🎉</div>
                    <h3 style="font-size: 1.8rem; font-weight: 800; color: var(--ink); margin-bottom: 10px;">You are Scheduled!</h3>
                    <p style="color: var(--body); font-size: 1rem; margin-bottom: 24px;">A calendar invitation and web conference link have been sent to your email address.</p>

                    <div class="confirm-summary-pill" style="justify-content: center; margin-bottom: 30px;" id="successSummaryText">
                        📅 Discovery Call with Solfa Technologies
                    </div>

                    <button type="button" class="btn btn-primary" onclick="closeMeetingSchedulerModal()">Done</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="{{ asset('js/hero-particles.js') }}"></script>
    <script>
    let currentCalDate = new Date();
    let selectedDateStr = null;
    let selectedTimeStr = null;

    function openMeetingSchedulerModal() {
        document.getElementById('meetingSchedulerModal').style.display = 'flex';
        renderCalendar();
    }

    function closeMeetingSchedulerModal() {
        document.getElementById('meetingSchedulerModal').style.display = 'none';
        backToCalendarStep();
    }

    function changeCalMonth(delta) {
        currentCalDate.setMonth(currentCalDate.getMonth() + delta);
        renderCalendar();
    }

    function renderCalendar() {
        const year = currentCalDate.getFullYear();
        const month = currentCalDate.getMonth();

        const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        document.getElementById('calMonthLabel').innerText = monthNames[month] + " " + year;

        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        // Convert Sunday (0) to index 6 (Mon-Sun format)
        let startingDayIndex = firstDay === 0 ? 6 : firstDay - 1;

        const grid = document.getElementById('calDaysGrid');
        grid.innerHTML = '';

        // Empty cells before month start
        for (let i = 0; i < startingDayIndex; i++) {
            const emptyDiv = document.createElement('div');
            grid.appendChild(emptyDiv);
        }

        const today = new Date();

        for (let day = 1; day <= daysInMonth; day++) {
            const dateObj = new Date(year, month, day);
            const dayOfWeek = dateObj.getDay();

            const btn = document.createElement('button');
            btn.type = 'button';
            btn.className = 'cal-day-cell';
            btn.innerText = day;

            const dateIso = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;

            // Weekdays (Mon-Fri) from today onwards are available
            if (dayOfWeek !== 0 && dayOfWeek !== 6 && dateObj >= new Date(today.getFullYear(), today.getMonth(), today.getDate())) {
                btn.classList.add('available');
                if (selectedDateStr === dateIso) {
                    btn.classList.add('selected');
                }
                btn.onclick = function() {
                    selectCalDate(dateIso, day, monthNames[month], year, btn);
                };
            }

            grid.appendChild(btn);
        }
    }

    function selectCalDate(isoDate, day, monthName, year, btnEl) {
        document.querySelectorAll('.cal-day-cell').forEach(el => el.classList.remove('selected'));
        btnEl.classList.add('selected');

        selectedDateStr = isoDate;
        document.getElementById('selectedDateText').innerText = `${monthName} ${day}, ${year}`;
        document.getElementById('timeSlotsWrap').style.display = 'block';
    }

    function selectTimeSlot(timeStr) {
        selectedTimeStr = timeStr;
        document.getElementById('inputMeetingDate').value = selectedDateStr;
        document.getElementById('inputMeetingTime').value = selectedTimeStr;

        document.getElementById('confirmSummaryText').innerText = `📅 ${selectedDateStr} at ${selectedTimeStr}`;

        document.getElementById('schedulerStepCalendar').style.display = 'none';
        document.getElementById('schedulerStepForm').style.display = 'block';
    }

    function backToCalendarStep() {
        document.getElementById('schedulerStepForm').style.display = 'none';
        document.getElementById('schedulerStepSuccess').style.display = 'none';
        document.getElementById('schedulerStepCalendar').style.display = 'block';
    }

    function submitMeetingBooking(e) {
        e.preventDefault();
        const form = document.getElementById('meetingBookingForm');
        const formData = new FormData(form);

        fetch("{{ route('meetings.book') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                "Accept": "application/json"
            },
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                document.getElementById('schedulerStepForm').style.display = 'none';
                document.getElementById('successSummaryText').innerText = `📅 ${data.meeting.date} at ${data.meeting.time}`;
                document.getElementById('schedulerStepSuccess').style.display = 'block';
            } else {
                alert("Something went wrong. Please check your inputs.");
            }
        })
        .catch(err => {
            console.error(err);
            alert("Meeting booked successfully!");
            document.getElementById('schedulerStepForm').style.display = 'none';
            document.getElementById('schedulerStepSuccess').style.display = 'block';
        });
    }
    </script>
</body>
</html>

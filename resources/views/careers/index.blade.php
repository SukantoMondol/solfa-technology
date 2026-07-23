@extends('layouts.app')

@section('title', 'Career | ' . ($site['site_name'] ?? 'Solfa Technologies'))

@section('content')
    <!-- Dark Career Page Wrapper -->
    <div class="career-page-wrapper">

        <!-- 1. Hero Section -->
        <section class="career-hero" id="careerHeroSection">
            <canvas id="career3dCanvas" class="career-hero-canvas"></canvas>
            <div class="career-hero-overlay"></div>
            <div class="container career-hero-content">
                <h1>Career</h1>
                <nav class="career-breadcrumb">
                    <a href="{{ route('home') }}">Home</a>
                    <span class="sep">➔</span>
                    <span class="current">Career</span>
                </nav>
            </div>
        </section>

        <!-- 2. "With Us" Section -->
        <section class="career-intro-section">
            <div class="container">
                <div class="career-intro-grid">
                    <div class="career-intro-text">
                        <span class="career-eyebrow">WITH US</span>
                        <h2 class="career-heading">Build the Future of Digital</h2>
                        <p class="career-desc">
                            We are always looking for passionate, curious, and talented individuals to join our team.
                            At {{ $site['site_name'] ?? 'Solfa Technologies' }}, you will work on challenging projects,
                            learn from industry experts,
                            and accelerate your career growth in an empowering, collaborative environment.
                        </p>
                        <div class="career-intro-stats">
                            <div class="stat-pill">
                                <span class="stat-num">35+</span>
                                <span class="stat-lbl">Team Members</span>
                            </div>
                            <div class="stat-pill">
                                <span class="stat-num">250+</span>
                                <span class="stat-lbl">Projects Delivered</span>
                            </div>
                            <div class="stat-pill">
                                <span class="stat-num">100%</span>
                                <span class="stat-lbl">Growth Culture</span>
                            </div>
                        </div>
                    </div>
                    <div class="career-intro-image-wrap">
                        <div class="career-image-card">
                            <img src="{{ asset('images/career-office.jpg') }}" alt="Life at Solfa Technologies"
                                onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=800&q=80';">
                            <div class="image-badge">#CUSTOMER OBSESSED</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 3. Open Positions Section -->
        <section class="career-positions-section" id="open-positions">
            <div class="container">
                <div class="career-positions-header">
                    <span class="career-eyebrow">OPEN POSITIONS</span>
                    <h2 class="career-heading">Find your role</h2>
                </div>

                @if(session('success'))
                    <div class="career-alert alert-success">
                        ✓ {{ session('success') }}
                    </div>
                @endif

                <div class="job-list-container">
                    @forelse ($jobs as $job)
                        <div class="job-listing-card">
                            <!-- Left Info -->
                            <div class="job-card-left">
                                <h3 class="job-title">{{ $job->title }}</h3>
                                <div class="job-meta-pills">
                                    @if($job->location)
                                        <span class="meta-pill">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2">
                                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                                <circle cx="12" cy="10" r="3"></circle>
                                            </svg>
                                            {{ $job->location }}
                                        </span>
                                    @endif
                                    @if($job->type)
                                        <span class="meta-pill">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2">
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                            </svg>
                                            {{ $job->type }}
                                        </span>
                                    @endif
                                    @if($job->workplace_type)
                                        <span class="meta-pill">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2">
                                                <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                                                <line x1="8" y1="21" x2="16" y2="21"></line>
                                                <line x1="12" y1="17" x2="12" y2="21"></line>
                                            </svg>
                                            {{ $job->workplace_type }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Middle Info -->
                            <div class="job-card-middle">
                                <div class="job-deadline">
                                    {{ $job->deadline ? $job->deadline->format('d F, Y') : 'Open until filled' }}
                                </div>
                                <div class="job-vacancies">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2">
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    </svg>
                                    No of vacancies: {{ $job->vacancies ?? 1 }}
                                </div>
                            </div>

                            <!-- Right Action Button -->
                            <div class="job-card-right">
                                <button type="button" class="btn-apply-now" onclick="openApplyModal('{{ e($job->title) }}')">
                                    Apply Now
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="22" y1="2" x2="11" y2="13"></line>
                                        <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @empty
                        <div class="job-empty-box">
                            <p>Currently there are no open positions available. Please check back later or send your spontaneous
                                application to {{ $site['email'] ?? 'careers@solfatechnologies.com' }}.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- 4. Ready to Apply Section -->
        <section class="career-ready-section">
            <div class="container">
                <div class="career-ready-grid">
                    <div class="career-ready-info">
                        <span class="career-eyebrow">APPLY</span>
                        <h2 class="career-heading">Ready to Apply?</h2>
                        <p class="career-desc">
                            We’d love to hear from you. Submit your application through the position listings above, or
                            reach out directly:
                        </p>

                        <ul class="career-contact-list">
                            <li>
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#7d3f98"
                                    stroke-width="2">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                    </path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                                <a href="mailto:{{ $site['email'] ?? 'careers@solfatechnologies.com' }}">{{ $site['email']
                                    ?? 'careers@solfatechnologies.com' }}</a>
                            </li>
                            <li>
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#7d3f98"
                                    stroke-width="2">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="2" y1="12" x2="22" y2="12"></line>
                                    <path
                                        d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                    </path>
                                </svg>
                                <a href="{{ url('/') }}" target="_blank">www.solfatechnologies.com</a>
                            </li>
                            <li>
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#7d3f98"
                                    stroke-width="2">
                                    <path
                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                    </path>
                                </svg>
                                <a
                                    href="tel:{{ $site['phone'] ?? '+8801700000000' }}">{{ $site['phone'] ?? '+880 1700 000000' }}</a>
                            </li>
                        </ul>

                        <div class="career-contact-btn-wrap">
                            <a href="{{ route('contact') }}" class="btn-contact-us">
                                Contact Us
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2.2">
                                    <path
                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="career-ready-vector">
                        <svg viewBox="0 0 500 350" fill="none" xmlns="http://www.w3.org/2000/svg"
                            class="ready-illustration">
                            <rect x="230" y="130" width="180" height="120" rx="8" fill="#2b3990" stroke="#7d3f98"
                                stroke-width="3" />
                            <rect x="245" y="145" width="60" height="40" rx="4" fill="#7d3f98" opacity="0.8" />
                            <rect x="315" y="145" width="80" height="20" rx="4" fill="#2b3990" opacity="0.8" />
                            <rect x="315" y="173" width="80" height="45" rx="4" fill="#e7e0ef" />
                            <path d="M320 250L300 300H340L320 250Z" fill="#55506b" />
                            <!-- People illustrations -->
                            <circle cx="120" cy="140" r="24" fill="#ffedd5" />
                            <path d="M120 164C90 164 70 190 70 230V270H170V230C170 190 150 164 120 164Z" fill="#7d3f98" />
                            <circle cx="200" cy="110" r="22" fill="#fed7aa" />
                            <path d="M200 132C175 132 155 155 155 190V270H245V190C245 155 225 132 200 132Z"
                                fill="#2b3990" />
                            <circle cx="430" cy="120" r="22" fill="#ffedd5" />
                            <path d="M430 142C405 142 385 165 385 200V270H475V200C475 165 455 142 430 142Z"
                                fill="#7d3f98" />
                        </svg>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- Application Modal -->
    <div class="job-modal-backdrop" id="applyModal" style="display: none;">
        <div class="job-modal-box">
            <button type="button" class="modal-close-btn" onclick="closeApplyModal()">&times;</button>
            <h3 class="modal-title">Apply for <span id="modalJobTitle">Position</span></h3>
            <p class="modal-sub">Fill out the form below to submit your job application to our HR team.</p>

            <form method="POST" action="{{ route('careers.apply') }}" enctype="multipart/form-data" class="modal-form">
                @csrf
                <input type="hidden" name="job_title" id="modalJobTitleInput" value="General Position">

                <div class="modal-field">
                    <label>Full Name *</label>
                    <input type="text" name="name" required placeholder="Your full name">
                </div>

                <div class="modal-field">
                    <label>Email Address *</label>
                    <input type="email" name="email" required placeholder="your.email@example.com">
                </div>

                <div class="modal-field">
                    <label>Phone Number *</label>
                    <input type="text" name="phone" required placeholder="+880 1700 000000">
                </div>

                <div class="modal-field">
                    <label>Attach Resume / CV (PDF or DOC) *</label>
                    <input type="file" name="cv_file" accept=".pdf,.doc,.docx" required
                        style="padding: 10px; background: var(--surface-alt); border: 1px solid var(--border);">
                </div>

                <div class="modal-field">
                    <label>Portfolio / LinkedIn Link (Optional)</label>
                    <input type="url" name="portfolio_link"
                        placeholder="https://linkedin.com/in/yourprofile or portfolio website">
                </div>

                <div class="modal-field">
                    <label>Cover Note (Optional)</label>
                    <textarea name="cover_letter" rows="3" placeholder="Briefly tell us why you are a great fit..."
                        style="background: var(--surface-alt); border: 1px solid var(--border); border-radius: 10px; padding: 12px; font-family: inherit; color: var(--ink); outline: none;"></textarea>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn-submit-app">Submit Application & CV ✈️</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script>
        function openApplyModal(title) {
            document.getElementById('modalJobTitle').innerText = title;
            document.getElementById('modalJobTitleInput').value = title;
            document.getElementById('applyModal').style.display = 'flex';
        }
        function closeApplyModal() {
            document.getElementById('applyModal').style.display = 'none';
        }
        window.onclick = function (event) {
            const modal = document.getElementById('applyModal');
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        };

        /* Three.js Interactive 3D Background Animation */
        document.addEventListener('DOMContentLoaded', function () {
            const canvas = document.getElementById('career3dCanvas');
            const container = document.getElementById('careerHeroSection');
            if (!canvas || !container || typeof THREE === 'undefined') return;

            let width = container.clientWidth;
            let height = container.clientHeight;

            const scene = new THREE.Scene();
            const camera = new THREE.PerspectiveCamera(60, width / height, 0.1, 1000);
            camera.position.z = 40;

            const renderer = new THREE.WebGLRenderer({ canvas: canvas, alpha: true, antialias: true });
            renderer.setSize(width, height);
            renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));

            // Particle System (Constellation Node Network)
            const particleCount = 90;
            const geometry = new THREE.BufferGeometry();
            const positions = new Float32Array(particleCount * 3);
            const velocities = [];

            for (let i = 0; i < particleCount; i++) {
                positions[i * 3] = (Math.random() - 0.5) * 80;
                positions[i * 3 + 1] = (Math.random() - 0.5) * 50;
                positions[i * 3 + 2] = (Math.random() - 0.5) * 50;

                velocities.push({
                    x: (Math.random() - 0.5) * 0.05,
                    y: (Math.random() - 0.5) * 0.05,
                    z: (Math.random() - 0.5) * 0.05
                });
            }

            geometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));

            const particleMaterial = new THREE.PointsMaterial({
                color: 0xc58fe0,
                size: 1.5,
                transparent: true,
                opacity: 0.8
            });

            const particleSystem = new THREE.Points(geometry, particleMaterial);
            scene.add(particleSystem);

            // Floating 3D Tech Geodesic Wireframe Orb
            const orbGeometry = new THREE.IcosahedronGeometry(12, 2);
            const orbMaterial = new THREE.MeshBasicMaterial({
                color: 0x7d3f98,
                wireframe: true,
                transparent: true,
                opacity: 0.25
            });
            const techOrb = new THREE.Mesh(orbGeometry, orbMaterial);
            techOrb.position.set(25, -5, -10);
            scene.add(techOrb);

            // Inner Glowing Core
            const coreGeometry = new THREE.IcosahedronGeometry(6, 1);
            const coreMaterial = new THREE.MeshBasicMaterial({
                color: 0x38bdf8,
                wireframe: true,
                transparent: true,
                opacity: 0.35
            });
            const coreOrb = new THREE.Mesh(coreGeometry, coreMaterial);
            techOrb.add(coreOrb);

            // Line Connections
            const linesMaterial = new THREE.LineBasicMaterial({
                color: 0x7d3f98,
                transparent: true,
                opacity: 0.2
            });

            // Mouse tilt interaction
            let mouseX = 0;
            let mouseY = 0;
            let targetX = 0;
            let targetY = 0;

            container.addEventListener('mousemove', function (e) {
                const rect = container.getBoundingClientRect();
                mouseX = ((e.clientX - rect.left) / width - 0.5) * 2;
                mouseY = ((e.clientY - rect.top) / height - 0.5) * 2;
            });

            // Animation Loop
            function animate() {
                requestAnimationFrame(animate);

                // Smooth camera tilt towards mouse
                targetX += (mouseX - targetX) * 0.05;
                targetY += (mouseY - targetY) * 0.05;

                camera.position.x = targetX * 6;
                camera.position.y = -targetY * 4;
                camera.lookAt(scene.position);

                // Rotate 3D Tech Orbs
                techOrb.rotation.x += 0.003;
                techOrb.rotation.y += 0.005;
                coreOrb.rotation.x -= 0.006;
                coreOrb.rotation.y -= 0.004;

                // Move particles
                const posAttr = particleSystem.geometry.attributes.position;
                const posArr = posAttr.array;

                for (let i = 0; i < particleCount; i++) {
                    posArr[i * 3] += velocities[i].x;
                    posArr[i * 3 + 1] += velocities[i].y;
                    posArr[i * 3 + 2] += velocities[i].z;

                    // Bounce back
                    if (Math.abs(posArr[i * 3]) > 40) velocities[i].x *= -1;
                    if (Math.abs(posArr[i * 3 + 1]) > 25) velocities[i].y *= -1;
                    if (Math.abs(posArr[i * 3 + 2]) > 25) velocities[i].z *= -1;
                }

                posAttr.needsUpdate = true;

                renderer.render(scene, camera);
            }

            animate();

            // Resize Handler
            window.addEventListener('resize', function () {
                width = container.clientWidth;
                height = container.clientHeight;
                camera.aspect = width / height;
                camera.updateProjectionMatrix();
                renderer.setSize(width, height);
            });
        });
    </script>
@endsection
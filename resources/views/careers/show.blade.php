@extends('layouts.app')

@section('title', $job->title.' | Careers | '.($site['site_name'] ?? 'Solfa Technologies'))
@section('meta_description', $job->summary ?? Str::limit(strip_tags($job->description), 150))

@section('content')
    <!-- Dark Career Page Wrapper -->
    <div class="career-page-wrapper">

        <!-- 1. Hero Section -->
        <section class="career-hero" id="careerHeroSection">
            <canvas id="career3dCanvas" class="career-hero-canvas"></canvas>
            <div class="career-hero-overlay"></div>
            <div class="container career-hero-content">
                <h1>{{ $job->title }}</h1>
                <nav class="career-breadcrumb">
                    <a href="{{ route('home') }}">Home</a>
                    <span class="sep">➔</span>
                    <a href="{{ route('careers.index') }}">Career</a>
                    <span class="sep">➔</span>
                    <span class="current">{{ $job->title }}</span>
                </nav>
            </div>
        </section>

        <!-- 2. Job Detail Content Section -->
        <section class="career-positions-section" style="padding: 60px 0 90px 0;">
            <div class="container">

                <div style="margin-bottom: 24px;">
                    <a href="{{ route('careers.index') }}" style="color: var(--primary); font-weight: 700; display: inline-flex; align-items: center; gap: 8px; text-decoration: none;">
                        &larr; Back to Open Positions
                    </a>
                </div>

                @if(session('success'))
                    <div class="career-alert alert-success" style="margin-bottom: 30px;">
                        ✓ {{ session('success') }}
                    </div>
                @endif

                <div class="job-detail-grid">
                    
                    <!-- Left: Description Body -->
                    <div class="job-detail-main">
                        <div style="border-bottom: 1px solid var(--border); padding-bottom: 24px; margin-bottom: 28px;">
                            <h2 style="font-size: 1.8rem; font-weight: 800; color: var(--ink); margin-bottom: 16px;">{{ $job->title }}</h2>
                            
                            <div class="job-meta-pills">
                                @if($job->location)
                                    <span class="meta-pill">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                            <circle cx="12" cy="10" r="3"></circle>
                                        </svg>
                                        {{ $job->location }}
                                    </span>
                                @endif
                                @if($job->type)
                                    <span class="meta-pill">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        {{ $job->type }}
                                    </span>
                                @endif
                                @if($job->workplace_type)
                                    <span class="meta-pill">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                                            <line x1="8" y1="21" x2="16" y2="21"></line>
                                            <line x1="12" y1="17" x2="12" y2="21"></line>
                                        </svg>
                                        {{ $job->workplace_type }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        @if($job->summary)
                            <div class="job-summary-callout">
                                <div class="callout-icon">💡</div>
                                <div class="callout-text">
                                    <strong>Role Overview:</strong>
                                    <p>{{ $job->summary }}</p>
                                </div>
                            </div>
                        @endif

                        <div class="job-description-section">
                            <h3 style="font-size: 1.25rem; font-weight: 800; color: var(--navy); margin-bottom: 16px;">Job Description & Key Responsibilities</h3>
                            <div class="job-description-body">
                                {!! nl2br(e($job->description)) !!}
                            </div>
                        </div>
                    </div>

                    <!-- Right: Overview Sidebar -->
                    <div class="job-detail-sidebar">
                        <div class="job-detail-sidebar-box">
                            <h3 style="font-size: 1.2rem; font-weight: 800; color: var(--navy); margin-bottom: 20px; border-bottom: 1px solid var(--border); padding-bottom: 12px;">Role Overview</h3>
                            
                            <ul style="list-style: none; padding: 0; margin: 0 0 28px 0; display: flex; flex-direction: column; gap: 16px;">
                                <li style="display: flex; justify-content: space-between; font-size: 0.95rem;">
                                    <span style="color: var(--body);">Location:</span>
                                    <strong style="color: var(--ink);">{{ $job->location ?? 'Dhaka, Bangladesh' }}</strong>
                                </li>
                                <li style="display: flex; justify-content: space-between; font-size: 0.95rem;">
                                    <span style="color: var(--body);">Job Type:</span>
                                    <strong style="color: var(--ink);">{{ $job->type ?? 'Full Time' }}</strong>
                                </li>
                                <li style="display: flex; justify-content: space-between; font-size: 0.95rem;">
                                    <span style="color: var(--body);">Workplace:</span>
                                    <strong style="color: var(--ink);">{{ $job->workplace_type ?? 'In office' }}</strong>
                                </li>
                                <li style="display: flex; justify-content: space-between; font-size: 0.95rem;">
                                    <span style="color: var(--body);">Vacancies:</span>
                                    <strong style="color: var(--ink);">{{ $job->vacancies ?? 1 }}</strong>
                                </li>
                                @if($job->salary)
                                    <li style="display: flex; justify-content: space-between; font-size: 0.95rem;">
                                        <span style="color: var(--body);">Salary:</span>
                                        <strong style="color: var(--primary);">{{ $job->salary }}</strong>
                                    </li>
                                @endif
                                <li style="display: flex; justify-content: space-between; font-size: 0.95rem;">
                                    <span style="color: var(--body);">Deadline:</span>
                                    <strong style="color: var(--ink);">{{ $job->deadline ? $job->deadline->format('d F, Y') : 'Open until filled' }}</strong>
                                </li>
                            </ul>

                            <button type="button" class="btn-apply-now" onclick="openApplyModal('{{ e($job->title) }}')" style="width: 100%; justify-content: center; padding: 14px; font-size: 1rem;">
                                Apply For This Role
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                                    <line x1="22" y1="2" x2="11" y2="13"></line>
                                    <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                                </svg>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </div>

    <!-- Application Modal -->
    <div class="job-modal-backdrop" id="applyModal" style="display: none;">
        <div class="job-modal-box">
            <button type="button" class="modal-close-btn" onclick="closeApplyModal()">&times;</button>
            <h3 class="modal-title">Apply for <span id="modalJobTitle">{{ $job->title }}</span></h3>
            <p class="modal-sub">Fill out the form below to submit your job application to our HR team.</p>

            <form method="POST" action="{{ route('careers.apply') }}" enctype="multipart/form-data" class="modal-form">
                @csrf
                <input type="hidden" name="job_title" id="modalJobTitleInput" value="{{ $job->title }}">

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

            function animate() {
                requestAnimationFrame(animate);

                const posAttr = particleSystem.geometry.attributes.position;
                const posArr = posAttr.array;

                for (let i = 0; i < particleCount; i++) {
                    posArr[i * 3] += velocities[i].x;
                    posArr[i * 3 + 1] += velocities[i].y;
                    posArr[i * 3 + 2] += velocities[i].z;

                    if (Math.abs(posArr[i * 3]) > 40) velocities[i].x *= -1;
                    if (Math.abs(posArr[i * 3 + 1]) > 25) velocities[i].y *= -1;
                    if (Math.abs(posArr[i * 3 + 2]) > 25) velocities[i].z *= -1;
                }

                posAttr.needsUpdate = true;
                renderer.render(scene, camera);
            }

            animate();

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


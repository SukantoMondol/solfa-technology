@extends('layouts.app')

@section('title', $project->title.' | Case Study | '.($site['site_name'] ?? 'Solfa Technologies'))
@section('meta_description', Str::limit(strip_tags($project->description), 150))

@section('content')
    <!-- Hero Section -->
    <section class="career-hero" id="projectHeroSection">
        <canvas id="project3dCanvas" class="career-hero-canvas"></canvas>
        <div class="career-hero-overlay"></div>
        <div class="container career-hero-content">
            <span class="service-badge-tag" style="background: rgba(125, 63, 152, 0.2); color: #c58fe0; padding: 6px 16px; border-radius: 999px; font-weight: 700; font-size: 0.85rem; margin-bottom: 16px; display: inline-block;">
                {{ strtoupper($project->category ?? 'CASE STUDY') }}
            </span>
            <h1 class="text-balance">{{ $project->title }}</h1>
            <nav class="career-breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span class="sep">➔</span>
                <a href="{{ route('home') }}#projects">Projects</a>
                <span class="sep">➔</span>
                <span class="current">{{ $project->title }}</span>
            </nav>
        </div>
    </section>

    <!-- Main Project Content -->
    <section class="project-details-section" style="padding: 70px 0 100px 0; background: var(--surface);">
        <div class="container">
            
            <div style="margin-bottom: 24px;">
                <a href="{{ route('home') }}#projects" style="color: var(--primary); font-weight: 700; display: inline-flex; align-items: center; gap: 8px; text-decoration: none;">
                    &larr; Back to All Projects
                </a>
            </div>

            <div class="job-detail-grid">
                <!-- Left Main Content -->
                <div class="job-detail-main">
                    @if($project->image)
                        <div class="project-show-img-wrap" style="margin-bottom: 32px; border-radius: 16px; overflow: hidden; border: 1px solid var(--border); box-shadow: 0 12px 30px rgba(40, 20, 60, 0.08);">
                            <img src="{{ asset($project->image) }}" alt="{{ $project->title }}" style="width: 100%; height: auto; max-height: 480px; object-fit: cover; display: block;">
                        </div>
                    @endif

                    <div style="border-bottom: 1px solid var(--border); padding-bottom: 20px; margin-bottom: 24px;">
                        <span class="meta-pill" style="margin-bottom: 12px;">{{ $project->category ?? 'General Project' }}</span>
                        <h2 style="font-size: 2rem; font-weight: 800; color: var(--ink); margin-top: 8px;">{{ $project->title }}</h2>
                    </div>

                    <div class="project-article-body">
                        <h3 style="font-size: 1.3rem; font-weight: 800; color: var(--navy); margin-bottom: 16px;">Project Overview & Design Process</h3>
                        <div class="job-description-body" style="background: #faf8fc; padding: 30px; font-size: 1.05rem; line-height: 1.85; color: var(--body);">
                            {!! nl2br(e($project->description ?? 'No detailed article description provided for this project.')) !!}
                        </div>
                    </div>
                </div>

                <!-- Right Sidebar Overview -->
                <div class="job-detail-sidebar">
                    <div class="job-detail-sidebar-box">
                        <h3 style="font-size: 1.25rem; font-weight: 800; color: var(--navy); margin-bottom: 20px; border-bottom: 1px solid var(--border); padding-bottom: 12px;">Project Specs</h3>

                        <ul style="list-style: none; padding: 0; margin: 0 0 28px 0; display: flex; flex-direction: column; gap: 16px;">
                            @if($project->client)
                                <li style="display: flex; justify-content: space-between; font-size: 0.95rem;">
                                    <span style="color: var(--body);">Client:</span>
                                    <strong style="color: var(--ink);">{{ $project->client }}</strong>
                                </li>
                            @endif
                            <li style="display: flex; justify-content: space-between; font-size: 0.95rem;">
                                <span style="color: var(--body);">Category:</span>
                                <strong style="color: var(--ink);">{{ $project->category ?? 'N/A' }}</strong>
                            </li>
                            @if($project->completed_at)
                                <li style="display: flex; justify-content: space-between; font-size: 0.95rem;">
                                    <span style="color: var(--body);">Completed:</span>
                                    <strong style="color: var(--ink);">{{ $project->completed_at->format('F Y') }}</strong>
                                </li>
                            @endif
                        </ul>

                        @if($project->website_url)
                            <a href="{{ $project->website_url }}" target="_blank" class="btn btn-primary" style="width: 100%; justify-content: center; padding: 14px; font-size: 1rem; margin-bottom: 12px;">
                                Visit Live Website ↗
                            </a>
                        @endif

                        <button type="button" onclick="openMeetingSchedulerModal()" class="btn btn-outline" style="width: 100%; justify-content: center; padding: 14px; font-size: 0.95rem;">
                            Schedule Consultation
                        </button>
                    </div>
                </div>
            </div>

            <!-- Related Projects -->
            @if($relatedProjects->isNotEmpty())
                <div style="margin-top: 80px;">
                    <div style="margin-bottom: 30px;" class="text-center">
                        <span class="section-eyebrow">PORTFOLIO</span>
                        <h2 style="font-size: 1.8rem; font-weight: 800; color: var(--navy);">Other Featured Projects</h2>
                    </div>

                    <div class="projects-grid">
                        @foreach ($relatedProjects as $rel)
                            <article class="project-card" style="cursor: pointer;" onclick="window.location.href='{{ route('projects.show', $rel->slug) }}'">
                                <div class="project-thumb-box">
                                    @if ($rel->image)
                                        <img src="{{ asset($rel->image) }}" alt="{{ $rel->title }}" class="project-img">
                                    @else
                                        <div class="project-img-placeholder">
                                            <span>{{ strtoupper(substr($rel->title, 0, 1)) }}</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="project-body">
                                    <span class="project-cat-badge">{{ $rel->category }}</span>
                                    <h3 class="project-card-title">{{ $rel->title }}</h3>
                                    <p style="font-size: 0.9rem; color: var(--body); margin-bottom: 16px;">{{ Str::limit($rel->description, 100) }}</p>
                                    <a href="{{ route('projects.show', $rel->slug) }}" class="project-card-link" style="color: var(--primary); font-weight: 700;">
                                        View Case Study &rarr;
                                    </a>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const canvas = document.getElementById('project3dCanvas');
            const container = document.getElementById('projectHeroSection');
            if (!canvas || !container || typeof THREE === 'undefined') return;

            let width = container.clientWidth;
            let height = container.clientHeight;

            const scene = new THREE.Scene();
            const camera = new THREE.PerspectiveCamera(60, width / height, 0.1, 1000);
            camera.position.z = 40;

            const renderer = new THREE.WebGLRenderer({ canvas: canvas, alpha: true, antialias: true });
            renderer.setSize(width, height);

            const particleCount = 70;
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
            const particleMaterial = new THREE.PointsMaterial({ color: 0xc58fe0, size: 1.5, transparent: true, opacity: 0.8 });
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
        });
    </script>
@endsection

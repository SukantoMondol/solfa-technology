// Solfa Technologies - Hero Particle Network Animation (Three.js)
// Enhanced: Bigger particles, stronger mouse interaction, cursor glow trail

(function () {
  'use strict';

  const canvas = document.getElementById('heroCanvas');
  if (!canvas) return;

  const isMobile = window.innerWidth < 768;
  const PARTICLE_COUNT = isMobile ? 90 : 220;
  const CONNECTION_DISTANCE = isMobile ? 130 : 170;
  const MOUSE_RADIUS = 280;
  const COLORS = {
    particle: 0xd4a0f7,       // bright light purple
    particleAlt: 0x8ba8ff,    // bright blue accent
    particleHot: 0xf0abfc,    // pink-purple for near-mouse particles
    line: 0x9b59b6,           // vivid purple
    lineAlt: 0x4a6cf7,        // vivid blue
  };

  // --- Setup Scene ---
  const scene = new THREE.Scene();
  const camera = new THREE.PerspectiveCamera(75, canvas.clientWidth / canvas.clientHeight, 1, 1000);
  camera.position.z = 280;

  const renderer = new THREE.WebGLRenderer({
    canvas: canvas,
    alpha: true,
    antialias: true,
  });
  renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
  renderer.setSize(canvas.clientWidth, canvas.clientHeight);

  // --- Particles ---
  const positions = new Float32Array(PARTICLE_COUNT * 3);
  const velocities = [];
  const baseSizes = new Float32Array(PARTICLE_COUNT);
  const sizes = new Float32Array(PARTICLE_COUNT);
  const colors = new Float32Array(PARTICLE_COUNT * 3);
  const baseColors = [];

  const spread = { x: 550, y: 320, z: 180 };

  for (let i = 0; i < PARTICLE_COUNT; i++) {
    const i3 = i * 3;
    positions[i3] = (Math.random() - 0.5) * spread.x;
    positions[i3 + 1] = (Math.random() - 0.5) * spread.y;
    positions[i3 + 2] = (Math.random() - 0.5) * spread.z;

    velocities.push({
      x: (Math.random() - 0.5) * 0.35,
      y: (Math.random() - 0.5) * 0.35,
      z: (Math.random() - 0.5) * 0.15,
    });

    const baseSize = Math.random() * 5 + 3;
    baseSizes[i] = baseSize;
    sizes[i] = baseSize;

    // Alternate between purple, blue, and pink tints
    const rand = Math.random();
    let color;
    if (rand > 0.6) color = new THREE.Color(COLORS.particle);
    else if (rand > 0.25) color = new THREE.Color(COLORS.particleAlt);
    else color = new THREE.Color(COLORS.particleHot);

    baseColors.push(color.clone());
    colors[i3] = color.r;
    colors[i3 + 1] = color.g;
    colors[i3 + 2] = color.b;
  }

  const particleGeometry = new THREE.BufferGeometry();
  particleGeometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
  particleGeometry.setAttribute('size', new THREE.BufferAttribute(sizes, 1));
  particleGeometry.setAttribute('color', new THREE.BufferAttribute(colors, 3));

  // Glow shader for particles
  const particleMaterial = new THREE.ShaderMaterial({
    uniforms: {
      uTime: { value: 0 },
    },
    vertexShader: `
      attribute float size;
      attribute vec3 color;
      varying vec3 vColor;
      varying float vAlpha;
      uniform float uTime;
      void main() {
        vColor = color;
        vec4 mvPosition = modelViewMatrix * vec4(position, 1.0);
        float pulse = 1.0 + 0.35 * sin(uTime * 1.8 + position.x * 0.015 + position.y * 0.01);
        gl_PointSize = size * pulse * (220.0 / -mvPosition.z);
        vAlpha = 0.7 + 0.3 * sin(uTime * 1.2 + position.y * 0.02);
        gl_Position = projectionMatrix * mvPosition;
      }
    `,
    fragmentShader: `
      varying vec3 vColor;
      varying float vAlpha;
      void main() {
        float dist = length(gl_PointCoord - vec2(0.5));
        if (dist > 0.5) discard;
        // Multi-layer glow
        float core = 1.0 - smoothstep(0.0, 0.15, dist);
        float mid = 1.0 - smoothstep(0.0, 0.35, dist);
        float outer = 1.0 - smoothstep(0.0, 0.5, dist);
        float glow = core * 0.9 + mid * 0.4 + outer * 0.2;
        gl_FragColor = vec4(vColor * (0.8 + core * 0.5), glow * vAlpha);
      }
    `,
    transparent: true,
    depthWrite: false,
    blending: THREE.AdditiveBlending,
  });

  const particles = new THREE.Points(particleGeometry, particleMaterial);
  scene.add(particles);

  // --- Connection Lines ---
  const maxConnections = PARTICLE_COUNT * 4;
  const linePositions = new Float32Array(maxConnections * 6);
  const lineColors = new Float32Array(maxConnections * 6);
  const lineGeometry = new THREE.BufferGeometry();
  lineGeometry.setAttribute('position', new THREE.BufferAttribute(linePositions, 3));
  lineGeometry.setAttribute('color', new THREE.BufferAttribute(lineColors, 3));

  const lineMaterial = new THREE.LineBasicMaterial({
    vertexColors: true,
    transparent: true,
    opacity: 0.5,
    blending: THREE.AdditiveBlending,
    depthWrite: false,
  });

  const lines = new THREE.LineSegments(lineGeometry, lineMaterial);
  scene.add(lines);

  // --- Cursor Glow Sprite (visible glow that follows mouse) ---
  const glowTexture = createGlowTexture();
  const glowMaterial = new THREE.SpriteMaterial({
    map: glowTexture,
    color: 0xa855f7,
    blending: THREE.AdditiveBlending,
    transparent: true,
    opacity: 0,
    depthWrite: false,
  });
  const cursorGlow = new THREE.Sprite(glowMaterial);
  cursorGlow.scale.set(120, 120, 1);
  scene.add(cursorGlow);

  function createGlowTexture() {
    const size = 128;
    const c = document.createElement('canvas');
    c.width = c.height = size;
    const ctx = c.getContext('2d');
    const gradient = ctx.createRadialGradient(size / 2, size / 2, 0, size / 2, size / 2, size / 2);
    gradient.addColorStop(0, 'rgba(168, 85, 247, 0.6)');
    gradient.addColorStop(0.3, 'rgba(168, 85, 247, 0.2)');
    gradient.addColorStop(0.6, 'rgba(99, 102, 241, 0.08)');
    gradient.addColorStop(1, 'rgba(0, 0, 0, 0)');
    ctx.fillStyle = gradient;
    ctx.fillRect(0, 0, size, size);
    const texture = new THREE.CanvasTexture(c);
    return texture;
  }

  // --- Mouse tracking (through content layer) ---
  const mouse = { x: 9999, y: 9999 };
  const mouseTarget = { x: 9999, y: 9999 };
  let mouseActive = false;

  // Listen on the hero section instead of canvas, so it works through content
  const heroSection = document.getElementById('heroSection');
  if (heroSection) {
    heroSection.addEventListener('mousemove', function (e) {
      const rect = canvas.getBoundingClientRect();
      mouseTarget.x = ((e.clientX - rect.left) / rect.width) * 2 - 1;
      mouseTarget.y = -((e.clientY - rect.top) / rect.height) * 2 + 1;
      mouseActive = true;
    });

    heroSection.addEventListener('mouseleave', function () {
      mouseTarget.x = 9999;
      mouseTarget.y = 9999;
      mouseActive = false;
    });
  }

  // --- Animation ---
  const clock = new THREE.Clock();
  const hotColor = new THREE.Color(COLORS.particleHot);
  const brightWhite = new THREE.Color(0xffffff);

  function animate() {
    requestAnimationFrame(animate);

    const elapsed = clock.getElapsedTime();
    particleMaterial.uniforms.uTime.value = elapsed;

    // Smooth mouse
    mouse.x += (mouseTarget.x - mouse.x) * 0.1;
    mouse.y += (mouseTarget.y - mouse.y) * 0.1;

    const mouseWorld = new THREE.Vector3(mouse.x * spread.x * 0.5, mouse.y * spread.y * 0.5, 0);

    // Update cursor glow
    if (mouseActive && mouse.x < 5) {
      cursorGlow.position.set(mouseWorld.x, mouseWorld.y, 10);
      glowMaterial.opacity += (0.4 - glowMaterial.opacity) * 0.1;
      // Pulsing glow size
      const glowPulse = 100 + Math.sin(elapsed * 3) * 20;
      cursorGlow.scale.set(glowPulse, glowPulse, 1);
    } else {
      glowMaterial.opacity += (0 - glowMaterial.opacity) * 0.05;
    }

    // Update particles
    const pos = particleGeometry.attributes.position.array;
    const sizeArr = particleGeometry.attributes.size.array;
    const colArr = particleGeometry.attributes.color.array;

    for (let i = 0; i < PARTICLE_COUNT; i++) {
      const i3 = i * 3;

      // Drift
      pos[i3] += velocities[i].x;
      pos[i3 + 1] += velocities[i].y;
      pos[i3 + 2] += velocities[i].z;

      // Soft boundary bounce
      if (Math.abs(pos[i3]) > spread.x * 0.5) velocities[i].x *= -1;
      if (Math.abs(pos[i3 + 1]) > spread.y * 0.5) velocities[i].y *= -1;
      if (Math.abs(pos[i3 + 2]) > spread.z * 0.5) velocities[i].z *= -1;

      // Mouse interaction - strong attraction + size boost + color shift
      let mouseDist = 9999;
      if (mouse.x < 5) {
        const dx = mouseWorld.x - pos[i3];
        const dy = mouseWorld.y - pos[i3 + 1];
        mouseDist = Math.sqrt(dx * dx + dy * dy);

        if (mouseDist < MOUSE_RADIUS && mouseDist > 1) {
          const force = (MOUSE_RADIUS - mouseDist) / MOUSE_RADIUS;
          // Strong gravitational pull
          pos[i3] += dx * force * 0.025;
          pos[i3 + 1] += dy * force * 0.025;

          // Grow particles near cursor
          sizeArr[i] = baseSizes[i] + force * 8;

          // Shift color to hot/bright near cursor
          const mixFactor = force * 0.8;
          const bc = baseColors[i];
          colArr[i3] = bc.r + (brightWhite.r - bc.r) * mixFactor;
          colArr[i3 + 1] = bc.g + (brightWhite.g - bc.g) * mixFactor * 0.6;
          colArr[i3 + 2] = bc.b + (brightWhite.b - bc.b) * mixFactor * 0.4;
        } else {
          // Restore base values
          sizeArr[i] += (baseSizes[i] - sizeArr[i]) * 0.05;
          const bc = baseColors[i];
          colArr[i3] += (bc.r - colArr[i3]) * 0.03;
          colArr[i3 + 1] += (bc.g - colArr[i3 + 1]) * 0.03;
          colArr[i3 + 2] += (bc.b - colArr[i3 + 2]) * 0.03;
        }
      } else {
        sizeArr[i] += (baseSizes[i] - sizeArr[i]) * 0.05;
        const bc = baseColors[i];
        colArr[i3] += (bc.r - colArr[i3]) * 0.03;
        colArr[i3 + 1] += (bc.g - colArr[i3 + 1]) * 0.03;
        colArr[i3 + 2] += (bc.b - colArr[i3 + 2]) * 0.03;
      }
    }
    particleGeometry.attributes.position.needsUpdate = true;
    particleGeometry.attributes.size.needsUpdate = true;
    particleGeometry.attributes.color.needsUpdate = true;

    // Update connection lines
    let lineIndex = 0;
    const linePos = lineGeometry.attributes.position.array;
    const lineCol = lineGeometry.attributes.color.array;
    const lineColor1 = new THREE.Color(COLORS.line);
    const lineColor2 = new THREE.Color(COLORS.lineAlt);

    for (let i = 0; i < PARTICLE_COUNT; i++) {
      const ix = pos[i * 3];
      const iy = pos[i * 3 + 1];
      const iz = pos[i * 3 + 2];

      for (let j = i + 1; j < PARTICLE_COUNT; j++) {
        const jx = pos[j * 3];
        const jy = pos[j * 3 + 1];
        const jz = pos[j * 3 + 2];

        const dx = ix - jx;
        const dy = iy - jy;
        const dz = iz - jz;
        const dist = Math.sqrt(dx * dx + dy * dy + dz * dz);

        if (dist < CONNECTION_DISTANCE && lineIndex < maxConnections) {
          const alpha = 1 - dist / CONNECTION_DISTANCE;

          // Lines near mouse glow brighter
          let brightness = 1;
          if (mouse.x < 5) {
            const mx = (ix + jx) / 2;
            const my = (iy + jy) / 2;
            const mdx = mouseWorld.x - mx;
            const mdy = mouseWorld.y - my;
            const mDist = Math.sqrt(mdx * mdx + mdy * mdy);
            if (mDist < MOUSE_RADIUS) {
              brightness = 1 + (MOUSE_RADIUS - mDist) / MOUSE_RADIUS * 2;
            }
          }

          const mixColor = lineColor1.clone().lerp(lineColor2, Math.sin(elapsed * 0.8 + i * 0.05) * 0.5 + 0.5);

          const li = lineIndex * 6;
          linePos[li] = ix;
          linePos[li + 1] = iy;
          linePos[li + 2] = iz;
          linePos[li + 3] = jx;
          linePos[li + 4] = jy;
          linePos[li + 5] = jz;

          const a = alpha * brightness;
          lineCol[li] = mixColor.r * a;
          lineCol[li + 1] = mixColor.g * a;
          lineCol[li + 2] = mixColor.b * a;
          lineCol[li + 3] = mixColor.r * a;
          lineCol[li + 4] = mixColor.g * a;
          lineCol[li + 5] = mixColor.b * a;

          lineIndex++;
        }
      }
    }

    // Zero unused segments
    for (let i = lineIndex * 6; i < linePos.length; i++) {
      linePos[i] = 0;
      lineCol[i] = 0;
    }

    lineGeometry.attributes.position.needsUpdate = true;
    lineGeometry.attributes.color.needsUpdate = true;
    lineGeometry.setDrawRange(0, lineIndex * 2);

    // Gentle camera sway
    camera.position.x = Math.sin(elapsed * 0.12) * 12;
    camera.position.y = Math.cos(elapsed * 0.08) * 8;
    camera.lookAt(scene.position);

    renderer.render(scene, camera);
  }

  animate();

  // --- Resize ---
  window.addEventListener('resize', function () {
    const w = canvas.clientWidth;
    const h = canvas.clientHeight;
    if (w && h) {
      camera.aspect = w / h;
      camera.updateProjectionMatrix();
      renderer.setSize(w, h);
    }
  });
})();

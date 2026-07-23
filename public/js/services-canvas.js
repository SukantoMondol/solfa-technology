// Solfa Technologies - Services 3D Interactive Cybernetic Wave Lattice (Three.js)

(function () {
  'use strict';

  const canvas = document.getElementById('servicesCanvas');
  if (!canvas) return;

  const isMobile = window.innerWidth < 768;
  const GRID_X = isMobile ? 30 : 50;
  const GRID_Y = isMobile ? 20 : 35;
  const SPACING = isMobile ? 22 : 28;

  // Scene & Camera
  const scene = new THREE.Scene();
  const camera = new THREE.PerspectiveCamera(60, window.innerWidth / window.innerHeight, 1, 1000);
  camera.position.set(0, -120, 240);
  camera.rotation.x = 0.5;

  const renderer = new THREE.WebGLRenderer({
    canvas: canvas,
    alpha: true,
    antialias: true
  });
  renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));

  function resize() {
    const parent = canvas.parentElement;
    const width = parent ? parent.clientWidth : window.innerWidth;
    const height = parent ? parent.clientHeight : window.innerHeight;
    camera.aspect = width / height;
    camera.updateProjectionMatrix();
    renderer.setSize(width, height);
  }
  resize();

  // Create 3D Wave Particle Grid
  const count = GRID_X * GRID_Y;
  const positions = new Float32Array(count * 3);
  const colors = new Float32Array(count * 3);

  const colPurple = new THREE.Color(0xa855f7);
  const colNavy = new THREE.Color(0x6366f1);
  const colCyan = new THREE.Color(0x38bdf8);

  let i = 0;
  for (let ix = 0; ix < GRID_X; ix++) {
    for (let iy = 0; iy < GRID_Y; iy++) {
      const x = (ix - GRID_X / 2) * SPACING;
      const y = (iy - GRID_Y / 2) * SPACING;
      const z = 0;

      positions[i * 3] = x;
      positions[i * 3 + 1] = y;
      positions[i * 3 + 2] = z;

      const mixVal = ix / GRID_X;
      const c = colPurple.clone().lerp(mixVal > 0.5 ? colCyan : colNavy, mixVal);

      colors[i * 3] = c.r;
      colors[i * 3 + 1] = c.g;
      colors[i * 3 + 2] = c.b;

      i++;
    }
  }

  const geometry = new THREE.BufferGeometry();
  geometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
  geometry.setAttribute('color', new THREE.BufferAttribute(colors, 3));

  const material = new THREE.ShaderMaterial({
    uniforms: { uTime: { value: 0 } },
    vertexShader: `
      attribute vec3 color;
      varying vec3 vColor;
      uniform float uTime;
      void main() {
        vColor = color;
        vec3 pos = position;
        float dist = length(pos.xy) * 0.015;
        pos.z = sin(dist * 4.0 - uTime * 2.0) * 22.0 + cos(pos.x * 0.02 + uTime) * 12.0;
        vec4 mvPosition = modelViewMatrix * vec4(pos, 1.0);
        gl_PointSize = (4.5 + 2.0 * sin(uTime + pos.x * 0.05)) * (220.0 / -mvPosition.z);
        gl_Position = projectionMatrix * mvPosition;
      }
    `,
    fragmentShader: `
      varying vec3 vColor;
      void main() {
        float d = length(gl_PointCoord - vec2(0.5));
        if (d > 0.5) discard;
        float alpha = 1.0 - smoothstep(0.0, 0.5, d);
        gl_FragColor = vec4(vColor * 1.2, alpha * 0.65);
      }
    `,
    transparent: true,
    depthWrite: false,
    blending: THREE.AdditiveBlending
  });

  const particles = new THREE.Points(geometry, material);
  scene.add(particles);

  // Mouse Wave Distortion
  const pointer = { x: 0, y: 0 };
  const targetPointer = { x: 0, y: 0 };

  const servicesSection = document.getElementById('services');
  if (servicesSection) {
    servicesSection.addEventListener('mousemove', e => {
      const rect = canvas.getBoundingClientRect();
      targetPointer.x = ((e.clientX - rect.left) / rect.width) * 2 - 1;
      targetPointer.y = -((e.clientY - rect.top) / rect.height) * 2 + 1;
    });
  }

  const clock = new THREE.Clock();

  function animate() {
    requestAnimationFrame(animate);
    const elapsed = clock.getElapsedTime();
    material.uniforms.uTime.value = elapsed;

    pointer.x += (targetPointer.x - pointer.x) * 0.05;
    pointer.y += (targetPointer.y - pointer.y) * 0.05;

    camera.position.x = pointer.x * 25;
    camera.position.y = -120 + pointer.y * 20;
    camera.lookAt(0, 0, 0);

    renderer.render(scene, camera);
  }

  animate();

  window.addEventListener('resize', resize);
})();

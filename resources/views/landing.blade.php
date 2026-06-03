@extends('layouts.app')

@section('title', 'Beranda - Eryko Dwi Cahyo')

@section('content')
<!-- Custom Styles for Landing Page -->
<style>
    /* Hero Grid Layout */
    .hero-grid {
        display: grid;
        grid-template-columns: 1.2fr 0.8fr;
        gap: 3rem;
        align-items: center;
        min-height: calc(100vh - 180px);
        position: relative;
    }
    
    .hero-canvas-wrapper {
        position: relative;
        width: 100%;
        height: 500px;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 10;
        cursor: grab;
        touch-action: none;
    }
    
    .hero-canvas-wrapper:active {
        cursor: grabbing;
    }
    
    /* Responsive stacking */
    @media (max-width: 768px) {
        .hero-grid {
            grid-template-columns: 1fr;
            gap: 2rem;
            text-align: center;
            min-height: auto;
            padding-top: 1rem;
        }
        
        .hero-content {
            order: 1;
        }
        
        .hero-canvas-wrapper {
            order: 2;
            height: 350px;
        }
        
        .hero-buttons {
            justify-content: center;
        }
    }
    
    /* Interactive Button Styling with Orange Theme Accent */
    .btn-orange-primary {
        background-color: #d97a3e;
        color: #ffffff;
        font-weight: 600;
        padding: 0.85rem 2.2rem;
        border-radius: 9999px;
        border: 2px solid #d97a3e;
        transition: all 0.3s ease;
        box-shadow: 0 4px 14px rgba(217, 122, 62, 0.35);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }
    
    .btn-orange-primary:hover {
        background-color: transparent;
        color: #d97a3e;
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(217, 122, 62, 0.5);
    }
    
    .btn-orange-secondary {
        background-color: transparent;
        color: #ffffff;
        font-weight: 600;
        padding: 0.85rem 2.2rem;
        border-radius: 9999px;
        border: 2px solid rgba(255, 255, 255, 0.3);
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }
    
    .btn-orange-secondary:hover {
        border-color: #d97a3e;
        color: #d97a3e;
        transform: translateY(-3px);
        background-color: rgba(217, 122, 62, 0.05);
    }

    .hero-buttons {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        align-items: center;
    }
    
    /* Loading Spinner */
    .loader-container {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1rem;
        color: #d97a3e;
        pointer-events: none;
        transition: opacity 0.5s ease;
    }
    
    .spinner {
        width: 40px;
        height: 40px;
        border: 4px solid rgba(217, 122, 62, 0.1);
        border-top-color: #d97a3e;
        border-radius: 50%;
        animation: spin 1s infinite linear;
    }
    
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>

<div class="hero-grid">
    <!-- Kolom Kiri: Teks Perkenalan -->
    <div class="hero-content flex flex-col justify-center text-white z-10">
        <span class="text-orange-400 font-bold uppercase tracking-wider text-sm mb-3">Selamat Datang</span>
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold tracking-tight mb-4 leading-tight">
            Eryko Dwi Cahyo
        </h1>
        <p class="text-xl sm:text-2xl text-orange-400 font-semibold mb-6">
            Documentary Filmmaker & Content Creator
        </p>
        <p class="text-gray-300 text-base sm:text-lg mb-8 leading-relaxed max-w-xl">
            Mendokumentasikan cerita dari Jawa Timur. Candi, kesenian tradisional, kuliner lokal, 
            dan kearifan yang nyaris terlupakan — saya rekam dalam film pendek dokumenter berkualitas tinggi. 
            Menghubungkan masa lalu dan masa kini lewat lensa sinematik.
        </p>
        <div class="hero-buttons">
            <a href="/portfolio" class="btn-orange-primary">
                <span>Lihat Portfolio</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </a>
            <a href="/contact" class="btn-orange-secondary">
                <span>Hubungi Saya</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </a>
        </div>
    </div>
    
    <!-- Kolom Kanan: 3D Canvas -->
    <div class="hero-canvas-wrapper" id="canvas-wrapper">
        <div id="canvas-loader" class="loader-container">
            <div class="spinner"></div>
            <span class="text-xs font-semibold uppercase tracking-wider">Memuat Karakter 3D...</span>
        </div>
        <div id="canvas-container" class="w-full h-full"></div>
    </div>
</div>

<!-- Three.js Import Map CDN -->
<script type="importmap">
    {
        "imports": {
            "three": "https://unpkg.com/three@0.128.0/build/three.module.js",
            "three/addons/": "https://unpkg.com/three@0.128.0/examples/jsm/"
        }
    }
</script>

<!-- Module Script for Three.js GLB Rendering -->
<script type="module">
    import * as THREE from 'three';
    import { GLTFLoader } from 'three/addons/loaders/GLTFLoader.js';

    const container = document.getElementById('canvas-container');
    const loaderContainer = document.getElementById('canvas-loader');
    
    let model, mixer, renderer, scene, camera;
    const clock = new THREE.Clock();

    // Inisialisasi Scene
    scene = new THREE.Scene();
    scene.background = null;

    // Inisialisasi Camera (fov=45, posisi 2, 1.5, 3)
    const width = container.clientWidth;
    const height = container.clientHeight;
    camera = new THREE.PerspectiveCamera(45, width / height, 0.1, 1000);
    camera.position.set(2, 1.5, 3);
    camera.lookAt(0, 0, 0);

    // Inisialisasi Renderer
    renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
    renderer.setSize(width, height);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    renderer.outputEncoding = THREE.sRGBEncoding;
    renderer.toneMapping = THREE.ACESFilmicToneMapping;
    renderer.toneMappingExposure = 1.25;
    container.appendChild(renderer.domElement);

    // Lighting Setup
    // 1. AmbientLight (intensity 0.5)
    const ambientLight = new THREE.AmbientLight(0xffffff, 0.5);
    scene.add(ambientLight);

    // 2. DirectionalLight dari depan (intensity 1, posisi 2,3,4)
    const dirLight = new THREE.DirectionalLight(0xffffff, 1.0);
    dirLight.position.set(2, 3, 4);
    scene.add(dirLight);

    // 3. PointLight warna oranye (#d97a3e) dari samping (intensity 0.5)
    const pointLight = new THREE.PointLight(0xd97a3e, 0.5);
    pointLight.position.set(-3, 2, 2);
    scene.add(pointLight);

    // 4. BackLight dari belakang (intensity 0.3)
    const backLight = new THREE.DirectionalLight(0xffffff, 0.3);
    backLight.position.set(0, 2, -5);
    scene.add(backLight);

    // Load Karakter 3D GLB
    const loader = new GLTFLoader();
    
    loader.load(
        '/models/character.glb',
        (gltf) => {
            model = gltf.scene;
            
            // Sesuaikan material agar tidak terlalu gelap/mengkilap akibat ketiadaan environment map
            model.traverse((child) => {
                if (child.isMesh && child.material) {
                    child.material.roughness = Math.max(child.material.roughness, 0.55);
                    child.material.metalness = Math.min(child.material.metalness, 0.15);
                }
            });
            
            // Skala FIXED: set scale(1.2, 1.2, 1.2)
            model.scale.set(1.2, 1.2, 1.2);
            
            // Posisi: y = -1.0 (biar kaki di ground)
            model.position.set(0, -1.0, 0);
            
            scene.add(model);
            
            // Animasi (jika file GLB punya animasi)
            if (gltf.animations && gltf.animations.length > 0) {
                mixer = new THREE.AnimationMixer(model);
                const action = mixer.clipAction(gltf.animations[0]);
                action.setLoop(THREE.LoopRepeat);
                action.play();
            }
            
            // Sembunyikan loading indicator
            if (loaderContainer) {
                loaderContainer.style.opacity = 0;
                setTimeout(() => {
                    loaderContainer.style.display = 'none';
                }, 500);
            }
            
            // Resize handler
            onWindowResize();
            setTimeout(onWindowResize, 100);
            setTimeout(onWindowResize, 500);
        },
        undefined,
        (error) => {
            console.error('Error saat memuat model 3D:', error);
            
            // Fallback teks di canvas
            if (loaderContainer) {
                loaderContainer.innerHTML = `
                    <div style="font-size: 2rem; margin-bottom: 0.5rem;">⚠️</div>
                    <span class="text-orange-400 text-xs font-bold text-center px-4">
                        Gagal memuat karakter 3D.<br>
                        File /models/character.glb tidak ditemukan atau rusak.
                    </span>
                `;
            }
            if (container) {
                container.innerHTML = `
                    <div class="flex flex-col items-center justify-center h-full text-center p-4">
                        <span class="text-orange-400 font-bold text-lg mb-2">[ Karakter 3D ]</span>
                        <p class="text-gray-400 text-sm">Gagal memuat model. Pastikan file '/models/character.glb' tersedia.</p>
                    </div>
                `;
            }
        }
    );

    // Loop Animasi
    function animate() {
        requestAnimationFrame(animate);

        const delta = clock.getDelta();
        if (mixer) {
            mixer.update(delta);
        }

        renderer.render(scene, camera);
    }
    
    animate();

    // Kontrol Putar Manual (Drag to Rotate)
    let isDragging = false;
    let previousPointerPosition = { x: 0, y: 0 };
    const wrapper = document.getElementById('canvas-wrapper');

    if (wrapper) {
        wrapper.addEventListener('pointerdown', (e) => {
            isDragging = true;
            previousPointerPosition = { x: e.clientX, y: e.clientY };
            wrapper.setPointerCapture(e.pointerId);
        });

        wrapper.addEventListener('pointermove', (e) => {
            if (!isDragging || !model) return;
            const deltaX = e.clientX - previousPointerPosition.x;
            // Putar karakter pada sumbu Y secara manual
            model.rotation.y += deltaX * 0.007;
            previousPointerPosition = { x: e.clientX, y: e.clientY };
        });

        wrapper.addEventListener('pointerup', (e) => {
            isDragging = false;
            wrapper.releasePointerCapture(e.pointerId);
        });

        wrapper.addEventListener('pointercancel', (e) => {
            isDragging = false;
            wrapper.releasePointerCapture(e.pointerId);
        });
    }

    // Event listener resize
    window.addEventListener('resize', onWindowResize);

    function onWindowResize() {
        if (!container || !camera || !renderer) return;
        
        const w = container.clientWidth;
        const h = container.clientHeight;
        
        if (w === 0 || h === 0) return;
        
        camera.aspect = w / h;
        camera.updateProjectionMatrix();
        
        renderer.setSize(w, h);
    }

    // Panggil onWindowResize pertama kali
    onWindowResize();
    setTimeout(onWindowResize, 100);
    setTimeout(onWindowResize, 500);
</script>
@endsection
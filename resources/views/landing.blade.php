@extends('layouts.app')

@section('title', 'Beranda - Eryko Dwi Cahyo')

@section('content')
<style>
    .hero-section {
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 40px;
        flex-wrap: wrap;
    }
    .hero-content {
        flex: 1;
        z-index: 10;
    }
    .hero-3d {
        flex: 1;
        position: relative;
        min-height: 450px;
        z-index: 10;
    }
    @media (max-width: 768px) {
        .hero-section {
            flex-direction: column;
            text-align: center;
        }
        .btn-group {
            justify-content: center;
        }
    }
    .btn-group {
        display: flex;
        gap: 16px;
        margin-top: 32px;
        flex-wrap: wrap;
    }
    .btn-primary {
        background: #2563eb;
        color: white;
        padding: 12px 32px;
        border-radius: 40px;
        font-weight: 500;
        transition: all 0.3s ease;
        display: inline-block;
    }
    .btn-primary:hover {
        background: #3b82f6;
        transform: translateY(-2px);
    }
    .btn-secondary {
        background: transparent;
        border: 1px solid #60a5fa;
        color: #60a5fa;
        padding: 12px 32px;
        border-radius: 40px;
        font-weight: 500;
        transition: all 0.3s ease;
        display: inline-block;
    }
    .btn-secondary:hover {
        background: rgba(96, 165, 250, 0.1);
        transform: translateY(-2px);
    }
    .hero-title {
        background: linear-gradient(135deg, #ffffff 0%, #60a5fa 100%);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }
    
    /* AI Chatbot Styles */
    .chat-btn {
        background: #2563eb;
        color: white;
        width: 56px;
        height: 56px;
        border-radius: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        transition: all 0.3s ease;
    }
    .chat-btn:hover {
        transform: scale(1.05);
        background: #3b82f6;
    }
    .chat-popup {
        position: fixed;
        bottom: 80px;
        right: 20px;
        width: 350px;
        max-width: calc(100vw - 40px);
        background: rgba(30, 41, 59, 0.95);
        backdrop-filter: blur(12px);
        border-radius: 20px;
        border: 1px solid rgba(59, 130, 246, 0.3);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        z-index: 1000;
        overflow: hidden;
    }
    .chat-header {
        background: #1e3a8a;
        padding: 12px 16px;
        color: white;
        font-weight: 600;
    }
    .chat-messages {
        height: 300px;
        overflow-y: auto;
        padding: 12px;
    }
    .chat-input-area {
        display: flex;
        padding: 12px;
        border-top: 1px solid rgba(59, 130, 246, 0.2);
    }
    .chat-input {
        flex: 1;
        padding: 8px 12px;
        border: 1px solid rgba(59, 130, 246, 0.3);
        border-radius: 20px;
        background: #1e293b;
        color: white;
        outline: none;
    }
    .chat-input::placeholder {
        color: #94a3b8;
    }
    .chat-send {
        background: #2563eb;
        color: white;
        border: none;
        border-radius: 20px;
        padding: 8px 16px;
        margin-left: 8px;
        cursor: pointer;
    }
    .quick-reply {
        display: inline-block;
        background: rgba(59, 130, 246, 0.15);
        border: 1px solid rgba(59, 130, 246, 0.3);
        border-radius: 20px;
        padding: 6px 12px;
        font-size: 12px;
        margin: 4px;
        cursor: pointer;
        transition: all 0.2s;
        color: #94a3b8;
    }
    .quick-reply:hover {
        background: rgba(59, 130, 246, 0.3);
        color: white;
    }
    .bot-msg {
        background: rgba(59, 130, 246, 0.15);
        padding: 8px 12px;
        border-radius: 16px;
        margin-bottom: 8px;
        max-width: 85%;
        color: #e2e8f0;
    }
    .user-msg {
        background: #2563eb;
        color: white;
        padding: 8px 12px;
        border-radius: 16px;
        margin-bottom: 8px;
        margin-left: auto;
        max-width: 85%;
        text-align: right;
    }
    
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>

<div class="hero-section">
    <div class="hero-content">
        <h1 class="hero-title text-5xl md:text-7xl font-bold mb-4">Eryko Dwi Cahyo</h1>
        <p class="text-xl text-[#60a5fa] mb-4 font-semibold">Documentary Filmmaker & Content Creator</p>
        <p class="text-gray-300 leading-relaxed mb-6 max-w-lg">
            asal Surabaya. Berpengalaman dalam produksi film dokumenter, konten digital, dan iklan komersial dengan berbagai jobdesk — sutradara, gaffer, kameraman, editor, hingga artistik.
        </p>
        <div class="btn-group">
            <a href="{{ route('portfolio') }}" class="btn-primary">Lihat Portfolio</a>
            <a href="{{ route('contact') }}" class="btn-secondary">Hubungi Saya</a>
        </div>
    </div>
    
    <!-- 3D Container dengan wrapper & loader -->
    <div id="canvas-wrapper" class="hero-3d" style="position: relative;">
        <div id="canvas-loader" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; z-index: 10;">
            <div style="width: 40px; height: 40px; border: 4px solid rgba(96, 165, 250, 0.2); border-top-color: #60a5fa; border-radius: 50%; animation: spin 1s linear infinite; margin: 0 auto 10px;"></div>
            <span style="color: #94a3b8; font-size: 12px;">Memuat Karakter 3D...</span>
        </div>
        <div id="canvas-container" style="width: 100%; height: 450px; border-radius: 24px;"></div>
    </div>
</div>

<!-- AI CHATBOT -->
<div style="position: fixed; bottom: 20px; right: 20px; z-index: 1000;">
    <div class="chat-btn" id="chatBtn">
        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
    </div>
    
    <div id="chatPopup" class="chat-popup" style="display: none;">
        <div class="chat-header">
            🎬 AI Assistant
            <button id="closeChat" style="float: right; background: none; border: none; color: white; cursor: pointer;">✕</button>
        </div>
        <div id="chatMessages" class="chat-messages">
            <div class="bot-msg">👋 Halo! Saya asisten virtual. Ada yang bisa saya bantu?</div>
            <div class="quick-replies" style="margin-top: 8px;">
                <span class="quick-reply" data-msg="Apa saja film dokumenter?">📹 Film</span>
                <span class="quick-reply" data-msg="Apa itu yearbook?">📸 Yearbook</span>
                <span class="quick-reply" data-msg="Brand apa saja?">🏷️ Brand</span>
                <span class="quick-reply" data-msg="Kontak Eryko">📧 Kontak</span>
            </div>
        </div>
        <div class="chat-input-area">
            <input type="text" id="chatInput" class="chat-input" placeholder="Tanya sesuatu...">
            <button id="sendMsg" class="chat-send">Kirim</button>
        </div>
    </div>
</div>

<script type="importmap">
    {
        "imports": {
            "three": "https://unpkg.com/three@0.128.0/build/three.module.js",
            "three/addons/": "https://unpkg.com/three@0.128.0/examples/jsm/"
        }
    }
</script>

<script type="module">
    import * as THREE from 'three';
    import { GLTFLoader } from 'three/addons/loaders/GLTFLoader.js';

    const container = document.getElementById('canvas-container');
    const loaderContainer = document.getElementById('canvas-loader');
    
    let model, mixer, scene, camera, renderer;
    const clock = new THREE.Clock();

    if (!container) {
        console.error('Container tidak ditemukan!');
    }

    // Inisialisasi Scene
    scene = new THREE.Scene();
    scene.background = null;

    // Inisialisasi Camera
    const width = container.clientWidth;
    const height = container.clientHeight;
    camera = new THREE.PerspectiveCamera(45, width / height, 0.1, 1000);
    camera.position.set(2, 1.5, 3);
    camera.lookAt(0, 0, 0);

    // Inisialisasi Renderer
    renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
    renderer.setSize(width, height);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    renderer.setClearColor(0x000000, 0);
    container.appendChild(renderer.domElement);

    // Lighting
    const ambientLight = new THREE.AmbientLight(0xffffff, 0.6);
    scene.add(ambientLight);

    const dirLight = new THREE.DirectionalLight(0xffffff, 1.2);
    dirLight.position.set(3, 5, 2);
    scene.add(dirLight);

    const fillLight = new THREE.PointLight(0x60a5fa, 0.8);
    fillLight.position.set(-2, 2, 3);
    scene.add(fillLight);

    const backLight = new THREE.PointLight(0x3b82f6, 0.3);
    backLight.position.set(0, 1, -3);
    scene.add(backLight);

    // Load Model
    const loader = new GLTFLoader();
    
    loader.load(
        '/models/character.glb.backup',
        (gltf) => {
            model = gltf.scene;
            
            model.traverse((child) => {
                if (child.isMesh && child.material) {
                    if (Array.isArray(child.material)) {
                        child.material.forEach(mat => {
                            mat.roughness = Math.max(mat.roughness || 0, 0.6);
                            mat.metalness = Math.min(mat.metalness || 0, 0.2);
                        });
                    } else {
                        child.material.roughness = Math.max(child.material.roughness || 0, 0.6);
                        child.material.metalness = Math.min(child.material.metalness || 0, 0.2);
                    }
                }
            });
            
            model.scale.set(1.2, 1.2, 1.2);
            model.position.set(0, -1.0, 0);
            scene.add(model);
            
            if (gltf.animations && gltf.animations.length > 0) {
                mixer = new THREE.AnimationMixer(model);
                const action = mixer.clipAction(gltf.animations[0]);
                action.setLoop(THREE.LoopRepeat);
                action.play();
            }
            
            if (loaderContainer) {
                loaderContainer.style.opacity = '0';
                setTimeout(() => {
                    if (loaderContainer) loaderContainer.style.display = 'none';
                }, 500);
            }
            
            console.log('Karakter 3D berhasil dimuat!');
        },
        (xhr) => {
            const percent = Math.floor((xhr.loaded / xhr.total) * 100);
            if (loaderContainer) {
                const loadingText = loaderContainer.querySelector('span');
                if (loadingText) loadingText.innerHTML = `Memuat Karakter 3D... ${percent}%`;
            }
        },
        (error) => {
            console.error('Error loading model:', error);
            if (loaderContainer) {
                let is404 = false;
                if (error) {
                    if (error.status === 404) is404 = true;
                    else if (error.target && error.target.status === 404) is404 = true;
                    else if (typeof error.message === 'string' && error.message.includes('404')) is404 = true;
                    else if (typeof error === 'string' && error.includes('404')) is404 = true;
                }
                
                let errorMsg = "";
                if (is404) {
                    errorMsg = "Karakter 3D sedang tidak tersedia (Error 404). Kami sedang melakukan pemeliharaan aset, silakan muat ulang halaman beberapa saat lagi.";
                } else {
                    errorMsg = "Gagal memuat karakter 3D karena kendala jaringan atau berkas rusak. Silakan coba muat ulang halaman.";
                }

                loaderContainer.innerHTML = `
                    <div style="font-size: 2.5rem; margin-bottom: 0.5rem; filter: drop-shadow(0 0 8px rgba(96, 165, 250, 0.4));">🤖</div>
                    <span style="color: #cbd5e1; font-size: 13px; text-align: center; display: block; padding: 0 20px; line-height: 1.6; font-family: sans-serif;">
                        ${errorMsg}
                    </span>
                `;
            }
        }
    );

    // Drag to rotate
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

    function onWindowResize() {
        if (!container || !camera || !renderer) return;
        const w = container.clientWidth;
        const h = container.clientHeight;
        if (w === 0 || h === 0) return;
        camera.aspect = w / h;
        camera.updateProjectionMatrix();
        renderer.setSize(w, h);
    }
    
    window.addEventListener('resize', onWindowResize);
    onWindowResize();
    setTimeout(onWindowResize, 100);
    setTimeout(onWindowResize, 500);

    function animate() {
        requestAnimationFrame(animate);
        if (mixer) {
            const delta = clock.getDelta();
            mixer.update(delta);
        }
        renderer.render(scene, camera);
    }
    animate();
</script>

<script>
    // AI Chatbot Logic
    const chatBtn = document.getElementById('chatBtn');
    const chatPopup = document.getElementById('chatPopup');
    const closeChat = document.getElementById('closeChat');
    const chatInput = document.getElementById('chatInput');
    const sendMsg = document.getElementById('sendMsg');
    const chatMessages = document.getElementById('chatMessages');
    
    if (chatBtn) chatBtn.onclick = () => { chatPopup.style.display = 'block'; };
    if (closeChat) closeChat.onclick = () => { chatPopup.style.display = 'none'; };
    
    function addMessage(text, isUser = false) {
        const msgDiv = document.createElement('div');
        msgDiv.className = isUser ? 'user-msg' : 'bot-msg';
        msgDiv.innerHTML = isUser ? text : '🤖 ' + text;
        chatMessages.appendChild(msgDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }
    
    function getBotReply(msg) {
        const lower = msg.toLowerCase();
        if (lower.includes('film') || lower.includes('dokumenter')) {
            return 'Eryko memiliki 13 film dokumenter: CANDI DERMO, DOLANAN LAWAS, HARTA LOKAL, JARANAN, KAMPUNG BATIK, KREWENG, PANGGUNG CERITA, Rasa dari Bapak, Hotspot, Last Order, Lontong Balap, Amplop untuk Siti, dan Khong Guan. Klik tab "Karya Film"! 🎬';
        } else if (lower.includes('yearbook')) {
            return 'Yearbook photography: Old Money, StreetWear, Cinematic Look, Minimalist, Urban Style. Klik "Fotografi Yearbook"! 📸';
        } else if (lower.includes('brand') || lower.includes('content')) {
            return '6 brand: trustmed.id, multindoplastic, botolplastik_sap, amariroof, amarispunbond, suryasuksesgroup. Cek "Content Creator"! 📱';
        } else if (lower.includes('kontak') || lower.includes('email') || lower.includes('ig')) {
            return '📧 erykodwicahyo11@gmail.com\n📷 @erykodwi\n📞 +62 831 7225 1379';
        } else if (lower.includes('prestasi') || lower.includes('sertifikat')) {
            return '🏆 Juara 2 Film Nasional Banyuwangi, Magang PT Suryasukses, Magang Skak Studio, Lulus Magang SeStudio. Cek "Pencapaian"!';
        } else {
            return 'Coba tanya: film, yearbook, brand, kontak, atau prestasi. ✨';
        }
    }
    
    function sendMessage() {
        const msg = chatInput.value.trim();
        if (!msg) return;
        addMessage(msg, true);
        chatInput.value = '';
        setTimeout(() => {
            const reply = getBotReply(msg);
            addMessage(reply);
        }, 500);
    }
    
    if (sendMsg) sendMsg.onclick = sendMessage;
    if (chatInput) chatInput.onkeypress = (e) => { if (e.key === 'Enter') sendMessage(); };
    
    document.querySelectorAll('.quick-reply').forEach(btn => {
        btn.onclick = () => {
            const msg = btn.getAttribute('data-msg');
            addMessage(msg, true);
            setTimeout(() => {
                const reply = getBotReply(msg);
                addMessage(reply);
            }, 500);
        };
    });
</script>
@endsection
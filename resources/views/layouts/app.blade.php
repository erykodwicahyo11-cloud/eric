<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Eryko Dwi Cahyo - Portofolio')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }
        
        /* CINEMATIC DARK CHARCOAL BACKGROUND - GLOBAL */
        body {
            background: #1a1a1a;
            position: relative;
            min-height: 100vh;
        }
        
        /* Concrete Texture + Vignette */
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                repeating-linear-gradient(
                    0deg,
                    rgba(30, 30, 30, 0.4) 0px,
                    rgba(30, 30, 30, 0.4) 1px,
                    transparent 1px,
                    transparent 3px
                ),
                repeating-linear-gradient(
                    90deg,
                    rgba(25, 25, 25, 0.3) 0px,
                    rgba(25, 25, 25, 0.3) 1px,
                    transparent 1px,
                    transparent 4px
                ),
                radial-gradient(circle at 30% 40%, rgba(45, 45, 45, 0.6) 0%, rgba(20, 20, 20, 0.9) 100%);
            background-blend-mode: overlay;
            pointer-events: none;
            z-index: 0;
        }
        
        /* Vignette effect */
        body::after {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(ellipse at center, transparent 50%, rgba(0, 0, 0, 0.5) 100%);
            pointer-events: none;
            z-index: 0;
        }
        
        /* NAVIGATION - Transparent dengan border bawah tipis */
        .cinematic-nav {
            background: rgba(10, 10, 10, 0.7);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(120, 120, 120, 0.2);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .nav-link {
            color: #c0c0c0;
            transition: all 0.2s ease;
            font-weight: 500;
            position: relative;
        }
        
        .nav-link:hover {
            color: #d97a3e;
        }
        
        /* Active link indicator */
        .nav-link.active {
            color: #d97a3e;
        }
        
        .nav-link.active::after {
            content: "";
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 100%;
            height: 2px;
            background: #d97a3e;
            border-radius: 2px;
        }
        
        .logo {
            color: #e8e8e8;
            font-weight: 700;
            font-size: 1.25rem;
            letter-spacing: -0.3px;
        }
        
        .logo span {
            color: #d97a3e;
        }
        
        /* FOOTER - Elegan transparan */
        .cinematic-footer {
            background: rgba(10, 10, 10, 0.5);
            backdrop-filter: blur(8px);
            border-top: 1px solid rgba(80, 80, 80, 0.2);
            position: relative;
            z-index: 1;
        }
        
        /* Main content wrapper */
        .main-content {
            position: relative;
            z-index: 1;
        }
        
        /* Scrollbar kustom */
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #1a1a1a;
        }
        ::-webkit-scrollbar-thumb {
            background: #d97a3e;
            border-radius: 10px;
        }
    </style>
    @stack('styles')
</head>
<body>

    <!-- NAVIGASI -->
    <nav class="cinematic-nav py-4 px-6 md:px-12">
        <div class="max-w-7xl mx-auto flex flex-wrap justify-between items-center">
            <a href="{{ route('landing') }}" class="logo">Eryko dwi cahyo<span>.</span></a>
            <div class="flex space-x-6 mt-2 sm:mt-0">
                <a href="{{ route('landing') }}" class="nav-link {{ request()->routeIs('landing') ? 'active' : '' }}">Beranda</a>
                <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">Tentang</a>
                <a href="{{ route('portfolio') }}" class="nav-link {{ request()->routeIs('portfolio') ? 'active' : '' }}">Portofolio</a>
                <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Kontak</a>
            </div>
        </div>
    </nav>

    <!-- KONTEN UTAMA -->
    <main class="main-content py-12 px-4 md:px-8">
        <div class="max-w-7xl mx-auto">
            @yield('content')
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="cinematic-footer py-8 px-4 text-center">
        <div class="max-w-7xl mx-auto">
            <p class="text-gray-500 text-sm">© 2026 Eryko Dwi Cahyo. Dokumentasi budaya Jawa Timur.</p>
        </div>
    </footer>
    <!-- ========== AI BOT CHATBOT ========== -->
    <div class="fixed bottom-6 right-6 z-50">
        <!-- Tombol Chatbot -->
        <div id="chatbotBtn" class="w-14 h-14 rounded-full bg-gradient-to-r from-orange-500 to-orange-700 cursor-pointer shadow-lg hover:scale-110 transition flex items-center justify-center text-2xl">
            🤖
        </div>
        
        <!-- Popup Chat -->
        <div id="chatbotPopup" class="hidden absolute bottom-20 right-0 w-80 bg-black/80 backdrop-blur-lg rounded-2xl border border-white/20 shadow-2xl">
            <div class="flex justify-between items-center p-3 border-b border-white/20">
                <span class="font-bold text-white">🎬 AI Assistant - Eryko</span>
                <button id="closeChatbot" class="text-gray-400 hover:text-white">✕</button>
            </div>
            <div id="chatMessages" class="h-80 overflow-y-auto p-3 space-y-2 text-sm">
                <div class="bg-orange-500/20 p-2 rounded-lg">🤖 Halo! Selamat datang di portofolio Eryko Dwi Cahyo. Ada yang ingin kamu tanyakan?</div>
            </div>
            <div class="p-3 border-t border-white/20 flex gap-2">
                <input type="text" id="chatInput" placeholder="Tanya tentang film, yearbook, kontak..." class="flex-1 bg-black/50 border border-white/20 rounded-lg px-3 py-2 text-sm text-white focus:outline-none focus:border-orange-500">
                <button id="sendChat" class="bg-orange-600 px-3 py-2 rounded-lg text-sm hover:bg-orange-700 transition">Kirim</button>
            </div>
        </div>
    </div>

    <script>
        // Chatbot elements
        const chatbotBtn = document.getElementById('chatbotBtn');
        const chatbotPopup = document.getElementById('chatbotPopup');
        const closeChatbot = document.getElementById('closeChatbot');
        const sendChat = document.getElementById('sendChat');
        const chatInput = document.getElementById('chatInput');
        const chatMessages = document.getElementById('chatMessages');

        // Toggle popup
        chatbotBtn.onclick = () => chatbotPopup.classList.toggle('hidden');
        closeChatbot.onclick = () => chatbotPopup.classList.add('hidden');

        function addMessage(text, isUser = false) {
            const div = document.createElement('div');
            div.className = isUser ? 'text-right' : '';
            div.innerHTML = isUser ? `<div class="bg-orange-600/30 p-2 rounded-lg inline-block max-w-[90%] text-right">👤 ${text}</div>` : `<div class="bg-orange-500/20 p-2 rounded-lg inline-block max-w-[90%]">🤖 ${text}</div>`;
            chatMessages.appendChild(div);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        // Jawaban pintar chatbot
        function getBotReply(message) {
            const msg = message.toLowerCase();
            
            if (msg.includes('film') || msg.includes('dokumenter')) {
                return 'Eryko punya 13 film dokumenter budaya Jawa Timur: CANDI DERMO, DOLANAN LAWAS, HARTA LOKAL, JARANAN, KAMPUNG BATIK, KREWENG, PANGGUNG CERITA, Rasa dari Bapak, Hotspot, Last Order, Lontong Balap, Amplop untuk Siti, dan Khong Guan. Klik tab "Karya Film" untuk lihat detailnya! 🎬';
            }
            else if (msg.includes('yearbook')) {
                return 'Yearbook photography tersedia dalam 5 tema: Vintage Classic, Modern Elegant, Cinematic Look, Minimalist, Urban Style. Klik tab "Fotografi Yearbook" ya! 📸';
            }
            else if (msg.includes('content creator') || msg.includes('akun') || msg.includes('sosmed')) {
                return 'Eryko memiliki akun di Instagram (@eryko_documentary, @eryko_portfolio) dan TikTok (@eryko_film, @eryko_studio). Total 6 akun dengan berbagai jenis konten dokumenter dan branding. 📱';
            }
            else if (msg.includes('kontak') || msg.includes('email') || msg.includes('ig') || msg.includes('instagram')) {
                return '📧 Email: erykodwicahyo@gmail.com\n📷 Instagram: @erykodwicahyo\n▶️ YouTube: /ErykodwiCahyo\n💼 LinkedIn: Eryko Dwi Cahyo';
            }
            else if (msg.includes('prestasi') || msg.includes('sertifikat') || msg.includes('juara')) {
                return '🏆 Prestasi Eryko:\n1. Juara 2 Film Nasional - Banyuwangi Film Festival\n2. Magang PT Suryasukses Group\n3. Sertifikat Magang Skak Studio\n4. Sertifikat Lulus Magang SeStudio\nTotal 4 sertifikat! Cek tab "Pencapaian" untuk detail.';
            }
            else if (msg.includes('makasih') || msg.includes('terima kasih')) {
                return 'Sama-sama! Senang bisa membantu. Semangat terus berkarya! 🔥🎬';
            }
            else if (msg.includes('halo') || msg.includes('hai')) {
                return 'Halo juga! Selamat datang di portofolio Eryko. Ada yang bisa saya bantu? 👋';
            }
            else {
                return 'Maaf, saya belum mengerti. Coba tanya tentang:\n- Film dokumenter\n- Yearbook photography\n- Content creator\n- Kontak\n- Prestasi & sertifikat';
            }
        }

        sendChat.onclick = () => {
            const msg = chatInput.value.trim();
            if (!msg) return;
            addMessage(msg, true);
            chatInput.value = '';

            setTimeout(() => {
                const reply = getBotReply(msg);
                addMessage(reply);
            }, 500);
        };
        
        chatInput.onkeypress = (e) => {
            if (e.key === 'Enter') sendChat.onclick();
        };
    </script>
    @stack('scripts')
</body>
</html>
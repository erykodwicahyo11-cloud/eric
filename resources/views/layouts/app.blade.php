<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pongo Portfolio')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }
        body {
            background: linear-gradient(135deg, #0a0a0a 0%, #1a0b12 50%, #0a0a0a 100%);
            background-attachment: fixed;
        }
        .glass-card {
            background: rgba(45, 20, 30, 0.4);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 43, 109, 0.2);
            border-radius: 1rem;
        }
        .glass-nav {
            background: rgba(10, 10, 10, 0.8);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 43, 109, 0.3);
        }
        .btn-rose {
            background: transparent;
            border: 1px solid #ff2a6d;
            color: #ff2a6d;
            transition: all 0.3s ease;
        }
        .btn-rose:hover {
            background: #ff2a6d;
            color: #0a0a0a;
            box-shadow: 0 0 15px rgba(255, 43, 109, 0.5);
        }
        .text-rose {
            color: #ff6b9d;
        }
        .border-rose {
            border-color: #ff2a6d;
        }
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #1a0b12;
        }
        ::-webkit-scrollbar-thumb {
            background: #ff2a6d;
            border-radius: 10px;
        }
    </style>
    @stack('styles')
</head>
<body class="text-white">

    <!-- NAVIGASI -->
    <nav class="glass-nav fixed top-0 left-0 w-full z-50 py-4 px-6 md:px-12">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="{{ route('landing') }}" class="text-2xl font-bold text-rose-400">Pongo<span class="text-white">.</span></a>
            <div class="hidden md:flex space-x-8">
                <a href="{{ route('landing') }}" class="hover:text-rose-400 transition">Home</a>
                <a href="{{ route('about') }}" class="hover:text-rose-400 transition">About</a>
                <a href="{{ route('portfolio') }}" class="hover:text-rose-400 transition">Portfolio</a>
                <a href="{{ route('contact') }}" class="hover:text-rose-400 transition">Contact</a>
            </div>
        </div>
    </nav>

    <!-- KONTEN UTAMA -->
    <main class="pt-24 pb-12 px-4 md:px-8">
        <div class="max-w-6xl mx-auto">
            @yield('content')
        </div>
    </main>

    <!-- AI WIDGET (POJOK KANAN BAWAH) -->
    <div class="fixed bottom-6 right-6 z-50">
        <div class="glass-card p-3 rounded-full cursor-pointer hover:scale-105 transition-transform duration-300 shadow-lg" id="aiWidgetBtn">
            <div class="w-12 h-12 rounded-full bg-gradient-to-r from-rose-500 to-pink-600 flex items-center justify-center text-2xl">
                🤖
            </div>
        </div>

        <!-- POPUP AI CHAT (HIDE DULU) -->
        <div id="aiPopup" class="hidden glass-card w-80 p-4 rounded-2xl absolute bottom-20 right-0 shadow-2xl">
            <div class="flex justify-between items-center mb-3">
                <h3 class="font-semibold text-rose-300">🤖 AI Assistant</h3>
                <button id="closeAiPopup" class="text-gray-400 hover:text-white">✕</button>
            </div>
            <div id="aiMessages" class="h-64 overflow-y-auto mb-3 space-y-2 text-sm">
                <div class="bg-rose-500/20 p-2 rounded-lg">Halo! Ada yang bisa aku bantu? 😊</div>
            </div>
            <div class="flex gap-2">
                <input type="text" id="aiInput" placeholder="Tanya apapun..." class="flex-1 bg-black/50 border border-rose-500/30 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-rose-500">
                <button id="aiSend" class="bg-rose-500 px-3 py-2 rounded-lg text-sm hover:bg-rose-600 transition">Kirim</button>
            </div>
        </div>
    </div>

    <script>
        // Toggle AI Popup
        const btn = document.getElementById('aiWidgetBtn');
        const popup = document.getElementById('aiPopup');
        const closeBtn = document.getElementById('closeAiPopup');

        btn.addEventListener('click', () => {
            popup.classList.toggle('hidden');
        });

        closeBtn.addEventListener('click', () => {
            popup.classList.add('hidden');
        });

        // AI Sederhana (fake AI untuk demo)
        const sendBtn = document.getElementById('aiSend');
        const aiInput = document.getElementById('aiInput');
        const aiMessages = document.getElementById('aiMessages');

        function addMessage(text, isUser = false) {
            const div = document.createElement('div');
            div.className = isUser ? 'bg-rose-800/50 p-2 rounded-lg text-right' : 'bg-rose-500/20 p-2 rounded-lg';
            div.innerHTML = isUser ? `👤 ${text}` : `🤖 ${text}`;
            aiMessages.appendChild(div);
            aiMessages.scrollTop = aiMessages.scrollHeight;
        }

        sendBtn.addEventListener('click', () => {
            const msg = aiInput.value.trim();
            if (!msg) return;
            addMessage(msg, true);
            aiInput.value = '';

            setTimeout(() => {
                let reply = 'Maaf, aku masih belajar. Coba tanya tentang portfolio, skill, atau contact ya!';
                if (msg.toLowerCase().includes('nama')) reply = 'Namanya Pongo! Web Developer dan 3D Enthusiast.';
                else if (msg.toLowerCase().includes('skill')) reply = 'Skill: PHP, Laravel, JavaScript, Tailwind, MySQL, Three.js!';
                else if (msg.toLowerCase().includes('contact')) reply = 'Bisa lewat halaman Contact ya, atau DM ke IG @pongo!';
                else if (msg.toLowerCase().includes('portfolio')) reply = 'Cek halaman Portfolio buat lihat karya-karyaku!';
                addMessage(reply);
            }, 500);
        });

        aiInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') sendBtn.click();
        });
    </script>
    @stack('scripts')
</body>
</html>
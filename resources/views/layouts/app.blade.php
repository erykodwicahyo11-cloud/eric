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

    @stack('scripts')
</body>
</html>
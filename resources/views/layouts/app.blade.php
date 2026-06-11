<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Eryko Dwi Cahyo - Portofolio')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Cormorant+Garamond:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Body text font - clean & readable */
        body, p, li, .text-body, button, .btn, input, textarea {
            font-family: 'Outfit', sans-serif;
        }
        
        /* Headline font - elegant & bold */
        h1, h2, h3, h4, .headline, .logo {
            font-family: 'Cormorant Garamond', serif;
            font-weight: 600;
            letter-spacing: -0.02em;
        }
        
        /* Background biru monokrom - lebih gelap & elegan */
        body {
            background: linear-gradient(145deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);
            position: relative;
        }
        
        /* Subtle texture & grid */
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                repeating-linear-gradient(45deg, rgba(59, 130, 246, 0.02) 0px, rgba(59, 130, 246, 0.02) 1px, transparent 1px, transparent 20px),
                url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.03'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 0;
        }
        
        body::after {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(ellipse at 50% 30%, rgba(30, 58, 138, 0.15) 0%, transparent 70%);
            pointer-events: none;
            z-index: 0;
        }
        
        /* Navbar glass - lebih gelap */
        .navbar-glass {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(59, 130, 246, 0.2);
        }
        
        .nav-link {
            color: #94a3b8;
            transition: all 0.2s ease;
            font-weight: 500;
            position: relative;
        }
        .nav-link:hover {
            color: #60a5fa;
        }
        .nav-link.active {
            color: #60a5fa;
        }
        .nav-link.active::after {
            content: "";
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 100%;
            height: 2px;
            background: #60a5fa;
            border-radius: 2px;
        }
        
        /* Buttons */
        .btn-primary {
            background: #2563eb;
            color: white;
            padding: 12px 32px;
            border-radius: 40px;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-block;
            border: none;
            cursor: pointer;
        }
        .btn-primary:hover {
            background: #3b82f6;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px -5px rgba(37, 99, 235, 0.4);
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
            cursor: pointer;
        }
        .btn-secondary:hover {
            background: rgba(96, 165, 250, 0.1);
            transform: translateY(-2px);
        }
        
        /* Cards */
        .glass-card {
            background: rgba(30, 41, 59, 0.6);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            border: 1px solid rgba(59, 130, 246, 0.15);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }
        .glass-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            border-color: rgba(59, 130, 246, 0.3);
        }
        
        .section-title {
            color: #e2e8f0;
            font-weight: 600;
            font-size: 2rem;
            border-left: 4px solid #3b82f6;
            padding-left: 16px;
            margin-bottom: 32px;
        }
        
        /* Footer */
        .footer-glass {
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(8px);
            border-top: 1px solid rgba(59, 130, 246, 0.1);
        }
        
        /* Text colors */
        .text-primary-light {
            color: #60a5fa;
        }
        .text-secondary-light {
            color: #94a3b8;
        }
    </style>
    @stack('styles')
</head>
<body>

    <!-- NAVIGASI -->
    <nav class="navbar-glass sticky top-0 z-50 py-4 px-6 md:px-12">
        <div class="max-w-7xl mx-auto flex flex-wrap justify-between items-center">
            <a href="{{ route('landing') }}" class="text-3xl font-bold logo text-white">Crafting Stories Through the Lens   <span class="text-[#3b82f6]">.</span></a>
            <div class="flex space-x-6 mt-2 sm:mt-0">
                <a href="{{ route('landing') }}" class="nav-link {{ request()->routeIs('landing') ? 'active' : '' }}">Beranda</a>
                <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">Tentang</a>
                <a href="{{ route('portfolio') }}" class="nav-link {{ request()->routeIs('portfolio') ? 'active' : '' }}">Portofolio</a>
                <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Kontak</a>
            </div>
        </div>
    </nav>

    <!-- KONTEN UTAMA -->
    <main class="relative z-10 py-12 px-4 md:px-8">
        <div class="max-w-7xl mx-auto">
            @yield('content')
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="footer-glass py-8 px-4 text-center">
        <div class="max-w-7xl mx-auto">
            <p class="text-gray-400 text-sm">© 2026 Eryko Dwi Cahyo. Dokumentasi budaya Jawa Timur.</p>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
@extends('layouts.app')

@section('title', 'Portfolio - Pongo Portfolio')

@section('content')
<div class="py-8">
    <h2 class="text-4xl font-bold mb-8 text-center text-rose-400">Portofolio</h2>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @php
        $portfolios = [
            ['title' => 'Web Profile Pribadi', 'desc' => 'Website portfolio dengan Laravel & Tailwind', 'tech' => 'Laravel 13, Tailwind', 'icon' => '🌐'],
            ['title' => 'Sistem Informasi Sekolah', 'desc' => 'CRUD siswa, guru, dan nilai', 'tech' => 'Laravel 10, Bootstrap', 'icon' => '🏫'],
            ['title' => 'Landing Page 3D', 'desc' => 'Landing page dengan animasi Three.js', 'tech' => 'Three.js, HTML/CSS', 'icon' => '🎮'],
        ];
        @endphp
        @foreach($portfolios as $item)
        <div class="glass-card p-6 hover:scale-105 transition-transform duration-300">
            <div class="text-4xl mb-3">{{ $item['icon'] }}</div>
            <h3 class="text-xl font-semibold text-rose-300">{{ $item['title'] }}</h3>
            <p class="text-gray-400 text-sm mt-2">{{ $item['desc'] }}</p>
            <p class="text-xs text-rose-500/70 mt-3">{{ $item['tech'] }}</p>
        </div>
        @endforeach
    </div>
</div>
@endsection
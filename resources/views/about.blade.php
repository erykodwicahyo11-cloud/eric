@extends('layouts.app')

@section('title', 'About - Pongo Portfolio')

@section('content')
<div class="py-8">
    <h2 class="text-4xl font-bold mb-8 text-center text-rose-400">Tentang Saya</h2>
    <div class="glass-card p-8">
        <div class="flex flex-col md:flex-row gap-8 items-center md:items-start">
            <div class="w-48 h-48 rounded-full bg-gradient-to-br from-rose-500 to-pink-600 flex items-center justify-center text-6xl shadow-xl">
                📸
            </div>
            <div class="flex-1 space-y-4">
                <p class="text-gray-300">Halo! Saya <strong class="text-rose-300">Pongo</strong>, seorang Web Developer yang memiliki passion di bidang pengembangan web modern dan 3D animation.</p>
                <p class="text-gray-300">Saat ini saya mendalami Laravel, Tailwind CSS, dan Three.js untuk menciptakan website yang tidak hanya fungsional, tapi juga estetik dan interaktif.</p>
                <div class="pt-4">
                    <h3 class="text-xl font-semibold text-rose-300 mb-3">Skills & Tools</h3>
                    <div class="flex flex-wrap gap-2">
                        <span class="bg-rose-500/20 border border-rose-500/30 px-3 py-1 rounded-full text-sm">PHP</span>
                        <span class="bg-rose-500/20 border border-rose-500/30 px-3 py-1 rounded-full text-sm">Laravel</span>
                        <span class="bg-rose-500/20 border border-rose-500/30 px-3 py-1 rounded-full text-sm">JavaScript</span>
                        <span class="bg-rose-500/20 border border-rose-500/30 px-3 py-1 rounded-full text-sm">Tailwind CSS</span>
                        <span class="bg-rose-500/20 border border-rose-500/30 px-3 py-1 rounded-full text-sm">MySQL</span>
                        <span class="bg-rose-500/20 border border-rose-500/30 px-3 py-1 rounded-full text-sm">Three.js</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
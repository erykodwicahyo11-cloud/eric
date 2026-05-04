@extends('layouts.app')

@section('title', 'Home - Pongo Portfolio')

@section('content')
<div class="min-h-[80vh] flex flex-col justify-center items-center text-center">
    <div class="mb-8">
        <div class="w-48 h-48 mx-auto bg-gradient-to-br from-rose-500/20 to-pink-600/20 rounded-full flex items-center justify-center border-2 border-rose-500/50 shadow-2xl">
            <span class="text-7xl">🧑‍💻</span>
        </div>
    </div>
    <h1 class="text-5xl md:text-7xl font-bold mb-4 bg-gradient-to-r from-rose-400 to-pink-500 bg-clip-text text-transparent">
        Pongo Saputra
    </h1>
    <p class="text-xl md:text-2xl text-gray-300 mb-6">Web Developer & 3D Enthusiast</p>
    <p class="text-gray-400 max-w-lg mb-8">Membangun pengalaman web yang interaktif, modern, dan berkarakter.</p>
    <a href="{{ route('portfolio') }}" class="btn-rose px-8 py-3 rounded-full font-semibold inline-block">
        Lihat Portofolio →
    </a>
</div>
@endsection

@push('styles')
<style>
    /* Karakter 3D bisa ditambahkan nanti pake Spline/Three.js */
</style>
@endpush
@extends('layouts.app')

@section('title', 'Beranda - Eryko Dwi Cahyo')

@section('content')
<div class="flex flex-col items-center justify-center text-center py-20 px-4">
    <div class="max-w-3xl mx-auto">
        <h1 class="text-5xl md:text-7xl font-bold text-white mb-4">Eryko Dwi Cahyo</h1>
        <p class="text-xl text-gray-300 mb-6">Documentary Filmmaker & Content Creator</p>
        <p class="text-gray-400 max-w-2xl mb-8 leading-relaxed">
            Mendokumentasikan cerita dari Jawa Timur. Candi, kesenian tradisional, kuliner lokal, dan kearifan yang nyaris terlupakan — saya rekam dalam film pendek dokumenter.
        </p>
        <a href="{{ route('portfolio') }}" class="inline-block bg-[#d97a3e] hover:bg-[#b55a2a] text-white font-medium py-3 px-8 rounded-full transition duration-300">
            Lihat Portofolio Saya
        </a>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('title', 'Kontak - Eryko Dwi Cahyo')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-black/30 backdrop-blur-sm rounded-2xl p-8 md:p-10 border border-white/10">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-6 border-l-4 border-[#d97a3e] pl-4">Hubungi Saya</h2>
        
        <p class="text-gray-300 mb-8 leading-relaxed">
            Tertarik bekerja sama atau ada proyek dokumentasi? Silakan hubungi saya melalui:
        </p>
        
        <div class="space-y-4">
            <div class="flex items-center gap-4 p-3 rounded-lg bg-white/5">
                <span class="text-[#d97a3e] font-semibold w-24">Email</span>
                <span class="text-gray-300">erykodwicahyo@gmail.com</span>
            </div>
            <div class="flex items-center gap-4 p-3 rounded-lg bg-white/5">
                <span class="text-[#d97a3e] font-semibold w-24">Instagram</span>
                <span class="text-gray-300">@erykodwicahyo</span>
            </div>
            <div class="flex items-center gap-4 p-3 rounded-lg bg-white/5">
                <span class="text-[#d97a3e] font-semibold w-24">YouTube</span>
                <span class="text-gray-300">/ErykodwiCahyo</span>
            </div>
        </div>
        
        <div class="mt-8 pt-6 border-t border-white/10">
            <p class="text-gray-400 text-sm text-center">
                Saya akan merespon dalam 1x24 jam.
            </p>
        </div>
    </div>
</div>
@endsection
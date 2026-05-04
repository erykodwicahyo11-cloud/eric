@extends('layouts.app')

@section('title', 'Contact - Pongo Portfolio')

@section('content')
<div class="py-8">
    <h2 class="text-4xl font-bold mb-8 text-center text-rose-400">Hubungi Saya</h2>
    <div class="grid md:grid-cols-2 gap-8">
        <div class="glass-card p-6">
            <h3 class="text-xl font-semibold mb-4 text-rose-300">Informasi Kontak</h3>
            <div class="space-y-3 text-gray-300">
                <p>📧 <strong>Email:</strong> pongo@example.com</p>
                <p>📱 <strong>Telepon:</strong> +62 812 3456 7890</p>
                <p>🌐 <strong>Instagram:</strong> @pongo.dev</p>
                <p>💻 <strong>GitHub:</strong> github.com/pongo-dev</p>
            </div>
        </div>
        <div class="glass-card p-6">
            <h3 class="text-xl font-semibold mb-4 text-rose-300">Kirim Pesan</h3>
            <form>
                <div class="mb-4">
                    <input type="text" placeholder="Nama lengkap" class="w-full bg-black/50 border border-rose-500/30 rounded-lg px-4 py-2 focus:outline-none focus:border-rose-500 text-white">
                </div>
                <div class="mb-4">
                    <input type="email" placeholder="Email" class="w-full bg-black/50 border border-rose-500/30 rounded-lg px-4 py-2 focus:outline-none focus:border-rose-500 text-white">
                </div>
                <div class="mb-4">
                    <textarea rows="4" placeholder="Pesan..." class="w-full bg-black/50 border border-rose-500/30 rounded-lg px-4 py-2 focus:outline-none focus:border-rose-500 text-white"></textarea>
                </div>
                <button type="button" class="btn-rose w-full py-2 rounded-lg font-semibold" onclick="alert('Fitur ini akan segera hadir!')">Kirim Pesan</button>
            </form>
            <p class="text-gray-500 text-xs mt-4 text-center">* Form masih demo, data tidak tersimpan.</p>
        </div>
    </div>
</div>
@endsection
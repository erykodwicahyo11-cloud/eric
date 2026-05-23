@extends('layouts.app')

@section('title', 'Portofolio - Eryko Dwi Cahyo')

@section('content')

<style>
    /* Tab Styles */
    .tab-btn {
        background: transparent;
        color: #b0b0b0;
        border: none;
        padding: 12px 24px;
        font-size: 0.95rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        border-bottom: 2px solid transparent;
    }
    .tab-btn.active {
        color: #d97a3e;
        border-bottom-color: #d97a3e;
    }
    .tab-btn:hover {
        color: #d97a3e;
    }
    
    /* Card Styles */
    .cert-card {
        background: rgba(30, 30, 30, 0.6);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 16px;
        transition: all 0.3s ease;
    }
    .cert-card:hover {
        transform: translateY(-4px);
        border-color: rgba(217, 122, 62, 0.4);
    }
    
    /* Carousel Styles */
    .swiper {
        width: 100%;
        padding-bottom: 40px;
    }
    .swiper-slide {
        text-align: center;
        background: rgba(30, 30, 30, 0.4);
        border-radius: 16px;
        padding: 20px;
    }
    .swiper-button-next, .swiper-button-prev {
        color: #d97a3e;
    }
    .swiper-pagination-bullet {
        background: #b0b0b0;
    }
    .swiper-pagination-bullet-active {
        background: #d97a3e;
    }
    
    /* Film layout sama seperti sebelumnya */
    .film-row {
        border-bottom: 1px solid rgba(80, 80, 80, 0.3);
        transition: all 0.3s ease;
    }
    .film-row:last-child {
        border-bottom: none;
    }
    .film-poster {
        border-radius: 12px;
        box-shadow: 0 15px 30px -10px rgba(0, 0, 0, 0.4);
        transition: transform 0.3s ease;
        cursor: pointer;
    }
    .film-poster:hover {
        transform: scale(1.02);
    }
    .btn-watch {
        background: rgba(30, 30, 30, 0.8);
        border: 1px solid rgba(200, 200, 200, 0.3);
        color: #e0e0e0;
        padding: 10px 28px;
        border-radius: 40px;
        font-weight: 500;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    .btn-watch:hover {
        background: #d97a3e;
        border-color: #d97a3e;
        color: #0a0a0a;
        transform: translateX(4px);
    }
    
    /* Yearbook & Content Card */
    .yearbook-card, .content-card {
        background: rgba(30, 30, 30, 0.4);
        border-radius: 16px;
        padding: 16px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-align: center;
    }
    .yearbook-card:hover, .content-card:hover {
        transform: translateY(-5px);
        background: rgba(50, 50, 50, 0.6);
        border: 1px solid rgba(217, 122, 62, 0.4);
    }
    .yearbook-img, .content-img {
        width: 100%;
        aspect-ratio: 1 / 1;
        object-fit: cover;
        border-radius: 12px;
        margin-bottom: 12px;
    }
    
    /* Modal Popup */
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.95);
        z-index: 1000;
        align-items: center;
        justify-content: center;
        overflow-y: auto;
    }
    .modal.active {
        display: flex;
    }
    .modal-content {
        max-width: 800px;
        width: 90%;
        background: #1a1a1a;
        border-radius: 20px;
        position: relative;
        padding: 20px;
        border: 1px solid rgba(217, 122, 62, 0.3);
    }
    .modal-close {
        position: absolute;
        top: 15px;
        right: 20px;
        font-size: 28px;
        cursor: pointer;
        color: #b0b0b0;
        transition: color 0.3s;
    }
    .modal-close:hover {
        color: #d97a3e;
    }
    .placeholder-img {
        background: rgba(50, 50, 50, 0.6);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #8a8a8a;
        font-size: 14px;
        min-height: 200px;
    }
</style>

<!-- CSS Swiper.js -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<div class="portfolio-page py-8">
    <div class="max-w-6xl mx-auto px-4">
        
        <!-- Header -->
        <div class="text-center mb-10">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-3">Portofolio</h1>
            <p class="text-gray-400">Pilih kategori di bawah untuk melihat karyaku</p>
        </div>

        <!-- TAB NAVIGATION -->
        <div class="flex flex-wrap justify-center border-b border-white/10 mb-10">
            <button class="tab-btn active" onclick="showTab('film')">Karya Film</button>
            <button class="tab-btn" onclick="showTab('photo')">Fotografi Yearbook</button>
            <button class="tab-btn" onclick="showTab('content')">Content Creator</button>
            <button class="tab-btn" onclick="showTab('commercial')">Komersil</button>
            <button class="tab-btn" onclick="showTab('achievement')">Pencapaian</button>
        </div>

        <!-- ==================== TAB 1: KARYA FILM ==================== -->
        <div id="tab-film" class="tab-content active-tab">
            @php
            $films = [
                ['title' => 'CANDI DERMO', 'poster' => 'candi-dermo.jpg', 'link' => 'https://youtu.be/i1q3rRqoeoM', 'sinopsis' => 'Candi Dermo merupakan salah satu pintu suci untuk masuk ke dalam kawasan Majapahit. Diceritakan pula Candi Dermo menjadi tempat persembunyian ketika terjadi perang di Majapahit.'],
                ['title' => 'DOLANAN LAWAS', 'poster' => 'dolanan-lawas.jpg', 'link' => 'https://youtu.be/phGuAx0ciPw', 'sinopsis' => 'Permainan tradisional adalah warisan dari nenek moyang yang harus kita lestarikan karena mengandung kearifan lokal Indonesia, khususnya di Jawa Timur.'],
                ['title' => 'HARTA LOKAL', 'poster' => 'harta-lokal.jpg', 'link' => 'https://youtu.be/p82Z715noUI', 'sinopsis' => 'Pecel Semanggi adalah salah satu makanan ciri khas daerah Jawa Timur khususnya Surabaya. Bahan utama pecel ini adalah daun semanggi.'],
                ['title' => 'JARANAN', 'poster' => 'jaranan.jpg', 'link' => 'https://youtu.be/xXm-IopZHeA', 'sinopsis' => 'Jaranan adalah kesenian tradisional yang berasal dari Kediri. Pimpinan Putro Warso Wijoyo berjuang melestarikan kesenian tradisional ini.'],
                ['title' => 'KAMPUNG BATIK', 'poster' => 'kampung-batik.jpg', 'link' => 'https://youtu.be/Fw-yTkQKBHQ', 'sinopsis' => 'Batik tulis atau batik tradisional merupakan jenis batik yang proses pembuatannya dilakukan secara manual menggunakan tangan.'],
                ['title' => 'KREWENG', 'poster' => 'kreweng.jpg', 'link' => 'https://youtu.be/CEyZ-Ba0iPM', 'sinopsis' => 'Museum Kreweng sangatlah sederhana. Museum ini berbeda dari museum pada umumnya karena masih beratapkan langit dan beralaskan tanah.'],
                ['title' => 'PANGGUNG CERITA', 'poster' => 'panggung-cerita.jpg', 'link' => 'https://youtu.be/U9FqxkllgV0', 'sinopsis' => 'Ludruk bersifat menghibur dan membuat penontonnya tertawa, menggunakan bahasa khas Surabaya.'],
                ['title' => 'Rasa dari Bapak', 'poster' => 'rasa-bapak.jpg', 'link' => 'https://youtu.be/ou55DtxFpco', 'sinopsis' => 'Sebuah kisah tentang hubungan antara seorang bapak dan anaknya yang penuh makna dan rasa.'],
                ['title' => 'Hotspot', 'poster' => 'hotspot.jpg', 'link' => 'https://youtu.be/Wi_LYMpDgnI', 'sinopsis' => 'Kisah anak muda yang terjebak dalam gengsi di era digital.'],
                ['title' => 'Last Order', 'poster' => 'last-order.jpg', 'link' => 'https://youtu.be/3r3wemD_RNM', 'sinopsis' => 'Momen-momen terakhir di sebuah kedai kopi yang menyimpan banyak cerita.'],
                ['title' => 'Lontong Balap', 'poster' => 'lontong-balap.jpg', 'link' => 'https://youtu.be/orFGpNMOLJg', 'sinopsis' => 'Siti ingin mengajak Roy makan Lontong Balap setelah ngampus. Namun Siti harus menjelaskan tentang Lontong Balap.'],
                ['title' => 'Amplop untuk Siti', 'poster' => 'amplop-siti.jpg', 'link' => 'https://youtu.be/WCgd1Ve7aFI', 'sinopsis' => 'Sebuah kisah sederhana tentang ketulusan dan kejutan kecil untuk seseorang.'],
                ['title' => 'Khong Guan', 'poster' => 'khong-guan.jpg', 'link' => 'https://youtu.be/I6HaJiuaTss', 'sinopsis' => 'Iklan komersial untuk Khong Guan: Serial Ramadhan - Rumah Ep. 4 Damai.'],
            ];
            @endphp

            @foreach($films as $index => $film)
            <div class="film-row py-8 {{ $index % 2 == 0 ? 'md:flex-row' : 'md:flex-row-reverse' }} md:flex gap-8 items-start">
                <div class="md:w-2/5 mb-6 md:mb-0">
                    <img src="{{ asset('images/posters/' . $film['poster']) }}" alt="{{ $film['title'] }}" class="film-poster w-full shadow-md">
                </div>
                <div class="md:w-3/5">
                    <h2 class="text-2xl md:text-3xl font-bold text-white mb-3">{{ $film['title'] }}</h2>
                    <p class="text-gray-400 mb-5 leading-relaxed">{{ $film['sinopsis'] }}</p>
                    <a href="{{ $film['link'] }}" target="_blank" class="btn-watch">TONTON DISINI →</a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- ==================== TAB 2: FOTOGRAFI YEARBOOK ==================== -->
        <div id="tab-photo" class="tab-content" style="display: none;">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-white mb-2">Yearbook Photography</h2>
                <p class="text-gray-400">Klik salah satu untuk melihat galeri foto</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                @php
$yearbookThemes = [
    ['id' => 1, 'title' => 'Old Money', 'desc' => 'foto buku kelulusan smk barunawati jurusan', 'cover' => 'old-money-cover.jpg'],
    ['id' => 2, 'title' => 'jungle adventure', 'desc' => 'foto buku kelulusan smk barunawati jurusan', 'cover' => 'streetwear-cover.jpg'],
    ['id' => 3, 'title' => 'StreetWear', 'desc' => 'foto buku kelulusan smk barunawati jurusan', 'cover' => 'cinematic-cover.jpg'],
    ['id' => 4, 'title' => 'harry potter', 'desc' => 'foto buku kelulusan smk barunawati jurusan', 'cover' => 'minimalist-cover.jpg'],
    ['id' => 5, 'title' => 'Urban Style', 'desc' => 'foto buku kelulusan smk barunawati jurusan', 'cover' => 'urban-cover.jpg'],
];
                @endphp
                @foreach($yearbookThemes as $theme)
                <div class="yearbook-card" onclick="openYearbookModal({{ $theme['id'] }}, '{{ $theme['title'] }}', '{{ $theme['desc'] }}')">
                    <img src="{{ asset('images/yearbook/covers/' . $theme['cover']) }}" alt="{{ $theme['title'] }}" class="w-full h-48 object-cover rounded-lg mb-3" onerror="this.src='https://placehold.co/400x400/333/666?text=No+Image'">
                    <h3 class="text-white font-semibold text-sm mt-2">{{ $theme['title'] }}</h3>
                    <p class="text-gray-400 text-xs mt-1">{{ $theme['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>

         <!-- ==================== TAB 3: CONTENT CREATOR ==================== -->
        <div id="tab-content" class="tab-content" style="display: none;">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-white mb-2">Social Media Branding</h2>
                <p class="text-gray-400">Klik brand untuk melihat detail dan portofolio konten</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                @php
                $contentAccounts = [
                    [
                        'id' => 1,
                        'name' => 'trustmed.id',
                        'platform' => 'Instagram & TikTok',
                        'desc' => 'Brand masker medis premium dengan izin KEMENKES.',
                        'followers' => '660 (IG) | 441 (TT)',
                        'content_type' => 'Edukasi masker, foto produk, branding',
                        'cover' => 'trustmed.jpg'
                    ],
                    [
                        'id' => 2,
                        'name' => 'multindoplastic',
                        'platform' => 'Instagram & TikTok',
                        'desc' => 'Plastic supplies since 1989. Distributor perlengkapan rumah tangga.',
                        'followers' => '4.4K (IG) | 7.4K (TT)',
                        'content_type' => 'Katalog produk, edukasi bisnis plastik',
                        'cover' => 'multindo.jpg'
                    ],
                    [
                        'id' => 3,
                        'name' => 'botolplastik_sap',
                        'platform' => 'Instagram & TikTok',
                        'desc' => 'Supplier botol, cup plastik, preform, dan tutup gelas.',
                        'followers' => '1.1K (IG) | 5.3K (TT)',
                        'content_type' => 'Ide minuman, showcase produk, edukasi',
                        'cover' => 'botolplastik.jpg'
                    ],
                    [
                        'id' => 4,
                        'name' => 'amariroof',
                        'platform' => 'Instagram & TikTok',
                        'desc' => 'Amani UPVC Roof, solusi atap untuk semua bangunan.',
                        'followers' => '835 (IG) | 12.3K (TT)',
                        'content_type' => 'Perbandingan atap, edukasi produk, testimoni',
                        'cover' => 'amariroof.jpg'
                    ],
                    [
                        'id' => 5,
                        'name' => 'amarispunbond',
                        'platform' => 'Instagram',
                        'desc' => 'Amani Spunbond, bahan baku masker dan medis.',
                        'followers' => '604 (IG)',
                        'content_type' => 'Foto produk, spesifikasi bahan',
                        'cover' => 'amarispunbond.jpg'
                    ],
                    [
                        'id' => 6,
                        'name' => 'suryasuksesgroup',
                        'platform' => 'Instagram',
                        'desc' => 'Perusahaan manufaktur plastik terkemuka di Surabaya.',
                        'followers' => '1.4K (IG)',
                        'content_type' => 'Konten perusahaan, profil produk',
                        'cover' => 'suryasukses.jpg'
                    ],
                ];
                @endphp
                @foreach($contentAccounts as $account)
<div class="content-card cursor-pointer" onclick="openContentModal({{ $account['id'] }}, '{{ $account['name'] }}', '{{ $account['platform'] }}', '{{ $account['desc'] }}', '{{ $account['followers'] }}', '{{ $account['content_type'] }}')">
    <img src="{{ asset('images/content/' . $account['cover']) }}" 
         alt="{{ $account['name'] }}" 
         class="w-full h-40 object-cover rounded-t-lg" 
         onerror="this.src='https://placehold.co/400x300/333/666?text=No+Image'">
    <div class="p-3">
        <h3 class="text-white font-semibold text-sm">{{ $account['name'] }}</h3>
        <p class="text-orange-400 text-xs">{{ $account['platform'] }}</p>
        <p class="text-gray-400 text-xs mt-1 line-clamp-2">{{ $account['desc'] }}</p>
    </div>
</div>
                @endforeach
            </div>
        </div>
        <!-- ==================== TAB 4: KOMERSIL ==================== -->
        <div id="tab-commercial" class="tab-content" style="display: none;">
            <div class="flex flex-col md:flex-row gap-8 items-start">
                <div class="md:w-2/5">
                    <img src="{{ asset('images/posters/khong-guan.jpg') }}" alt="Khong Guan" class="film-poster w-full shadow-md">
                </div>
                <div class="md:w-3/5">
                    <h2 class="text-2xl md:text-3xl font-bold text-white mb-3">Khong Guan</h2>
                    <p class="text-gray-400 mb-5 leading-relaxed">Iklan komersial untuk Khong Guan: Serial Ramadhan - Rumah Ep. 4 Damai. Menutup cerita keempat karakter di Bulan Ramadhan dengan pesan kedamaian.</p>
                    <a href="https://youtu.be/I6HaJiuaTss" target="_blank" class="btn-watch">TONTON IKLAN →</a>
                </div>
            </div>
        </div>

        <!-- ==================== TAB 5: PENCAPAIAN & SERTIFIKAT ==================== -->
        <div id="tab-achievement" class="tab-content" style="display: none;">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-white mb-2">Pencapaian & Sertifikat</h2>
                <p class="text-gray-400">Penghargaan dan pengakuan atas karya</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <!-- Sertifikat 1 -->
                <div class="cert-card p-6 text-center">
                    <img src="{{ asset('images/certificates/juara2.jpg') }}" alt="Juara 2" class="w-full h-32 object-cover rounded-lg mb-3">
                    <h3 class="text-xl font-semibold text-white mb-2">Juara 2 Film Nasional</h3>
                    <p class="text-gray-400 text-sm">Banyuwangi Film Festival</p>
                </div>
                <!-- Sertifikat 2 -->
                <div class="cert-card p-6 text-center">
                    <img src="{{ asset('images/certificates/magang-skak-studio.jpg') }}" alt="Magang Skak Studio" class="w-full h-32 object-cover rounded-lg mb-3">
                    <h3 class="text-xl font-semibold text-white mb-2">Magang Skak Studio</h3>
                    <p class="text-gray-400 text-sm">Sertifikat magang produksi film serial loro ati season 2</p>
                </div>
                <!-- Sertifikat 3 -->
                <div class="cert-card p-6 text-center">
                    <img src="{{ asset('images/certificates/magang-sestudio.jpg') }}" alt="Magang SeStudio" class="w-full h-32 object-cover rounded-lg mb-3">
                    <h3 class="text-xl font-semibold text-white mb-2">Lulus Magang SeStudio</h3>
                    <p class="text-gray-400 text-sm">Sertifikat kelulusan magang membuat 7 film dokumenter</p>
                </div>
                <!-- Sertifikat 4 -->
                <div class="cert-card p-6 text-center">
                    <img src="{{ asset('images/certificates/magang-sap.jpg') }}" alt="Magang SAP" class="w-full h-32 object-cover rounded-lg mb-3">
                    <h3 class="text-xl font-semibold text-white mb-2">Magang PT Suryasukses Group</h3>
                    <p class="text-gray-400 text-sm">Sertifikat magang sebagai digital marketing</p>
                </div>
            </div>
        </div>
<!-- ==================== MODAL POPUP ==================== -->
<div id="modal" class="modal">
    <div class="modal-content">
        <span class="modal-close" onclick="closeModal()">&times;</span>
        <div id="modal-body">
            <!-- Konten modal akan diisi oleh JavaScript -->
        </div>
    </div>
</div>

<script>
    function showTab(tabName) {
        document.querySelectorAll('.tab-content').forEach(tab => {
            tab.style.display = 'none';
        });
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('active');
        });
        document.getElementById('tab-' + tabName).style.display = 'block';
        event.currentTarget.classList.add('active');
    }

    function closeModal() {
        document.getElementById('modal').classList.remove('active');
    }

    // Yearbook Modal - Menampilkan galeri foto berdasarkan tema
   function openYearbookModal(id, title, desc) {
    const modalBody = document.getElementById('modal-body');
    
    // Daftar file foto untuk setiap tema
    let photos = [];
    let folderName = '';
    
    if (id === 1) { // Old Money
        folderName = 'old money';
        photos = ['AFZ01015.jpg', 'AFZ01855.jpg', 'IVN07905.jpg', 'IVN08275.jpg'];
    } else if (id === 2) { // jungle adventure
        folderName = 'jungle adventure';
        photos = ['AFZ08784.jpg', 'AFZ08820.jpg', 'AFZ09143.jpg', 'AFZ09158.jpg'];
    } else {
        folderName = 'theme' + id;
        photos = ['photo1.jpg', 'photo2.jpg', 'photo3.jpg'];
    }
    
    let carouselHtml = `<div class="swiper yearbookSwiper" style="width:100%">
        <div class="swiper-wrapper">`;
    
    photos.forEach(photo => {
        carouselHtml += `<div class="swiper-slide">
            <img src="/images/yearbook/gallery/${folderName}/${photo}" alt="Foto" class="w-full h-auto rounded-lg" onerror="this.src='https://placehold.co/600x400/333/666?text=Foto+Belum+Ada'">
        </div>`;
    });
    
    carouselHtml += `</div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>`;
    
    modalBody.innerHTML = `
        <h2 class="text-2xl font-bold text-white mb-2">${title}</h2>
        <p class="text-gray-400 mb-4">${desc}</p>
        ${carouselHtml}
    `;
    
    document.getElementById('modal').classList.add('active');
    
    setTimeout(() => {
        new Swiper('.yearbookSwiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
            pagination: { el: '.swiper-pagination', clickable: true },
            loop: true
        });
    }, 100);
}

    // Content Creator Modal - Menampilkan detail akun
function openContentModal(id, name, platform, desc, followers, contentType) {
    const modalBody = document.getElementById('modal-body');
    
    // Mapping file thumbnail TikTok
    let tiktokThumb = '';
    let tiktokUrl = '';
    
    if (name === 'amariroof') {
        tiktokThumb = 'amariroof-tiktok1.jpg';
        tiktokUrl = 'https://www.tiktok.com/@amariroof/video/7441099723';
    } else if (name === 'botolplastik_sap') {
        tiktokThumb = 'botolplastik-tiktok1.jpg';
        tiktokUrl = 'https://www.tiktok.com/@botolplastik_sap/video/7393272807678938373';
    } else if (name === 'multindoplastic') {
        tiktokThumb = 'multindo-tiktok1.jpg';
        tiktokUrl = 'https://www.tiktok.com/@multindoplastic/video/7303829583869070598';
    } else if (name === 'trustmed.id') {
        tiktokThumb = 'trustmed-tiktok1.jpg';
        tiktokUrl = 'https://www.tiktok.com/@trustmed.id/video/74437491';
    }
    
    let tiktokHtml = '';
    if (tiktokThumb) {
        tiktokHtml = `
            <div class="mt-4 pt-3 border-t border-gray-700">
                <p class="text-gray-400 text-sm mb-2">🎬 Contoh Konten TikTok:</p>
                <a href="${tiktokUrl}" target="_blank" class="block">
                    <img src="/images/content/${tiktokThumb}" class="rounded-lg w-full hover:opacity-80 transition" onerror="this.src='https://placehold.co/600x800/333/666?text=Thumbnail+TikTok'">
                </a>
                <p class="text-gray-500 text-xs mt-2 text-center"> Click to watch on TikTok</p>
            </div>
        `;
    }
    
    modalBody.innerHTML = `
        <div class="p-2">
            <h2 class="text-xl md:text-2xl font-bold text-white text-center mb-1">${name}</h2>
            <p class="text-center text-orange-400 text-sm mb-4">${platform}</p>
            
            <div class="grid grid-cols-2 gap-3 mb-4">
                <div class="bg-black/40 p-2 rounded-lg text-center">
                    <p class="text-gray-400 text-xs">Followers</p>
                    <p class="text-white text-sm font-bold">${followers}</p>
                </div>
                <div class="bg-black/40 p-2 rounded-lg text-center">
                    <p class="text-gray-400 text-xs">Jenis Konten</p>
                    <p class="text-white text-sm">${contentType}</p>
                </div>
            </div>
            
            <p class="text-gray-300 text-sm mb-4 leading-relaxed text-center">${desc}</p>
            
            ${tiktokHtml}
            
            <button onclick="closeModal()" class="btn-watch w-full mt-4 text-center justify-center">Tutup</button>
        </div>
    `;
    
    document.getElementById('modal').classList.add('active');
}

    // Tutup modal jika klik di luar modal
    window.onclick = function(event) {
        const modal = document.getElementById('modal');
        if (event.target === modal) {
            closeModal();
        }
    }
</script>

@endsection
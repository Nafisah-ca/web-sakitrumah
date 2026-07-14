@extends('layouts.app')
@section('content')

{{-- ===== HERO SLIDER ===== --}}
<div class="hero-slider">

    {{-- Slide 1 --}}
    <div class="slide">
        <div style="background: linear-gradient(135deg, #00521f 0%, #00b04f 60%, #00d966 100%); height:100%;"></div>
        <div class="slide-content">
            <div class="max-w-screen-xl mx-auto px-6 w-full">
                <div class="max-w-xl">
                    <span class="inline-block bg-white/20 border border-white/30 text-white text-xs font-bold px-3 py-1 rounded-full mb-4 uppercase tracking-widest backdrop-blur-sm">Pusat Layanan Ibu & Anak</span>
                    <h1 class="text-white font-black text-4xl md:text-5xl leading-tight mb-4">
                        Kesehatan Ibu & Anak<br>
                        <span class="text-yellow-300">Prioritas kita mantap</span>
                    </h1>
                    <p class="text-green-100 text-base mb-7 leading-relaxed max-w-md">
                        Layanan maternal dan pediatri terpadu dengan dokter spesialis berpengalaman dan fasilitas modern di 8 cabang kami.
                    </p>
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('dokter') }}" class="flex items-center gap-2 bg-white text-green-700 px-6 py-3 rounded-xl font-bold text-sm shadow-xl hover:bg-green-50 transition-all hover:-translate-y-0.5">
                            <i class="fas fa-calendar-check"></i> Daftar Poliklinik
                        </a>
                        <a href="{{ route('layanan') }}" class="flex items-center gap-2 border-2 border-white/60 hover:border-white text-white px-6 py-3 rounded-xl font-semibold text-sm transition-all hover:-translate-y-0.5 backdrop-blur-sm">
                            <i class="fas fa-info-circle"></i> Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Slide 2 --}}
    <div class="slide">
        <div style="background: linear-gradient(135deg, #7c2d12 0%, #c2410c 60%, #f97316 100%); height:100%;"></div>
        <div class="slide-content">
            <div class="max-w-screen-xl mx-auto px-6 w-full">
                <div class="max-w-xl">
                    <span class="inline-block bg-white/20 border border-white/30 text-white text-xs font-bold px-3 py-1 rounded-full mb-4 uppercase tracking-widest backdrop-blur-sm">Pain Clinic</span>
                    <h1 class="text-white font-black text-4xl md:text-5xl leading-tight mb-4">
                        Solusi Nyeri Kronis<br>
                        <span class="text-yellow-300">Tanpa Operasi</span>
                    </h1>
                    <p class="text-orange-100 text-base mb-7 leading-relaxed max-w-md">
                        Terapi radio terfrekuensi, Platelet-Rich Plasma, dan metode terkini untuk mengatasi nyeri sendi, tulang belakang, dan otot.
                    </p>
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('dokter') }}" class="flex items-center gap-2 bg-white text-orange-700 px-6 py-3 rounded-xl font-bold text-sm shadow-xl hover:bg-orange-50 transition-all hover:-translate-y-0.5">
                            <i class="fas fa-calendar-check"></i> Konsultasi Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Slide 3 --}}
    <div class="slide">
        <div style="background: linear-gradient(135deg, #1e3a5f 0%, #0f4c81 60%, #0ea5e9 100%); height:100%;"></div>
        <div class="slide-content">
            <div class="max-w-screen-xl mx-auto px-6 w-full">
                <div class="max-w-xl">
                    <span class="inline-block bg-white/20 border border-white/30 text-white text-xs font-bold px-3 py-1 rounded-full mb-4 uppercase tracking-widest backdrop-blur-sm">Medical Check-Up</span>
                    <h1 class="text-white font-black text-4xl md:text-5xl leading-tight mb-4">
                        Deteksi Dini<br>
                        <span class="text-yellow-300">Hidup Lebih Sehat</span>
                    </h1>
                    <p class="text-blue-100 text-base mb-7 leading-relaxed max-w-md">
                        Paket MCU komprehensif untuk individu dan korporat. Dapatkan hasil pemeriksaan lengkap dalam satu hari dengan harga terjangkau.
                    </p>
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('mcu') }}" class="flex items-center gap-2 bg-white text-blue-700 px-6 py-3 rounded-xl font-bold text-sm shadow-xl hover:bg-blue-50 transition-all hover:-translate-y-0.5">
                            <i class="fas fa-clipboard-check"></i> Lihat Paket MCU
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Slide 4 --}}
    <div class="slide">
        <div style="background: linear-gradient(135deg, #4c1d95 0%, #7c3aed 60%, #a78bfa 100%); height:100%;"></div>
        <div class="slide-content">
            <div class="max-w-screen-xl mx-auto px-6 w-full">
                <div class="max-w-xl">
                    <span class="inline-block bg-white/20 border border-white/30 text-white text-xs font-bold px-3 py-1 rounded-full mb-4 uppercase tracking-widest backdrop-blur-sm">RS Sari Sehat Bintaro</span>
                    <h1 class="text-white font-black text-4xl md:text-5xl leading-tight mb-4">
                        Pilihan Utama<br>
                        <span class="text-yellow-300">Layanan Kesehatan Lengkap</span>
                    </h1>
                    <p class="text-purple-100 text-base mb-7 leading-relaxed max-w-md">
                        Hadir di Tangerang Selatan dengan spesialisasi terlengkap, dokter berpengalaman, dan fasilitas berstandar internasional.
                    </p>
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('cabang') }}" class="flex items-center gap-2 bg-white text-purple-700 px-6 py-3 rounded-xl font-bold text-sm shadow-xl hover:bg-purple-50 transition-all hover:-translate-y-0.5">
                            <i class="fas fa-map-marker-alt"></i> Lihat Cabang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Arrows --}}
    <button class="slide-arrow prev" aria-label="Previous"><i class="fas fa-chevron-left text-sm"></i></button>
    <button class="slide-arrow next" aria-label="Next"><i class="fas fa-chevron-right text-sm"></i></button>
    {{-- Dots --}}
    <div class="slide-dots">
        <span class="dot"></span><span class="dot"></span><span class="dot"></span><span class="dot"></span>
    </div>
</div>

{{-- ===== QUICK MENU ===== --}}
<div class="quick-menu">
    <div class="max-w-screen-xl mx-auto px-4">
        <div class="flex items-stretch">
            @foreach([
                ['fa-calendar-check','Daftar Poliklinik','dokter'],
                ['fa-laptop-medical','Layanan Online','dokter.online'],
                ['fa-tags','Paket Promo','promo'],
                ['fa-clipboard-check','Medical Checkup','mcu'],
                ['fa-spa','Pelayanan Khusus','layanan'],
            ] as [$icon,$label,$route])
            <a href="{{ route($route) }}" class="quick-menu-item flex-1">
                <i class="fas {{ $icon }}"></i>
                <span>{{ $label }}</span>
            </a>
            @endforeach
            <div class="quick-menu-item flex-1 cursor-pointer" onclick="document.getElementById('more-menu').classList.toggle('hidden')">
                <i class="fas fa-ellipsis-h"></i>
                <span>Lainnya</span>
            </div>
        </div>
    </div>
</div>

{{-- ===== SPESIALISASI ===== --}}
<section class="py-14 bg-white">
    <div class="max-w-screen-xl mx-auto px-4">
        <div class="flex items-end justify-between mb-8 fade-up">
            <div>
                <span class="section-label">Pelayanan Spesialis</span>
                <h2 class="section-title">Spesialisasi <span>Kami</span></h2>
                <p class="text-gray-500 text-sm mt-2 max-w-xl">Rumah Sakit Sari Sehat senantiasa berupaya memberikan mutu pelayanan berkualitas dengan didukung para dokter ahli dan fasilitas modern.</p>
            </div>
            <a href="{{ route('dokter') }}" class="btn-outline-green hidden md:inline-flex flex-shrink-0 ml-8">
                Lihat Semua <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        <div class="flex flex-wrap gap-3 fade-up">
            @foreach($spesialisasi as $sp)
            <a href="{{ route('dokter') }}/poliklinik-{{ Str::slug($sp['nama']) }}" class="spesialis-pill">
                <i class="fas {{ $sp['icon'] }}"></i> {{ $sp['nama'] }}
            </a>
            @endforeach
        </div>
        <div class="mt-6 md:hidden fade-up">
            <a href="{{ route('dokter') }}" class="btn-outline-green w-full justify-center">
                Lihat Semua <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

{{-- ===== TENTANG / STATS ===== --}}
<section class="py-0 bg-white">
    <div class="max-w-screen-xl mx-auto px-4">
        <div class="rounded-2xl overflow-hidden shadow-xl fade-up" style="background: linear-gradient(135deg, #00521f 0%, #00b04f 100%);">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                {{-- Teks --}}
                <div class="p-8 md:p-12">
                    <span class="section-label text-green-300">Sekilas Tentang</span>
                    <h2 class="text-white font-extrabold text-2xl md:text-3xl leading-tight mb-4">
                        Rumah Sakit Sari Sehat
                    </h2>
                    <p class="text-green-100 leading-relaxed text-sm mb-6">
                        Sebagai Group Rumah Sakit di Tangerang dan Banten, kami memiliki motto <strong class="text-white">"Melayani dengan Kasih Sayang"</strong>, dan senantiasa memberikan mutu pelayanan yang profesional di setiap cabang kepada seluruh pasien kami.
                    </p>
                    <a href="{{ route('tentang') }}" class="inline-flex items-center gap-2 bg-white text-green-700 px-6 py-2.5 rounded-xl font-bold text-sm hover:bg-green-50 transition-all shadow-md">
                        Tentang Kami <i class="fas fa-arrow-right text-xs"></i>
                    </a>
                </div>
                {{-- Stats --}}
                <div id="stats-section" class="grid grid-cols-3 border-t lg:border-t-0 lg:border-l border-white/20">
                    @foreach([
                        ['08','Rumah Sakit','fa-hospital'],
                        ['200+','Spesialisasi','fa-stethoscope'],
                        ['300+','Mitra Asuransi','fa-handshake'],
                    ] as [$val,$lbl,$ico])
                    <div class="stat-box">
                        <i class="fas {{ $ico }} text-green-300 text-xl mb-2 block"></i>
                        <div class="stat-number">{{ $val }}</div>
                        <div class="stat-label">{{ $lbl }}</div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== PROMO ===== --}}
<section class="py-14 bg-gray-50">
    <div class="max-w-screen-xl mx-auto px-4">
        <div class="flex items-end justify-between mb-8 fade-up">
            <div>
                <span class="section-label">Penawaran Terbaik</span>
                <h2 class="section-title">Promo</h2>
            </div>
            <a href="{{ route('promo') }}" class="btn-outline-green hidden md:inline-flex">
                Lihat Semua <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 fade-up">
            @foreach($promos as $promo)
            <a href="{{ route('promo') }}" class="card-base group block">
                {{-- Promo Image Placeholder --}}
                <div class="h-44 relative overflow-hidden" style="background: linear-gradient(135deg, {{ $promo['bgFrom'] }}, {{ $promo['bgTo'] }});">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <i class="fas {{ $promo['icon'] }} text-white/30 text-7xl"></i>
                    </div>
                    <div class="absolute top-3 left-3">
                        <span class="badge-promo">PROMO</span>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 p-4" style="background: linear-gradient(to top, rgba(0,0,0,.6), transparent);">
                        <span class="text-white text-xs font-bold">Selengkapnya</span>
                    </div>
                </div>
                <div class="p-4">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        @foreach($promo['cabang'] as $c)
                        <span class="cabang-tag">{{ $c }}</span>
                        @endforeach
                    </div>
                    <h3 class="font-bold text-gray-900 text-sm leading-snug mb-2 group-hover:text-green-600 transition-colors">{{ $promo['judul'] }}</h3>
                    <p class="text-gray-500 text-xs leading-relaxed mb-3">{{ Str::limit($promo['ringkasan'], 90) }}</p>
                    <div class="flex items-center gap-1.5 text-xs text-red-500 font-semibold">
                        <i class="fas fa-clock text-xs"></i>
                        Promo Berakhir: {{ $promo['berakhir'] }}
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        <div class="mt-5 md:hidden text-center fade-up">
            <a href="{{ route('promo') }}" class="btn-outline-green">Lihat Semua <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
</section>

{{-- ===== EVENT ===== --}}
<section class="py-14 bg-white">
    <div class="max-w-screen-xl mx-auto px-4">
        <div class="flex items-end justify-between mb-8 fade-up">
            <div>
                <span class="section-label">Jadwal Kegiatan</span>
                <h2 class="section-title">Event</h2>
            </div>
            <a href="{{ route('event') }}" class="btn-outline-green hidden md:inline-flex">
                Lihat Semua <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 fade-up">
            @foreach($events as $ev)
            <a href="{{ route('event') }}" class="card-base group flex gap-0">
                <div class="w-2 flex-shrink-0 rounded-l-2xl" style="background:{{ $ev['color'] }};"></div>
                <div class="flex-1 p-4">
                    <span class="badge-event mb-2 inline-block">{{ $ev['tipe'] }}</span>
                    <h3 class="font-bold text-gray-900 text-sm leading-snug group-hover:text-green-600 transition-colors mb-2">{{ $ev['judul'] }}</h3>
                    <div class="flex items-center gap-1.5 text-xs text-gray-400 mt-auto">
                        <i class="fas fa-calendar text-green-500 text-xs"></i> {{ $ev['tanggal'] }}
                    </div>
                    <div class="text-green-600 text-xs font-bold mt-2">Selengkapnya →</div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== INFORMASI / ARTIKEL ===== --}}
<section class="py-14 bg-gray-50">
    <div class="max-w-screen-xl mx-auto px-4">
        <div class="flex items-end justify-between mb-8 fade-up">
            <div>
                <span class="section-label">Kesehatan Terkini</span>
                <h2 class="section-title">Informasi <span>Terkini</span></h2>
            </div>
            <a href="{{ route('artikel') }}" class="btn-outline-green hidden md:inline-flex">
                Lihat Semua <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 fade-up">
            @foreach($articles as $art)
            <a href="{{ route('artikel') }}" class="card-base article-card group block">
                <div class="article-img">
                    <div class="placeholder-img flex items-center justify-center text-6xl"
                         style="background: linear-gradient(135deg, {{ $art['bgFrom'] }}, {{ $art['bgTo'] }}); height:100%;">
                        {{ $art['emoji'] }}
                    </div>
                </div>
                <div class="p-5">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="article-cat">{{ $art['kategori'] }}</span>
                        <span class="text-gray-300 text-xs">•</span>
                        <span class="text-gray-400 text-xs">{{ $art['tanggal'] }}</span>
                    </div>
                    <h3 class="font-bold text-gray-900 text-sm leading-snug mb-2 group-hover:text-green-600 transition-colors">{{ $art['judul'] }}</h3>
                    <p class="text-gray-500 text-xs leading-relaxed">{{ Str::limit($art['ringkasan'], 100) }}</p>
                    <div class="mt-3 text-green-600 text-xs font-bold">Selengkapnya →</div>
                </div>
            </a>
            @endforeach
        </div>
        <div class="mt-6 md:hidden text-center fade-up">
            <a href="{{ route('artikel') }}" class="btn-outline-green">Lihat Semua <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
</section>

@endsection

@extends('layouts.app')
@section('content')

<div class="py-20" style="background: linear-gradient(135deg, #00521f, #00b04f);">
    <div class="max-w-screen-xl mx-auto px-4 text-center">
        <span class="text-green-300 text-xs font-black uppercase tracking-widest block mb-2">Layanan Medis</span>
        <h1 class="text-white font-extrabold text-4xl mb-3">Pelayanan</h1>
        <p class="text-green-100 text-sm max-w-xl mx-auto">Berbagai layanan kesehatan komprehensif didukung dokter spesialis berpengalaman dan peralatan medis modern.</p>
        <nav class="flex items-center justify-center gap-2 mt-5 text-sm text-green-200">
            <a href="{{ route('home') }}" class="hover:text-white">Beranda</a>
            <i class="fas fa-chevron-right text-xs"></i>
            <span class="text-white font-semibold">Pelayanan</span>
        </nav>
    </div>
</div>

{{-- IGD Banner --}}
<div id="igd" class="bg-red-600">
    <div class="max-w-screen-xl mx-auto px-4 py-4">
        <div class="flex flex-col sm:flex-row items-center justify-between gap-3">
            <div class="flex items-center gap-3">
                <div class="relative w-12 h-12 rounded-xl bg-white/20 flex items-center justify-center flex-shrink-0">
                    <span class="absolute inset-0 rounded-xl bg-white/20 animate-ping"></span>
                    <i class="fas fa-ambulance text-white text-xl relative z-10"></i>
                </div>
                <div>
                    <p class="text-white font-extrabold text-base">IGD 24 JAM – Siap Melayani</p>
                    <p class="text-red-100 text-xs">Respons cepat setiap kondisi darurat, 365 hari setahun</p>
                </div>
            </div>
            <div class="flex gap-3">
                <a href="tel:02150943838" class="flex items-center gap-2 bg-white text-red-700 px-5 py-2 rounded-xl font-bold text-sm hover:bg-red-50 transition-all">
                    <i class="fas fa-phone-alt"></i> (021) 5094-3838
                </a>
                <a href="tel:118" class="flex items-center gap-2 border-2 border-white text-white px-5 py-2 rounded-xl font-bold text-sm hover:bg-white/15 transition-all">
                    <i class="fas fa-bell"></i> 118
                </a>
            </div>
        </div>
    </div>
</div>

<section class="py-14 bg-white">
    <div class="max-w-screen-xl mx-auto px-4">
        <div class="text-center mb-10">
            <span class="section-label">Departemen & Spesialisasi</span>
            <h2 class="section-title">Layanan <span>Unggulan</span></h2>
            <p class="text-gray-500 text-sm mt-2 max-w-lg mx-auto">Tersedia lebih dari 20 departemen spesialis dengan dokter ahli dan peralatan medis terkini di setiap cabang.</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach($layananList as $l)
            <div id="{{ $l['id'] }}" class="card-base group fade-up">
                <div class="h-1.5 rounded-t-2xl" style="background: {{ [
                    'red'=>'#ef4444','green'=>'#00b04f','blue'=>'#3b82f6',
                    'purple'=>'#8b5cf6','yellow'=>'#f59e0b','teal'=>'#14b8a6',
                ][$l['color']] ?? '#00b04f' }};"></div>
                <div class="p-6">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="w-13 h-13 w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform"
                             style="background: {{ [
                                'red'=>'#fee2e2','green'=>'#dcfce7','blue'=>'#dbeafe',
                                'purple'=>'#ede9fe','yellow'=>'#fef3c7','teal'=>'#ccfbf1',
                             ][$l['color']] ?? '#dcfce7' }};">
                            <i class="fas {{ $l['icon'] }} text-lg" style="color: {{ [
                                'red'=>'#ef4444','green'=>'#00b04f','blue'=>'#3b82f6',
                                'purple'=>'#8b5cf6','yellow'=>'#f59e0b','teal'=>'#14b8a6',
                             ][$l['color']] ?? '#00b04f' }};"></i>
                        </div>
                        <div>
                            <h3 class="font-extrabold text-gray-900 text-base">{{ $l['nama'] }}</h3>
                            <span class="text-xs font-semibold text-gray-400">{{ $l['jam'] }}</span>
                        </div>
                    </div>
                    <p class="text-gray-500 text-sm leading-relaxed mb-4">{{ $l['deskripsi'] }}</p>
                    <ul class="space-y-1.5 mb-5">
                        @foreach($l['sub'] as $sub)
                        <li class="flex items-center gap-2 text-xs text-gray-600">
                            <i class="fas fa-check-circle text-green-500"></i> {{ $sub }}
                        </li>
                        @endforeach
                    </ul>
                    <a href="{{ route('dokter') }}" class="block w-full text-center btn-green py-2.5 rounded-xl text-sm">
                        Buat Janji Temu
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Pelayanan Khusus --}}
<section class="py-14 bg-gray-50">
    <div class="max-w-screen-xl mx-auto px-4">
        <div class="text-center mb-10">
            <span class="section-label">Layanan Premium</span>
            <h2 class="section-title">Pelayanan <span>Khusus</span></h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach([
                ['icon'=>'fa-spa','title'=>'Pain Clinic & Wellness','desc'=>'Terapi nyeri kronis tanpa operasi menggunakan metode Radio Frekuensi, PRP, dan teknik terkini lainnya.','color'=>'#7c3aed'],
                ['icon'=>'fa-baby','title'=>'Pusat Layanan Ibu & Anak','desc'=>'Layanan maternal dan pediatri terpadu: NICU, ruang bersalin nyaman, dan dokter anak subspesialis.','color'=>'#be185d'],
                ['icon'=>'fa-dna','title'=>'Onkologi Terpadu','desc'=>'Penanganan kanker multidisiplin dengan kemoterapi, radioterapi, dan bedah tumor oleh tim ahli.','color'=>'#0f4c81'],
            ] as $pk)
            <div class="card-base p-6 text-center group fade-up">
                <div class="w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform"
                     style="background: {{ $pk['color'] }}20;">
                    <i class="fas {{ $pk['icon'] }} text-2xl" style="color: {{ $pk['color'] }};"></i>
                </div>
                <h3 class="font-extrabold text-gray-900 text-base mb-2">{{ $pk['title'] }}</h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-4">{{ $pk['desc'] }}</p>
                <a href="{{ route('dokter') }}" class="btn-outline-green text-xs py-2 px-4">
                    Konsultasi <i class="fas fa-arrow-right text-xs"></i>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

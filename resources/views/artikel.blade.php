@extends('layouts.app')
@section('content')
<div class="py-20" style="background: linear-gradient(135deg, #00521f, #00b04f);">
    <div class="max-w-screen-xl mx-auto px-4 text-center">
        <span class="text-green-300 text-xs font-black uppercase tracking-widest block mb-2">Informasi Kesehatan</span>
        <h1 class="text-white font-extrabold text-4xl mb-3">Artikel</h1>
        <p class="text-green-100 text-sm max-w-xl mx-auto">Temukan informasi kesehatan terkini dari para dokter dan tenaga kesehatan RS Sari Sehat.</p>
        <nav class="flex items-center justify-center gap-2 mt-5 text-sm text-green-200">
            <a href="{{ route('home') }}" class="hover:text-white">Beranda</a>
            <i class="fas fa-chevron-right text-xs"></i>
            <span class="text-white font-semibold">Artikel</span>
        </nav>
    </div>
</div>
<section class="py-14 bg-gray-50">
    <div class="max-w-screen-xl mx-auto px-4">
        {{-- Filter Kategori --}}
        <div class="flex flex-wrap gap-2 mb-8">
            @foreach(['Semua','Penyakit Dalam','Anak & Tumbuh Kembang','Tips Kesehatan','Kebidanan & Kandungan','Saraf & Vertigo'] as $kat)
            <button class="px-4 py-2 rounded-full text-xs font-bold border-2 transition-all
                {{ $kat==='Semua' ? 'bg-green-600 border-green-600 text-white' : 'border-gray-200 text-gray-500 hover:border-green-600 hover:text-green-600' }}">
                {{ $kat }}
            </button>
            @endforeach
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($articles as $art)
            <article class="card-base article-card group">
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
                    <p class="text-gray-500 text-xs leading-relaxed mb-4">{{ Str::limit($art['ringkasan'], 120) }}</p>
                    <a href="#" class="inline-flex items-center gap-1.5 text-green-600 text-xs font-bold hover:gap-3 transition-all">
                        Selengkapnya <i class="fas fa-arrow-right text-xs"></i>
                    </a>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endsection

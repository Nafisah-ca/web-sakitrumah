@extends('layouts.app')
@section('content')
<div class="py-20" style="background: linear-gradient(135deg, #00521f, #00b04f);">
    <div class="max-w-screen-xl mx-auto px-4 text-center">
        <span class="text-green-300 text-xs font-black uppercase tracking-widest block mb-2">Penawaran Terbaik</span>
        <h1 class="text-white font-extrabold text-4xl mb-3">Promo</h1>
        <p class="text-green-100 text-sm max-w-xl mx-auto">Dapatkan penawaran terbaik dari RS Sari Sehat untuk berbagai layanan kesehatan Anda dan keluarga.</p>
        <nav class="flex items-center justify-center gap-2 mt-5 text-sm text-green-200">
            <a href="{{ route('home') }}" class="hover:text-white">Beranda</a>
            <i class="fas fa-chevron-right text-xs"></i>
            <span class="text-white font-semibold">Promosi rumah sakit</span>
        </nav>
    </div>
</div>
<section class="py-14 bg-gray-50">
    <div class="max-w-screen-xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($promos as $promo)
            <div class="card-base group">
                <div class="h-52 relative overflow-hidden" style="background: linear-gradient(135deg, {{ $promo['bgFrom'] }}, {{ $promo['bgTo'] }});">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <i class="fas {{ $promo['icon'] }} text-white/25 text-8xl"></i>
                    </div>
                    <div class="absolute top-3 left-3"><span class="badge-promo">PROMO</span></div>
                </div>
                <div class="p-5">
                    <div class="flex flex-wrap gap-1.5 mb-3">
                        @foreach($promo['cabang'] as $c)
                        <span class="cabang-tag">{{ $c }}</span>
                        @endforeach
                    </div>
                    <h3 class="font-bold text-gray-900 text-base leading-snug mb-2 group-hover:text-green-600 transition-colors">{{ $promo['judul'] }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed mb-4">{{ $promo['ringkasan'] }}</p>
                    <div class="flex items-center justify-between">
                        <span class="text-red-500 text-xs font-semibold flex items-center gap-1.5">
                            <i class="fas fa-clock"></i> Berakhir: {{ $promo['berakhir'] }}
                        </span>
                        <a href="#" class="btn-green text-sm py-2 px-4">Lihat Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

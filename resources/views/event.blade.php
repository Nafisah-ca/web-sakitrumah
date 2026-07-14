@extends('layouts.app')
@section('content')
<div class="py-20" style="background: linear-gradient(135deg, #4c1d95, #7c3aed);">
    <div class="max-w-screen-xl mx-auto px-4 text-center">
        <span class="text-purple-300 text-xs font-black uppercase tracking-widest block mb-2">Jadwal Kegiatan</span>
        <h1 class="text-white font-extrabold text-4xl mb-3">Event</h1>
        <p class="text-purple-100 text-sm max-w-xl mx-auto">Ikuti berbagai kegiatan edukasi kesehatan, seminar, dan live streaming bersama dokter-dokter kami.</p>
        <nav class="flex items-center justify-center gap-2 mt-5 text-sm text-purple-200">
            <a href="{{ route('home') }}" class="hover:text-white">Beranda</a>
            <i class="fas fa-chevron-right text-xs"></i>
            <span class="text-white font-semibold">Event</span>
        </nav>
    </div>
</div>
<section class="py-14 bg-gray-50">
    <div class="max-w-screen-xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($events as $ev)
            <div class="card-base group flex gap-0">
                <div class="w-2 flex-shrink-0 rounded-l-2xl" style="background:{{ $ev['color'] }};"></div>
                <div class="flex-1 p-5">
                    <span class="badge-event mb-3 inline-block">{{ $ev['tipe'] }}</span>
                    <h3 class="font-bold text-gray-900 text-base leading-snug mb-3 group-hover:text-green-600 transition-colors">{{ $ev['judul'] }}</h3>
                    <div class="flex items-center gap-2 text-sm text-gray-400">
                        <i class="fas fa-calendar text-green-500"></i> {{ $ev['tanggal'] }}
                    </div>
                    <a href="#" class="mt-4 inline-flex items-center gap-1.5 text-green-600 text-sm font-bold hover:gap-3 transition-all">
                        Selengkapnya <i class="fas fa-arrow-right text-xs"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

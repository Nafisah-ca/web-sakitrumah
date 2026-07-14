@extends('layouts.app')
@section('content')
<div class="py-20" style="background: linear-gradient(135deg, #00521f, #00b04f);">
    <div class="max-w-screen-xl mx-auto px-4 text-center">
        <span class="text-green-300 text-xs font-black uppercase tracking-widest block mb-2">Jaringan Kami</span>
        <h1 class="text-white font-extrabold text-4xl mb-3">Cabang</h1>
        <p class="text-green-100 text-sm max-w-xl mx-auto">8 rumah sakit di Tangerang dan Banten, siap melayani Anda dengan penuh kasih sayang.</p>
        <nav class="flex items-center justify-center gap-2 mt-5 text-sm text-green-200">
            <a href="{{ route('home') }}" class="hover:text-white">Beranda</a>
            <i class="fas fa-chevron-right text-xs"></i>
            <span class="text-white font-semibold">Cabang</span>
        </nav>
    </div>
</div>
<section class="py-14 bg-gray-50">
    <div class="max-w-screen-xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach($cabangList as $c)
            <div class="card-base p-5 group">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-4 flex-shrink-0"
                     style="background: {{ $c['color'] }}20;">
                    <i class="fas fa-hospital-alt" style="color: {{ $c['color'] }}; font-size: 1.25rem;"></i>
                </div>
                <h3 class="font-bold text-gray-900 text-base mb-2 group-hover:text-green-600 transition-colors">{{ $c['nama'] }}</h3>
                <p class="text-gray-500 text-xs mb-3 leading-relaxed">{{ $c['alamat'] }}</p>
                <a href="tel:{{ preg_replace('/\D/','',$c['telp']) }}" class="flex items-center gap-1.5 text-green-600 text-xs font-bold">
                    <i class="fas fa-phone text-xs"></i> {{ $c['telp'] }}
                </a>
                <div class="mt-3 pt-3 border-t border-gray-100 flex gap-2">
                    <a href="#" class="flex-1 text-center text-xs font-semibold py-2 rounded-lg bg-green-50 text-green-700 hover:bg-green-600 hover:text-white transition-all">
                        <i class="fas fa-map-marker-alt mr-1"></i>Peta
                    </a>
                    <a href="{{ route('dokter') }}" class="flex-1 text-center text-xs font-semibold py-2 rounded-lg bg-blue-50 text-blue-700 hover:bg-blue-600 hover:text-white transition-all">
                        <i class="fas fa-user-md mr-1"></i>Dokter
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Kontak Section --}}
<section id="hubungi" class="py-14 bg-white">
    <div class="max-w-screen-xl mx-auto px-4">
        <div class="text-center mb-10">
            <span class="section-label">Hubungi Kami</span>
            <h2 class="section-title">Call Center & <span>Informasi</span></h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-3xl mx-auto">
            @foreach([
                ['fa-phone','(021) 5094-3838','Telepon','Sen–Sab 08.00–20.00','bg-green-50 text-green-700'],
                ['fa-envelope','info@sarisehat.id','Email','Balas dalam 1×24 jam','bg-blue-50 text-blue-700'],
                ['fab fa-whatsapp','Chat WhatsApp','WhatsApp','Aktif 24 Jam','bg-emerald-50 text-emerald-700'],
            ] as [$ico,$val,$lbl,$jam,$cls])
            <div class="rounded-2xl p-6 text-center border border-gray-100 {{ $cls }}">
                <i class="{{ $ico }} text-3xl mb-3 block"></i>
                <div class="font-extrabold text-lg mb-1">{{ $val }}</div>
                <div class="font-semibold text-sm mb-1">{{ $lbl }}</div>
                <div class="text-xs opacity-70">{{ $jam }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

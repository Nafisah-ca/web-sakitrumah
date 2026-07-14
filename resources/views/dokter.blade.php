@extends('layouts.app')
@section('content')

<div class="py-20" style="background: linear-gradient(135deg, #00521f, #00b04f);">
    <div class="max-w-screen-xl mx-auto px-4 text-center">
        <span class="text-green-300 text-xs font-black uppercase tracking-widest block mb-2">Tim Medis Profesional</span>
        <h1 class="text-white font-extrabold text-4xl mb-3">
            {{ isset($online) && $online ? 'Layanan Online' : 'Jadwal Dokter' }}
        </h1>
        <p class="text-green-100 text-sm max-w-xl mx-auto">Temukan dokter spesialis terbaik kami dan buat janji temu dengan mudah.</p>
        <nav class="flex items-center justify-center gap-2 mt-5 text-sm text-green-200">
            <a href="{{ route('home') }}" class="hover:text-white">Beranda</a>
            <i class="fas fa-chevron-right text-xs"></i>
            <span class="text-white font-semibold">Jadwal Dokter</span>
        </nav>
    </div>
</div>

{{-- Filter --}}
<div class="bg-white border-b border-gray-100 sticky top-16 z-40 shadow-sm">
    <div class="max-w-screen-xl mx-auto px-4 py-3">
        <div class="flex flex-wrap gap-2">
            @foreach(['Semua','Jantung','Anak','Kandungan','Syaraf','Bedah','Penyakit Dalam','Ortopedi','Mata','Jiwa'] as $f)
            <button onclick="filterDr('{{ $f }}')" data-filter="{{ $f }}"
                class="filter-dr-btn px-3 py-1.5 rounded-full text-xs font-bold transition-all border-2
                       {{ $f==='Semua' ? 'bg-green-600 border-green-600 text-white' : 'border-gray-200 text-gray-500 hover:border-green-500 hover:text-green-600' }}">
                {{ $f }}
            </button>
            @endforeach
        </div>
    </div>
</div>

<section class="py-12 bg-gray-50">
    <div class="max-w-screen-xl mx-auto px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5" id="dokter-grid">
            @foreach($dokterList as $d)
            <div class="card-base group dr-card" data-spesialis="{{ $d['spesialis'] }}">
                <div class="h-48 relative flex items-center justify-center overflow-hidden"
                     style="background: linear-gradient(135deg, {{ $d['bgFrom'] }}, {{ $d['bgTo'] }});">
                    <div class="w-24 h-24 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center border-4 border-white/40">
                        <i class="fas fa-user-md text-white text-4xl"></i>
                    </div>
                    <div class="absolute top-3 right-3">
                        @if($d['available'])
                        <span class="flex items-center gap-1 bg-green-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full">
                            <span class="w-1.5 h-1.5 bg-white rounded-full"></span> Tersedia
                        </span>
                        @else
                        <span class="bg-gray-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full">Libur</span>
                        @endif
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-extrabold text-gray-900 text-sm mb-0.5 leading-tight">{{ $d['nama'] }}</h3>
                    <p class="text-green-600 text-xs font-semibold mb-2">{{ $d['gelar'] }}</p>
                    <span class="inline-block bg-green-100 text-green-700 text-[10px] font-bold px-2 py-0.5 rounded-full mb-3">{{ $d['spesialisasi'] }}</span>
                    <div class="space-y-1 mb-4">
                        <div class="flex items-start gap-2 text-xs text-gray-500">
                            <i class="fas fa-clock text-green-500 mt-0.5 w-3 flex-shrink-0"></i>
                            <span>{{ $d['jadwal'] }}</span>
                        </div>
                        <div class="flex items-center gap-2 text-xs text-gray-500">
                            <i class="fas fa-graduation-cap text-green-500 w-3 flex-shrink-0"></i>
                            {{ $d['pendidikan'] }}
                        </div>
                        <div class="flex items-center gap-2 text-xs text-gray-500">
                            <i class="fas fa-briefcase text-green-500 w-3 flex-shrink-0"></i>
                            {{ $d['pengalaman'] }} pengalaman
                        </div>
                    </div>
                    <a href="{{ route('cabang') }}" class="block w-full text-center btn-green py-2 rounded-xl text-xs">
                        <i class="fas fa-calendar-check mr-1"></i>Buat Janji
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
@push('scripts')
<script>
function filterDr(sp) {
    document.querySelectorAll('.filter-dr-btn').forEach(b => {
        const on = b.dataset.filter === sp;
        b.classList.toggle('bg-green-600', on);
        b.classList.toggle('border-green-600', on);
        b.classList.toggle('text-white', on);
        b.classList.toggle('border-gray-200', !on);
        b.classList.toggle('text-gray-500', !on);
    });
    document.querySelectorAll('.dr-card').forEach(c => {
        c.style.display = (sp === 'Semua' || c.dataset.spesialis === sp) ? '' : 'none';
    });
}
</script>
@endpush

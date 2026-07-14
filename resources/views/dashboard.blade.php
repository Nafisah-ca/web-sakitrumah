@extends('layouts.app')
@section('content')

<div class="min-h-screen bg-gray-50 py-10">
    <div class="max-w-screen-xl mx-auto px-4">

        {{-- Header --}}
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-2xl font-extrabold text-gray-900">
                    Selamat datang, {{ Auth::user()->name }} 👋
                </h1>
                <p class="text-gray-500 text-sm mt-1">{{ Auth::user()->email }}</p>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="flex items-center gap-2 bg-red-50 text-red-600 border border-red-200 px-5 py-2.5 rounded-xl font-bold text-sm hover:bg-red-600 hover:text-white transition-all">
                    <i class="fas fa-sign-out-alt"></i> Keluar
                </button>
            </form>
        </div>

        {{-- Stats Cards --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-5 mb-8">
            @foreach([
                ['fa-calendar-check', 'Janji Temu', '3',    'bg-green-50 text-green-700',  'border-green-200'],
                ['fa-file-medical',   'Rekam Medis', '12',  'bg-blue-50 text-blue-700',    'border-blue-200'],
                ['fa-pills',          'Resep Aktif', '1',   'bg-orange-50 text-orange-700','border-orange-200'],
                ['fa-receipt',        'Tagihan',     '0',   'bg-purple-50 text-purple-700','border-purple-200'],
            ] as [$ico, $lbl, $val, $cls, $border])
            <div class="bg-white rounded-2xl p-5 border {{ $border }} shadow-sm">
                <div class="w-10 h-10 rounded-xl {{ $cls }} flex items-center justify-center mb-3">
                    <i class="fas {{ $ico }} text-sm"></i>
                </div>
                <div class="text-2xl font-black text-gray-900">{{ $val }}</div>
                <div class="text-gray-500 text-xs font-medium">{{ $lbl }}</div>
            </div>
            @endforeach
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Profil Pasien --}}
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                <h3 class="font-extrabold text-gray-900 mb-5 flex items-center gap-2">
                    <i class="fas fa-user-circle text-green-600"></i> Profil Saya
                </h3>
                <div class="space-y-3">
                    @foreach([
                        ['fa-user',        'Nama',          Auth::user()->name],
                        ['fa-envelope',    'Email',         Auth::user()->email],
                        ['fa-id-card',     'No. RM',        'RS-'.str_pad(Auth::user()->id, 6, '0', STR_PAD_LEFT)],
                        ['fa-calendar',    'Bergabung',     Auth::user()->created_at->format('d M Y')],
                    ] as [$ico, $lbl, $val])
                    <div class="flex items-start gap-3 p-3 rounded-xl bg-gray-50">
                        <div class="w-8 h-8 rounded-lg bg-green-100 flex items-center justify-center flex-shrink-0">
                            <i class="fas {{ $ico }} text-green-600 text-xs"></i>
                        </div>
                        <div>
                            <p class="text-gray-400 text-xs font-semibold">{{ $lbl }}</p>
                            <p class="text-gray-800 text-sm font-semibold">{{ $val }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <button class="mt-4 w-full btn-outline-green py-2.5 rounded-xl text-sm justify-center">
                    <i class="fas fa-edit mr-1"></i> Edit Profil
                </button>
            </div>

            {{-- Jadwal Mendatang --}}
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                <h3 class="font-extrabold text-gray-900 mb-5 flex items-center gap-2">
                    <i class="fas fa-calendar-alt text-green-600"></i> Jadwal Mendatang
                </h3>
                <div class="space-y-3">
                    @foreach([
                        ['dr. Ahmad Fauzi, Sp.JP','Poli Jantung','Selasa, 15 Jul 2026','09.00 WIB','RS Karawaci','green'],
                        ['dr. Linda Susanti, Sp.A','Poli Anak','Kamis, 17 Jul 2026','10.30 WIB','RS Bintaro','blue'],
                        ['dr. Siti Rahayu, Sp.OG','Poli Kandungan','Sabtu, 19 Jul 2026','08.00 WIB','RS Ciputat','purple'],
                    ] as [$dok,$poli,$tgl,$jam,$cabang,$c])
                    <div class="p-3 rounded-xl border border-{{ $c }}-100 bg-{{ $c }}-50">
                        <div class="flex items-start justify-between mb-1">
                            <p class="font-bold text-gray-900 text-xs leading-tight">{{ $dok }}</p>
                            <span class="text-[10px] font-bold text-{{ $c }}-700 bg-white px-2 py-0.5 rounded-full border border-{{ $c }}-200">{{ $jam }}</span>
                        </div>
                        <p class="text-{{ $c }}-700 text-xs font-semibold">{{ $poli }}</p>
                        <div class="flex items-center gap-3 mt-1.5">
                            <span class="flex items-center gap-1 text-gray-500 text-xs"><i class="fas fa-calendar text-xs"></i>{{ $tgl }}</span>
                            <span class="flex items-center gap-1 text-gray-500 text-xs"><i class="fas fa-hospital text-xs"></i>{{ $cabang }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a href="{{ route('dokter') }}" class="mt-4 flex items-center justify-center gap-2 btn-green py-2.5 rounded-xl text-sm">
                    <i class="fas fa-plus"></i> Tambah Janji
                </a>
            </div>

            {{-- Akses Cepat --}}
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                <h3 class="font-extrabold text-gray-900 mb-5 flex items-center gap-2">
                    <i class="fas fa-th text-green-600"></i> Akses Cepat
                </h3>
                <div class="grid grid-cols-2 gap-3">
                    @foreach([
                        ['fa-user-md',       'Cari Dokter',    'dokter',         'green'],
                        ['fa-file-alt',      'Hasil Lab',      'live.antrian',   'blue'],
                        ['fa-pills',         'Resep Saya',     'home',           'orange'],
                        ['fa-receipt',       'Tagihan',        'home',           'red'],
                        ['fa-map-marker-alt','Cabang',         'cabang',         'purple'],
                        ['fa-headset',       'Bantuan',        'kontak',         'teal'],
                    ] as [$ico,$lbl,$rt,$c])
                    <a href="{{ route($rt) }}"
                       class="flex flex-col items-center gap-2 p-4 rounded-xl bg-{{ $c }}-50 border border-{{ $c }}-100 hover:bg-{{ $c }}-100 transition-all group text-center">
                        <div class="w-9 h-9 rounded-lg bg-white flex items-center justify-center shadow-sm group-hover:scale-110 transition-transform">
                            <i class="fas {{ $ico }} text-{{ $c }}-600 text-sm"></i>
                        </div>
                        <span class="text-{{ $c }}-800 text-xs font-bold">{{ $lbl }}</span>
                    </a>
                    @endforeach
                </div>

                {{-- Info Akun --}}
                <div class="mt-5 p-3 bg-green-50 rounded-xl border border-green-200 text-center">
                    <i class="fas fa-shield-alt text-green-600 mb-1 block"></i>
                    <p class="text-green-800 text-xs font-bold">Akun Terverifikasi</p>
                    <p class="text-green-600 text-xs">Pasien RS Sari Sehat Group</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

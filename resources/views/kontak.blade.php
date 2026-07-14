@extends('layouts.app')
@section('content')

<div class="py-20" style="background: linear-gradient(135deg, #00521f, #00b04f);">
    <div class="max-w-screen-xl mx-auto px-4 text-center">
        <span class="text-green-300 text-xs font-black uppercase tracking-widest block mb-2">Hubungi Kami</span>
        <h1 class="text-white font-extrabold text-4xl mb-3">Kontak</h1>
        <p class="text-green-100 text-sm max-w-xl mx-auto">Kami siap membantu Anda. Hubungi kami atau buat janji temu dengan dokter spesialis pilihan Anda.</p>
        <nav class="flex items-center justify-center gap-2 mt-5 text-sm text-green-200">
            <a href="{{ route('home') }}" class="hover:text-white">Beranda</a>
            <i class="fas fa-chevron-right text-xs"></i>
            <span class="text-white font-semibold">Kontak</span>
        </nav>
    </div>
</div>

<section class="py-14 bg-white">
    <div class="max-w-screen-xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-12">
            @foreach([
                ['fa-phone-alt','(021) 5094-3838','Telepon & IGD','Tersedia 24 Jam','green','tel:02150943838'],
                ['fa-envelope','info@sarisehat.id','Email Kami','Balas dalam 1×24 jam','blue','mailto:info@sarisehat.id'],
                ['fab fa-whatsapp','WhatsApp Chat','Konsultasi Online','Aktif setiap hari','emerald','https://wa.me/6221509438380'],
            ] as [$ico,$val,$lbl,$jam,$color,$link])
            <a href="{{ $link }}" class="block p-6 rounded-2xl text-center border border-gray-100 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all group bg-{{ $color }}-50">
                <div class="w-14 h-14 rounded-2xl bg-{{ $color }}-600 flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                    <i class="{{ $ico }} text-white text-2xl"></i>
                </div>
                <div class="font-extrabold text-gray-900 text-lg mb-1">{{ $val }}</div>
                <div class="font-semibold text-{{ $color }}-700 text-sm mb-1">{{ $lbl }}</div>
                <div class="text-gray-500 text-xs">{{ $jam }}</div>
            </a>
            @endforeach
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            {{-- Form Janji --}}
            <div id="appointment">
                <span class="section-label">Buat Janji Temu</span>
                <h2 class="section-title mb-6">Daftar <span>Poliklinik Online</span></h2>
                <form id="appointment-form" class="space-y-4 bg-white rounded-2xl p-7 shadow-sm border border-gray-100">
                    @csrf
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-1.5">Nama Depan *</label>
                            <input type="text" required placeholder="Nama depan"
                                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm focus:border-green-500 focus:ring-2 focus:ring-green-100 outline-none transition-all">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-1.5">Nama Belakang</label>
                            <input type="text" placeholder="Nama belakang"
                                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm focus:border-green-500 focus:ring-2 focus:ring-green-100 outline-none transition-all">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1.5">No. WhatsApp *</label>
                        <input type="tel" required placeholder="08xx-xxxx-xxxx"
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm focus:border-green-500 focus:ring-2 focus:ring-green-100 outline-none transition-all">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1.5">Pilih Cabang *</label>
                        <select required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm bg-white focus:border-green-500 focus:ring-2 focus:ring-green-100 outline-none transition-all">
                            <option value="">-- Pilih Cabang --</option>
                            @foreach(['Karawaci','Cipondoh','Sangiang','Ciledug','Serang','Bintaro','Ciputat','Tangerang'] as $c)
                            <option>RS Sari Sehat {{ $c }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1.5">Poliklinik / Spesialisasi *</label>
                        <select required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm bg-white focus:border-green-500 focus:ring-2 focus:ring-green-100 outline-none transition-all">
                            <option value="">-- Pilih Poliklinik --</option>
                            @foreach(['Poli Umum','Poli Anak','Poli Jantung','Poli Kandungan','Poli Penyakit Dalam','Poli Syaraf','Poli Orthopedi','Poli Paru','Poli Mata','Poli THT','Poli Gigi','Poli Psikiater','Poli Urologi','Rehabilitasi Medik'] as $poli)
                            <option>{{ $poli }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-1.5">Tanggal Kunjungan *</label>
                            <input type="date" required min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm focus:border-green-500 focus:ring-2 focus:ring-green-100 outline-none transition-all">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-1.5">Sesi</label>
                            <select class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm bg-white focus:border-green-500 outline-none transition-all">
                                <option>Pagi (08.00–12.00)</option>
                                <option>Siang (12.00–16.00)</option>
                                <option>Sore (16.00–20.00)</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1.5">Asuransi / Pembayaran</label>
                        <select class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm bg-white focus:border-green-500 outline-none transition-all">
                            <option>Umum / Bayar Sendiri</option>
                            <option>BPJS Kesehatan</option>
                            <option>Asuransi Swasta</option>
                            <option>Jasa Raharja</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1.5">Keluhan / Catatan</label>
                        <textarea rows="3" placeholder="Ceritakan keluhan Anda..."
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm focus:border-green-500 focus:ring-2 focus:ring-green-100 outline-none transition-all resize-none"></textarea>
                    </div>
                    <button type="submit" class="w-full btn-green py-3.5 rounded-xl font-extrabold justify-center text-sm">
                        <i class="fas fa-calendar-check mr-2"></i>Daftar Sekarang
                    </button>
                    <p class="text-center text-xs text-gray-400">Konfirmasi jadwal akan dikirim via WhatsApp dalam 1×24 jam.</p>
                </form>
            </div>

            {{-- Info & Peta --}}
            <div>
                <span class="section-label">Temukan Kami</span>
                <h2 class="section-title mb-6">Lokasi <span>Cabang</span></h2>
                <div class="bg-gray-100 rounded-2xl h-56 flex items-center justify-center border border-gray-200 mb-5 overflow-hidden">
                    <div class="text-center">
                        <i class="fas fa-map-marker-alt text-green-600 text-5xl mb-3 block"></i>
                        <p class="font-bold text-gray-700">RS Sari Sehat Group</p>
                        <p class="text-gray-500 text-sm">Tangerang & Banten</p>
                        <a href="https://maps.google.com/?q=RS+Sari+Sehat+Karawaci" target="_blank" rel="noopener"
                           class="inline-flex items-center gap-2 mt-3 btn-green text-xs py-2 px-4">
                            <i class="fas fa-directions"></i>Buka Google Maps
                        </a>
                    </div>
                </div>
                <div class="space-y-3">
                    @foreach([
                        ['fa-hospital-alt','RS Sari Sehat Karawaci','Jl. MH Thamrin No. 3, Karawaci','(021) 5579-4100'],
                        ['fa-hospital-alt','RS Sari Sehat Cipondoh','Jl. KH Hasyim Ashari No. 24, Cipondoh','(021) 5579-4200'],
                        ['fa-hospital-alt','RS Sari Sehat Bintaro','Jl. RC Veteran Raya No. 2, Tangsel','(021) 7372-0100'],
                        ['fa-hospital-alt','RS Sari Sehat Serang','Jl. Raya Cilegon KM 3, Serang','(0254) 220-0100'],
                    ] as [$ico,$nama,$alamat,$telp])
                    <div class="flex gap-3 items-start p-3.5 rounded-xl bg-gray-50 border border-gray-100 hover:bg-green-50 hover:border-green-200 transition-all">
                        <div class="w-9 h-9 rounded-lg bg-green-100 flex items-center justify-center flex-shrink-0">
                            <i class="fas {{ $ico }} text-green-600 text-sm"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-bold text-gray-900 text-sm">{{ $nama }}</p>
                            <p class="text-gray-500 text-xs truncate">{{ $alamat }}</p>
                        </div>
                        <a href="tel:{{ preg_replace('/\D/','',$telp) }}" class="text-green-600 text-xs font-bold hover:text-green-800 flex-shrink-0">
                            <i class="fas fa-phone text-xs"></i>
                        </a>
                    </div>
                    @endforeach
                    <a href="{{ route('cabang') }}" class="flex items-center justify-center gap-2 text-green-600 font-bold text-sm hover:text-green-800 transition-colors pt-1">
                        Lihat semua cabang <i class="fas fa-arrow-right text-xs"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@push('scripts')
<script>
const apptForm = document.getElementById('appointment-form');
if (apptForm) {
    apptForm.addEventListener('submit', e => {
        e.preventDefault();
        const btn = apptForm.querySelector('[type=submit]');
        const original = btn.innerHTML;
        btn.innerHTML = '<i class="fas fa-circle-notch fa-spin mr-2"></i>Mengirim...';
        btn.disabled = true;
        setTimeout(() => {
            btn.innerHTML = '<i class="fas fa-check-circle mr-2"></i>Berhasil! Kami akan menghubungi Anda.';
            btn.classList.add('bg-green-700');
            setTimeout(() => { btn.innerHTML = original; btn.disabled = false; btn.classList.remove('bg-green-700'); apptForm.reset(); }, 4000);
        }, 1800);
    });
}
</script>
@endpush

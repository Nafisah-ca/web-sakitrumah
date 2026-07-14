<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Dokter;
use App\Models\KategoriArtikel;
use App\Models\Kontak;
use App\Models\Pelayanan;
use App\Models\Promo;
use App\Models\RumahSakit;
use App\Models\Spesialisasi;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    // ── HALAMAN ───────────────────────────────────────────────────

    public function home()
    {
        return view('home', [
            'spesialisasi' => Spesialisasi::all(),
            'promos'       => Promo::with('rumahSakit')->where('status', 'aktif')->latest('tanggal_mulai')->get(),
            'events'       => $this->getEvents(),
            'articles'     => Artikel::with('kategori')->where('status', 'published')->orderByDesc('tanggal')->take(6)->get(),
            'rumahSakit'   => RumahSakit::where('status', 1)->first(),
        ]);
    }

    // Events masih pakai data statis karena belum ada tabel events di database
    private function getEvents(): array
    {
        return [
            [
                'judul'   => 'LIVE Instagram – Masalah Kulit yang Sering Dialami Si Kecil',
                'tipe'    => 'Instagram Live',
                'tanggal' => '15 Jul 2026',
                'color'   => '#e1306c',
            ],
            [
                'judul'   => 'LIVE Instagram – Imunisasi Lengkap Bikin Tumbuh Kembang Anak Optimal',
                'tipe'    => 'Instagram Live',
                'tanggal' => '22 Jul 2026',
                'color'   => '#833ab4',
            ],
            [
                'judul'   => 'Kajian Growing in Love dengan Ustadzah Aisyah Farid BSA',
                'tipe'    => 'Kegiatan Masjid',
                'tanggal' => '28 Jul 2026',
                'color'   => '#00b04f',
            ],
        ];
    }

    public function tentang()
    {
        return view('tentang', [
            'rumahSakit' => RumahSakit::where('status', 1)->first(),
        ]);
    }

    public function layanan()
    {
        return view('layanan', [
            'layananList' => Pelayanan::where('status', 1)->get(),
        ]);
    }

    public function dokter()
    {
        return view('dokter', [
            'dokterList'   => Dokter::with(['spesialisasi', 'rumahSakit'])->where('status', 1)->get(),
            'spesialisasi' => Spesialisasi::all(),
        ]);
    }

    public function dokterOnline()
    {
        return view('dokter', [
            'dokterList'   => Dokter::with(['spesialisasi', 'rumahSakit'])->where('status', 1)->get(),
            'spesialisasi' => Spesialisasi::all(),
            'online'       => true,
        ]);
    }

    public function fasilitas()
    {
        return view('fasilitas');
    }

    public function kontak()
    {
        return view('kontak');
    }

    public function kontak_store(Request $request)
    {
        $request->validate([
            'nama'   => 'required|string|max:100',
            'email'  => 'required|email|max:150',
            'no_hp'  => 'nullable|string|max:20',
            'subjek' => 'required|string|max:255',
            'pesan'  => 'required|string',
        ]);

        Kontak::create($request->only('nama', 'email', 'no_hp', 'subjek', 'pesan'));

        return back()->with('success', 'Pesan Anda telah berhasil dikirim. Kami akan segera menghubungi Anda.');
    }

    public function promo()
    {
        return view('promo', [
            'promos' => Promo::with('rumahSakit')->where('status', 'aktif')->orderByDesc('tanggal_mulai')->get(),
        ]);
    }

    public function event()
    {
        // Tabel event belum ada — gunakan artikel kategori 'Promo & Event'
        $katEvent = KategoriArtikel::where('nama_kategori', 'Promo & Event')->first();
        $events   = $katEvent
            ? Artikel::where('id_kategori', $katEvent->id_kategori)->where('status', 'published')->orderByDesc('tanggal')->get()
            : collect();

        return view('event', ['events' => $events]);
    }

    public function artikel()
    {
        return view('artikel', [
            'articles'    => Artikel::with('kategori')->where('status', 'published')->orderByDesc('tanggal')->get(),
            'kategoriList' => KategoriArtikel::withCount(['artikel' => fn($q) => $q->where('status', 'published')])->get(),
        ]);
    }

    public function cabang()
    {
        return view('cabang', [
            'cabangList' => RumahSakit::where('status', 1)->get(),
        ]);
    }

    public function mcu()
    {
        return view('mcu');
    }

    public function liveAntrian()
    {
        return view('live-antrian');
    }
}

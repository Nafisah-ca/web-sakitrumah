<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\RumahSakit;
use App\Models\Spesialisasi;
use App\Models\Dokter;
use App\Models\JadwalDokter;
use App\Models\Pasien;
use App\Models\JanjiTemu;
use App\Models\Pelayanan;
use App\Models\KategoriArtikel;
use App\Models\Artikel;
use App\Models\Promo;
use App\Models\Kontak;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ── 1. USERS ─────────────────────────────────────────────
        $admin = User::create([
            'nama'     => 'Admin Utama',
            'email'    => 'admin@rumahsakit.com',
            'password' => Hash::make('password'),
            'no_hp'    => '08111000001',
            'role'     => 'admin',
            'foto'     => 'admin.jpg',
            'status'   => 1,
        ]);

        $userBudi = User::create([
            'nama'     => 'Budi Santoso',
            'email'    => 'budi@email.com',
            'password' => Hash::make('password'),
            'no_hp'    => '08222000002',
            'role'     => 'pasien',
            'foto'     => 'budi.jpg',
            'status'   => 1,
        ]);

        $userSiti = User::create([
            'nama'     => 'Siti Rahayu',
            'email'    => 'siti@email.com',
            'password' => Hash::make('password'),
            'no_hp'    => '08333000003',
            'role'     => 'pasien',
            'foto'     => null,
            'status'   => 1,
        ]);

        // ── 2. RUMAH SAKIT ────────────────────────────────────────
        $rsPusat = RumahSakit::create([
            'nama_rs'          => 'RS Sari Sehat Pusat',
            'alamat'           => 'Jl. Sudirman No. 10',
            'kota'             => 'Tangerang',
            'provinsi'         => 'Banten',
            'telepon'          => '02155001000',
            'email'            => 'info@sariseheat.com',
            'maps'             => 'https://maps.google.com/?q=tangerang',
            'jam_operasional'  => 'Senin-Jumat: 07.00-21.00',
            'foto'             => 'rs_pusat.jpg',
            'deskripsi'        => 'Rumah Sakit Sari Sehat cabang utama di Tangerang.',
            'status'           => 1,
        ]);

        $rsSelatan = RumahSakit::create([
            'nama_rs'          => 'RS Sari Sehat Selatan',
            'alamat'           => 'Jl. Gatot Subroto No. 5',
            'kota'             => 'Jakarta Selatan',
            'provinsi'         => 'DKI Jakarta',
            'telepon'          => '02155002000',
            'email'            => 'selatan@sariseheat.com',
            'maps'             => 'https://maps.google.com/?q=jaksel',
            'jam_operasional'  => 'Senin-Sabtu: 08.00-20.00',
            'foto'             => 'rs_selatan.jpg',
            'deskripsi'        => 'Cabang Jakarta Selatan dengan fasilitas lengkap.',
            'status'           => 1,
        ]);

        $rsTimur = RumahSakit::create([
            'nama_rs'          => 'RS Sari Sehat Timur',
            'alamat'           => 'Jl. Ahmad Yani No. 22',
            'kota'             => 'Bekasi',
            'provinsi'         => 'Jawa Barat',
            'telepon'          => '02155003000',
            'email'            => 'timur@sariseheat.com',
            'maps'             => 'https://maps.google.com/?q=bekasi',
            'jam_operasional'  => 'Setiap Hari: 24 Jam',
            'foto'             => 'rs_timur.jpg',
            'deskripsi'        => 'Cabang Bekasi yang buka 24 jam penuh.',
            'status'           => 1,
        ]);

        // ── 3. SPESIALISASI ───────────────────────────────────────
        $spDalam = Spesialisasi::create([
            'nama_spesialisasi' => 'Penyakit Dalam',
            'icon'              => 'icon_penyakit_dalam.png',
            'deskripsi'         => 'Menangani penyakit organ dalam seperti diabetes, hipertensi, dan gangguan metabolik.',
        ]);

        $spAnak = Spesialisasi::create([
            'nama_spesialisasi' => 'Anak',
            'icon'              => 'icon_anak.png',
            'deskripsi'         => 'Menangani kesehatan bayi, anak-anak, hingga remaja.',
        ]);

        $spJantung = Spesialisasi::create([
            'nama_spesialisasi' => 'Jantung',
            'icon'              => 'icon_jantung.png',
            'deskripsi'         => 'Menangani gangguan jantung dan pembuluh darah (kardiovaskular).',
        ]);

        // ── 4. DOKTER ─────────────────────────────────────────────
        $dokter1 = Dokter::create([
            'id_rs'           => $rsPusat->id_rs,
            'id_spesialisasi' => $spDalam->id_spesialisasi,
            'nama'            => 'Ahmad Fauzi',
            'gelar'           => 'dr., Sp.PD',
            'jenis_kelamin'   => 'L',
            'foto'            => 'dr_ahmad.jpg',
            'pendidikan'      => 'S1 FK UI, Sp.PD RSCM',
            'pengalaman'      => '15 tahun praktik di bidang penyakit dalam',
            'biografi'        => 'Dokter senior spesialis penyakit dalam dengan keahlian diabetes.',
            'no_str'          => 'STR-001-2024',
            'status'          => 1,
        ]);

        $dokter2 = Dokter::create([
            'id_rs'           => $rsPusat->id_rs,
            'id_spesialisasi' => $spAnak->id_spesialisasi,
            'nama'            => 'Dewi Lestari',
            'gelar'           => 'dr., Sp.A',
            'jenis_kelamin'   => 'P',
            'foto'            => 'dr_dewi.jpg',
            'pendidikan'      => 'S1 FK UNPAD, Sp.A RSHS',
            'pengalaman'      => '10 tahun menangani pasien anak',
            'biografi'        => 'Dokter spesialis anak berpengalaman di bidang gizi dan tumbuh kembang.',
            'no_str'          => 'STR-002-2024',
            'status'          => 1,
        ]);

        $dokter3 = Dokter::create([
            'id_rs'           => $rsSelatan->id_rs,
            'id_spesialisasi' => $spJantung->id_spesialisasi,
            'nama'            => 'Hendra Wijaya',
            'gelar'           => 'dr., Sp.JP',
            'jenis_kelamin'   => 'L',
            'foto'            => 'dr_hendra.jpg',
            'pendidikan'      => 'S1 FK UGM, Sp.JP RS Sardjito',
            'pengalaman'      => '12 tahun di bidang kardiologi',
            'biografi'        => 'Spesialis jantung dan pembuluh darah dengan fokus pada intervensi non-bedah.',
            'no_str'          => 'STR-003-2024',
            'status'          => 1,
        ]);

        // ── 5. JADWAL DOKTER ──────────────────────────────────────
        $jadwal1 = JadwalDokter::create([
            'id_dokter'   => $dokter1->id_dokter,
            'hari'        => 'Senin',
            'jam_mulai'   => '08:00:00',
            'jam_selesai' => '12:00:00',
            'kuota'       => 15,
            'status'      => 1,
        ]);

        $jadwal2 = JadwalDokter::create([
            'id_dokter'   => $dokter1->id_dokter,
            'hari'        => 'Rabu',
            'jam_mulai'   => '13:00:00',
            'jam_selesai' => '17:00:00',
            'kuota'       => 15,
            'status'      => 1,
        ]);

        $jadwal3 = JadwalDokter::create([
            'id_dokter'   => $dokter2->id_dokter,
            'hari'        => 'Selasa',
            'jam_mulai'   => '09:00:00',
            'jam_selesai' => '13:00:00',
            'kuota'       => 20,
            'status'      => 1,
        ]);

        // ── 6. PASIEN ─────────────────────────────────────────────
        $pasien1 = Pasien::create([
            'id_user'        => $userBudi->id_user,
            'nik'            => '3674010101900001',
            'no_rm'          => 'RM-0001',
            'tempat_lahir'   => 'Jakarta',
            'tanggal_lahir'  => '1990-01-01',
            'jenis_kelamin'  => 'L',
            'alamat'         => 'Jl. Merdeka No. 1, Tangerang',
            'golongan_darah' => 'O+',
            'alergi'         => 'Penisilin',
        ]);

        $pasien2 = Pasien::create([
            'id_user'        => $userSiti->id_user,
            'nik'            => '3674020202920002',
            'no_rm'          => 'RM-0002',
            'tempat_lahir'   => 'Bandung',
            'tanggal_lahir'  => '1992-02-02',
            'jenis_kelamin'  => 'P',
            'alamat'         => 'Jl. Pahlawan No. 5, Bekasi',
            'golongan_darah' => 'A+',
            'alergi'         => null,
        ]);

        $pasien3 = Pasien::create([
            'id_user'        => $admin->id_user,
            'nik'            => '3674030303850003',
            'no_rm'          => 'RM-0003',
            'tempat_lahir'   => 'Surabaya',
            'tanggal_lahir'  => '1985-03-03',
            'jenis_kelamin'  => 'L',
            'alamat'         => 'Jl. Sudirman No. 10, Tangerang',
            'golongan_darah' => 'B+',
            'alergi'         => 'Aspirin',
        ]);

        // ── 7. JANJI TEMU ─────────────────────────────────────────
        JanjiTemu::create([
            'id_pasien'     => $pasien1->id_pasien,
            'id_jadwal'     => $jadwal1->id_jadwal,
            'tanggal'       => '2026-07-14',
            'keluhan'       => 'Gula darah tinggi, sering haus',
            'nomor_antrian' => 1,
            'status'        => 'dikonfirmasi',
        ]);

        JanjiTemu::create([
            'id_pasien'     => $pasien2->id_pasien,
            'id_jadwal'     => $jadwal3->id_jadwal,
            'tanggal'       => '2026-07-15',
            'keluhan'       => 'Anak demam 3 hari, batuk pilek',
            'nomor_antrian' => 1,
            'status'        => 'pending',
        ]);

        JanjiTemu::create([
            'id_pasien'     => $pasien3->id_pasien,
            'id_jadwal'     => $jadwal2->id_jadwal,
            'tanggal'       => '2026-07-16',
            'keluhan'       => 'Kontrol rutin penyakit dalam',
            'nomor_antrian' => 1,
            'status'        => 'pending',
        ]);

        // ── 8. PELAYANAN ──────────────────────────────────────────
        Pelayanan::create([
            'nama_pelayanan' => 'Instalasi Gawat Darurat (IGD)',
            'kategori'       => 'Darurat',
            'gambar'         => 'igd.jpg',
            'deskripsi'      => 'Layanan darurat 24 jam untuk penanganan kasus kritis dan kecelakaan.',
            'status'         => 1,
        ]);

        Pelayanan::create([
            'nama_pelayanan' => 'Rawat Inap',
            'kategori'       => 'Rawat Inap',
            'gambar'         => 'rawat_inap.jpg',
            'deskripsi'      => 'Fasilitas rawat inap dengan berbagai kelas kamar dari ekonomi hingga VIP.',
            'status'         => 1,
        ]);

        Pelayanan::create([
            'nama_pelayanan' => 'Laboratorium Klinik',
            'kategori'       => 'Penunjang',
            'gambar'         => 'lab.jpg',
            'deskripsi'      => 'Pemeriksaan laboratorium lengkap dengan peralatan modern dan hasil cepat.',
            'status'         => 1,
        ]);

        // ── 9. KATEGORI ARTIKEL ───────────────────────────────────
        $katBerita = KategoriArtikel::create(['nama_kategori' => 'Berita RS']);
        $katTips   = KategoriArtikel::create(['nama_kategori' => 'Kesehatan & Tips']);
        $katPromo  = KategoriArtikel::create(['nama_kategori' => 'Promo & Event']);

        // ── 10. ARTIKEL ───────────────────────────────────────────
        Artikel::create([
            'id_kategori' => $katBerita->id_kategori,
            'judul'       => 'RS Sari Sehat Resmikan Gedung Baru',
            'isi'         => '<p>Pada tanggal 1 Juli 2026, RS Sari Sehat meresmikan gedung baru di Tangerang dengan fasilitas modern dan berkapasitas 200 tempat tidur.</p>',
            'gambar'      => 'gedung_baru.jpg',
            'penulis'     => 'Tim Humas',
            'tanggal'     => '2026-07-01',
            'views'       => 350,
            'status'      => 'published',
        ]);

        Artikel::create([
            'id_kategori' => $katTips->id_kategori,
            'judul'       => '5 Tips Menjaga Kesehatan Jantung',
            'isi'         => '<p>Penyakit jantung masih menjadi penyebab kematian nomor satu di Indonesia. Berikut 5 tips menjaga kesehatan jantung Anda setiap hari.</p>',
            'gambar'      => 'tips_jantung.jpg',
            'penulis'     => 'dr. Hendra Wijaya',
            'tanggal'     => '2026-06-20',
            'views'       => 820,
            'status'      => 'published',
        ]);

        Artikel::create([
            'id_kategori' => $katPromo->id_kategori,
            'judul'       => 'Promo Medical Check-Up Juli 2026',
            'isi'         => '<p>Dapatkan diskon 30% untuk paket MCU lengkap sepanjang Juli 2026. Tersedia untuk umum dan perusahaan.</p>',
            'gambar'      => 'promo_mcu.jpg',
            'penulis'     => 'Tim Marketing',
            'tanggal'     => '2026-07-01',
            'views'       => 120,
            'status'      => 'published',
        ]);

        // ── 11. PROMO ─────────────────────────────────────────────
        Promo::create([
            'id_rs'           => $rsPusat->id_rs,
            'judul'           => 'Diskon MCU 30% - Juli 2026',
            'deskripsi'       => 'Dapatkan diskon 30% untuk paket Medical Check-Up lengkap selama bulan Juli 2026.',
            'gambar'          => 'promo_mcu.jpg',
            'tanggal_mulai'   => '2026-07-01',
            'tanggal_selesai' => '2026-07-31',
            'status'          => 'aktif',
        ]);

        Promo::create([
            'id_rs'           => $rsPusat->id_rs,
            'judul'           => 'Gratis Konsultasi Gizi',
            'deskripsi'       => 'Konsultasi ahli gizi gratis setiap Sabtu pukul 09.00-12.00 tanpa perlu reservasi.',
            'gambar'          => 'promo_gizi.jpg',
            'tanggal_mulai'   => '2026-07-05',
            'tanggal_selesai' => '2026-07-26',
            'status'          => 'aktif',
        ]);

        Promo::create([
            'id_rs'           => $rsSelatan->id_rs,
            'judul'           => 'Paket Imunisasi Anak Hemat',
            'deskripsi'       => 'Paket imunisasi lengkap untuk anak 0-5 tahun dengan harga spesial Rp 250.000.',
            'gambar'          => 'promo_imun.jpg',
            'tanggal_mulai'   => '2026-06-01',
            'tanggal_selesai' => '2026-08-31',
            'status'          => 'aktif',
        ]);

        // ── 12. KONTAK ────────────────────────────────────────────
        Kontak::create([
            'nama'    => 'Rina Marlina',
            'email'   => 'rina@email.com',
            'no_hp'   => '08512345001',
            'subjek'  => 'Jadwal Dokter Spesialis Anak',
            'pesan'   => 'Selamat siang, saya ingin menanyakan jadwal dokter anak untuk hari Selasa. Terima kasih.',
            'status'  => 'sudah_dibaca',
        ]);

        Kontak::create([
            'nama'    => 'Teguh Prasetyo',
            'email'   => 'teguh@email.com',
            'no_hp'   => '08512345002',
            'subjek'  => 'Pendaftaran Rawat Inap',
            'pesan'   => 'Apakah tersedia kamar rawat inap kelas 1 untuk minggu ini?',
            'status'  => 'belum_dibaca',
        ]);

        Kontak::create([
            'nama'    => 'Nur Azizah',
            'email'   => 'nur@email.com',
            'no_hp'   => null,
            'subjek'  => 'Informasi Promo MCU',
            'pesan'   => 'Halo, saya tertarik dengan promo medical check-up. Apakah bisa untuk usia 40 tahun?',
            'status'  => 'belum_dibaca',
        ]);
    }
}

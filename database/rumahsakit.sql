-- ============================================================
-- DATABASE: rumahsakit
-- Rancangan untuk Company Profile Website Rumah Sakit
-- Kompatibel dengan PHP Native + MySQL
-- ============================================================

CREATE DATABASE IF NOT EXISTS `rumahsakit`
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE `rumahsakit`;

-- ============================================================
-- 1. TABEL: users
-- Menyimpan data akun login (admin & pasien)
-- ============================================================
CREATE TABLE `users` (
  `id_user`    INT UNSIGNED    NOT NULL AUTO_INCREMENT,
  `nama`       VARCHAR(100)    NOT NULL COMMENT 'Nama lengkap pengguna',
  `email`      VARCHAR(150)    NOT NULL UNIQUE COMMENT 'Email untuk login',
  `password`   VARCHAR(255)    NOT NULL COMMENT 'Password ter-hash',
  `no_hp`      VARCHAR(20)     DEFAULT NULL COMMENT 'Nomor handphone',
  `role`       ENUM('admin','pasien') NOT NULL DEFAULT 'pasien' COMMENT 'Hak akses pengguna',
  `foto`       VARCHAR(255)    DEFAULT NULL COMMENT 'Path foto profil',
  `status`     TINYINT(1)      NOT NULL DEFAULT 1 COMMENT '1=aktif, 0=nonaktif',
  `created_at` TIMESTAMP       NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP       NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`nama`, `email`, `password`, `no_hp`, `role`, `foto`, `status`) VALUES
('Admin Utama',    'admin@rumahsakit.com',  '$2y$12$abc123hashedpassword1', '08111000001', 'admin',  'admin.jpg',   1),
('Budi Santoso',   'budi@email.com',        '$2y$12$abc123hashedpassword2', '08222000002', 'pasien', 'budi.jpg',    1),
('Siti Rahayu',    'siti@email.com',        '$2y$12$abc123hashedpassword3', '08333000003', 'pasien', NULL,          1);

-- ============================================================
-- 2. TABEL: rumah_sakit
-- Menyimpan profil dan informasi cabang rumah sakit
-- ============================================================
CREATE TABLE `rumah_sakit` (
  `id_rs`            INT UNSIGNED  NOT NULL AUTO_INCREMENT,
  `nama_rs`          VARCHAR(150)  NOT NULL COMMENT 'Nama resmi rumah sakit',
  `alamat`           TEXT          NOT NULL COMMENT 'Alamat lengkap',
  `kota`             VARCHAR(100)  NOT NULL COMMENT 'Kota/Kabupaten',
  `provinsi`         VARCHAR(100)  NOT NULL COMMENT 'Provinsi',
  `telepon`          VARCHAR(30)   DEFAULT NULL COMMENT 'Nomor telepon kantor',
  `email`            VARCHAR(150)  DEFAULT NULL COMMENT 'Email resmi RS',
  `maps`             TEXT          DEFAULT NULL COMMENT 'URL embed Google Maps',
  `jam_operasional`  VARCHAR(255)  DEFAULT NULL COMMENT 'Keterangan jam buka/tutup',
  `foto`             VARCHAR(255)  DEFAULT NULL COMMENT 'Path foto gedung RS',
  `deskripsi`        TEXT          DEFAULT NULL COMMENT 'Deskripsi singkat RS',
  `status`           TINYINT(1)    NOT NULL DEFAULT 1 COMMENT '1=aktif, 0=nonaktif',
  PRIMARY KEY (`id_rs`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `rumah_sakit` (`nama_rs`, `alamat`, `kota`, `provinsi`, `telepon`, `email`, `maps`, `jam_operasional`, `foto`, `deskripsi`, `status`) VALUES
('RS Sari Sehat Pusat',  'Jl. Sudirman No. 10',  'Tangerang',  'Banten',      '02155001000', 'info@sariseheat.com',  'https://maps.google.com/?q=tangerang',  'Senin-Jumat: 07.00-21.00',    'rs_pusat.jpg',   'Rumah Sakit Sari Sehat cabang utama di Tangerang.',  1),
('RS Sari Sehat Selatan','Jl. Gatot Subroto No. 5','Jakarta Selatan','DKI Jakarta','02155002000', 'selatan@sariseheat.com','https://maps.google.com/?q=jaksel','Senin-Sabtu: 08.00-20.00',   'rs_selatan.jpg', 'Cabang Jakarta Selatan dengan fasilitas lengkap.',  1),
('RS Sari Sehat Timur',  'Jl. Ahmad Yani No. 22', 'Bekasi',     'Jawa Barat',  '02155003000', 'timur@sariseheat.com', 'https://maps.google.com/?q=bekasi',     'Setiap Hari: 24 Jam',         'rs_timur.jpg',   'Cabang Bekasi yang buka 24 jam penuh.',             1);

-- ============================================================
-- 3. TABEL: spesialisasi
-- Menyimpan daftar spesialisasi medis
-- ============================================================
CREATE TABLE `spesialisasi` (
  `id_spesialisasi`   INT UNSIGNED  NOT NULL AUTO_INCREMENT,
  `nama_spesialisasi` VARCHAR(150)  NOT NULL COMMENT 'Nama spesialisasi dokter',
  `icon`              VARCHAR(255)  DEFAULT NULL COMMENT 'Path ikon spesialisasi',
  `deskripsi`         TEXT          DEFAULT NULL COMMENT 'Penjelasan singkat spesialisasi',
  PRIMARY KEY (`id_spesialisasi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `spesialisasi` (`nama_spesialisasi`, `icon`, `deskripsi`) VALUES
('Penyakit Dalam',   'icon_penyakit_dalam.png',  'Menangani penyakit organ dalam seperti diabetes, hipertensi, dan gangguan metabolik.'),
('Anak',             'icon_anak.png',             'Menangani kesehatan bayi, anak-anak, hingga remaja.'),
('Jantung',          'icon_jantung.png',          'Menangani gangguan jantung dan pembuluh darah (kardiovaskular).');

-- ============================================================
-- 4. TABEL: dokter
-- Menyimpan data dokter, terhubung ke RS dan spesialisasi
-- ============================================================
CREATE TABLE `dokter` (
  `id_dokter`      INT UNSIGNED   NOT NULL AUTO_INCREMENT,
  `id_rs`          INT UNSIGNED   NOT NULL COMMENT 'FK: rumah_sakit.id_rs',
  `id_spesialisasi`INT UNSIGNED   NOT NULL COMMENT 'FK: spesialisasi.id_spesialisasi',
  `nama`           VARCHAR(150)   NOT NULL COMMENT 'Nama lengkap dokter tanpa gelar',
  `gelar`          VARCHAR(100)   DEFAULT NULL COMMENT 'Gelar akademik, mis: dr., Sp.PD',
  `jenis_kelamin`  ENUM('L','P')  NOT NULL COMMENT 'L=Laki-laki, P=Perempuan',
  `foto`           VARCHAR(255)   DEFAULT NULL COMMENT 'Path foto dokter',
  `pendidikan`     TEXT           DEFAULT NULL COMMENT 'Riwayat pendidikan',
  `pengalaman`     TEXT           DEFAULT NULL COMMENT 'Pengalaman praktik',
  `biografi`       TEXT           DEFAULT NULL COMMENT 'Profil singkat dokter',
  `no_str`         VARCHAR(50)    DEFAULT NULL UNIQUE COMMENT 'Nomor Surat Tanda Registrasi dokter',
  `status`         TINYINT(1)     NOT NULL DEFAULT 1 COMMENT '1=aktif, 0=nonaktif',
  PRIMARY KEY (`id_dokter`),
  CONSTRAINT `fk_dokter_rs`          FOREIGN KEY (`id_rs`)          REFERENCES `rumah_sakit`  (`id_rs`)          ON UPDATE CASCADE ON DELETE RESTRICT,
  CONSTRAINT `fk_dokter_spesialisasi` FOREIGN KEY (`id_spesialisasi`) REFERENCES `spesialisasi` (`id_spesialisasi`) ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `dokter` (`id_rs`, `id_spesialisasi`, `nama`, `gelar`, `jenis_kelamin`, `foto`, `pendidikan`, `pengalaman`, `biografi`, `no_str`, `status`) VALUES
(1, 1, 'Ahmad Fauzi',     'dr., Sp.PD',    'L', 'dr_ahmad.jpg',  'S1 FK UI, Sp.PD RSCM',     '15 tahun praktik di bidang penyakit dalam', 'Dokter senior spesialis penyakit dalam dengan keahlian diabetes.',  'STR-001-2024', 1),
(1, 2, 'Dewi Lestari',    'dr., Sp.A',     'P', 'dr_dewi.jpg',   'S1 FK UNPAD, Sp.A RSHS',   '10 tahun menangani pasien anak',            'Dokter spesialis anak berpengalaman di bidang gizi dan tumbuh kembang.', 'STR-002-2024', 1),
(2, 3, 'Hendra Wijaya',   'dr., Sp.JP',    'L', 'dr_hendra.jpg', 'S1 FK UGM, Sp.JP RS Sardjito','12 tahun di bidang kardiologi',           'Spesialis jantung dan pembuluh darah dengan fokus pada intervensi non-bedah.', 'STR-003-2024', 1);

-- ============================================================
-- 5. TABEL: jadwal_dokter
-- Menyimpan jadwal praktik dokter per hari
-- ============================================================
CREATE TABLE `jadwal_dokter` (
  `id_jadwal`   INT UNSIGNED                                                              NOT NULL AUTO_INCREMENT,
  `id_dokter`   INT UNSIGNED                                                              NOT NULL COMMENT 'FK: dokter.id_dokter',
  `hari`        ENUM('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu')            NOT NULL COMMENT 'Hari praktik',
  `jam_mulai`   TIME                                                                      NOT NULL COMMENT 'Jam mulai praktik',
  `jam_selesai` TIME                                                                      NOT NULL COMMENT 'Jam selesai praktik',
  `kuota`       SMALLINT UNSIGNED                                                         NOT NULL DEFAULT 20 COMMENT 'Jumlah pasien maks per sesi',
  `status`      TINYINT(1)                                                                NOT NULL DEFAULT 1 COMMENT '1=aktif, 0=libur',
  PRIMARY KEY (`id_jadwal`),
  CONSTRAINT `fk_jadwal_dokter` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `jadwal_dokter` (`id_dokter`, `hari`, `jam_mulai`, `jam_selesai`, `kuota`, `status`) VALUES
(1, 'Senin',  '08:00:00', '12:00:00', 15, 1),
(1, 'Rabu',   '13:00:00', '17:00:00', 15, 1),
(2, 'Selasa', '09:00:00', '13:00:00', 20, 1);

-- ============================================================
-- 6. TABEL: pasien
-- Menyimpan data medis pasien, terhubung ke users
-- ============================================================
CREATE TABLE `pasien` (
  `id_pasien`      INT UNSIGNED      NOT NULL AUTO_INCREMENT,
  `id_user`        INT UNSIGNED      NOT NULL UNIQUE COMMENT 'FK: users.id_user (1-to-1)',
  `nik`            CHAR(16)          DEFAULT NULL UNIQUE COMMENT 'Nomor Induk Kependudukan',
  `no_rm`          VARCHAR(20)       DEFAULT NULL UNIQUE COMMENT 'Nomor Rekam Medis',
  `tempat_lahir`   VARCHAR(100)      DEFAULT NULL COMMENT 'Kota tempat lahir',
  `tanggal_lahir`  DATE              DEFAULT NULL COMMENT 'Tanggal lahir pasien',
  `jenis_kelamin`  ENUM('L','P')     DEFAULT NULL COMMENT 'L=Laki-laki, P=Perempuan',
  `alamat`         TEXT              DEFAULT NULL COMMENT 'Alamat domisili',
  `golongan_darah` ENUM('A','B','AB','O','A+','A-','B+','B-','AB+','AB-','O+','O-') DEFAULT NULL,
  `alergi`         TEXT              DEFAULT NULL COMMENT 'Riwayat alergi obat/makanan',
  PRIMARY KEY (`id_pasien`),
  CONSTRAINT `fk_pasien_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pasien` (`id_user`, `nik`, `no_rm`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `golongan_darah`, `alergi`) VALUES
(2, '3674010101900001', 'RM-0001', 'Jakarta',  '1990-01-01', 'L', 'Jl. Merdeka No. 1, Tangerang',   'O+',  'Penisilin'),
(3, '3674020202920002', 'RM-0002', 'Bandung',  '1992-02-02', 'P', 'Jl. Pahlawan No. 5, Bekasi',     'A+',  NULL),
(1, '3674030303850003', 'RM-0003', 'Surabaya', '1985-03-03', 'L', 'Jl. Sudirman No. 10, Tangerang',  'B+', 'Aspirin');

-- ============================================================
-- 7. TABEL: janji_temu
-- Menyimpan data booking/pendaftaran online pasien
-- ============================================================
CREATE TABLE `janji_temu` (
  `id_janji`      INT UNSIGNED   NOT NULL AUTO_INCREMENT,
  `id_pasien`     INT UNSIGNED   NOT NULL COMMENT 'FK: pasien.id_pasien',
  `id_jadwal`     INT UNSIGNED   NOT NULL COMMENT 'FK: jadwal_dokter.id_jadwal',
  `tanggal`       DATE           NOT NULL COMMENT 'Tanggal kunjungan yang dipilih',
  `keluhan`       TEXT           DEFAULT NULL COMMENT 'Keluhan utama pasien',
  `nomor_antrian` SMALLINT UNSIGNED DEFAULT NULL COMMENT 'Nomor antrian digenerate otomatis',
  `status`        ENUM('pending','dikonfirmasi','selesai','dibatalkan') NOT NULL DEFAULT 'pending',
  `created_at`    TIMESTAMP      NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_janji`),
  CONSTRAINT `fk_janji_pasien`  FOREIGN KEY (`id_pasien`) REFERENCES `pasien`         (`id_pasien`) ON UPDATE CASCADE ON DELETE RESTRICT,
  CONSTRAINT `fk_janji_jadwal`  FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal_dokter`  (`id_jadwal`) ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `janji_temu` (`id_pasien`, `id_jadwal`, `tanggal`, `keluhan`, `nomor_antrian`, `status`) VALUES
(1, 1, '2026-07-14', 'Gula darah tinggi, sering haus',  1, 'dikonfirmasi'),
(2, 3, '2026-07-15', 'Anak demam 3 hari, batuk pilek',  1, 'pending'),
(3, 2, '2026-07-16', 'Kontrol rutin penyakit dalam',     1, 'pending');

-- ============================================================
-- 8. TABEL: pelayanan
-- Menyimpan daftar layanan/fasilitas yang ditawarkan RS
-- ============================================================
CREATE TABLE `pelayanan` (
  `id_pelayanan`    INT UNSIGNED  NOT NULL AUTO_INCREMENT,
  `nama_pelayanan`  VARCHAR(150)  NOT NULL COMMENT 'Nama layanan, mis: IGD, Rawat Inap',
  `kategori`        VARCHAR(100)  DEFAULT NULL COMMENT 'Kategori layanan, mis: Rawat Jalan, Penunjang',
  `gambar`          VARCHAR(255)  DEFAULT NULL COMMENT 'Path gambar ilustrasi layanan',
  `deskripsi`       TEXT          DEFAULT NULL COMMENT 'Penjelasan lengkap layanan',
  `status`          TINYINT(1)    NOT NULL DEFAULT 1 COMMENT '1=aktif, 0=nonaktif',
  PRIMARY KEY (`id_pelayanan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pelayanan` (`nama_pelayanan`, `kategori`, `gambar`, `deskripsi`, `status`) VALUES
('Instalasi Gawat Darurat (IGD)', 'Darurat',      'igd.jpg',       'Layanan darurat 24 jam untuk penanganan kasus kritis dan kecelakaan.',          1),
('Rawat Inap',                    'Rawat Inap',   'rawat_inap.jpg','Fasilitas rawat inap dengan berbagai kelas kamar dari ekonomi hingga VIP.',     1),
('Laboratorium Klinik',           'Penunjang',    'lab.jpg',       'Pemeriksaan laboratorium lengkap dengan peralatan modern dan hasil cepat.',      1);

-- ============================================================
-- 9. TABEL: kategori_artikel
-- Menyimpan kategori untuk artikel/berita RS
-- ============================================================
CREATE TABLE `kategori_artikel` (
  `id_kategori`    INT UNSIGNED  NOT NULL AUTO_INCREMENT,
  `nama_kategori`  VARCHAR(100)  NOT NULL COMMENT 'Nama kategori artikel',
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `kategori_artikel` (`nama_kategori`) VALUES
('Berita RS'),
('Kesehatan & Tips'),
('Promo & Event');

-- ============================================================
-- 10. TABEL: artikel
-- Menyimpan konten artikel/berita/blog RS
-- ============================================================
CREATE TABLE `artikel` (
  `id_artikel`   INT UNSIGNED  NOT NULL AUTO_INCREMENT,
  `id_kategori`  INT UNSIGNED  NOT NULL COMMENT 'FK: kategori_artikel.id_kategori',
  `judul`        VARCHAR(255)  NOT NULL COMMENT 'Judul artikel',
  `isi`          LONGTEXT      NOT NULL COMMENT 'Isi konten artikel (HTML/Markdown)',
  `gambar`       VARCHAR(255)  DEFAULT NULL COMMENT 'Path gambar thumbnail artikel',
  `penulis`      VARCHAR(100)  DEFAULT NULL COMMENT 'Nama penulis artikel',
  `tanggal`      DATE          NOT NULL COMMENT 'Tanggal publikasi artikel',
  `views`        INT UNSIGNED  NOT NULL DEFAULT 0 COMMENT 'Jumlah kali artikel dibaca',
  `status`       ENUM('draft','published','archived') NOT NULL DEFAULT 'draft' COMMENT 'Status publikasi',
  PRIMARY KEY (`id_artikel`),
  CONSTRAINT `fk_artikel_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_artikel` (`id_kategori`) ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `artikel` (`id_kategori`, `judul`, `isi`, `gambar`, `penulis`, `tanggal`, `views`, `status`) VALUES
(1, 'RS Sari Sehat Resmikan Gedung Baru',   '<p>Pada tanggal 1 Juli 2026, RS Sari Sehat meresmikan gedung baru di Tangerang...</p>', 'gedung_baru.jpg',  'Tim Humas',     '2026-07-01', 350, 'published'),
(2, '5 Tips Menjaga Kesehatan Jantung',      '<p>Penyakit jantung masih menjadi penyebab kematian nomor satu. Berikut tipsnya...</p>', 'tips_jantung.jpg', 'dr. Hendra Wijaya', '2026-06-20', 820, 'published'),
(3, 'Promo Medical Check-Up Juli 2026',      '<p>Dapatkan diskon 30% untuk paket MCU lengkap sepanjang Juli 2026...</p>',         'promo_mcu.jpg',    'Tim Marketing', '2026-07-01', 120, 'published');

-- ============================================================
-- 11. TABEL: promo
-- Menyimpan data promosi/penawaran khusus dari RS
-- ============================================================
CREATE TABLE `promo` (
  `id_promo`       INT UNSIGNED  NOT NULL AUTO_INCREMENT,
  `id_rs`          INT UNSIGNED  NOT NULL COMMENT 'FK: rumah_sakit.id_rs',
  `judul`          VARCHAR(255)  NOT NULL COMMENT 'Judul/nama promo',
  `deskripsi`      TEXT          DEFAULT NULL COMMENT 'Detail keterangan promo',
  `gambar`         VARCHAR(255)  DEFAULT NULL COMMENT 'Path banner promo',
  `tanggal_mulai`  DATE          NOT NULL COMMENT 'Tanggal promo mulai berlaku',
  `tanggal_selesai`DATE          NOT NULL COMMENT 'Tanggal promo berakhir',
  `status`         ENUM('aktif','tidak_aktif','kadaluarsa') NOT NULL DEFAULT 'aktif' COMMENT 'Status promo',
  PRIMARY KEY (`id_promo`),
  CONSTRAINT `fk_promo_rs` FOREIGN KEY (`id_rs`) REFERENCES `rumah_sakit` (`id_rs`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `promo` (`id_rs`, `judul`, `deskripsi`, `gambar`, `tanggal_mulai`, `tanggal_selesai`, `status`) VALUES
(1, 'Diskon MCU 30% - Juli 2026',       'Dapatkan diskon 30% untuk paket Medical Check-Up lengkap selama bulan Juli 2026.',      'promo_mcu.jpg',     '2026-07-01', '2026-07-31', 'aktif'),
(1, 'Gratis Konsultasi Gizi',           'Konsultasi ahli gizi gratis setiap Sabtu pukul 09.00-12.00 tanpa perlu reservasi.',   'promo_gizi.jpg',    '2026-07-05', '2026-07-26', 'aktif'),
(2, 'Paket Imunisasi Anak Hemat',       'Paket imunisasi lengkap untuk anak 0-5 tahun dengan harga spesial Rp 250.000.',       'promo_imun.jpg',    '2026-06-01', '2026-08-31', 'aktif');

-- ============================================================
-- 12. TABEL: kontak
-- Menyimpan pesan masuk dari formulir kontak website
-- ============================================================
CREATE TABLE `kontak` (
  `id_kontak` INT UNSIGNED  NOT NULL AUTO_INCREMENT,
  `nama`      VARCHAR(100)  NOT NULL COMMENT 'Nama pengirim pesan',
  `email`     VARCHAR(150)  NOT NULL COMMENT 'Email pengirim untuk balasan',
  `no_hp`     VARCHAR(20)   DEFAULT NULL COMMENT 'Nomor HP opsional',
  `subjek`    VARCHAR(255)  NOT NULL COMMENT 'Subjek/topik pesan',
  `pesan`     TEXT          NOT NULL COMMENT 'Isi pesan dari pengguna',
  `tanggal`   DATETIME      NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Waktu pesan dikirim',
  `status`    ENUM('belum_dibaca','sudah_dibaca','dibalas') NOT NULL DEFAULT 'belum_dibaca',
  PRIMARY KEY (`id_kontak`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `kontak` (`nama`, `email`, `no_hp`, `subjek`, `pesan`, `status`) VALUES
('Rina Marlina',   'rina@email.com',   '08512345001', 'Jadwal Dokter Spesialis Anak',      'Selamat siang, saya ingin menanyakan jadwal dokter anak untuk hari Selasa. Terima kasih.', 'sudah_dibaca'),
('Teguh Prasetyo', 'teguh@email.com',  '08512345002', 'Pendaftaran Rawat Inap',            'Apakah tersedia kamar rawat inap kelas 1 untuk minggu ini?',                              'belum_dibaca'),
('Nur Azizah',     'nur@email.com',    NULL,           'Informasi Promo MCU',               'Halo, saya tertarik dengan promo medical check-up. Apakah bisa untuk usia 40 tahun?',    'belum_dibaca');


-- ============================================================
-- RINGKASAN RELASI ANTAR TABEL (ERD Sederhana)
-- ============================================================
--
--  users (id_user) <──────────── pasien (id_user)
--                                    │
--                                    │ id_pasien
--                                    ▼
--                              janji_temu (id_pasien, id_jadwal)
--                                    │
--                                    │ id_jadwal
--                                    ▼
--                              jadwal_dokter (id_dokter)
--                                    │
--                                    │ id_dokter
--                                    ▼
--                               dokter (id_rs, id_spesialisasi)
--                              /                   \
--                   id_rs ▼                         ▼ id_spesialisasi
--                  rumah_sakit                   spesialisasi
--                       │
--                       │ id_rs
--                       ▼
--                      promo
--
--  kategori_artikel (id_kategori) ◄──── artikel (id_kategori)
--
--  pelayanan  → berdiri sendiri (tidak butuh FK)
--  kontak     → berdiri sendiri (form publik)
--
-- ============================================================

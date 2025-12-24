-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Des 2025 pada 15.22
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hima`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `acara`
--

CREATE TABLE `acara` (
  `id_acara` int(11) NOT NULL,
  `judul_acara` varchar(255) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `tanggal_pelaksanaan` date NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `poster` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `acara`
--

INSERT INTO `acara` (`id_acara`, `judul_acara`, `kategori`, `tanggal_pelaksanaan`, `lokasi`, `deskripsi`, `poster`) VALUES
(2, 'Pengenalan Budaya Akademik Kampus Sistem Informasi 2025', '', '2025-08-28', 'PKM UIN SUSKA RIAU', 'Kegiatan Ini Diikuti Oleh Seluruh Mahasiswa Baru UIN SUSKA RIAU, Dengan Tujuan Menyambut Serta Memperkenalkan UIN SUSKA RIAU Secara Langsung.', '576-95-PBAK.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `hari` varchar(20) DEFAULT NULL,
  `kategori` varchar(50) NOT NULL,
  `isi_berita` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `penulis_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `hari`, `kategori`, `isi_berita`, `gambar`, `tanggal`, `penulis_id`) VALUES
(4, 'GUES WHO TO BE THE NEXT LEADER SISTEM INFORMASI 2026', '30 Desember 2026 - 0', 'Berita Mahasiswa', '[PENDAFTARAN CALON KETUA DAN WAKIL HIMASI 2026]\r\n\r\nAssalamualaikum Warahmatullahi Wabarakatuh\r\n\r\nHallo Sobat Sistem Informasi🙌🏻\r\n\r\nPendaftaran calon ketua Himpunan Mahasiswa Sistem Informasi 2026 telah dibuka mulai : \r\n🗓️ Tanggal : 30 Desember 2026 - 02 Januari 2026\r\n\r\nSyarat-syarat calon ketua dan wakil :\r\n\r\nBerstatus sebagai mahasiswa aktif Sistem Informasi\r\n\r\nMemiliki IPK minimal 3,25\r\n\r\nDuduk pada semester 3-7\r\n\r\nMampu membaca Al-Qur\'an\r\n\r\nPernah menjadi pengurus ormawa intra kampus yang dibuktikan dengan SK\r\n\r\nSehat secara jasmani & rohani\r\n\r\nBersedia dicalonkan atau mencalonkan\r\n\r\nMenyatakan ketersediaan secara tertulis untuk tidak menjadi pengurus pada organisasi ekstra kampus atau partai politik selama menjabat\r\n\r\nTidak pernah melanggar tata tertib & kode etik mahasiswa dibuktikan dengan surat berkelakuan baik\r\n\r\nMemiliki Visi, Misi, dan Program yang jelas\r\n\r\nMendapatkan rekomendasi dari Prodi Sistem Informasi\r\n\r\nBerkas-berkas persyaratan calon :\r\n\r\nSurat aktif kuliah\r\n\r\nTranskip nilai\r\n\r\nSK pernah menjadi pengurus ormawa\r\n\r\nSurat tertulis menyatakan tidak menjadi pengurus pada organisasi ekstra kampus dan politik\r\n\r\nSurat rekomendasi dari Prodi Sistem Informasi\r\n\r\nSurat berkelakuan baik dari Prodi\r\n\r\nWassalamualaikum Warahmatullahi Wabarakatuh\r\n\r\nTertanda Bupati HIMASI 2025 Bivandira Aurel Mahadewa', '24122025144415-WHO NEXT .jpeg', '2025-12-24', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen`
--

CREATE TABLE `dokumen` (
  `id_dokumen` int(11) NOT NULL,
  `judul_dokumen` varchar(200) DEFAULT NULL,
  `nama_file` varchar(255) NOT NULL,
  `diupload_oleh` int(11) DEFAULT NULL,
  `tanggal_upload` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumentasi`
--

CREATE TABLE `dokumentasi` (
  `id_dokumentasi` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `judul_foto` varchar(100) DEFAULT NULL,
  `foto` varchar(255) NOT NULL,
  `tanggal_upload` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(200) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `poster` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `divisi` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT 'default.jpg',
  `password` varchar(255) NOT NULL,
  `role` enum('admin','anggota') DEFAULT 'anggota',
  `foto_profil` varchar(255) DEFAULT 'default.jpg',
  `angkatan` year(4) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nim`, `nama_lengkap`, `jabatan`, `divisi`, `foto`, `password`, `role`, `foto_profil`, `angkatan`, `no_hp`, `created_at`) VALUES
(1, '12450322466', 'Admin Test Prety', '', '-', 'default.jpg', '$2y$10$B5yYitJRFf5gTbMtxsKYaeEVjg81upy1xeDbPWXzuIGhRZTEYErK2', 'admin', 'default.jpg', NULL, NULL, '2025-12-17 08:12:30'),
(2, '1195011000', 'Mahasiswa Percobaan', 'Anggota Biasa', 'Kominfo', 'default.jpg', '827ccb0eea8a706c4c34a16891f84e7b', 'anggota', 'default.jpg', NULL, NULL, '2025-12-20 09:28:30'),
(5, '12450120388', 'Suria Briska', 'Sekretaris Umum', '-', '12450120388_SEKJEN.png', '827ccb0eea8a706c4c34a16891f84e7b', 'anggota', 'default.jpg', NULL, NULL, '2025-12-20 10:25:54'),
(6, '12450120399', 'Shofia Anjani', 'Sekretaris 2', '-', '12450120399_SEK 2.png', '827ccb0eea8a706c4c34a16891f84e7b', 'anggota', 'default.jpg', NULL, NULL, '2025-12-20 10:27:11'),
(7, '12450120400', 'Muhammad Faiz', 'Kepala Divisi Advokesma', '', '12450120400_KADIV ADVOKESMA.png', '827ccb0eea8a706c4c34a16891f84e7b', 'anggota', 'default.jpg', NULL, NULL, '2025-12-20 10:28:05'),
(8, '12450120401', 'Siti Rahmah', 'Bendahara Umum', '-', '12450120401_BENDUM.png', '827ccb0eea8a706c4c34a16891f84e7b', 'anggota', 'default.jpg', NULL, NULL, '2025-12-20 10:50:59'),
(9, '12440322404', 'Mutia Maharani', 'Bendahara 1', '-', '12440322404_BENDAHARA 2.png', '827ccb0eea8a706c4c34a16891f84e7b', 'anggota', 'default.jpg', NULL, NULL, '2025-12-20 10:54:04'),
(10, '12567892421', 'Pocut Naura Nisrina', 'Kepala Divisi Media,Komunikasi & Informasi', '', '12567892421_KADIV MEDKOM.png', '827ccb0eea8a706c4c34a16891f84e7b', 'anggota', 'default.jpg', NULL, NULL, '2025-12-20 10:55:38'),
(11, '12350421344', 'Rifky Naufal Athaya', 'Kepala Divisi Kesekretariatan', '', '12350421344_KADIV KESEKRETARIATAN.png', '827ccb0eea8a706c4c34a16891f84e7b', 'anggota', 'default.jpg', NULL, NULL, '2025-12-20 11:38:59'),
(12, '12350421355', 'Fitria Nurhayati', 'Kepala Divisi Kaderisasi', '', '12350421355_KADIV KADERISASI.png', '827ccb0eea8a706c4c34a16891f84e7b', 'anggota', 'default.jpg', NULL, NULL, '2025-12-20 11:40:19'),
(13, '12350421366', 'Elsya Avivi', 'Kepala Divisi Minat & Bakat', '', '12350421366_KADIV MINBA.png', '827ccb0eea8a706c4c34a16891f84e7b', 'anggota', 'default.jpg', NULL, NULL, '2025-12-20 11:41:04'),
(14, '12350421377', 'Ridwan Ridhoi', 'Kepala Divisi Keagamaan', '', '12350421377_KADIV KEAGAMAAN.png', '827ccb0eea8a706c4c34a16891f84e7b', 'anggota', 'default.jpg', NULL, NULL, '2025-12-20 11:44:59'),
(15, '12450322467', 'Nadirah', 'Kepala Divisi Kewirausahaan', '', '12450322467_KADIV KWU.png', '827ccb0eea8a706c4c34a16891f84e7b', 'anggota', 'default.jpg', NULL, NULL, '2025-12-20 11:46:06'),
(16, '12450322409', 'Igo Novelza', 'Kepala Divisi Hubungan Luar Kerjasama', '', '12450322409_KADIV HLK.png', '827ccb0eea8a706c4c34a16891f84e7b', 'anggota', 'default.jpg', NULL, NULL, '2025-12-20 11:46:44'),
(17, '12450322345', 'Ilham Pradika', 'Kepala Divisi Sarana Prasarana', '', '12450322345_KADIV SARANA PRASARANA.png', '827ccb0eea8a706c4c34a16891f84e7b', 'anggota', 'default.jpg', NULL, NULL, '2025-12-20 11:47:51'),
(18, '12450322231', 'Nikma Khusnia', 'Kepala Divisi Pendidikan,Riset & Teknologi', '', '12450322231_KADIV PRISTEK.png', '827ccb0eea8a706c4c34a16891f84e7b', 'anggota', 'default.jpg', NULL, NULL, '2025-12-20 11:48:37'),
(21, '12422022421', 'Bivandira Aurel Mahadewa', 'Ketua Himpunan', '-', '12422022422_12450120366_BUP.png', '827ccb0eea8a706c4c34a16891f84e7b', 'anggota', 'default.jpg', NULL, NULL, '2025-12-20 12:48:50'),
(22, '12342133455', 'Muhammad Azarin ', 'Wakil Ketua', '-', '12342133455_12432199034_12450120377_WABUP.png', '827ccb0eea8a706c4c34a16891f84e7b', 'anggota', 'default.jpg', NULL, NULL, '2025-12-20 12:49:24');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `acara`
--
ALTER TABLE `acara`
  ADD PRIMARY KEY (`id_acara`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indeks untuk tabel `dokumentasi`
--
ALTER TABLE `dokumentasi`
  ADD PRIMARY KEY (`id_dokumentasi`);

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `acara`
--
ALTER TABLE `acara`
  MODIFY `id_acara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `dokumentasi`
--
ALTER TABLE `dokumentasi`
  MODIFY `id_dokumentasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`penulis_id`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jun 2024 pada 09.38
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuadran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `IDAdmin` int(10) UNSIGNED NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`IDAdmin`, `Username`, `Password`, `Email`, `Nama`) VALUES
(1, 'Rakha', '12345', 'Rakha@gmail.com', 'Rakha'),
(3, 'Admin', 'Admin', 'Admin@gmail.com', 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `nama_acara` varchar(255) NOT NULL,
  `deskripsi_acara` text NOT NULL,
  `tanggal_acara` date NOT NULL,
  `waktu_acara` time NOT NULL,
  `tempat_acara` varchar(255) NOT NULL,
  `kategori_acara` varchar(255) NOT NULL,
  `biaya_pendaftaran` decimal(10,2) NOT NULL,
  `kontak_penyelenggara` varchar(255) NOT NULL,
  `url_pendaftaran` varchar(255) NOT NULL,
  `instruksi_tambahan` text DEFAULT NULL,
  `status` enum('menunggu','ditolak','diterima') DEFAULT 'menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_pekerjaan`
--

CREATE TABLE `kategori_pekerjaan` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori_pekerjaan`
--

INSERT INTO `kategori_pekerjaan` (`id`, `nama_kategori`) VALUES
(1, 'Administrasi'),
(2, 'Asuransi'),
(3, 'Pendidikan'),
(4, 'Kesehatan'),
(5, 'Olahraga'),
(6, 'Seni dan Budaya'),
(7, 'Pariwisata'),
(8, 'Marketing'),
(9, 'Teknologi Informasi'),
(10, 'Transportasi'),
(11, 'Hotel'),
(12, 'Lainnya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `loker`
--

CREATE TABLE `loker` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kategori_pekerjaan_id` int(11) NOT NULL,
  `posisi` varchar(255) NOT NULL,
  `tingkat_pendidikan` varchar(255) NOT NULL,
  `gender` enum('Laki-laki','Perempuan','Semua') NOT NULL,
  `status_kerja` enum('Full-time','Part-time','Kontrak') NOT NULL,
  `besaran_gaji` decimal(10,2) NOT NULL,
  `lokasi_bekerja` varchar(255) NOT NULL,
  `syarat_pekerjaan` text NOT NULL,
  `tanggal_dipost` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `loker`
--

INSERT INTO `loker` (`id`, `user_id`, `kategori_pekerjaan_id`, `posisi`, `tingkat_pendidikan`, `gender`, `status_kerja`, `besaran_gaji`, `lokasi_bekerja`, `syarat_pekerjaan`, `tanggal_dipost`) VALUES
(1, 1, 12, 'asdca', 'ewfaw', 'Laki-laki', 'Part-time', 10.00, 'vawev', 'gergerg\r\nesrgserg\r\nersgerg\r\nsergserg\r\nsergesrg\r\nsergser', NULL),
(2, 1, 12, 'asdca', 'ewfaw', 'Laki-laki', 'Part-time', 10.00, 'vawev', 'gergerg\r\nesrgserg\r\nersgerg\r\nsergserg\r\nsergesrg\r\nsergser', NULL),
(10, 17, 1, 'rfw', 'asdf', 'Laki-laki', '', 32.00, 'weqf', 'adswf', NULL),
(11, 17, 3, 'Guru Sekolah Dasar', 'S1', 'Perempuan', '', 3000000.00, 'Sd Negeri 001 Sleman', '1. Pendidikan minimal S1\r\n2. Bisa mengajar anak autis\r\n3. Ini Prankk', NULL),
(12, 17, 1, 'dsgaf', 'sadf', 'Perempuan', '', 234.00, 'wer', 'asfd', '2024-06-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `industri` varchar(255) NOT NULL,
  `deskripsi_perusahaan` text DEFAULT NULL,
  `media_sosial` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `alamat_perusahaan` text DEFAULT NULL,
  `logo_perusahaan` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('menunggu','ditolak','diterima') DEFAULT 'menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama_perusahaan`, `industri`, `deskripsi_perusahaan`, `media_sosial`, `website`, `alamat_perusahaan`, `logo_perusahaan`, `username`, `password`, `status`) VALUES
(1, 'savero', 'sasasa', 'ksjabiula fwuipegf iuaw efg pewiua gfpeiwu gfupif gwipfg aiuyefg aliuwyoe fla wei fol gaewf', 'ig:verzzkh', '-', 'dsadfuiwha fpuwaeghfpiuw efg paiuyg fipuaWE Y AW', '', '12345', '12345', 'diterima'),
(2, 'savero', 'sasa', 'uyigefuia ewrfiauwg fpiauwygef ipawug friapuyfg aliuweyrfugy wer fa wf', 'ig:verzzkh', '-', 'hgdfalisy fgagf ayufg olayf gayw gf', 'sdd', '12345', '12345', 'ditolak'),
(3, 'gugug', 'arsgaergf', 'aerwgawg', 'weagaweg', 'ewagaw', 'geawgwa', 'awegwegw', 'agus', 'agus', 'menunggu'),
(4, '', '', '', '', '', '', '', '', '', 'menunggu'),
(5, '', '', '', '', '', '', '', '', '', 'menunggu'),
(6, '', '', '', '', '', '', '', 'sa', 'sekar', 'diterima'),
(7, '', '', '', '', '', '', '', 'asd', 'asd', 'menunggu'),
(8, '', '', '', '', '', '', '', 'aaa', 'aaaaaaaa', 'menunggu'),
(9, '', '', '', '', '', '', '', 'as', 'ssssssss', 'menunggu'),
(10, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '', '', 'diterima'),
(11, '', '', '', '', '', '', '', '', '', 'menunggu'),
(12, 'dsf', 'sadfsa', 'dfsdaf', 'sadfsda', 'fasdfas', 'dfsa', 'asdfas', 'aaa', 'aaa', 'menunggu'),
(13, '', '', '', '', '', '', '', '', '', 'menunggu'),
(14, '', '', '', '', '', '', '', '', '', 'menunggu'),
(15, 'sadfasdf', 'sadfasdfa', 'sdfsdf', 'sdfasd', 'fasdfasd', 'fsafasd', 'dsafas', 'wawa', 'wawa', 'diterima'),
(16, 'swsw', 'asdx', 'asda', 'sdasda', 'dasdasd', 'asdas', 'dasdsad', 'asd', 'asd', 'menunggu'),
(17, 'gustui', 'jrytdt', 'ghjfjht', 'kutdct', 'iyflyf', 'jgck,ujy', 'ily7lf', 'aaaa', 'aaaa', 'diterima');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`IDAdmin`);

--
-- Indeks untuk tabel `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_pekerjaan`
--
ALTER TABLE `kategori_pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `loker`
--
ALTER TABLE `loker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_user_loker` (`user_id`),
  ADD KEY `FK_kategori_pekerjaan_loker` (`kategori_pekerjaan_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori_pekerjaan`
--
ALTER TABLE `kategori_pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `loker`
--
ALTER TABLE `loker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `loker`
--
ALTER TABLE `loker`
  ADD CONSTRAINT `FK_kategori_pekerjaan_loker` FOREIGN KEY (`kategori_pekerjaan_id`) REFERENCES `kategori_pekerjaan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_user_loker` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2024 at 03:00 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `IDAdmin` int(10) UNSIGNED NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event`
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
-- Table structure for table `kategori_pekerjaan`
--

CREATE TABLE `kategori_pekerjaan` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_pekerjaan`
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
-- Table structure for table `loker`
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
  `syarat_pekerjaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_pekerjaan`
--
ALTER TABLE `kategori_pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loker`
--
ALTER TABLE `loker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_user_loker` (`user_id`),
  ADD KEY `FK_kategori_pekerjaan_loker` (`kategori_pekerjaan_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_pekerjaan`
--
ALTER TABLE `kategori_pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `loker`
--
ALTER TABLE `loker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `loker`
--
ALTER TABLE `loker`
  ADD CONSTRAINT `FK_kategori_pekerjaan_loker` FOREIGN KEY (`kategori_pekerjaan_id`) REFERENCES `kategori_pekerjaan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_user_loker` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

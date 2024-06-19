-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 17 Jun 2024 pada 15.19
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
-- Database: `Kuadran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`Username`, `Password`, `Email`, `Nama`) VALUES
('admin1', 'adminsatu', 'adminsatu@kuadran.com', 'Rakha'),
('admin2', 'admindua', 'admindua@kuadran.com', 'Ferrel'),
('admin3', 'admintiga', 'admintiga@kuadran.com', 'Dinda'),
('gusti', 'adminempat', 'adminganteng@kuadran.com', 'Gustigg');

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
  `Instruksi_tambahan` varchar(255) NOT NULL,
  `foto_poster` varchar(255) NOT NULL,
  `status` enum('menunggu','ditolak','diterima') DEFAULT 'menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id`, `nama_acara`, `deskripsi_acara`, `tanggal_acara`, `waktu_acara`, `tempat_acara`, `kategori_acara`, `biaya_pendaftaran`, `kontak_penyelenggara`, `url_pendaftaran`, `Instruksi_tambahan`, `foto_poster`, `status`) VALUES
(1, 'Job Fair Offline UAJY', 'Job fair yang diselenggarakan oleh Universitas Atma Jaya Yogyakarta.', '2024-05-14', '09:00:00', 'Universitas Atma Jaya Yogyakarta', 'Job Fair', 0.00, 'Admin', 'https://example.com/pendaftaran1', '', '', 'menunggu'),
(2, 'JOBAIR CAREER EXPO 2024', 'Job fair besar yang diadakan oleh JOBFAIRCOID Yogyakarta.', '2024-06-18', '08:30:00', 'JOBFAIRCOID Yogyakarta', 'Job Fair', 0.00, 'Admin', 'https://example.com/pendaftaran2', '', '', 'menunggu'),
(3, 'Job Fair Virtual', 'Job fair yang diadakan secara virtual oleh Dinas Sosial Kerja Dan Transmigrasi Kota Yogyakarta.', '2024-07-22', '10:00:00', 'Dinas Sosial Kerja Dan Transmigrasi Kota Yogyakarta', 'Job Fair', 0.00, 'Admin', 'https://example.com/pendaftaran3', '', '', 'menunggu'),
(4, 'Microsoft Azure Synapse for Developers', 'Workshop tentang Microsoft Azure Synapse for Developers.', '2019-07-17', '14:00:00', 'Tempat lain', 'Workshop', 0.00, 'Admin', 'https://example.com/pendaftaran4', '', '', 'menunggu'),
(5, 'Seminar Teknologi 2024', 'Seminar tentang perkembangan teknologi tahun 2024', '2024-07-15', '09:00:00', 'Gedung Serba Guna Jakarta', 'Seminar', 100000.00, '08123456789', 'http://seminarteknologi2024.com', 'Persiapkan diri sebelum seminar dimulai', 'seminar_teknologi_2024.jpg', 'diterima'),
(6, 'Pameran Seni Rupa', 'Pameran seni rupa dengan karya seniman lokal', '2024-08-20', '10:00:00', 'Galeri Seni Surabaya', 'Pameran Seni', 75000.00, '08543210987', 'http://pameransenirupa.com', 'Tidak diperlukan instruksi tambahan', 'pameran_seni_rupa.jpg', 'menunggu'),
(7, 'Festival Musik Indie', 'Festival musik indie dengan band-bad indie terkenal', '2024-09-05', '18:00:00', 'Stadion Utama Bandung', 'Festival Musik', 125000.00, '08217654321', 'http://festivalmusikindie.com', 'Harap membawa tiket yang telah terdaftar', 'festival_musik_indie.jpg', 'ditolak'),
(8, 'Lomba Desain Grafis 2024', 'Lomba desain grafis bagi pelajar dan mahasiswa', '2024-07-30', '13:00:00', 'Universitas Teknologi Yogyakarta', 'Lomba Desain', 50000.00, '08987654321', 'http://lombadesaingrafis2024.com', 'Pastikan file karya telah siap diupload', 'lomba_desain_grafis_2024.jpg', 'menunggu'),
(9, 'Konferensi Bisnis 2024', 'Konferensi bisnis dengan topik tentang strategi pemasaran digital', '2024-08-10', '11:30:00', 'Hotel Grand Hyatt Bali', 'Konferensi Bisnis', 150000.00, '08765432109', 'http://konferensibisnis2024.com', 'Mohon mengisi formulir pendaftaran dengan benar', 'konferensi_bisnis_2024.jpg', 'diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_pekerjaan`
--

CREATE TABLE `kategori_pekerjaan` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `gaji_min` decimal(10,2) NOT NULL,
  `gaji_max` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori_pekerjaan`
--

INSERT INTO `kategori_pekerjaan` (`id`, `nama_kategori`, `gaji_min`, `gaji_max`) VALUES
(1, 'Software Engineer', 50000.00, 120000.00),
(2, 'Accountant', 45000.00, 90000.00),
(3, 'Teacher', 40000.00, 60000.00),
(4, 'Nurse', 45000.00, 80000.00),
(5, 'Marketing Manager', 60000.00, 120000.00),
(6, 'Graphic Designer', 40000.00, 70000.00),
(7, 'Chef', 35000.00, 60000.00),
(8, 'Electrician', 40000.00, 60000.00),
(9, 'Lawyer', 60000.00, 150000.00),
(10, 'Data Analyst', 50000.00, 90000.00),
(11, 'HR Manager', 55000.00, 100000.00),
(12, 'Customer Service Representative', 35000.00, 55000.00),
(13, 'Project Manager', 65000.00, 130000.00),
(14, 'Pharmacist', 90000.00, 130000.00),
(15, 'Architect', 60000.00, 120000.00),
(16, 'Financial Analyst', 55000.00, 110000.00),
(17, 'Web Developer', 50000.00, 100000.00),
(18, 'Sales Representative', 40000.00, 80000.00),
(19, 'Mechanical Engineer', 60000.00, 110000.00),
(20, 'Social Media Manager', 45000.00, 90000.00),
(21, 'Operations Manager', 70000.00, 150000.00),
(22, 'Medical Assistant', 30000.00, 50000.00),
(23, 'Network Administrator', 55000.00, 100000.00),
(24, 'Artist', 25000.00, 60000.00),
(25, 'Physical Therapist', 65000.00, 110000.00),
(26, 'IT Support Specialist', 40000.00, 70000.00),
(27, 'Chef de Cuisine', 40000.00, 80000.00),
(28, 'Executive Assistant', 45000.00, 80000.00),
(29, 'Account Manager', 50000.00, 100000.00),
(30, 'Civil Engineer', 60000.00, 120000.00),
(31, 'Content Writer', 35000.00, 60000.00),
(32, 'Veterinarian', 70000.00, 120000.00),
(33, 'Interior Designer', 45000.00, 90000.00),
(34, 'Actuary', 80000.00, 150000.00),
(35, 'Radiologic Technologist', 45000.00, 80000.00),
(36, 'Software Developer', 55000.00, 110000.00),
(37, 'Advertising Manager', 60000.00, 130000.00),
(38, 'Financial Advisor', 60000.00, 150000.00),
(39, 'E-commerce Specialist', 45000.00, 90000.00),
(40, 'Librarian', 30000.00, 50000.00),
(41, 'Aerospace Engineer', 70000.00, 140000.00),
(42, 'Event Planner', 40000.00, 70000.00),
(43, 'Dental Hygienist', 50000.00, 80000.00),
(44, 'Video Editor', 35000.00, 60000.00),
(45, 'Human Resources Generalist', 50000.00, 90000.00),
(46, 'Product Manager', 80000.00, 150000.00),
(47, 'Electrical Engineer', 60000.00, 120000.00),
(48, 'Marketing Coordinator', 40000.00, 70000.00),
(49, 'Fitness Trainer', 30000.00, 60000.00),
(50, 'Insurance Agent', 35000.00, 70000.00),
(51, 'Curriculum Developer', 45000.00, 80000.00),
(52, 'Legal Assistant', 35000.00, 60000.00),
(53, 'Software Tester', 45000.00, 85000.00),
(54, 'Nurse Practitioner', 80000.00, 130000.00),
(55, 'UI/UX Designer', 55000.00, 110000.00),
(56, 'Real Estate Agent', 50000.00, 100000.00),
(57, 'Operations Coordinator', 40000.00, 65000.00),
(58, 'Biomedical Engineer', 60000.00, 110000.00),
(59, 'Social Worker', 40000.00, 70000.00),
(60, 'Systems Analyst', 55000.00, 100000.00),
(61, 'Fashion Designer', 35000.00, 70000.00),
(62, 'Copywriter', 40000.00, 80000.00),
(63, 'Mechanical Designer', 55000.00, 100000.00),
(64, 'Investment Analyst', 60000.00, 120000.00),
(65, 'Pharmacy Technician', 30000.00, 50000.00),
(66, 'Network Engineer', 60000.00, 110000.00),
(67, 'Game Developer', 55000.00, 120000.00),
(68, 'Account Executive', 50000.00, 100000.00),
(69, 'Business Analyst', 60000.00, 110000.00),
(70, 'Dental Assistant', 25000.00, 45000.00),
(71, 'Creative Director', 80000.00, 150000.00),
(72, 'Chemist', 45000.00, 80000.00),
(73, 'Occupational Therapist', 60000.00, 100000.00),
(74, 'Legal Counsel', 70000.00, 150000.00),
(75, 'IT Consultant', 65000.00, 120000.00),
(76, 'Project Coordinator', 40000.00, 70000.00),
(77, 'Physical Therapist Assistant', 45000.00, 80000.00),
(78, 'Environmental Engineer', 55000.00, 100000.00),
(79, 'Customer Success Manager', 60000.00, 120000.00),
(80, 'Musician', 20000.00, 80000.00),
(81, 'SEO Specialist', 45000.00, 90000.00),
(82, 'Logistics Coordinator', 35000.00, 60000.00),
(83, 'Medical Technologist', 45000.00, 75000.00),
(84, 'Animator', 45000.00, 90000.00),
(85, 'Financial Controller', 80000.00, 150000.00),
(86, 'IT Project Manager', 70000.00, 130000.00),
(87, 'Veterinary Technician', 30000.00, 50000.00),
(88, 'Product Designer', 60000.00, 110000.00),
(89, 'Academic Advisor', 40000.00, 65000.00),
(90, 'Supply Chain Manager', 60000.00, 120000.00),
(91, 'Multimedia Artist', 35000.00, 60000.00),
(92, 'Investment Banker', 80000.00, 200000.00),
(93, 'Office Manager', 45000.00, 80000.00),
(94, 'Content Strategist', 50000.00, 100000.00),
(95, 'Security Analyst', 65000.00, 120000.00),
(96, 'Public Relations Specialist', 40000.00, 75000.00),
(97, 'Landscape Architect', 55000.00, 100000.00),
(98, 'Respiratory Therapist', 50000.00, 90000.00),
(99, 'Risk Manager', 70000.00, 130000.00),
(100, 'Technical Writer', 45000.00, 85000.00);

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
  `logo_perusahaan` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('menunggu','ditolak','diterima') DEFAULT 'menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama_perusahaan`, `industri`, `deskripsi_perusahaan`, `media_sosial`, `website`, `alamat_perusahaan`, `logo_perusahaan`, `username`, `password`, `status`) VALUES
(1, 'Perusahaan A', 'Teknologi Informasi', 'Perusahaan A bergerak di bidang teknologi informasi.', '@perusahaana', 'http://www.perusahaana.com', 'Jl. Teknologi No. 1', '', 'userA', 'passwordA', 'diterima'),
(2, 'Perusahaan B', 'Pendidikan', 'Perusahaan B bergerak di bidang pendidikan.', '@perusahaanb', 'http://www.perusahaanb.com', 'Jl. Pendidikan No. 2', '', 'userB', 'passwordB', 'diterima'),
(3, 'Perusahaan C', 'Kesehatan', 'Perusahaan C bergerak di bidang kesehatan.', '@perusahaanc', 'http://www.perusahaanc.com', 'Jl. Kesehatan No. 3', '', 'userC', 'passwordC', 'diterima');

--
-- Indexes for dumped tables
--

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kategori_pekerjaan`
--
ALTER TABLE `kategori_pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT untuk tabel `loker`
--
ALTER TABLE `loker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `loker`
--
ALTER TABLE `loker`
  ADD CONSTRAINT `FK_nama_kategori_loker` FOREIGN KEY (`kategori_pekerjaan_id`) REFERENCES `kategori_pekerjaan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_user_loker` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

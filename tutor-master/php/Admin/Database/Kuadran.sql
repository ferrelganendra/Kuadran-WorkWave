-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 27 Jun 2024 pada 15.39
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
  `foto_poster` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id`, `nama_acara`, `deskripsi_acara`, `tanggal_acara`, `waktu_acara`, `tempat_acara`, `kategori_acara`, `biaya_pendaftaran`, `kontak_penyelenggara`, `url_pendaftaran`, `Instruksi_tambahan`, `foto_poster`) VALUES
(10, 'Cek1', '213412idadawjdpoj', '2004-03-12', '10:00:00', 'Tidak diketahui', 'adakdno', 0.00, 'dkanawklda', 'ddawdad.com', 'dajkdjwka;dgk;adwga', 'uploads/jobfair3.jpeg'),
(12, 'Job Fair Offline UAJY', 'Job fair yang diselenggarakan oleh Universitas Atma Jaya Yogyakarta', '2024-05-14', '09:00:00', 'Universitas Atma Jaya Yogyakarta', 'Job Fair', 0.00, 'Admin', 'https://www.karirfair.com/jf-1099', 'Info selanjutnya hubungi admin.', 'uploads/JOBFAIR.png'),
(14, 'JOBFAIR CAREER EXPO 2024', 'Job fair besar yang diadakan oleh JOBFAIRCOID Yogyakarta.', '2024-06-18', '08:30:00', 'JOBFAIRCOID Yogyakarta', 'Job Fair', 0.00, 'Admin Penyelenggara', 'https://jadwalevent.web.id/jobfair-career-expo-2024-di-sleman-city-hall', 'Info lebih lanjut klik link ', 'uploads/jobfair1.png'),
(15, 'Job Fair Virtual', 'Job fair yang diadakan secara virtual oleh Dinas Sosial Kerja Dan Transmigrasi Kota Yogyakarta.', '2024-07-22', '10:00:00', 'Via Link Zoom', 'Workshop', 0.00, 'Admin Penyelenggara', 'https://www.karirfair.com/jf-1033', 'Hubungi Admin.', 'uploads/jobfair2.png'),
(16, 'Konferensi Bisnis 2024', 'Konferensi bisnis dengan topik tentang strategi pemasaran digital.', '2024-08-10', '11:30:00', 'Hotel Grand Hyatt Bali', 'Konferensi Bisnis', 150000.00, '08765432109', 'http://konferensibisnis2024.com', 'Mohon mengisi formulir pendaftaran dengan benar di website pendaftaran.', 'uploads/konferensi_bisnis_2024.jpg'),
(17, 'Lomba Desain Grafis 2024', 'Lomba desain grafis bagi pelajar dan mahasiswa', '2024-07-30', '13:00:00', 'Universitas Teknologi Yogyakarta', 'Lomba Desain', 50000.00, '08987654321', 'http://lombadesaingrafis2024.com', 'Pastikan file karya telah siap diupload di link yang tertera.', 'uploads/lomba_desain_2024.jpeg');

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
  `foto_loker` varchar(255) NOT NULL,
  `tanggal_dipost` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `loker`
--

INSERT INTO `loker` (`id`, `user_id`, `kategori_pekerjaan_id`, `posisi`, `tingkat_pendidikan`, `gender`, `status_kerja`, `besaran_gaji`, `lokasi_bekerja`, `syarat_pekerjaan`, `foto_loker`, `tanggal_dipost`) VALUES
(1, 1, 17, 'Full-stack Developer', 'S1', 'Semua', 'Full-time', 15000000.00, 'Jakarta', 'Pengalaman min. 2 tahun di pengembangan full-stack.', '', '2024-06-17'),
(2, 2, 4, 'Registered Nurse', 'D3', 'Semua', 'Full-time', 12000000.00, 'Surabaya', 'Memiliki sertifikat profesi.', '', '2024-06-16'),
(3, 3, 12, 'Customer Service Agent', 'SMA', 'Semua', 'Part-time', 6000000.00, 'Bandung', 'Bersedia bekerja dalam shift.', '', '2024-06-15'),
(4, 3, 30, 'Structural Engineer', 'S1', 'Laki-laki', 'Kontrak', 18000000.00, 'Yogyakarta', 'Pengalaman dalam perencanaan struktur bangunan.', '', '2024-06-14'),
(5, 2, 6, 'Senior Graphic Designer', 'S1', 'Semua', 'Full-time', 16000000.00, 'Surabaya', 'Kreatif dan inovatif dalam desain grafis.', '', '2024-06-13'),
(6, 1, 18, 'Front-end Developer', 'S1', 'Semua', 'Full-time', 14000000.00, 'Jakarta', 'Pengalaman dengan HTML, CSS, dan JavaScript.', '', '2024-06-12'),
(7, 2, 25, 'Physical Therapist', 'S1', 'Perempuan', 'Part-time', 10000000.00, 'Surabaya', 'Memiliki lisensi sebagai fisioterapis.', '', '2024-06-11'),
(8, 3, 15, 'Junior Architect', 'D3', 'Semua', 'Kontrak', 9000000.00, 'Bandung', 'Mampu menggunakan perangkat lunak desain arsitektur.', '', '2024-06-10'),
(9, 1, 9, 'Corporate Lawyer', 'S2', 'Semua', 'Full-time', 20000000.00, 'Jakarta', 'Pengalaman dalam hukum korporasi.', '', '2024-06-09'),
(10, 2, 36, 'Software Developer', 'S1', 'Semua', 'Full-time', 17000000.00, 'Surabaya', 'Keahlian dalam pengembangan perangkat lunak.', '', '2024-06-08'),
(11, 3, 21, 'Operations Specialist', 'SMA', 'Semua', 'Part-time', 7000000.00, 'Bandung', 'Mengelola proses operasional harian perusahaan.', '', '2024-06-07'),
(12, 1, 7, 'Executive Chef', 'S1', 'Semua', 'Full-time', 18000000.00, 'Jakarta', 'Berpengalaman dalam manajemen dapur.', '', '2024-06-06'),
(13, 2, 3, 'Mathematics Teacher', 'S1', 'Semua', 'Full-time', 13000000.00, 'Surabaya', 'Menguasai kurikulum matematika.', '', '2024-06-05'),
(14, 3, 10, 'Data Analyst', 'S1', 'Semua', 'Part-time', 8000000.00, 'Bandung', 'Analisis data menggunakan SQL dan Python.', '', '2024-06-04'),
(15, 1, 17, 'Web Developer', 'D3', 'Semua', 'Kontrak', 16000000.00, 'Jakarta', 'Pengalaman dalam pengembangan website.', '', '2024-06-03'),
(16, 2, 14, 'Pharmacist', 'S2', 'Semua', 'Full-time', 19000000.00, 'Surabaya', 'Menguasai farmakologi dan dispensing.', '', '2024-06-02'),
(17, 3, 6, 'Graphic Designer', 'D3', 'Semua', 'Full-time', 15000000.00, 'Bandung', 'Kreatif dalam desain grafis.', '', '2024-06-01'),
(18, 1, 11, 'HR Manager', 'S2', 'Semua', 'Full-time', 22000000.00, 'Jakarta', 'Manajemen sumber daya manusia.', '', '2024-05-31'),
(19, 2, 1, 'Software Engineer', 'S1', 'Semua', 'Part-time', 9000000.00, 'Surabaya', 'Pengembangan aplikasi dengan Java.', '', '2024-05-30'),
(20, 3, 16, 'Financial Analyst', 'S1', 'Semua', 'Full-time', 17000000.00, 'Bandung', 'Analisis keuangan dan laporan.', '', '2024-05-29'),
(21, 1, 8, 'Electrician', 'SMK', 'Semua', 'Kontrak', 12000000.00, 'Jakarta', 'Menguasai instalasi listrik.', '', '2024-05-28'),
(22, 2, 19, 'Mechanical Engineer', 'S1', 'Laki-laki', 'Full-time', 20000000.00, 'Surabaya', 'Desain dan pemeliharaan mesin.', '', '2024-05-27'),
(23, 3, 5, 'Marketing Manager', 'S2', 'Semua', 'Full-time', 23000000.00, 'Bandung', 'Strategi pemasaran dan branding.', '', '2024-05-26'),
(24, 1, 12, 'Customer Service Representative', 'SMA', 'Semua', 'Part-time', 10000000.00, 'Jakarta', 'Melayani pelanggan dengan baik.', '', '2024-05-25'),
(25, 2, 7, 'Executive Chef', 'S1', 'Semua', 'Full-time', 18000000.00, 'Surabaya', 'Berpengalaman dalam manajemen dapur.', '', '2024-05-24'),
(26, 3, 3, 'Mathematics Teacher', 'S1', 'Semua', 'Full-time', 13000000.00, 'Bandung', 'Menguasai kurikulum matematika.', '', '2024-05-23'),
(27, 1, 10, 'Data Analyst', 'S1', 'Semua', 'Part-time', 8000000.00, 'Jakarta', 'Analisis data menggunakan SQL dan Python.', '', '2024-05-22'),
(28, 2, 17, 'Web Developer', 'D3', 'Semua', 'Kontrak', 16000000.00, 'Surabaya', 'Pengalaman dalam pengembangan website.', '', '2024-05-21'),
(29, 3, 14, 'Pharmacist', 'S2', 'Semua', 'Full-time', 19000000.00, 'Bandung', 'Menguasai farmakologi dan dispensing.', '', '2024-05-20'),
(30, 1, 6, 'Graphic Designer', 'D3', 'Semua', 'Full-time', 15000000.00, 'Jakarta', 'Kreatif dalam desain grafis.', '', '2024-05-19'),
(31, 2, 11, 'HR Manager', 'S2', 'Semua', 'Full-time', 22000000.00, 'Surabaya', 'Manajemen sumber daya manusia.', '', '2024-05-18'),
(32, 3, 1, 'Software Engineer', 'S1', 'Semua', 'Part-time', 9000000.00, 'Bandung', 'Pengembangan aplikasi dengan Java.', '', '2024-05-17'),
(33, 1, 16, 'Financial Analyst', 'S1', 'Semua', 'Full-time', 17000000.00, 'Jakarta', 'Analisis keuangan dan laporan.', '', '2024-05-16'),
(34, 2, 8, 'Electrician', 'SMK', 'Semua', 'Kontrak', 12000000.00, 'Surabaya', 'Menguasai instalasi listrik.', '', '2024-05-15'),
(35, 3, 19, 'Mechanical Engineer', 'S1', 'Laki-laki', 'Full-time', 20000000.00, 'Bandung', 'Desain dan pemeliharaan mesin.', '', '2024-05-14'),
(36, 1, 5, 'Marketing Manager', 'S2', 'Semua', 'Full-time', 23000000.00, 'Jakarta', 'Strategi pemasaran dan branding.', '', '2024-05-13'),
(37, 2, 12, 'Customer Service Representative', 'SMA', 'Semua', 'Part-time', 10000000.00, 'Surabaya', 'Melayani pelanggan dengan baik.', '', '2024-05-12'),
(38, 3, 7, 'Executive Chef', 'S1', 'Semua', 'Full-time', 18000000.00, 'Bandung', 'Berpengalaman dalam manajemen dapur.', '', '2024-05-11'),
(39, 1, 3, 'Mathematics Teacher', 'S1', 'Semua', 'Full-time', 13000000.00, 'Jakarta', 'Menguasai kurikulum matematika.', '', '2024-05-10'),
(40, 2, 10, 'Data Analyst', 'S1', 'Semua', 'Part-time', 8000000.00, 'Surabaya', 'Analisis data menggunakan SQL dan Python.', '', '2024-05-09'),
(41, 3, 17, 'Web Developer', 'D3', 'Semua', 'Kontrak', 16000000.00, 'Bandung', 'Pengalaman dalam pengembangan website.', '', '2024-05-08'),
(42, 1, 14, 'Pharmacist', 'S2', 'Semua', 'Full-time', 19000000.00, 'Jakarta', 'Menguasai farmakologi dan dispensing.', '', '2024-05-07'),
(43, 2, 6, 'Graphic Designer', 'D3', 'Semua', 'Full-time', 15000000.00, 'Surabaya', 'Kreatif dalam desain grafis.', '', '2024-05-06'),
(44, 3, 11, 'HR Manager', 'S2', 'Semua', 'Full-time', 22000000.00, 'Bandung', 'Manajemen sumber daya manusia.', '', '2024-05-05'),
(45, 1, 1, 'Software Engineer', 'S1', 'Semua', 'Part-time', 9000000.00, 'Jakarta', 'Pengembangan aplikasi dengan Java.', '', '2024-05-04'),
(46, 2, 16, 'Financial Analyst', 'S1', 'Semua', 'Full-time', 17000000.00, 'Surabaya', 'Analisis keuangan dan laporan.', '', '2024-05-03'),
(47, 3, 8, 'Electrician', 'SMK', 'Semua', 'Kontrak', 12000000.00, 'Bandung', 'Menguasai instalasi listrik.', '', '2024-05-02'),
(48, 1, 19, 'Mechanical Engineer', 'S1', 'Laki-laki', 'Full-time', 20000000.00, 'Jakarta', 'Desain dan pemeliharaan mesin.', '', '2024-05-01'),
(49, 2, 5, 'Marketing Manager', 'S2', 'Semua', 'Full-time', 23000000.00, 'Surabaya', 'Strategi pemasaran dan branding.', '', '2024-04-30'),
(50, 3, 12, 'Customer Service Representative', 'SMA', 'Semua', 'Part-time', 10000000.00, 'Bandung', 'Melayani pelanggan dengan baik.', '', '2024-04-29'),
(51, 1, 7, 'Executive Chef', 'S1', 'Semua', 'Full-time', 18000000.00, 'Jakarta', 'Berpengalaman dalam manajemen dapur.', '', '2024-04-28'),
(52, 2, 3, 'Mathematics Teacher', 'S1', 'Semua', 'Full-time', 13000000.00, 'Surabaya', 'Menguasai kurikulum matematika.', '', '2024-04-27'),
(53, 3, 10, 'Data Analyst', 'S1', 'Semua', 'Part-time', 8000000.00, 'Bandung', 'Analisis data menggunakan SQL dan Python.', '', '2024-04-26'),
(54, 1, 17, 'Web Developer', 'D3', 'Semua', 'Kontrak', 16000000.00, 'Jakarta', 'Pengalaman dalam pengembangan website.', '', '2024-04-25'),
(55, 2, 14, 'Pharmacist', 'S2', 'Semua', 'Full-time', 19000000.00, 'Surabaya', 'Menguasai farmakologi dan dispensing.', '', '2024-04-24'),
(56, 3, 6, 'Graphic Designer', 'D3', 'Semua', 'Full-time', 15000000.00, 'Bandung', 'Kreatif dalam desain grafis.', '', '2024-04-23'),
(57, 1, 11, 'HR Manager', 'S2', 'Semua', 'Full-time', 22000000.00, 'Jakarta', 'Manajemen sumber daya manusia.', '', '2024-04-22'),
(58, 2, 1, 'Software Engineer', 'S1', 'Semua', 'Part-time', 9000000.00, 'Surabaya', 'Pengembangan aplikasi dengan Java.', '', '2024-04-21'),
(59, 3, 16, 'Financial Analyst', 'S1', 'Semua', 'Full-time', 17000000.00, 'Bandung', 'Analisis keuangan dan laporan.', '', '2024-04-20'),
(60, 1, 8, 'Electrician', 'SMK', 'Semua', 'Kontrak', 12000000.00, 'Jakarta', 'Menguasai instalasi listrik.', '', '2024-04-19'),
(61, 2, 19, 'Mechanical Engineer', 'S1', 'Laki-laki', 'Full-time', 20000000.00, 'Surabaya', 'Desain dan pemeliharaan mesin.', '', '2024-04-18'),
(62, 3, 5, 'Marketing Manager', 'S2', 'Semua', 'Full-time', 23000000.00, 'Bandung', 'Strategi pemasaran dan branding.', '', '2024-04-17'),
(63, 1, 12, 'Customer Service Representative', 'SMA', 'Semua', 'Part-time', 10000000.00, 'Jakarta', 'Melayani pelanggan dengan baik.', '', '2024-04-16'),
(64, 2, 7, 'Executive Chef', 'S1', 'Semua', 'Full-time', 18000000.00, 'Surabaya', 'Berpengalaman dalam manajemen dapur.', '', '2024-04-15'),
(65, 3, 3, 'Mathematics Teacher', 'S1', 'Semua', 'Full-time', 13000000.00, 'Bandung', 'Menguasai kurikulum matematika.', '', '2024-04-14'),
(66, 1, 10, 'Data Analyst', 'S1', 'Semua', 'Part-time', 8000000.00, 'Jakarta', 'Analisis data menggunakan SQL dan Python.', '', '2024-04-13'),
(67, 2, 17, 'Web Developer', 'D3', 'Semua', 'Kontrak', 16000000.00, 'Surabaya', 'Pengalaman dalam pengembangan website.', '', '2024-04-12'),
(68, 3, 14, 'Pharmacist', 'S2', 'Semua', 'Full-time', 19000000.00, 'Bandung', 'Menguasai farmakologi dan dispensing.', '', '2024-04-11'),
(69, 1, 6, 'Graphic Designer', 'D3', 'Semua', 'Full-time', 15000000.00, 'Jakarta', 'Kreatif dalam desain grafis.', '', '2024-04-10'),
(70, 2, 11, 'HR Manager', 'S2', 'Semua', 'Full-time', 22000000.00, 'Surabaya', 'Manajemen sumber daya manusia.', '', '2024-04-09'),
(71, 3, 1, 'Software Engineer', 'S1', 'Semua', 'Part-time', 9000000.00, 'Bandung', 'Pengembangan aplikasi dengan Java.', '', '2024-04-08'),
(72, 1, 16, 'Financial Analyst', 'S1', 'Semua', 'Full-time', 17000000.00, 'Jakarta', 'Analisis keuangan dan laporan.', '', '2024-04-07'),
(73, 2, 8, 'Electrician', 'SMK', 'Semua', 'Kontrak', 12000000.00, 'Surabaya', 'Menguasai instalasi listrik.', '', '2024-04-06'),
(74, 3, 19, 'Mechanical Engineer', 'S1', 'Laki-laki', 'Full-time', 20000000.00, 'Bandung', 'Desain dan pemeliharaan mesin.', '', '2024-04-05'),
(75, 1, 5, 'Marketing Manager', 'S2', 'Semua', 'Full-time', 23000000.00, 'Jakarta', 'Strategi pemasaran dan branding.', '', '2024-04-04'),
(76, 2, 12, 'Customer Service Representative', 'SMA', 'Semua', 'Part-time', 10000000.00, 'Surabaya', 'Melayani pelanggan dengan baik.', '', '2024-04-03'),
(77, 3, 7, 'Executive Chef', 'S1', 'Semua', 'Full-time', 18000000.00, 'Bandung', 'Berpengalaman dalam manajemen dapur.', '', '2024-04-02'),
(78, 1, 3, 'Mathematics Teacher', 'S1', 'Semua', 'Full-time', 13000000.00, 'Jakarta', 'Menguasai kurikulum matematika.', '', '2024-04-01'),
(79, 2, 10, 'Data Analyst', 'S1', 'Semua', 'Part-time', 8000000.00, 'Surabaya', 'Analisis data menggunakan SQL dan Python.', '', '2024-03-31'),
(80, 3, 17, 'Web Developer', 'D3', 'Semua', 'Kontrak', 16000000.00, 'Bandung', 'Pengalaman dalam pengembangan website.', '', '2024-03-30'),
(81, 1, 14, 'Pharmacist', 'S2', 'Semua', 'Full-time', 19000000.00, 'Jakarta', 'Menguasai farmakologi dan dispensing.', '', '2024-03-29'),
(82, 2, 6, 'Graphic Designer', 'D3', 'Semua', 'Full-time', 15000000.00, 'Surabaya', 'Kreatif dalam desain grafis.', '', '2024-03-28'),
(83, 3, 11, 'HR Manager', 'S2', 'Semua', 'Full-time', 22000000.00, 'Bandung', 'Manajemen sumber daya manusia.', '', '2024-03-27'),
(84, 1, 1, 'Software Engineer', 'S1', 'Semua', 'Part-time', 9000000.00, 'Jakarta', 'Pengembangan aplikasi dengan Java.', '', '2024-03-26'),
(85, 2, 16, 'Financial Analyst', 'S1', 'Semua', 'Full-time', 17000000.00, 'Surabaya', 'Analisis keuangan dan laporan.', '', '2024-03-25'),
(86, 3, 8, 'Electrician', 'SMK', 'Semua', 'Kontrak', 12000000.00, 'Bandung', 'Menguasai instalasi listrik.', '', '2024-03-24'),
(87, 1, 19, 'Mechanical Engineer', 'S1', 'Laki-laki', 'Full-time', 20000000.00, 'Jakarta', 'Desain dan pemeliharaan mesin.', '', '2024-03-23'),
(88, 2, 5, 'Marketing Manager', 'S2', 'Semua', 'Full-time', 23000000.00, 'Surabaya', 'Strategi pemasaran dan branding.', '', '2024-03-22'),
(89, 3, 12, 'Customer Service Representative', 'SMA', 'Semua', 'Part-time', 10000000.00, 'Bandung', 'Melayani pelanggan dengan baik.', '', '2024-03-21'),
(90, 1, 7, 'Executive Chef', 'S1', 'Semua', 'Full-time', 18000000.00, 'Jakarta', 'Berpengalaman dalam manajemen dapur.', '', '2024-03-20'),
(91, 2, 3, 'Mathematics Teacher', 'S1', 'Semua', 'Full-time', 13000000.00, 'Surabaya', 'Menguasai kurikulum matematika.', '', '2024-03-19'),
(92, 3, 10, 'Data Analyst', 'S1', 'Semua', 'Part-time', 8000000.00, 'Bandung', 'Analisis data menggunakan SQL dan Python.', '', '2024-03-18'),
(93, 1, 17, 'Web Developer', 'D3', 'Semua', 'Kontrak', 16000000.00, 'Jakarta', 'Pengalaman dalam pengembangan website.', '', '2024-03-17'),
(94, 2, 14, 'Pharmacist', 'S2', 'Semua', 'Full-time', 19000000.00, 'Surabaya', 'Menguasai farmakologi dan dispensing.', '', '2024-03-16'),
(95, 3, 6, 'Graphic Designer', 'D3', 'Semua', 'Full-time', 15000000.00, 'Bandung', 'Kreatif dalam desain grafis.', '', '2024-03-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `transaction_status` varchar(50) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `gross_amount` decimal(20,2) NOT NULL,
  `transaction_time` datetime NOT NULL,
  `fraud_status` varchar(50) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `industri` varchar(255) NOT NULL,
  `deskripsi_perusahaan` varchar(255) NOT NULL,
  `media_sosial` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `alamat_perusahaan` text DEFAULT NULL,
  `logo_perusahaan` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('menunggu','ditolak','diterima') DEFAULT 'menunggu',
  `tanggal_bergabung` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama_perusahaan`, `industri`, `deskripsi_perusahaan`, `media_sosial`, `website`, `alamat_perusahaan`, `logo_perusahaan`, `username`, `password`, `status`, `tanggal_bergabung`) VALUES
(1, 'PT. Ferrel Cyberprotect', 'Teknologi Informasi', 'Perusahaan A bergerak di bidang teknologi informasi.', '@perusahaana', 'http://www.perusahaana.com', 'Jl. Teknologi No. 1', '', 'userA', 'passwordA', 'diterima', '2000-01-30'),
(2, 'Sekolah Dasar Negeri 1 Dinda', 'Pendidikan', 'Sekolah Dasar Negeri 1 Dinda bergerak di bidang pendidikan.', '@sekolahan', 'http://www.perusahaanb.com', 'Jl. Pendidikan No. 2', '', 'userB', 'passwordB', 'diterima', '2024-06-17'),
(3, 'Apotek Savero anjai', 'Kesehatan', 'Apotek Savero anjai bergerak di bidang kesehatan.', '@perusahaanc', 'http://www.perusahaanc.com', 'Jl. Kesehatan No. 3', '', 'userC', 'passwordC', 'diterima', '2024-06-03'),
(5, 'TES PERUSAHAAN', 'farhangusti', '', '0123', '12348-', 'kadnaodnadad', 'uploads/perusahaan7.jpeg', 'anjayanjay', '123123', 'diterima', '2017-06-26'),
(6, 'SAFIK AHOK', 'perkodingan', 'Perusahaan ini adalah perusahaan terpusing di dunia.', 'safikcoding.github', 'www.safikcoding.com', 'jl kaliurang', 'uploads/perusahaan100.png', 'safikahok', '12345', 'diterima', '2024-06-02');

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
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_id` (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `kategori_pekerjaan`
--
ALTER TABLE `kategori_pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT untuk tabel `loker`
--
ALTER TABLE `loker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `loker`
--
ALTER TABLE `loker`
  ADD CONSTRAINT `FK_nama_kategori_loker` FOREIGN KEY (`kategori_pekerjaan_id`) REFERENCES `kategori_pekerjaan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_user_loker` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

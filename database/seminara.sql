-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2025 at 07:20 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seminara`
--

-- --------------------------------------------------------

--
-- Table structure for table `favorit`
--

CREATE TABLE `favorit` (
  `id_favorit` int(11) NOT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `id_seminar` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favorit`
--

INSERT INTO `favorit` (`id_favorit`, `id_pengguna`, `id_seminar`, `created_at`) VALUES
(4, 11, 8, '2025-06-18 10:27:54'),
(5, 11, 9, '2025-06-18 10:30:31'),
(7, 17, 9, '2025-06-21 12:14:55');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `foto` varchar(128) DEFAULT 'default.jpg',
  `no_telp` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `status` enum('Pekerja','Mahasiswa/Pelajar','Umum') DEFAULT NULL,
  `role` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama`, `email`, `foto`, `no_telp`, `password`, `tanggal_lahir`, `status`, `role`, `created_at`) VALUES
(1, 'Sim Jake', 'jake@gmail.com\r\n', 'default.jpg', '081234567891', 'jake123', '2023-12-05', 'Pekerja', 2, '2025-06-01 14:23:01'),
(2, 'Park Jay', 'jay@gmail.com', 'default.jpg', '081234454545', 'jay123', '2005-01-01', 'Umum', 2, '2025-06-02 07:38:56'),
(3, 'Sunwoo Kim', 'sunwoo@gmail.com', 'default.jpg', '08134564444', 'sunwoo123', NULL, '', 1, '2025-06-06 17:00:00'),
(4, 'kevin', 'kevin@gmail.com', 'default.jpg', NULL, 'd2e7a2105d0fb461fe6f2858cc33942f', NULL, NULL, 1, '2025-06-07 17:39:28'),
(9, 'icha', 'icha@gmail.com', 'default.jpg', NULL, '$2y$10$W1p9bvVH24O7BkKELIO3/eUC/.OwjkR38tDt8aNcDjt/wCwwckczO', NULL, NULL, 1, '2025-06-08 16:08:43'),
(10, 'Salmaa', 'salma@gmail.com', 'assets/img/profile/1750288554.jpg', NULL, '$2y$10$CSnZrq.OKG4tOSRb6o.rh.OQa5I/Ge7.jAXvrSOzQH0nlIAnN1BBa', NULL, NULL, 1, '2025-06-08 16:45:51'),
(11, 'Kim Taehyung', 'kim@gmail.com', 'assets/img/profile/1750254379.jpg', '081122334455', '$2y$10$WiAp7F1mUyMt3C/piebEteQIZ5m7Vy1t1krYaL1ZNU0PPdWpahcue', '1995-12-30', 'Mahasiswa/Pelajar', 2, '2025-06-10 14:03:04'),
(12, 'Alya Ridzky', 'alya@gmail.com', 'default.jpg', '0812345678971', '$2y$10$3Elpe06luPjHyKYTA0fK2u9jVljaqQwdfS7e6IK.JyA.L78mHaRqu', '2021-12-26', 'Mahasiswa/Pelajar', 2, '2025-06-18 00:45:14'),
(13, 'Sunitra Indah', 'indah@gmail.com', 'default.jpg', '088775668558', '$2y$10$K1NgFMoiptZzSJAqFk0F/.h0ixdOPazD6WuOq3dKtzPpNGo715YVK', '2003-06-10', 'Mahasiswa/Pelajar', 2, '2025-06-18 07:08:21'),
(14, 'Diaz', 'diaz@gmail.com', 'default.jpg', NULL, '$2y$10$X4Fu3k.yYrlphVr.kdwrnO2.KfNqhAHJm0P29YPj3RGgiywj083n.', NULL, NULL, 1, '2025-06-19 00:32:57'),
(15, 'Fatika ', 'fatika@gmail.com', 'default.jpg', '0812346464644', '$2y$10$utaTqgJ/v0nTNyumIH0wN.qSMt/xvuKe.UzTeeF8swNcHSNryq0TK', '2007-01-30', '', 2, '2025-06-19 00:38:19'),
(16, 'Dimas', 'dimas@gmail.com', 'default.jpg', NULL, '$2y$10$KdlF65U8iqxV/L2kxYCftOPvD5t1PMt9jD5WxDQMbx/5mUfDJSGyO', NULL, NULL, 1, '2025-06-19 01:27:47'),
(17, 'Eunwoo', 'eunwoo@gmail.com', 'assets/img/profile/1750297149.jpg', '0812345666666', '$2y$10$mkCAumlewfgl9lv/d9QJOeJ1LzwMGI/HQ1AaZc8A8pd/d5abMFB2m', '1997-02-11', 'Pekerja', 2, '2025-06-19 01:34:17');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id_review` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_seminar` int(11) NOT NULL,
  `komentar` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id_review`, `id_pengguna`, `id_seminar`, `komentar`, `rating`, `created_at`) VALUES
(1, 1, 4, 'Tampilan website seminar ini sangat profesional dan mudah dinavigasi. Saya bisa menemukan informasi seminar dengan cepat tanpa kebingungan.', 5, '2025-06-19 00:23:27'),
(2, 2, 6, 'Semua informasi terkait seminar—mulai dari topik, pembicara, hingga jadwal—tersaji dengan jelas. Webnya sangat user-friendly.', 5, '2025-06-19 00:24:22'),
(3, 12, 10, 'BAGUSSSS BANGETTT. NARASUMBERNYA BERKUALITAS SEMUAAA', 5, '2025-06-21 16:50:42');

-- --------------------------------------------------------

--
-- Table structure for table `seminar`
--

CREATE TABLE `seminar` (
  `id_seminar` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `kategori` enum('Finansial','Teknologi','Pendidikan','Komunikasi','Bisnis') NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `kuota` int(11) DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `narasumber` varchar(255) DEFAULT NULL,
  `benefit` text DEFAULT NULL,
  `tgl_mulai_daftar` date NOT NULL,
  `tgl_akhir_daftar` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seminar`
--

INSERT INTO `seminar` (`id_seminar`, `judul`, `deskripsi`, `kategori`, `tanggal`, `waktu`, `lokasi`, `kuota`, `harga`, `gambar`, `narasumber`, `benefit`, `tgl_mulai_daftar`, `tgl_akhir_daftar`, `created_at`) VALUES
(4, 'INOVASI APLIKASI MOBILE', 'mobile yuk', 'Teknologi', '2025-06-04', '10:00:00', 'Balai Kartini Jakarta', 50, '100000.00', '', 'satria Wulandana, Tono Prasetya', 'merch menarik', '2025-05-07', '2025-05-15', '2025-05-07 11:18:07'),
(5, 'Future tech', 'blajar ti', 'Teknologi', '2025-05-25', '13:00:00', 'unm jtw', 50, '50000.00', 'assets/img/upload/d930f55908bd770a77b8e5d59470cd2a.jpeg', 'Dr Kevin Santosa, Prof Daniel', 'sertif dan e wallet', '2025-05-07', '2025-05-14', '2025-05-07 11:22:50'),
(6, 'FINACE FEST', 'Temukan Strategi merdeka finansial sejak Muda', 'Finansial', '2025-06-03', '17:10:00', '', 20, '25000.00', 'assets/img/upload/6dfc3ae8c6c5b176263037706944ea03.png', 'Prilly & Reza ', 'Sertifikat, Snack, Merch', '2025-06-01', '2025-06-02', '2025-06-01 09:48:26'),
(7, 'SPEAK WITH IMPACT: Public Speaking & Interpersonal', 'Seminar ini memberikan ilmu bagaimana kita meningkatkan  Public Speaking & Interpersonal', 'Komunikasi', '2025-07-31', '16:00:00', 'Auditorium Universitas Indonesia', 150, '100000.00', 'assets/img/upload/c9fa76abe0a6a8f51ae047b08b1cf862.png', 'Najwa Shihab', 'Network, Snack', '2025-06-16', '2025-07-05', '2025-06-09 10:50:32'),
(8, 'TECT FUTURE: Perang Digital', 'Menangkal Ancaman Siber di Era IoT dan AI', 'Teknologi', '2025-08-20', '08:30:00', 'Sky Covertion Center, Jakarta Selatan', 50, '50000.00', 'assets/img/upload/3e368fbe78c8698885c21385de65e2fd.png', 'Rafael Dirgantara, Renaldy', 'Sertifikat, Free Lunch', '2025-06-30', '2025-07-12', '2025-06-09 11:00:36'),
(9, 'Dari Bicara ke berpengaruh', 'Transformasi Komunikasi Untuk Kesuksesan karir\r\n Banyak pengetahuan menarik yang akan di sampaikan', 'Komunikasi', '2025-06-23', '14:00:00', 'Jakarta Covention Center (JCC)', 200, '50000.00', 'assets/img/upload/8cd5789cb8648d2833e6097e00ca0536.png', 'Merry Riana, M.I.Kom', 'Network', '2025-06-16', '2025-06-21', '2025-06-09 11:05:09'),
(10, 'Business Insight 2025: Resilience Mode On', '\r\nSeminar ini akan membahas perkembangan dunia bisnis di tahun 2025, termasuk tren, tantangan global, hingga inovasi yang perlu diadopsi oleh para pelaku usaha agar tetap kompetitif. Dalam era digital yang semakin maju, dunia usaha menuntut kecepatan, adaptabilitas, serta strategi yang visioner.\r\nMelalui seminar ini, peserta akan mendapatkan wawasan langsung dari tokoh nasional yang telah lama berkecimpung di dunia bisnis dan pemerintahan, serta memiliki rekam jejak dalam memimpin transformasi besar di berbagai sektor strategis Indonesia.', 'Bisnis', '2025-06-20', '11:00:00', 'Jakarta Convention Center', 200, '100000.00', 'assets/img/upload/409170a24a9aa2939955dd774c7b8ca1.jpg', 'Erick Thohir', 'Lunch, Goodie Bag, Kipas Tangan', '2025-06-19', '2025-06-20', '2025-06-18 20:00:16');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` char(20) NOT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `id_seminar` int(11) DEFAULT NULL,
  `tanggal_transaksi` datetime DEFAULT current_timestamp(),
  `nom_bayar` decimal(10,2) NOT NULL,
  `status` enum('pending','berhasil','dibatalkan') DEFAULT 'pending',
  `kode_tiket` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pengguna`, `id_seminar`, `tanggal_transaksi`, `nom_bayar`, `status`, `kode_tiket`, `created_at`) VALUES
('QSM-20250618-0000001', 11, 8, '2025-06-18 11:10:17', '55000.00', 'berhasil', 'TEK-20250618-0001', '2025-06-18 04:10:10'),
('QSM-20250618-0000002', 12, 7, '2025-06-18 11:12:05', '5000.00', 'berhasil', 'KOM-20250618-0001', '2025-06-18 04:11:55'),
('QSM-20250618-0000003', 11, 9, '2025-06-18 16:53:11', '55000.00', 'berhasil', 'KOM-20250618-0002', '2025-06-18 09:52:52'),
('QSM-20250618-0000004', 11, 7, '2025-06-18 16:53:33', '105000.00', 'dibatalkan', NULL, '2025-06-18 09:53:33'),
('QSM-20250618-0000005', 12, 7, '2025-06-18 17:43:24', '105000.00', 'dibatalkan', NULL, '2025-06-18 10:43:24'),
('QSM-20250618-0000006', 12, 8, '2025-06-18 17:45:49', '55000.00', 'dibatalkan', NULL, '2025-06-18 10:45:49'),
('QSM-20250619-0000001', 12, 10, '2025-06-19 03:14:21', '105000.00', 'berhasil', 'BIS-20250619-0001', '2025-06-18 20:14:11'),
('QSM-20250619-0000002', 17, 10, '2025-06-19 03:37:27', '105000.00', 'berhasil', 'BIS-20250619-0002', '2025-06-18 20:36:45'),
('QSM-20250621-0000001', 17, 9, '2025-06-21 19:13:40', '55000.00', 'berhasil', 'KOM-20250621-0001', '2025-06-21 12:13:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favorit`
--
ALTER TABLE `favorit`
  ADD PRIMARY KEY (`id_favorit`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_seminar` (`id_seminar`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_seminar` (`id_seminar`);

--
-- Indexes for table `seminar`
--
ALTER TABLE `seminar`
  ADD PRIMARY KEY (`id_seminar`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_seminar` (`id_seminar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favorit`
--
ALTER TABLE `favorit`
  MODIFY `id_favorit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seminar`
--
ALTER TABLE `seminar`
  MODIFY `id_seminar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorit`
--
ALTER TABLE `favorit`
  ADD CONSTRAINT `favorit_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorit_ibfk_2` FOREIGN KEY (`id_seminar`) REFERENCES `seminar` (`id_seminar`) ON DELETE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`id_seminar`) REFERENCES `seminar` (`id_seminar`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_seminar`) REFERENCES `seminar` (`id_seminar`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

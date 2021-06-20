-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 20, 2021 at 12:02 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vaksin`
--

-- --------------------------------------------------------

--
-- Table structure for table `informasi_user`
--

CREATE TABLE `informasi_user` (
  `id_informasi` int(11) NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `nik` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_verifikasi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `informasi_user`
--

INSERT INTO `informasi_user` (`id_informasi`, `id_user`, `nik`, `nama`, `alamat`, `tgl_verifikasi`, `tgl_update`) VALUES
(6, 760429892, '12345678910', 'user', 'Jl. Setia Budi', '2021-06-20 11:45:57', '2021-06-20 11:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2021_06_04_045933_create_status', 1),
(3, '2021_06_05_072119_create_user_information', 1),
(4, '2021_06_05_072249_create_rumah_sakit', 1),
(5, '2021_06_05_132908_create_jenis_vaksin', 1),
(6, '2021_06_05_141241_create_pendaftaran_vaksin', 1),
(7, '2021_06_05_143909_create_pembayaran', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(10) UNSIGNED NOT NULL,
  `id_pendaftaran` int(10) UNSIGNED NOT NULL,
  `tgl_pembayaran` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_harga` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pendaftaran`, `tgl_pembayaran`, `total_harga`) VALUES
(878610776, 658548810, '2021-06-20 11:54:53', '25000');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_rs` int(10) UNSIGNED NOT NULL,
  `id_vaksin` int(10) UNSIGNED NOT NULL,
  `tanggal_vaksinasi` date DEFAULT NULL,
  `jam_vaksinasi` time DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `tgl_pendaftaran` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_status` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `id_user`, `id_rs`, `id_vaksin`, `tanggal_vaksinasi`, `jam_vaksinasi`, `keterangan`, `tgl_pendaftaran`, `id_status`) VALUES
(658548810, 760429892, 1, 3, '2021-06-20', '19:52:00', NULL, '2021-06-20 11:54:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rs`
--

CREATE TABLE `rs` (
  `id_rs` int(10) UNSIGNED NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_rs` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jadwal` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `no_telephone` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rs`
--

INSERT INTO `rs` (`id_rs`, `img`, `nama_rs`, `alamat`, `jadwal`, `keterangan`, `no_telephone`) VALUES
(1, '1623570322-RS Cempaka Putih-jpg', 'RS Cempaka Putih', 'Jl. Setia Budi No 27 Jakarta Selatan', 'Senin - Jumat 08:00 - 16:00', NULL, '0856565657'),
(3, '1623837401-RS Bunda Margonda.jpg', 'RS Bunda Margonda', 'Jl. Margonda Raya No.28, Pondok Cina, Kecamatan Beji, Kota Depok, Jawa Barat 16424', '24 hours', NULL, '1500799');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` int(10) UNSIGNED NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `status`) VALUES
(1, 'Vaksinasi pertama'),
(2, 'Vaksinasi kedua'),
(3, 'Menyelesaikan pendaftaran dan pembayaran');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `username` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL DEFAULT '3',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `nama`, `password`, `level`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'admin', 'admin@example.com', 'admin', '$2y$10$rlF562xotqJoVkqHG8zr2e8VAqg8OK2shAl/iVaagrwvLQiq1bvMm', 1, '2021-06-13 00:42:08', '2021-06-13 00:42:08', NULL),
(721398505, 'admin2', 'admin2@example.com', 'admin2', '$2y$10$AllbpBU945vvSq5rDJmUruCnh9ERV6ScBxA2R9m6i.cPDLxVx4rf2', 2, '2021-06-14 02:59:14', '2021-06-17 05:33:05', NULL),
(760429892, 'user', 'user@example.com', 'user', '$2y$10$ahyyt1Bb1/m3wA6rFl19bOiyBWgTHRHDzFrTwJoj0MPp5rH73UEsW', 3, '2021-06-17 05:55:09', '2021-06-17 05:55:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vaksin`
--

CREATE TABLE `vaksin` (
  `id_vaksin` int(10) UNSIGNED NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_vaksin` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `harga` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vaksin`
--

INSERT INTO `vaksin` (`id_vaksin`, `img`, `nama_vaksin`, `deskripsi`, `harga`) VALUES
(1, '1623757517-Sinovac.jpg', 'Sinovac', '<li>Nyeri, kemerahan, atau bengkak di tempat bekas suntikan</li><li>Demam badan terasa lelah</li><li>Nyeri otot sakit kepala mual muntah</li>', '20000'),
(2, '1623757686-Pfizer.jpg', 'Pfizer', '<li>Nyeri, kemerahan, atau bengkak di tempat bekas suntikan.</li><li>Sakit kepala.</li><li>Nyeri otot atau nyeri sendi.</li><li>Menggigil.</li><li>Demam ringan.</li><li>Mual atau merasa tidak enak badan</li><li>Bengkak di kelenjar getah bening.</li>', '27000'),
(3, '1623758464-AstraZeneca.jpg', 'AstraZeneca', '<li>Nyeri, kemerahan, atau bengkak di tempat bekas suntikan</li><li>Demam badan terasa lelah</li><li>Nyeri otot sakit kepala mual muntah</li>', '25000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `informasi_user`
--
ALTER TABLE `informasi_user`
  ADD PRIMARY KEY (`id_informasi`),
  ADD KEY `vaksin_informasi_user_id_user_foreign` (`id_user`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `vaksin_pembayaran_id_pendaftaran_foreign` (`id_pendaftaran`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`),
  ADD KEY `vaksin_pendaftaran_id_user_foreign` (`id_user`),
  ADD KEY `vaksin_pendaftaran_id_rs_foreign` (`id_rs`),
  ADD KEY `vaksin_pendaftaran_id_vaksin_foreign` (`id_vaksin`),
  ADD KEY `vaksin_pendaftaran_id_status_foreign` (`id_status`);

--
-- Indexes for table `rs`
--
ALTER TABLE `rs`
  ADD PRIMARY KEY (`id_rs`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `vaksin_user_email_unique` (`email`);

--
-- Indexes for table `vaksin`
--
ALTER TABLE `vaksin`
  ADD PRIMARY KEY (`id_vaksin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `informasi_user`
--
ALTER TABLE `informasi_user`
  MODIFY `id_informasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=658548811;

--
-- AUTO_INCREMENT for table `rs`
--
ALTER TABLE `rs`
  MODIFY `id_rs` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vaksin`
--
ALTER TABLE `vaksin`
  MODIFY `id_vaksin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `informasi_user`
--
ALTER TABLE `informasi_user`
  ADD CONSTRAINT `vaksin_informasi_user_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `vaksin_pembayaran_id_pendaftaran_foreign` FOREIGN KEY (`id_pendaftaran`) REFERENCES `pendaftaran` (`id_pendaftaran`);

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `vaksin_pendaftaran_id_rs_foreign` FOREIGN KEY (`id_rs`) REFERENCES `rs` (`id_rs`),
  ADD CONSTRAINT `vaksin_pendaftaran_id_status_foreign` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`),
  ADD CONSTRAINT `vaksin_pendaftaran_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `vaksin_pendaftaran_id_vaksin_foreign` FOREIGN KEY (`id_vaksin`) REFERENCES `vaksin` (`id_vaksin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 22, 2021 at 07:17 AM
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
-- Indexes for table `vaksin`
--
ALTER TABLE `vaksin`
  ADD PRIMARY KEY (`id_vaksin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vaksin`
--
ALTER TABLE `vaksin`
  MODIFY `id_vaksin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

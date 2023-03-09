-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 28, 2022 at 11:41 PM
-- Server version: 10.5.12-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id17630053_xpplg1app`
--

-- --------------------------------------------------------

--
-- Table structure for table `uangkas`
--

CREATE TABLE `uangkas` (
  `id_pembayaran` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `tanggal_pembayaran` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `absen_siswa` int(100) NOT NULL,
  `jumlah_pembayaran` int(100) NOT NULL,
  `minggu1_pembayaran` tinyint(1) DEFAULT NULL,
  `minggu2_pembayaran` tinyint(1) DEFAULT NULL,
  `minggu3_pembayaran` tinyint(1) DEFAULT NULL,
  `minggu4_pembayaran` tinyint(1) DEFAULT NULL,
  `keterangan_pembayaran` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uangkas`
--

INSERT INTO `uangkas` (`id_pembayaran`, `id_siswa`, `tanggal_pembayaran`, `absen_siswa`, `jumlah_pembayaran`, `minggu1_pembayaran`, `minggu2_pembayaran`, `minggu3_pembayaran`, `minggu4_pembayaran`, `keterangan_pembayaran`, `created_at`, `updated_at`) VALUES
(1, 1, 'Jumat, 14 Januari 2022', 1, 10000, 1, 1, NULL, NULL, '', '2022-01-16 11:35:28', ''),
(2, 2, 'Jumat, 14 Januari 2022', 2, 10000, 1, 1, NULL, NULL, '', '2022-01-16 11:35:28', ''),
(3, 3, 'Jumat, 14 Januari 2022', 3, 5000, 1, NULL, NULL, NULL, '', '2022-01-16 11:35:28', ''),
(4, 4, 'Jumat, 14 Januari 2022', 4, 5000, 1, NULL, NULL, NULL, '', '2022-01-16 11:35:28', ''),
(5, 6, 'Jumat, 14 Januari 2022', 6, 5000, 1, NULL, NULL, NULL, '', '2022-01-16 11:35:28', ''),
(6, 7, 'Jumat, 14 Januari 2022', 7, 10000, 1, 1, NULL, NULL, '', '2022-01-16 11:35:28', ''),
(7, 8, 'Jumat, 14 Januari 2022', 8, 5000, 1, NULL, NULL, NULL, '', '2022-01-16 22:16:44', ''),
(8, 11, 'Jumat, 14 Januari 2022', 11, 5000, 1, NULL, NULL, NULL, '', '2022-01-16 22:17:15', ''),
(9, 12, 'Jumat, 14 Januari 2022', 12, 10000, 1, 1, NULL, NULL, '', '2022-01-16 22:18:02', ''),
(10, 13, 'Jumat, 14 Januari 2022', 13, 10000, 1, 1, NULL, NULL, '', '2022-01-16 22:18:25', ''),
(11, 14, 'Jumat, 14 Januari 2022', 14, 5000, 1, NULL, NULL, NULL, '', '2022-01-16 22:19:43', ''),
(12, 16, 'Jumat, 14 Januari 2022', 16, 10000, 1, 1, NULL, NULL, '', '2022-01-16 22:25:21', ''),
(13, 17, 'Jumat, 14 Januari 2022', 17, 10000, 1, 1, NULL, NULL, '', '2022-01-16 22:25:55', ''),
(14, 18, 'Jumat, 14 Januari 2022', 18, 10000, 1, 1, NULL, NULL, '', '2022-01-16 22:26:21', ''),
(15, 20, 'Jumat, 14 Januari 2022', 20, 5000, 1, NULL, NULL, NULL, '', '2022-01-16 22:32:11', ''),
(16, 21, 'Jumat, 14 Januari 2022', 21, 5000, 1, NULL, NULL, NULL, '', '2022-01-16 22:33:43', ''),
(17, 22, 'Jumat, 14 Januari 2022', 22, 5000, 1, NULL, NULL, NULL, '', '2022-01-16 22:34:19', ''),
(18, 23, 'Jumat, 14 Januari 2022', 23, 5000, 1, NULL, NULL, NULL, '', '2022-01-16 22:34:42', ''),
(19, 24, 'Jumat, 14 Januari 2022', 24, 5000, 1, NULL, NULL, NULL, '', '2022-01-16 22:35:09', ''),
(20, 25, 'Jumat, 14 Januari 2022', 25, 10000, 1, 1, NULL, NULL, '', '2022-01-16 22:35:47', ''),
(21, 19, 'Jumat, 14 Januari 2022', 19, 5000, 1, NULL, NULL, NULL, '', '2022-01-16 22:36:39', ''),
(22, 26, 'Jumat, 14 Januari 2022', 26, 10000, 1, 1, NULL, NULL, '', '2022-01-16 22:37:33', ''),
(23, 27, 'Jumat, 14 Januari 2022', 27, 10000, 1, 1, NULL, NULL, '-', '2022-01-16 22:37:56', ''),
(24, 28, 'Jumat, 14 Januari 2022', 28, 5000, 1, NULL, NULL, NULL, '', '2022-01-17 02:46:32', ''),
(25, 29, 'Jumat, 14 Januari 2022', 29, 5000, 1, NULL, NULL, NULL, '', '2022-01-17 02:47:07', ''),
(26, 30, 'Jumat, 14 Januari 2022', 30, 5000, 1, NULL, NULL, NULL, '', '2022-01-17 02:47:24', ''),
(27, 31, 'Jumat, 14 Januari 2022', 31, 5000, 1, NULL, NULL, NULL, '', '2022-01-17 02:47:38', ''),
(28, 33, 'Jumat, 14 Januari 2022', 33, 20000, 1, 1, 1, 1, '<p>Januari Lunas</p>\r\n', '2022-01-17 02:48:54', ''),
(29, 34, 'Jumat, 14 Januari 2022', 34, 10000, 1, 1, NULL, NULL, '-', '2022-01-17 02:49:25', ''),
(35, 35, 'Jumat, 14 Januari 2022', 35, 0, NULL, NULL, NULL, NULL, '-', '2022-01-17 03:18:26', ''),
(36, 15, 'Jumat, 14 Januari 2022', 15, 5000, 1, NULL, NULL, NULL, '-', '2022-01-17 03:43:00', ''),
(37, 9, 'Senin, 24 Januari 2022', 9, 20000, 1, 1, 1, 1, '<p>Januari Lunas</p>\r\n', '2022-01-24 14:20:35', ''),
(38, 10, 'Senin, 24 Januari 2022', 10, 20000, 1, 1, 1, 1, '<p>Januari Lunas</p>\r\n', '2022-01-24 14:22:28', ''),
(39, 29, 'Senin, 24 Januari 2022', 29, 15000, NULL, 1, 1, 1, '<p>Januari Lunas</p>\r\n', '2022-01-24 14:24:07', ''),
(40, 12, 'Selasa, 25 Januari 2022', 12, 5000, NULL, NULL, 1, NULL, '-', '2022-01-25 11:58:08', ''),
(41, 22, 'Selasa, 25 Januari 2022', 22, 10000, NULL, 1, 1, NULL, '<p>-</p>\r\n', '2022-01-25 12:07:01', ''),
(42, 6, 'Rabu, 26 Januari 2022', 6, 5000, NULL, 1, NULL, NULL, '-', '2022-01-26 14:57:45', ''),
(43, 32, 'Rabu, 26 Januari 2022', 32, 10000, 1, 1, NULL, NULL, '-', '2022-01-26 14:58:36', ''),
(45, 2, 'Jumat, 28 Januari 2022', 2, 6000, NULL, NULL, 1, 1, '<p>Minggu ke 4 januari&nbsp;Kurang 4 ribu</p>\r\n', '2022-01-28 04:15:42', ''),
(46, 22, 'Jumat, 28 Januari 2022', 22, 5000, NULL, NULL, NULL, 1, '<p>Januari Lunas</p>\r\n', '2022-01-28 04:18:26', ''),
(47, 21, 'Jumat, 28 Januari 2022', 21, 5000, NULL, 1, NULL, NULL, '-', '2022-01-28 04:22:01', ''),
(49, 16, 'Jumat, 28 Januari 2022', 16, 10000, NULL, NULL, 1, 1, '<p>Januari Lunas</p>\r\n', '2022-01-28 04:23:30', ''),
(51, 14, 'Jumat, 28 Januari 2022', 14, 10000, NULL, 1, 1, NULL, '-', '2022-01-28 04:26:04', ''),
(53, 24, 'Jumat, 28 Januari 2022', 24, 10000, NULL, 1, 1, NULL, '-', '2022-01-28 04:29:12', ''),
(54, 27, 'Jumat, 28 Januari 2022', 27, 10000, NULL, NULL, 1, 1, '<p>-Januari Lunas</p>\r\n', '2022-01-28 04:30:49', ''),
(55, 28, 'Jumat, 28 Januari 2022', 28, 5000, NULL, 1, NULL, NULL, '-', '2022-01-28 04:32:00', ''),
(56, 1, 'Jumat, 28 Januari 2022', 1, 10000, NULL, NULL, 1, 1, '<p>Januari Lunas</p>\r\n', '2022-01-28 04:41:44', ''),
(57, 13, 'Jumat, 28 Januari 2022', 13, 10000, NULL, NULL, 1, 1, '<p>Januari Lunas</p>\r\n', '2022-01-28 05:07:55', ''),
(58, 35, 'Jumat, 28 Januari 2022', 35, 10000, 1, 1, NULL, NULL, '-', '2022-01-28 05:08:32', ''),
(60, 34, 'Jumat, 28 Januari 2022', 34, 10000, NULL, NULL, 1, 1, '<p>Januari Lunas</p>\r\n', '2022-01-16 11:35:28', ''),
(61, 34, 'Jumat, 04 Februari 2022', 34, 20000, 1, 1, 1, 1, '<p>Februari Lunas</p>\r\n', '2022-02-04 12:18:55', '2022-02-11 18:47:23'),
(62, 33, 'Jumat, 04 Februari 2022', 33, 10000, 1, 1, NULL, NULL, '-', '2022-02-04 19:07:25', '2022-02-04 19:07:25'),
(63, 29, 'Jumat, 04 Februari 2022', 29, 5000, 1, NULL, NULL, NULL, '-', '2022-02-04 19:08:17', '2022-02-04 19:08:17'),
(64, 8, 'Kamis,03 Februari 2022', 8, 5000, 1, NULL, NULL, NULL, '<p>-</p>\r\n', '2022-02-04 19:09:22', '2022-02-04 19:09:48'),
(65, 12, 'Kamis, 03 Februari 2022', 12, 5000, 1, NULL, NULL, NULL, '-', '2022-02-04 19:12:48', '2022-02-04 19:12:48'),
(66, 1, 'Jumat, 04 Februari 2022', 1, 5000, 1, NULL, NULL, NULL, '-', '2022-02-04 19:13:14', '2022-02-04 19:13:14'),
(67, 27, 'Kamis, 03 Februari 2022', 27, 20000, 1, 1, 1, 1, '<p>Februari Lunas</p>\r\n', '2022-02-04 19:14:23', '2022-02-04 19:14:23'),
(68, 31, 'Kamis, 03 Februari 2022', 31, 20000, 1, 1, 1, 1, '<p>Februari Lunas</p>\r\n', '2022-02-04 19:15:32', '2022-02-11 18:46:20'),
(69, 26, 'Kamis, 03 Februari 2022', 26, 15000, 1, 1, 1, NULL, '-', '2022-02-04 19:21:24', '2022-02-04 19:21:24'),
(70, 22, 'Kamis, 03 Februari 2022', 22, 20000, 1, 1, 1, 1, '<p>Februari Lunas</p>\r\n', '2022-02-04 19:22:34', '2022-02-04 19:22:34'),
(71, 17, 'Kamis, 03 Februari 2022', 17, 10000, 1, 1, NULL, NULL, '-', '2022-02-04 19:25:00', '2022-02-04 19:25:00'),
(72, 19, 'Kamis, 03 Februari 2022', 19, 20000, 1, NULL, NULL, NULL, '<p>15.000 untuk bulan Januari</p>\r\n', '2022-02-04 19:27:22', '2022-02-04 19:27:22'),
(73, 20, 'Kamis, 04 Februari 2022', 20, 5000, 1, NULL, NULL, NULL, '<p>-</p>\r\n', '2022-02-07 08:03:00', '2022-02-07 08:04:15'),
(74, 33, 'Senin, 07 Februari 2022', 33, 10000, NULL, NULL, 1, 1, '<p>Februari Lunas</p>\r\n', '2022-02-08 07:01:47', '2022-02-11 18:47:42'),
(75, 1, 'Jumat, 11 Februari 2022', 1, 5000, NULL, 1, NULL, NULL, '-', '2022-02-11 14:07:52', '2022-02-11 14:07:52'),
(76, 9, 'Jumat, 11 Februari 2022', 9, 20000, 1, 1, 1, 1, '<p>Februari Lunas</p>\r\n', '2022-02-11 14:08:28', '2022-02-11 14:08:28'),
(77, 13, 'Jumat, 11 Februari 2022', 13, 20000, 1, 1, 1, 1, '<p>Februari Lunas</p>\r\n', '2022-02-11 14:10:21', '2022-02-11 14:10:21'),
(78, 32, 'Jumat, 11 Februari 2022', 32, 10000, 1, 1, NULL, NULL, '-', '2022-02-11 14:11:05', '2022-02-11 14:11:05'),
(79, 2, 'Jumat, 11 Februari 2022', 2, 10000, 1, 1, NULL, NULL, '-', '2022-02-11 14:12:15', '2022-02-11 14:12:15'),
(80, 21, 'Jumat, 11 Februari 2022', 21, 20000, 1, 1, 1, 1, '<p>Februari Lunas</p>\r\n', '2022-02-11 14:21:45', '2022-02-11 18:48:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `uangkas`
--
ALTER TABLE `uangkas`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `uangkas`
--
ALTER TABLE `uangkas`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

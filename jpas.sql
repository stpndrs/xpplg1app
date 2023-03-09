-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Des 2021 pada 13.53
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xpplg1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jpas`
--

CREATE TABLE `jpas` (
  `id_jpas` int(11) NOT NULL,
  `hari_jpas` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_jpas` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mapel1_jpas` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `jam1_jpas` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mapel2_jpas` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `jam2_jpas` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mapel3_jpas` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `jam3_jpas` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `jpas`
--

INSERT INTO `jpas` (`id_jpas`, `hari_jpas`, `tanggal_jpas`, `mapel1_jpas`, `jam1_jpas`, `mapel2_jpas`, `jam2_jpas`, `mapel3_jpas`, `jam3_jpas`, `created_at`, `updated_at`) VALUES
(1, 'Jumat', '3 Desember 2021', 'Pendidikan Agama dan Budi Pekerti', '07.30-08.30', 'Pend. Pancasila dan Kewarganegaraan', '08.30-09.30', 'Sejarah', '09.30-10.30', '', ''),
(2, 'Sabtu', '4 Desember 2021', 'Matematika', '07.30-08.30', 'Seni', '08.30-09.30', '', '', '2021-12-03 06:52:30', '2021-12-03 06:52:30');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jpas`
--
ALTER TABLE `jpas`
  ADD PRIMARY KEY (`id_jpas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jpas`
--
ALTER TABLE `jpas`
  MODIFY `id_jpas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

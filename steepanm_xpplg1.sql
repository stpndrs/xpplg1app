-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 15 Nov 2021 pada 07.58
-- Versi server: 10.2.40-MariaDB-cll-lve
-- Versi PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `steepanm_xpplg1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `password_admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `password_admin`) VALUES
(1, 'Stevan', 'andreas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `title_galeri` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gambar_galeri` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `desc_galeri` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `title_galeri`, `gambar_galeri`, `desc_galeri`, `created_at`, `updated_at`) VALUES
(1, 'tes1', '1636453460_1c2f951343396a215ae6.jpg', '<p>tes1</p>', '2021-11-09 04:24:21', '2021-11-09 04:24:21'),
(2, 'tes2', '1636453537_381a5778d15a7e3e10bf.jpg', '<p><em><strong>tes2</strong></em></p>', '2021-11-09 04:25:01', '2021-11-09 04:25:37'),
(3, 'tes3', '1636453519_4c919eee7839d44261bb.jpg', '<p><em><strong>tes3</strong></em></p>', '2021-11-09 04:25:19', '2021-11-09 04:25:19'),
(4, 'tes4', '1636454061_4a3205009a0c718b420c.jpg', '<p>tes4</p>', '2021-11-09 04:34:21', '2021-11-09 04:34:21'),
(5, 'tes5', '1636464969_1eb0622f010571e79b43.jpg', '<p>tes5</p>', '2021-11-09 07:29:28', '2021-11-09 07:36:09'),
(11, 'tes6', '1636843377_6580e06e40226015589b.jpg', '<p>tes6</p>', '2021-11-13 16:42:57', '2021-11-13 16:42:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `home`
--

CREATE TABLE `home` (
  `id_home` int(11) NOT NULL,
  `carousel_home` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `pengantar_home` varchar(600) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data untuk tabel `home`
--

INSERT INTO `home` (`id_home`, `carousel_home`, `pengantar_home`) VALUES
(1, 'foto1.jpg', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odit tempora quibusdam dignissimos quasi quas maiores neque deserunt accusantium quam adipisci praesentium quod amet mollitia soluta harum officia, autem assumenda eius reprehenderit tenetur sequi vero possimus rerum hic? Quam laboriosam hic ad veritatis, neque cumque temporibus animi deserunt illo sit pariatur voluptate soluta inventore, ex unde provident quasi tenetur saepe! Quidem, a. Quia obcaecati tenetur pariatur voluptatum, tempora commodi delectus dolor, aperiam, nesciunt minima doloribus dolorem repellat consequuntur quibusdam.'),
(2, 'foto2.jpg', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `infosklh`
--

CREATE TABLE `infosklh` (
  `id_info` int(11) NOT NULL,
  `tanggal_info` varchar(100) NOT NULL,
  `title_info` varchar(100) NOT NULL,
  `isi_info` varchar(5000) NOT NULL,
  `dokumen_info` varchar(100) NOT NULL,
  `link_info` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `infosklh`
--

INSERT INTO `infosklh` (`id_info`, `tanggal_info`, `title_info`, `isi_info`, `dokumen_info`, `link_info`, `created_at`, `updated_at`) VALUES
(14, '', 'Jadwal Baju Baru', '<p>Jadwal baju baru SMKN 7 Samarinda</p><ul><li><strong>Senin : Putih abu-abu</strong></li><li><strong>Selasa : Icon hitam cream</strong></li><li><strong>Rabu : Olahraga</strong></li><li><strong>Kamis : Batik</strong></li><li><strong>Jumat : Pramuka</strong></li></ul><p>Nb : <em><strong>Seragam bisa dipakai pada pertemuan Minggu Sinkronus (Online/Gmeet)</strong></em></p>', '', '', '2021-11-15 07:40:55', '2021-11-15 07:40:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jgmeet`
--

CREATE TABLE `jgmeet` (
  `id_jgmeet` int(11) NOT NULL,
  `hari_jgmeet` varchar(100) NOT NULL,
  `seragam_jgmeet` varchar(100) NOT NULL,
  `mapel1_jgmeet` varchar(100) NOT NULL,
  `nmguru1_jgmeet` varchar(100) NOT NULL,
  `mapel2_jgmeet` varchar(100) NOT NULL,
  `nmguru2_jgmeet` varchar(100) NOT NULL,
  `mapel3_jgmeet` varchar(100) NOT NULL,
  `nmguru3_jgmeet` varchar(100) NOT NULL,
  `mapel4_jgmeet` varchar(100) NOT NULL,
  `nmguru4_jgmeet` varchar(100) NOT NULL,
  `link_gmeet` varchar(200) NOT NULL,
  `created_at` varchar(100) NOT NULL,
  `updated_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jgmeet`
--

INSERT INTO `jgmeet` (`id_jgmeet`, `hari_jgmeet`, `seragam_jgmeet`, `mapel1_jgmeet`, `nmguru1_jgmeet`, `mapel2_jgmeet`, `nmguru2_jgmeet`, `mapel3_jgmeet`, `nmguru3_jgmeet`, `mapel4_jgmeet`, `nmguru4_jgmeet`, `link_gmeet`, `created_at`, `updated_at`) VALUES
(1, 'Senin', 'Putih Abu-abu', 'Peng. Wisata Budaya, Galeri, dan Museum', 'Yekti Bambang', 'IPAS Tema Fisika', 'Sunarso', 'Sejarah', 'Yekti Bambang P', 'Seni', 'Siti Halimah', 'https://meet.google.com/yye-oxzb-fne?authuser=1&hs=179', '0', '0'),
(2, 'Selasa', 'Icon Hitam Cream', 'Bahasa Inggris', 'Winarti', 'Pend. Agama Islam BP', 'Ummi Z', 'Proses Bisnis dan Wawasan Industeri', 'Darnilawati', 'Dasar Desain PPLG ', 'Ferdiana TU', 'https://meet.google.com/yye-oxzb-fne?authuser=1&hs=179', '0', '2021-11-14 19:17:42'),
(3, 'Rabu', 'Olahraga', 'Pemrograman Dasar', 'Ferdiana TU', 'Bahasa Indonesia', 'Agus Sriyani', 'Matematika', 'Deti A Yahya', '', '', 'https://meet.google.com/yye-oxzb-fne?authuser=1&hs=179', '0', '2021-11-14 19:19:10'),
(4, 'Kamis', 'Batik ', 'Profil Pelajar Pancasila Tema Wajib', 'Sigit Triyanto', 'Profil Pelajar Pancasila Tema Pilihan', 'Misbah', 'IPAS Tema Alam Sosial', 'Luthfi Y Paluhulawa', '', '', 'https://meet.google.com/yye-oxzb-fne?authuser=1&hs=179', '0', '2021-11-14 19:19:52'),
(5, 'Jumat', 'Pramuka', 'INFORMATIKA', 'Nina Karina', 'PJOK', 'Mia Nurmasari', 'PPKn', 'Fisher Paulina Dhiu', '', '', 'https://meet.google.com/yye-oxzb-fne?authuser=1&hs=179', '0', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jtugas`
--

CREATE TABLE `jtugas` (
  `id_jtugas` int(11) NOT NULL,
  `hari_jtugas` varchar(100) NOT NULL,
  `mapel1_jtugas` varchar(100) NOT NULL,
  `mapel2_jtugas` varchar(100) NOT NULL,
  `mapel3_jtugas` varchar(100) NOT NULL,
  `mapel4_jtugas` varchar(100) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jtugas`
--

INSERT INTO `jtugas` (`id_jtugas`, `hari_jtugas`, `mapel1_jtugas`, `mapel2_jtugas`, `mapel3_jtugas`, `mapel4_jtugas`, `created_at`, `updated_at`) VALUES
(1, 'Senin', 'Pendidikan Agama', 'PPKn', 'Profil Pelajar Pancasila Tema Pilihan', 'Bahasa Indonesia', '', ''),
(2, 'Selasa', 'Sejarah', 'Seni', 'Muatan lokal ', 'Bahasa inggris', '', ''),
(3, 'Rabu', 'Matematika', 'IPAS Tema Fisika', 'IPAS Tema Alam dan Sosial', '', '', ''),
(4, 'Kamis ', 'INFORMATIKA', 'Proses Bisnis dan Wawasan Industri', 'Profil Pelajar Pancasila Tema Wajib', '', '', '2021-11-08 06:24:45'),
(5, 'Jumat', 'PJOK', 'Dasar Desain PPLG', 'Pemrograman Dasar', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `layout`
--

CREATE TABLE `layout` (
  `id_layout` int(11) NOT NULL,
  `icon_layout` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `title_layout` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `col1_footer` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `col2_footer` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `col3_footer` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `col4_footer` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `layout`
--

INSERT INTO `layout` (`id_layout`, `icon_layout`, `title_layout`, `col1_footer`, `col2_footer`, `col3_footer`, `col4_footer`, `created_at`, `updated_at`) VALUES
(1, 'logo.jpeg', 'Intelligence Class', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `foto_siswa` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `nama_siswa` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `absen_siswa` int(200) NOT NULL,
  `desk_siswa` varchar(300) CHARACTER SET utf8mb4 NOT NULL,
  `ins_siswa` varchar(100) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `foto_siswa`, `nama_siswa`, `absen_siswa`, `desk_siswa`, `ins_siswa`) VALUES
(2, 'haikal cut.jpg', 'Haikal Jailani Al Farizzy', 12, 'Ketua Kelas X PPLG 1', 'hkall.27'),
(3, 'Aldi cut.jpg', 'Ahmad Ribby Aldi', 2, 'Wakil Ketua Kelas X PPLG 1', 'aldiahmdr'),
(4, 'ara cut 1.jpg', 'Azzahra Zaina Kharisma', 6, 'Sekertaris X PPLG 1', 'ara.ya0813'),
(5, 'M Farros cut.jpg', 'Muhammad Farros Anand', 24, 'Koordinator Kelas X PPLG 1', '_faros26'),
(6, 'Nabila cut.jpg', 'Nabila Putri', 28, 'Koordinator Kelas X PPLG 1', 'novnbil'),
(7, 'M. Asy.jpeg', 'Muhammad Asy Syuhada', 21, '', 'masysyuhada'),
(8, 'M. Gatan.jpeg', 'Muhammad Gatan Nazwari Azis', 17, '', 'gtannzwri'),
(9, 'Sherly W (2).jpeg', 'Sherly Wulandari', 33, '', 'sherlywlandri'),
(10, 'S. Andreas.jpg', 'Stevan Andreas', 34, '', 'stpndrs20'),
(11, 'William cut.jpg', 'William', 35, '', 'wiliii24_'),
(12, 'Intan cut.jpg', 'Intan Putry Naydi', 15, '', 'intanptrynydi'),
(13, 'oca cut 2.jpg', 'Marsha Aulia Fakhriza', 18, '', 'marshaufaa'),
(14, 'WhatsApp Image 2021-09-23 at 11.10.02.jpeg', 'Nayla Octa Syawalia', 30, '', 'naycyaw_'),
(15, 'raihan cut.jpg', 'Muhammad Raihan Pribadi', 27, '', 'rerey_hanz'),
(16, 'Ihsan cut.jpg', 'Ihsan Razhak Ramadhan', 13, 'Paling Ganteng di X PPLG 1 🔥', 'razak.ihsan'),
(17, 'wawan cut.jpg', 'Kurniawan Budi Saputra', 16, '', 'kurniawandulu_'),
(18, 'fandi cut.jpg', 'Fandi Nurrezky', 8, '', 'fandirizz._13'),
(19, 'download.png', 'Abubakar Adni', 1, '', ''),
(20, 'download.png', 'Andra Saputra', 3, '', ''),
(21, 'download.png', 'Andreo Obelix Segah', 4, '', ''),
(22, 'download.png', 'Aria Sutan Heraldi', 5, '', ''),
(23, 'download.png', 'Dwi Putra Setiawan', 7, '', ''),
(24, 'download.png', 'Fatur Rachman Huda', 9, '', ''),
(25, 'download.png', 'Gian Al Haritz Ueldy Secondri', 10, '', ''),
(26, 'download.png', 'Gilang Firdaus Rahmatullah', 11, '', ''),
(27, 'download.png', 'Imam Ahmad Dzaki', 14, '', ''),
(28, 'download.png', 'Muhammad Arya Setya Budi', 20, '', ''),
(29, 'download.png', 'Muhammad Avesina Elfarobi Annabi', 22, '', ''),
(30, 'download.png', 'Muhammad Bilal Rizwan', 23, '', ''),
(31, 'download.png', 'Muhammad Fauzan Mirzavickya', 25, '', ''),
(32, 'download.png', 'Muhammad Qholdi Rheody', 26, '', ''),
(33, 'download.png', 'Naura Syifa Novianti', 29, '', ''),
(34, 'download.png', 'Ronal Willy Saputra', 31, '', ''),
(35, 'download.png', 'Satria Rajawali Ektya Antara', 32, '', ''),
(36, 'download.png', 'Much. Trigusni Hermawan', 19, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'siswa', 'siswa123', 'Siswa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indeks untuk tabel `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id_home`);

--
-- Indeks untuk tabel `infosklh`
--
ALTER TABLE `infosklh`
  ADD PRIMARY KEY (`id_info`);

--
-- Indeks untuk tabel `jgmeet`
--
ALTER TABLE `jgmeet`
  ADD PRIMARY KEY (`id_jgmeet`);

--
-- Indeks untuk tabel `jtugas`
--
ALTER TABLE `jtugas`
  ADD PRIMARY KEY (`id_jtugas`);

--
-- Indeks untuk tabel `layout`
--
ALTER TABLE `layout`
  ADD PRIMARY KEY (`id_layout`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `home`
--
ALTER TABLE `home`
  MODIFY `id_home` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `infosklh`
--
ALTER TABLE `infosklh`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `jgmeet`
--
ALTER TABLE `jgmeet`
  MODIFY `id_jgmeet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jtugas`
--
ALTER TABLE `jtugas`
  MODIFY `id_jtugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `layout`
--
ALTER TABLE `layout`
  MODIFY `id_layout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

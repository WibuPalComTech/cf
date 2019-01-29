-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 21, 2019 at 05:52 PM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sispak_cf`
--

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` int(6) NOT NULL,
  `nama_gejala` varchar(64) NOT NULL,
  `pertanyaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `nama_gejala`, `pertanyaan`) VALUES
(1, 'Lemah dan sesak nafas', 'apakah anda lemah dan sesak nafas ?'),
(2, 'Infeksi', 'apakah anda infeksi ?'),
(3, 'Demam', 'apakah anda demam ?'),
(4, 'Mimisan', 'apakah anda mimisan ?'),
(5, 'sakit kepala', 'apakah anda sakit kepala ?'),
(6, 'Muntah', 'apakah anda muntah ?'),
(7, 'Nyeri tulang dan sendi', 'apakah anda nyeri tulang dan sendi ?'),
(8, 'Gampang Berkeringat ', 'apakah anda gampang Berkeringat ?'),
(9, 'Turun berat badan ', 'apakah berat badan anda Turun ?'),
(10, 'Hilang nafsu makan ', 'apakah nafsu makan anda berkurang ?'),
(11, 'Nyeri iga sebelah kiri', 'apakah anda nyeri iga  sebelah kiri ?'),
(12, 'Kulit pucat ', 'apakah kulit anda pucat ?'),
(13, 'Bintik-bintik merah ', 'apakah anda mengalami bintik-bintik merah ?'),
(14, 'Pembesaran kelenjar getah bening', 'apakah anda mengalami pembesaran kelenjar getah bening ?'),
(15, 'Pembesaran Limpah/hati', 'apakah anda mengalami pembesaran Limpah/hati ?');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `id_penyakit` int(3) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `nilai_hasil` decimal(8,6) NOT NULL,
  `possible_disease` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id_konsultasi` int(11) NOT NULL,
  `id_relasi` int(8) NOT NULL,
  `id_hasil` int(11) NOT NULL,
  `bobot_pasien` decimal(8,6) NOT NULL,
  `nilai_cf` decimal(8,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(64) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `umur` int(3) NOT NULL,
  `alamat` text NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `kd_pengguna` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `status` enum('aktif','nonaktif') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`kd_pengguna`, `username`, `password`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` int(4) NOT NULL,
  `nama_penyakit` varchar(64) NOT NULL,
  `solusi` text NOT NULL,
  `info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `nama_penyakit`, `solusi`, `info`) VALUES
(1, 'Leukimia Limfositik Akut', 'Solusi Untuk Leukimia Limfositik Akut Adalah', 'Leukimia Limfositik Akut Merupakan'),
(2, 'Leukimia Meilositik Akut', 'Solusi Untuk Leukimia Limfositik Akut Adalah', 'Leukimia Limfositik Akut Merupakan'),
(3, 'Leukimia Limfositik Kronis', 'Solusi Untuk Leukimia Limfositik Akut Adalah', 'Leukimia Limfositik Akut Merupakan'),
(4, 'Leukimia Meilositik Kronis', 'Solusi Untuk Leukimia Limfositik Akut Adalah', 'Leukimia Limfositik Akut Merupakan');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `telepon` varchar(16) NOT NULL,
  `isi_pesan` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `dibaca` enum('t','y') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `relasi`
--

CREATE TABLE `relasi` (
  `id_relasi` int(8) NOT NULL,
  `id_gejala` int(6) NOT NULL,
  `id_penyakit` int(4) NOT NULL,
  `bobot_pakar` decimal(8,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relasi`
--

INSERT INTO `relasi` (`id_relasi`, `id_gejala`, `id_penyakit`, `bobot_pakar`) VALUES
(1, 1, 1, '0.600000'),
(2, 2, 1, '0.400000'),
(3, 3, 1, '0.400000'),
(4, 4, 1, '0.400000'),
(5, 12, 1, '0.400000'),
(6, 13, 1, '0.600000'),
(7, 14, 1, '0.800000'),
(8, 1, 2, '0.600000'),
(9, 2, 2, '0.400000'),
(10, 3, 2, '0.400000'),
(11, 4, 2, '0.400000'),
(12, 5, 2, '0.400000'),
(13, 6, 2, '0.200000'),
(14, 7, 2, '0.800000'),
(15, 12, 2, '0.400000'),
(16, 1, 3, '0.600000'),
(17, 2, 3, '0.400000'),
(18, 3, 3, '0.400000'),
(19, 8, 3, '0.400000'),
(20, 9, 3, '0.400000'),
(21, 12, 3, '0.400000'),
(22, 14, 3, '0.800000'),
(23, 15, 3, '0.800000'),
(24, 1, 4, '0.600000'),
(26, 2, 4, '0.400000'),
(27, 3, 4, '0.400000'),
(28, 4, 4, '0.400000'),
(29, 9, 4, '0.400000'),
(30, 10, 4, '0.400000'),
(31, 11, 4, '0.800000'),
(32, 12, 4, '0.400000'),
(33, 15, 4, '0.800000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `penyakit_fk_hasil` (`id_penyakit`),
  ADD KEY `pasien_fk_hasil` (`id_pasien`);

--
-- Indexes for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id_konsultasi`),
  ADD KEY `relasi_fk_konsultasi` (`id_relasi`),
  ADD KEY `hasil_fk_konsultasi` (`id_hasil`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`kd_pengguna`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `relasi`
--
ALTER TABLE `relasi`
  ADD PRIMARY KEY (`id_relasi`),
  ADD KEY `penyakit_fk_relasi` (`id_penyakit`),
  ADD KEY `gejala_fk_relasi` (`id_gejala`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id_gejala` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `id_konsultasi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `kd_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_penyakit` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `relasi`
--
ALTER TABLE `relasi`
  MODIFY `id_relasi` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasil`
--
ALTER TABLE `hasil`
  ADD CONSTRAINT `pasien_fk_hasil` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penyakit_fk_hasil` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id_penyakit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD CONSTRAINT `hasil_fk_konsultasi` FOREIGN KEY (`id_hasil`) REFERENCES `hasil` (`id_hasil`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relasi_fk_konsultasi` FOREIGN KEY (`id_relasi`) REFERENCES `relasi` (`id_relasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `relasi`
--
ALTER TABLE `relasi`
  ADD CONSTRAINT `gejala_fk_relasi` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id_gejala`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penyakit_fk_relasi` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id_penyakit`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

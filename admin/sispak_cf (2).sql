-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 07, 2019 at 02:56 PM
-- Server version: 5.7.24-0ubuntu0.18.10.1
-- PHP Version: 5.6.39-1+ubuntu18.10.1+deb.sury.org+1

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
(1, 'Rasa Lemas & Lelah', 'Apakah Rasa Lemas & Lelah?'),
(2, 'Pucat', 'Apakah Pucat?'),
(3, 'Pusing', 'Apakah Pusing?'),
(4, 'Sesak Nafas / Gagal Jantung', 'Apakah Sesak Nafas / Gagal Jantung ?'),
(5, 'Berkunang-Kunang', 'Apakah Berkunang-Kunang?'),
(6, 'Fatigue', 'apakah anda fatigue'),
(7, 'malaise', 'apakah anda malaise?'),
(8, 'berat badan menurun drastis', 'apakah berat badan anda turun drastis?'),
(9, 'demam', 'Apakah anda demam?'),
(10, 'nyeri tulang sebelah kiri', 'Apakah anda nyeri tulang sebelah kiri?'),
(11, 'mudah lelah', 'Apakah anda mudah lelah?'),
(12, 'gusi berdarah', 'Apakah gusi anda berdarah ?'),
(13, 'mimisan', 'Apakah anda mimisan?'),
(14, 'Anoreksia', 'apakah anda Anoreksia?'),
(15, 'berat badan menurun', 'Apakah berat badan menurun?'),
(16, 'Hilagnya nafsu makan', 'Apakah anda hilang nafsu makan?'),
(17, 'menurun kemampuan/olahraga', 'Apakah anda menurun kemampuan/olahraga'),
(18, 'demam dan infeksi', 'apakah anda demam dan infeksi?'),
(19, 'keringat malam', 'Apakah anda berkeringat malam?'),
(20, 'pembesaran limpah/hati', 'Apakah anda merasa limpah/hati membesar?');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `id_penyakit` int(3) NOT NULL,
  `nama_pasien` varchar(64) NOT NULL,
  `nilai_hasil` decimal(8,6) NOT NULL,
  `tanggal` datetime NOT NULL,
  `possible_disease` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `id_penyakit`, `nama_pasien`, `nilai_hasil`, `tanggal`, `possible_disease`) VALUES
(119011, 1, 'Rio 100%', '0.996160', '2019-01-07 14:43:06', 1),
(119012, 1, 'Rio 20%', '0.497297', '2019-01-07 14:43:59', 1),
(119013, 4, 'Rio Case Tidak Teridentifikasi', '0.992320', '2019-01-07 14:45:33', 1),
(219011, 1, 'Rio 100%', '0.996160', '2019-01-07 14:43:06', 2),
(219012, 3, 'Rio 20%', '0.497297', '2019-01-07 14:43:59', 2),
(219013, 1, 'Rio Case Tidak Teridentifikasi', '0.000000', '2019-01-07 14:45:33', 2),
(319011, 2, 'Rio 100%', '0.992320', '2019-01-07 14:43:06', 3),
(319012, 2, 'Rio 20%', '0.473358', '2019-01-07 14:43:59', 3),
(319013, 1, 'Rio Case Tidak Teridentifikasi', '0.000000', '2019-01-07 14:45:33', 3),
(419011, 2, 'Rio 100%', '0.992320', '2019-01-07 14:43:06', 4),
(419012, 2, 'Rio 20%', '0.473358', '2019-01-07 14:43:59', 4),
(419013, 1, 'Rio Case Tidak Teridentifikasi', '0.000000', '2019-01-07 14:45:33', 4);

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

--
-- Dumping data for table `konsultasi`
--

INSERT INTO `konsultasi` (`id_konsultasi`, `id_relasi`, `id_hasil`, `bobot_pasien`, `nilai_cf`) VALUES
(1, 1, 119011, '1.000000', '0.600000'),
(2, 2, 119011, '1.000000', '0.600000'),
(3, 3, 119011, '1.000000', '0.400000'),
(4, 4, 119011, '1.000000', '0.800000'),
(5, 5, 119011, '1.000000', '0.800000'),
(6, 16, 219011, '1.000000', '0.600000'),
(7, 17, 219011, '1.000000', '0.400000'),
(8, 18, 219011, '1.000000', '0.600000'),
(9, 19, 219011, '1.000000', '0.800000'),
(10, 20, 219011, '1.000000', '0.600000'),
(11, 11, 319011, '1.000000', '0.400000'),
(12, 12, 319011, '1.000000', '0.600000'),
(13, 13, 319011, '1.000000', '0.800000'),
(14, 14, 319011, '1.000000', '0.600000'),
(15, 15, 319011, '1.000000', '0.800000'),
(16, 6, 419011, '1.000000', '0.600000'),
(17, 7, 419011, '1.000000', '0.600000'),
(18, 8, 419011, '1.000000', '0.400000'),
(19, 9, 419011, '1.000000', '0.600000'),
(20, 10, 419011, '1.000000', '0.800000'),
(21, 1, 119012, '0.200000', '0.120000'),
(22, 2, 119012, '0.200000', '0.120000'),
(23, 3, 119012, '0.200000', '0.080000'),
(24, 4, 119012, '0.200000', '0.160000'),
(25, 5, 119012, '0.200000', '0.160000'),
(26, 16, 219012, '0.200000', '0.120000'),
(27, 17, 219012, '0.200000', '0.080000'),
(28, 18, 219012, '0.200000', '0.120000'),
(29, 19, 219012, '0.200000', '0.160000'),
(30, 20, 219012, '0.200000', '0.120000'),
(31, 11, 319012, '0.200000', '0.080000'),
(32, 12, 319012, '0.200000', '0.120000'),
(33, 13, 319012, '0.200000', '0.160000'),
(34, 14, 319012, '0.200000', '0.120000'),
(35, 15, 319012, '0.200000', '0.160000'),
(36, 6, 419012, '0.200000', '0.120000'),
(37, 7, 419012, '0.200000', '0.120000'),
(38, 8, 419012, '0.200000', '0.080000'),
(39, 9, 419012, '0.200000', '0.120000'),
(40, 10, 419012, '0.200000', '0.160000'),
(41, 1, 119013, '0.000000', '0.000000'),
(42, 2, 119013, '1.000000', '0.600000'),
(43, 3, 119013, '1.000000', '0.400000'),
(44, 4, 119013, '1.000000', '0.800000'),
(45, 5, 119013, '0.200000', '0.160000'),
(46, 16, 219013, '0.000000', '0.000000'),
(47, 17, 219013, '1.000000', '0.400000'),
(48, 18, 219013, '1.000000', '0.600000'),
(49, 19, 219013, '1.000000', '0.800000'),
(50, 20, 219013, '1.000000', '0.600000'),
(51, 11, 319013, '1.000000', '0.400000'),
(52, 12, 319013, '1.000000', '0.600000'),
(53, 13, 319013, '0.000000', '0.000000'),
(54, 14, 319013, '1.000000', '0.600000'),
(55, 15, 319013, '1.000000', '0.800000'),
(56, 6, 419013, '1.000000', '0.600000'),
(57, 7, 419013, '1.000000', '0.600000'),
(58, 8, 419013, '1.000000', '0.400000'),
(59, 9, 419013, '1.000000', '0.600000'),
(60, 10, 419013, '1.000000', '0.800000');

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
(1, 'Leukimia Limfositik Akut', '-', '-'),
(2, 'Leukimia Meilositik Akut', '', ''),
(3, 'Leukimia Limfositik Kronis', '', ''),
(4, 'Leukimia Meilositik Kronis', '', '');

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
(2, 2, 1, '0.600000'),
(3, 3, 1, '0.400000'),
(4, 4, 1, '0.800000'),
(5, 5, 1, '0.800000'),
(6, 6, 4, '0.600000'),
(7, 7, 4, '0.600000'),
(8, 9, 4, '0.400000'),
(9, 8, 4, '0.600000'),
(10, 10, 4, '0.800000'),
(11, 16, 3, '0.400000'),
(12, 17, 3, '0.600000'),
(13, 18, 3, '0.800000'),
(14, 19, 3, '0.600000'),
(15, 20, 3, '0.800000'),
(16, 11, 2, '0.600000'),
(17, 12, 2, '0.400000'),
(18, 13, 2, '0.600000'),
(19, 14, 2, '0.800000'),
(20, 15, 2, '0.600000');

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
  ADD KEY `penyakit_fk_hasil` (`id_penyakit`);

--
-- Indexes for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id_konsultasi`),
  ADD KEY `relasi_fk_konsultasi` (`id_relasi`),
  ADD KEY `hasil_fk_konsultasi` (`id_hasil`);

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
  MODIFY `id_gejala` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=419014;
--
-- AUTO_INCREMENT for table `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `id_konsultasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `kd_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_penyakit` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `relasi`
--
ALTER TABLE `relasi`
  MODIFY `id_relasi` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasil`
--
ALTER TABLE `hasil`
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

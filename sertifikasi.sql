-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2022 at 03:19 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sertifikasi`
--
CREATE DATABASE IF NOT EXISTS `sertifikasi` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sertifikasi`;

-- --------------------------------------------------------

--
-- Table structure for table `khs`
--

DROP TABLE IF EXISTS `khs`;
CREATE TABLE `khs` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nim` int(11) NOT NULL,
  `nama_matkul` varchar(255) NOT NULL,
  `nilai_angka` double NOT NULL,
  `nilai_huruf` varchar(2) NOT NULL,
  `sks` int(11) NOT NULL,
  `nilai_kumulatif` double NOT NULL,
  `ipk` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `khs`
--

INSERT INTO `khs` (`id`, `nama`, `nim`, `nama_matkul`, `nilai_angka`, `nilai_huruf`, `sks`, `nilai_kumulatif`, `ipk`) VALUES
(1, 'Astary', 1313617015, 'Skripsi', 4, 'A', 6, 24, 3.77),
(2, 'Astary', 1313617015, 'Database', 3.3, 'B+', 3, 9.9, 3.77),
(3, 'Yuyun', 11, 'Web Programming', 4, 'A', 3, 12, 3.68),
(4, 'Yuyun', 11, 'Computer Network', 2.7, 'B-', 3, 8.1, 3.68),
(5, 'Yuyun', 11, 'Artificial Intellegance', 4, 'A', 3, 12, 3.68),
(6, 'Yuyun', 11, 'Database', 4, 'A', 3, 12, 3.68);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'user', 'user', 'user'),
(3, '1313617018', '1313617018', 'user'),
(4, '11', '11', 'user'),
(5, '1313617015', '1313617015', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

DROP TABLE IF EXISTS `matakuliah`;
CREATE TABLE `matakuliah` (
  `id_matkul` int(11) NOT NULL,
  `nama_matkul` varchar(255) NOT NULL,
  `sks` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`id_matkul`, `nama_matkul`, `sks`) VALUES
(1, 'Web Programming', 3),
(2, 'Computer Network', 3),
(3, 'Artificial Intellegance', 3),
(4, 'Database', 3),
(5, 'Numerical Method', 2),
(6, 'Skripsi', 6),
(7, 'Internet of Things', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `khs`
--
ALTER TABLE `khs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id_matkul`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

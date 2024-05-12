-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2017 at 07:50 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_kota`
--

CREATE TABLE `daftar_kota` (
  `id` int(11) NOT NULL,
  `kota` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `daftar_kota`
--

INSERT INTO `daftar_kota` (`id`, `kota`) VALUES
(1, 'Klaten'),
(2, 'Pekanbaru'),
(3, 'Jogja'),
(4, 'Surakarta'),
(5, 'Sukoharjo'),
(6, 'Boyolali'),
(7, 'Karanganyar'),
(8, 'Semarang'),
(9, 'Sragen'),
(10, 'Wonogiri'),
(11, 'Magelang'),
(12, 'Surabaya'),
(13, 'Bandung'),
(14, 'Balikpapa'),
(15, 'Denpasar'),
(16, 'Jayapura'),
(17, 'Bekasi'),
(18, 'Medan'),
(19, 'Palembang'),
(20, 'Jambi'),
(21, 'Lampung'),
(22, 'Malang'),
(23, 'Manado'),
(24, 'Sibolga'),
(25, 'Banda Aceh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_kota`
--
ALTER TABLE `daftar_kota`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_kota`
--
ALTER TABLE `daftar_kota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

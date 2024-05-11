-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2022 at 04:05 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbinventarisperalatan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblalat`
--

CREATE TABLE `tblalat` (
  `id_alat` char(20) NOT NULL,
  `id_kategori` char(20) NOT NULL,
  `id_lokasi` char(20) NOT NULL,
  `nama_peralatan` varchar(200) NOT NULL,
  `tahun_beli` date NOT NULL,
  `desc_alat` text NOT NULL,
  `jlh_port` text NOT NULL,
  `nama_wifi` varchar(200) NOT NULL,
  `pass_wifi` text NOT NULL,
  `frek_alat` text NOT NULL,
  `l_frek_alat` varchar(50) NOT NULL,
  `k_ram` text NOT NULL,
  `k_hardisk` text NOT NULL,
  `t_processor` text NOT NULL,
  `status_alat` char(20) NOT NULL,
  `p_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblalat`
--

INSERT INTO `tblalat` (`id_alat`, `id_kategori`, `id_lokasi`, `nama_peralatan`, `tahun_beli`, `desc_alat`, `jlh_port`, `nama_wifi`, `pass_wifi`, `frek_alat`, `l_frek_alat`, `k_ram`, `k_hardisk`, `t_processor`, `status_alat`, `p_img`) VALUES
('ALT001', 'KTA001', 'LOK004', 'PC-Diskominfo 001', '2021-12-01', 'Asus PC Core I7 - Office 2012', '-', '-', '-', '-', '-', '8 GB', '1200 GB', 'Core I7', 'Normal', 'FL3pepc.jpg'),
('ALT003', 'KTA001', 'LOK004', 'PC-Diskominfo 003', '2021-12-20', 'PC', '-', '-', '-', '-', '-', '6 GB', '900 GB', 'I7', 'Rusak Permanen', 'HJLOupc.jpg'),
('ALT004', 'KTA001', 'LOK001', 'PC-Diskominfo 004', '2021-01-01', 'PC Windows 7', '-', '-', '-', '-', '-', '4 GB', '700 GB', 'I7', 'Normal', 'ETqc5pcx.jpg'),
('ALT009', 'KTA001', 'LOK001', 'PC-Diskominfo 87', '2021-01-01', 'PC Asus + Windows 10 Pro', '-', '-', '-', '-', '-', '6 GB', '500 GB', 'I5', 'Normal', 'MzoCwpcx.jpg'),
('ALT033', 'KTA004', 'LOK001', 'PR-Dishub 001', '2021-12-21', 'Epson Printer', '-', '-', '-', '-', '-', '-', '-', '-', 'Rusak Sementara', 'PSVf6epsprinter.jpg'),
('ALT036', 'KTA004', 'LOK004', 'PR-Dispen Kota Gusit 001', '2021-11-23', 'Canon Printer', '-', '-', '-', '-', '-', '-', '-', '-', 'Rusak Permanen', 'NVpx4cprinter.jpg'),
('ALT074', 'KTA004', 'LOK003', 'PR-Dinas Perikanan 001', '2021-12-21', 'Printer - Scanner', '-', '-', '-', '-', '-', '-', '-', '-', 'Normal', 'dVGrchpprinter.jpg'),
('ALT099', 'KTA004', 'LOK003', 'PR-Dispen Kota Gusit 002', '2021-12-21', 'HP Printer', '-', '-', '-', '-', '-', '-', '-', '-', 'Normal', 'zkBIShpprinter.jpg'),
('ALT782', 'KTA002', 'LOK002', 'MD-Dishub', '2017-04-05', 'Vodafone Modem', '-', '-', '-', '-', '-', '-', '-', '-', 'Normal', 'xg3IZmodem.jpg'),
('ALT982', 'KAT005', 'LOK001', 'SW-Diskominfo', '2022-01-05', 'D-Link', '-', '-', '-', '-', '-', '-', '-', '-', 'Normal', '7CZpWswitch.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblbkat`
--

CREATE TABLE `tblbkat` (
  `id` int(11) NOT NULL,
  `id_kat` varchar(20) NOT NULL,
  `a` char(5) NOT NULL,
  `b` char(5) NOT NULL,
  `c` char(5) NOT NULL,
  `d` char(5) NOT NULL,
  `e` char(5) NOT NULL,
  `f` char(5) NOT NULL,
  `g` char(5) NOT NULL,
  `h` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblbkat`
--

INSERT INTO `tblbkat` (`id`, `id_kat`, `a`, `b`, `c`, `d`, `e`, `f`, `g`, `h`) VALUES
(1, 'KTA001', '0', '0', '0', '0', '0', '1', '1', '1'),
(2, 'KAT005', '1', '1', '1', '1', '1', '0', '0', '0'),
(4, 'KTA006', '1', '1', '1', '1', '1', '0', '0', '0'),
(5, 'KTA002', '1', '1', '1', '1', '1', '0', '0', '0'),
(6, 'KTA004', '0', '0', '0', '0', '0', '0', '0', '0'),
(7, 'KTA003', '1', '1', '1', '1', '1', '0', '0', '0'),
(8, 'KAT663', '0', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tblgangguan`
--

CREATE TABLE `tblgangguan` (
  `id_gangguan` int(20) NOT NULL,
  `id_alat` char(20) NOT NULL,
  `tgl_gangguan` date NOT NULL,
  `ciri` text NOT NULL,
  `deskripsi_gangguan` text NOT NULL,
  `status` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblgangguan`
--

INSERT INTO `tblgangguan` (`id_gangguan`, `id_alat`, `tgl_gangguan`, `ciri`, `deskripsi_gangguan`, `status`) VALUES
(1, 'ALT001', '2021-12-02', 'Layar berkedip', 'Ketika menjalankan aplikasi Office untuk pertama kali setelah PC diaktifkan layar selalu berkedip.', 'S'),
(3, 'ALT004', '2021-12-21', '-', 'Layar bergaris.', 'S'),
(4, 'ALT001', '2021-12-21', 'Windows error', 'Windows error dan berbunyi beep', 'S'),
(5, 'ALT009', '2021-12-21', '-', '-', 'S'),
(6, 'ALT074', '2021-12-21', '-', 'Hasil cetakan bergaris dan tulisan tidak bisa dibaca', 'S'),
(7, 'ALT004', '2021-12-30', '-', '-', 'S'),
(8, 'ALT074', '2021-12-30', 'Tinta putus-putus', 'Hasil print tinta hitam putus-putus dan kabur', 'S'),
(9, 'ALT003', '2021-12-30', '-', 'Tidak dapat membuka dokumen office word', 'S'),
(10, 'ALT036', '2022-02-06', '-', 'Hasil cetakan putus-putus untuk semua warna', 'S'),
(14, 'ALT004', '2022-02-09', 'Cek', 'Cek', 'S'),
(15, 'ALT782', '2022-02-09', 'Test', 'Test', 'S'),
(22, 'ALT001', '2022-02-12', 'Test', 'Ok', 'S'),
(24, 'ALT003', '2022-02-12', 'Rusak', 'Tidak Hidup', 'S'),
(25, 'ALT033', '2022-02-12', 'Printer Error', 'Ink absorber full', 'B'),
(26, 'ALT074', '2022-02-15', '-', '-', 'S'),
(27, 'ALT001', '2022-02-15', 'Windows error', 'Windows error', 'S');

-- --------------------------------------------------------

--
-- Table structure for table `tblhistorilokasi`
--

CREATE TABLE `tblhistorilokasi` (
  `id_histori` int(20) NOT NULL,
  `id_alat` char(20) NOT NULL,
  `id_lokasi_a` char(20) NOT NULL,
  `id_lokasi_b` char(20) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblhistorilokasi`
--

INSERT INTO `tblhistorilokasi` (`id_histori`, `id_alat`, `id_lokasi_a`, `id_lokasi_b`, `tgl`) VALUES
(2, 'ALT036', 'LOK002', 'LOK004', '2021-12-30'),
(3, 'ALT099', 'LOK002', 'LOK004', '2021-12-30'),
(4, 'ALT001', 'LOK001', 'LOK004', '2021-12-31'),
(6, 'ALT003', 'LOK001', 'LOK002', '2021-12-21'),
(7, 'ALT004', 'LOK001', 'LOK002', '2021-12-21'),
(8, 'ALT009', 'LOK001', 'LOK004', '2021-12-21'),
(11, 'ALT004', 'LOK002', 'LOK003', '2021-12-21'),
(12, 'ALT004', 'LOK003', 'LOK005', '2021-12-22'),
(13, 'ALT074', 'LOK005', 'LOK004', '2021-12-21'),
(30, 'ALT001', 'LOK004', 'LOK002', '2021-12-31'),
(33, 'ALT033', 'LOK003', 'LOK001', '2022-01-05'),
(35, 'ALT009', 'LOK004', 'LOK001', '2022-01-11'),
(36, 'ALT782', 'LOK003', 'LOK002', '2022-01-11'),
(37, 'ALT001', 'LOK002', 'LOK001', '2022-02-09'),
(38, 'ALT001', 'LOK001', 'LOK005', '2022-02-09'),
(39, 'ALT003', 'LOK002', 'LOK004', '2022-02-09'),
(40, 'ALT001', 'LOK005', 'LOK007', '2022-02-09'),
(41, 'ALT099', 'LOK004', 'LOK003', '2022-02-09'),
(42, 'ALT001', 'LOK007', 'LOK004', '2022-02-09'),
(43, 'ALT074', 'LOK004', 'LOK007', '2022-02-12'),
(44, 'ALT004', 'LOK005', 'LOK001', '2022-02-15'),
(45, 'ALT074', 'LOK007', 'LOK003', '2022-02-27');

-- --------------------------------------------------------

--
-- Table structure for table `tblkategori`
--

CREATE TABLE `tblkategori` (
  `id_kategori` char(20) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblkategori`
--

INSERT INTO `tblkategori` (`id_kategori`, `nama_kategori`) VALUES
('KAT005', 'Switch'),
('KAT663', 'Monitor'),
('KTA001', 'PC'),
('KTA002', 'Modem'),
('KTA003', 'Router'),
('KTA004', 'Printer'),
('KTA006', 'HUB');

-- --------------------------------------------------------

--
-- Table structure for table `tbllokasi`
--

CREATE TABLE `tbllokasi` (
  `id_lokasi` char(20) NOT NULL,
  `nama_lokasi` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbllokasi`
--

INSERT INTO `tbllokasi` (`id_lokasi`, `nama_lokasi`) VALUES
('LOK001', 'Diskominfo Kota Gunungsitoli'),
('LOK002', 'Dinas Pendidikan Kota Gunungsitoli'),
('LOK003', 'Dishub Kota Gunungsitoli'),
('LOK004', 'Dinas Sosial Kota Gunungsitoli'),
('LOK005', 'Dinas Perikanan Kota Gunungsitoli'),
('LOK007', 'Ditjen Pajak');

-- --------------------------------------------------------

--
-- Table structure for table `tblpenanganan`
--

CREATE TABLE `tblpenanganan` (
  `id_penanganan` int(20) NOT NULL,
  `id_gangguan` char(20) NOT NULL,
  `tgl_penanganan` date NOT NULL,
  `teknisi` varchar(100) NOT NULL,
  `penyelesaian` text NOT NULL,
  `hasil` text NOT NULL,
  `rekomendasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpenanganan`
--

INSERT INTO `tblpenanganan` (`id_penanganan`, `id_gangguan`, `tgl_penanganan`, `teknisi`, `penyelesaian`, `hasil`, `rekomendasi`) VALUES
(1, '1', '2021-12-21', 'Yanto', 'Instal ulang driver VGA', 'Normal', 'Jangan menambahkan aplikasi yang mengubah setelan VGA'),
(2, '3', '2021-12-21', 'Eri', 'Ganti layar', 'Normal', 'Jangan menaruh beban pada layar'),
(3, '4', '2021-12-21', 'Rian', 'Instal ulang OS Windows', 'Normal', 'Sistem berjalan dengan baik jika menggunakan Windows 10'),
(4, '5', '2021-12-21', 'Hengki', '-', 'Normal', '-'),
(5, '2', '2021-12-21', 'Hengki', '-', 'Rusak Pemanen', 'Diganti dengan yang baru'),
(6, '6', '2021-12-29', '-', '-', 'Normal', 'Ok'),
(7, '7', '2021-12-30', 'Ray', '-', 'Normal', '-'),
(8, '8', '2022-01-04', 'Ryan', '-', 'Normal', '-'),
(9, '9', '2022-02-06', 'Andre', 'Instal ulang office', 'Normal', '-'),
(12, '10', '2022-02-09', 'Zalukhu', 'Ok', 'Rusak Permanen', 'Zalukhu'),
(21, '15', '2022-02-09', 'Ok', 'Ok', 'Normal', 'Ok'),
(24, '14', '2022-02-09', 'Ok', 'Ok', 'Normal', 'Ok'),
(25, '22', '2022-02-12', 'Budi', 'Ok', 'Normal', 'Ok'),
(26, '24', '2022-02-12', 'Budi', 'Diganti', 'Rusak Permanen', 'Beli pc baru'),
(27, '27', '2022-02-15', 'Moha', 'Ok', 'Normal', 'Ok'),
(28, '26', '2022-02-22', 'Ryan', 'Ok', 'Normal', 'Ok');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblalat`
--
ALTER TABLE `tblalat`
  ADD PRIMARY KEY (`id_alat`);

--
-- Indexes for table `tblbkat`
--
ALTER TABLE `tblbkat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblgangguan`
--
ALTER TABLE `tblgangguan`
  ADD PRIMARY KEY (`id_gangguan`);

--
-- Indexes for table `tblhistorilokasi`
--
ALTER TABLE `tblhistorilokasi`
  ADD PRIMARY KEY (`id_histori`);

--
-- Indexes for table `tblkategori`
--
ALTER TABLE `tblkategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbllokasi`
--
ALTER TABLE `tbllokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `tblpenanganan`
--
ALTER TABLE `tblpenanganan`
  ADD PRIMARY KEY (`id_penanganan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblbkat`
--
ALTER TABLE `tblbkat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblgangguan`
--
ALTER TABLE `tblgangguan`
  MODIFY `id_gangguan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tblhistorilokasi`
--
ALTER TABLE `tblhistorilokasi`
  MODIFY `id_histori` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tblpenanganan`
--
ALTER TABLE `tblpenanganan`
  MODIFY `id_penanganan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

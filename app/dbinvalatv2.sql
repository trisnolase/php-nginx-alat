/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 100425
 Source Host           : localhost:3306
 Source Schema         : dbinvalatv2

 Target Server Type    : MySQL
 Target Server Version : 100425
 File Encoding         : 65001

 Date: 03/03/2023 16:41:21
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tblalat
-- ----------------------------
DROP TABLE IF EXISTS `tblalat`;
CREATE TABLE `tblalat`  (
  `id_alat` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_kategori` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_lokasi` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_peralatan` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tahun_beli` date NOT NULL,
  `desc_alat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jlh_port` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_wifi` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pass_wifi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `frek_alat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `l_frek_alat` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `k_ram` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `k_hardisk` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `t_processor` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status_alat` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `p_img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_alat`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tblalat
-- ----------------------------
INSERT INTO `tblalat` VALUES ('ALT001', 'KTA001', 'LOK004', 'PC-Diskominfo 001', '2021-12-01', 'Asus PC Core I7 - Office 2012 - Original', '-', '-', '-', '-', '-', '8 GB', '1200 GB', 'Core I7', 'Rusak Sementara', 'Spn35pc_cek.png');
INSERT INTO `tblalat` VALUES ('ALT003', 'KTA001', 'LOK004', 'PC-Diskominfo 003', '2021-12-20', 'PC', '-', '-', '-', '-', '-', '6 GB', '900 GB', 'I7', 'Rusak Permanen', 'o8pwOpc_cek.png');
INSERT INTO `tblalat` VALUES ('ALT004', 'KTA001', 'LOK001', 'PC-Diskominfo 004', '2021-01-01', 'PC Windows 10', '-', '-', '-', '-', '-', '12 GB', '700 GB', 'I7', 'Normal', 'QY6rbpc_ok.jpg');
INSERT INTO `tblalat` VALUES ('ALT009', 'KTA001', 'LOK001', 'PC-Diskominfo 87', '2021-01-01', 'PC Asus + Windows 10 Pro', '-', '-', '-', '-', '-', '6 GB', '500 GB', 'I5', 'Rusak Sementara', 'khcSLpc_cek.png');
INSERT INTO `tblalat` VALUES ('ALT033', 'KTA004', 'LOK002', 'Printer Epson', '2022-07-20', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Rusak Permanen', 'k9Bz3');
INSERT INTO `tblalat` VALUES ('ALT036', 'KTA004', 'LOK004', 'PR-Dispen Kota Gusit 001', '2021-11-23', 'Canon Printer - P', '-', '-', '-', '-', '-', '-', '-', '-', 'Rusak Permanen', 'fTi5Wc_printer.jpg');
INSERT INTO `tblalat` VALUES ('ALT074', 'KTA004', 'LOK007', 'PR-Dinas Perikanan 001', '2021-12-21', 'Printer - Scanner', '-', '-', '-', '-', '-', '-', '-', '-', 'Normal', 's5TXeprinter.jpg');
INSERT INTO `tblalat` VALUES ('ALT099', 'KTA004', 'LOK007', 'PR-Dispen Kota Gusit 002', '2021-12-21', 'HP Printer', '-', '-', '-', '-', '-', '-', '-', '-', 'Normal', 'H7m2Wprinter.jpg');
INSERT INTO `tblalat` VALUES ('ALT234', 'KTA004', 'LOK007', 'Epson Printer', '2022-09-06', '-', '', '', '', '', '', '', '', '', 'Normal', '');
INSERT INTO `tblalat` VALUES ('ALT644', 'KTA004', 'LOK004', 'Printer OKE', '2022-09-10', '-', '', '', '', '', '', '', '', '', 'Normal', '');
INSERT INTO `tblalat` VALUES ('ALT782', 'KTA002', 'LOK002', 'MD-Dishub', '2017-04-05', 'Vodafone Modem', '-', '-', '-', '-', '-', '-', '-', '-', 'Normal', 'xg3IZmodem.jpg');
INSERT INTO `tblalat` VALUES ('ALT982', 'KAT005', 'LOK001', 'SW-Diskominfo', '2022-01-05', 'D-Link', '-', '-', '-', '-', '-', '-', '-', '-', 'Normal', '7CZpWswitch.jpg');

-- ----------------------------
-- Table structure for tblbkat
-- ----------------------------
DROP TABLE IF EXISTS `tblbkat`;
CREATE TABLE `tblbkat`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_kat` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `a` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `b` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `c` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `d` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `e` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `f` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `g` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `h` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tblbkat
-- ----------------------------
INSERT INTO `tblbkat` VALUES (1, 'KTA001', '', '', '', '', '', '1', '1', '1');
INSERT INTO `tblbkat` VALUES (2, 'KAT005', '1', '1', '1', '1', '1', '0', '0', '0');
INSERT INTO `tblbkat` VALUES (4, 'KTA006', '1', '1', '1', '1', '1', '0', '0', '0');
INSERT INTO `tblbkat` VALUES (5, 'KTA002', '1', '1', '1', '1', '1', '', '', '');
INSERT INTO `tblbkat` VALUES (6, 'KTA004', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `tblbkat` VALUES (7, 'KTA003', '1', '1', '1', '1', '1', '0', '0', '0');
INSERT INTO `tblbkat` VALUES (8, 'KAT663', '0', '0', '0', '0', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for tblgangguan
-- ----------------------------
DROP TABLE IF EXISTS `tblgangguan`;
CREATE TABLE `tblgangguan`  (
  `id_gangguan` int NOT NULL AUTO_INCREMENT,
  `id_alat` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_gangguan` date NOT NULL,
  `ciri` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi_gangguan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_gangguan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tblgangguan
-- ----------------------------
INSERT INTO `tblgangguan` VALUES (1, 'ALT001', '2021-12-02', 'Layar berkedip', 'Ketika menjalankan aplikasi Office untuk pertama kali setelah PC diaktifkan layar selalu berkedip.', 'S');
INSERT INTO `tblgangguan` VALUES (3, 'ALT004', '2021-12-21', '-', 'Layar bergaris.', 'S');
INSERT INTO `tblgangguan` VALUES (4, 'ALT001', '2021-12-21', 'Windows error', 'Windows error dan berbunyi beep', 'S');
INSERT INTO `tblgangguan` VALUES (5, 'ALT009', '2021-12-21', '-', '-', 'S');
INSERT INTO `tblgangguan` VALUES (6, 'ALT074', '2021-12-21', '-', 'Hasil cetakan bergaris dan tulisan tidak bisa dibaca', 'S');
INSERT INTO `tblgangguan` VALUES (7, 'ALT004', '2021-12-30', '-', '-', 'S');
INSERT INTO `tblgangguan` VALUES (8, 'ALT074', '2021-12-30', 'Tinta putus-putus', 'Hasil print tinta hitam putus-putus dan kabur', 'S');
INSERT INTO `tblgangguan` VALUES (9, 'ALT003', '2021-12-30', '-', 'Tidak dapat membuka dokumen office word', 'S');
INSERT INTO `tblgangguan` VALUES (10, 'ALT036', '2022-02-06', '-', 'Hasil cetakan putus-putus untuk semua warna', 'S');
INSERT INTO `tblgangguan` VALUES (14, 'ALT004', '2022-02-09', 'Cek', 'Cek', 'S');
INSERT INTO `tblgangguan` VALUES (15, 'ALT782', '2022-02-09', 'Test', 'Test', 'S');
INSERT INTO `tblgangguan` VALUES (22, 'ALT001', '2022-02-12', 'Test', 'Ok', 'S');
INSERT INTO `tblgangguan` VALUES (24, 'ALT003', '2022-02-12', 'Rusak', 'Tidak Hidup', 'S');
INSERT INTO `tblgangguan` VALUES (25, 'ALT033', '2022-02-12', 'Printer Error', 'Ink absorber full', 'S');
INSERT INTO `tblgangguan` VALUES (26, 'ALT074', '2022-02-15', '-', '-', 'S');
INSERT INTO `tblgangguan` VALUES (27, 'ALT001', '2022-02-15', 'Windows error', 'Windows error', 'S');
INSERT INTO `tblgangguan` VALUES (28, 'ALT001', '2022-07-20', '-', '-', 'B');
INSERT INTO `tblgangguan` VALUES (29, 'ALT004', '2022-07-21', '-', '-', 'S');
INSERT INTO `tblgangguan` VALUES (33, 'ALT009', '2022-07-22', '-', '-', 'B');
INSERT INTO `tblgangguan` VALUES (34, 'ALT074', '2022-07-26', '', '', 'S');
INSERT INTO `tblgangguan` VALUES (35, 'ALT644', '2023-03-03', 'Tinta tidak ada', 'hasil print blank', 'S');

-- ----------------------------
-- Table structure for tblhistorilokasi
-- ----------------------------
DROP TABLE IF EXISTS `tblhistorilokasi`;
CREATE TABLE `tblhistorilokasi`  (
  `id_histori` int NOT NULL AUTO_INCREMENT,
  `id_alat` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_lokasi_a` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_lokasi_b` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tgl` date NOT NULL,
  PRIMARY KEY (`id_histori`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 50 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tblhistorilokasi
-- ----------------------------
INSERT INTO `tblhistorilokasi` VALUES (2, 'ALT036', 'LOK002', 'LOK004', '2021-12-30');
INSERT INTO `tblhistorilokasi` VALUES (3, 'ALT099', 'LOK002', 'LOK004', '2021-12-30');
INSERT INTO `tblhistorilokasi` VALUES (4, 'ALT001', 'LOK001', 'LOK004', '2021-12-31');
INSERT INTO `tblhistorilokasi` VALUES (6, 'ALT003', 'LOK001', 'LOK002', '2021-12-21');
INSERT INTO `tblhistorilokasi` VALUES (7, 'ALT004', 'LOK001', 'LOK002', '2021-12-21');
INSERT INTO `tblhistorilokasi` VALUES (8, 'ALT009', 'LOK001', 'LOK004', '2021-12-21');
INSERT INTO `tblhistorilokasi` VALUES (11, 'ALT004', 'LOK002', 'LOK003', '2021-12-21');
INSERT INTO `tblhistorilokasi` VALUES (12, 'ALT004', 'LOK003', 'LOK005', '2021-12-22');
INSERT INTO `tblhistorilokasi` VALUES (13, 'ALT074', 'LOK005', 'LOK004', '2021-12-21');
INSERT INTO `tblhistorilokasi` VALUES (30, 'ALT001', 'LOK004', 'LOK002', '2021-12-31');
INSERT INTO `tblhistorilokasi` VALUES (33, 'ALT033', 'LOK003', 'LOK001', '2022-01-05');
INSERT INTO `tblhistorilokasi` VALUES (35, 'ALT009', 'LOK004', 'LOK001', '2022-01-11');
INSERT INTO `tblhistorilokasi` VALUES (36, 'ALT782', 'LOK003', 'LOK002', '2022-01-11');
INSERT INTO `tblhistorilokasi` VALUES (37, 'ALT001', 'LOK002', 'LOK001', '2022-02-09');
INSERT INTO `tblhistorilokasi` VALUES (38, 'ALT001', 'LOK001', 'LOK005', '2022-02-09');
INSERT INTO `tblhistorilokasi` VALUES (39, 'ALT003', 'LOK002', 'LOK004', '2022-02-09');
INSERT INTO `tblhistorilokasi` VALUES (40, 'ALT001', 'LOK005', 'LOK007', '2022-02-09');
INSERT INTO `tblhistorilokasi` VALUES (41, 'ALT099', 'LOK004', 'LOK003', '2022-02-09');
INSERT INTO `tblhistorilokasi` VALUES (42, 'ALT001', 'LOK007', 'LOK004', '2022-02-09');
INSERT INTO `tblhistorilokasi` VALUES (43, 'ALT074', 'LOK004', 'LOK007', '2022-02-12');
INSERT INTO `tblhistorilokasi` VALUES (44, 'ALT004', 'LOK005', 'LOK001', '2022-02-15');
INSERT INTO `tblhistorilokasi` VALUES (45, 'ALT074', 'LOK007', 'LOK003', '2022-02-27');
INSERT INTO `tblhistorilokasi` VALUES (46, 'ALT099', 'LOK003', 'LOK007', '2022-07-21');
INSERT INTO `tblhistorilokasi` VALUES (47, 'ALT234', 'LOK003', 'LOK007', '2022-09-06');
INSERT INTO `tblhistorilokasi` VALUES (48, 'ALT074', 'LOK003', 'LOK007', '2023-03-03');
INSERT INTO `tblhistorilokasi` VALUES (49, 'ALT644', 'LOK002', 'LOK004', '2023-03-03');

-- ----------------------------
-- Table structure for tblkategori
-- ----------------------------
DROP TABLE IF EXISTS `tblkategori`;
CREATE TABLE `tblkategori`  (
  `id_kategori` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_kategori` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_kategori`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tblkategori
-- ----------------------------
INSERT INTO `tblkategori` VALUES ('KAT005', 'Switch');
INSERT INTO `tblkategori` VALUES ('KAT663', 'Monitor');
INSERT INTO `tblkategori` VALUES ('KTA001', 'PC');
INSERT INTO `tblkategori` VALUES ('KTA002', 'Modem');
INSERT INTO `tblkategori` VALUES ('KTA003', 'Router');
INSERT INTO `tblkategori` VALUES ('KTA004', 'Printer');
INSERT INTO `tblkategori` VALUES ('KTA006', 'HUB');

-- ----------------------------
-- Table structure for tbllogin
-- ----------------------------
DROP TABLE IF EXISTS `tbllogin`;
CREATE TABLE `tbllogin`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `role` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbllogin
-- ----------------------------
INSERT INTO `tbllogin` VALUES (1, 'admin', 'admin', 'admin');
INSERT INTO `tbllogin` VALUES (2, 'user', 'user', 'user');

-- ----------------------------
-- Table structure for tbllokasi
-- ----------------------------
DROP TABLE IF EXISTS `tbllokasi`;
CREATE TABLE `tbllokasi`  (
  `id_lokasi` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_lokasi` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_lokasi`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbllokasi
-- ----------------------------
INSERT INTO `tbllokasi` VALUES ('LOK001', 'Dinas Kominfo Kota Gunungsitoli');
INSERT INTO `tbllokasi` VALUES ('LOK002', 'Dinas Pendidikan Kota Gunungsitoli');
INSERT INTO `tbllokasi` VALUES ('LOK003', 'Dishub Kota Gunungsitoli');
INSERT INTO `tbllokasi` VALUES ('LOK004', 'Dinas Sosial Kota Gunungsitoli');
INSERT INTO `tbllokasi` VALUES ('LOK005', 'Dinas Perikanan Kota Gunungsitoli');
INSERT INTO `tbllokasi` VALUES ('LOK007', 'Ditjen Pajak');

-- ----------------------------
-- Table structure for tblpenanganan
-- ----------------------------
DROP TABLE IF EXISTS `tblpenanganan`;
CREATE TABLE `tblpenanganan`  (
  `id_penanganan` int NOT NULL AUTO_INCREMENT,
  `id_gangguan` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_penanganan` date NOT NULL,
  `teknisi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `penyelesaian` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `hasil` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rekomendasi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_penanganan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tblpenanganan
-- ----------------------------
INSERT INTO `tblpenanganan` VALUES (1, '1', '2021-12-21', 'Yanto', 'Instal ulang driver VGA', 'Normal', 'Jangan menambahkan aplikasi yang mengubah setelan VGA');
INSERT INTO `tblpenanganan` VALUES (2, '3', '2021-12-21', 'Eri', 'Ganti layar', 'Normal', 'Jangan menekan layar terlalu keras');
INSERT INTO `tblpenanganan` VALUES (3, '4', '2021-12-21', 'Rian', 'Instal ulang OS Windows', 'Normal', 'Sistem berjalan dengan baik jika menggunakan Windows 10');
INSERT INTO `tblpenanganan` VALUES (4, '5', '2021-12-21', 'Hengki', '-', 'Normal', '-');
INSERT INTO `tblpenanganan` VALUES (5, '2', '2021-12-21', 'Hengki', '-', 'Rusak Pemanen', 'Diganti dengan yang baru');
INSERT INTO `tblpenanganan` VALUES (6, '6', '2021-12-29', 'Zalukhu', '-', 'Normal', 'Ok');
INSERT INTO `tblpenanganan` VALUES (7, '7', '2021-12-30', 'Ray', '-', 'Normal', '-');
INSERT INTO `tblpenanganan` VALUES (8, '8', '2022-01-04', 'Ryan', '-', 'Normal', '-');
INSERT INTO `tblpenanganan` VALUES (9, '9', '2022-02-06', 'Andre', 'Instal ulang office', 'Normal', '-');
INSERT INTO `tblpenanganan` VALUES (12, '10', '2022-02-09', 'Zalukhu', 'Ok', 'Rusak Permanen', 'Zalukhu');
INSERT INTO `tblpenanganan` VALUES (21, '15', '2022-02-09', 'Zalukhu', 'Ok', 'Normal', 'Ok');
INSERT INTO `tblpenanganan` VALUES (24, '14', '2022-02-09', 'Zalukhu', 'Ok', 'Normal', 'Ok');
INSERT INTO `tblpenanganan` VALUES (25, '22', '2022-02-12', 'Budi', 'Ok', 'Normal', 'Ok');
INSERT INTO `tblpenanganan` VALUES (26, '24', '2022-02-12', 'Budi', 'Diganti', 'Rusak Permanen', 'Beli pc baru');
INSERT INTO `tblpenanganan` VALUES (27, '27', '2022-02-15', 'Moha', 'Ok', 'Normal', 'Ok');
INSERT INTO `tblpenanganan` VALUES (28, '26', '2022-02-22', 'Ryan', 'Ok', 'Normal', 'Ok');
INSERT INTO `tblpenanganan` VALUES (29, '25', '2022-07-20', 'Zalukhu', '-', 'Rusak Permanen', '-');
INSERT INTO `tblpenanganan` VALUES (30, '29', '2022-07-21', 'Zalukhu', '-', 'Normal', '-');
INSERT INTO `tblpenanganan` VALUES (31, '34', '2022-07-26', 'Zalukhu', '-', 'Normal', '-');
INSERT INTO `tblpenanganan` VALUES (32, '35', '2023-03-03', 'Ntaps', 'Oke', 'Normal', 'Niwe');

-- ----------------------------
-- View structure for alat_view
-- ----------------------------
DROP VIEW IF EXISTS `alat_view`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `alat_view` AS SELECT
	tblalat.id_alat,
	tblalat.id_kategori,
	tblalat.id_lokasi,
	tblalat.nama_peralatan,
	tblalat.tahun_beli,
	tblalat.desc_alat,
	tblalat.jlh_port,
	tblalat.nama_wifi,
	tblalat.pass_wifi,
	tblalat.frek_alat,
	tblalat.l_frek_alat,
	tblalat.k_ram,
	tblalat.k_hardisk,
	tblalat.t_processor,
	tblalat.status_alat,
	tblalat.p_img,
	tblkategori.nama_kategori,
	tbllokasi.nama_lokasi,(
	SELECT
		tblalat.id_alat 
	FROM
		tblgangguan,
		tblpenanganan 
	WHERE
		tblalat.id_alat = tblhistorilokasi.id_alat 
		OR tblalat.id_alat = tblgangguan.id_alat 
		LIMIT 1 
	) AS cek_alat 
FROM
	tblalat
	INNER JOIN tblkategori ON tblalat.id_kategori = tblkategori.id_kategori
	INNER JOIN tbllokasi ON tblalat.id_lokasi = tbllokasi.id_lokasi
	LEFT JOIN tblhistorilokasi ON tblalat.id_alat = tblhistorilokasi.id_alat 
WHERE
	tblalat.id_kategori = tblkategori.id_kategori 
	AND tblalat.id_lokasi = tbllokasi.id_lokasi 
GROUP BY
	tblalat.id_alat ;

-- ----------------------------
-- View structure for edit_alat_view
-- ----------------------------
DROP VIEW IF EXISTS `edit_alat_view`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `edit_alat_view` AS SELECT tblalat.id_alat,
	tblalat.id_kategori,
	tblalat.id_lokasi,
	tblalat.nama_peralatan,
	tblalat.tahun_beli,
	tblalat.desc_alat,
	tblalat.jlh_port,
	tblalat.nama_wifi,
	tblalat.pass_wifi,
	tblalat.frek_alat,
	tblalat.l_frek_alat,
	tblalat.k_ram,
	tblalat.k_hardisk,
	tblalat.t_processor,
	tblalat.status_alat,
	tblalat.p_img,
	tbllokasi.nama_lokasi,
	tblkategori.nama_kategori
FROM tblalat,
	tbllokasi,
	tblkategori
WHERE tblalat.id_kategori = tblkategori.id_kategori
	AND tblalat.id_lokasi = tbllokasi.id_lokasi ;

-- ----------------------------
-- View structure for gangguan_view
-- ----------------------------
DROP VIEW IF EXISTS `gangguan_view`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `gangguan_view` AS SELECT tblgangguan.id_gangguan,
	tblgangguan.id_alat,
	tblgangguan.tgl_gangguan,
	tblgangguan.ciri,
	tblgangguan.deskripsi_gangguan,
	tblgangguan.`status`,
	tblalat.id_kategori,
	tblalat.id_lokasi,
	tblalat.nama_peralatan
FROM tblgangguan
	INNER JOIN tblalat ON tblgangguan.id_alat = tblalat.id_alat ;

-- ----------------------------
-- View structure for histori_lokasi_view
-- ----------------------------
DROP VIEW IF EXISTS `histori_lokasi_view`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `histori_lokasi_view` AS SELECT lokasi_alat_view.id_histori AS id_histori,
	lokasi_alat_view.id_alat AS id_alat,
	lokasi_alat_view.nama_peralatan AS nama_peralatan,
	lokasi_alat_view.id_lokasi_a AS id_lokasi_a,
	(
		SELECT tbllokasi.nama_lokasi
		FROM tbllokasi
		where lokasi_alat_view.id_lokasi_a = tbllokasi.id_lokasi
	) AS nama_lokasi_a,
	lokasi_alat_view.id_lokasi_b AS id_lokasi_b,
	(
		SELECT tbllokasi.nama_lokasi
		FROM tbllokasi
		where lokasi_alat_view.id_lokasi_b = tbllokasi.id_lokasi
	) AS nama_lokasi_b,
	lokasi_alat_view.tgl AS tgl
FROM lokasi_alat_view ;

-- ----------------------------
-- View structure for jumlah_per_kategori_view
-- ----------------------------
DROP VIEW IF EXISTS `jumlah_per_kategori_view`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `jumlah_per_kategori_view` AS SELECT tblkategori.id_kategori,
	tblkategori.nama_kategori,
	count(tblalat.id_alat) as jlh_alt
FROM tblkategori
	LEFT JOIN tblalat ON tblkategori.id_kategori = tblalat.id_kategori
GROUP BY tblkategori.id_kategori ;

-- ----------------------------
-- View structure for kategori_view
-- ----------------------------
DROP VIEW IF EXISTS `kategori_view`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `kategori_view` AS SELECT tblkategori.*,
	tblbkat.*
FROM tblkategori
	INNER JOIN tblbkat ON tblkategori.id_kategori = tblbkat.id_kat ;

-- ----------------------------
-- View structure for lokasi_alat_view
-- ----------------------------
DROP VIEW IF EXISTS `lokasi_alat_view`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `lokasi_alat_view` AS SELECT tblhistorilokasi.id_histori,
	tblhistorilokasi.id_alat,
	tblalat.nama_peralatan,
	tblhistorilokasi.id_lokasi_a,
	tblhistorilokasi.id_lokasi_b,
	tblhistorilokasi.tgl
FROM tblhistorilokasi
	INNER JOIN tblalat ON tblhistorilokasi.id_alat = tblalat.id_alat
ORDER BY tblhistorilokasi.id_alat DESC,
	tblhistorilokasi.id_histori DESC ;

-- ----------------------------
-- View structure for lokasi_view
-- ----------------------------
DROP VIEW IF EXISTS `lokasi_view`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `lokasi_view` AS SELECT tbllokasi.id_lokasi,
	tbllokasi.nama_lokasi,
	count(tblalat.id_alat) AS jlh_alt
FROM tbllokasi
	LEFT JOIN tblalat ON tbllokasi.id_lokasi = tblalat.id_lokasi
GROUP BY tbllokasi.id_lokasi ;

-- ----------------------------
-- View structure for notif_view
-- ----------------------------
DROP VIEW IF EXISTS `notif_view`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `notif_view` AS SELECT COUNT(tblalat.status_alat) AS jumlah
FROM tblalat,
	tblkategori,
	tbllokasi
WHERE tblalat.id_kategori = tblkategori.id_kategori
	AND tblalat.id_lokasi = tbllokasi.id_lokasi
	AND tblalat.status_alat = 'Rusak Sementara' ;

-- ----------------------------
-- View structure for penanganan_view
-- ----------------------------
DROP VIEW IF EXISTS `penanganan_view`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `penanganan_view` AS SELECT tblpenanganan.id_penanganan,
	tblpenanganan.tgl_penanganan,
	tblpenanganan.teknisi,
	tblpenanganan.penyelesaian,
	tblpenanganan.hasil,
	tblpenanganan.rekomendasi,
	tblalat.nama_peralatan,
	tblgangguan.id_alat,
	tblgangguan.id_gangguan,
	tblgangguan.tgl_gangguan
FROM tblpenanganan,
	tblalat,
	tblgangguan
WHERE tblpenanganan.id_gangguan = tblgangguan.id_gangguan
	AND tblgangguan.id_alat = tblalat.id_alat
ORDER BY tblalat.id_alat DESC,
	tblpenanganan.id_penanganan DESC ;

SET FOREIGN_KEY_CHECKS = 1;

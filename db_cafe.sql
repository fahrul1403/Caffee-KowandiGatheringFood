-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_cafe
CREATE DATABASE IF NOT EXISTS `db_cafe` /*!40100 DEFAULT CHARACTER SET armscii8 COLLATE armscii8_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_cafe`;

-- Dumping structure for table db_cafe.tbl_order
CREATE TABLE IF NOT EXISTS `tbl_order` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `id_product` int NOT NULL,
  `nama_product` varchar(200) NOT NULL,
  `harga_satuan` varchar(200) NOT NULL,
  `nama_customer` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `quantity` int NOT NULL,
  `total_harga` int NOT NULL,
  `payment_method` varchar(200) NOT NULL,
  `tgl_transaksi` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUser` (`id_user`),
  KEY `idProduct` (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_cafe.tbl_order: ~3 rows (approximately)
INSERT INTO `tbl_order` (`id`, `id_user`, `id_product`, `nama_product`, `harga_satuan`, `nama_customer`, `alamat`, `quantity`, `total_harga`, `payment_method`, `tgl_transaksi`) VALUES
	(26, 43, 24, 'Ayam', '8000', 'Gara', 'Simpangan, Cikarang utara, Bekasi, Jawa Barat.', 2, 16000, 'Dana', '2 April 2023'),
	(30, 45, 27, 'Oreg', '3000', 'Rara', 'Kosan tiara no.3', 2, 6000, 'Dana', '5 April 2023'),
	(31, 45, 27, 'Oreg', '3000', 'Rara', 'Simpangan, Cikarang utara, Bekasi, Jawa Barat.', 5, 15000, 'Dana', '5 April 2023');

-- Dumping structure for table db_cafe.tbl_product
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `gambar` varchar(200) NOT NULL,
  `nama_product` varchar(200) NOT NULL,
  `harga` int NOT NULL,
  `tgl_tambah` varchar(200) NOT NULL,
  `terjual` int NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_cafe.tbl_product: ~7 rows (approximately)
INSERT INTO `tbl_product` (`id`, `gambar`, `nama_product`, `harga`, `tgl_tambah`, `terjual`, `deskripsi`) VALUES
	(24, '64290403bf08b.jpeg', 'Ayam', 8000, '4 Maret 2023', 6, 'Ayam Goreng'),
	(25, '642906f83dfad.jpeg', 'Telur', 5000, '4 Maret 2023', 3, 'Fried eggs and seasoned with soy sauce and other spices that make it taste very good'),
	(27, '642904b521101.jpg', 'Oreg', 3000, '4 Maret 2023', 19, 'Oreg or fried tempeh which is given a special seasoning with small slices and is very popular with many people'),
	(28, '642906b65dc95.jpg', 'Tahu', 3000, '4 Maret 2023', 4, '\r\nTofu is a twin of tempe but weaker'),
	(29, '6429035467b6d.jpeg', 'Sayur', 3000, '4 Maret 2023', 6, 'Vegetables with different types of variants'),
	(30, '642926b34d4b7.jpeg', 'Nasi', 5000, '4 Maret 2023', 1, 'Nasi putih'),
	(33, '642927177d79a.jpeg', 'Tempe Goreng', 2000, '2 April 2023', 0, 'Fried Tempe');

-- Dumping structure for table db_cafe.tbl_user
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `tgl_buat` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL,
  `job_desc` varchar(200) NOT NULL,
  `rating` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_cafe.tbl_user: ~11 rows (approximately)
INSERT INTO `tbl_user` (`id`, `nama_lengkap`, `username`, `password`, `tgl_buat`, `status`, `role`, `job_desc`, `rating`) VALUES
	(25, 'Akun Demo', 'demo', '$2y$10$Y9B.cxUIjrXLrO0/FstNae7.JNEniKvgaSDGoZuoqClGAiLyNcEfK', '19 April 2021', 'Nonaktif', 'Customer', '-', '-'),
	(31, 'Budi', 'budi', '$2y$10$4adAHaP6LPIq3q6LwFtRteunbPXC9NI3Eq6FeF3V3bKmSl1CCcgju', '10 May 2021', 'Aktif', 'Admin', 'Customer Manager', '-'),
	(32, 'Ucup', 'ucup', '123', '10 May 2021', 'Aktif', 'Admin', 'Product Manager', '-'),
	(33, 'Tatang', 'tatang', '$2y$10$UICoAh48XqQs8U6b.Jvs7uM5HsUz83v8xNA/AWKMl9AL/1IY0cPU6', '10 May 2021', 'Aktif', 'Admin', 'Staff', '-'),
	(34, 'Udin', 'udin', '$2y$10$2ELCJAxYTr5ppI8KepM/Ue5LlF5/I2dG8Re.UvSv9IzYpJMHcPiBS', '25 May 2021', 'Aktif', 'Customer', '-', '-'),
	(37, 'testing', 'testing', '$2y$10$zuyCmvAaEVNhUYW/9saWO.j6sGhpEMOptDWIB2Qmn6qWk0r2rMxjS', '6 June 2021', 'Nonaktif', 'Customer', '-', '-'),
	(40, 'MUH. FAHRUL', 'fahrul1', '$2y$10$qFBPrHQkmme77SalNyLjLuXYb2vepvSG8/WCJGVuzdsFvA8LUOMfe', '1 April 2023', 'Aktif', 'Admin', 'Owner', '-'),
	(41, 'Andi', 'andi', '$2y$10$e/inGD8.vtuK3NSPTsDhTuSuJetb/tLpEiqjryWZUnqruZyj2Ve5q', '2 April 2023', 'Aktif', 'Customer', '-', '-'),
	(43, 'Gara', 'gara', '$2y$10$HVzNiEc2l8U396sBDmedAONomGoziAZPlUEsJWCDh6Cw5USEiLpFm', '2 April 2023', 'Aktif', 'Customer', '-', '-'),
	(44, 'Hansen', 'hansen', '$2y$10$9wTmWKwM8i3MoKDYm1jqw.85vOX26fVBNlvrlRB5L/d51Yv4Wn61K', '5 April 2023', 'Aktif', 'Customer', '-', '-'),
	(45, 'Rara', 'ra', '$2y$10$mzLPnS0yDdKXrtXOVcmxseh/13DS6mV6JGIcxxSHlcqvyDZCOeHSy', '5 April 2023', 'Aktif', 'Customer', '-', '-');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

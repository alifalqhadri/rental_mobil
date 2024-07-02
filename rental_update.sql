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


-- Dumping database structure for rental_mobil
CREATE DATABASE IF NOT EXISTS `rental_mobil` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `rental_mobil`;

-- Dumping structure for table rental_mobil.tbl_admin
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table rental_mobil.tbl_akun
CREATE TABLE IF NOT EXISTS `tbl_akun` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `foto` varchar(60) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_general_ci DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table rental_mobil.tbl_merk
CREATE TABLE IF NOT EXISTS `tbl_merk` (
  `id_merk` int NOT NULL AUTO_INCREMENT,
  `merk` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_merk`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table rental_mobil.tbl_mobil
CREATE TABLE IF NOT EXISTS `tbl_mobil` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `warna` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dd` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tahun` date DEFAULT NULL,
  `gambar` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `harga` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `merk` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_mobil_ibfk_2` (`merk`),
  CONSTRAINT `tbl_mobil_ibfk_2` FOREIGN KEY (`merk`) REFERENCES `tbl_merk` (`id_merk`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table rental_mobil.tbl_pembayaran
CREATE TABLE IF NOT EXISTS `tbl_pembayaran` (
  `id_pembayaran` int NOT NULL AUTO_INCREMENT,
  `total` varchar(100) NOT NULL DEFAULT '0',
  `id_user` int NOT NULL,
  `snap_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `is_Pay` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_pembayaran`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table rental_mobil.tbl_pesanan
CREATE TABLE IF NOT EXISTS `tbl_pesanan` (
  `id_pesanan` int NOT NULL AUTO_INCREMENT,
  `pinjam` date DEFAULT NULL,
  `kembali` date DEFAULT NULL,
  `denda` varchar(100) COLLATE utf8mb4_general_ci DEFAULT '0',
  `status` varchar(1) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `id_user` int NOT NULL,
  `id_mobil` int DEFAULT NULL,
  PRIMARY KEY (`id_pesanan`),
  KEY `id_mobil` (`id_mobil`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `tbl_pesanan_ibfk_2` FOREIGN KEY (`id_mobil`) REFERENCES `tbl_mobil` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `tbl_pesanan_ibfk_5` FOREIGN KEY (`id_user`) REFERENCES `tbl_akun` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

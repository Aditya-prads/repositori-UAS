-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.18-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for uas_web
CREATE DATABASE IF NOT EXISTS `uas_web` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `uas_web`;

-- Dumping structure for table uas_web.tb_user
CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table uas_web.tb_user: ~3 rows (approximately)
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
REPLACE INTO `tb_user` (`id_user`, `username`, `password`) VALUES
	(1, 'wira', '$2y$10$11ozkSKlDUurVR2e3bvdGurGWv2uqrxClGApj8t0pBnnE9ULWxNcy'),
	(2, 'admin', '$2y$10$15w5WEl0gVtM1/JDAKmySek88wK4T1wrIIkHOhyUYZkV10dvfr1o2'),
	(3, 'administrator', '$2y$10$BSdwXZrvkYvxaTBhbzhMleLfAi7PzoLOLD8Z9IuoB.UZ.lpcsjf42');
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;

-- Dumping structure for table uas_web.tb_pantauan
CREATE TABLE IF NOT EXISTS `tb_pantauan` (
  `id_number` int(5) NOT NULL AUTO_INCREMENT,
  `kode_daerah` char(5) NOT NULL,
  `Nama_daerah` varchar(50) NOT NULL,
  `positif_covid` varchar(100) NOT NULL,
  `dirawat` varchar(100) DEFAULT NULL,
  `sembuh` varchar(15) NOT NULL,
  `meninggal` varchar(100) NOT NULL,
  PRIMARY KEY (`id_number`),
  KEY `kode_daerah` (`kode_daerah`),
  CONSTRAINT `covid` FOREIGN KEY (`kode_daerah`) REFERENCES `covid` (`kode_daerah`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Dumping data for table uas_web.tb_pantauan: ~6 rows (approximately)
/*!40000 ALTER TABLE `tb_pantauan` DISABLE KEYS */;
REPLACE INTO `tb_pantauan` (`id_number`, `kode_daerah`, `nama_daerah`, `positif_covid`, `dirawat`, `sembuh`, `meninggal`) VALUES
	(4, 'JKT', 'JAKARTA', '370.582', '3.463', '357.100', '6.160'),
	(10, 'DPK', 'DEPOK', '200.002', '4.678', '467.200', '5.200'),
	(12, 'DIY', 'JOGJA', '100.300', '2.965', '289.100', '1.500');

/*!40000 ALTER TABLE `tb_pantauan` ENABLE KEYS */;

-- Dumping structure for table uas_web.covid
CREATE TABLE IF NOT EXISTS `covid` (
  `kode_daerah` char(5) NOT NULL,
  `nama_daerah` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kode_daerah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table uas_web.covid: ~2 rows (approximately)
/*!40000 ALTER TABLE `covid` DISABLE KEYS */;
REPLACE INTO `covid` (`kode_daerah`, `nama_daerah`) VALUES
	('JKT', 'JAKARTA'),
	('DPK', 'DEPOK'),
	('DIY', 'JOGJA');
/*!40000 ALTER TABLE `covid` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

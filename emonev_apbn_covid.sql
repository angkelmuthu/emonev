-- --------------------------------------------------------
-- Host:                         128.199.218.111
-- Server version:               10.3.22-MariaDB-1ubuntu1 - Ubuntu 20.04
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for emonev
CREATE DATABASE IF NOT EXISTS `emonev` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `emonev`;

-- Dumping structure for table emonev.m_apbn_covid_alokasi
CREATE TABLE IF NOT EXISTS `m_apbn_covid_alokasi` (
  `id_alokasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_kegiatan` int(11) NOT NULL,
  `kode_satker` varchar(255) NOT NULL,
  `volume` int(11) DEFAULT NULL,
  `alokasi` bigint(18) NOT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_alokasi`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table emonev.m_apbn_covid_kegiatan
CREATE TABLE IF NOT EXISTS `m_apbn_covid_kegiatan` (
  `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kegiatan` varchar(255) NOT NULL,
  PRIMARY KEY (`id_kegiatan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table emonev.t_apbn_covid_realisasi
CREATE TABLE IF NOT EXISTS `t_apbn_covid_realisasi` (
  `id_realisasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_alokasi` int(11) NOT NULL,
  `volume` int(11) DEFAULT NULL,
  `realisasi_persen` int(11) NOT NULL,
  `realisasi_nilai` bigint(18) NOT NULL,
  `id_rincian_hambatan` int(11) DEFAULT NULL,
  `tindak_lanjut` mediumtext DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_realisasi`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

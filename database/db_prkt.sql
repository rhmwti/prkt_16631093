-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 30, 2020 at 03:02 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_prkt`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

DROP TABLE IF EXISTS `barang`;
CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(255) NOT NULL,
  `stok` smallint(5) UNSIGNED NOT NULL,
  `harga` int(10) UNSIGNED NOT NULL,
  `id_jenis` tinyint(3) UNSIGNED NOT NULL,
  `id_satuan` tinyint(3) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_barang`),
  KEY `id_jenis` (`id_jenis`),
  KEY `id_satuan` (`id_satuan`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `stok`, `harga`, `id_jenis`, `id_satuan`) VALUES
(1, 'Indomie Goreng', 212, 2500, 1, 1),
(2, 'Aqua 1 liter', 142, 5000, 2, 2),
(3, 'Pencil 2B', 300, 5000, 3, 5),
(4, 'Bodrex Extra Sakit Kepala', 50, 15000, 4, 4),
(6, 'Kopi Torabica Ice 250ml', 50, 6000, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

DROP TABLE IF EXISTS `jenis`;
CREATE TABLE IF NOT EXISTS `jenis` (
  `id_jenis` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_jenis` varchar(255) NOT NULL,
  PRIMARY KEY (`id_jenis`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`) VALUES
(1, 'Makanan'),
(2, 'Minuman'),
(3, 'ATK'),
(4, 'Obat-obatan');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

DROP TABLE IF EXISTS `satuan`;
CREATE TABLE IF NOT EXISTS `satuan` (
  `id_satuan` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_satuan` varchar(255) NOT NULL,
  PRIMARY KEY (`id_satuan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nama_satuan`) VALUES
(1, 'Bungkus'),
(2, 'Botol'),
(3, 'Kotak'),
(4, 'Strip'),
(5, 'Batang');

-- --------------------------------------------------------

--
-- Table structure for table `stokin`
--

DROP TABLE IF EXISTS `stokin`;
CREATE TABLE IF NOT EXISTS `stokin` (
  `id_stokin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_barang` smallint(5) UNSIGNED NOT NULL,
  `stok` smallint(5) UNSIGNED NOT NULL,
  `waktu` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_stokin`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stokin`
--

INSERT INTO `stokin` (`id_stokin`, `id_barang`, `stok`, `waktu`) VALUES
(1, 1, 10, 1593315318),
(2, 3, 30, 1593315318),
(3, 2, 20, 1593315318),
(4, 1, 100, 1593315554),
(5, 3, 80, 1593315554),
(6, 4, 30, 1593315554);

--
-- Triggers `stokin`
--
DROP TRIGGER IF EXISTS `update_stok`;
DELIMITER $$
CREATE TRIGGER `update_stok` AFTER INSERT ON `stokin` FOR EACH ROW BEGIN
UPDATE barang SET stok=stok+NEW.stok
WHERE id_barang=NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `level` enum('admin','pelanggan') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'admin'),
(2, 'pelanggan', '7f78f06d2d1262a0a222ca9834b15d9d', 'Pelanggan 01', 'pelanggan');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id_jenis`),
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

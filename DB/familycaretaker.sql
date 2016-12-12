-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 12, 2016 at 03:17 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `familycaretaker`
--

-- --------------------------------------------------------

--
-- Table structure for table `bacsi`
--

CREATE TABLE IF NOT EXISTS `bacsi` (
  `bacsi_id` int(11) NOT NULL AUTO_INCREMENT,
  `hodem` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ten` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sdt` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mota` text COLLATE utf8_unicode_ci,
  `danhgia` tinyint(4) DEFAULT NULL,
  `khoa_id` int(11) NOT NULL,
  PRIMARY KEY (`bacsi_id`),
  KEY `khoa_id` (`khoa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `benhvien`
--

CREATE TABLE IF NOT EXISTS `benhvien` (
  `benhvien_id` int(11) NOT NULL AUTO_INCREMENT,
  `benhvien` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mota` text COLLATE utf8_unicode_ci,
  `danhgia` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`benhvien_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE IF NOT EXISTS `khoa` (
  `khoa_id` int(11) NOT NULL AUTO_INCREMENT,
  `khoa` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mota` text COLLATE utf8_unicode_ci,
  `benhvien_id` int(11) NOT NULL,
  PRIMARY KEY (`khoa_id`),
  KEY `benhvien_id` (`benhvien_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lichsukhambenh`
--

CREATE TABLE IF NOT EXISTS `lichsukhambenh` (
  `lichsu_id` int(11) NOT NULL AUTO_INCREMENT,
  `ngaykham` date DEFAULT NULL,
  `chandoan` text COLLATE utf8_unicode_ci,
  `ketqua` text COLLATE utf8_unicode_ci,
  `donthuoc` text COLLATE utf8_unicode_ci,
  `thanhvien_id` int(11) NOT NULL,
  PRIMARY KEY (`lichsu_id`),
  KEY `thanhvien_id` (`thanhvien_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE IF NOT EXISTS `taikhoan` (
  `taikhoan_id` int(11) NOT NULL AUTO_INCREMENT,
  `taikhoan` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `hodem` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ten` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diem` int(11) DEFAULT NULL,
  `phanquyen` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`taikhoan_id`),
  UNIQUE KEY `taikhoan` (`taikhoan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `thanhvien`
--

CREATE TABLE IF NOT EXISTS `thanhvien` (
  `thanhvien_id` int(11) NOT NULL AUTO_INCREMENT,
  `hodem` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ten` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `gioitinh` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cmt` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sdt` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `taikhoan_id` int(11) NOT NULL,
  PRIMARY KEY (`thanhvien_id`),
  KEY `taikhoan_id` (`taikhoan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `trieuchung`
--

CREATE TABLE IF NOT EXISTS `trieuchung` (
  `trieuchung_id` int(11) NOT NULL AUTO_INCREMENT,
  `trieuchung` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`trieuchung_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `trieuchung_benh`
--

CREATE TABLE IF NOT EXISTS `trieuchung_benh` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trieuchung_id` int(11) DEFAULT NULL,
  `lichsu_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lichsu_id` (`lichsu_id`),
  KEY `trieuchung_id` (`trieuchung_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bacsi`
--
ALTER TABLE `bacsi`
  ADD CONSTRAINT `bacsi_ibfk_1` FOREIGN KEY (`khoa_id`) REFERENCES `khoa` (`khoa_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `khoa`
--
ALTER TABLE `khoa`
  ADD CONSTRAINT `khoa_ibfk_1` FOREIGN KEY (`benhvien_id`) REFERENCES `benhvien` (`benhvien_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lichsukhambenh`
--
ALTER TABLE `lichsukhambenh`
  ADD CONSTRAINT `lichsukhambenh_ibfk_1` FOREIGN KEY (`thanhvien_id`) REFERENCES `thanhvien` (`thanhvien_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD CONSTRAINT `thanhvien_ibfk_1` FOREIGN KEY (`taikhoan_id`) REFERENCES `taikhoan` (`taikhoan_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trieuchung_benh`
--
ALTER TABLE `trieuchung_benh`
  ADD CONSTRAINT `trieuchung_benh_ibfk_1` FOREIGN KEY (`lichsu_id`) REFERENCES `lichsukhambenh` (`lichsu_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trieuchung_benh_ibfk_2` FOREIGN KEY (`trieuchung_id`) REFERENCES `trieuchung` (`trieuchung_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

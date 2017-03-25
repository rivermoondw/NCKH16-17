/*
SQLyog Ultimate v11.11 (32 bit)
MySQL - 5.5.5-10.1.21-MariaDB : Database - famylicaretaker
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`famylicaretaker` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `famylicaretaker`;

/*Table structure for table `bacsi` */

DROP TABLE IF EXISTS `bacsi`;

CREATE TABLE `bacsi` (
  `bacsi_id` int(11) NOT NULL AUTO_INCREMENT,
  `hoten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `mota` text COLLATE utf8_unicode_ci NOT NULL,
  `like` int(11) NOT NULL,
  `khoa_id` int(11) NOT NULL,
  `thanhpho_id` int(11) NOT NULL,
  `huyen_id` int(11) NOT NULL,
  `xa_id` int(11) NOT NULL,
  `diachi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`bacsi_id`),
  KEY `khoa_id` (`khoa_id`),
  KEY `thanhpho_id` (`thanhpho_id`),
  KEY `huyen_id` (`huyen_id`),
  KEY `xa_id` (`xa_id`),
  CONSTRAINT `bacsi_ibfk_1` FOREIGN KEY (`khoa_id`) REFERENCES `khoa` (`khoa_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `bacsi_ibfk_2` FOREIGN KEY (`thanhpho_id`) REFERENCES `thanhpho` (`thanhpho_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `bacsi_ibfk_3` FOREIGN KEY (`huyen_id`) REFERENCES `huyen` (`huyen_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `bacsi_ibfk_4` FOREIGN KEY (`xa_id`) REFERENCES `xa` (`xa_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `bacsi` */

/*Table structure for table `benhvien` */

DROP TABLE IF EXISTS `benhvien`;

CREATE TABLE `benhvien` (
  `benhvien_id` int(11) NOT NULL AUTO_INCREMENT,
  `benhvien` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mota` text COLLATE utf8_unicode_ci NOT NULL,
  `like` int(11) NOT NULL,
  `thanhpho_id` int(11) NOT NULL,
  `huyen_id` int(11) NOT NULL,
  `xa_id` int(11) NOT NULL,
  PRIMARY KEY (`benhvien_id`),
  KEY `thanhpho_id` (`thanhpho_id`),
  KEY `huyen_id` (`huyen_id`),
  KEY `xa_id` (`xa_id`),
  CONSTRAINT `benhvien_ibfk_1` FOREIGN KEY (`thanhpho_id`) REFERENCES `thanhpho` (`thanhpho_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `benhvien_ibfk_2` FOREIGN KEY (`huyen_id`) REFERENCES `huyen` (`huyen_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `benhvien_ibfk_3` FOREIGN KEY (`xa_id`) REFERENCES `xa` (`xa_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `benhvien` */

/*Table structure for table `chitietlskb` */

DROP TABLE IF EXISTS `chitietlskb`;

CREATE TABLE `chitietlskb` (
  `chitiet_id` int(11) NOT NULL AUTO_INCREMENT,
  `lskb_d` int(11) NOT NULL,
  `trieuchung_id` int(11) NOT NULL,
  PRIMARY KEY (`chitiet_id`),
  KEY `lskb_d` (`lskb_d`),
  KEY `trieuchung_id` (`trieuchung_id`),
  CONSTRAINT `chitietlskb_ibfk_1` FOREIGN KEY (`lskb_d`) REFERENCES `lskb` (`lskb_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `chitietlskb_ibfk_2` FOREIGN KEY (`trieuchung_id`) REFERENCES `trieuchung` (`trieuchung_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `chitietlskb` */

/*Table structure for table `ci_sessions` */

DROP TABLE IF EXISTS `ci_sessions`;

CREATE TABLE `ci_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `ci_sessions` */

insert  into `ci_sessions`(`id`,`ip_address`,`timestamp`,`data`) values ('32obe9ssqa1bccnf1q5tl97jnqi6hr6c','::1',1489811708,'__ci_last_regenerate|i:1489811708;'),('pg5eg9e815hsv5qtl5ieqmqariq5ctsl','::1',1489817751,'__ci_last_regenerate|i:1489817542;');

/*Table structure for table `giadinh` */

DROP TABLE IF EXISTS `giadinh`;

CREATE TABLE `giadinh` (
  `giadinh_id` int(11) NOT NULL AUTO_INCREMENT,
  `giadinh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mota` text COLLATE utf8_unicode_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  PRIMARY KEY (`giadinh_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `giadinh` */

/*Table structure for table `groups` */

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `groups` */

insert  into `groups`(`id`,`name`,`description`) values (1,'admin','Administrator'),(2,'members','General User');

/*Table structure for table `huyen` */

DROP TABLE IF EXISTS `huyen`;

CREATE TABLE `huyen` (
  `huyen_id` int(11) NOT NULL AUTO_INCREMENT,
  `huyen` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`huyen_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `huyen` */

/*Table structure for table `khoa` */

DROP TABLE IF EXISTS `khoa`;

CREATE TABLE `khoa` (
  `khoa_id` int(11) NOT NULL AUTO_INCREMENT,
  `tenkhoa` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mota` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`khoa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `khoa` */

/*Table structure for table `login_attempts` */

DROP TABLE IF EXISTS `login_attempts`;

CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `login_attempts` */

/*Table structure for table `lskb` */

DROP TABLE IF EXISTS `lskb`;

CREATE TABLE `lskb` (
  `lskb_id` int(11) NOT NULL AUTO_INCREMENT,
  `tieude` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngaykham` date NOT NULL,
  `chandoan` text COLLATE utf8_unicode_ci NOT NULL,
  `ketqua` text COLLATE utf8_unicode_ci NOT NULL,
  `hinhanh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngaynhap` date NOT NULL,
  `taikhoan_id` int(11) NOT NULL,
  PRIMARY KEY (`lskb_id`),
  KEY `taikhoan_id` (`taikhoan_id`),
  CONSTRAINT `lskb_ibfk_1` FOREIGN KEY (`taikhoan_id`) REFERENCES `taikhoan` (`taikhoan_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `lskb` */

/*Table structure for table `taikhoan` */

DROP TABLE IF EXISTS `taikhoan`;

CREATE TABLE `taikhoan` (
  `taikhoan_id` int(11) NOT NULL AUTO_INCREMENT,
  `taikhoan` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `hoten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `giadinh_id` int(11) NOT NULL,
  `thanhpho_id` int(11) NOT NULL,
  `huyen_id` int(11) NOT NULL,
  `xa_id` int(11) NOT NULL,
  PRIMARY KEY (`taikhoan_id`),
  KEY `giadinh_id` (`giadinh_id`),
  KEY `taikhoan_ibfk_2` (`huyen_id`),
  KEY `taikhoan_ibfk_3` (`thanhpho_id`),
  KEY `taikhoan_ibfk_4` (`xa_id`),
  CONSTRAINT `taikhoan_ibfk_1` FOREIGN KEY (`giadinh_id`) REFERENCES `giadinh` (`giadinh_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `taikhoan_ibfk_2` FOREIGN KEY (`huyen_id`) REFERENCES `huyen` (`huyen_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `taikhoan_ibfk_3` FOREIGN KEY (`thanhpho_id`) REFERENCES `thanhpho` (`thanhpho_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `taikhoan_ibfk_4` FOREIGN KEY (`xa_id`) REFERENCES `xa` (`xa_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `taikhoan` */

/*Table structure for table `thanhpho` */

DROP TABLE IF EXISTS `thanhpho`;

CREATE TABLE `thanhpho` (
  `thanhpho_id` int(11) NOT NULL AUTO_INCREMENT,
  `thanhpho` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`thanhpho_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `thanhpho` */

/*Table structure for table `trieuchung` */

DROP TABLE IF EXISTS `trieuchung`;

CREATE TABLE `trieuchung` (
  `trieuchung_id` int(11) NOT NULL AUTO_INCREMENT,
  `trieuchung` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`trieuchung_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `trieuchung` */

/*Table structure for table `users_groups` */

DROP TABLE IF EXISTS `users_groups`;

CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `taikhoan_id` int(11) NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`taikhoan_id`,`group_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `users_groups_ibfk_1` FOREIGN KEY (`taikhoan_id`) REFERENCES `taikhoan` (`taikhoan_id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `users_groups` */

/*Table structure for table `xa` */

DROP TABLE IF EXISTS `xa`;

CREATE TABLE `xa` (
  `xa_id` int(11) NOT NULL AUTO_INCREMENT,
  `xa` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`xa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `xa` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

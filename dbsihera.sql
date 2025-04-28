/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 8.0.30 : Database - sihera
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sihera` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `sihera`;

/*Table structure for table `tbl_aktifitas_fisik` */

DROP TABLE IF EXISTS `tbl_aktifitas_fisik`;

CREATE TABLE `tbl_aktifitas_fisik` (
  `idaktifitas` char(20) NOT NULL,
  `fisikidpasien` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fisikjenisaktifitas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fisikdurasi` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idaktifitas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tbl_aktifitas_fisik` */

insert  into `tbl_aktifitas_fisik`(`idaktifitas`,`fisikidpasien`,`fisikjenisaktifitas`,`fisikdurasi`,`created_at`,`updated_at`) values 
('AF001','PS26042025001','1',30,'2028-04-25 17:49:15','2028-04-25 17:53:32');

/*Table structure for table `tbl_catatan_bb` */

DROP TABLE IF EXISTS `tbl_catatan_bb`;

CREATE TABLE `tbl_catatan_bb` (
  `idbb` char(20) NOT NULL,
  `bbidpasien` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `bbsebelumhd` int NOT NULL,
  `bbsesudahhd` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idbb`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tbl_catatan_bb` */

/*Table structure for table `tbl_catatan_diet` */

DROP TABLE IF EXISTS `tbl_catatan_diet`;

CREATE TABLE `tbl_catatan_diet` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `dietidpasien` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `diettanggal` date NOT NULL,
  `dietprotein` int NOT NULL,
  `dietnatrium` int NOT NULL,
  `dietkalsium` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tbl_catatan_diet` */

/*Table structure for table `tbl_catatan_urine` */

DROP TABLE IF EXISTS `tbl_catatan_urine`;

CREATE TABLE `tbl_catatan_urine` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `urineidpasien` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `urinetanggal` date NOT NULL,
  `urinevolume` int NOT NULL,
  `urinefrekuensi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `urinewarna` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `urinekonsistensi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tbl_catatan_urine` */

/*Table structure for table `tbl_dokter` */

DROP TABLE IF EXISTS `tbl_dokter`;

CREATE TABLE `tbl_dokter` (
  `iddokter` char(15) NOT NULL,
  `namadokter` varchar(255) DEFAULT NULL,
  `tgllahirdokter` date DEFAULT NULL,
  `alamatdokter` varchar(255) DEFAULT NULL,
  `spesialisdokter` varchar(255) DEFAULT NULL,
  `gambardokter` varchar(255) DEFAULT NULL,
  `nohpdokter` char(15) DEFAULT NULL,
  PRIMARY KEY (`iddokter`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tbl_dokter` */

/*Table structure for table `tbl_edukasi` */

DROP TABLE IF EXISTS `tbl_edukasi`;

CREATE TABLE `tbl_edukasi` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `topik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `deskripsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sumber` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tbl_edukasi` */

/*Table structure for table `tbl_jadwal_hemodialisa` */

DROP TABLE IF EXISTS `tbl_jadwal_hemodialisa`;

CREATE TABLE `tbl_jadwal_hemodialisa` (
  `idjadwal` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `idpasien` char(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `jadwal` date DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  PRIMARY KEY (`idjadwal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tbl_jadwal_hemodialisa` */

insert  into `tbl_jadwal_hemodialisa`(`idjadwal`,`idpasien`,`jadwal`,`waktu`) values 
('JH28042025001','PS26042025001','2025-04-29','10:00:00');

/*Table structure for table `tbl_konsultasi` */

DROP TABLE IF EXISTS `tbl_konsultasi`;

CREATE TABLE `tbl_konsultasi` (
  `idgroup` varchar(20) NOT NULL,
  `namagroup` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `anggota` int NOT NULL,
  `topikdiskusi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idgroup`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tbl_konsultasi` */

insert  into `tbl_konsultasi`(`idgroup`,`namagroup`,`anggota`,`topikdiskusi`,`created_at`,`updated_at`) values 
('G001','Hidup Sehat dengan CKD',15,'Olahraga Aman untuk Pasien CKD','2028-04-25 18:33:50','2028-04-25 18:34:04');

/*Table structure for table `tbl_master_aktifitas` */

DROP TABLE IF EXISTS `tbl_master_aktifitas`;

CREATE TABLE `tbl_master_aktifitas` (
  `idjenis` bigint NOT NULL AUTO_INCREMENT,
  `jenisaktifitas` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`idjenis`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tbl_master_aktifitas` */

insert  into `tbl_master_aktifitas`(`idjenis`,`jenisaktifitas`) values 
(1,'Jalan kaki'),
(2,'Stretching'),
(3,'Relaksasi'),
(4,'Aktivitas Fungsional');

/*Table structure for table `tbl_pasien` */

DROP TABLE IF EXISTS `tbl_pasien`;

CREATE TABLE `tbl_pasien` (
  `id` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nik` char(20) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `usia` int DEFAULT NULL,
  `tgllahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `jenkel` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `beratbadan` char(10) DEFAULT NULL,
  `tinggibadan` char(10) DEFAULT NULL,
  `alamat` text,
  `nohp` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tbl_pasien` */

insert  into `tbl_pasien`(`id`,`nik`,`nama`,`usia`,`tgllahir`,`jenkel`,`beratbadan`,`tinggibadan`,`alamat`,`nohp`) values 
('PS26042025001','3333333333333333','Sana',25,'04-26-2000','Perempuan','55','165','adasdad','084651'),
('PS28042025002','1111111111111111','Boy',28,'1991-01-01','Laki-Laki','55','165','Payakumbuh','+62');

/*Table structure for table `tbl_pembatasan_cairan` */

DROP TABLE IF EXISTS `tbl_pembatasan_cairan`;

CREATE TABLE `tbl_pembatasan_cairan` (
  `idpembatasan` char(10) NOT NULL,
  `idpasienpembatasan` char(10) DEFAULT NULL,
  `tglpembatasan` date DEFAULT NULL,
  `asupancairan` char(10) DEFAULT NULL,
  `targetmaksimal` char(10) DEFAULT NULL,
  PRIMARY KEY (`idpembatasan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tbl_pembatasan_cairan` */

/*Table structure for table `tbl_role` */

DROP TABLE IF EXISTS `tbl_role`;

CREATE TABLE `tbl_role` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name_role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tbl_role` */

insert  into `tbl_role`(`id`,`name_role`) values 
(1,'Admin'),
(2,'Pimpinan'),
(3,'Pasien');

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `role` enum('1','2','3') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL COMMENT '1 = Admin, 2=Pimpinan, 3= Pasien',
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `statusakses` varchar(5) NOT NULL COMMENT 'T = Tidak Aktif\r\nY = Aktif',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`id`,`username`,`nama`,`role`,`email`,`password`,`statusakses`,`created_at`,`updated_at`) values 
(1,'admin','Admin','2','admin@gmail.com','$2y$10$OZeS0QB5ncTzVAjpev0Y1.Ujz4yHZhOjwew3ewO8.RN/jt1BKImmi','Y','2024-07-15 15:07:52',NULL),
(3,'PS26042025001','Sana','3','sana@gmail.com','$2y$10$3ARupgwus0rLkXr4D3zcaucfcohrcDWIMhnpqkuRzscTJ7TELcLpq','Y',NULL,NULL),
(5,'PS28042025002','Boy','3','boy@gmail.com','$2y$10$l4DA46I52uhKfZEg0E7NU.qgbHPIj5lDZFVaZRITHrXNmGaQFKL4e','Y','0000-00-00 00:00:00',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

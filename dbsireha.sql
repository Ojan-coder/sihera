/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 8.0.30 : Database - sireha
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sireha` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `sireha`;

/*Table structure for table `tbl_aktifitas_fisik` */

DROP TABLE IF EXISTS `tbl_aktifitas_fisik`;

CREATE TABLE `tbl_aktifitas_fisik` (
  `idaktifitas` char(20) NOT NULL,
  `fisikidpasien` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fisikjenisaktifitas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fisiktanggal` date DEFAULT NULL,
  `fisikdurasi` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idaktifitas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tbl_aktifitas_fisik` */

insert  into `tbl_aktifitas_fisik`(`idaktifitas`,`fisikidpasien`,`fisikjenisaktifitas`,`fisiktanggal`,`fisikdurasi`,`created_at`,`updated_at`) values 
('AF001','P004','1','2025-05-15',30,'2025-05-15 12:44:25',NULL);

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

insert  into `tbl_catatan_bb`(`idbb`,`bbidpasien`,`bbsebelumhd`,`bbsesudahhd`,`created_at`,`updated_at`) values 
('BB001','P004',60,55,'2015-05-25 02:01:31',NULL),
('BB002','P003',22,22,'2015-05-25 02:02:34',NULL);

/*Table structure for table `tbl_catatan_diet` */

DROP TABLE IF EXISTS `tbl_catatan_diet`;

CREATE TABLE `tbl_catatan_diet` (
  `iddiet` varchar(20) NOT NULL,
  `dietidpasien` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `diettanggal` date NOT NULL,
  `dietprogram` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`iddiet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tbl_catatan_diet` */

insert  into `tbl_catatan_diet`(`iddiet`,`dietidpasien`,`diettanggal`,`dietprogram`,`created_at`,`updated_at`) values 
('D001','P003','2025-05-15','Diit Penyakit Ginjal Kronis (CKD),Diit Diabetes Mellitus','2015-05-25 16:09:27',NULL);

/*Table structure for table `tbl_catatan_urine` */

DROP TABLE IF EXISTS `tbl_catatan_urine`;

CREATE TABLE `tbl_catatan_urine` (
  `idurine` char(20) NOT NULL,
  `urineidpasien` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `urinetanggal` date NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`idurine`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tbl_catatan_urine` */

insert  into `tbl_catatan_urine`(`idurine`,`urineidpasien`,`urinetanggal`,`created_at`,`updated_at`) values 
('UR14052025003','P004','2025-05-14','2014-05-25',NULL),
('UR30042025001','P004','2025-04-30','2030-04-25',NULL),
('UR30042025002','P002','2025-04-30','2030-04-25',NULL);

/*Table structure for table `tbl_detail_catatan_diet` */

DROP TABLE IF EXISTS `tbl_detail_catatan_diet`;

CREATE TABLE `tbl_detail_catatan_diet` (
  `id` int NOT NULL AUTO_INCREMENT,
  `detail_iddiet` varchar(20) DEFAULT NULL,
  `detail_idpasien` varchar(20) DEFAULT NULL,
  `detail_diettanggal` date DEFAULT NULL,
  `detail_ketwaktu` enum('Pagi','Siang','Malam') DEFAULT NULL,
  `detail_porsi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tbl_detail_catatan_diet` */

/*Table structure for table `tbl_detail_catatan_urine` */

DROP TABLE IF EXISTS `tbl_detail_catatan_urine`;

CREATE TABLE `tbl_detail_catatan_urine` (
  `id` int NOT NULL AUTO_INCREMENT,
  `detail_idurine` varchar(20) DEFAULT NULL,
  `detail_idpasien` varchar(20) DEFAULT NULL,
  `detail_urinetanggal` date DEFAULT NULL,
  `detail_urinevolume` varchar(20) DEFAULT NULL,
  `detail_urinewarna` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tbl_detail_catatan_urine` */

insert  into `tbl_detail_catatan_urine`(`id`,`detail_idurine`,`detail_idpasien`,`detail_urinetanggal`,`detail_urinevolume`,`detail_urinewarna`) values 
(1,'UR14052025003','P004','2025-05-14','20','1'),
(2,'UR14052025003','P004','2025-05-14','12','1');

/*Table structure for table `tbl_detail_pembatasan_cairan` */

DROP TABLE IF EXISTS `tbl_detail_pembatasan_cairan`;

CREATE TABLE `tbl_detail_pembatasan_cairan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `detail_idpembatasan` varchar(20) DEFAULT NULL,
  `detail_tanggal` date DEFAULT NULL,
  `detail_pasien` varchar(20) DEFAULT NULL,
  `detail_asupanhari` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tbl_detail_pembatasan_cairan` */

insert  into `tbl_detail_pembatasan_cairan`(`id`,`detail_idpembatasan`,`detail_tanggal`,`detail_pasien`,`detail_asupanhari`) values 
(1,'PC001','2025-05-12','P002',100),
(2,'PC001','2025-05-12','P002',50);

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

insert  into `tbl_dokter`(`iddokter`,`namadokter`,`tgllahirdokter`,`alamatdokter`,`spesialisdokter`,`gambardokter`,`nohpdokter`) values 
('ID30042025001','Fauzan','1995-01-01','Padang','Ahli Bedah Tangan','1745983494_e76d704ec308eddfefef.png','+628116653442'),
('ID30042025002','Bayu','1996-02-02','Padang','Ahli Jantung','1745985479_9fccf40416fa304180ca.png','+6283181005832');

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
('JH01052025002','P001','2025-05-07','11:00:00'),
('JH12052025003','P001','2025-05-14','08:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tbl_master_aktifitas` */

insert  into `tbl_master_aktifitas`(`idjenis`,`jenisaktifitas`) values 
(1,'Berjalan Kaki ( Walk )'),
(2,'Sepeda Statis  ( Stationary Bike )'),
(3,'Yoga Ringan atau Stretching'),
(4,'Senam Duduk ( Chair Exercise )'),
(5,'Latihan Pernapasan Dalam');

/*Table structure for table `tbl_master_diet` */

DROP TABLE IF EXISTS `tbl_master_diet`;

CREATE TABLE `tbl_master_diet` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenis_diet` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tbl_master_diet` */

insert  into `tbl_master_diet`(`id`,`jenis_diet`) values 
(1,'Diit Penyakit Ginjal Kronis (CKD)'),
(2,'Diit Diabetes Mellitus'),
(3,'Diit Hipertensi'),
(4,'Diit Penyakit Jantung'),
(5,'Diit Dislipidemia'),
(6,'Diit Asam Urat / Gout'),
(7,'Diit Penyakit Lambung'),
(8,'Diit Penyakit Paru Kronis'),
(9,'Lainnya.....');

/*Table structure for table `tbl_master_makan` */

DROP TABLE IF EXISTS `tbl_master_makan`;

CREATE TABLE `tbl_master_makan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenis_makan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tbl_master_makan` */

insert  into `tbl_master_makan`(`id`,`jenis_makan`) values 
(1,'1 Porsi'),
(2,'1/2 Porsi'),
(3,'1/4 Porsi'),
(4,'Tidak Mau Makan');

/*Table structure for table `tbl_master_urine` */

DROP TABLE IF EXISTS `tbl_master_urine`;

CREATE TABLE `tbl_master_urine` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenisurine` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tbl_master_urine` */

insert  into `tbl_master_urine`(`id`,`jenisurine`) values 
(1,'Bening / Sangat Pucat'),
(2,'Kuning Muda'),
(3,'Kuning Tua'),
(4,'Orange'),
(5,'Merah / Merah Muda'),
(6,'Cokelat'),
(7,'Keruh / Berbusa');

/*Table structure for table `tbl_pasien` */

DROP TABLE IF EXISTS `tbl_pasien`;

CREATE TABLE `tbl_pasien` (
  `id` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nik` char(20) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `usia` int DEFAULT NULL,
  `tgllahir` date DEFAULT NULL,
  `jenkel` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `beratbadan` char(10) DEFAULT NULL,
  `tinggibadan` char(10) DEFAULT NULL,
  `alamat` text,
  `nohp` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tbl_pasien` */

insert  into `tbl_pasien`(`id`,`nik`,`nama`,`usia`,`tgllahir`,`jenkel`,`beratbadan`,`tinggibadan`,`alamat`,`nohp`) values 
('P001','1111111111111111','Novi',25,'2000-04-04','Perempuan','55','160','Sijunjung','+62831810058'),
('P002','2222222222222222','Ojan',26,'1999-07-30','Laki-Laki','60','167','Padang','+62811665344'),
('P003','3333333333333333','Ilhamsyah',28,'1997-09-30','Laki-Laki','66','158','Padang','+62838473784'),
('P004','4444444444444444','Sana',25,'2000-04-30','Perempuan','50','165','Padang','+62812660534');

/*Table structure for table `tbl_pembatasan_cairan` */

DROP TABLE IF EXISTS `tbl_pembatasan_cairan`;

CREATE TABLE `tbl_pembatasan_cairan` (
  `idpembatasan` char(10) NOT NULL,
  `idpasienpembatasan` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tglpembatasan` date DEFAULT NULL,
  `targetmaksimal` char(10) DEFAULT NULL,
  PRIMARY KEY (`idpembatasan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tbl_pembatasan_cairan` */

insert  into `tbl_pembatasan_cairan`(`idpembatasan`,`idpasienpembatasan`,`tglpembatasan`,`targetmaksimal`) values 
('PC001','P002','2025-05-12','500');

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`id`,`username`,`nama`,`role`,`email`,`password`,`statusakses`,`created_at`,`updated_at`) values 
(1,'admin','Admin','2','admin@gmail.com','$2y$10$OZeS0QB5ncTzVAjpev0Y1.Ujz4yHZhOjwew3ewO8.RN/jt1BKImmi','Y','2025-04-30 21:40:00',NULL),
(7,'P001','Novi','3','novi@gmail.com','$2y$10$7ch6ql47G9YifAazM1nYiuwuLMBAULj/JN7eO3CW.BSfS1yxejzHa','Y','2025-04-30 21:40:11',NULL),
(8,'P002','Ojan','3','fauzan@gmail.com','$2y$10$c2EJK4vVTi7WzYXTNewFYuqnzKVEBjl/SR0ia9ScE2Fw9R7id2DqW','Y','2025-04-30 21:40:13',NULL),
(9,'P003','Ilhamsyah','3','ilham@gmail.com','$2y$10$UA2JOBOsZTSeuCzYVNG/6.3cCMzuJsAHL/EH7iZfOO0z/iM4GFU02','Y','2025-04-30 21:42:44',NULL),
(13,'P004','Sana','3','sana@gmail.com','$2y$10$S.oWe0dx5aUf6HHbiDz0zOJsA31SbcIv3UiewQwKVWxQM3rv6p7Pq','Y','2025-04-30 21:55:14',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

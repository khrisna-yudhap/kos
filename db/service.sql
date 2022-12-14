/*
SQLyog Ultimate
MySQL - 10.1.37-MariaDB : Database - service
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `acm_aksi` */

CREATE TABLE `acm_aksi` (
  `AksiId` int(3) NOT NULL AUTO_INCREMENT,
  `AksiName` char(100) DEFAULT NULL,
  `AksiFungsi` char(250) DEFAULT NULL,
  PRIMARY KEY (`AksiId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `acm_aksi` */

insert  into `acm_aksi`(`AksiId`,`AksiName`,`AksiFungsi`) values 
(1,'Lihat','index'),
(2,'Tambah','add'),
(3,'Ubah','update'),
(4,'Hapus','delete'),
(5,'Detail','detail'),
(6,'Cetak','print'),
(7,'Import','import');

/*Table structure for table `acm_group` */

CREATE TABLE `acm_group` (
  `GroupId` int(3) NOT NULL AUTO_INCREMENT,
  `GroupName` char(150) DEFAULT NULL,
  `GroupDescription` char(255) DEFAULT NULL,
  PRIMARY KEY (`GroupId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `acm_group` */

insert  into `acm_group`(`GroupId`,`GroupName`,`GroupDescription`) values 
(1,'Administrator','Administrator');

/*Table structure for table `acm_group_menu_aksi` */

CREATE TABLE `acm_group_menu_aksi` (
  `GroupMenuMenuAksiId` int(3) DEFAULT NULL,
  `GroupMenuGroupId` int(3) DEFAULT NULL,
  `GroupMenuSegmen` varchar(250) DEFAULT NULL,
  KEY `FK_ci_group_menu_dummy_menu` (`GroupMenuMenuAksiId`),
  KEY `FK_ci_group_menu_aksi` (`GroupMenuGroupId`),
  KEY `segen` (`GroupMenuSegmen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `acm_group_menu_aksi` */

insert  into `acm_group_menu_aksi`(`GroupMenuMenuAksiId`,`GroupMenuGroupId`,`GroupMenuSegmen`) values 
(1,2,'#/index'),
(2,2,'sistem/user/index'),
(3,2,'sistem/user/add'),
(4,2,'sistem/user/update'),
(5,2,'sistem/user/delete'),
(6,2,'sistem/group/index'),
(7,2,'sistem/group/add'),
(8,2,'sistem/group/update'),
(9,2,'sistem/group/delete'),
(10,2,'sistem/menu/index'),
(11,2,'sistem/menu/add'),
(12,2,'sistem/menu/update'),
(13,2,'sistem/menu/delete'),
(14,2,'sistem/authentikasi/index'),
(16,2,'sistem/authentikasi/update'),
(18,2,'sistem/profile/index'),
(19,2,'sistem/profile/update'),
(20,2,'sistem/password/index'),
(21,2,'sistem/password/update'),
(22,2,'new/module/index'),
(23,2,'new/module/add'),
(24,2,'new/module/update'),
(25,2,'new/module/delete'),
(29,2,'/index'),
(1,1,'#/index'),
(2,1,'sistem/user/index'),
(3,1,'sistem/user/add'),
(4,1,'sistem/user/update'),
(5,1,'sistem/user/delete'),
(6,1,'sistem/group/index'),
(7,1,'sistem/group/add'),
(8,1,'sistem/group/update'),
(9,1,'sistem/group/delete'),
(10,1,'sistem/menu/index'),
(11,1,'sistem/menu/add'),
(12,1,'sistem/menu/update'),
(13,1,'sistem/menu/delete'),
(14,1,'sistem/authentikasi/index'),
(16,1,'sistem/authentikasi/update'),
(18,1,'sistem/profile/index'),
(19,1,'sistem/profile/update'),
(20,1,'sistem/password/index'),
(21,1,'sistem/password/update'),
(29,1,'home/index'),
(59,1,'#/index'),
(66,1,'master/jenis_ref_billing/index'),
(71,1,'master/jenis_ref_billing/add'),
(72,1,'master/jenis_ref_billing/update'),
(73,1,'master/jenis_ref_billing/delete'),
(77,1,'master/kategori_ref_billing/index'),
(78,1,'master/kategori_ref_billing/add'),
(79,1,'master/kategori_ref_billing/update'),
(80,1,'master/kategori_ref_billing/delete'),
(83,1,'master/ref_billing/index'),
(84,1,'master/ref_billing/add'),
(85,1,'master/ref_billing/update'),
(86,1,'master/ref_billing/delete'),
(90,1,'master/api/index'),
(91,1,'master/api/add'),
(92,1,'master/api/update'),
(93,1,'master/api/delete'),
(97,1,'master/pengakses/index'),
(98,1,'master/pengakses/add'),
(99,1,'master/pengakses/update'),
(100,1,'master/pengakses/delete'),
(104,1,'master/parameter_api/index'),
(105,1,'master/parameter_api/add'),
(106,1,'master/parameter_api/update'),
(107,1,'master/parameter_api/delete'),
(111,1,'master/akses_api/index'),
(112,1,'master/akses_api/add'),
(113,1,'master/akses_api/update'),
(114,1,'master/akses_api/delete');

/*Table structure for table `acm_menu` */

CREATE TABLE `acm_menu` (
  `MenuId` int(3) NOT NULL AUTO_INCREMENT,
  `MenuParentId` int(3) DEFAULT NULL,
  `MenuName` varchar(50) DEFAULT NULL,
  `MenuModule` varchar(50) DEFAULT NULL,
  `MenuIsShow` enum('1','0') DEFAULT NULL,
  `MenuIcon` char(50) DEFAULT NULL,
  `MenuOrder` int(2) DEFAULT NULL,
  `MenuParent` varchar(50) DEFAULT NULL,
  `MenuFavorite` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`MenuId`),
  UNIQUE KEY `MenuName` (`MenuName`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `acm_menu` */

insert  into `acm_menu`(`MenuId`,`MenuParentId`,`MenuName`,`MenuModule`,`MenuIsShow`,`MenuIcon`,`MenuOrder`,`MenuParent`,`MenuFavorite`) values 
(1,0,'Sistem','#','1','fa fa-cog',1,'sistem',NULL),
(2,1,'User','sistem/user','1','',2,'sistem',NULL),
(3,1,'Group','sistem/group','1','',1,'sistem',NULL),
(4,1,'Menu','sistem/menu','1','',3,'sistem',NULL),
(5,1,'Hak Akses','sistem/authentikasi','1',NULL,4,'sistem',NULL),
(6,1,'Profile','sistem/profile','0',NULL,5,'sistem',NULL),
(7,1,'Password','sistem/password','0',NULL,6,'sistem',NULL),
(10,0,'Home','home','1','fa fa-th-large',0,'home',NULL),
(12,0,'Master','#','1','fa fa-cogs',3,'master',NULL),
(13,12,'Jenis Ref Billing','master/jenis_ref_billing','1',NULL,0,'master',NULL),
(14,12,'Kategori Ref Billing','master/kategori_ref_billing','1',NULL,0,'master',NULL),
(18,12,'Ref Billing','master/ref_billing','1',NULL,0,'Master',NULL),
(19,12,'API','master/api','1',NULL,0,'Master',NULL),
(20,12,'Pengakses','master/pengakses','1',NULL,0,'Master',NULL),
(21,12,'Parameter API','master/parameter_api','1',NULL,0,'Master',NULL),
(22,12,'Akses API','master/akses_api','1',NULL,0,'Master',NULL);

/*Table structure for table `acm_menu_aksi` */

CREATE TABLE `acm_menu_aksi` (
  `MenuAksiId` int(6) NOT NULL AUTO_INCREMENT,
  `MenuAksiMenuId` int(6) DEFAULT NULL,
  `MenuAksiAksiId` int(3) DEFAULT NULL,
  PRIMARY KEY (`MenuAksiId`),
  KEY `FK_ci_dummy_menu_aksi` (`MenuAksiMenuId`),
  KEY `FK_ci_dummy_menu_aksi_aksi` (`MenuAksiAksiId`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=latin1;

/*Data for the table `acm_menu_aksi` */

insert  into `acm_menu_aksi`(`MenuAksiId`,`MenuAksiMenuId`,`MenuAksiAksiId`) values 
(1,1,1),
(2,2,1),
(3,2,2),
(4,2,3),
(5,2,4),
(6,3,1),
(7,3,2),
(8,3,3),
(9,3,4),
(10,4,1),
(11,4,2),
(12,4,3),
(13,4,4),
(14,5,1),
(15,5,2),
(16,5,3),
(17,5,4),
(18,6,1),
(19,6,3),
(20,7,1),
(21,7,3),
(22,8,1),
(23,8,2),
(24,8,3),
(25,8,4),
(26,8,5),
(27,8,6),
(28,8,7),
(29,10,1),
(30,NULL,1),
(31,NULL,2),
(32,NULL,3),
(33,NULL,4),
(34,NULL,5),
(35,NULL,6),
(36,NULL,7),
(37,NULL,1),
(38,NULL,2),
(39,NULL,3),
(40,NULL,4),
(41,NULL,5),
(42,NULL,6),
(43,NULL,7),
(44,NULL,1),
(45,NULL,2),
(46,NULL,3),
(47,NULL,4),
(48,NULL,5),
(49,NULL,6),
(50,NULL,7),
(51,NULL,1),
(52,NULL,2),
(53,NULL,3),
(54,NULL,4),
(55,NULL,5),
(56,NULL,6),
(57,NULL,7),
(58,11,1),
(59,12,1),
(60,12,2),
(61,12,3),
(62,12,4),
(63,12,5),
(64,12,6),
(65,12,7),
(66,13,1),
(67,11,1),
(68,11,1),
(69,12,1),
(70,13,1),
(71,13,2),
(72,13,3),
(73,13,4),
(74,13,5),
(75,13,6),
(76,13,7),
(77,14,1),
(78,14,2),
(79,14,3),
(80,14,4),
(81,14,5),
(82,14,6),
(83,18,1),
(84,18,2),
(85,18,3),
(86,18,4),
(87,18,5),
(88,18,6),
(89,18,7),
(90,19,1),
(91,19,2),
(92,19,3),
(93,19,4),
(94,19,5),
(95,19,6),
(96,19,7),
(97,20,1),
(98,20,2),
(99,20,3),
(100,20,4),
(101,20,5),
(102,20,6),
(103,20,7),
(104,21,1),
(105,21,2),
(106,21,3),
(107,21,4),
(108,21,5),
(109,21,6),
(110,21,7),
(111,22,1),
(112,22,2),
(113,22,3),
(114,22,4),
(115,22,5),
(116,22,6),
(117,22,7);

/*Table structure for table `acm_user` */

CREATE TABLE `acm_user` (
  `UserId` int(6) NOT NULL AUTO_INCREMENT,
  `UserRealName` char(250) DEFAULT NULL,
  `UserName` char(150) DEFAULT NULL,
  `UserPassword` char(32) DEFAULT NULL,
  `UserActive` enum('1','0') DEFAULT '1',
  `UserGroupId` int(3) NOT NULL,
  `UserEmail` varchar(250) DEFAULT '',
  `UserFoto` varchar(250) DEFAULT NULL,
  `UserExpired` date DEFAULT '0000-00-00',
  `UserTelp` char(50) DEFAULT NULL,
  PRIMARY KEY (`UserId`),
  UNIQUE KEY `NewIndex1` (`UserName`),
  KEY `FK_ci_user_group` (`UserGroupId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `acm_user` */

insert  into `acm_user`(`UserId`,`UserRealName`,`UserName`,`UserPassword`,`UserActive`,`UserGroupId`,`UserEmail`,`UserFoto`,`UserExpired`,`UserTelp`) values 
(1,'Administrator','admin','827ccb0eea8a706c4c34a16891f84e7b','1',1,'','','0000-00-00',NULL),
(2,'I am Me','admin1','827ccb0eea8a706c4c34a16891f84e7b','1',1,'','','0000-00-00','');

/*Table structure for table `acm_user_group` */

CREATE TABLE `acm_user_group` (
  `UserGroupUserId` int(10) NOT NULL,
  `UserGroupGroupId` int(5) NOT NULL,
  PRIMARY KEY (`UserGroupUserId`,`UserGroupGroupId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `acm_user_group` */

/*Table structure for table `akses_api` */

CREATE TABLE `akses_api` (
  `id_api` int(11) DEFAULT NULL,
  `id_pengakses` int(11) DEFAULT NULL,
  `ip_pengakses` char(16) DEFAULT NULL,
  `status_akses` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `akses_api` */

/*Table structure for table `jenis_ref_billing` */

CREATE TABLE `jenis_ref_billing` (
  `id_jenis_ref_billing` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_ref_billing` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_jenis_ref_billing`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `jenis_ref_billing` */

insert  into `jenis_ref_billing`(`id_jenis_ref_billing`,`jenis_ref_billing`) values 
(1,'INQUIRY'),
(2,'PAYMENT');

/*Table structure for table `kategori_ref_billing` */

CREATE TABLE `kategori_ref_billing` (
  `id_kategori_ref_billing` int(2) NOT NULL,
  `kategori_ref_billing` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_kategori_ref_billing`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kategori_ref_billing` */

insert  into `kategori_ref_billing`(`id_kategori_ref_billing`,`kategori_ref_billing`) values 
(1,'PAJAK'),
(3,'RETRIBUSI');

/*Table structure for table `master_api` */

CREATE TABLE `master_api` (
  `id_api` int(11) NOT NULL AUTO_INCREMENT,
  `nm_api` varchar(100) DEFAULT NULL,
  `link_api` varchar(100) DEFAULT NULL,
  `opd_api` int(3) DEFAULT NULL,
  `nm_opd_api` varchar(100) DEFAULT NULL,
  `tahun_api` char(4) DEFAULT NULL,
  `keterangan_api` varchar(100) DEFAULT NULL,
  `created_api` datetime NOT NULL,
  `user_api` int(11) DEFAULT NULL,
  `id_ref_billing` char(3) DEFAULT NULL,
  `token` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_api`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `master_api` */

insert  into `master_api`(`id_api`,`nm_api`,`link_api`,`opd_api`,`nm_opd_api`,`tahun_api`,`keterangan_api`,`created_api`,`user_api`,`id_ref_billing`,`token`) values 
(1,'inquiry tagihan pasar multibank','https://webservice.jogjakota.go.id/epasar/index.php/servtagihan',1,'DISPERINDAG','2019','','2020-05-15 09:46:43',1,'4',1);

/*Table structure for table `master_pengakses` */

CREATE TABLE `master_pengakses` (
  `id_pengakses` int(11) NOT NULL AUTO_INCREMENT,
  `nm_pengakses` varchar(100) DEFAULT NULL,
  `kode_bank` char(7) DEFAULT NULL,
  PRIMARY KEY (`id_pengakses`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `master_pengakses` */

insert  into `master_pengakses`(`id_pengakses`,`nm_pengakses`,`kode_bank`) values 
(1,'BPD','21');

/*Table structure for table `parameter_api` */

CREATE TABLE `parameter_api` (
  `id_parameter` int(11) NOT NULL AUTO_INCREMENT,
  `id_api` int(11) DEFAULT NULL,
  `posisi_parameter` int(3) DEFAULT NULL,
  `nm_parameter` varchar(50) DEFAULT NULL,
  `val_parameter` varchar(50) DEFAULT NULL,
  `ket_parameter` char(200) DEFAULT NULL,
  `tipe_parameter` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_parameter`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `parameter_api` */

insert  into `parameter_api`(`id_parameter`,`id_api`,`posisi_parameter`,`nm_parameter`,`val_parameter`,`ket_parameter`,`tipe_parameter`) values 
(1,1,1,'Token','abcdefghijklmno12345','statis',1);

/*Table structure for table `ref_billing` */

CREATE TABLE `ref_billing` (
  `id_ref_billing` int(11) NOT NULL AUTO_INCREMENT,
  `ref_billing` varchar(50) DEFAULT NULL,
  `id_kategori_ref_billing` int(2) DEFAULT NULL,
  `id_jenis_ref_billing` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_ref_billing`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `ref_billing` */

insert  into `ref_billing`(`id_ref_billing`,`ref_billing`,`id_kategori_ref_billing`,`id_jenis_ref_billing`) values 
(2,'34710000305',3,2),
(4,'34710000305',3,1);

/*Table structure for table `service` */

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_nama` varchar(50) DEFAULT NULL,
  `service_url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `service` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

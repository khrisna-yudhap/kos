/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.1.37-MariaDB : Database - core
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `acm_aksi` */

DROP TABLE IF EXISTS `acm_aksi`;

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

DROP TABLE IF EXISTS `acm_group`;

CREATE TABLE `acm_group` (
  `GroupId` int(3) NOT NULL AUTO_INCREMENT,
  `GroupName` char(150) DEFAULT NULL,
  `GroupDescription` char(255) DEFAULT NULL,
  PRIMARY KEY (`GroupId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `acm_group` */

insert  into `acm_group`(`GroupId`,`GroupName`,`GroupDescription`) values 
(1,'Administrator','Administrator'),
(2,'tes','tes');

/*Table structure for table `acm_group_menu_aksi` */

DROP TABLE IF EXISTS `acm_group_menu_aksi`;

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
(2,2,'user/index'),
(3,2,'user/add'),
(4,2,'user/update'),
(5,2,'user/delete'),
(6,2,'group/index'),
(7,2,'group/add'),
(8,2,'group/update'),
(9,2,'group/delete'),
(10,2,'menu/index'),
(11,2,'menu/add'),
(12,2,'menu/update'),
(13,2,'menu/delete'),
(14,2,'authentikasi/index'),
(16,2,'authentikasi/update'),
(18,2,'profile/index'),
(19,2,'profile/update'),
(20,2,'password/index'),
(21,2,'password/update'),
(22,2,'new/module/index'),
(23,2,'new/module/add'),
(24,2,'new/module/update'),
(25,2,'new/module/delete'),
(29,2,'/index'),
(1,1,'#/index'),
(2,1,'user/index'),
(3,1,'user/add'),
(4,1,'user/update'),
(5,1,'user/delete'),
(6,1,'group/index'),
(7,1,'group/add'),
(8,1,'group/update'),
(9,1,'group/delete'),
(10,1,'menu/index'),
(11,1,'menu/add'),
(12,1,'menu/update'),
(13,1,'menu/delete'),
(14,1,'authentikasi/index'),
(16,1,'authentikasi/update'),
(18,1,'profile/index'),
(19,1,'profile/update'),
(20,1,'password/index'),
(21,1,'password/update'),
(29,1,'home/index'),
(58,1,'#/index');

/*Table structure for table `acm_menu` */

DROP TABLE IF EXISTS `acm_menu`;

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `acm_menu` */

insert  into `acm_menu`(`MenuId`,`MenuParentId`,`MenuName`,`MenuModule`,`MenuIsShow`,`MenuIcon`,`MenuOrder`,`MenuParent`,`MenuFavorite`) values 
(1,0,'Sistem','#','1','fa fa-cog',1,'sistem',NULL),
(2,1,'User','user','1','',2,'sistem',NULL),
(3,1,'Group','group','1','',1,'sistem',NULL),
(4,1,'Menu','menu','1','',3,'sistem',NULL),
(5,1,'Hak Akses','authentikasi','1',NULL,4,'sistem',NULL),
(6,1,'Profile','profile','0',NULL,5,'sistem',NULL),
(7,1,'Password','password','0',NULL,6,'sistem',NULL),
(10,0,'Home','home','1','fa fa-th-large',0,'home',NULL);

/*Table structure for table `acm_menu_aksi` */

DROP TABLE IF EXISTS `acm_menu_aksi`;

CREATE TABLE `acm_menu_aksi` (
  `MenuAksiId` int(6) NOT NULL AUTO_INCREMENT,
  `MenuAksiMenuId` int(6) DEFAULT NULL,
  `MenuAksiAksiId` int(3) DEFAULT NULL,
  PRIMARY KEY (`MenuAksiId`),
  KEY `FK_ci_dummy_menu_aksi` (`MenuAksiMenuId`),
  KEY `FK_ci_dummy_menu_aksi_aksi` (`MenuAksiAksiId`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

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
(67,11,1);

/*Table structure for table `acm_user` */

DROP TABLE IF EXISTS `acm_user`;

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

DROP TABLE IF EXISTS `acm_user_group`;

CREATE TABLE `acm_user_group` (
  `UserGroupUserId` int(10) NOT NULL,
  `UserGroupGroupId` int(5) NOT NULL,
  PRIMARY KEY (`UserGroupUserId`,`UserGroupGroupId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `acm_user_group` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

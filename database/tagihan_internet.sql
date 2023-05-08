/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 5.7.25 : Database - tagihan_internet
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tagihan_internet` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `tagihan_internet`;

/*Table structure for table `tb_info` */

DROP TABLE IF EXISTS `tb_info`;

CREATE TABLE `tb_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gambar` text,
  `judul` varchar(100) DEFAULT NULL,
  `isi` varchar(500) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tb_info` */

insert  into `tb_info`(`id`,`gambar`,`judul`,`isi`) values 
(1,'abc-qrcode(1).png','fsdfsd','ffsd'),
(3,'Kalender-2023-Versi-PDF.jpg','info','info');

/*Table structure for table `tb_kas` */

DROP TABLE IF EXISTS `tb_kas`;

CREATE TABLE `tb_kas` (
  `id_kas` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(11) NOT NULL,
  `tgl_kas` date NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `penerimaan` int(11) NOT NULL,
  `pengeluaran` int(11) NOT NULL,
  `jenis_kas` varchar(15) NOT NULL,
  `status` int(11) NOT NULL,
  `id_tagihan` int(11) NOT NULL,
  PRIMARY KEY (`id_kas`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;

/*Data for the table `tb_kas` */

insert  into `tb_kas`(`id_kas`,`id_transaksi`,`tgl_kas`,`keterangan`,`penerimaan`,`pengeluaran`,`jenis_kas`,`status`,`id_tagihan`) values 
(68,0,'2022-10-12','Pembayaran Internet AN. Alvind Febri, Paket 2 Mbps',100000,0,'',1,0),
(69,0,'2022-10-12','Pembayaran Internet AN. Yogi Suartawan, Paket 1 Mbps',50000,0,'',1,0),
(70,0,'2022-10-12','Pembayaran Internet AN. Rafly Yansyah Efendi, Paket 2 Mbps',100000,0,'',1,0),
(71,0,'2022-10-12','Pembayaran Internet AN. Oka Sucitra, Paket 1 Mbps',50000,0,'',1,0),
(72,0,'2022-10-10','Kabel ',0,150000,'',1,0),
(73,0,'2022-10-13','Pembayaran Internet AN.&nbspYogi Suartawanto,&nbspPaket&nbsp1 Mbps',100000,0,'',0,22),
(74,0,'2022-10-28','Pembayaran Internet AN. Angga Aditya, Paket 2 Mbps',200000,0,'',1,0),
(75,0,'2022-10-28','Pembayaran Internet AN.&nbspAngga Aditya,&nbspPaket&nbsp2 Mbps',200000,0,'',0,23),
(76,0,'2022-11-05','Pembayaran Internet AN.&nbspAngga Aditya,&nbspPaket&nbsp2 Mbps',200000,0,'',0,25),
(77,0,'2022-11-05','Pembayaran Internet AN.&nbspAngga Aditya,&nbspPaket&nbsp2 Mbps',200000,0,'',0,25),
(78,0,'2022-11-07','Pembayaran Internet AN.&nbspYogi Suartawanto,&nbspPaket&nbsp1 Mbps',100000,0,'',0,24),
(80,0,'2022-12-28','Pembayaran Internet AN.&nbspelda febry,&nbspPaket&nbsp1 Mbps',100000,0,'',0,30),
(81,0,'2023-01-10','Pembayaran Internet AN.&nbspIntan Rahmanita,&nbspPaket&nbsp2 Mbps',200000,0,'',0,35),
(82,0,'2023-04-09','Pembayaran Internet AN.&nbspAngga Aditya,&nbspPaket&nbsp2 Mbps',200000,0,'',0,41),
(83,0,'2023-04-09','Pembayaran Internet AN.&nbspAngga Aditya,&nbspPaket&nbsp2 Mbps',200000,0,'',0,41),
(84,0,'2023-04-09','Pembayaran Internet AN.&nbspRhyno Sandrino,&nbspPaket&nbsp3 Mbps',300000,0,'',0,38);

/*Table structure for table `tb_metode_bayar` */

DROP TABLE IF EXISTS `tb_metode_bayar`;

CREATE TABLE `tb_metode_bayar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bank` varchar(15) NOT NULL,
  `virtual_acc` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tb_metode_bayar` */

insert  into `tb_metode_bayar`(`id`,`nama_bank`,`virtual_acc`) values 
(1,'BRI','087857876890876'),
(3,'',''),
(4,'Gopay','099876543453456');

/*Table structure for table `tb_paket` */

DROP TABLE IF EXISTS `tb_paket`;

CREATE TABLE `tb_paket` (
  `id_paket` int(11) NOT NULL AUTO_INCREMENT,
  `nama_paket` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `keterangan_paket` varchar(200) NOT NULL,
  PRIMARY KEY (`id_paket`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `tb_paket` */

insert  into `tb_paket`(`id_paket`,`nama_paket`,`harga`,`keterangan_paket`) values 
(7,'1 Mbps',100000,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta aliquid, architecto magni ducimus enim possimus quibusdam error ad iusto assumenda consequuntur iure aperiam voluptatum magnam placeat n'),
(8,'2 Mbps',200000,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta aliquid, architecto magni ducimus enim possimus quibusdam error ad iusto assumenda consequuntur iure aperiam voluptatum magnam placeat n'),
(9,'3 Mbps',300000,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta aliquid, architecto magni ducimus enim possimus quibusdam error ad iusto assumenda consequuntur iure aperiam voluptatum magnam placeat n'),
(10,'4 Mbps',400000,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta aliquid, architecto magni ducimus enim possimus quibusdam error ad iusto assumenda consequuntur iure aperiam voluptatum magnam placeat n'),
(11,'7 Mbps',400000,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta aliquid, architecto magni ducimus enim possimus quibusdam error ad iusto assumenda consequuntur iure aperiam voluptatum magnam placeat n');

/*Table structure for table `tb_pelanggan` */

DROP TABLE IF EXISTS `tb_pelanggan`;

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pelanggan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `paket` int(11) NOT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `tb_pelanggan` */

insert  into `tb_pelanggan`(`id_pelanggan`,`nama_pelanggan`,`alamat`,`no_telp`,`paket`) values 
(2,'Alvind Febri','Yogyakarta','081245676754',2),
(4,'Oka sucitra','Bali','087789876543',1),
(5,'Rafly Yansyah Efendi','Yogyakarta','081315029099',2),
(6,'Yogi Suartawanto','Bali','085781480396',7),
(7,'Angga Aditya','Yogyakarta, condongcatur ','081234456563',8),
(8,'Rhyno Sandrino','Lombok','0852122222',9),
(9,'elda febry','jogja','2312312312312',7),
(10,'Intan Rahmanita','Sumtera','0852122222',8),
(11,'Angga Aditya','bali','0852122222',8);

/*Table structure for table `tb_pembelian` */

DROP TABLE IF EXISTS `tb_pembelian`;

CREATE TABLE `tb_pembelian` (
  `id_pembelian` int(11) NOT NULL AUTO_INCREMENT,
  `invoice` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nominal_paket` varchar(50) NOT NULL,
  `harga_paket` varchar(50) NOT NULL,
  `no_tlp` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jenis_id` varchar(20) NOT NULL,
  `no_id` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `metode_bayar` varchar(20) NOT NULL,
  `tgl_installasi` date NOT NULL,
  `status_pembelian` enum('0','1','2') NOT NULL,
  `va_bayar` varchar(25) NOT NULL,
  `bank_bayar` varchar(25) DEFAULT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `bukti_bayar` text NOT NULL,
  PRIMARY KEY (`id_pembelian`)
) ENGINE=InnoDB AUTO_INCREMENT=166 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_pembelian` */

insert  into `tb_pembelian`(`id_pembelian`,`invoice`,`nama`,`nominal_paket`,`harga_paket`,`no_tlp`,`email`,`alamat`,`jenis_id`,`no_id`,`tgl_lahir`,`metode_bayar`,`tgl_installasi`,`status_pembelian`,`va_bayar`,`bank_bayar`,`tgl_bayar`,`bukti_bayar`) values 
(164,'080523--1','Pranata Gita Swara','3 Mbps','300000','085768987554','pranata@mail.com','Karang Asem, Denpasar, Bali','value=','330984459874','2023-05-08','','2023-05-25','0','099876543453456','Gopay','2023-05-08','abc-qrcode(1).png'),
(165,'080523--165','Adnan Dhika','1 Mbps','100000','08442343234','adnan@gmail.com','Tangerang Selatan','KTP','33450434429232','2023-05-09','','2023-05-08','1','099876543456789','Mandiri','2023-05-08','abc-qrcode-.png');

/*Table structure for table `tb_profile` */

DROP TABLE IF EXISTS `tb_profile`;

CREATE TABLE `tb_profile` (
  `nama_perusahaan` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telpon` varchar(20) NOT NULL,
  `website` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_profile` */

insert  into `tb_profile`(`nama_perusahaan`,`alamat`,`telpon`,`website`,`kota`,`foto`) values 
('Banjar Net','JALAN RONGGOLAW NO 25 KOTA COBA-COBA','021.090939','www.sekolah.com','Jakarta','logo_login.png');

/*Table structure for table `tb_tagihan` */

DROP TABLE IF EXISTS `tb_tagihan`;

CREATE TABLE `tb_tagihan` (
  `id_tagihan` int(11) NOT NULL AUTO_INCREMENT,
  `id_pelanggan` int(11) NOT NULL,
  `bulan_tahun` varchar(30) NOT NULL,
  `jml_bayar` int(11) NOT NULL,
  `terbayar` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `status_bayar` int(11) NOT NULL,
  PRIMARY KEY (`id_tagihan`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

/*Data for the table `tb_tagihan` */

insert  into `tb_tagihan`(`id_tagihan`,`id_pelanggan`,`bulan_tahun`,`jml_bayar`,`terbayar`,`tgl_bayar`,`status_bayar`) values 
(18,2,'102020',100000,100000,'2020-10-28',1),
(19,4,'102020',50000,50000,'2022-10-12',1),
(20,5,'102020',100000,100000,'2022-10-12',1),
(21,6,'102020',50000,50000,'2022-10-12',1),
(22,6,'102022',100000,100000,'2022-10-13',1),
(23,7,'102022',200000,200000,'2022-10-28',1),
(24,6,'112022',100000,100000,'2022-11-07',1),
(25,7,'112022',200000,200000,'2022-11-05',1),
(26,8,'112022',300000,0,'0000-00-00',0),
(27,6,'122022',100000,0,'0000-00-00',0),
(28,7,'122022',200000,0,'0000-00-00',0),
(29,8,'122022',300000,0,'0000-00-00',0),
(30,9,'122022',100000,100000,'2022-12-28',1),
(31,6,'012023',100000,0,'0000-00-00',0),
(32,7,'012023',200000,0,'0000-00-00',0),
(33,8,'012023',300000,0,'0000-00-00',0),
(34,9,'012023',100000,0,'0000-00-00',0),
(35,10,'012023',200000,200000,'2023-01-10',1),
(36,6,'042023',100000,0,'0000-00-00',0),
(37,7,'042023',200000,0,'0000-00-00',0),
(38,8,'042023',300000,300000,'2023-04-09',1),
(39,9,'042023',100000,0,'0000-00-00',0),
(40,10,'042023',200000,0,'0000-00-00',0),
(41,11,'042023',200000,200000,'2023-04-09',1);

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(30) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `tb_user` */

insert  into `tb_user`(`id`,`username`,`nama_user`,`password`,`level`,`foto`,`id_pelanggan`) values 
(1,'admin','Pranata Gitaswara','admin','admin','kisspng-computer-icons-user-clip-art-user-5abf13db5624e4.1771742215224718993529.png',0),
(3,'Alvin','Alvind Febri','alvin','user','kisspng-computer-icons-user-clip-art-user-5abf13db5624e4.1771742215224718993529.png',2),
(5,'Oka','Oka sucitra','oka','user','kisspng-computer-icons-user-clip-art-user-5abf13db5624e4.1771742215224718993529.png',4),
(6,'Rafly','Rafly Yansyah Efendi','rafly','user','kisspng-computer-icons-user-clip-art-user-5abf13db5624e4.1771742215224718993529.png',5),
(7,'Yogi','Yogi suartawan','yogi','user','kisspng-computer-icons-user-clip-art-user-5abf13db5624e4.1771742215224718993529.png',6),
(8,'Angga','Angga Aditya','angga12','user','kisspng-computer-icons-user-clip-art-user-5abf13db5624e4.1771742215224718993529.png',7),
(9,'Rhyno21','','Rhyno21','user','kisspng-computer-icons-user-clip-art-user-5abf13db5624e4.1771742215224718993529.png',8),
(10,'elda','elda febry','elda','user','admin.png',9),
(11,'Intan','Intan Rahmanita','1212','user','admin.png',10),
(12,'anggap','Angga Aditya','12345','user','admin.png',11);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

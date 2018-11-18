-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `e_kas`;
CREATE DATABASE `e_kas` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `e_kas`;

DROP TABLE IF EXISTS `kas`;
CREATE TABLE `kas` (
  `id_kas` int(11) NOT NULL AUTO_INCREMENT,
  `id_kelas` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL DEFAULT '0',
  `keterangan` text NOT NULL DEFAULT '0',
  `tanggal_pembayaran` date NOT NULL,
  PRIMARY KEY (`id_kas`),
  KEY `id_kelas` (`id_kelas`),
  CONSTRAINT `kas_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO `kas` (`id_kas`, `id_kelas`, `nama`, `keterangan`, `tanggal_pembayaran`) VALUES
(1,	3,	'November Minggu Ke-1',	'Tidak ada',	'2018-11-16'),
(2,	1,	'November Minggu Ke-1',	'Tidak ada',	'2018-11-16'),
(3,	4,	'November Minggu Ke-1',	'Tidak ada',	'2018-11-16'),
(4,	3,	'November Minggu Ke-2',	'Harus lunas semua titik.',	'2018-11-11'),
(5,	4,	'November Minggu Ke-2',	'Harus Lunas',	'2018-11-11'),
(6,	4,	'November Minggu Ke-3',	'Harus Lunas',	'2018-11-25');

DROP TABLE IF EXISTS `kas_keluar`;
CREATE TABLE `kas_keluar` (
  `id_kas_keluar` int(11) NOT NULL AUTO_INCREMENT,
  `id_kelas` int(11) NOT NULL DEFAULT 0,
  `jumlah` int(11) NOT NULL DEFAULT 0,
  `keterangan` text NOT NULL DEFAULT '0',
  `tanggal_keluar` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_kas_keluar`),
  KEY `id_kelas` (`id_kelas`),
  CONSTRAINT `FK_kas_keluar_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `kas_keluar` (`id_kas_keluar`, `id_kelas`, `jumlah`, `keterangan`, `tanggal_keluar`) VALUES
(1,	1,	500,	'Beli Aqua Gelas x 1',	'2018-11-16 13:22:20'),
(2,	3,	2000,	'Membeli Aqua Gelas x 4',	'2018-11-18 00:00:00'),
(3,	4,	1000,	'Beli Roti x 1',	'2018-11-18 00:00:00');

DROP TABLE IF EXISTS `kas_masuk`;
CREATE TABLE `kas_masuk` (
  `id_kas_masuk` int(11) NOT NULL AUTO_INCREMENT,
  `id_kas` int(11) NOT NULL DEFAULT 0,
  `id_siswa` int(11) NOT NULL DEFAULT 0,
  `jumlah` int(11) NOT NULL DEFAULT 0,
  `keterangan` text NOT NULL DEFAULT '0',
  `tanggal_masuk` date NOT NULL,
  PRIMARY KEY (`id_kas_masuk`),
  KEY `id_siswa` (`id_siswa`),
  KEY `id_kas` (`id_kas`),
  CONSTRAINT `FK_kas_masuk_kas` FOREIGN KEY (`id_kas`) REFERENCES `kas` (`id_kas`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_kas_masuk_siswa` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO `kas_masuk` (`id_kas_masuk`, `id_kas`, `id_siswa`, `jumlah`, `keterangan`, `tanggal_masuk`) VALUES
(1,	1,	1,	2000,	'Lunas',	'2018-11-16'),
(2,	1,	2,	20000,	'Kontan Boss!',	'2018-11-17'),
(3,	1,	8,	2000,	'Lunas',	'2018-11-18'),
(4,	3,	7,	2000,	'Lunas',	'2018-11-18'),
(5,	4,	8,	2000,	'Lunas',	'2018-11-18'),
(6,	1,	9,	2000,	'Lunas',	'2018-11-18'),
(7,	5,	7,	2000,	'Lunas',	'2018-11-18'),
(8,	3,	5,	2000,	'Lunas',	'2018-11-24');

DROP TABLE IF EXISTS `kelas`;
CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL DEFAULT '0',
  `deskripsi` text NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `kelas` (`id_kelas`, `nama`, `deskripsi`) VALUES
(1,	'XI RPL 1',	'Kelas XI dengan jurusan RPL dan rombel ke-1'),
(3,	'XI RPL 2',	'Kelas XI dengan jurusan RPL rombel ke-2'),
(4,	'XI RPL 3',	'Kelas XI dengan jurusan RPL rombel ke-3');

DROP TABLE IF EXISTS `siswa`;
CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL DEFAULT 0,
  `id_kelas` int(11) NOT NULL DEFAULT 0,
  `nama` varchar(255) NOT NULL DEFAULT '0',
  `no_hp` varchar(15) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_siswa`),
  KEY `id_user` (`id_user`),
  KEY `id_kelas` (`id_kelas`),
  CONSTRAINT `FK_siswa_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_siswa_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO `siswa` (`id_siswa`, `id_user`, `id_kelas`, `nama`, `no_hp`) VALUES
(1,	4,	1,	'Agus Taufik Qilah',	'08718231823'),
(2,	2,	1,	'Geri Daryat Saputra',	'081624312332'),
(3,	5,	3,	'Eris Permana',	'0812785312312'),
(4,	3,	1,	'Siti Shalehah',	'087616723512'),
(5,	7,	4,	'Winda Ruliani',	'089656577673'),
(6,	8,	4,	'Siti Hardiyanti',	'08716283123'),
(7,	9,	4,	'Sintia Apriliani',	'08382895390'),
(8,	10,	3,	'Putri Tresnawati',	'088176823512'),
(9,	11,	3,	'Dipo Raja Annom Berlian',	'082172635123');

DROP TABLE IF EXISTS `uang_kas`;
CREATE TABLE `uang_kas` (
  `id_kelas` int(11) DEFAULT NULL,
  `jumlah_uang_kas` int(11) DEFAULT NULL,
  `tanggal_update_terakhir` datetime DEFAULT current_timestamp(),
  KEY `id_kelas` (`id_kelas`),
  CONSTRAINT `FK_uang_kas_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `uang_kas` (`id_kelas`, `jumlah_uang_kas`, `tanggal_update_terakhir`) VALUES
(1,	2000,	'2018-11-16 13:19:17'),
(3,	2000,	'2018-11-18 09:06:54'),
(4,	4000,	'2018-11-18 09:07:03');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL DEFAULT '0',
  `password` char(60) NOT NULL DEFAULT '0',
  `level` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `level`) VALUES
(2,	'geri',	'geri@gmail.com',	'$2y$10$/I9g363nRyP2AdlmCpAHWusl/qO5odVjb5MWRFzU17UrFxXZxyKpi',	2),
(3,	'bendahara',	'bendahara@email.com',	'$2y$10$HSZRh0qfb1PdeHX3MYs4VuSn9nb9eUgrDymN60NCnrOMPZr4lU.fi',	3),
(4,	'agus',	'agus@email.com',	'$2y$10$TLsDbvhZpzyeFi1ZaLbnrerl8hQHk.8T.VJqeRjHwnoxvl7pEEkyq',	4),
(5,	'eris',	'eris@email.com',	'$2y$10$TrZ7FEj7PzPMmvau0pVsoupIW/hX5SiwBtwLX5woE9YQREeaHrPhy',	2),
(6,	'superadmin',	'superadmin@mail.com',	'$2y$10$N27fpig/yfluPwbjqYC.V.ANXW680fN0J59cu/CIQIbL9.elA1jma',	1),
(7,	'winda',	'winda@mail.com',	'$2y$10$dbmg.bEE5NzPgqXKVyuK9uyx8LxxIUPnuM21OkTSyN/A0eBaqytpe',	2),
(8,	'sitihardiyanti',	'sitihardiyanti@mail.com',	'$2y$10$NbUUQQhP9QL0360KR6wRZe0o.c9dueQcoPT7jm8m1o3EK6zOFm56u',	3),
(9,	'sintia',	'sintia@mail.com',	'$2y$10$Y5tcZs.nog/6Fz5KsjTyXuJx3Y7..jKK6gDNaEOK6TfvGXPRH4M4.',	4),
(10,	'putri',	'putri@mail.com',	'$2y$10$iZcMiTl6v4VUGbIcZ5jayuXCX7CL7x6uIWZWvwRNXBO06MxI0J7AW',	3),
(11,	'dipo',	'dipo@mail.com',	'$2y$10$XEEVnpLtwDNXylcGRbgrfewyrS.BcD9uqweP/OnqVp.2KJj62EwQW',	4);

-- 2018-11-18 06:13:02

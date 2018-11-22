-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 22, 2018 at 08:42 PM
-- Server version: 10.2.3-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_kas`
--

-- --------------------------------------------------------

--
-- Table structure for table `kas`
--

CREATE TABLE `kas` (
  `id_kas` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL DEFAULT '0',
  `keterangan` text NOT NULL DEFAULT '0',
  `tanggal_pembayaran` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kas`
--

INSERT INTO `kas` (`id_kas`, `id_kelas`, `nama`, `keterangan`, `tanggal_pembayaran`) VALUES
(1, 3, 'November Minggu Ke-1', 'Tidak ada', '2018-11-03'),
(2, 1, 'November Minggu Ke-1', 'Tidak ada', '2018-11-03'),
(3, 4, 'November Minggu Ke-1', 'Tidak ada', '2018-11-03'),
(4, 3, 'November Minggu Ke-2', 'Harus lunas semua titik.', '2018-11-10'),
(5, 4, 'November Minggu Ke-2', 'Harus Lunas', '2018-11-10'),
(6, 4, 'November Minggu Ke-3', 'Harus Lunas', '2018-11-17'),
(7, 1, 'November Minggu Ke-2', 'Tidak ada kasbon', '2018-11-10'),
(8, 1, 'November Minggu Ke-3', 'Harus Lunas', '2018-11-17'),
(11, 3, 'November Minggu Ke-3', 'Harus lunas semua', '2018-11-17');

-- --------------------------------------------------------

--
-- Table structure for table `kas_keluar`
--

CREATE TABLE `kas_keluar` (
  `id_kas_keluar` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL DEFAULT 0,
  `jumlah` int(11) NOT NULL DEFAULT 0,
  `keterangan` text NOT NULL DEFAULT '0',
  `tanggal_keluar` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kas_keluar`
--

INSERT INTO `kas_keluar` (`id_kas_keluar`, `id_kelas`, `jumlah`, `keterangan`, `tanggal_keluar`) VALUES
(1, 1, 500, 'Beli Aqua Gelas x 1', '2018-11-16 13:22:20'),
(2, 3, 2000, 'Membeli Aqua Gelas x 4', '2018-11-18 00:00:00'),
(3, 4, 1000, 'Beli Roti x 1', '2018-11-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kas_masuk`
--

CREATE TABLE `kas_masuk` (
  `id_kas_masuk` int(11) NOT NULL,
  `id_kas` int(11) NOT NULL DEFAULT 0,
  `id_siswa` int(11) NOT NULL DEFAULT 0,
  `jumlah` int(11) NOT NULL DEFAULT 0,
  `keterangan` text NOT NULL DEFAULT '0',
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kas_masuk`
--

INSERT INTO `kas_masuk` (`id_kas_masuk`, `id_kas`, `id_siswa`, `jumlah`, `keterangan`, `tanggal_masuk`) VALUES
(1, 2, 1, 2000, 'Lunas', '2018-11-16'),
(2, 2, 2, 2000, 'Kontan Boss!', '2018-11-17'),
(3, 1, 8, 2000, 'Lunas', '2018-11-04'),
(4, 3, 7, 2000, 'Lunas', '2018-11-08'),
(5, 4, 8, 2000, 'Lunas', '2018-11-13'),
(6, 1, 9, 2000, 'Lunas', '2018-11-09'),
(7, 5, 7, 2000, 'Lunas', '2018-11-15'),
(8, 3, 5, 2000, 'Lunas', '2018-11-06'),
(9, 2, 4, 2000, 'Lunas', '2018-11-22'),
(10, 7, 1, 2000, 'Lunas', '2018-11-12'),
(11, 7, 4, 2000, 'Lunas', '2018-11-14'),
(12, 8, 4, 2000, 'Lunas', '2018-11-22'),
(14, 8, 1, 2000, 'Lunas', '2018-11-22'),
(15, 3, 6, 2000, 'Lunas', '2018-11-06'),
(16, 5, 6, 2000, 'Lunas', '2018-11-15'),
(17, 6, 6, 2000, 'Lunas', '2018-11-22'),
(18, 5, 5, 2000, 'Lunas', '2018-11-22'),
(19, 6, 5, 2000, 'Lunas', '2018-11-22'),
(20, 3, 10, 2000, 'Lunas', '2018-11-04'),
(24, 7, 2, 2000, 'Lunas', '2018-11-14'),
(25, 1, 3, 2000, 'Lunas', '2018-11-10'),
(26, 4, 3, 2000, 'Lunas', '2018-11-13'),
(27, 11, 3, 2000, 'Lunas', '2018-11-22');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL DEFAULT '0',
  `deskripsi` text NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama`, `deskripsi`) VALUES
(1, 'XI RPL 1', 'Kelas XI dengan jurusan RPL dan rombel ke-1'),
(3, 'XI RPL 2', 'Kelas XI dengan jurusan RPL rombel ke-2'),
(4, 'XI RPL 3', 'Kelas XI dengan jurusan RPL rombel ke-3');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_user` int(11) NOT NULL DEFAULT 0,
  `id_kelas` int(11) NOT NULL DEFAULT 0,
  `nama` varchar(255) NOT NULL DEFAULT '0',
  `no_hp` varchar(15) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `id_user`, `id_kelas`, `nama`, `no_hp`) VALUES
(1, 4, 1, 'Agus Taufik Qilah', '08718231823'),
(2, 2, 1, 'Geri Daryat Saputra', '081624312332'),
(3, 5, 3, 'Eris Permana', '0812785312312'),
(4, 3, 1, 'Siti Shalehah', '087616723512'),
(5, 7, 4, 'Winda Ruliani', '089656577673'),
(6, 8, 4, 'Siti Hardiyanti', '08716283123'),
(7, 9, 4, 'Sintia Apriliani', '08382895390'),
(8, 10, 3, 'Putri Tresnawati', '088176823512'),
(9, 11, 3, 'Dipo Raja Annom Berlian', '082172635123'),
(10, 12, 4, 'M. Brany Oka Saputra', '0887162351231');

-- --------------------------------------------------------

--
-- Table structure for table `uang_kas`
--

CREATE TABLE `uang_kas` (
  `id_kelas` int(11) DEFAULT NULL,
  `jumlah_uang_kas` int(11) DEFAULT NULL,
  `tanggal_update_terakhir` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uang_kas`
--

INSERT INTO `uang_kas` (`id_kelas`, `jumlah_uang_kas`, `tanggal_update_terakhir`) VALUES
(1, 21500, '2018-11-16 13:19:17'),
(3, 10000, '2018-11-18 09:06:54'),
(4, 17000, '2018-11-18 09:07:03');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL DEFAULT '0',
  `password` char(60) NOT NULL DEFAULT '0',
  `level` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `level`) VALUES
(2, 'geri', 'geri@gmail.com', '$2y$10$/I9g363nRyP2AdlmCpAHWusl/qO5odVjb5MWRFzU17UrFxXZxyKpi', 2),
(3, 'sitishalehah', 'sitishalehah@email.com', '$2y$10$vq.pJ/BAEOj7aW5C9deSUOrPHg6Sb7nW5t7T2CRsYHN6i7vSOGST6', 2),
(4, 'agus', 'agus@email.com', '$2y$10$TLsDbvhZpzyeFi1ZaLbnrerl8hQHk.8T.VJqeRjHwnoxvl7pEEkyq', 4),
(5, 'eris', 'eris@email.com', '$2y$10$TrZ7FEj7PzPMmvau0pVsoupIW/hX5SiwBtwLX5woE9YQREeaHrPhy', 2),
(6, 'superadmin', 'superadmin@mail.com', '$2y$10$N27fpig/yfluPwbjqYC.V.ANXW680fN0J59cu/CIQIbL9.elA1jma', 1),
(7, 'winda', 'winda@mail.com', '$2y$10$dbmg.bEE5NzPgqXKVyuK9uyx8LxxIUPnuM21OkTSyN/A0eBaqytpe', 2),
(8, 'sitihardiyanti', 'sitihardiyanti@mail.com', '$2y$10$NbUUQQhP9QL0360KR6wRZe0o.c9dueQcoPT7jm8m1o3EK6zOFm56u', 3),
(9, 'sintia', 'sintia@mail.com', '$2y$10$Y5tcZs.nog/6Fz5KsjTyXuJx3Y7..jKK6gDNaEOK6TfvGXPRH4M4.', 4),
(10, 'putri', 'putri@mail.com', '$2y$10$iZcMiTl6v4VUGbIcZ5jayuXCX7CL7x6uIWZWvwRNXBO06MxI0J7AW', 3),
(11, 'dipo', 'dipo@mail.com', '$2y$10$XEEVnpLtwDNXylcGRbgrfewyrS.BcD9uqweP/OnqVp.2KJj62EwQW', 4),
(12, 'oka', 'oka@mailo.com', '$2y$10$4aendvtDc7GTob8C.FCeN.ccUJPEVYrejwFiGueih9skIRkW7qjji', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`id_kas`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `kas_keluar`
--
ALTER TABLE `kas_keluar`
  ADD PRIMARY KEY (`id_kas_keluar`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `kas_masuk`
--
ALTER TABLE `kas_masuk`
  ADD PRIMARY KEY (`id_kas_masuk`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_kas` (`id_kas`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `uang_kas`
--
ALTER TABLE `uang_kas`
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kas`
--
ALTER TABLE `kas`
  MODIFY `id_kas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kas_keluar`
--
ALTER TABLE `kas_keluar`
  MODIFY `id_kas_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kas_masuk`
--
ALTER TABLE `kas_masuk`
  MODIFY `id_kas_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kas`
--
ALTER TABLE `kas`
  ADD CONSTRAINT `kas_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE;

--
-- Constraints for table `kas_keluar`
--
ALTER TABLE `kas_keluar`
  ADD CONSTRAINT `FK_kas_keluar_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kas_masuk`
--
ALTER TABLE `kas_masuk`
  ADD CONSTRAINT `FK_kas_masuk_kas` FOREIGN KEY (`id_kas`) REFERENCES `kas` (`id_kas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_kas_masuk_siswa` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `FK_siswa_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_siswa_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `uang_kas`
--
ALTER TABLE `uang_kas`
  ADD CONSTRAINT `FK_uang_kas_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

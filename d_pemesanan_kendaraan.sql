-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2022 at 06:44 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `d_pemesanan_kendaraan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `nama_admin` varchar(50) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`nama_admin`, `username`, `password`, `level`, `status`) VALUES
('mh rizal', 'rizal', '202cb962ac59075b964b07152d234b70', 2, 0),
('ryan hidayat', 'ryan', '202cb962ac59075b964b07152d234b70', 1, 0),
('samsul arifin', 'samsul', '202cb962ac59075b964b07152d234b70', 1, 0),
('sulton maulana', 'suton', '202cb962ac59075b964b07152d234b70', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kendaraan`
--

CREATE TABLE `tbl_kendaraan` (
  `id_nopol_kendaraan` varchar(10) NOT NULL,
  `merk` varchar(20) DEFAULT NULL,
  `jenis` varchar(20) DEFAULT NULL,
  `thn_pembuatan` int(11) DEFAULT NULL,
  `bhn_bakar` varchar(20) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kendaraan`
--

INSERT INTO `tbl_kendaraan` (`id_nopol_kendaraan`, `merk`, `jenis`, `thn_pembuatan`, `bhn_bakar`, `status`) VALUES
('A3619TAB', 'Honda', 'Mobil', 2017, 'pertamax', 0),
('B3619TRI', 'Honda', 'Mobil', 2020, 'pertamax', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manajer`
--

CREATE TABLE `tbl_manajer` (
  `nama_manajer` varchar(50) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `no_tlp` varchar(15) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(20) DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `tempat_lahir` varchar(20) DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`id_pegawai`, `nama_pegawai`, `jenis_kelamin`, `tempat_lahir`, `agama`, `alamat`, `telepon`) VALUES
(1, 'andi maulana', 'laki-laki', 'malang', 'islam', 'merjosari', '87745458540'),
(2, 'samsul arifin', 'laki-laki', 'malang', 'islam', 'klojen', '87745458540');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemesanan`
--

CREATE TABLE `tbl_pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `id_nopol_kendaraan` varchar(10) DEFAULT NULL,
  `tgl_pemesanan` date DEFAULT NULL,
  `statusp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pemesanan`
--

INSERT INTO `tbl_pemesanan` (`id_pemesanan`, `id_pegawai`, `id_nopol_kendaraan`, `tgl_pemesanan`, `statusp`) VALUES
(17, 1, 'A3619TAB', '2022-09-30', 0),
(18, 1, 'A3619TAB', '2022-09-30', 0),
(19, 1, 'A3619TAB', '2022-09-30', 0),
(20, 1, 'A3619TAB', '2022-09-30', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tbl_kendaraan`
--
ALTER TABLE `tbl_kendaraan`
  ADD PRIMARY KEY (`id_nopol_kendaraan`);

--
-- Indexes for table `tbl_manajer`
--
ALTER TABLE `tbl_manajer`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `tbl_pemesanan`
--
ALTER TABLE `tbl_pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_nopol_kendaraan` (`id_nopol_kendaraan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_pemesanan`
--
ALTER TABLE `tbl_pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_pemesanan`
--
ALTER TABLE `tbl_pemesanan`
  ADD CONSTRAINT `tbl_pemesanan_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `tbl_pegawai` (`id_pegawai`),
  ADD CONSTRAINT `tbl_pemesanan_ibfk_2` FOREIGN KEY (`id_nopol_kendaraan`) REFERENCES `tbl_kendaraan` (`id_nopol_kendaraan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

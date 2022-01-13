-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 09, 2021 at 03:00 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentalmobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` int(11) NOT NULL,
  `merk` varchar(110) NOT NULL,
  `tahun` int(4) NOT NULL,
  `nopol` varchar(110) NOT NULL,
  `masa_stnk` varchar(110) NOT NULL,
  `lokasi` varchar(110) NOT NULL,
  `penanggungjawab` varchar(100) NOT NULL,
  `kondisi` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `merk`, `tahun`, `nopol`, `masa_stnk`, `lokasi`, `penanggungjawab`, `kondisi`, `harga`) VALUES
(2, 'TOYOTA AVANZA G 1,3 M/T', 2016, 'W 1815 C / W 1039 AT', '2026-01-12', 'kantor pusat', 'SDM & Umum', 'ready', 100000),
(7, 'TOYOTA KIJANG INNOVA G M/T DSL', 2016, 'W 556 CA / W 1410 AS', '2025-12-26', 'kantor pusat', 'SDM & Umum', 'not ready', 80000),
(8, 'TOYOTA AVANZA G 1,3 M/T', 2016, 'W 1814 C / W 1744 AR', '2026-01-12', 'kantor pusat', 'SDM & Umum', 'not ready', 900000),
(9, 'TOYOTA KIJANG INNOVA G A/T BSN', 2016, 'W 553 CA / W 1225 AS', '2026-01-30', 'KKUSB', 'SDM & Umum', 'maintainance', 10000),
(10, 'TOYOTA AVANZA G 1,3 M/T', 2016, 'W 1052 CE', '2021-09-02', 'Kantor Pusat', 'SDM & Umum', 'not ready', 250000),
(11, 'TOYOTA KIJANG INNOVA E XW41 DS', 2014, 'W 1356 BR', '2024-03-01', 'KKUSB', 'SDM & Umum', 'maintainance', 120000),
(12, 'TOYOTA KIJANG INNOVA G M/T  BSN', 2016, 'W 1751 CA / W 1009 AW', '2026-04-02', 'KKUSB', 'SDM & Umum', 'not ready', 30000),
(13, 'TOYOTA KIJANG INNOVA G A/T BSN', 2016, 'W 559 CA / W 1226 AS', '2026-01-30', 'KKUSB', 'SDM & Umum', 'ready', 50000),
(14, 'ISUZU TBR54 TURBO PICK UP', 2014, 'W 8034 DV', '2024-12-06', 'Angkutan', 'SDM & Umum', 'ready', 400000),
(15, 'TOYOTA KIJANG INNOVA G A/T BSN', 2016, 'W 623 CA / W 1587 AS', '2026-02-04', 'KKUSB', 'SDM & Umum', 'not ready', 70000),
(16, 'DAIHATSU GREAT NEW XENIA R A/T 1,3 SPORTY', 2016, 'W 1036 CA / W 1299 AT', '2026-02-25', 'Kantor Pusat', 'SDM & Umum', 'not ready', 74500);

-- --------------------------------------------------------

--
-- Table structure for table `penyewa`
--

CREATE TABLE `penyewa` (
  `id_penyewa` int(11) NOT NULL,
  `nama_penyewa` varchar(100) NOT NULL,
  `no_telepon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyewa`
--

INSERT INTO `penyewa` (`id_penyewa`, `nama_penyewa`, `no_telepon`) VALUES
(3, 'rudatul', '6289680810704'),
(4, 'bu risti', '6285718883969'),
(6, 'pak ribut', '6281617484206'),
(7, 'ruslan', '6287731026436'),
(8, 'ronny', '6281424556798'),
(9, 'fanny', '6281358120210'),
(10, 'tono', '6289680810704');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `merk_mobil` varchar(100) NOT NULL,
  `penyewa` varchar(100) NOT NULL,
  `pukul_dipinjam` varchar(100) NOT NULL,
  `tgl_dipinjam` varchar(100) NOT NULL,
  `pukul_dikembalikan` varchar(100) NOT NULL,
  `tgl_kembali` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `merk_mobil`, `penyewa`, `pukul_dipinjam`, `tgl_dipinjam`, `pukul_dikembalikan`, `tgl_kembali`) VALUES
(10, 'W 556 CA / W 1410 AS', 'bu risti', '09:51', '2021-05-10', '09:51', '2021-05-20'),
(11, 'W 553 CA / W 1225 AS', 'pak ribut', '09:52', '2021-05-18', '09:53', '2021-05-19'),
(12, 'W 623 CA / W 1587 AS', 'ronny', '09:53', '2021-05-17', '09:54', '2021-05-19'),
(13, 'W 1036 CA / W 1299 AT', 'fanny', '09:55', '2021-05-17', '09:55', '2021-05-18'),
(14, 'W 556 CA / W 1410 AS', 'rudatul', '08:30', '2021-06-14', '08:30', '2021-06-16'),
(15, 'W 8034 DV', 'ronny', '08:55', '2021-07-08', '08:55', '2021-07-09'),
(16, 'W 1751 CA / W 1009 AW', 'ruslan', '08:57', '2021-07-08', '09:57', '2021-07-10');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `password`) VALUES
(1, 'fanny', 'fanny'),
(4, 'budi', 'budi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indexes for table `penyewa`
--
ALTER TABLE `penyewa`
  ADD PRIMARY KEY (`id_penyewa`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `penyewa`
--
ALTER TABLE `penyewa`
  MODIFY `id_penyewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

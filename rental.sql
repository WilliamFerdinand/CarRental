-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2024 at 04:54 AM
-- Server version: 10.4.21-MariaDB-log
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `idMobil` int(11) NOT NULL,
  `namaMobil` varchar(100) NOT NULL,
  `merek` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `noPlat` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`idMobil`, `namaMobil`, `merek`, `model`, `jenis`, `noPlat`, `harga`, `status`) VALUES
(1, 'Mobil 1', 'Merk T', 'Model S', 'SUV', 'BN 8856 WA', 300000, 'Vacant'),
(2, 'Mobil 2', 'Merk A', 'Model S', 'Sedan', 'BN 7867 WW', 200000, 'Vacant'),
(3, 'Mobil 3', 'Merk B', 'Model A', 'Sportcar', 'BN 8978 WL', 500000, 'Vacant'),
(4, 'Mobil 4', 'Merk F', 'Model K', 'Sportcar', 'BN 7807 WW', 500000, 'Rented'),
(5, 'Mobil 5', 'Merk G', 'Model E', 'SUV', 'BN 9909 WS', 300000, 'Vacant'),
(6, 'Mobil 6', 'Merk G', 'Model E', 'SUV', 'BN 9900 WS', 300000, 'Vacant'),
(7, 'Mobil 6', 'Merk G', 'Model E', 'SUV', 'BN 9900 WS', 300000, 'Vacant'),
(8, 'Mobil 7', 'Merk G', 'Model E', 'SUV', 'BN 9902 WS', 300000, 'Vacant');

-- --------------------------------------------------------

--
-- Table structure for table `peminjamman`
--

CREATE TABLE `peminjamman` (
  `idPeminjamman` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idMobil` int(11) NOT NULL,
  `tanggalMulai` date NOT NULL,
  `tanggalSelesai` date NOT NULL,
  `totalHarga` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjamman`
--

INSERT INTO `peminjamman` (`idPeminjamman`, `idUser`, `idMobil`, `tanggalMulai`, `tanggalSelesai`, `totalHarga`, `status`) VALUES
(1, 1, 1, '2024-05-17', '2024-05-18', 600000, 'Selesai'),
(2, 2, 2, '2024-05-17', '2024-05-18', 1000000, 'Selesai'),
(3, 1, 2, '2024-05-24', '2024-05-31', 1400000, 'Berlangsung'),
(4, 1, 2, '2024-05-24', '2024-05-31', 1400000, 'Berlangsung'),
(5, 1, 2, '2024-05-24', '2024-05-31', 1400000, 'Berlangsung'),
(6, 1, 2, '2024-05-24', '2024-05-31', 1400000, 'Berlangsung'),
(7, 1, 1, '2024-05-16', '2024-05-21', 1500000, 'Berlangsung'),
(8, 1, 1, '2024-05-16', '2024-05-18', 600000, 'Berlangsung'),
(9, 1, 2, '2024-05-10', '2024-05-20', 2000000, 'Selesai'),
(10, 7, 1, '2024-05-01', '2024-05-31', 9000000, 'Selesai'),
(11, 6, 3, '2024-05-25', '2024-05-30', 2500000, 'Berlangsung'),
(12, 7, 1, '2024-05-23', '2024-05-30', 2100000, 'Berlangsung'),
(13, 7, 1, '2024-05-23', '2024-05-30', 2100000, 'Berlangsung');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `idTransaksi` int(11) NOT NULL,
  `idPeminjamman` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idMobil` int(11) NOT NULL,
  `tanggalSewa` date NOT NULL,
  `tanggalKembali` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`idTransaksi`, `idPeminjamman`, `idUser`, `idMobil`, `tanggalSewa`, `tanggalKembali`, `status`) VALUES
(1, 1, 1, 1, '2024-05-17', '2024-05-18', 'Selesai'),
(2, 2, 2, 2, '2024-05-17', '2024-05-18', 'Selesai'),
(3, 9, 1, 2, '2024-05-10', '2024-05-20', 'Selesai'),
(4, 10, 7, 1, '2024-05-01', '2024-05-31', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `namaUser` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `noHP` int(14) NOT NULL,
  `noSIM` int(16) NOT NULL,
  `hakAkses` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `namaUser`, `email`, `password`, `noHP`, `noSIM`, `hakAkses`) VALUES
(6, 'williambaru', 'williambaru1@gmail.com', '$2y$10$7i/VKcITWQ9jwCAiN/kw7.edDK0PU9SErk6Trb/gEsyV5duBsctDm', 80000000, 89000000, 'User'),
(7, 'williambaru', 'williambaru2@gmail.com', '$2y$10$OuhSf04/kKuQk68QiuvOd.38ErgIJhPqa1GSZreZN.HfnVxSEaiTC', 80000000, 89000000, 'Admin'),
(8, 'williambaru3', 'williambaru3@gmail.com', '$2y$10$TzqwaN3ouZJTzMpuoToi0.uFg6BYWHZWGY38bKAJ2ba.GCQ4gktv.', 80000000, 89000000, 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`idMobil`);

--
-- Indexes for table `peminjamman`
--
ALTER TABLE `peminjamman`
  ADD PRIMARY KEY (`idPeminjamman`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idMobil` (`idMobil`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idTransaksi`),
  ADD KEY `idPeminjamman` (`idPeminjamman`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idMobil` (`idMobil`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `idMobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `peminjamman`
--
ALTER TABLE `peminjamman`
  MODIFY `idPeminjamman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idTransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

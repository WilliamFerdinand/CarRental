-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2024 at 06:16 AM
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
(5, 'Mobil 5', 'Merk G', 'Model E', 'SUV', 'BN 9909 WS', 300000, 'Vacant');

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
(9, 1, 2, '2024-05-10', '2024-05-20', 2000000, 'Selesai');

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
(3, 9, 1, 2, '2024-05-10', '2024-05-20', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `namaUser` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `noHP` int(14) NOT NULL,
  `noSIM` int(16) NOT NULL,
  `hakAkses` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `namaUser`, `email`, `password`, `noHP`, `noSIM`, `hakAkses`) VALUES
(1, 'William', 'W@email.com', '123', 8000000, 800000, 'Admin'),
(2, 'WF', 'wf@gmail.com', '123', 8000000, 800000, 'Admin'),
(3, 'williamf', 'williamferdinand@gmail.com', '123', 80000000, 89000000, 'User'),
(4, 'williamfe', 'williamff@gmail.com', '12', 80000000, 89000000, 'User'),
(5, 'williambaru', 'williambaru@gmail.com', '1234', 80000000, 89000000, 'User');

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
  MODIFY `idMobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `peminjamman`
--
ALTER TABLE `peminjamman`
  MODIFY `idPeminjamman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idTransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

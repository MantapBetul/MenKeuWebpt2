-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2020 at 04:06 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manajemenkeuangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaksikeuangan`
--

CREATE TABLE `transaksikeuangan` (
  `id` int(11) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `username` varchar(10) NOT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksikeuangan`
--

INSERT INTO `transaksikeuangan` (`id`, `status`, `jumlah`, `keterangan`, `username`, `tanggal`) VALUES
(1, 'MASUK', 2500000, 'uang bulanan', '', '2020-04-18'),
(12, 'KELUAR', 25000, 'samporna mild', '', '2020-04-21'),
(14, 'KELUAR', 10000, 'bayar parkir', '', '2020-04-21'),
(15, 'MASUK', 10000, 'cashback', '', '2020-04-21'),
(17, 'MASUK', 100000, 'kasih ibu', 'fatkhulk', '2020-05-05'),
(18, 'MASUK', 250000, 'uang dengar', 'fatkhulk', '2020-04-25'),
(20, 'KELUAR', 80000, 'beli amer', '', '2020-05-18'),
(22, 'MASUK', 1000000, 'yuhu', 'user1', '0000-00-00'),
(23, 'MASUK', 100000, 'yuhuhu', 'user1', '2020-06-22');

-- --------------------------------------------------------

--
-- Table structure for table `transaksipiutang`
--

CREATE TABLE `transaksipiutang` (
  `id1` int(11) NOT NULL,
  `status1` varchar(10) NOT NULL,
  `jumlah1` double NOT NULL,
  `nama1` varchar(15) NOT NULL,
  `username1` varchar(10) NOT NULL,
  `tanggal1` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksipiutang`
--

INSERT INTO `transaksipiutang` (`id1`, `status1`, `jumlah1`, `nama1`, `username1`, `tanggal1`) VALUES
(1, 'PIUTANG', 300000, 'Mr. x', '', '2020-04-25'),
(2, 'HUTANG', 200000, 'Andi', '', '2020-04-25'),
(4, 'HUTANG', 200000, 'Toyo', '', '2020-04-25'),
(7, 'HUTANG', 200000, 'didiet', '', '2020-05-14'),
(8, 'PIUTANG', 350000, 'Sella', '', '2020-05-14'),
(9, 'PIUTANG', 150000, 'Mr.Y', '', '2020-05-14'),
(10, 'PIUTANG', 100000, 'Ijab', 'fatkhulk', '2020-05-18'),
(13, 'HUTANG', 50000, 'Didiet', 'fatkhulk', '2020-05-18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `datetime` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `gender`, `datetime`) VALUES
(2, 'fatkhulk', 'khijabfatkhul@gmail.com', '202cb962ac59075b964b07152d234b70', 'Male', '2020-05-18 13:19:20'),
(3, 'user1', 'user1@mail.co', 'user1234', 'female', '2020-06-17 17:00:00'),
(9, 'user2', 'user2@mail.com', 'user1234', 'Male', '2020-06-22 13:56:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaksikeuangan`
--
ALTER TABLE `transaksikeuangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksipiutang`
--
ALTER TABLE `transaksipiutang`
  ADD PRIMARY KEY (`id1`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaksikeuangan`
--
ALTER TABLE `transaksikeuangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `transaksipiutang`
--
ALTER TABLE `transaksipiutang`
  MODIFY `id1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

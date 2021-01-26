-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2021 at 03:55 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `j3d118129_esto`
--
CREATE DATABASE IF NOT EXISTS `j3d118129_esto` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `j3d118129_esto`;
-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `tanggal` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`id`, `nama`, `email`, `jumlah`, `status`, `tanggal`) VALUES
(14, 'Sifa', 'sifa@gmail.com', 1, 2, '2021-01-26'),
(15, 'Fulan', 'fulan@gmail.com', 1, 1, '2021-01-26');

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `id` int(11) NOT NULL,
  `harian` int(11) NOT NULL,
  `lembur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gaji`
--

INSERT INTO `gaji` (`id`, `harian`, `lembur`) VALUES
(1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `tanggal` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kehadiran`
--

INSERT INTO `kehadiran` (`id`, `email`, `nama`, `tanggal`) VALUES
(6, 'sifa@gmail.com', 'Sifa', '2021-01-26'),
(7, 'fulan@gmail.com', 'Fulan', '2021-01-26');

-- --------------------------------------------------------

--
-- Table structure for table `lembur`
--

CREATE TABLE `lembur` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `tanggal` varchar(128) NOT NULL,
  `durasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lembur`
--

INSERT INTO `lembur` (`id`, `nama`, `email`, `tanggal`, `durasi`) VALUES
(10, 'Sifa', 'sifa@gmail.com', '2021-01-26', 2),
(11, 'Sifa', 'sifa@gmail.com', '2021-01-26', 1),
(12, 'Sifa', 'sifa@gmail.com', '2021-01-26', 1),
(13, 'Sifa', 'sifa@gmail.com', '2021-01-26', 10),
(14, 'Fulan', 'fulan@gmail.com', '2021-01-26', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `jenis_kelamin` varchar(5) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `rekening_gaji` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role`, `email`, `password`, `jenis_kelamin`, `nama`, `rekening_gaji`) VALUES
(7, 1, 'esto@gmail.com', '$2y$10$6QfjyV8pxKUGdTb.g5GZTeXn41uxSc.VqjMvBf5ikF6G8IhFk0vzq', 'L', 'Esto Triramdani Nurlustiawan', '08090726'),
(8, 3, 'sifa@gmail.com', '$2y$10$ORw1knPcIiQjAxT5w9zywewC0XFMjvmXN9BbGFZmzq0c8X0TednIu', 'P', 'Sifa', '91827550'),
(9, 2, 'zoro@gmail.com', '$2y$10$n6gQH4USuoRQDP6fIGyP2erlaKC8uVBt.oNiWfjqfHnt5qLt7bWnO', 'L', 'Zoro', '91827556'),
(10, 3, 'fulan@gmail.com', '$2y$10$gn9MwTw6LWvm6sTdILjej.4Qz81JZi8pQ6gC.4uYdQrkodZeTgp/S', 'L', 'Fulan', '82751257');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lembur`
--
ALTER TABLE `lembur`
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
-- AUTO_INCREMENT for table `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lembur`
--
ALTER TABLE `lembur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

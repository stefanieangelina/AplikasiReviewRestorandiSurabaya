-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2021 at 09:47 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restoran_review`
--
CREATE DATABASE IF NOT EXISTS `restoran_review` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `restoran_review`;

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

DROP TABLE IF EXISTS `foto`;
CREATE TABLE `foto` (
  `id_foto` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `restoran_id` int(11) DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id_foto`, `nama`, `user_id`, `restoran_id`, `status`) VALUES
(1, 'assets/images/profile/18.jpg', 1, 0, 1),
(2, 'assets/images/profile/1.jpg', 2, 0, 1),
(3, 'assets/images/resto/', 0, 0, 1),
(4, 'assets/images/resto/', 0, 2, 1),
(5, 'assets/images/resto/18.jpg', 0, 3, 1),
(6, 'assets/images/resto/15.jpg', 0, 4, 1),
(7, 'assets/images/resto/17.jpg', 0, 5, 1),
(8, 'assets/images/resto/17.jpg', 0, 6, 1),
(9, 'assets/images/resto/1.jpg', 0, 7, 1),
(10, 'assets/images/resto/18.jpg', 0, 8, 1),
(11, 'assets/images/resto/62298.jpg', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

DROP TABLE IF EXISTS `komentar`;
CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_user` varchar(30) NOT NULL,
  `id_restoran` int(11) NOT NULL,
  `ulasan` longtext NOT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `restoran`
--

DROP TABLE IF EXISTS `restoran`;
CREATE TABLE `restoran` (
  `id_restoran` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `no_tlp` int(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `rating` int(1) NOT NULL,
  `jumlah_org` int(11) NOT NULL,
  `foto_id` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restoran`
--

INSERT INTO `restoran` (`id_restoran`, `user_id`, `nama`, `deskripsi`, `no_tlp`, `alamat`, `rating`, `jumlah_org`, `foto_id`, `status`) VALUES
(1, 2, 'Ayam Bakar Uenak Poll', 'ayam bakar enak', 812345, 'jl ahmad yani 55', 0, 0, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto_id` int(11) NOT NULL,
  `role` varchar(5) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `alamat`, `password`, `foto_id`, `role`) VALUES
(1, 'Admin Stefanie', 'admin.stefanie@gmail.com', 'kapasari 50', '$2y$10$d3InjCeGRznJ6lV0rDxc5OXdwHoORC1jXI7dBwo4EncaAl8lgsYwa', 1, 'admin'),
(2, 'stefanie angelina gunarto', 'stefanie1@mhs.stts.edu', 'Kapasari 3', '$2y$10$tNDJbIXbvVUeakselvEIOeHtp.J0LYHsOeddH3W1vcLl4jbmf8i1G', 2, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `restoran`
--
ALTER TABLE `restoran`
  ADD PRIMARY KEY (`id_restoran`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restoran`
--
ALTER TABLE `restoran`
  MODIFY `id_restoran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

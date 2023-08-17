-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2023 at 04:57 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `face`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `code` varchar(25) NOT NULL,
  `name` varchar(45) NOT NULL,
  `jabatan` varchar(45) NOT NULL,
  `images` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `code`, `name`, `jabatan`, `images`, `created_at`) VALUES
(14, '64d90fbdaaff4', 'Deni Darmayana', 'Pemilik', 'Deni Darmayana.png', '2023-08-13 17:15:41'),
(15, '64db8c71870a7', 'Ahmad Fauzan', 'Pengajar', 'Ahmad Fauzan.png', '2023-08-15 14:32:17'),
(16, '64db8cc81c0d7', 'Dedy W', 'DIR', 'Dedy W.png', '2023-08-15 14:33:44'),
(17, '64db8d6c43f64', 'Andika', 'Programmer', 'Andika.png', '2023-08-15 14:36:28'),
(18, '64db8ef6daef9', 'Faruq', 'Content', 'Faruq.png', '2023-08-15 14:43:02'),
(19, '64db8f40585c4', 'aHMAD', 'AA', 'aHMAD.png', '2023-08-15 14:44:16'),
(20, '64db8fa86d46a', 'aNDIKAA', 'AAAAA', 'aNDIKAA.png', '2023-08-15 14:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `scan`
--

CREATE TABLE `scan` (
  `id` int(11) NOT NULL,
  `code` varchar(35) NOT NULL,
  `images` varchar(75) NOT NULL,
  `status` int(11) NOT NULL,
  `client` varchar(75) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scan`
--

INSERT INTO `scan` (`id`, `code`, `images`, `status`, `client`, `created_at`) VALUES
(4, '64d95714b6d6b', '64d95714b6d6b.png', 0, '', '2023-08-13 22:20:08'),
(5, '64d9583fdcc93', '64d9583fdcc93.png', 0, '', '2023-08-13 22:25:07'),
(6, '64db8c779a328', '64db8c779a328.png', 0, '', '2023-08-15 14:32:26'),
(7, '64db8cd3f00f3', '64db8cd3f00f3.png', 0, '', '2023-08-15 14:33:59'),
(8, '64db8ceb0a336', '64db8ceb0a336.png', 0, '', '2023-08-15 14:34:22'),
(9, '64db8d293e1b8', '64db8d293e1b8.png', 0, '', '2023-08-15 14:35:24'),
(10, '64db8d3b05592', '64db8d3b05592.png', 0, '', '2023-08-15 14:35:42'),
(11, '64db8d6ff1ed4', '64db8d6ff1ed4.png', 0, '', '2023-08-15 14:36:35'),
(12, '64db8d8c6932d', '64db8d8c6932d.png', 0, '', '2023-08-15 14:37:03'),
(13, '64db8ecb6ec57', '64db8ecb6ec57.png', 0, '', '2023-08-15 14:42:22'),
(14, '64db8efadd990', '64db8efadd990.png', 0, '', '2023-08-15 14:43:10'),
(15, '64db8f168344d', '64db8f168344d.png', 0, '', '2023-08-15 14:43:37'),
(16, '64db8f4436980', '64db8f4436980.png', 0, '', '2023-08-15 14:44:23'),
(17, '64db8facc94bd', '64db8facc94bd.png', 0, '', '2023-08-15 14:46:07'),
(18, '64db8fd21a8be', '64db8fd21a8be.png', 0, '', '2023-08-15 14:46:45'),
(19, '64db90fccdae9', '64db90fccdae9.png', 0, '', '2023-08-15 14:51:43'),
(20, '64db915590ce6', '64db915590ce6.png', 0, '', '2023-08-15 14:53:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(75) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2023-08-11 03:40:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scan`
--
ALTER TABLE `scan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `scan`
--
ALTER TABLE `scan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

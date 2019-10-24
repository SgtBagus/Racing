-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2019 at 08:26 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `racingeven`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paket_detail`
--

CREATE TABLE `tbl_paket_detail` (
  `id` int(11) NOT NULL,
  `id_paket` int(11) DEFAULT NULL,
  `id_team` int(11) DEFAULT NULL,
  `id_raider` int(11) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `keterangan` text,
  `status` enum('"ENABLE"','"DISABLE"') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_paket_detail`
--

INSERT INTO `tbl_paket_detail` (`id`, `id_paket`, `id_team`, `id_raider`, `number`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 8, 1, 1, 'Dia Juara nomor 1\r\n        ', '', '2019-10-24 12:57:50', '2019-10-24 13:16:41'),
(3, 4, 9, 5, 2, 'asd\r\n        ', '', '2019-10-24 13:18:38', NULL),
(4, 5, 8, 4, 1, 'Dia juara Umum', '', '2019-10-24 13:19:19', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_paket_detail`
--
ALTER TABLE `tbl_paket_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_paket_detail`
--
ALTER TABLE `tbl_paket_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

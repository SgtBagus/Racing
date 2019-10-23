-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2019 at 01:50 PM
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
-- Table structure for table `tbl_juara`
--

CREATE TABLE `tbl_juara` (
  `id` int(11) NOT NULL,
  `id_event` int(11) DEFAULT NULL,
  `days` int(11) DEFAULT NULL,
  `status` enum('ENABLE','DISABLE') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_juara`
--

INSERT INTO `tbl_juara` (`id`, `id_event`, `days`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'ENABLE', '2019-10-23 00:00:00', NULL),
(2, 1, 2, 'ENABLE', '2019-10-23 00:00:00', NULL),
(3, 1, 3, 'ENABLE', '2019-10-23 00:00:00', NULL),
(7, 2, 1, 'ENABLE', '2019-10-23 00:00:00', NULL),
(8, 2, 2, 'ENABLE', '2019-10-23 00:00:00', NULL),
(9, 2, 3, 'ENABLE', '2019-10-23 00:00:00', NULL),
(10, 5, 1, 'ENABLE', '2019-10-23 17:54:59', '2019-10-23 17:54:59'),
(11, 5, 2, 'ENABLE', '2019-10-23 17:54:59', '2019-10-23 17:54:59'),
(12, 5, 3, 'ENABLE', '2019-10-23 17:54:59', '2019-10-23 17:54:59'),
(13, 6, 1, 'ENABLE', '2019-10-23 18:12:25', '2019-10-23 18:12:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_juara`
--
ALTER TABLE `tbl_juara`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_juara`
--
ALTER TABLE `tbl_juara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 23, 2019 at 05:33 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `racingEven`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu_master`
--

CREATE TABLE `menu_master` (
  `id` int(11) NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `icon` varchar(225) DEFAULT NULL,
  `link` varchar(225) DEFAULT NULL,
  `urutan` varchar(225) DEFAULT NULL,
  `parent` varchar(225) DEFAULT NULL,
  `notif` varchar(225) DEFAULT NULL,
  `status` enum('ENABLE','DISABLE') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_master`
--

INSERT INTO `menu_master` (`id`, `name`, `icon`, `link`, `urutan`, `parent`, `notif`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dashboard', 'fa fa-dashboard', '/', '0', '0', '', 'ENABLE', '2019-01-17 14:33:33', '2019-10-02 08:10:30'),
(37, 'Data', 'fa fa-check-square-o', '#', '1', '0', '', 'ENABLE', '2019-10-02 08:08:53', '2019-10-02 08:27:23'),
(38, 'Team', 'fa fa-users', 'team', '0', '37', '', 'ENABLE', '2019-10-02 08:09:30', '2019-10-02 11:46:30'),
(39, 'Raider', 'fa fa-motorcycle', 'raider', '2', '37', '', 'ENABLE', '2019-10-02 08:10:13', '2019-10-02 18:48:36'),
(40, 'Event', 'fa fa-map-o', '#', '2', '0', '', 'ENABLE', '2019-10-02 08:20:54', NULL),
(41, 'Event', 'fa fa-star', 'event', '0', '40', '', 'ENABLE', '2019-10-02 08:21:36', '2019-10-02 08:28:00'),
(42, 'Pendaftar Event', 'fa fa-users', 'eventregister', '1', '40', '', 'ENABLE', '2019-10-02 08:24:04', NULL),
(43, 'Blog / Informasi', 'fa fa-newspaper-o', 'blogs', '4', '0', '', 'ENABLE', '2019-10-02 08:25:20', '2019-10-23 09:36:36'),
(44, 'Gallery', 'fa fa-picture-o', 'gallery', '5', '0', '', 'ENABLE', '2019-10-02 08:25:46', '2019-10-23 09:36:44'),
(45, 'Merchandise', 'fa fa-cubes', '#', '6', '0', '', 'ENABLE', '2019-10-02 08:26:29', '2019-10-23 09:37:00'),
(46, 'Merchandise', 'fa fa-table', 'merchandise', '0', '45', '', 'ENABLE', '2019-10-02 08:29:00', NULL),
(47, 'Transaksi Merchandise', 'fa fa-money ', 'transaction', '1', '45', '', 'DISABLE', '2019-10-02 08:30:04', NULL),
(48, 'Admin Users', 'fa fa-user', 'users', '7', '0', '', 'ENABLE', '2019-10-02 08:33:44', '2019-10-23 09:37:08'),
(49, 'Master', 'fa fa-database', '#', '8', '0', '', 'ENABLE', '2019-10-02 08:34:02', '2019-10-23 09:37:14'),
(50, 'Pengaturan', 'fa fa-link', '#', '8', '0', '', 'DISABLE', '2019-10-02 08:35:08', '2019-10-02 08:35:33'),
(52, 'Motor', 'fa fa-motorcycle', 'master/motor', '1', '49', '', 'ENABLE', '2019-10-02 15:54:20', '2019-10-02 15:55:26'),
(53, 'Manajer', 'fa fa-user', 'manager', '1', '37', '', 'ENABLE', '2019-10-02 18:47:27', '2019-10-02 18:48:27'),
(54, 'Groub Gambar', 'fa fa-picture-o', 'master/imagegroup', '1', '49', NULL, 'ENABLE', '2019-10-06 00:00:00', NULL),
(55, 'Wisata', 'fa fa-star', '#', '3', '0', '', 'ENABLE', '2019-10-23 09:36:26', '2019-10-23 09:42:41'),
(56, 'Data Juara', 'fa fa-star', 'juara', '2', '40', '', 'ENABLE', '2019-10-23 09:38:23', NULL),
(57, 'Dokumentasi', 'fa fa-picture-o', 'dokumentasi', '3', '40', '', 'ENABLE', '2019-10-23 09:38:52', NULL),
(60, 'Wisata', 'fa fa-star', 'wisata', '0', '55', '', 'ENABLE', '2019-10-23 09:45:58', NULL),
(61, 'Wisata Dokumentasi', 'fa fa-picture-o', 'wisatadokumentasi', '1', '55', '', 'ENABLE', '2019-10-23 09:46:14', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu_master`
--
ALTER TABLE `menu_master`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu_master`
--
ALTER TABLE `menu_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

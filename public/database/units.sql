-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2022 at 12:19 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `validar`
--

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `qr_code` varchar(255) NOT NULL,
  `scans` int(11) NOT NULL DEFAULT 0,
  `ip_address` varchar(255) DEFAULT 'Not Yet Scanned',
  `location` varchar(255) DEFAULT 'Not Yet Scanned	',
  `isp` varchar(255) DEFAULT NULL,
  `timestamp` varchar(255) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `last_location` varchar(255) NOT NULL,
  `warning` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `p_id`, `qr_code`, `scans`, `ip_address`, `location`, `isp`, `timestamp`, `status`, `last_location`, `warning`) VALUES
(1, 1, '7390021', 0, 'Not Yet Scanned', 'Not Yet Scanned	', NULL, NULL, '1', '', 0),
(2, 1, '7390022', 0, 'Not Yet Scanned', 'Not Yet Scanned	', NULL, NULL, '1', '', 0),
(3, 1, '7390023', 0, 'Not Yet Scanned', 'Not Yet Scanned	', NULL, NULL, '1', '', 0),
(4, 1, '7390024', 0, 'Not Yet Scanned', 'Not Yet Scanned	', NULL, NULL, '1', '', 0),
(5, 1, '7390025', 0, 'Not Yet Scanned', 'Not Yet Scanned	', NULL, NULL, '1', '', 0),
(6, 1, '7390026', 0, 'Not Yet Scanned', 'Not Yet Scanned	', NULL, NULL, '1', '', 0),
(7, 1, '7390027', 0, 'Not Yet Scanned', 'Not Yet Scanned	', NULL, NULL, '1', '', 0),
(8, 1, '7390028', 0, 'Not Yet Scanned', 'Not Yet Scanned	', NULL, NULL, '1', '', 0),
(9, 1, '7390029', 0, 'Not Yet Scanned', 'Not Yet Scanned	', NULL, NULL, '1', '', 0),
(10, 1, '73900210', 0, 'Not Yet Scanned', 'Not Yet Scanned	', NULL, NULL, '1', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
